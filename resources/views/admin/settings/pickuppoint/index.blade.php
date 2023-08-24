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
                                <h3 class="card-title">Warehouse List</h3>
                                <button class="btn btn-sm btn-primary float-right" data-toggle="modal"
                                    data-target="#pickuppoint_add">Add</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="" class="table table-bordered table-striped text-center ytable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Phone Two</th>
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
    <!-- Modal -->
    <div class="modal fade" id="pickuppoint_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6>Pickup Point Create</h6>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.pickuppoint.store') }}" id="pickuppoint_add_form" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- @method('patch') --}}
                        <div class="modal-body">
                            <x-forms.input :title="'Name'" :type="'text'" :name="'name'" :value="''"
                                :placeholder="'Name'" />
                            <x-forms.input :title="'Address'" :type="'text'" :name="'address'" :value="''"
                                :placeholder="'Address'" />
                            <x-forms.input :title="'Phone'" :type="'text'" :name="'phone'" :value="''"
                                :placeholder="'Phone Number'" />
                            <x-forms.input :title="'Phone Two'" :type="'text'" :name="'phone_two'" :value="''"
                                :placeholder="'Phone Number'" />
                        </div>
                        <x-forms.button />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Edit Modal -->
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pickup Point Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="model_body">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            table = $('.ytable').DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [0, "desc"]
                ],
                ajax: "{{ route('admin.pickuppoint.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'address',
                        name: 'Address'
                    },
                    {
                        data: 'phone',
                        name: 'Phone'
                    },
                    {
                        data: 'phone_two',
                        name: 'Phone_two'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }

                ]
            });
        });
    </script>
    <script>
        $('#pickuppoint_add_form').submit(function(e) {
            e.preventDefault();
            let url = $(this).attr('action');
            let request = $(this).serialize();
            $.ajax({
                url: url,
                type: 'post',
                async: false,
                data: request,
                success: function(data) {
                    toastr.success(data);
                    $('#pickuppoint_add_form')[0].reset();
                    $('#pickuppoint_add').modal('hide');
                    table.ajax.reload();
                }
            });
        });
        //for delete
        $(document).ready(function() {
            $(document).on('click', '#delete_pickuppoint', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $('#delete_form').attr("action", url);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $('#delete_form').submit();
                    } else {
                        swal("Safe Data!");
                    }
                });
            });
            $(document).on('submit', '#delete_form', function(e) {
                e.preventDefault();
                var url = $(this).attr('action');
                var request = $(this).serialize();
                $.ajax({
                    url: url,
                    type: 'post',
                    async: false,
                    data: request,
                    success: function(data) {
                        toastr.success(data);
                        $("#delete_form")[0].reset();
                        table.ajax.reload();
                    }
                });
            });
            $('body').on('click', '.edit', function() {
                var pickuppoint_id = $(this).data('id');
                $.get("pickuppoint/edit/" + pickuppoint_id, function(data) {
                    console.log(data);
                    $('#model_body').html(data);
                });
            });

            $(document).on('submit', '#pickuppoint_edit_form', function(e) {
                e.preventDefault();
                var url = $(this).attr('action');
                var request = $(this).serialize();
                $.ajax({
                    url: url,
                    type: 'post',
                    async: false,
                    data: request,
                    success: function(data) {
                        toastr.success(data);
                        $("#pickuppoint_edit_form")[0].reset();
                        $("#EditModal").modal('hide');
                        table.ajax.reload();
                    }
                });
            });

        });
    </script>
@endpush
