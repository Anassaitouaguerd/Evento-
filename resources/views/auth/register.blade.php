@extends('auth.partials.tags_html')

@section('title' , 'Register')

@section('content')
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
            <div class="container mt-5">
                <div class="form-group">
                    <label for="role" class="text-center">Your Role : </label><br>
                    <div class="custom-checkbox d-flex justify-content-around">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input w-25" type="checkbox" id="utilisateur" name="role" value="utilisateur">
                            <label class="form-check-label" for="utilisateur">Utilisateur</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input w-auto" type="checkbox" id="organisateur" name="role" value="organisateur" >
                            <label class="form-check-label" for="organisateur">Organisateur</label>
                        </div>
                    </div>
                </div>
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

 @endsection