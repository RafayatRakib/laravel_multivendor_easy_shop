@extends('frontend.master')
@section('title', 'Easy Shop | Review')
@section('content')
    
<style>
    .card{
    margin: auto;
    width: 85%;
    max-width:90%;
    padding: 4vh 0;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-top: 3px solid #3BB77E;
    border-bottom: 3px solid #3BB77E;
    border-left: none;
    border-right: none;
    }
    #card{
       margin-top: 70px;
    }
    /* textarea{
       box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
 
    } */
    @media(max-width:768px){
    .card{
    width: 90%;
    margin: auto;
 
    }
    }
    .title{
    color: #3BB77E;
    font-weight: 600;
    margin-bottom: 2vh;
    padding: 0 8%;
    font-size: initial;
    }
    #details{
    font-weight: 400;
    }
    .info{
    padding: 5% 8%;
    }
    .info .col-5{
    padding: 0;
    }
    #heading{
    color: grey;
    line-height: 6vh;
    }
    .pricing{
    background-color: #ddd3;
    padding: 2vh 8%;
    font-weight: 400;
    line-height: 2.5;
    }
    .pricing .col-3{
    padding: 0;
    }
    .total{
    padding: 2vh 8%;
    color: #3BB77E;
    font-weight: bold;
    }
    .total .col-3{
    padding: 0;
    }
    .footer{
    padding: 0 8%;
    font-size: x-small;
    color: black;
    }
    .footer img{
    height: 5vh;
    opacity: 0.2;
    }
    /* .footer a{
    color: #3BB77E;
    } */
    .footer .col-10, .col-2{
    display: flex;
    padding: 3vh 0 0;
    align-items: center;
    }
    .footer .row{
    margin: 0;
    }
    .gallery img {
         width: 100%;
         height: auto;
         margin-bottom: 15px;
       }
 </style>



<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{route('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> <a href="{{route('user.orders')}}" rel="nofollow">Order</a><span></span> Order Details
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <table>
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Produc name</th>
                        <th>QTY</th>
                        <th>Total</th>
                        <th>Rate and Reviews</th>
                    </tr>
                    @foreach ($item as $key => $item)
                        
                    <tr>
                        <td>{{$key+1}}</td>
                        <td> <img style="width: 50px; height:50 " src="{{asset($item->product->product_cover)}}" alt="" srcset=""> </td>
                        <td>{{$item->product->product_name}}</td>
                        <td>{{$item->qty}}</td>
                        <td>{{$item->price}}</td>
                        <td><a href="{{url('/product/details/'.$item->product->id.'/'.$item->product->product_slug)}}"> <i  class=" fa fa-star"></i><i  class=" fa fa-star"><i  class=" fa fa-star"></a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>

@endsection