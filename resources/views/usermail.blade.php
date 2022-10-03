<h1>Hi, {{ $user->firstname }}</h1>
<h2>Congratulations! You may now login your account.</h2>
<h3>Your User ID is : {{$user->appnum}}</h3>
<h4>Your password is your lastname</h4>
<p>Please Verify your account.</p>

<p>Click <a href="{{ url('/verifyEmail/'.$user->emailVerify_token)}}">here</a> to verify your account</p>
