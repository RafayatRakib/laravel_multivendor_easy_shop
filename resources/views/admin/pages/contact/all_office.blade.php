@extends('admin.admin_master')
@section('title','All Office')
@section('admin')
    
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Office Address Tables</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Office Address Table</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('admin.office.add')}}" type="button" class="btn btn-primary">Add Office Address</a>
                
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">All Office Address</h6>
<hr/>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Office Type</th>
                        <th>Office Address</th>
                        <th>Office Map link</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($office as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->office_type}}</td>
                        <td>{!!$item->office_address!!}</td>
                        <td><a href="{{$item->office_map}}" class="badge bg-success">Show Map</a></td>
                        <td>
                            @if ($item->status)
                            <p>Actived</p>
                            <a href="{{route('admin.office.status',$item->id)}}" class="badge bg-danger">Deactive</a>
                            @else
                            <p>Deactived</p>
                            <a href="{{route('admin.office.status',$item->id)}}" class="badge bg-success">Active</a>
                            @endif
                        </td>

                           
                        <td>
                            <a class="btn btn-info" href="{{route('admin.office.edit',$item->id)}}">Update</a>
                            <a class="btn btn-danger" onclick="officeDelete(this.id)" id="{{$item->id}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Office Type</th>
                        <th>Office Address</th>
                        <th>Office Map link</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">

    function officeDelete(id){
    //    alert(id);
    if (confirm('Do you want to Delete?')) {
            window.location.href = `{{ url('admin/office/address/delete/${id}') }}`;
        }
    }
</script>

@endsection