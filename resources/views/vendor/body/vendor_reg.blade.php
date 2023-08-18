@extends('frontend.master')
@section('title', 'Easy Shop | Vendor Register')
    
@section('content')
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                <div class="row">
                    <div class="col-lg-6 col-md-8">
                        <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h1 class="mb-5">Create a vendor Account</h1>
                                    <p class="mb-30">Already have an account? <a href="{{route('vendor.login')}}">Login</a></p>
                                </div>
                                <form method="post" action="{{route('vendor.reg')}}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" value="{{old('name')}}"  name="name" class=" form-control @error('name')is-invalid @enderror" placeholder="Shop Name" />
                                        <div class="text-danger">@error('name') {{$message}} @enderror</div>

                                    </div>
                                    <div class="form-group">
                                        <input type="text"  value="{{old('username')}}"  name="username"  class=" form-control @error('username')is-invalid @enderror" placeholder="username " />
                                        <div class="text-danger">@error('username') {{$message}} @enderror</div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <input type="text"  value="{{old('phone')}}" name="phone" class=" form-control @error('phone')is-invalid @enderror" placeholder="Phone" />
                                        <div class="text-danger">@error('phone') {{$message}} @enderror</div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <input type="text" value="{{old('email')}}"  name="email" class="form-control @error('email')is-invalid @enderror" placeholder="Email" />
                                        <div class="text-danger">@error('email') {{$message}} @enderror</div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <input  type="password" name="password" class=" form-control @error('password')is-invalid @enderror" placeholder="Password" />
                                        <div class="text-danger">@error('password') {{$message}} @enderror</div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <input  type="password" name="password_confirmation" placeholder="Confirm password" />
                                    </div>

                                    
                                    <div class="login_footer form-group mb-50">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="" />
                                                <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label>
                                            </div>
                                        </div>
                                        <a href="page-privacy-policy.html"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
                                    </div>
                                    <div class="form-group mb-30">
                                        <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">Submit &amp; Register</button>
                                    </div>
                                    <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pr-30 d-none d-lg-block">
                        <img class="border-radius-15" src="{{asset('public/uploads/page/login-1.png')}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection