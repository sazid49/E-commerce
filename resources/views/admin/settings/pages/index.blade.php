@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Page Setting</h1>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Page List</h3>
                                <button class="btn btn-sm btn-primary float-right" data-toggle="modal"
                                    data-target="#exampleModal">Add</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Page Name</th>
                                            <th>Page title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pages as $key => $page)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $page->page_name }}</td>
                                                <td>{{ $page->page_title }}</td>
                                                <td>
                                                    <a href="{{ route('admin.page.edit', $page->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin.page.destroy', $page->id) }}"
                                                        class="btn btn-danger btn-sm" id="delete"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Page Create</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.page.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Page Position :<i class="text-danger text-bold">*</i></label>
                            <select name="page_position" class="form-control">
                                <option>---Select---</option>
                                <option value="1">Line One</option>
                                <option value="2">Line Two</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Page Name :<i class="text-danger text-bold">*</i></label>
                            <input type="text" name="page_name" class="form-control" placeholder="Page Name">
                        </div>
                        <div class="form-group">
                            <label for="">Page Title :<i class="text-danger text-bold">*</i></label>
                            <input type="text" name="page_title" class="form-control" placeholder="Page Title">
                        </div>
                        <div class="form-group">
                            <label for="">Page Description :<i class="text-danger text-bold">*</i></label>
                            <textarea name="page_desc" class="form-control" id="summernote" cols="20" rows="6"></textarea>

                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
@endsection
