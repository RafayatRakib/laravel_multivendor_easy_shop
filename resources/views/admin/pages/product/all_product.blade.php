@extends('admin.admin_master')

@section('title','ALL Product')
    
@section('admin')


<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Product Tables</div>
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
                <a href="{{route('admin.add.product')}}" type="button" class="btn btn-primary">Add Product</a>
                
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

<hr/>
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
                            <td>{{Str::limit($item->product_name,20)}}</td>   
                            {{-- <td>{{$item->product_cover	}}</td> --}}
                            <td>{{$item->selling_price	}}</td>
                            <td>{{$item->product_qty}}</td>
                            <td>{{ round($item->discount_price*100/$item->selling_price ) }}%</td>
                           <td>
                             @if ($item->status == 1)
                            <span class="badge badge-pill bg-success">Actived</span>
                                
                            @else
                            <span class="badge badge-pill bg-danger">Inactived</span>
                            @endif
                        </td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <a class="btn btn-success" href="{{route('admin.product.edit', $item->id)}}" title="Edit" > <i class="fa fa-pencil"></i> </a>
                                        
                                    </div>
                                    <div class="col"><a class="btn btn-info" id="details" href="" title="Details">  <i class="fa fa-eye"></i> </a></div>
                                    <div class="col">
                                        <form action="{{route('admin.product.delete')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <button class="btn btn-danger" id="delete" type="submit" title="Delete">  <i class="fa fa-trash"></i> </button>
                                        </form>
    
                                    </div>
                                    <div class="col">
    
                                        @if ($item->status == 1)
                                        <a class="btn btn-warning" id="details" href="{{route('admin.product.status', $item->id)}}" title="Inactive">  <i class="fa-solid fa-thumbs-down"></i> </a>
                                        @elseif($item->status == 0)
                                        <a class="btn btn-primary" id="details" href="{{route('admin.product.status', $item->id)}}" title="Active">  <i class="fa-solid fa-thumbs-up"></i> </a>
                                        @endif
                                    </div>
                                </div>
                                {{-- <a class="btn btn-success" href="{{route('admin.product.edit', $item->id)}}" title="Edit" > <i class="fa fa-pencil"></i> </a>
                                <a class="btn btn-info" id="details" href="" title="Details">  <i class="fa fa-eye"></i> </a>
                                <a class="btn btn-danger" id="delete" href="" title="Delete">  <i class="fa fa-trash"></i> </a>

                                @if ($item->status == 1)
                                <a class="btn btn-warning" id="details" href="{{route('admin.product.status', $item->id)}}" title="Inactive">  <i class="fa-solid fa-thumbs-down"></i> </a>
                                @elseif($item->status == 0)
                                <a class="btn btn-primary" id="details" href="{{route('admin.product.status', $item->id)}}" title="Active">  <i class="fa-solid fa-thumbs-up"></i> </a>
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