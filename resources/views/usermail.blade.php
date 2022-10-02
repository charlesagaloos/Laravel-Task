<h1>Hi, {{ $data->name }} !!</h1>
<h3>Your User ID is : {{$data->userid}}</h3>
<h4>Your password is your lastname</h4>
<p>Please Verify your account.</p>
<p>Click <a href="{{ url('/verifyEmail/'.$data->emailVerify_token)}}">here</a> to verify your account</p>
