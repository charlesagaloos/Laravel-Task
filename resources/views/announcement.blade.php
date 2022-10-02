@extends('layouts.layout')
@section('content')

{{-- <button class="button-29" role="button">Create Announcement</button> --}}

<div class="asd"style="width:100%; float:left; margin-top:5%;">
    <ol class="breadcrumb" style="float: right;">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Line Chart</li>
        <li class="active">Create Announcement</li>
    </ol>
</div>
@if (count($errors) > 0)
<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
  <div class="col-sm-12" style="text-align: center; font-size:30px; background-color:lightblue;">

        <label>Create Announcement</label>
    </div>

  <div class="container">
    <div class="space">
        <br>
    </div>

    <div class="create-announcement">
    <div class="row">
        <br>
        <br>

     <!-- -->
     <form method="post" action="{{ route('upload-announce')}}" enctype="multipart/form-data">
      @csrf
      <div class="row">

     <!-- -->
     <br>
     <br>
     <br>
        <div class="col-sm-1" style="text-align:center;font-size:20px;margin-top:5px" >
          <label for='title'>Title</label>
        </div>
        <div class="col-sm-11" style="margin-top:5px">
          <input type='text' id='title' name="title" style="width:100%; " value="{{ old('title') }}"/>
        </div>

      </div>
      <div class="row" style="text-align: center">
        <div class="col-sm-6">
          <label>Start Date</label>
          <input style="width:70%" type="date" name="start_date">
        </div>
        <div class="col-sm-6">
          <label>End Date</label>
          <input style="width:70%" type="date" name="end_date">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12" style="font-size:20px;margin-left:20px;">
          <label>Content</label>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12" style="margin-left:20px;">
          <textarea style=" width:98%;height:120px;" name='content' >{{ old('content')}}</textarea>
        </div>
      </div>

      <div class="input-group control-group increment" style="margin-top:10px;" >
        <input type="file" name="filename[]" multiple class="form-control" style="background-color:transparent; border:none;">
        <div class="input-group-btn">
        </div>
      </div>


    <!-- -->

      <div class="row">
        <div class="col-sm-12" style="text-align: right;margin-top:20px;">
          <button type="submit" class="btn btn-primary delete-user">Submit

        </button>
        </div>
      </div>



    </form>
  </div>


</div>

@endsection
