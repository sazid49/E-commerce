<form action="{{ route('admin.pickuppoint.update') }}" method="post" enctype="multipart/form-data"
    id="pickuppoint_edit_form">
    @csrf
    <div class="modal-body">
        <x-forms.input :title="'Name'" :type="'text'" :name="'name'" value="{{ $pickupPoint->name }}"
            :placeholder="'Name'" id="" />
        <input type="hidden" name="id" value="{{ $pickupPoint->id }}">
        <x-forms.input :title="'Address'" :type="'text'" :name="'address'" value="{{ $pickupPoint->address }}"
            :placeholder="'Address'" id="" />
        <x-forms.input :title="'Phone'" :type="'text'" :name="'phone'" value="{{ $pickupPoint->phone }}"
            :placeholder="'Phone Number'" id="" />
        <x-forms.input :title="'Phone Two'" :type="'text'" :name="'phone_two'" value="{{ $pickupPoint->phone_two }}"
            :placeholder="'Phone Number'" id="" />
    </div>
    <x-forms.button button="Update" />
</form>
