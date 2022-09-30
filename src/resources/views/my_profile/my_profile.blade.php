@extends('admin_user::layouts.admin')

@section('page_title', __('My Profile'))

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('My Profile') }}</h3>
                </div>
                <div class="card-body">
                    {{ Form::open(['url' => route('admin.post_my_profile'), 'method' => 'POST']) }}
                    <div class="form-group">
                        <label for="name" class="col-form-label">{{ __('Name') }}</label>
                        <div class="col-sm-12">
                            {{ Form::text('name', auth()->user()->name ?? '', ['class' => 'form-control', 'id' => 'name', 'placeholder' => __('Name'), 'required' => true]) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-form-label">Email</label>
                        <div class="col-sm-12">
                            {{ Form::email('email', auth()->user()->email ?? '', ['class' => 'form-control', 'id' => 'email', 'placeholder' => __('Email'), 'required' => true]) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary float-right">{{ __('Save') }}</button>
                        <a href="/" class="btn btn-default float-right mr-1">{{ __('Close') }}</a>
                    </div>
                    {{ Form::close() }}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
