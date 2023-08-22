<form action="{{ route('admin.pickuppoint.update') }}" method="post" enctype="multipart/form-data"
    id="pickuppoint_edit_form">
    @csrf
    <div class="modal-body">
        <x-forms.input :title="'Name'" :type="'text'" :name="'name'" value="{{ $pickupPoint->name }}"
            :placeholder="'Name'" />
        <input type="hidden" name="id" value="{{ $pickupPoint->id }}">
        <x-forms.input :title="'Address'" :type="'text'" :name="'address'" value="{{ $pickupPoint->address }}"
            :placeholder="'Address'" />
        <x-forms.input :title="'Phone'" :type="'text'" :name="'phone'" value="{{ $pickupPoint->phone }}"
            :placeholder="'Phone Number'" />
        <x-forms.input :title="'Phone Two'" :type="'text'" :name="'phone_two'" value="{{ $pickupPoint->phone_two }}"
            :placeholder="'Phone Number'" />
    </div>
    <x-forms.button />
</form>
