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
        <x-forms.input title="Child Category Name" type="text" name="name" placeholder="Enter Child Category Name"
            id="" value="{{ $data->name }}" />
        <input type="hidden" value="{{ $data->id }}" name="id" class="form-control">

    </div>
    <x-forms.button button="Update" />
</form>
