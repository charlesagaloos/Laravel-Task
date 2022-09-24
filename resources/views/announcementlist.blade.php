@extends('layouts.layout')
@section('content')
{{-- <button class="button-29" role="button">Create Announcement</button> --}}
<div class="space">
    <br>
</div>

<div class="create-announcement">
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

  @if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
@endif
<div class="container">
    <div class="row">
        <br>
        <br>
        <div class="justify" style="text-align: center; font-size:30px; background-color:lightblue;">
          <label> Announcement</label>
        </div>
      </div>

     <div class="container-fluid">
        <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
          <thead>
          <tr>
            <th style="width: 5%">Title</th>
            <th style="width: 45%">Content</th>
            <th style="width: 8%">Start</th>
            <th style="width: 8%">End</th>
            <th style="width: 16%">Image</th>
            <th style="width: 15%">Option</th>

          </tr>
          </thead>
          @php

            @endphp
            @foreach ($anc as $a)
                <tbody>
                    <tr id="student_id_{{ $a->id }}">
                        {{-- <td>{{ $student->id }}</td> --}}
                        <td>{{ $a->title }}</td>
                        <td>{{ $a->content }}</td>
                        <td>{{ $a->start_date }}</td>
                        <td>{{ $a->end_date }}</td>
                        <td><img class="imagedone" width=60% height=60% src="{{ URL::to($a->filename) }}"></td>
                        <td>
                            <div class="btn-group">
                                <form action="{{ route('announcement.delete',$a->id) }}" method="POST">
                                    <a class="btn btn-success" href="{{ url('announcement/edit/'.$a->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" data-id="{{ $a->id }}" class="btn btn-danger delete-user">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>




                                </form>
                            </div>


                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
      </div>

      {!! $anc->links() !!}


    </div>

</div>

</div>

@endsection


