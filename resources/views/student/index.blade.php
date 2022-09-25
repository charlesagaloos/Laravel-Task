@extends('layouts.userlayout')
@section('content')

{{-- CAROUSEL SCRIPT --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>


<div class="custom-announcement">

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" datagit-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>


    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        @foreach ($anc as $a)
      <div class="item {{ $a['id']==1?'active':'' }}">
        <img class="slider-img"src="{{  asset($a->filename) }}" alt="Chania" style="width:100%; height:750px;">
        <div class="carousel-caption">
          <h3>{{ $a->title }}</h3>
          <p>{{ $a->content }}</p>
        </div>
      </div>
      @endforeach
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>


  </div>


</div>

@endsection
