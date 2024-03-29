<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
@include('components.header')
</head>
<body class="hold-transition login-page" style="background-image: url({{ asset('/images/login.jpg') }}); background-size:100% 100%;">
<div class="overlay-wrapper"></div>

  <div class="login-box">
    <div class="text-center">
      <img src="{{ asset('/images/TrinidadLogo.png') }}" height="150" width="150">
    </div>
    <div class="login-logo">
      <strong><a href="#" class="text-light" style="text-shadow: 2px 3px #000000;">{{ $settings[0]->setting_description }}</a></strong>
    </div>
    
    <div class="card rounded">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
    
      <div class="input-group mb-3">
          <input type="text" id="txt_username" class="form-control" placeholder="Username">
          <div class="input-group-append">
          <div class="input-group-text">
              <span class="fas fa-user"></span>
          </div>
          </div>
      </div>
      <div class="input-group mb-3">
          <input type="password" id="txt_password" class="form-control" placeholder="Password">
          <div class="input-group-append">
          <div class="input-group-text">
              <span class="fas fa-lock"></span>
          </div>
          </div>
      </div>
      <div class="row">
          <div class="col-8">
          <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
              Remember Me
              </label>
          </div>
          </div>

          <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block" id="btn_signin">Sign In</button>
          </div>
          
      </div>

        <div class="social-auth-links text-center mb-3">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
          </a>
        </div>

        <p class="mb-1">
          <a href="#" id="btn_forgot_pass">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="#" class="text-center">Register a new membership</a>
        </p>
      </div>
    </div>
  </div>

@include('components.footer')
<script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
