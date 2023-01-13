@extends('layouts.app')

@section('register')

<div class="login_container">
    <div class="login_image">

    </div>
   <div class="main_holder">
       <div class="login_title register-header">
     <h1 class="login-header">Register</h1>
     <div class="auth-link">
      <p>Already have an account?  </p>
      <a href={{ route('login') }}  class="auth-underline">Log in!</a>
     </div>
     
     </div>
     <form class="login-form register-form" action="{{ route('register') }}" method="POST">
      @csrf
      
       <input type="text" name="username" class="username @error('username') error-input @enderror" placeholder="Username" autocomplete="off" value="{{old('username')}}">
      
       <input type="email" name="email" class="email @error('email') error-input @enderror" placeholder=" E-mail" autocomplete="off" value="{{old('email')}}">
  
       <input type="password" name="password" class="password @error('password') error-input @enderror" placeholder="Password">
       

       <input type="password" name="password_confirmation" class="password @error('password_confirmation') error-input @enderror" placeholder="Confirm Password">
      
       <input type="submit" value="Register"  class="login_button register-btn" placeholder="Register">
     </form>
     </div>
   </div>
   
@endsection