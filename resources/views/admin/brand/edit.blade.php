<form action="{{ route('admin.brand.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="">Brand Name :<i class="text-danger text-bold">*</i></label>
            <input type="text" name="name" class="form-control" value="{{ $brand->name }}" placeholder="Name">
            <input type="hiden" name="id" class="form-control" value="{{ $brand->id }}" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="">Brand Logo :</label>
            <input type="file" name="logo" id="dropify" class="form-control" placeholder="Name">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-spinner"></i>Save</button>
    </div>
</form>
