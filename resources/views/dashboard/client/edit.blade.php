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
                            <h4>Edit Client</h4>
                            
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="/dashboard/client/{{ $selectedclient->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Clinet Name</label>
                                        <input type="text" class="form-control" placeholder="ex:Azad" name="name" value="{{ $selectedclient->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="ex:******" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label>Services</label>
                                        <select class="form-control" name="service_id">
                                            <option value="">Select</option>
                                            @foreach ($allservice as $service)
                                            <option value="{{ $service->id }}">{{ $service->servicename }}</option>
                                            @endforeach
                                        </select>
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