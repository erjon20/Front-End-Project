@extends('layouts.app')

@section('search')

<div class="search_container">
    <h1>Results for {{$search}} </h1>


    <div class="searched_results">
        @if($images)
        @foreach ($images as $image)
        <div class="image">
            <a href={{route('art_detail', $image->id)}}>

                <img src="../storage/images/{{$image->path_name}}" width="100%" alt="" />
                <h3 class="img-title">{{$image->image_title}}</h3>
                <h3 class="img-size">Digital, {{$image->resolution}}</h3>
                <h3 class="artist-name">Artist: {{$image->author}}</h3>
                <h3 class="img-price">Price: ${{$image->price}}</h3>

            </a>
            @auth


            @if(!$image->likedBy(auth()->user()))
            <form action="{{route('baroque.likes', $image->id)}}" method="POST">
                @csrf
                <button type="submit">
                    <span class="favorite-img"><i class="fas fa-heart notLiked"></i>
                    </span>
                </button>

            </form>
            @else
            <form action="{{route('baroque.likes', $image->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"><span class="favorite-img"><i class="fas fa-heart liked"></i></span></button>

            </form>
            @endif
            @endauth
        </div>
        @endforeach
        @else
        <div>
            <h2>No images found</h2>
        </div>
        @endif
    </div>
</div>
@endsection