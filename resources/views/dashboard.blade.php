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
                                <div class="dropdown ms-auto">
                                    <a class="text-muted font-size-16" role="button" data-bs-toggle="dropdown"
                                       aria-haspopup="true">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap mb-0">
                                    <tr>
                                        <th scope="col" colspan="2">Post</th>
                                        <th scope="col">Likes</th>
                                        <th scope="col">Comments</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    <tbody>
                                    <tr>
                                        <td style="width: 100px;"><img src="assets/images/small/img-2.jpg" alt=""
                                                                       class="avatar-md h-auto d-block rounded"></td>
                                        <td>
                                            <h5 class="font-size-13 text-truncate mb-1"><a href="javascript: void(0);"
                                                                                           class="text-dark">Beautiful
                                                    Day with Friends</a></h5>
                                            <p class="text-muted mb-0">10 Nov, 2020</p>
                                        </td>
                                        <td><i class="bx bx-like align-middle me-1"></i> 125</td>
                                        <td><i class="bx bx-comment-dots align-middle me-1"></i> 68</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="text-muted font-size-16" role="button"
                                                   data-bs-toggle="dropdown" aria-haspopup="true">
                                                    <i class="mdi mdi-dots-horizontal"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Separated link</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><img src="assets/images/small/img-6.jpg" alt=""
                                                 class="avatar-md h-auto d-block rounded"></td>
                                        <td>
                                            <h5 class="font-size-13 text-truncate mb-1"><a href="javascript: void(0);"
                                                                                           class="text-dark">Drawing a
                                                    sketch</a></h5>
                                            <p class="text-muted mb-0">02 Nov, 2020</p>
                                        </td>
                                        <td><i class="bx bx-like align-middle me-1"></i> 102</td>
                                        <td><i class="bx bx-comment-dots align-middle me-1"></i> 48</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="text-muted font-size-16" role="button"
                                                   data-bs-toggle="dropdown" aria-haspopup="true">
                                                    <i class="mdi mdi-dots-horizontal"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Separated link</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><img src="assets/images/small/img-1.jpg" alt=""
                                                 class="avatar-md h-auto d-block rounded"></td>
                                        <td>
                                            <h5 class="font-size-13 text-truncate mb-1"><a href="javascript: void(0);"
                                                                                           class="text-dark">Riding bike
                                                    on road</a></h5>
                                            <p class="text-muted mb-0">24 Oct, 2020</p>
                                        </td>
                                        <td><i class="bx bx-like align-middle me-1"></i> 98</td>
                                        <td><i class="bx bx-comment-dots align-middle me-1"></i> 35</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="text-muted font-size-16" role="button"
                                                   data-bs-toggle="dropdown" aria-haspopup="true">
                                                    <i class="mdi mdi-dots-horizontal"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Separated link</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><img src="assets/images/small/img-2.jpg" alt=""
                                                 class="avatar-md h-auto d-block rounded"></td>
                                        <td>
                                            <h5 class="font-size-13 text-truncate mb-1"><a href="javascript: void(0);"
                                                                                           class="text-dark">Project
                                                    discussion with team</a></h5>
                                            <p class="text-muted mb-0">15 Oct, 2020</p>
                                        </td>
                                        <td><i class="bx bx-like align-middle me-1"></i> 92</td>
                                        <td><i class="bx bx-comment-dots align-middle me-1"></i> 22</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="text-muted font-size-16" role="button"
                                                   data-bs-toggle="dropdown" aria-haspopup="true">
                                                    <i class="mdi mdi-dots-horizontal"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Separated link</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
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
