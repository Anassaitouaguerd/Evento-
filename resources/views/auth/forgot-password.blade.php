@extends('auth.partials.tags_html')

@section('title' , 'forget password')

@section('content')
    
    <div class="wrapper_forget">
      <div class="inner">
        <div class="image-holder">
          <img src="/assets/images/Black Coffee - SA.jpg" alt="" />
        </div>
    <form method="POST" action="send_email">
      @include('auth.Messages')
        @csrf
        <!-- Email Address -->
        <div class="form-group mt-4">
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
    @endsection

   