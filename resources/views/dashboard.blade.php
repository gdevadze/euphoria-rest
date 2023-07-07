@extends('layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-xl-8">
                    <div class="row">

                        <div class="col-lg-4">
                            <a href="{{ route('customers.index') }}">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">

                                        <div class="d-flex flex-wrap">
                                            <div class="me-3">
                                                <p class="text-muted mb-2">კლიენტები</p>
                                                <h5 class="mb-0">{{ $customersCount }}</h5>
                                            </div>

                                            <div class="avatar-sm ms-auto">
                                                <div
                                                    class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                    <i class="bx bxs-book-bookmark"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4">
                            <a href="{{ route('companies.index') }}">
                                <div class="card blog-stats-wid">
                                    <div class="card-body">

                                        <div class="d-flex flex-wrap">
                                            <div class="me-3">
                                                <p class="text-muted mb-2">კომპანიები</p>
                                                <h5 class="mb-0">{{ $companiesCount }}</h5>
                                            </div>

                                            <div class="avatar-sm ms-auto">
                                                <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                    <i class="bx bxs-note"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                    <!-- end row -->


                </div>
                <!-- end col -->


                <!-- end col -->

            </div>
            <!-- end row -->

            <div class="row">

                <!-- end col -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="me-2">
                                    <h5 class="card-title mb-4">მიმდინარე დღის გატარების ისტორია</h5>
                                </div>

                            </div>

                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap mb-0">
                                    <tr>
                                        <th scope="col">მომხმარებელი</th>
                                        <th scope="col">თარიღი</th>
                                    </tr>
                                    <tbody>
                                    @foreach($cardLogsToday as $cardLog)
                                    <tr>
                                        <td>
                                            {{ $cardLog->customer->full_name }}
                                        </td>
                                        <td>
                                            {{ $cardLog->enter_date }}
                                        </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection
