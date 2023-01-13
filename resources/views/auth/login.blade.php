@extends('layouts.app')

@section('login')

        <div class="login_container">
           <div class="login_image">
           </div>
          <div class="main_holder">
              <div class="login_title">
                <h1 class="login-header">LOG IN</h1>
                <div class="auth-link">
              
                 <p>Don't have an account yet?  </p>
                 <a href={{ route('register') }}   class="auth-underline">Join us! </a>
                </div>
                 <div class="invalid-message">
                     @if (session('status'))
                        <h1>Wrong email or password. Please try again!</h1>
                      @endif
                 </div>
              </div>

            <form class="login-form"  action="{{ route('login') }}" method="POST">
              @csrf
              
              <input type="email" name="email" class="username @error('email') error-input @enderror" placeholder="Email" autocomplete="off" value="{{old('email')}}">
             

             
              <input type="password" name="password" class="password @error('password') error-input @enderror" placeholder="Password">
            



              <a class="forgot_password" href={{ route('pwreset') }} >Forgot your pasword?</a>
              <input type="submit" value="Login"  class="login_button" placeholder="Log in">
            </form>
            </div>
          </div>
        
           
            

@endsection