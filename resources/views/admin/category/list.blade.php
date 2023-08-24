@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category Page</h1>
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
                                <h3 class="card-title">All Category</h3>
                                <button class="btn btn-sm btn-primary float-right" data-toggle="modal"
                                    data-target="#exampleModal">Add</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $kry => $category)
                                            <tr>
                                                <td>{{ $kry + 1 }}</td>
                                                <td>{{ $category->name }}
                                                </td>
                                                <td>{{ $category->slug }}</td>
                                                <td><img src="{{ asset('storage/uploads/category') }}/{{ $category->image }}"
                                                        alt="" width="200px"></td>
                                                <td>
                                                    <button class="btn btn-info btn-sm edit" data-id={{ $category->id }}
                                                        data-toggle="modal" data-target="#EditModal"><i
                                                            class="fas fa-edit"></i></button>
                                                    <a href="{{ route('admin.category.destroy', $category->id) }}"
                                                        class="btn btn-danger btn-sm" id="delete"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>Rendering engine</th>
                                            <th>Browser</th>
                                            <th>Platform(s)</th>
                                            <th>Engine version</th>
                                            <th>CSS grade</th>
                                        </tr>
                                    </tfoot> --}}
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
                <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Category Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Name :<i class="text-danger text-bold">*</i></label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        {{-- <div class="form-group">
                            <label for="">Slug :<i class="text-danger text-bold">*</i></label>
                            <input type="text" name="slug" class="form-control" placeholder="slug">
                        </div> --}}
                        <div class="form-group slim" data-ratio="2:1" data-size="75,75" data-max-file-size="3">
                            <label for="">Image :</label>
                            <input type="file" name="slim[]" class="form-control" placeholder="slug">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Edit Modal -->
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.category.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Category Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Name :<i class="text-danger text-bold">*</i></label>
                            <input type="text" name="name" class="form-control" id="category_name"
                                placeholder="Name">
                            <input type="hidden" name="id" class="form-control" id="id" placeholder="id">
                        </div>
                        {{-- <div class="form-group">
                            <label for="">Slug :<i class="text-danger text-bold">*</i></label>
                            <input type="text" name="slug" class="form-control" placeholder="slug">
                        </div> --}}
                        <div class="form-group slim" data-ratio="2:1" data-instant-edit="true">
                            <label for="">Image :</label>
                            <input type="file" name="slim[]" class="form-control">
                        </div>
                        <div class="form-group mt-1">
                            <label for="">Old Image :</label>
                            <img id="image" src="" alt="Image" width="300px">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $('body').on('click', '.edit', function() {
            var cat_id = $(this).data('id');
            $.get("edit/" + cat_id, function(data) {
                console.log(data);
                var imagePath = "{{ asset('storage/uploads/category') }}/" + data.image;
                $('#category_name').val(data.name);
                $('#id').val(data.id);
                $('#image').attr('src', imagePath);
            });
        });
    </script>
@endpush
