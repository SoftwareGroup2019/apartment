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
                            <h4>Edit Ads</h4>
                            
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="/dashboard/ads/{{ $selectedads->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" placeholder="ex:PopReklam" name="title" value="{{ $selectedads->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Image</label>
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label>Video Link</label>
                                        <input type="text" class="form-control" placeholder="ex:youtube.com/asdfgeg" name="video" value="{{ $selectedads->video }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Period</label>
                                        <input type="text" class="form-control" placeholder="ex:3Days" name="period" value="{{ $selectedads->period }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Provider</label>
                                        <input type="text" class="form-control" placeholder="ex:Pavilon" name="provider" value="{{ $selectedads->provider }}">
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