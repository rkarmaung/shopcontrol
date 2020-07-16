<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- h1 -->
    <link href="https://fonts.googleapis.com/css2?family=Fondamento&display=swap" rel="stylesheet">
    <!-- h2 -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <!-- p -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- fa fa icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Gallery</title>
</head>
<body>
    <nav>
        <div class="navLogo myCenter">
            <!-- <h1>Logo</h1> -->
            <img src="/storage/{{$profile->profilePic}}" alt="">
        </div>
        <div class="burgerMenu">
            {{-- <ul>
                <li><a href="#"> Store </a></li>
                <li><a href="#"> News </a></li>
                <li><a href="#"> About </a></li>
                <li><a href="#"> Contact </a></li>
            </ul> --}}
        </div>
        <div class="navRightCorner">
            <div>
                <i class="fa fa-shopping-cart" style="font-size:30px"></i>
            </div>
            {{-- <div class="burgerContainer">
                <div class="burger1"></div>
                <div class="burger2"></div>
            </div>
        </div>
        <div class="burgerContent myCenter">
            <ul>
                <li><a href="#"> Store </a></li>
                <li><a href="#"> News </a></li>
                <li><a href="#"> About </a></li>
                <li><a href="#"> Contact </a></li>
            </ul>
        </div> --}}
    </nav>

    <section class="banner">
        <div class="bannerDesc">
            <div>
                <h1>Caption</h1>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
        </div>

        <div class="bannerImg">
            <img src="/storage/pics/Cosmopolitan.jpg" alt="">
        </div>
    </section>

    <div class="myHr"> &nbsp; </div>

    <section class="bestProduct">

        <div class="galleryBodyContainer">
            @if(count($allPosts)>0)
                @foreach ($allPosts as $post)
                    <div class="galleryBody">
                        <div class="bestProductImg">
                            <img src="/storage/{{$post->image}}" alt="">
                        </div>
                        <div class="bestPrductCaption">
                            <h1>{{ $post->caption }}</h1>
                            <p>{{ $post->description }}</p>
                            <br>
                            <button class="cartBtn btn btn-success">Add to cart</button>
                            <a href="/post/edit/{{$post->id}}" class="">More Info</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="bestProductHeader">
            <div><h2> Best Product </h2> </div>
            {{-- <div><a href="#"><strong> VIEW ALL -> </strong></a></div> --}}
        </div>

        <div class="bestProductBodyContainer">
            @if(count($allPosts)>0)
                @foreach ($allPosts as $post)
                    <div class="bestPrductBody">
                        <div class="bestProductImg">
                            <img src="/storage/{{$post->image}}" alt="">
                        </div>
                        <div class="bestPrductCaption">
                            <h1>{{ $post->caption }}</h1>
                            <p>{{ $post->description }}</p>
                            <br>
                            <button class="cartBtn btn btn-success">Add to cart</button>
                            <a href="/post/edit/{{$post->id}}" class="">More Info</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <section class="about">
        <div class="aboutDesHeader">
            <h2>About</h2>
        </div>
        <div class="aboutDesBody">
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur voluptas natus maiores eaque quia rerum, vero officia accusantium itaque sit.
            </p>
        </div>
        <div class="aboutDesFooter">
            <a href="#">ABOUT US -></a>
        </div>
    </section>

    <section class="footer">
        <div class="openingHours">
            <h3>OPENING HOURS</h3>
            <p>
                Mon-Fri: 10.00am – 5.30pm <br>
                Sat: 11.00am – 4.00pm <br>
                Sun: 11.00am – 3.00pm 
            </p>
        </div>

        <div class="address">
            <h3>ADDRESS</h3>
            <p>
                862  Longview Avenue <br>
                New York <br>
                10014
            </p>
        </div>

        <div class="contact">
            <h3>CONTACT</h3>
            <p>
                718-509-2391 <br>
                917-416-7294 <br>
                your@email.com
            </p>
        </div>

        <div class="followUs">
            <h3>FOLLOW US</h3>
            <ul>
                <li><a href="#"> Instagram </a></li>
                <li><a href="#"> Facebook </a></li>
                <li><a href="#"> YouTube </a></li>
                <li><a href="#"> Twitter </a></li>
            </ul>
        </div>
    </section>

    
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>