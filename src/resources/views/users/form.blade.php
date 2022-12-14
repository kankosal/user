@extends('admin_user::layouts.admin')

@section('page_title', 'User')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">User</h3>
                </div>
                <div class="card-body">
                    {{ Form::open(['url' => !empty($row->id) ? route('users.update', $row->id) : route('users.store'), 'method' => !empty($row->id) ? 'PUT' : 'POST']) }}
                    <div class="form-group">
                        <label for="name" class="col-form-label">{{ __('Name') }}</label>
                        <div class="col-sm-12">
                            {{ Form::text('name', $row->name ?? '', ['class' => 'form-control', 'id' => 'name', 'placeholder' => __('Name'), 'required' => true]) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-form-label">Email</label>
                        <div class="col-sm-12">
                            {{ Form::email('email', $row->email ?? '', ['class' => 'form-control', 'id' => 'email', 'placeholder' => __('Email'), 'required' => true]) }}
                        </div>
                    </div>
                    @if (empty($row->id))
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
                    @endif
                    <div class="col-md-12">
                        <button class="btn btn-primary float-right">{{ __('Save') }}</button>
                        <a href="{{ route('users.index') }}"
                            class="btn btn-default float-right mr-1">{{ __('Close') }}</a>
                    </div>
                    {{ Form::close() }}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
