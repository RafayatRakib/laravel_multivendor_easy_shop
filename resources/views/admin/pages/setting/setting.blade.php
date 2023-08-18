

@extends('admin.admin_master')
@section('title','Setting')
@section('admin')


<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">All Setting</div>
    <div class="ps-3">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
             <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
             </li>
             <li class="breadcrumb-item active" aria-current="page">All SEtting </li>
                @if (session('success'))
                    <strong class="text-danger">{{ session('success') }}</strong>
                @endif
          </ol>
       </nav>
    </div>
    <div class="ms-auto">
       <div class="btn-group">
       </div>
    </div>
 </div>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
        <div class="card radius-10 bg-primary bg-gradient">
            
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        {{-- <p class="mb-0 text-white">Cach Clear</p> --}}
                        <h4 class="my-1 text-white">Cach Clear</h4>
                    </div>
                    {{-- <div class="text-white ms-auto font-35"><i class="bx bx-cart-alt"></i>
                    </div> --}}
                </div>
                <a href="{{route('cache_clear')}}" class="ml-10 btn btn-danger">Clear</a>
            </div>


        </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-danger bg-gradient">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Total Income</p>
                        <h4 class="my-1 text-white">$89,245</h4>
                    </div>
                    <div class="text-white ms-auto font-35"><i class="bx bx-dollar"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-warning bg-gradient">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-dark">Total Users</p>
                        <h4 class="text-dark my-1">24.5K</h4>
                    </div>
                    <div class="text-dark ms-auto font-35"><i class="bx bx-user-pin"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-success bg-gradient">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Comments</p>
                        <h4 class="my-1 text-white">8569</h4>
                    </div>
                    <div class="text-white ms-auto font-35"><i class="bx bx-comment-detail"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-success">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Revenue</p>
                        <h4 class="my-1 text-white">$4805</h4>
                        <p class="mb-0 font-13 text-white"><i class="bx bxs-up-arrow align-middle"></i>$34 from last week</p>
                    </div>
                    <div class="widgets-icons bg-white text-success ms-auto"><i class="bx bxs-wallet"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-info">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-dark">Total Customers</p>
                        <h4 class="my-1 text-dark">8.4K</h4>
                        <p class="mb-0 font-13 text-dark"><i class="bx bxs-up-arrow align-middle"></i>$24 from last week</p>
                    </div>
                    <div class="widgets-icons bg-white text-dark ms-auto"><i class="bx bxs-group"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-danger">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Store Visitors</p>
                        <h4 class="my-1 text-white">59K</h4>
                        <p class="mb-0 font-13 text-white"><i class="bx bxs-down-arrow align-middle"></i>$34 from last week</p>
                    </div>
                    <div class="widgets-icons bg-white text-danger ms-auto"><i class="bx bxs-binoculars"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-warning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-dark">Bounce Rate</p>
                        <h4 class="my-1 text-dark">34.46%</h4>
                        <p class="mb-0 font-13 text-dark"><i class="bx bxs-down-arrow align-middle"></i>12.2% from last week</p>
                    </div>
                    <div class="widgets-icons bg-white text-dark ms-auto"><i class="bx bx-line-chart-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection