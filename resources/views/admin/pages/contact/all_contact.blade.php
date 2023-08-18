@extends('admin.admin_master')
@section('title','All Contact')
@section('admin')
    
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Contact Tables</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Table</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('admin.contact.add')}}" type="button" class="btn btn-primary">Add Contact</a>
                
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">All Contact</h6>
<hr/>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Contact Title</th>
                        <th>Contact Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allcontact as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->contact_title}}</td>
                        <td><img style="width: 60px" src="{{ $item->contact_image ? asset($item->contact_image) : asset('public/uploads/no_image.jpg')}}" alt="contact cover image" ></td>
                        <td>
                            @if ($item->status)
                                <p>Actived</p>
                                <a href="{{route('adimn.contact.status',$item->id)}}" class="badge bg-success">Deactive</a>
                            @else
                            <p>Deactived</p>
                             <a href="{{route('adimn.contact.status',$item->id)}}" class="badge bg-success">Active</a>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{route('admin.contact.edit',$item->id)}}">Update</a>
                            <a class="btn btn-danger" onclick="contactDelete(this.id)" id="{{$item->id}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Contact Title</th>
                        <th>Contact Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


<script type="text/javascript">

    function contactDelete(id){
    //    alert(id);
    if (confirm('Do you want to Delete?')) {
            window.location.href = `{{ url('admin/contact/delete/${id}') }}`;
        }
    }
</script>

@endsection