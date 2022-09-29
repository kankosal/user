@extends('admin_user::layouts.admin')

@section('page_title', __('Change Password'))

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Change Password') }}</h3>
                </div>
                <div class="card-body">
                    {{ Form::open(['url' => route('admin.post_change_password'), 'method' => 'POST']) }}
                        <div class="form-group">
                            <label for="current_password" class="col-form-label">{{ __('Current Password') }}</label>
                            <div class="col-sm-12">
                                {{ Form::input('password', 'current_password', '', ['class' => 'form-control', 'id' => 'current_password', 'placeholder' => __('Current Password'), 'required' => true]) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">{{ __('Password') }}</label>
                            <div class="col-sm-12">
                                {{ Form::input('password', 'password', '', ['class' => 'form-control', 'id' => 'password', 'placeholder' => __('Password'), 'required' => true]) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation"
                                class="col-form-label">{{ __('Password Confirmation') }}</label>
                            <div class="col-sm-12">
                                {{ Form::input('password', 'password_confirmation', '', ['class' => 'form-control', 'id' => 'password_confirmation', 'placeholder' => __('Password Confirmation'), 'required' => true]) }}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary float-right">{{ __('Save') }}</button>
                        </div>
                    {{ Form::close() }}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
