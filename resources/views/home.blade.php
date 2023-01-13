@extends('layouts.app')

@section('content')
<section class="container-first">
  <div class="container-first-text">
    <h1 class="container1-title">
      Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam, in.
    </h1>

    <p class="container1-txt">Wanna find out more stuff about cats?</p>

    {{-- <a href="#" class="button-type button-type-white"> Learn More </a> --}}
  </div>
</section>

<section class="container-category">
  <h1 class="">Categories</h1>

  <div class="category-row">
    <div class="category-title">
      <h1>Modern Art</h1>
      <a href={{route('modernart')}}>Read More <i class="fas fa-angle-double-right"></i></a>
    </div>
    <div class="category-img">
      <img src="../images/homepage/modernart_1-min.jpg" width="100%"  alt="" />
    </div>
    <div class="category-img">
      <img src="../images/homepage/modernart_2-min.jpg" width="100%" alt="" />
    </div>
    <div class="category-img">
      <img src="../images/homepage/modernart_3-min.jpg" width="100%" alt="" />
    </div>
  </div>
  <div class="category-row">
    <div class="category-title">
      <h1>Realism</h1>
      <a href={{route('realism')}}>Read More <i class="fas fa-angle-double-right"></i></a>
    </div>
    <div class="category-img">
      <img src="../images/homepage/realism_1-min.jpg" width="100%" alt="" />
    </div>
    <div class="category-img">
      <img src="../images/homepage/realism_2-min.jpg" width="100%" alt="" />
    </div>
    <div class="category-img">
      <img src="../images/homepage/realism_3-min.jpg" width="100%" alt="" />
    </div>
  </div>
  <div class="category-row loadMore">
    <div class="category-title">
      <h1>Renaissance</h1>
      <a href={{route('medievalart')}}>Read More <i class="fas fa-angle-double-right"></i></a>
    </div>
    <div class="category-img">
      <img src="../images/homepage/renaissance_1-min.jpg" width="100%" alt="" />
    </div>
    <div class="category-img">
      <img src="../images/homepage/renaissance_2-min.jpg" width="100%" height="100%" alt="" />
    </div>
    <div class="category-img">
      <img src="../images/homepage/renaissance_3-min.jpg" width="100%" alt="" />
    </div>
  </div>
  <div class="category-row loadMore">
    <div class="category-title">
      <h1>Baroque</h1>
      <a href={{route('baroque')}}>Read More <i class="fas fa-angle-double-right"></i></a>
    </div>
    <div class="category-img">
      <img src="../images/homepage/baroque_1-min.jpg" width="100%" alt="" />
    </div>
    <div class="category-img">
      <img src="../images/homepage/baroque_2-min.jpg" width="100%" alt="" />
    </div>
    <div class="category-img">
      <img src="../images/homepage/baroque_3-min.jpg" width="100%" alt="" />
    </div>
  </div>
  <div id="loadMore" style="text-align: right" class="loadMoreBtn">
    <a href="#" class="button-type-categories" id="loadMore-button">Load More</a>
  </div>
</section>

<section class="join-us" id="joinUs">
  <div class="join-us-div">
    <h1>Join our creative community!</h1>
    <p>
      Our community is where art thrives. Explore over 333 million pieces
      of art while connecting to fellow artists and art enthusiasts.
    </p>
    <p>
      We are global art gallery featuing artwork, videography and
      photography. Additional features include groups and portfolios.
    </p>
    <p>
      Join us and get free access to millions pieces of art. Showcase,
      promote, sell & share your work with over 33 million members.
    </p>

    <a href={{ route('joinus')}} class="button-type button-type-border">Join us</a>
  </div>
</section>

<section class="our-goal" id="ourGoal">
  <div class="out-goal-img">
    <img src="../images/our-goal-img.jpeg" width="100%" alt="Error" />
  </div>
  <div class="our-goal-text">
    <h1 class="our-goal-h1">What we look forward to</h1>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt,
      soluta, modi vel quisquam eligendi nam ratione dolores inventore rem
      accusamus corporis fugit aliquid eos nihil sequi voluptas quis sint
      id!
    </p>
    <p>
      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci
      earum at aliquam, ad, natus quisquam excepturi aperiam qui ullam,
      tenetur impedit ut libero perferendis suscipit veniam in dolorem
      veritatis voluptas!
    </p>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum
      delectus dicta labore. Rem, iure eveniet consequuntur eius numquam
      deserunt voluptatem similique error laudantium molestias natus
      sapiente debitis eligendi inventore pariatur id ipsam ad laborum
      nisi quibusdam, necessitatibus illum dolore expedita.
    </p>
  </div>
</section>

<section class="our-goal our-team" id="ourTeam">
  <div class="our-goal-text">
    <h1 class="our-team-h1">With more than 200 years of experience</h1>
    <p>
      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
      Repellendus assumenda quasi iusto optio, ipsum sint reiciendis
      pariatur quos earum rerum, ullam nisi temporibus dolorem?
      Reprehenderit doloremque veniam molestiae a dolorum et minima
      dolorem facilis provident, rerum ipsam, exercitationem facere
      doloribus.
    </p>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam
      debitis ad excepturi sequi. Sapiente esse neque tenetur, ad unde
      itaque id velit odio beatae laborum, reprehenderit recusandae ut
      vero provident impedit deserunt, consectetur rerum maxime explicabo
      mollitia adipisci cum libero perferendis veniam. Ipsum, maxime! Rem,
      eum. Excepturi amet, exercitationem possimus sequi molestias
      nesciunt officia impedit qui esse tempora doloribus itaque.
    </p>
  </div>
  <div class="out-goal-img">
    <img src="../images/our-team-img.jpg" width="100%" alt="Error" />
  </div>
</section>

<section class="news" id="news">
  <div class="news-div">
    <h1 class="latest-news">Latest News</h1>

    <div class="update-news">
      <div class="news-patch-notes">
        <img src="../images/news_article1.jpg" width="100%" height="100%" alt="" />
        <h1>Drawing During Pandemic</h1>
        <p>
          During these hard times everyone needs something to do while
          locked inside our homes. Join us in this new fun new challenge
          to make a doodle or drawing every single day. Send us your work 
          at the end of the month!
        </p>
      </div>
      <div class="news-patch-notes">
        <img src="../images/news_article2.jpg" width="100%" height="100%" alt="" />
        <h1>Discovered Painting</h1>
        <p>
          New research using near-infrared imaging has revealed hidden 
          paintings of Yolande of Anjou, first wife of Duke Francis I of
          Brittany. It ultimately proved to be Yolande’s headdress painted 
          over in azurite.
        </p>
      </div>
      <div class="news-patch-notes">
        <img src="../images/news_article3.jpg" width="100%" height="100%" alt="" />
        <h1>Our Story</h1>
        <p>
          When we began our business back in 2020 we had only one goal in
           mind and we still do. To unite all people who share the same 
           passion about art as we do. The journey had difficulties just 
          like any other, but together we shall overcome them. </p>
      </div>
    </div>
    <div class="newsletter">
      <h1>Sign up for our newsletter</h1>
      <p>
        and receive a regular update on newly contributed art pieces and
        works available to purchase
      </p>

      <form class="newsletter-form" action="{{route('home')}}" method="POST">
        @csrf
        <input type="email" name="email" id="" placeholder="Enter your E-mail" />
        <button type="submit">
          <i class="far fa-newspaper"></i>
        </button>
      </form>
    </div>
  </div>
</section>

<script type="text/javascript" src="{{ asset('js/mainPage.js') }}"></script>
@endsection