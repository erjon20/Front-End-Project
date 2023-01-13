@extends('layouts.app')

@section('feedback')

<div class="feedback_container">
    @auth
    <form action="{{ route('feedback') }}" class="feedback_form" method="POST">
        @csrf
        <div class="feedback_intro">
            <h1>Feedback Form</h1>
            <p>We appreciate your suggestions, thoughts, concerns and criticism. Help us by leaving a review to improve
                our page!</p>
        </div>

        <h1 class="feedback_q">How was your experience in our website?</h1>

        <div class="fb_emotions">

            <input type="radio" id="extraAngry" name="feedback_icon" value="1">
            <label for="extraAngry" class="label_exp"> <i class="far fa-angry"></i> </label>

            <input type="radio" id="angry" name="feedback_icon" value="2">
            <label for="angry" class="label_exp"><i class="far fa-frown"></i></label>

            <input type="radio" id="neutral" name="feedback_icon" value="3">
            <label for="neutral" class="label_exp"><i class="far fa-meh"></i></label>

            <input type="radio" id="happy" name="feedback_icon" value="4">
            <label for="happy" class="label_exp"><i class="far fa-grin"></i></label>

            <input type="radio" id="extraHappy" name="feedback_icon" value="5">
            <label for="extraHappy" class="label_exp"><i class="far fa-grin-beam"></i></label>
            @error('feedback_icon')
            <div>
                {{ 'Please select on of the feedback categorys' }}
            </div>
            @enderror



        </div>

        <h1 class="feedback_q">Feedback category</h1>

        <div class="feedback_issue">
            <input type="radio" id="suggestion" name="feedback_type" value="Suggestion">
            <label for="suggestion" class="label_exp"> Suggestion </label>

            <input type="radio" id="bug" name="feedback_type" value="Bug">
            <label for="bug" class="label_exp">Bug</label>

            <input type="radio" id="other" name="feedback_type" value="Other">
            <label for="other" class="label_exp">Other</label>
            @error('feedback_type')
            <div>
                {{ 'Please select on of the feedback categorys' }}
            </div>
            @enderror
        </div>



        <div class="fb_textarea">

            <h1 class="feedback_q">Describe in a few words</h1>
            <textarea name="body" id="body" cols="30" rows="4"
                class="@error('body') border-red-500 @enderror"></textarea>
            @error('body')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="fb_btn">

            <button type="submit">Submit</button>

        </div>

    </form>

    @endauth

    <div class="@guest reviews-pt @endguest">
        @if ($feedbacks->count())
        @foreach ($feedbacks as $feedback)
        <div class="reviews">

            <div class="reviews__header">
                <img src="../storage/images/{{$feedback->user->profile_pic}}" alt="">
                <div>
                    <a href=""> {{ $feedback->user->username}} </a>
                    <span style="font-family: Poppins, sans-serif; font-size: 14px">{{ $feedback->feedback_type}}</span>
                </div>
                <div>
                    <span class="timer">{{($feedback->created_at)->diffForHumans() }}</span>

                    @switch($feedback->feedback_icon)
                    @case("1")
                    <div class="star_rating">
                        <i class="fas fa-star"></i>
                    </div>
                    @break
                    @case("2")
                    <div class="star_rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    @break
                    @case("3")
                    <div class="star_rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    @break
                    @case("4")
                    <div class="star_rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    @break
                    @case("5")
                    <div class="star_rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    @break
                    @default

                    @endswitch
                </div>
<div>
    <span class="timer">Edited {{($feedback->updated_at)->diffForHumans() }}</span>
    <span  style="visibility: hidden" class="timer">fixer</span>
</div>
            </div>

            <p>{{ $feedback->body }}</p>
        </div>
        @endforeach
        {{ $feedbacks->links('pagination.pagination') }}
        @else

        <div class="reviews">
            <h1>There are no reviews yet</h1>
        </div>
        @endif
    </div>
</div>

@endsection