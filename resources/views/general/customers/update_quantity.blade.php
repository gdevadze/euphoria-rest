<form action="javascript:void(0)" id="customer_info" method="post">
    @csrf
    <input hidden value="{{ $customer->id }}" name="id">
    <div class="row">
        <div class="col-xxl-6 col-md-6">
            <div>
                <label for="quantity" class="form-label">მიმდინარე რაოდენობა</label>
                <input type="text" class="form-control" value="{{ $customer->quantity }}" id="quantity" readonly>
            </div>
        </div>
        <div class="col-xxl-6 col-md-6">
            <div>
                <label for="quantity" class="form-label">გატარების რაოდენობა</label>
                <input type="text" class="form-control" name="quantity" value="" id="quantity">
                <span class="text-danger errors quantity_err"></span>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <a type="button" class="btn btn-primary waves-effect waves-light save-btn" data-link="{{ route('customers.update.quantity') }}" href="javascript:void(0)">შენახვა</a>
    </div>
</form>
<script>
    $(document).ready(function(){
        $('#tel').inputmask({"mask": "599 99 99 99"});
    });
</script>
