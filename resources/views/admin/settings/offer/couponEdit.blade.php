<form action="{{ route('admin.coupon.update') }}" method="post" enctype="multipart/form-data" id="coupon_edit_form">
    @csrf
    @method('patch')
    <div class="modal-body">
        <div class="form-group">
            <label for="">Code :<i class="text-danger text-bold">*</i></label>
            <input type="text" name="code" class="form-control" id="code" value="{{ $coupon->code }}"
                placeholder="Code">
            <input type="hidden" name="id" value="{{ $coupon->id }}">
        </div>
        <div class="form-group">
            <label for="">Date :<i class="text-danger text-bold">*</i></label>
            <input type="date" name="date" class="form-control" value="{{ $coupon->date }}" id="date"
                placeholder="">
        </div>
        <div class="form-group">
            <label for="">Type :<i class="text-danger text-bold">*</i>
            </label>
            <select name="type" class="form-control" id="type">
                <option>---Select Type---</option>
                <option value="Fixed" @if ($coupon->type == 'Fixed') selected @endif>Fixed</option>
                <option value="Percentage" @if ($coupon->type == 'Percentage') selected @endif>Percentage</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Amount :<i class="text-danger text-bold">*</i>
            </label>
            <input type="text" name="amount" class="form-control" value="{{ $coupon->amount }}" id="amount"
                placeholder="Name">
        </div>
        <div class="form-group">
            <label for="">Status :<i class="text-danger text-bold">*</i>
            </label>
            <select name="status" class="form-control" id="status">
                <option>---Select Status---</option>
                <option value="Active" @if ($coupon->status == 'Active') selected @endif>Active</option>
                <option value="Inactive" @if ($coupon->status == 'Inactive') selected @endif>Inactive</option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary modal_close" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
</form>
