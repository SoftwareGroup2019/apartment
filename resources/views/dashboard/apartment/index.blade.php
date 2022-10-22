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
                           
                            <a href="/dashboard/apartment/create" class="btn btn-primary btn-sm"><i class="ti-plus"></i> Add Apartment</a>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Apartment</th>
                                            <th>Enable Ads</th>
                                            <th>Enable Service</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allapartment as $key=>$apartment)

                                        <tr>
                                            <th scope="row">{{ $key +1 }}</th>
                                            <td>{{ $apartment->apartmentname }}</td>
                                            <td>{{ $apartment->enableads }}</td>
                                            <td>{{ $apartment->enableservice }}</td>
                                            <td>{{ $apartment->created_at }}</td>
                                            <td>
                                                <a href="/dashboard/apartment/{{ $apartment->id }}/edit" class="btn btn-success btn-sm"><i class="ti-pencil-alt"></i></a>
                                                <a href="" ></a>
                                                <form action="/dashboard/apartment/{{ $apartment->id }}" method="POST" style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger delete btn-sm"><i class="ti-trash"></i></button>
                                                </form><!-- end of form -->
                                            </td>
                                        </tr>
                                            
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->


    
@endsection