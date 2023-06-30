@extends('layouts.admin')

@section('content')
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30 p-3">

                    <form action="{{ url('/users/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>სახელი:</strong>
                                    <input type="text" name="name" class="form-control" placeholder="სახელი" required>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>გვარი:</strong>
                                    <input type="text" name="lastname" class="form-control" placeholder="სახელი"
                                           required>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>ელ.ფოსტა:</strong>
                                    <input type="Email" name="email" class="form-control" placeholder="ელ.ფოსტა"
                                           required>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>მობილურის ნომერი:</strong>
                                    <input type="number" name="tel" class="form-control" placeholder="ელ.ფოსტა"
                                           required>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>პაროლი:</strong>
                                    <input type="password" name="password" class="form-control" placeholder="პაროლი"
                                           required>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>პაროლის დადასტურება:</strong>
                                    <input type="password" name="confirm-password" class="form-control"
                                           placeholder="პაროლის დადასტურება" required>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>პრივილეგია:</strong>
                                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 ">
                                <button type="submit" class="btn btn-primary">დამატება</button>
                            </div>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End col -->
    <!-- Start col -->
    <!-- End col -->
    </div>
    <!-- End row -->
    </div>
@endsection

{{--@section('content')--}}


{{--    <div class="breadcrumb">--}}
{{--        <h1>მომხმარებლის დამატება | </h1>--}}
{{--        <ul>--}}
{{--            <li><a href="{{ route('users.index') }}" >დათვალიერება</a></li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <div class="separator-breadcrumb border-top"></div>--}}


{{--    <div class="row mb-12">--}}
{{--        <div class="col-md-12 mb-4">--}}
{{--            <div class="card text-left">--}}
{{--                <div class="card-body">--}}
{{--                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <strong>სახელი:</strong>--}}
{{--                                <input type="text" name="name" class="form-control" placeholder="სახელი" required>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <strong>ელ.ფოსტა:</strong>--}}
{{--                                <input type="Email" name="email" class="form-control" placeholder="ელ.ფოსტა" required>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <strong>პაროლი:</strong>--}}
{{--                                --}}{{-- {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!} --}}
{{--                                <input type="password" name="password" class="form-control" placeholder="პაროლი" required>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <strong>პაროლის დადასტურება:</strong>--}}
{{--                                --}}{{-- {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!} --}}
{{--                                <input type="password" name="confirm-password" class="form-control" placeholder="პაროლის დადასტურება" required>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <strong>პრივილეგია:</strong>--}}
{{--                                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}--}}
{{--                                --}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-12 col-sm-12 col-md-12 ">--}}
{{--                            <button type="submit" class="btn btn-primary">დამატება</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {!! Form::close() !!}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--@endsection--}}
