<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('page_title')</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">@yield('page_title')</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        @if (count($errors) > 0)
            <div class="system-message-container">
                <div id="system-message" class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="system-message-container">
                <div class="alert bg-danger" role="alert">
                    {!! session('error') !!}
                </div>
            </div>
        @endif

        @if (session()->has('success'))
            <div class="system-message-container">
                <div class="alert bg-success" role="alert">
                    {!! session('success') !!}
                </div>
            </div>
        @endif
        @yield('content')
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
