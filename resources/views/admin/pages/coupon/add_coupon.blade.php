@extends('admin.admin_master')
@section('title','Add Coupon')
@section('admin')

<div class="row">

    <div class="col-md-8">
        <div class="card py-2 px-3">
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{route('all.coupon')}}" type="button" class="btn btn-primary">All Coupon</a>
                    
                </div>
            </div>
        </div>
        
        <form id="myForm" action="{{route('add.coupon.store')}}" method="post" >
        {{-- <form id="myForm" >  --}}
            @csrf
            <div  class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Coupon Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control @error('coupon_code')is-invalid @enderror " id="coupon_code" name="coupon_code" value="{{old('coupon_code')}}" placeholder="Coupon name">
                        <div class="text-danger"> @error('coupon_code'){{ $message }} @enderror </div>
                    </div>
                </div>
        
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Description</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" name="description" value="{{old('description')}}" id="description" class="form-control" placeholder="Description" required/>
                    </div>
                </div>
        
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Coupon Validity</h6>
                    </div>
        
                    <div class="col-sm-4 text-secondary">
                        <p class="mb-0">Start Date</p>
                        <input type="datetime-local" name="start_date" value="{{old('start_date')}}" id="start_date" class="form-control " placeholder="Start Date" min="{{Carbon\Carbon::now()->format('Y-m-d')}}"
                        />
                    </div>
                    <div class="col-sm-5 text-secondary">
                        <p class="mb-0">End Date</p>
                        <input type="datetime-local" name="end_date" id="end_date"  value="{{old('end_date')}}" class="form-control" placeholder="End Date"   required/>
                    </div>
                </div>
        
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Discount Type</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <select name="discount_type" id="discount_type" class="form-select" value="{{old('discount_type')}}">
                            <option selected disabled>Select a Discount Type </option>
                            <option value="percentage">Percentage</option>
                            <option value="fixed_amount">Fixed Amount</option>
                        </select>
                    </div>
                </div>
        
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Min Purchase Amount</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="number" name="minimum_purchase_amount"  value="{{old('minimum_purchase_amount')}}"  id="minimum_purchase_amount" class="form-control" placeholder="Minimum purchase Amount" />
                    </div>
                </div>
        
                <div id="show_discount_type"></div>
        
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                        <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                    </div>
                </div>
            </div>
        </div>
        </form>
        
        
    </div>
</div>

@endsection