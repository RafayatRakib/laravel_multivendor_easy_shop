@extends('frontend.master')
@section('title', 'Easy Shop | Return')
    
@section('content')


<div class="page-content pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    @include('frontend.user.dashboard.dashboard_sidebar')


                    <div class="col-md-9">
                        <div class="tab-content account dashboard-content pl-50">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="mb-0">Your Return</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Date</th>
                                                    <th>Product</th>
                                                    <th>Total</th>
                                                    <th>Payment</th>
                                                    <th>Invoice</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($return as $key => $item)
                                                    
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$item->order->order_date}}</td>
                                                    <td> {{$item->product->product_name}} </td>
                                                    <td> ${{$item->order->amount}} </td>
                                                    <td> {{$item->order->payment_type}} </td>
                                                    <td> {{$item->order->invoice_no}} </td>
                                                    <td> 
                                                        @if($item->cancel_status == NULL)

                                                        
                                                            @if ($item->status == 'pending')
                                                            <span class="badge rounded-pill bg-warning">Pending</span>
                                                            @elseif($item->status == 'confirm')
                                                            <span class="badge rounded-pill bg-info">Confirm</span>
                                                            @elseif($item->status == 'processing')
                                                            <span class="badge rounded-pill bg-danger">Processing</span>
                                                            @elseif($item->status == 'deliverd')
                                                            <span class="badge rounded-pill bg-success">Deliverd</span>
                                                            @endif

                                                        @else
                                                        <span class="badge rounded-pill bg-warning">Refused</span>

                                                        @endif

                                                
                                                    </td>
                                                    <td>
                                                        <a href="{{route('returnDetails',$item->id)}}" class="btn btn-sm btn-danger "> <i class="fa fa-eye"></i> View</a>
                                                        {{-- <a href="{{route('user.order.invoice',$item->id)}}" class="btn-sm btn-info "> <i class="fa fa-download"></i> Invoice</a> --}}
                                                    </td>
                                                </tr>
                                                @endforeach
        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection