@extends('layouts.app')

@section('pwresetlink')

<div class="login_container">
    <div class="main_holder main_holder_bug">
      <div class="login_title">
        <h1 class="login-header login-joinUs" style="text-align: center">Please create a new password!</h1>
      </div>
     
      <form action=" {{ url('/new_password/' .$user->email.'/'.$code) }}" method="POST"
        class="login-form" style="padding-top: 40px">
        @csrf
        {{-- <h2>{{$user->email}}</h2> --}}
        {{-- shfaq erroert e validimit --}}
            <input type="password" placeholder="Enter your new password" name="new_password" id="new_password" class="password  @error('password') error-input @enderror">
            <input type="password" placeholder="Confirm password" name="new_confirm_password" id="new_confirm_password" class="password  @error('password') error-input @enderror">

    
            <input type="submit" class="login_button" value="Submit" style="border: 2px solid black">
    </form>
    </div>
  </div>
@endsection