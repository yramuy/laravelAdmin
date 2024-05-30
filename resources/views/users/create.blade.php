@extends('layouts.default')

@section('title', 'User')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Users</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Create User</h3>
                    </div>
                    <!-- /.card-header -->
                    {{-- @if (session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif --}}
                    <div class="card-body">
                        <form method="post" action="{{ route('user.store') }}" id="userform">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name <em
                                            class="star">*</em></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Username">
                                    </div>
                                    @error('name')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email <em
                                            class="star">*</em></label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email">
                                    </div>
                                    @error('email')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Password <em
                                            class="star">*</em></label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Password">
                                    </div>
                                    @error('password')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-danger" id="btnCancel" data-dismiss="modal"><a
                                        href={{ route('user.index') }}>Cancel</a></button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
