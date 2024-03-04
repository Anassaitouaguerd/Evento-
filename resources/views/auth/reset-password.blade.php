@extends('auth.partials.tags_html')

@section('title' , 'Reset password')

@section('content')
    
    <div class="wrapper_forget">
      <div class="inner">
        <div class="image-holder">
          <img src="/assets/images/Black Coffee - SA.jpg" alt="" />
        </div>
    <form method="POST" action="">
        @csrf
        <div class="form-group mt-4">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" required autofocus autocomplete="password">
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        <div class="form-group mt-4">
                <label for="password_confirmation">Confirme Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required autofocus autocomplete="password_confirmation">
                @error('password_confirmation')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Reset Password</button>
            </div>
    </form>
      </div>
    </div>
    @endsection

   