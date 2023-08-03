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
                        <h1 class="m-0">Smtp Setting</h1>
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
                <div class="row ">
                    <div class="col-12 m-auto">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-ttile">Smtp Setting</h3>
                            </div>
                            <form action="{{ route('admin.setting.smtp.update') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Mail Mailer</label>
                                                <div class="form-group pass_show">
                                                    <input type="text"
                                                        class="form-control @error('mailer') is-invalid @enderror"
                                                        name="mailer" placeholder="Mail Mailer"
                                                        value="{{ $smtp['mailer'] ?? '' }}">
                                                    <input type="hidden" name="smtp_id" value="{{ $smtp['id'] ?? '' }}">
                                                    @error('mailer')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Mail Host</label>
                                                <div class="form-group pass_show">
                                                    <input type="text"
                                                        class="form-control @error('host') is-invalid @enderror"
                                                        name="host" placeholder="Mail Host"
                                                        value="{{ $smtp['host'] ?? '' }}">
                                                    @error('host')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Mail Port</label>
                                                <div class="form-group pass_show">
                                                    <input type="text"
                                                        class="form-control @error('port') is-invalid @enderror"
                                                        name="port" placeholder="Mail Port Example: 2525"
                                                        value="{{ $smtp['port'] ?? '' }}">
                                                    @error('port')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Mail Username</label>
                                                <div class="form-group pass_show">
                                                    <input type="text"
                                                        class="form-control @error('user_name') is-invalid @enderror"
                                                        name="user_name" placeholder="Mail Username"
                                                        value="{{ $smtp['user_name'] ?? '' }}">
                                                    @error('user_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Mail Password</label>
                                                <div class="form-group pass_show">
                                                    <input type="text" name="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        value="{{ $smtp['password'] ?? '' }}" placeholder="Mail Password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    @if (isset($smtp->id))
                                        <button class="btn btn-sm btn-success float-right">Update</button>
                                    @else
                                        <button class="btn btn-sm btn-success float-right">Create</button>
                                    @endif
                                </div>
                            </form>
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
