@extends('layout.app')


@section('content')


<div class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 p-r-0 title-margin-right">
                <div class="page-header">
                    <div class="page-title">
                        <h1>Hello, <span>Welcome Here</span></h1>
                    </div>
                </div>
            </div>
            <!-- /# column -->
            <div class="col-lg-4 p-l-0 title-margin-left">
                <div class="page-header">
                    <div class="page-title">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Table-Basic</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /# column -->
        </div>
        <!-- /# row -->
        <section id="main-content">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-title">
                            <h4>Add Service</h4>
                            
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="/dashboard/service" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Service Name</label>
                                        <input type="text" class="form-control" placeholder="ex:HomeWashing" name="servicename">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" placeholder="ex:Azad Nawzad" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="ex:*********" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" placeholder="ex:751xxxxxxx" name="phonenumber">
                                    </div>
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /# row -->


    
@endsection