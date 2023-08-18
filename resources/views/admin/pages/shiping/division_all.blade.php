@extends('admin.admin_master')
@section('title','All Division')
@section('admin')

{{-- start add modal --}}

<div class="modal fade" id="divisioModal" tabindex="-1" aria-labelledby="divisioModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="divisioModal">Add Division</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="divisionform">
                <div class="input-group">
                    <input type="text" id="division_name" name="division_name" placeholder="Enter division name " class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" type="submit" onclick="AddDivision()" >Save changes</button>
                </div>
            </form>
            </div>
      </div>
    </div>
  </div>

{{-- end add modal --}}


{{-- start edit modal --}}

<div class="modal fade" id="editdivisioModal" tabindex="-1" aria-labelledby="editdivisioModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editdivisioModal">Edit Division</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="divisionform">
                <div class="input-group">
                    <input type="text" id="edit_division_name" name="edit_division_name" placeholder="Enter division name " class="form-control">
                </div>
                <div class="modal-footer">
                <input type="hidden" id="div_id" value="">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" type="submit" onclick="updateDivision()" >Update</button>
                </div>
            </form>
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
                    <button  class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#divisioModal">Add Division</button>
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
<h6 class="mb-0 text-uppercase">ALl Division</h6>
<hr/>
<div class="card">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>SL</th>
                <th>Division Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="show_division">

            </tbody>
            <tfoot>
                <tr>
                    <th>SL</th>
                    <th>Division Name</th>
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