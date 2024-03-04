<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Evento Register</title>
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
    <div class="wrapper_register">
      <div class="inner">
        <div class="image-holder">
          <img src="/assets/images/reg.jpg" alt="" />
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
          <div class="form-group">
                <label for="email">Name Address</label>
                <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" >
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required autofocus autocomplete="username">
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
  <div class="form-group">
                <label for="password">Confirme Password</label>
                <input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Register</button>
            </div>
            @if (Route::has('password.request'))
                <a href="{{ route('login') }}" style="color: #ff3366;">I have already account ?</a>
            @endif
        </form>
      </div>
    </div>

    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/js/main.js"></script>
  </body>
  <!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
