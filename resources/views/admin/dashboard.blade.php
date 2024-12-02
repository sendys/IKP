@extends('layouts.admin')

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Index
        @endslot
        @slot('title')
            Dashboard
        @endslot
    @endcomponent

@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
@endsection


