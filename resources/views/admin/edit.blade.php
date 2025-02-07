@extends('layouts.admin')
@section('title')
   Setting Label
@endsection
@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Label Edit</h4>
            </div>
        </div>
    </div>
@endsection
@section('body')

<body data-sidebar="colored">
    @endsection
    @section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('label.update', 1) }}">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-10">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Label Name</label>
                                        <input type="text" class="form-control @error('namalabel') is-invalid @enderror" id="namalabel" name="namalabel" value="{{ old('namalabel', $label->namalabel) }}" required autocomplete="name" autofocus>

                                        @error('namalabel')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary me-1">Simpan</button>

                            </div>
                        </form>
                    </div>
                </div>
                <!-- end card -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    @endsection
    @section('scripts')
        <script src="{{ URL::asset('build/libs/parsleyjs/parsley.min.js') }}"></script>

        <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
