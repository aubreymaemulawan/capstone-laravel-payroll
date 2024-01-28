<?php

namespace App\Http\Controllers\Tenant\Import;

use App\Http\Controllers\Controller;
use App\Imports\AttendanceImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\HeadingRowImport;
use Maatwebsite\Excel\Writer;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

class AttendanceImportController extends Controller
{

    public function importAttendances(Request $request)
    {
        

        validator($request->all(),[
            'import_file' => 'file|mimes:csv,txt|required'
        ])->validate();

        // get current maximum execution time value
        $current_execution_time = ini_get('max_execution_time');

        // maximum execution time is to set 300s
        ini_set('max_execution_time', 300);

        //get current $memory_limit
        $current_memory_limit = ini_get('memory_limit');

        //set memory limit to 512M
        ini_set('memory_limit', '512M');


        $file = $request->file('import_file');

        // Convert CSV data before importing
        $convertedData = $this->convertCsvData($file);

        // Create a new CSV file with the converted data
        $newCsvFile = $this->createNewCsvFile($convertedData);

        $this->removeDoubleQuotesFromCsv($newCsvFile);

        //row number
        $rows = count(array_map('str_getcsv', file($newCsvFile)));
        throw_if($rows > 501,
            ValidationException::withMessages([
                'import_file' => [__t('maximum_row_exceeded_message')]
            ]));


        $import = new AttendanceImport();

        $headings = (new HeadingRowImport)->toArray($newCsvFile);

        $missingField = array_diff($import->requiredHeading, $headings[0][0]);
        if (count($missingField) > 0) {
            return response(collect($missingField)->values(), 423);
        }

        $import->import($newCsvFile);
        $failures = $import->failures();

        // set to previous maximum execution time value
        ini_set('max_execution_time', $current_execution_time);
        //set its previous state of memory limit
        ini_set('memory_limit', $current_memory_limit);

        //partial import
        if ($failures->count() > 0) {
            $stat = import_failed($newCsvFile, $failures);
            return [
                'status' => 200,
                'message' => trans('default.partially_imported',[
                    'subject' => __t('employees')
                ]),
                'stat' => $stat
            ];
        }

        return [
            'status' => 200,
            'message' => trans('default.has_been_imported_successfully',[
                'subject' => __t('employees')
            ])
        ];
    }

    private function convertCsvData($file)
    {
        $csvData = array_map('str_getcsv', file($file));

        $convertedData = [];
        $employeeData = [];

        foreach ($csvData as $row) {
            $employeeId = $row[0];
            $timestamp = $row[1];

            // Parse the timestamp to get the date and time
            [$date, $time] = explode(' ', $timestamp);

            if (!isset($employeeData[$employeeId][$date])) {
                // First time entry for this employee on this date
                $employeeData[$employeeId][$date]['in_time'] = $timestamp;
            }

            // Always update the out_time for this date
            $employeeData[$employeeId][$date]['out_time'] = $timestamp;
        }

        // Flatten the array for CSV conversion
        foreach ($employeeData as $employeeId => $dates) {
            foreach ($dates as $dateData) {
                $convertedData[] = [
                    'employee_id' => $employeeId,
                    'in_time' => $dateData['in_time'],
                    'out_time' => $dateData['out_time'],
                    'note' => 'sample-data',

                ];
            }
        }

        return $convertedData;
    }

    private function createNewCsvFile($data)
    {
        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Retrieve the current active worksheet
        $sheet = $spreadsheet->getActiveSheet();

        // Add header row
        $header = ['employee_id', 'in_time', 'out_time', 'note'];
        $sheet->fromArray([$header], null, 'A1');

        // Add data rows
        $rowData = array_map(function ($item) {
            return array_values($item);
        }, $data);
        $sheet->fromArray($rowData, null, 'A2');

        // Write a new .csv file
        $writer = new Csv($spreadsheet);

        // Save the new .csv file
        $currentDate = date('YmdHis');
        $fileName = 'convertedReport_' . $currentDate . '.csv';
        $pathToFile = storage_path('/app/public/' . $fileName);
        $writer->save($pathToFile);

        return $pathToFile;
    }

    private function removeDoubleQuotesFromCsv($filePath)
    {
        // Read the CSV file
        $csvData = file($filePath);

        // Remove double quotes from each line
        $csvData = array_map(function ($line) {
            return str_replace('"', '', $line);
        }, $csvData);

        // Save the modified contents back to the same file
        file_put_contents($filePath, implode('', $csvData));
    }


}