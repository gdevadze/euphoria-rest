@extends('layouts.app')
@push('css')

@endpush
@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">პაროლის შეცვლა</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ $message }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endif
                                <form action="{{ route('update.password') }}" method="post">
                                    @csrf
                                    <div class="row">

                                        <div class="col-xxl-12 col-md-12">
                                            <div>
                                                <label for="current_password" class="form-label">მიმდინარე პაროლი</label>
                                                <input type="text" class="form-control" name="current_password" value="" id="current_password" required>
                                            </div>
                                        </div>
                                        <div class="col-xxl-12 col-md-12">
                                            <div>
                                                <label for="password" class="form-label">ახალი პაროლი</label>
                                                <input type="text" class="form-control" name="password" value="" id="password" required>
                                            </div>
                                        </div>
                                        <div class="col-xxl-12 col-md-12">
                                            <div>
                                                <label for="password_confirmation" class="form-label">გაიმეორეთ პაროლი</label>
                                                <input type="text" class="form-control" name="password_confirmation" value="" id="password_confirmation" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">შენახვა</button>
                                    </div>
                                </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
@endsection

@push('js')

@endpush
