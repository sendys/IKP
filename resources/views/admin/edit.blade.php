@extends('layouts.admin')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                            <li class="breadcrumb-item active">Label</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Pengaturan Label</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">

                    <div class="row">
                        <div class="col-sm-6">
                            <h5 id="todo-message" class="mt-0"><span id="todo-remaining"></span> of <span id="todo-total"></span> remaining</h5>
                        </div>
                        <div class="col-sm-6">
                            <a href="" class="float-right btn btn-primary btn-sm waves-effect waves-light" id="btn-archive">Archive</a>
                        </div>
                    </div>

                    <form name="todo-form" id="todo-form" method="POST" action="{{ route('label.update', 1) }}" class="mt-4">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            {{-- <div class="col-sm-9 todo-inputbar">
                                <input type="text" id="namalabel" name="namalabel" class="form-control @error('namalabel') is-invalid @enderror" value="{{ old('namalabel', $label->namalabel) }}" placeholder="Edit Label">
                                    @error('namalabel')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror

                            </div> --}}
                            <div class="col-sm-9 todo-inputbar">
                                <textarea id="namalabel" name="namalabel" required class="form-control">{{ old('namalabel', $label->namalabel) }}</textarea>
                            </div>
                            <div class="col-sm-3 todo-send">
                                <button class="btn-primary btn-md btn-block btn waves-effect waves-light" type="submit" id="todo-btn-submit">Simpan</button>
                            </div>
                        </div>
                    </form>

                    <ul class="list-group mt-4 todo-list mb-0" id="todo-list"></ul>

                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- end container-fluid -->
@endsection
