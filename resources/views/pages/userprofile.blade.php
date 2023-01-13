@extends('layouts.app')

@section('userProfile')
@if(Auth::guest())
<script>
    window.location.replace('http://127.0.0.1:8000');
</script>
@else
<div class="profile_container">
    <div class="profile_cover">
        <div class="profile_cover__gradient">

        </div>
    </div>




    <div class="profile_pic">
        <img src="../storage/images/{{Auth::user()->profile_pic}}" alt="">
        <form action="{{ route('user_profile') }}" method="POST" class="change_pPic" id="imageForm"
            enctype="multipart/form-data">
            @csrf
            <label for="file-upload-profile" class="custom-file-upload">
                <i class="fas fa-edit"></i>
            </label>
            <input id="file-upload-profile" type="file" name="profile_pic" />
        </form>
        <script>
            document.getElementById("file-upload-profile").onchange = function() {
            document.getElementById("imageForm").submit();
        };
        </script>
        <div class="profile_names">
            <h1>{{ Auth::user()->first_name}} {{ Auth::user()->last_name}}</h1>
            <p>{{'@'}}{{ Auth::user()->username}}</p>

        </div>
    </div>

    <div class="profile_dash">
        <div class="profile_dash__left">
            <h1>{{ Auth::user()->first_name}} {{ Auth::user()->last_name}}</h1>
            <p>{{ Auth::user()->Bio}}</p>
            <h2>Gender:
                @switch(Auth::user()->gender)
                @case("M")
                Male
                @break
                @case("F")
                Female
                @break
                @default
                Other
                @endswitch
            </h2>
            <h2>Location: {{ Auth::user()->country_name}}</h2>
        </div>
        <div class="profile_dash__right">
            <h1>What you liked</h1>
            <div class="fav_user_imgs">
                @foreach ($likes as $like)
                @if($like->user_id == auth()->user()->id)
                <div class="profile_favs">
                    <a href={{route('art_detail', $like->image_id)}}>

                        @foreach ($images as $image)
                        @if($image->id==$like->image_id)
                        <img src="../storage/images/{{$image->path_name}}" width="100%" height="175px" alt="" />
                        @endif
                        @endforeach


                    </a>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>

</div>
@endif

@endsection