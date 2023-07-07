<form action="javascript:void(0)" id="customer_info" method="post">
    @csrf
    <div class="row">
        <div class="col-xxl-4 col-md-6">
            <div>
                <label for="company_id" class="form-label">სახელი</label>
                <select class="form-control select2" id="company_id" name="company_id">
                    <option selected disabled>აირჩიეთ</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
                <span class="text-danger errors company_id_err"></span>
            </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div>
                <label for="name" class="form-label">სახელი</label>
                <input type="text" class="form-control" name="name" value="" id="name">
                <span class="text-danger errors name_err"></span>
            </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div>
                <label for="surname" class="form-label">გვარი</label>
                <input type="text" class="form-control" name="surname" value="" id="surname">
                <span class="text-danger errors surname_err"></span>
            </div>
        </div>
        <div class="col-xxl-4 col-md-4">
            <div>
                <label for="tel" class="form-label">ტელეფონი</label>
                <input type="text" class="form-control" name="tel" value="" id="tel">
                <span class="text-danger errors tel_err"></span>
            </div>
        </div>
        <div class="col-xxl-4 col-md-4">
            <div>
                <label for="identification_code" class="form-label">ბარათის ნომერი</label>
                <input type="text" class="form-control" name="card_number" value="" id="card_number">
                <span class="text-danger errors card_number_err"></span>
            </div>
        </div>
        <div class="col-xxl-4 col-md-4">
            <div>
                <label for="quantity" class="form-label">გატარების რაოდენობა</label>
                <input type="text" class="form-control" name="quantity" value="27" id="quantity">
                <span class="text-danger errors quantity_err"></span>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <a type="button" class="btn btn-primary waves-effect waves-light save-btn" data-link="{{ route('customers.store') }}" href="javascript:void(0)">შენახვა</a>
    </div>
</form>
<script>
    $(document).ready(function(){
        $('#tel').inputmask({"mask": "599 99 99 99"});
    });
</script>
