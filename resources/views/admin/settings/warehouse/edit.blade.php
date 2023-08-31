<form action="{{ route('admin.warehouse.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="modal-body">
        <x-forms.input title="Name" type="text" name="name" placeholder="Name" id=""
            value="{{ $data->name }}" />
        <input type="hidden" value="{{ $data->id }}" name="id" class="form-control">
        <x-forms.input title="Phone" type="text" name="phone" placeholder="Phone" id=""
            value="{{ $data->phone }}" />
        <x-forms.input title="Address" type="text" name="address" placeholder="Address" id=""
            value="{{ $data->address }}" />

    </div>
    <x-forms.button button="Update" />
</form>
