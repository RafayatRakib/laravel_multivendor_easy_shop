@extends('admin.admin_master')
@section('title','All District')
@section('admin')

{{-- start add modal --}}

<div class="modal fade" id="DistrictoModal" tabindex="-1" aria-labelledby="DistrictoModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="DistrictoModal">Add District</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <select class="form-control" name="option_division" id="option_division"  required>
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" id="district_name" required name="district_name" placeholder="Enter district_name name " class="form-control">
                    </div>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" type="submit" onclick="AddDistrict()" >Save changes</button>
                </div>
            </div>
      </div>
    </div>
  </div>

{{-- end add modal --}}


{{-- start edit modal --}}

<div class="modal fade" id="editDistrictoModal" tabindex="-1" aria-labelledby="editDistrictoModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editDistrictoModal">Edit District</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <select class="form-control" name="edit_option_division" id="edit_option_division"  required>
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" id="edit_district_name" required name="edit_district_name" placeholder="Enter district_name name " class="form-control">
                    </div>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="hidden" id="dis_id" value="">
                    <button type="button" class="btn btn-primary" type="submit" onclick="updateDistrict()" >Update</button>
                    
                </div>
            </div>
    </div>
</div>
</div>

{{-- end edit modal --}}


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
            <div class="btn-group ">
                <div class="col-auto">
                    <button  class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#DistrictoModal">Add District</button>
                  </div>
                {{-- <form class="row g-3"action="{{route('add.division')}}" method="post">
                    @csrf
                    <div class="col-auto">
                      <label for="inputPassword2" class="visually-hidden">Add division</label>
                      <input type="text" class="form-control" name="division_name" id="inputPassword2" placeholder="Add division">
                    </div>
                    <div class="col-auto">
                      <button type="submit" class="btn btn-primary mb-3">Add</button>
                    </div>
                  </form> --}}
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">ALl District</h6>
<hr/>
<div class="card">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>SL</th>
                <th>Division Name</th>
                <th>District Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="show_district">

            </tbody>
            <tfoot>
                <tr>
                    <th>SL</th>
                    <th>Division Name</th>
                    <th>District Name</th>
                    <th>Action</th>
                </tr>
            </tfoot>
          </table>
          
        {{-- <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Division Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="divisionview">

                    @forelse ($division as $key=> $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->division_name}}</td>
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
                        <th>Division Name</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div> --}}
    </div>
</div>

@endsection