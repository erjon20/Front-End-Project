@extends('layouts.app')

@section('joinUs')

        <div class="login_container">
           <div class="login_image">
           </div>
          <div class="main_holder">
              <div class="login_title">
            <h1 class="login-header login-joinUs" style="text-align: center">Want to collaborate with us and take part in this journey? Tell us what you excel at and apply now!</h1>
          </div>
            <form class="login-form" style="padding-top: 0px">
                <div class="join_us_options">
                    <div class="style_pref">
                            <select name="select_category" id="art_category_joinUs">
                                
                                <option selected="true" disabled="disabled">Choose Your Style</option>
                                <option value="Modern_Art">Modern Art</option>
                                <option value="Realism">Realism</option>
                                <option value="Medieval_Art">Medieval Art</option>
                                <option value="Baroque">Baroque</option>
                            </select>
                    </div>

                    
                    <div class="exp">
                        <input type="radio" id="new" name="experience" value="new">
                        <label for="new" class="label_exp">Aspiring new Artist</label><br>
                        <input type="radio" id="medium" name="experience" value="medium">
                        <label for="medium" class="label_exp">Established Artist</label><br>
                        <input type="radio" id="high" name="experience" value="high">
                        <label for="high" class="label_exp">Third party company</label>
                    </div>


                </div>
                
              <input type="email" name="email" class="email email_joinUs" placeholder="Email" autocomplete="off">
              <a class="forgot_password back_toLogIn" href={{ route('home') }} >Back to home</a>
              <input type="submit" value="Submit"  class="login_button">
            </form>
            </div>
          </div>
        

@endsection