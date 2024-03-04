<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Evento login</title>
  <link rel="stylesheet" href="/assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="/assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="wrapper">
    <div class="inner">
      <div class="image-holder">
        <img src="/assets/images/Black Coffee - SA.jpg" alt="">
      </div>
      <form method="POST" action="/login">
        @csrf
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" required>
          @error('email')
            <span class="error-message">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>
          @error('password')
            <span class="error-message">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <button type="submit" class="btn">Log in</button>
        </div>
        @if (Route::has('password.request'))
        @endif
        <div class="container_reg">
          
          <a href="" style="color: #ff3366;">Forgot your password?</a>
          <a type="button" href="/register" class="btn_register">Register</a>
        </div>
      </form> 
    </div>
  </div>
  <script src="/assets/js/jquery-3.3.1.min.js"></script>
  <script src="/assets/js/main.js"></script>
</body>
</html>
