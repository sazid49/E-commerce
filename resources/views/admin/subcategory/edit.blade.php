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
        <x-forms.input title="Name" type="text" name="name" placeholder="Enter SubCategory Name"
            value="{{ $data->name }}" id="" />
        <input type="hidden" value="{{ $data->id }}" name="id" class="form-control">
    </div>
    <x-forms.button button="Update" />
</form>
