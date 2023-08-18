@extends('admin.admin_master')
@section('title','All Upazila')
@section('admin')

{{-- start add modal --}}

<div class="modal fade" id="UpazilaModal" tabindex="-1" aria-labelledby="UpazilaModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="UpazilaModal">Add Upazila</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="upazila_form">
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group">
                        {{-- <label for="exampleFormControlInput1" class="form-label">Select a division </label> --}}
                        <select class="form-control" name="option_division" id="option_division"  required>
                            
                        </select>
                    </div>
                </div>

                
                <div class="col-md-4">
                    <div class="input-group">
                        <select class="form-control @error('district_name') is-invalid @enderror " name="district_name" id="district_name"  required>
                            
                        </select>
                        @error('district_name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" id="upazila_name" required name="upazila_name"  placeholder="Enter upazila name " class="form-control">
                    </div>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" type="submit" onclick="AddUpazila()" >Save changes</button>
                </div>
            </form>


            </div>
      </div>
    </div>
  </div>

{{-- end add modal --}}


{{-- start edit modal --}}

<div class="modal fade" id="editUpazilaModal" tabindex="-1" aria-labelledby="editUpazilaModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editUpazilaModal">Edit Upazila</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="upazila_form">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group">
                            {{-- <label for="exampleFormControlInput1" class="form-label">Select a division </label> --}}
                            <select class="form-control" name="edit_option_division" id="edit_option_division"  required>
                                
                            </select>
                        </div>
                    </div>
    
                    
                    <div class="col-md-4">
                        <div class="input-group">
                            <select class="form-control " name="edit_district_name" id="edit_district_name"  required>
                                
                            </select>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" id="edit_upazila_name" required name="edit_upazila_name"  placeholder="Enter upazila name " class="form-control">
                            <input type="hidden" id="upazila_id" value="">
                         </div>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" type="submit" onclick="UpdateUpazila()" >Save changes</button>
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
                    <button  class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#UpazilaModal">Add Upazila</button>
                  </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">ALl Upazila</h6>
<hr/>
<div class="card">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>SL</th>
                <th>Division Name</th>
                <th>District Name</th>
                <th>Upazila Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="show_Upazila">

            </tbody>
            <tfoot>
                <tr>
                    <th>SL</th>
                    <th>Division Name</th>
                    <th>District Name</th>
                    <th>Upazila Name</th>
                    <th>Action</th>
                </tr>
            </tfoot>
          </table>
    </div>
</div>

@endsection