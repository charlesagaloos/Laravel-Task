@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12" style="text-align: center">
        <div >
            <h2>Laravel 7 CRUD using Bootstrap Modal</h2>
        </div>
        <br/>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a href="javascript:void(0)" class="btn btn-success mb-2" id="new-customer" data-toggle="modal">New Customer</a>
        </div>
    </div>
</div>
<br/>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p id="msg">{{ $message }}</p>
    </div>
@endif
<table class="table table-bordered">
    <tr>
        <th>No.</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th>Birth Place</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Option</th>
    </tr>

    @foreach ($students as $student)
    <tr>
        <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->gender }}</td>
                <td>{{ $student->birthday }}</td>
                <td>{{ $student->birthplace }}</td>
                <td>{{ $student->contact }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->address }}</td>
        <td>
        <form action="{{ url('students/'.$student->id) }}" method="POST">
            <a class="btn btn-info" id="show-customer" data-toggle="modal" data-id="{{ $student->id }}" >Show</a>
            <a href="javascript:void(0)" class="btn btn-success" id="edit-customer" data-toggle="modal" data-id="{{ $student->id }}">Edit </a>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <a id="delete-customer" data-id="{{ $student->id }}" class="btn btn-danger delete-user">Delete</a></td>
        </form>
        </td>
    </tr>
    @endforeach

</table>
{!! $students->links() !!}
<!-- Add and Edit customer modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="customerCrudModal"></h4>
            </div>
            <div class="modal-body">
            <form name="custForm" action="{{ route('student.store') }}" method="POST">
                <input type="hidden" name="cust_id" id="cust_id" >
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>First Name</strong>
                            <input type="text" name="firstname" class="form-control" placeholder="firstname" onchange="validate()">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Middle Name</strong>
                            <input type="text" name="middlename" class="form-control" placeholder="middle name" onchange="validate()">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Last Name</strong>
                            <input type="text" name="lastname" class="form-control" placeholder="lastname" onchange="validate()">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Gender</strong>
                            <input type="text" name="gender" class="form-control" placeholder="Gender" onchange="validate()">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Birthday</strong>
                            <input type="text" name="birthday" class="form-control" placeholder="Birthday" onchange="validate()">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Birth Place</strong>
                            <input type="text" name="birthplace" class="form-control" placeholder="Birth Place" onchange="validate()">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Contact</strong>
                            <input type="text" name="contact" class="form-control" placeholder="Contact" onchange="validate()">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email</strong>
                            <input type="email" name="email" class="form-control" placeholder="Email" onchange="validate()">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Address</strong>
                            <input type="text" name="address" class="form-control" placeholder="Address" onchange="validate()">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Submit</button>
                        <a href="{{ route('student.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection
<script>
error=false

function validate()
{
	if(document.custForm.name.value !='' && document.custForm.email.value !='' && document.custForm.address.value !='')
	    document.custForm.btnsave.disabled=false
	else
		document.custForm.btnsave.disabled=true
}
</script>
