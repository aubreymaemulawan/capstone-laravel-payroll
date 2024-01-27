<?php

namespace App\Http\Controllers\Tenant\Import;

use App\Http\Controllers\Controller;
use App\Imports\AttendanceImport;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\HeadingRowImport;

class AttendanceImportController extends Controller
{

    public function importAttendances(Request $request)
    {
        

        validator($request->all(),[
            'import_file' => 'file|mimes:csv,txt|required'
        ])->validate();

        


        $file = $request->file('import_file');
        
        $import = new AttendanceImport();
        $headings = (new HeadingRowImport)->toArray($file);

        $missingField = array_diff($import->requiredHeading, $headings[0][0]);
        if (count($missingField) > 0) {
            return response(collect($missingField)->values(), 423);
        }

        $import->import($file);

        return [
            'status' => 200,
            'message' => trans('default.has_been_imported_successfully',[
                'subject' => __t('employees')
            ])
        ];
    }
}
