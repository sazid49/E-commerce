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
                                <h3 class="card-title">Website Settings Page</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('admin.website.settings.update') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <input type="hidden" name="setting_id" value="{{ $settings->id ?? '' }}">
                                                <label for="">Currency :<i
                                                        class="text-danger text-bold">*</i></label>
                                                <select name="currency" id="currency" class="form-control">
                                                    <option value="">Select Currency</option>
                                                    @if (isset($settings->currency))
                                                        <option value="৳"
                                                            {{ $settings->currency == '৳' ? 'selected' : '' }}>TK</option>
                                                        <option value="$"
                                                            {{ $settings->currency == '$' ? 'selected' : '' }}>USD</option>
                                                    @else
                                                        <option value="৳">TK</option>
                                                        <option value="$">USD</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">Phone One :<i
                                                        class="text-danger text-bold">*</i></label>
                                                <input type="text" name="phone_one" class="form-control"
                                                    placeholder="Enter Your Phone Number"
                                                    value="{{ $settings->phone_one ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">Phone Two :<i
                                                        class="text-danger text-bold">*</i></label>
                                                <input type="text" name="phone_two" class="form-control"
                                                    placeholder="Enter Your Phone Number"
                                                    value="{{ $settings->phone_two ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">Main Email :<i
                                                        class="text-danger text-bold">*</i></label>
                                                <input type="email" name="main_email" class="form-control"
                                                    placeholder="Enter Your Main Email"
                                                    value="{{ $settings->main_email ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">Support Email :<i
                                                        class="text-danger text-bold">*</i></label>
                                                <input type="email" name="support_email" class="form-control"
                                                    placeholder="Enter Your Support Email"
                                                    value="{{ $settings->support_email ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">Address :<i
                                                        class="text-danger text-bold">*</i></label>
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Enter Your Support Email"
                                                    value="{{ $settings->address ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="text-danger text-center">Social Media</h6>
                                    <div class="form-row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">Facebook :<i
                                                        class="text-danger text-bold">*</i></label>
                                                <input type="text" name="facebook" class="form-control"
                                                    placeholder="Enter Your Facebook Link"
                                                    value="{{ $settings->facebook ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">Twitter :<i
                                                        class="text-danger text-bold">*</i></label>
                                                <input type="text" name="twitter" class="form-control"
                                                    placeholder="Enter Your Twitter Link"
                                                    value="{{ $settings->twitter ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">Instagram :<i
                                                        class="text-danger text-bold">*</i></label>
                                                <input type="text" name="instagram" class="form-control"
                                                    placeholder="Enter Your Instagram Link"
                                                    value="{{ $settings->instagram ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">Linkedin :<i
                                                        class="text-danger text-bold">*</i></label>
                                                <input type="text" name="linkedin" class="form-control"
                                                    placeholder="Enter Your linkedin Link"
                                                    value="{{ $settings->linkedin ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">Youtube :<i
                                                        class="text-danger text-bold">*</i></label>
                                                <input type="text" name="youtube" class="form-control"
                                                    placeholder="Enter Your Youtube Link"
                                                    value="{{ $settings->youtube ?? '' }}">
                                            </div>
                                        </div>
                                    </div>

                                    <h6 class="text-danger text-center">Logo & Favicon</h6>
                                    <div class="form-row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Logo :<i class="text-danger text-bold">*</i></label>
                                                <input type="file" name="logo" id="logo"
                                                    class="form-control">
                                                @if (isset($settings->logo))
                                                    <div class="pt-2 float-left">
                                                        <img src="{{ asset('storage/' . $settings->logo) }}"
                                                            alt="" width="100px" height="100px">
                                                    </div>
                                                @endif
                                                <div id="logoPreviewContainer" class="pt-2 float-right">
                                                    <img id="logoPreview" src="" alt="Image Preview"
                                                        width="100px" height="100px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Favicon :<i
                                                        class="text-danger text-bold">*</i></label>
                                                <input type="file" name="favicon" class="form-control"
                                                    id="imageInput">
                                                @if (isset($settings->favicon))
                                                    <div class="pt-2 float-left">
                                                        <img src="{{ asset('storage/' . $settings->favicon) }}"
                                                            alt="" width="100px" height="100px">
                                                    </div>
                                                @endif
                                                <div id="faviconPreviewContainer" class="pt-2 float-right">
                                                    <img id="faviconPreview" src="" alt="Image Preview"
                                                        width="100px" height="100px">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
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
@push('js')
    <script>
        $('#faviconPreviewContainer').hide();
        $('#logoPreviewContainer').hide();
        $(document).ready(function() {
            // When the file input changes
            $('#imageInput').on('change', function(e) {
                const file = e.target.files[0];
                // Check if a file was selected
                if (file) {
                    // Create a FileReader instance
                    const reader = new FileReader();
                    // Set up the FileReader callback to display the image preview
                    reader.onload = function(e) {
                        $('#faviconPreview').attr('src', e.target.result);
                        $('#faviconPreviewContainer').show(); // Show the image preview container
                    };
                    // Read the image file as a data URL
                    reader.readAsDataURL(file);
                }
            });
        });
        $(document).ready(function() {
            // When the file input changes
            $('#logo').on('change', function(e) {
                const file = e.target.files[0];
                // Check if a file was selected
                if (file) {
                    // Create a FileReader instance
                    const reader = new FileReader();
                    // Set up the FileReader callback to display the image preview
                    reader.onload = function(e) {
                        $('#logoPreview').attr('src', e.target.result);
                        $('#logoPreviewContainer').show(); // Show the image preview container
                    };
                    // Read the image file as a data URL
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endpush
