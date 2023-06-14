<form action="{{ route('admin.child.category.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="modal-body">
        <div class="form-group">
            <label for="">Category Name :<i class="text-danger text-bold">*</i></label>
            <select name="subcategory_id" class="form-control select2">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    @php
                        $subcategories = DB::table('sub_categories')
                            ->where('category_id', $category->id)
                            ->get();
                    @endphp
                    <option value="">{{ $category->name }}</option>
                    @foreach ($subcategories as $item)
                        <option value="{{ $item->id }}" {{ $data->subcategory_id == $item->id ? 'selected' : '' }}>
                            ---
                            {{ $item->name }} ---</option>
                    @endforeach
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
