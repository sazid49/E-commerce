@extends('backend.layouts.app')

@section('content')
    <style>
        .pass_show {
            position: relative
        }

        .pass_show .ptxt {

            position: absolute;

            top: 50%;

            right: 10px;

            z-index: 1;

            color: #f36c01;

            margin-top: -10px;

            cursor: pointer;

            transition: .3s ease all;

        }

        .pass_show .ptxt:hover {
            color: #333333;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Password Change</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-ttile">Password Change</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.password.update') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Current Password</label>
                                        <div class="form-group pass_show">
                                            <input type="password"
                                                class="form-control @error('old_password') is-invalid @enderror"
                                                name="old_password" placeholder="Current Password">
                                            @error('old_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <div class="form-group pass_show">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                placeholder="New Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <div class="form-group pass_show">
                                            <input type="password" class="form-control" name="password_confirmation"
                                                placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-success ">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <script></script>
@endsection
