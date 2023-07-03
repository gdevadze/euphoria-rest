<form action="javascript:void(0)" id="customer_info" method="post">
    @csrf
    <div class="row">
        <div class="col-xxl-12 col-md-12">
            <div>
                <label for="basiInput" class="form-label">კომპანიის დასახელება</label>
                <input type="text" class="form-control" name="name" value="{{ $company->name }}" id="name">
                <span class="text-danger errors name_err"></span>
            </div>
        </div>
        <div class="col-xxl-12 col-md-12">
            <div>
                <label for="basiInput" class="form-label">ელ. ფოსტა</label>
                <input type="email" class="form-control" name="email" value="{{ $company->email }}" id="email">
                <span class="text-danger errors email_err"></span>
            </div>
        </div>
        <div class="col-xxl-12 col-md-12">
            <div>
                <label for="basiInput" class="form-label">საიდენტიფიკაციო კოდი</label>
                <input type="text" class="form-control" name="identification_code" value="{{ $company->identification_code }}" id="identification_code">
                <span class="text-danger errors identification_code_err"></span>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <a type="button" class="btn btn-primary waves-effect waves-light save-btn" data-link="{{ route('companies.update',$company->id) }}" href="javascript:void(0)">შენახვა</a>
    </div>
</form>
<script src="{{ asset('assets/js/geokbd.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#tel').inputmask({"mask": "599 99 99 99"});
    });
</script>
