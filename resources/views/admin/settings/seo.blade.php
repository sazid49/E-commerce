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
                        <h1 class="m-0">SEO Setting</h1>
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
                                <h3 class="card-ttile">SEO Setting</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.setting.seo.update') }}" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Meta Title</label>
                                                <div class="form-group pass_show">
                                                    <input type="text"
                                                        class="form-control @error('meta_title') is-invalid @enderror"
                                                        name="meta_title" placeholder="meta title"
                                                        value="{{ $seo['meta_title'] ?? '' }}">
                                                    <input type="hidden" name="meta_id" value="{{ $seo['id'] ?? '' }}">
                                                    @error('meta_title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Meta Author</label>
                                                <div class="form-group pass_show">
                                                    <input type="text"
                                                        class="form-control @error('meta_author') is-invalid @enderror"
                                                        name="meta_author" placeholder="meta author"
                                                        value="{{ $seo['meta_author'] ?? '' }}">
                                                    @error('meta_author')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Meta Tag</label>
                                                <div class="form-group pass_show">
                                                    <input type="text"
                                                        class="form-control @error('meta_tag') is-invalid @enderror"
                                                        name="meta_tag" placeholder="meta tag"
                                                        value="{{ $seo['meta_tag'] ?? '' }}">
                                                    @error('meta_tag')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Meta Keyword</label>
                                                <div class="form-group pass_show">
                                                    <input type="text"
                                                        class="form-control @error('meta_keyword') is-invalid @enderror"
                                                        name="meta_keyword" placeholder="meta keyword"
                                                        value="{{ $seo['meta_keyword'] ?? '' }}">
                                                    @error('meta_keyword')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Meta Description</label>
                                                <div class="form-group pass_show">
                                                    <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" COLS=20 ROWS=3>{{ $seo['meta_description'] ?? '' }}</textarea>
                                                    @error('meta_description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <strong class="text-center text-danger">---Other's---</strong>
                                    <div class="form-row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Google Verification</label>
                                                <div class="form-group pass_show">
                                                    <input type="text"
                                                        class="form-control @error('google_verification') is-invalid @enderror"
                                                        name="google_verification" placeholder="google verification"
                                                        value="{{ $seo['google_verification'] ?? '' }}">
                                                    @error('google_verification')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Google Analytics</label>
                                                <div class="form-group pass_show">
                                                    <input type="text"
                                                        class="form-control @error('google_analytics') is-invalid @enderror"
                                                        name="google_analytics" placeholder="google analytics"
                                                        value="{{ $seo['google_analytics'] ?? '' }}">
                                                    @error('google_analytics')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Google Adsense</label>
                                                <div class="form-group pass_show">
                                                    <input type="text"
                                                        class="form-control @error('google_adsense') is-invalid @enderror"
                                                        name="google_adsense" placeholder="google adsense"
                                                        value="{{ $seo['google_adsense'] ?? '' }}">
                                                    @error('google_adsense')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label> Alexa Verification</label>
                                                <div class="form-group pass_show">
                                                    <input type="text"
                                                        class="form-control @error('alexa_verification') is-invalid @enderror"
                                                        name="alexa_verification" placeholder="alexa verification"
                                                        value="{{ $seo['alexa_verification'] ?? '' }}">
                                                    @error('alexa_verification')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
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
