@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Student</h2>
        </div>
        <div class="pull-right">

        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alter-danger">
        <ul>
            @foreach ($errors-all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
    <div class="row">
        <form action="{{ route('student.update', $student->id) }}" method="POST">

    @csrf
            <div class="col-sm-4">
                <div class="left">
                    <strong>First Name</strong>
                    <input type="text" name="firstname" class="form-control" value="{{ $student->firstname }}" placeholder="Firstname" disabled>
                </div>

                <div class="left">
                    <strong>Middle Name</strong>
                    <input type="text" name="middlename" class="form-control" value="{{ $student->middlename }}" placeholder="middlename" disabled>
                </div>

                <div class="left">
                    <strong>Last Name</strong>
                    <input type="text" name="lastname" class="form-control" value="{{ $student->lastname }}" placeholder="lastname" disabled>
                </div>


                <div class="left">
                    <strong>Gender</strong>
                    <input type="text" name="gender" class="form-control" value="{{ $student->gender }}" placeholder="Gender" disabled>
                </div>

                <div class="left">
                    <strong>Birthday</strong>
                    <input type="text" name="birthday" class="form-control" value="{{ $student->birthday }}" placeholder="Birthday" disabled>
                </div>

                <div class="left">
                    <strong>Birth Place</strong>
                    <input type="text" name="birthplace" class="form-control" value="{{ $student->birthplace }}" placeholder="Birth Place" disabled>
                </div>

                <div class="left">
                    <strong>Contact</strong>
                    <input type="text" name="contact" class="form-control" value="{{ $student->contact }}" placeholder="Contact">
                </div>

                <div class="left">
                    <strong>Email</strong>
                    <input type="email" name="email" class="form-control" value="{{ $student->email }}" placeholder="Email">
                </div>

                <div class="left">
                    <strong>Address</strong>
                    <input type="text" name="address" class="form-control" value="{{ $student->address }}" placeholder="Address">
                </div>
            <br>
            <div class="left">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>

        </form>

    </div>
@endsection
