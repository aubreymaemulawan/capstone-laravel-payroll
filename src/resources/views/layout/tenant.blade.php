@extends('common.master')

<style>
    ul.navbar-nav.navbar-nav-right li{
        display: none !important;
    }

    ul.navbar-nav.navbar-nav-right li:last-child{
        display: block !important;
    }

    #Employees-0 .btn-secondary, #Attendance-1 .btn-secondary{
        display: none !important;
    }
</style>

@section('master')
    <div class="container-scroller">
        @section('top-bar')
            <app-top-navigation-bar logo-icon-src="{{ $logo_icon }}"
                                    :profile-data="{{ json_encode($top_bar_menu) }}"
                                    :has-work-shift="{{ $hasDefaultWorkShift ? 'true' : 'false' }}">
            </app-top-navigation-bar>
        @show

        @section('side-bar')
            @php
                $filteredArray = array_filter($permissions, function($element) {
                    return $element['name'] !== 'Assets' && $element['name'] !== 'Settings';
                });
            @endphp
            <sidebar :data="{{ json_encode(array_values($filteredArray))  }}"
                     logo-src="{{ $logo }}"
                     logo-icon-src="{{ $logo_icon }}"
                     logo-url="{{ request()->root()  }}">
            </sidebar>
        @show
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                @yield('contents')
            </div>
        </div>
    </div>
@endsection

@push('before-scripts')
    <script>
        window.tenant = {!! json_encode(tenant()) !!}
    </script>
    <script>
        window.settings = {!! json_encode($settings) !!}
    </script>
    <script>
        window.user = {!! auth()->user()->load('profilePicture', 'roles:id,name') !!}
    </script>
@endpush
