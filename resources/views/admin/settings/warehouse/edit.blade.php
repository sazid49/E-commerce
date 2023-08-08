<form action="{{ route('admin.warehouse.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="modal-body">
        <div class="form-group">
            <label for="">Name :<i class="text-danger text-bold">*</i></label>
            <input type="text" name="name" value="{{ $data->name }}" class="form-control" id="scategory_name"
                placeholder="Name">
            <input type="hidden" value="{{ $data->id }}" name="id" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Phone :<i class="text-danger text-bold">*</i></label>
            <input type="text" name="phone" value="{{ $data->phone }}" class="form-control" id="scategory_name"
                placeholder="Name">
        </div>
        <div class="form-group">
            <label for="">Address :<i class="text-danger text-bold">*</i>
            </label>
            <input type="text" name="address" value="{{ $data->address }}" class="form-control" id="scategory_name"
                placeholder="Name">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
