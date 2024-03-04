<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Forget Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link
      rel="stylesheet"
      href="/assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css"
    />

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="wrapper_forget">
      <div class="inner">
        <div class="image-holder">
          <img src="/assets/images/Black Coffee - SA.jpg" alt="" />
        </div>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <!-- Email Address -->
        <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required autofocus autocomplete="username">
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Email Password Reset Link</button>
            </div>
    </form>
      </div>
    </div>

    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/js/main.js"></script>
  </body>
</html>
