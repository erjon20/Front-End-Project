@extends('layouts.app')

@section('pwreset')

<div class="login_container">
  <div class="login_image">
  </div>
  <div class="main_holder">
    <div class="login_title">
      <h1 class="login-header login-header-fp">Forgot Password</h1>
    </div>
    <form class="login-form" action="{{ route('pwreset') }}" method="POST">
      @csrf
      @if (session('error'))
      {{session('error')}}
      @endif

      @if (session('success'))
      {{session('success')}}
      @endif

      <input type="email" name="email" class="username" placeholder="Email" autocomplete="off">
      <a class="forgot_password back_toLogIn" href={{ route('login') }}>Back to log in</a>
      <input type="submit" value="Submit" class="login_button">
    </form>
  </div>
</div>


@endsection