@extends('layouts.app')


@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">მომხმარებლის რედაქტირება</h4>


                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            {{--                            <h4 class="card-title">Default Datatable</h4>--}}
                            {{--                            <p class="card-title-desc">DataTables has most features enabled by--}}
                            {{--                                default, so all you need to do to use it with your own tables is to call--}}
                            {{--                                the construction function: <code>$().DataTable();</code>.--}}
                            {{--                            </p>--}}

                            {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update',$user->id]]) !!}
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <strong>სახელი:</strong>
                                    {!! Form::text('name', null, array('placeholder' => 'სახელი','class' => 'form-control')) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    <strong>გვარი:</strong>
                                    {!! Form::text('surname', null, array('placeholder' => 'გვარი','class' => 'form-control')) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    <strong>ელ. ფოსტა:</strong>
                                    {!! Form::text('email', null, array('placeholder' => 'ელ. ფოსტა','class' => 'form-control')) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    <strong>მობილურის ნომერი:</strong>
                                    {!! Form::text('tel', null, array('placeholder' => 'ელ. ფოსტა','class' => 'form-control')) !!}
                                </div>

                                <div class="form-group col-md-6">
                                    <strong>პაროლი:</strong>
                                    {!! Form::password('password', array('placeholder' => 'პაროლი','class' => 'form-control')) !!}
                                </div>

                                <div class="form-group col-md-6">
                                    <strong>პაროლის დადასტურება:</strong>
                                    {!! Form::password('confirm-password', array('placeholder' => 'პაროლის დადასტურება','class' => 'form-control')) !!}
                                </div>

                                <div class="form-group col-md-12">
                                    <strong>პრივილეგია:</strong>
                                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary mb-2">განახლება</button>
                                </div>

                                {!! Form::close() !!}

                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>

@endsection
