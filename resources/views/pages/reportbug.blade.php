@extends('layouts.app')

@section('reportbug')

<div class="login_container">
  <div class="main_holder main_holder_bug">
    <div class="login_title">
      <h1 class="login-header login-joinUs" style="text-align: center">Please describe as in details as possible the
        issue you encountered!</h1>
    </div>
    <form action="{{route('reportbug')}}" method="POST" class="login-form" style="padding-top: 0px">
      @csrf
      <textarea name="bug_desc" id="reportBug" cols="30" rows="10" placeholder="Describe the bug"></textarea>

      <input type="submit" value="Submit Ticket" class="login_button">
    </form>
  </div>
</div>


@endsection