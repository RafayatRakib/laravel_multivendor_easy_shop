@extends('admin.admin_master')

@section('title','All Banner')
    
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
                <a href="{{route('admin.blog.add')}}" type="button" class="btn btn-primary">Add Blog</a>
                
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">ALl Blog</h6>
<hr/>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Blog Image</th>
                        <th>Blog Title</th>
                        {{-- <th>Banner URL</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($allblog as $key=> $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td><img src="{{asset($item->blog_image)}}" alt="Brand" style="height: 40px; width: 70px;" srcset=""></td>
                        <td>{{$item->blog_title}}</td>
                        {{-- <td>{{$item->banner_url}}</td> --}}
                        <td>
                            <div class="row">
                                <div class="col">
                                    <a class="btn btn-info" href="{{route('admin.blog.edit', $item->id)}}">Edit</a>
                                </div>
                                <div class="col">

                            
                                    <form action="{{ route('admin.blog.delete') }}" method="post" id="delete_blog_form">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}" >
                                        <input class="btn btn-danger" type="submit" value="Delete" >
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
                        <th>Blog Image</th>
                        <th>Blog Title</th>
                        {{-- <th>Banner URL</th> --}}
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#delete_blog_form').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission
            
            var form = this;
            
            // Display the default browser confirm dialog
            var confirmDelete = confirm('Are you sure? You will not be able to recover this blog!');
            
            if (confirmDelete) {
                // If user confirms, proceed with form submission
                form.submit();
            }
        });
    });
    </script>

@endsection