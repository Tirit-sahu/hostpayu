<!DOCTYPE html>
<html>

<!-- Mirrored from thetheme.io/flaty/extra_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Jul 2020 04:49:17 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Login - Field Survey App</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

<!--base css styles-->
<link rel="stylesheet" href="{{ asset('public/assets/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/font-awesome/css/font-awesome.min.css') }}">

<!--page specific css styles-->

<!--flaty css styles-->
<link rel="stylesheet" href="{{ asset('public/css/flaty.css') }}">
<link rel="stylesheet" href="{{ asset('public/css/flaty-responsive.css') }}">

<link rel="shortcut icon" href="{{ asset('public/img/favicon.html') }}">
</head>
<body class="login-page">

<!-- BEGIN Main Content -->
<div class="login-wrapper">

      @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

<!-- BEGIN Login Form -->
<form id="form-login" method="POST" action="{{ route('login') }}">
    @csrf

<h3>Login to your account</h3>
<hr/>
<div class="form-group">
<div class="controls">
<input type="email" name="email" :value="old('email')" required autofocus placeholder="Email" class="form-control" />
</div>
</div>
<div class="form-group">
<div class="controls">
<input type="password" name="password" required autocomplete="current-password" placeholder="Password" class="form-control" />
</div>
</div>
<div class="form-group">
<div class="controls">
<label class="checkbox">
<input id="remember_me" type="checkbox" class="form-checkbox" name="remember" /> Remember me
</label>
</div>
</div>
<div class="form-group">
<div class="controls">
     @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif  
<button type="submit" class="btn btn-primary form-control">Sign In</button>
</div>
</div>
<hr/>

</form>
<!-- END Login Form -->

</div>
<!-- END Main Content -->


<!--basic scripts-->
<script src="../../ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="{{ asset("public/assets/jquery/jquery-2.1.1.min.js") }}"><\/script>')</script>
<script src="{{ asset('public/assets/bootstrap/js/bootstrap.min.js') }}"></script>

<script type="text/javascript">
function goToForm(form)
{
$('.login-wrapper > form:visible').fadeOut(500, function(){
$('#form-' + form).fadeIn(500);
});
}
$(function() {
$('.goto-login').click(function(){
goToForm('login');
});
$('.goto-forgot').click(function(){
goToForm('forgot');
});
$('.goto-register').click(function(){
goToForm('register');
});
});
</script>
</body>

<!-- Mirrored from thetheme.io/flaty/extra_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Jul 2020 04:49:17 GMT -->
</html>
