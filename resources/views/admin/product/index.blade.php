@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product Page</h1>
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
                                <h3 class="card-title">Product List</h3>
                                <a href="{{ route('admin.product.create') }}"
                                    class="btn btn-sm btn-primary float-right">Add</a>
                            </div>
                            <div class="row mt-2">
                                <div class="form-group col-3">
                                    <select name="category_id" id="category_id" class="form-control submitable">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <select name="brand_id" id="brand_id" class="form-control submitable">
                                        <option value="">Select brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <select name="warehouse_id" id="warehouse_id" class="form-control submitable">
                                        <option value="">Select Warehouse</option>
                                        @foreach ($warehousees as $warehouse)
                                            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <select name="status" id="status" class="form-control submitable">
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="" class="table table-bordered table-striped text-center ytable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Category</th>
                                            <th>Subcategory</th>
                                            <th>Brand</th>
                                            <th>Featured</th>
                                            <th>Today Deal</th>
                                            <th>Status</th>
                                            <th>Thumbnail</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

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
                            <form id="delete_form" action="" method="delete">
                                @csrf
                                @method('delete')
                            </form>
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
@push('js')
    <script src="{{ asset('backend/plugins/jQuery-Plugin-Dropify/dist/js/dropify.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            table = $('.ytable').DataTable({
                processing: true,
                serverSide: true,
                serching: true,
                order: [
                    [0, "desc"]
                ],
                "ajax": {
                    "url": "{{ route('admin.product.index') }}",
                    "data": function(e) {
                        e.category_id = $('#category_id').val();
                        e.brand_id = $('#brand_id').val();
                        e.warehouse_id = $('#warehouse_id').val();
                        e.status = $('#status').val();
                    }
                },

                // ajax: "{{ route('admin.product.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'category_name',
                        name: 'category_name'
                    },
                    {
                        data: 'subcategory_name',
                        name: 'subcategory_name'
                    },
                    {
                        data: 'brand_name',
                        name: 'brand_name'
                    },
                    {
                        data: 'featured',
                        name: 'featured'
                    },
                    {
                        data: 'today_deal',
                        name: 'today_deal'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'thumbnail',
                        name: 'thumbnail',
                        render: function(data, type, full, meta) {
                            return "<img src=\"{{ asset('storage/images/product') }}/" + data +
                                "\" height=\"50\" class=\"rounded-circle\"/>"
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        serchable: true
                    },

                ]
            });
        });
    </script>

    <script>
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
    </script>

    <script>
        $('body').on('click', '.active_status', function() {
            let id = $(this).data('id');
            let url = "{{ url('admin/product/active-status') }}/" + id;
            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {
                    toastr.success(data);
                    table.ajax.reload();
                }
            })
        });
        $('body').on('click', '.deactive_status', function() {
            let id = $(this).data('id');
            let url = "{{ url('admin/product/deactive-status') }}/" + id;
            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {
                    toastr.success(data);
                    table.ajax.reload();
                }
            })
        });
        $('body').on('click', '.deactive_today_deal', function() {
            let id = $(this).data('id');
            let url = "{{ url('admin/product/deactive-today_deal') }}/" + id;
            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {
                    toastr.success(data);
                    table.ajax.reload();
                }
            })
        });
        $('body').on('click', '.active_today_deal', function() {
            let id = $(this).data('id');
            let url = "{{ url('admin/product/active-today_deal') }}/" + id;
            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {
                    toastr.success(data);
                    table.ajax.reload();
                }
            })
        });
        $('body').on('click', '.deactive_featured', function() {
            let id = $(this).data('id');
            let url = "{{ url('admin/product/deactive-featured') }}/" + id;
            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {
                    toastr.success(data);
                    table.ajax.reload();
                }
            })
        });
        $('body').on('click', '.active_featured', function() {
            let id = $(this).data('id');
            let url = "{{ url('admin/product/active-featured') }}/" + id;
            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {
                    toastr.success(data);
                    table.ajax.reload();
                }
            })
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#category_id').select2();
        });
        $(document).ready(function() {
            $('#brand_id').select2();
        });
        $(document).ready(function() {
            $('#warehouse_id').select2();
        });
    </script>

    {{-- FIltering --}}
    <script>
        $(document).on('change', '.submitable', function() {
            $('.ytable').DataTable().ajax.reload();
        });
    </script>
@endpush
