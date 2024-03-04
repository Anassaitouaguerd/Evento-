@extends('auth.partials.tags_html')

@section('title' , 'Login')

@section('content')
  <div class="wrapper">
    <div class="inner">
      <div class="image-holder">
        <img src="/assets/images/Black Coffee - SA.jpg" alt="">
      </div>
      <form method="POST" action="/login">
        @include('auth.Messages')
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
          
          <a href="forget_password" style="color: #ff3366;">Forgot your password?</a>
          <a type="button" href="/register" class="btn_register">Register</a>
        </div>
      </form> 
    </div>
  </div>
 @endsection
