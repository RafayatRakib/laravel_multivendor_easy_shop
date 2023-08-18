@extends('admin.admin_master')

@section('title','All Slider')
    
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
                    <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('add.slider')}}" type="button" class="btn btn-primary">Add Slider</a>
                
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">ALl Slider</h6>
<hr/>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Slider Image</th>
                        <th>Slider Title</th>
                        <th>Short Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($slider as $key=> $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td><img src="{{asset($item->slider_image)}}" alt="Brand" style="height: 40px; width: 70px;" srcset=""></td>
                        <td>{{$item->slider_title}}</td>
                        <td>{{$item->short_title}}</td>
                        <td>
                            <div class="row">
                                <div class="col">
                                    <a class="btn btn-info" href="{{route('edit.slider', $item->id)}}">Edit</a>
                                </div>
                                <div class="col">

                            
                                <form action="{{route('delete.silder')}}"  method="post">
                                    @csrf
                                    <input type="hidden" name="id"  value="{{$item->id}}" >
                                    <input class="btn btn-danger"  id="delete" type="submit" value="Delete" >
                                </div>
                            </form>
                        </div>
                        </td>
                    </tr>    
                    @empty
                        {{"No data available in table"}}
                    @endforelse
                    
                   

                </tbody>
                <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Slider Image</th>
                        <th>Slider Title</th>
                        <th>Short Title</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection