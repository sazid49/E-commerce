<form action="{{ route('admin.brand.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <x-forms.input title="Brand Name" type="text" name="name" placeholder="Enter Brand Name" id=""
            value="{{ $brand->name }}" />
        <input type="hidden" name="id" class="form-control" value="{{ $brand->id }}" placeholder="Name">
        <x-forms.input title="Brand New Logo" type="file" name="logo" placeholder="" id="dropify"
            value="" />
        <img src="{{ asset('storage') }}/{{ $brand->logo }}" class="rounded-circle" alt="" width="200px"
            height="200px">
    </div>
    <x-forms.button button="Update" />
</form>
