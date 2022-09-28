@extends('layouts.app')
<style>
    *{
        color:white;
    }

    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input[type=number] {
  -moz-appearance: textfield;
}
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background:rgba(255, 255, 255, .2); backdrop-filter:blur(10px);">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="register-form">
                        @csrf

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus placeholder="firstname" minlength="2" onkeyup="this.value=this.value.replace(/[^a-zA-Z0-9]/g, '')"  onkeydown='preventNumbers(event)' onkeyup='preventNumbers(event)'>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="middlename" class="col-md-4 col-form-label text-md-right">{{ __('Middle Name') }}</label>

                            <div class="col-md-6">
                                <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ old('middlename') }}" required autocomplete="middlename" autofocus placeholder="middlename" minlength="2" onkeyup="this.value=this.value.replace(/[^a-zA-Z0-9]/g, '')" onkeydown='preventNumbers(event)' onkeyup='preventNumbers(event)'>

                                @error('middlename')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus placeholder="lastname" minlength="2" onkeyup="this.value=this.value.replace(/[^a-zA-Z0-9]/g, '')" onkeydown='preventNumbers(event)' onkeyup='preventNumbers(event)'>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="it should contain @,.">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required autocomplete="new-password" placeholder="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required autocomplete="new-password" placeholder="confirm-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6" style="display:flex; align-items:center;">
                                {{-- <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}"> --}}
                                <div class="col-90">
                                    <input type="radio" id="male" name="gender" value="Male" @if (old('gender'))
                                        checked
                                    @endif/>Male
                                    <input type="radio" id="female" name="gender" value="Female" @if (old('gender'))
                                    checked
                                @endif/>Female
                                </div>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" placeholder="birthday" onchange='agecalculator()'>
                                <input type='hidden' id='input_age' value="{{ old('agevalue')}}" name="agevalue">
                                &nbsp&nbsp&nbsp <span class='agehere'></span>
                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="birthplace" class="col-md-4 col-form-label text-md-right">{{ __('Birth Place') }}</label>

                            <div class="col-md-6">
                                <input id="birthplace" type="text" class="form-control @error('birthplace') is-invalid @enderror" name="birthplace" value="{{ old('birthplace') }}" placeholder="birthplace">

                                @error('birthplace')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Contact') }}</label>

                            <div class="col-md-6">

                                <input type="tel" id="contact" name="contact" class="form-control @error('contact') is-invalid @enderror" value="{{ old('contact')}}" onkeypress="return onlyNumberKey(event)" maxlength=11 placeholder="only 11 digits are allowed">

                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
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
@endsection
