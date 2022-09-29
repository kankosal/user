@extends('admin_user::layouts.admin')

@section('page_title', 'User')

@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-uppercase">
                            #
                        </th>
                        <th class="text-uppercase">
                            Name
                        </th>
                        <th class="text-uppercase">
                            Email
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($rows->count())
                        @foreach ($rows as $row)
                            <tr>
                                <td>
                                    {!! $row->id !!}
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', $row->id) }}">
                                        {!! $row->name !!}
                                    </a>
                                </td>
                                <td>
                                    {!! $row->email !!}
                                </td>
                                <td class="text-right">
                                    <a class="btn btn-danger btn-sm" href="{{ route('users.destroy', $row->id) }}">
                                        <i class="fas fa-trash"></i>
                                        {{ __('Delete') }}
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{ route('users.edit', $row->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                        {{ __('Edit') }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">{{ __('There is no data available.') }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {!! $rows->render() !!}
        </div>
    </div>
    <!-- /.card -->
@endsection
