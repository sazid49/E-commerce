<form action="{{ route('admin.sub.category.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="">Category Name :<i class="text-danger text-bold">*</i></label>
            <select name="category_id" id="" class="form-control select2">
                <option value="">Select Category</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $data->category_id ? 'selected' : '' }}>
                        {{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Name :<i class="text-danger text-bold">*</i></label>
            <input type="text" name="name" value="{{ $data->name }}" class="form-control" id="scategory_name"
                placeholder="Name">
            <input type="hidden" value="{{ $data->id }}" name="id" class="form-control">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
