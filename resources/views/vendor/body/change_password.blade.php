@extends('vendor.vendor_master')

@section('title','Vendor Change Password')
    
@section('vendor')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
            <form action="{{route('vendor.store.password')}}" method="post">
                @csrf
                @if (session('status'))
                    <div class="alert alert-success"> 
                        {{session('status')}}
                    </div>
                @elseif(session('error'))
                <div class="alert alert-danger"> 
                    {{session('error')}}
                </div>
                @endif
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Old Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Input old password" />
                        <div class="text-danger">@error('old_password') {{$message}} @enderror</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">New Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror"  placeholder="New password" />
                        <div class="text-danger">@error('new_password') {{$message}} @enderror</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Repet Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="password" name="new_password_confirmation" class="form-control" placeholder="Repet password" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0"></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="submit" class="btn btn-primary"/>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection