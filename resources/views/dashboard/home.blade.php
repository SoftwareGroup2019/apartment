@extends('layout.app')


@section('content')

    @if (Auth::user()->role->rolename == 'SuperAdmin' && Auth::user()->group->groupname == 'IT')
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hello Admin, <span>Welcome Here</span></h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Home</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <section id="main-content">

                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-user color-success border-success"></i>
                                </div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Users</div>
                                    <div class="stat-digit">{{ $user_length }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-home color-primary border-primary"></i>
                                </div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Apartment</div>
                                    <div class="stat-digit">{{ $apt_length }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-announcement color-pink border-pink"></i>
                                </div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Ads</div>
                                    <div class="stat-digit">{{ $ads_length }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-package color-danger border-danger"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Service</div>
                                    <div class="stat-digit">{{ $client_length }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    @elseif (Auth::user()->role->rolename == 'Group')
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>{{ Auth::user()->group->groupname }} Group, <span>Welcome {{ Auth::user()->name }}</span></h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Home</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <section id="main-content">

                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-user color-success border-success"></i>
                                </div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Users</div>
                                    <div class="stat-digit">{{ $user_length }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-home color-primary border-primary"></i>
                                </div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Apartment</div>
                                    <div class="stat-digit">{{ $apt_length }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-announcement color-pink border-pink"></i>
                                </div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Ads</div>
                                    <div class="stat-digit">{{ $ads_length }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-package color-danger border-danger"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Service</div>
                                    <div class="stat-digit">{{ $client_length }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    @elseif (Auth::user()->role->rolename == 'Service')
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hello, <span>Welcome {{ Auth::user()->name }}</span></h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Home</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-user color-success border-success"></i>
                                </div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Orders</div>
                                    <div class="stat-digit">45</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
    @endif
@endsection