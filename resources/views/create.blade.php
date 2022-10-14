@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')



<section class="content">


    <div class="asd"style="width:100%; float:left; margin-top:5%;">
        <ol class="breadcrumb" style="float: right;">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Line Chart</li>
            <li class="active">New Admin
        </ol>
    </div>
    <div class="row" style="margin-top:5%;">
      <div style="margin:auto; width:1000px; margin-top:70px;">
        <div class="box">



            <div class="box box-info" style="width:100%; margin: auto; padding:15px;"   >
                @if ($errors->any())
    <div class="alert alert-danger">
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
                <div class="box-header with-border">
                <h3 class="box-title">Create New Admin</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="row">
                    <form form="{{ route('admin.store') }}" method="POST">
                        @csrf
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4" style="padding:10px;">
                                    <div class="left">
                                        <strong>First Name</strong>
                                        <input type="text" name="firstname" class="form-control" placeholder="firstname" required placeholder="firstname" autofocus minlength="2" pattern="[^()/><\][\\\x22,;|]+"  onkeydown='preventNumbers(event)' onkeyup='preventNumbers(event)'>
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding:10px;">
                                    <div class="left">
                                        <strong>Middle Name</strong>
                                        <input type="text" name="middlename" class="form-control" placeholder="middle name" required placeholder="middlename" autofocus minlength="2" pattern="[^()/><\][\\\x22,;|]+"  onkeydown='preventNumbers(event)' onkeyup='preventNumbers(event)'>
                                    </div>

                                </div>
                                <div class="col-md-4" style="padding:10px;">
                                    <div class="left">
                                        <strong>Last Name</strong>
                                        <input type="text" name="lastname" class="form-control" placeholder="lastname" required placeholder="lastname" autofocus minlength="2" pattern="[^()/><\][\\\x22,;|]+"  onkeydown='preventNumbers(event)' onkeyup='preventNumbers(event)'>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" style="padding:10px;">
                                    <div class="left">
                                        <strong>Username</strong>
                                        <input type="text" name="username" class="form-control" placeholder="username" required placeholder="username" autofocus minlength="8">
                                    </div>

                                </div>
                                <div class="col-md-4" style="padding:10px;">
                                    <div class="left">
                                        <strong>Email</strong>
                                        <input type="email" name="email" class="form-control" placeholder="Email" required placeholder="email address">
                                    </div>
                                </div>

                                <div class="col-md-4" style="padding:10px;">
                                    <div class="left">
                                        <strong>Birth Place</strong>
                                        <input type="text" name="birthplace" class="form-control" placeholder="Birth Place" required placeholder="birthplace">
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding:10px;">
                                    <div class="left">
                                        <strong>Birthday</strong>
                                        <input id="birthday" type="date" name="birthday" class="form-control" placeholder="Birthday" required onchange='agecalculator()'>

                                    </div>
                                </div>
                                <div class="col-md-4" style="padding:10px;">
                                    <div class="left">
                                        <strong>Age</strong>
                                        <input type='text' id='input_age' class="form-control" value="{{ old('agevalue')}}" name="agevalue">
                                                {{-- &nbsp&nbsp&nbsp <span class='agehere'></span> --}}
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding:10px;">
                                    <div class="left">
                                        <strong>Gender</strong>
                                        {{-- <input type="text" name="gender" class="form-control" placeholder="Gender" required> --}}
                                        <div class="col-90">
                                            <input type="radio" id="male" name="gender" value="Male" @if (old('gender'))
                                                checked
                                            @endif/>Male
                                            <input type="radio" id="female" name="gender" value="Female" @if (old('gender'))
                                            checked
                                        @endif/>Female
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4" style="padding:10px;">
                                    <div class="left">
                                        <strong>Contact</strong>
                                        <input id="contact" type="tel" class="form-control" name="contact"  onkeypress="return onlyNumberKey(event)" maxlength=11  placeholder="only 11 digits are allowed">
                                    </div>

                                </div>

                                <div class="col-md-4" style="padding:10px;">
                                    <div class="left">
                                        <strong>Address</strong>
                                        <input type="text" name="address" class="form-control" placeholder="Address" required placeholder="address">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:15px;">

                                <div class="col-md-12">
                                    <button style= "margin:auto; width:100%; display:block;" type="submit" class="btn btn-success">Submit</button>
                                </div>

                            </div>
                        </div>

                        {{-- <div class="col-sm-12">
                            <div class="left">
                                <strong>First Name</strong>
                                <input type="text" name="firstname" class="form-control" placeholder="firstname" required>
                            </div>

                            <div class="left">
                                <strong>Middle Name</strong>
                                <input type="text" name="middlename" class="form-control" placeholder="middle name" required>
                            </div>

                            <div class="left">
                                <strong>Last Name</strong>
                                <input type="text" name="lastname" class="form-control" placeholder="lastname" required>
                            </div>

                            <div class="left">
                                <strong>Gender</strong>
                                <input type="text" name="gender" class="form-control" placeholder="Gender" required>
                            </div>

                            <div class="left">
                                <strong>Birthday</strong>
                                <input type="text" name="birthday" class="form-control" placeholder="Birthday" required>
                            </div>

                            <div class="left">
                                <strong>Birth Place</strong>
                                <input type="text" name="birthplace" class="form-control" placeholder="Birth Place" required>
                            </div>

                            <div class="left">
                                <strong>Contact</strong>
                                <input type="text" name="contact" class="form-control" placeholder="Contact" required>
                            </div>

                            <div class="left">
                                <strong>Email</strong>
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>

                            <div class="left">
                                <strong>Address</strong>
                                <input type="text" name="address" class="form-control" placeholder="Address" required>
                            </div>
                            <br>
                            <div class="center">
                                <button style= "margin:auto; width:100%; display:block;" type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>

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
    $(document).ready(function(){

        var lowerCaseLetters = /[a-z]/g;
        var numbers = /[0-9]/g;
        var upperCaseLetters = /[A-Z]/g;
    //   var email_pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    //   var pattern = /[^a-zA-Z0-9\!\@\#\$\%\^\*\_\|]+/;
      $("#register-form").submit(function(){
        //   let name = $("#name").val();
          let password =$("#password").val();
          let cpass = $("#password-confirm").val();
          let email = $("#email").val();



          if(email == ""){
            swal({
            title: "Missing",
            text: 'Please insert your email',
            icon: "warning",
            button: "OK",
            });

            return false;
          }else if(email_pattern.test(email) && email != "")
          {

          }else{
            swal({
            title: "Missing",
            text: 'Invalid Email format!',
            icon: "warning",
            button: "OK",
            });

              return false;
          }



               if(!password.match(lowerCaseLetters) ){
                    swal({
                    title: "Password pattern",
                    text: 'Password must contain lowercase letters',
                    icon: "warning",
                    button: "OK",
                   });
                    return false;
                }
                 if(!password.match(upperCaseLetters) ){
                    swal({
                        title: "Password pattern",
                        text: 'Password must contain uppercase letters',
                        icon: "warning",
                        button: "OK",
                       });
                        return false;
                }
                 if(!password.match(numbers)){
                    swal({
                        title: "Password pattern",
                        text: 'Password must contain numbers',
                        icon: "warning",
                        button: "OK",
                       });
                        return false;
                }

          if(password == ""){
            swal({
            title: "Missing",
            text: 'Please insert your password',
            icon: "warning",
            button: "OK",
            });

            return false;
          }else if(password.length > 0 && password.length < 10){
              swal({
            title: "Length",
            text: 'Atleast 10 characters',
            icon: "warning",
            button: "OK",
            });

              return false;
          }
          if(cpass == ""){
            swal({
            title: "Missing",
            text: 'Please confirm your password',
            icon: "warning",
            button: "OK",
            });

            return false;
          }else if(cpass != password){
              swal({
            title: "Warning",
            text: 'Password did not match!',
            icon: "warning",
            button: "OK",
            });
              return false;
          }




      });

     })

        function onlyNumberKey(evt) {

        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
        }

        function preventNumbers(e){
        var keyCode = (e.keyCode ? e.keyCode : e.which);
        if(keyCode > 47 && keyCode < 58 || keyCode > 95 && keyCode < 107)
        {
            e.preventDefault();
        }
    }
        function agecalculator(){
               var dNow = new Date();

            var birthdate = document.getElementById('birthday');
            var birthday = new Date(birthdate.value);

            var cmm = dNow.getMonth()+1;
            var cdd = dNow.getDate();
            var cyy = dNow.getFullYear();

            var dd = birthday.getDate()+1;
            var mm = birthday.getMonth()+1;
            var yy = birthday.getFullYear();

            var agebyyear = Math.abs(yy - dNow.getFullYear());

            if((agebyyear > 12 && mm < cmm ) || (agebyyear > 12 && mm == cmm && dd <= cdd))
            {
                $(".agehere").html(agebyyear+ " years old");
                $('#input_age').val(agebyyear);
            }else if((agebyyear > 12 && mm > cmm ) || (agebyyear > 12 && mm == cmm && dd >= cdd)){
                $(".agehere").html(agebyyear - 1 + " years old");
                $('#input_age').val(agebyyear - 1);
            }
            else
            {

                $(".agehere").html("Underage");
                $('#input_age').val(null);
            }


    }

</script>
