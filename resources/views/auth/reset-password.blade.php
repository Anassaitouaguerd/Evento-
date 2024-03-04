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
          <img src="/assets/images/Four-Tet.jpg" alt="" />
        </div>
        <form method="POST" action="{{ route('password.store') }}">
            @csrf
    
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
    
            <!-- Email Address -->
            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!-- Password -->
            <div class="form-group">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <!-- Confirm Password -->
            <div class="form-group">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
    
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
    
            <div class="form-group">
                <button type="submit" class="btn">Reset Password!</button>
            </div>
        </form>
      </div>
    </div>

    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/js/main.js"></script>
  </body>
</html>
