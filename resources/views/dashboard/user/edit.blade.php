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
                            <h4>Add User</h4>
                            
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="/dashboard/user/{{ $selecteduser->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $selecteduser->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $selecteduser->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control" name="role">
                                            <option value="">{{ $selecteduser->role->rolename }}</option>
                                            @foreach ($allrole as $role)
                                            <option value="{{ $role->id }}">{{ $role->rolename }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Group</label>
                                        <select class="form-control" name="group">
                                            <option value="">{{ $selecteduser->group->groupname }}</option>
                                            @foreach ($allgroup as $group)
                                            <option value="{{ $group->id }}">{{ $group->groupname }}</option>
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