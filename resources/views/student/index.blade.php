@extends('layouts.userlayout')
@section('content')
{{-- <div class="padding" style="margin-left:21%">
 @foreach ($anc as $a)
 <div class="instagram-card">
  <div class="instagram-card-header">
    <div class="instagram-card-time">{{ $a->start_date}}</div>
  </div>

  <div class="instagram-card-content">
   <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    </ol>
    <div class="carousel-inner">
      @php
      $image =  explode('|',$a->file);
      @endphp
        @foreach($image as $key => $image)
        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">

          <img class="imagedone" width=60% height=60% src="{{ URL::to($a->filename) }}">
        </div>

        @endforeach
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


  </div> --}}

  {{-- <div class="instagram-card-content">
  <p class="likes"><b>Title :</b>{{ $a->title }}
  <p><b>Content :</b>{{ $a->content }}


        <p><b>End :</b>{{ $a->end_date}}
  </div> --}}
  {{-- <div class="instagram-card-footer">
    <a class="footer-action-icons" href="#"><i class="fa fa-heart-o"></i></a>
    <input class="comments-input" type="text" placeholder="Leave a comment..."/>
    <a class="footer-action-icons" href="#"><i class="fa fa-ellipsis-h"></i></a>
  </div> --}}

  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

    <div class="carousel-inner"></div>
    @foreach ($anc as $a)
      <div class="carousel-item active">
        @if($a->filename)
        <img src="{{ asset($a->filename) }}" class="d-block w-100" >
        @endif
        <div class="carousel-caption d-none d-md-block">
          <h5>{{ $a->title }}</h5>
          <p>{{ $a->content }}</p>
        </div>
      </div>

      @endforeach


    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>



  <br>
  <br>
{{-- @endforeach --}}
  </div>
</div>



@endsection
