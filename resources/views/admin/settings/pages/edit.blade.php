@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Page Edit</h1>
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

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('admin.page.update', $page->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Page Position :<i class="text-danger text-bold">*</i></label>
                                        <select name="page_position" class="form-control">
                                            <option>---Select---</option>
                                            <option value="1" @if ($page->page_position == 1) selected @endif>Line
                                                One</option>
                                            <option value="2" @if ($page->page_position == 2) selected @endif>Line
                                                Two</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Page Name :<i class="text-danger text-bold">*</i></label>
                                        <input type="text" name="page_name" value="{{ $page->page_name }}"
                                            class="form-control" placeholder="Page Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Page Title :<i class="text-danger text-bold">*</i></label>
                                        <input type="text" name="page_title" value="{{ $page->page_title }}"
                                            class="form-control" placeholder="Page Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Page Description :<i
                                                class="text-danger text-bold">*</i></label>
                                        <textarea name="page_desc" class="form-control" id="summernote" rows="10"> {{ $page->page_desc }} </textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection
