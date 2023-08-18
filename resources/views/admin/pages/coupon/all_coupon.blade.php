@extends('admin.admin_master')
@section('title','All Coupon')
@section('admin')


<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Coupon Tables</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Coupon Table</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('add.coupon')}}" type="button" class="btn btn-primary">Add Coupon</a>
                
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">ALl Coupon</h6>
<hr/>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Coupon Author</th>
                        <th>Coupon Coade</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Discount Type</th>
                        <th>Minimum Amount</th>
                        <th>Amoutn or percentage</th>
                        <th>Coupon status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($coupon as $key=> $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>
                            @if ($item->user_id==NULL)
                                {{'Admin'}}
                            @else
                            {{$item->user->user_name}}
                                
                            @endif
                        </td>
                        <td>{{$item->coupon_code }}</td>
                        <td>{{Carbon\Carbon::parse($item->start_date)->format('D, d F Y H:i:s')
                        }}</td>
                        <td>{{Carbon\Carbon::parse($item->end_date)->format('D, d F Y H:i:s')}}</td>
                        @if ($item->discount_type=='percentage')
                        <td>{{'Percentage'}}</td>
                        @else
                        <td>{{'Fixed Amount'}}</td>
                        @endif

                        <td>{{$item->minimum_purchase_amount}}</td>
                        {{-- {{$item->discount_amount }} --}}
                        @if ($item->discount_type=='percentage')
                        <td>{{$item->discount_percentage."%"}}</td>
                        @elseif($item->discount_type=='fixed_amount')
                         {{-- {{$item->discount_amount }} --}}
                        <td>{{$item->discount_amount}}</td>

                        @endif
                        <td>

                            @if ($item->end_date >= Carbon\Carbon::now()->format('Y-m-d H:i:s'))
                                <span class="badge rounded-pill bg-success">Valide</span>
                            @else
                                <span class="badge rounded-pill bg-danger">Invalide</span>
                            @endif

                        </td>
                        <td>
                            <a class="btn btn-info" href="{{route('edit.coupon', $item->id)}}">Edit</a>
                            
                            {{-- <a class="btn btn-danger" onclick="confirmDelete({{$item->id}})"  id="delete" href="{{route('delete.coupon',$item->id)}}">Delete</a> --}}
                            <a class="btn btn-danger" onclick="confirmDelete({{$item->id}})"  id="delete" >Delete</a>
                        </td>
                    </tr>    
                    @empty
                        {{"No data available in table"}}
                    @endforelse
                    
                   

                </tbody>
                <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Coupon Author</th>
                        <th>Coupon Coade</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Discount Type</th>
                        <th>Minimum Amount</th>
                        <th>Amoutn or percentage</th>
                        <th>Coupon status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection