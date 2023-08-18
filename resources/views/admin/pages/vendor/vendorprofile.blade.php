@extends('admin.admin_master')

@section('title','Vendor Detils')
    
@section('admin')

<div class="page-content"> 
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Vendor Profile</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Vendor Profilep</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Settings</button>
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">

                <div class="col-lg-8">
                    <div class="card">
                       <form action="{{route('vendor.status', $vendorProfile->id)}}" method="get" enctype="multipart/form-data" >
                        @csrf
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">User Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="user_name" class="form-control" disabled value="{{ '@'.$vendorProfile->user_name}}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="name" class="form-control" value=" {{$vendorProfile->name}} " />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="email" class="form-control" value="{{$vendorProfile->email}}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="phone" class="form-control" value="{{$vendorProfile->phone}}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <textarea class="form-control" name="address"  rows="3" style="height: 74px;">{{$vendorProfile->address}} </textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Shop info</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <textarea class="form-control" name="address"  rows="3" style="height: 74px;">{{$vendorProfile->info}} </textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Status</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <strong class="text-danger">{{strtoupper($vendorProfile->status)}}</strong>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    @if ($vendorProfile->status == 'active')
                                    <input type="submit" class="btn btn-danger px-4" value="Deactive Vendor" />
                                        
                                    @else
                                    <input type="submit" class="btn btn-success px-4" value="Active Vendor" />
                                        
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection