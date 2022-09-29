@extends('admin_user::layouts.admin')

@section('page_title', 'User')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">General</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    {{Form::open(['url'=>get_form_url(), 'method'=>get_form_method()])}}
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">{{__('Name')}}</label>
                            <div class="col-sm-10">
                                {{Form::text('name', $row->name??'', ['class'=>'form-control', 'id'=>'name', 'placeholder'=>__('Name'), 'required' => true])}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                {{Form::email('email', $row->email??'', ['class'=>'form-control', 'id'=>'email', 'placeholder'=>__('Email'), 'required' => true])}}
                            </div>
                        </div>

                        @if(empty($row->id))
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">{{__('Password')}}</label>
                                <div class="col-sm-10">
                                    {{Form::input('password', 'password', '', ['class'=>'form-control', 'id'=>'password', 'placeholder'=>__('Password'), 'required' => true])}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_confirmation" class="col-sm-2 col-form-label">{{__('Password Confirmation')}}</label>
                                <div class="col-sm-10">
                                    {{Form::input('password', 'password_confirmation', '', ['class'=>'form-control', 'id'=>'password_confirmation', 'placeholder'=>__('Password Confirmation'), 'required' => true])}}
                                </div>
                            </div>
                        @endif

                        <div class="col-md-12">
                            <button class="btn btn-primary float-right">{{__('Save')}}</button>
                            <a href="{{get_link_list()}}" class="btn btn-default float-right mr-1">{{__('Close')}}</a>
                        </div>
                    {{Form::close()}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="#" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Create new Porject" class="btn btn-success float-right">
        </div>
    </div>
@endsection
