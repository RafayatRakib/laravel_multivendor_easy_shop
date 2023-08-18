@extends('admin.admin_master')

@section('title','Inactive Vendor List')
    
@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Tables</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Inactive Vendor</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('add.brand')}}" type="button" class="btn btn-primary">Add Brand</a>
                
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">ALl Brands</h6>
<hr/>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Shop Name</th>
                        <th>Vendor User name</th>
                        <th>Vendor phone</th>
                        <th>Vendor Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($vendor as $key=> $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->user_name}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            @if ($item->status == 'inactive')
                                <div class="text-danger"> <b> Dectived </b></div>
                                <a class="badge bg-success" href="{{route('vendor.status',$item->id)}}">Active</a>
                             @endif
                        </td>
                        <td>
                            {{-- <a class="btn btn-info" href="{{route('edit.brand', $item->id)}}">Details</a> --}}
                            <a class="btn btn-info" href="{{route('vendor.profile.details', $item->id)}}">Details</a>
                           
                        </td>
                    </tr>    
                    @empty
                        {{"No data available in table"}}
                    @endforelse
                    
                   

                </tbody>
                <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Shop Name</th>
                        <th>Vendor User name</th>
                        <th>Vendor phone</th>
                        <th>Vendor Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


@endsection