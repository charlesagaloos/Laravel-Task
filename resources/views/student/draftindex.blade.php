@extends('layouts.userlayout')
@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>

<style>
    body{
        overflow-y: hidden !important
    }

    .instagram{
        width:50%;
        height:100%;
        margin:auto;
        margin-bottom:2rem;
        border-radius: 25px;
        background: rgba(0,0,0,.1)

    }

.content-scrollable{
    height:700px;
    width:100%;
    position: relative;
    overflow-y: scroll;

  }
  .masonry{
    column-count: 2;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    margin: 70px 0px 20px;
  }
  .box{
    border-radius: 10px;
    width: 500px;
    /* height: 700px; */
    position: relative;
    margin-bottom:16px;
    margin:auto;
    background: white;

    box-shadow: 1px 5px 5px rgba(0,0,0,.6);
  }
  .scrollable{
    /* height:500px;
    margin:auto;
    overflow-y: scroll; */
    height:700px;
    overflow-y: scroll;
    border-radius: 25px;
    border: 2px solid rgba(255,255,255,.6);
    padding: 15px;

  }

  #style-2::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;
}

#style-2::-webkit-scrollbar
{
	width: 12px;
	background-color: #F5F5F5;
}

#style-2::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #003d92;
}
  .box-header{
    height:5%;
  }
  .box-header p{
    text-align:left;
  }
  .box-body{
    height:90%;
  }
  .box-body .box-image{
    height:60%;
    /* position: relative; */
    box-shadow: 1px 5px 5px rgba(0,0,0,.6);
  }
  .box-body .box-details{
    /* height:20%;
    overflow-y:scroll;
    margin-top:10px; */
    /* position: relative; */
  }


  .box-footer{
    height:5%;
    padding:5px;

  }
  .portal{
    float:left;
    width:20%;
    margin-top:10%;
    margin-left:10%;
    margin-bottom: 2rem;
    box-shadow: 1px 5px 5px rgba(0,0,0,.6);
  }
  .ads{
    width:20%;
    /* margin:auto; */
    /* margin-top:10%; */
    margin-top:10%;
    float: right;
    margin-right:10%;
    margin-bottom: 2rem;
    box-shadow: 1px 5px 5px rgba(0,0,0,.6);
  }


  .course{
    width:40%;
    /* float:left; */
    float:left;
    margin-bottom: 2rem;
  }
  .myCarousel{

  }

</style>

    <div class="content-scrollable">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                  <img src="{{url('/images/welcom.png')}}" alt="welcome" style="width:100%; object-fit:cover;" >
                </div>

                <div class="item">
                  <img src="{{url('/images/cover.png')}}" alt="cover" style="width:100%; object-fit:cover;">
                </div>

                <div class="item">
                    <img src="{{url('/images/school.png')}}" alt="school" style="width:100%; object-fit:cover;">
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
        <div class="announcement" style="text-align: left; padding-left:20px;">
            <h1>Announcements!!!</h1>
        </div>
        <div class="instagram">
            <div class="custom-announcement">
                <div class="scrollable" id="style-2" >
                    <div class="masonry" style="padding:1rem; margin-top:1rem;">
                        {{-- <div class="scrollable"> --}}
                            @foreach ($anc as $a)
                        <div class="box">
                            <div class="box-header">
                                <p>{{ $a->title }}</p>
                            </div>
                            <div class="box-body">
                                <div class="box-image">
                                    <img class="slider-img"src="{{  asset($a->filename) }}" alt="Chania" style="width:100%; height:100%; object-fit:cover;">
                                </div>
                                <h3>Content</h3>
                                <div class="box-details" style="background:rgba(0,0,0,.1); box-shadow: 1px 5px 5px rgba(0,0,0,.2);">

                                    <p>{{ $a->content }}</p>
                                </div>
                            </div>
                            <div class="box-footer">
                                <p>Posted At: {{ date('M d, Y | h:i a', strtotime($a->start_date))}}</p>

                            </div>
                        </div>
                            @endforeach
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner" style="margin-bottom: 2rem;">
                <div class="item active">
                  <img src="{{url('/images/uniform.jfif')}}" alt="welcome" style="width:80%; object-fit:cover; margin:auto;" >
                </div>

                <div class="item">
                  <img src="{{url('/images/class.jfif')}}" alt="cover" style="width:80%; object-fit:cover; margin:auto;">
                </div>
            </div>
        </div>
        <div class="enroll" style="text-align: center;">
            <h1>ENROLL NOW!!!</h1>
        </div>
        <div class="portal">
            <div class="img">
                <img src="{{url('/images/portal2.png')}}" alt="cover" style="width:100%; object-fit:cover;">
              </div>
        </div>
        <div class="course">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner" style="margin-bottom: 2rem;">
                    <div class="item active">
                      <img src="{{url('/images/course1.png')}}" alt="welcome" style="width:100%; object-fit:cover;  margin:auto;" >
                    </div>

                    <div class="item">
                      <img src="{{url('/images/course2.png')}}" alt="cover" style="width:100%; object-fit:cover;  margin:auto;">
                    </div>

                    <div class="item">
                        <img src="{{url('/images/course3.jpg')}}" alt="cover" style="width:100%; object-fit:cover; margin:auto;">
                      </div>
                </div>
            </div>
        </div>
        <div class="ads">
            <div class="img">
                <img src="{{url('/images/enroll.jfif')}}" alt="cover" style="width:100%; object-fit:cover;">
              </div>
        </div>
    </div>


@endsection
