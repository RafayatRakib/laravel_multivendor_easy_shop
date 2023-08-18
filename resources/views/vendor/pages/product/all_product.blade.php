@extends('vendor.vendor_master')

@section('title','All Product')
    
@section('vendor')
    

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Product  Tables</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Product</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('vendor.add.product')}}" type="button" class="btn btn-primary">Add Product</a>
                
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
<hr/>




<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
    
    @foreach ($product as $key => $item)
        
    <div class="col">
        <div class="card">
            <img src="{{asset($item->product_cover )}}" class="card-img-top" alt="...">
            <div class="">
                <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-{{round($item->discount_price*100/$item->selling_price)}}%</span></div>
            </div>
            <div class="card-body">
                <a href="{{url('product/details/'.$item->id.'/'.$item->product_slug)}}"><h6 class="card-title cursor-pointer">{{$item->product_name}}</h6></a>
                <div class="clearfix">
                    <p class="mb-0 float-start"><strong>134</strong> Sales</p>
                    <p class="mb-0 float-end fw-bold"><span class="me-2 text-decoration-line-through text-secondary">${{ $item->discount_price? $item->selling_price : 0}} </span>
                        <span>${{ $item->discount_price? $item->selling_price-$item->discount_price : $item->selling_price }}</span></p>

                </div>

                @php
                    $review = \App\Models\Review::where('product_id',$item->id)->first();
                    
               @endphp

                <div class="d-flex align-items-center mt-3 fs-6">
                    <div class="cursor-pointer">
                        @if ($review)
                            @for ($i = 1; $i <= $review->rate; $i++)
                                <i class="bx bxs-star text-warning"></i>
                            @endfor
                            {{-- @if ($re)
                                
                            @endif --}}
                        @else
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="bx bxs-star text-secondary"></i>
                            @endfor
                        @endif
                    </div>	
                    <p class="mb-0 ms-auto">4.2(182)</p>
                </div>

            </div>
            <div class="ml-3 row">
                <div class="col">
                    <a class="btn btn-success" href="{{route('vendor.product.edit', $item->id)}}" title="Edit" > <i class="fa fa-pencil"></i> </a>
                    
                </div>
                <div class="col">
                                         @if ($item->status == 1)
                                            <a class="btn btn-warning" id="details" href="{{route('vendor.product.status', $item->id)}}" title="Inactive">  <i class="fa-solid fa-thumbs-down"></i> </a>
                                        @elseif($item->status == 0)
                                            <a class="btn btn-primary" id="details" href="{{route('vendor.product.status', $item->id)}}" title="Active">  <i class="fa-solid fa-thumbs-up"></i> </a>
                                        @endif
        </div>
        <div class="col">
            <form action="{{route('vendor.product.delete')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$item->id}}">
                <button class="btn btn-danger" id="delete" type="submit" title="Delete">  <i class="fa fa-trash"></i> </button>
            </form>

        </div>

    </div>
</div>
    </div>
    @endforeach
</div>


<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>QTY</th>
                        <th>Discounte</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $key => $item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><img src="{{asset($item->product_cover )}}" style="height: 70px; width:40px" alt="Cover"></td>
                            <td>{{ Str::limit($item->product_name, 20) }}</td>   
                            {{-- <td>{{$item->product_cover	}}</td> --}}
                            <td>{{$item->selling_price	}}</td>
                            <td>{{$item->product_qty}}</td>
                            <td>{{round($item->discount_price*100/$item->selling_price)}}%</td>
                           <td>
                             @if ($item->status == 1)
                            <span class="badge badge-pill bg-success">Actived</span>
                                
                            @else
                            <span class="badge badge-pill bg-danger">Inactived</span>
                            @endif
                        </td>
                            <td >
                                <div class="row">
                                    <div class="col">
                                        <a class="btn btn-success" href="{{route('vendor.product.edit', $item->id)}}" title="Edit" > <i class="fa fa-pencil"></i> </a>
                                        
                                    </div>
                                    <div class="col"><a class="btn btn-info" id="details" href="" title="Details">  <i class="fa fa-eye"></i> </a></div>
                                    <div class="col">
                                        <form action="{{route('vendor.product.delete')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <button class="btn btn-danger" id="delete" type="submit" title="Delete">  <i class="fa fa-trash"></i> </button>
                                        </form>

                                    </div>
                                    <div class="col">

                                        @if ($item->status == 1)
                                        <a class="btn btn-warning" id="details" href="{{route('vendor.product.status', $item->id)}}" title="Inactive">  <i class="fa-solid fa-thumbs-down"></i> </a>
                                        @elseif($item->status == 0)
                                        <a class="btn btn-primary" id="details" href="{{route('vendor.product.status', $item->id)}}" title="Active">  <i class="fa-solid fa-thumbs-up"></i> </a>
                                        @endif
                                    </div>
                                </div>
                                {{-- <a class="btn btn-success" href="{{route('vendor.product.edit', $item->id)}}" title="Edit" > <i class="fa fa-pencil"></i> </a>
                                <a class="btn btn-info" id="details" href="" title="Details">  <i class="fa fa-eye"></i> </a>
                               
                                <form action="{{route('vendor.product.delete')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <button class="btn btn-danger" id="delete" type="submit" title="Delete">  <i class="fa fa-trash"></i> </button>
                                </form>

                                @if ($item->status == 1)
                                <a class="btn btn-warning" id="details" href="{{route('vendor.product.status', $item->id)}}" title="Inactive">  <i class="fa-solid fa-thumbs-down"></i> </a>
                                @elseif($item->status == 0)
                                <a class="btn btn-primary" id="details" href="{{route('vendor.product.status', $item->id)}}" title="Active">  <i class="fa-solid fa-thumbs-up"></i> </a>
                                @endif --}}

                            </td>
                        </tr>
                    @endforeach
                    
                   

                </tbody>
                <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>QTY</th>
                        <th>Discounte</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection