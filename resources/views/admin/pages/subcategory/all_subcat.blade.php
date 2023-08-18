@extends('admin.admin_master')

@section('title','All Sub Category')
    
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
                <a href="{{route('add.sub.cat')}}" type="button" class="btn btn-primary">Add Sub category</a>
                
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">ALl Category</h6>
<hr/>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Category Name</th>
                        <th>Sub Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subcat as $key=> $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->category->cat_name}}</td>
                        <td>{{$item->subcat_name}}</td>
                        <td>
                            <a class="btn btn-info" href="{{route('edit.sub.cat', $item->id)}}">Edit</a>
                            <a class="btn btn-danger" id="delete" href="{{route('delete.sub.cat',$item->id)}}">Delete</a>
                        </td>
                    </tr>    
                    @empty
                        {{"No data available in table"}}
                    @endforelse
                    
                   

                </tbody>
                <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Category Name</th>
                        <th>Category Image</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection