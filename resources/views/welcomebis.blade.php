<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    @section('title')
        <title>Blogify by Gaoussou COULIBALY</title>
    @endsection

    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    @section('link-header')
    <link rel="stylesheet" href="{{asset('css/philosophy/base.css')}}">
    <link rel="stylesheet" href="{{asset('css/philosophy/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('css/philosophy/main.css')}}">
        <script src="{{asset('js/philosophy/modernizr.js')}}"></script>
        <script src="{{asset('js/philosophy/pace.min.js')}}"></script>
    @show

    <!-- script
    ================================================== -->


    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

<!-- pageheader
================================================== -->
<section class="s-pageheader s-pageheader--home">


    <header class="header">
        <div class="header__content row">

            <div class="header__logo mb-5 pb-5">
                <a class="logo" href="{{route('welcome')}}">
                    <!-- <img src="images/logo.svg" alt="Homepage"> -->
                    <h1 style="color: #fff;">#BLOGIFY.</h1>
                    <!-- <p style="color: #fff;">Le blog qui te parle de dev !</p> -->

                </a>
            </div> <!-- end header__logo -->

            <ul class="header__social">
                <li>
                    <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                </li>
            </ul> <!-- end header__social -->

            <a class="header__search-trigger" href="#0"></a>

            <div class="header__search">

                <form role="search" method="get" class="header__search-form" action="#">
                    <label>
                        <span class="hide-content">Search for:</span>
                        <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
                    </label>
                    <input type="submit" class="search-submit" value="Search">
                </form>

                <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

            </div>  <!-- end header__search -->


            <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

            @include('partials.navbar')

        </div> <!-- header-content -->
    </header> <!-- header -->


    <div class="pageheader-content row">
        <div class="col-full">

            <div class="featured">

                <div class="featured__column featured__column--big">
                    <div class="entry" style="background-image:url({{url('storage/'.$posts[0]->image)}});">

                        <div class="entry__content">
                            <span class="entry__category"><a href="{{route('blog.show', $posts[0]->id)}}">{{$posts[0]->category->name??''}}</a></span>

                            <h1><a href="{{route('blog.show', $posts[0]->id)}}" title="">{{$posts[0]->title??''}}</a></h1>

                            <div class="entry__info">
                                <a href="{{route('blog.show', $posts[0]->id)}}" class="entry__profile-pic">
                                    <img class="avatar" src="{{asset($posts[0]->user->image)}}" alt="">
                                </a>

                                <ul class="entry__meta">
                                    <li><a href="{{route('blog.show', $posts[0]->id)}}">{{$posts[0]->user->name??''}}</a></li>
                                    <li>{{$posts[0]->created_at->format('d/m/Y')??''}}</li>
                                </ul>
                            </div>
                        </div> <!-- end entry__content -->

                    </div> <!-- end entry -->
                </div> <!-- end featured__big -->

                <div class="featured__column featured__column--small">

                    <div class="entry" style="background-image:url({{url('storage/'.$posts[1]->image??'')}});">

                        <div class="entry__content">
                            <span class="entry__category"><a href="{{route('blog.show', $posts[1]->id)}}">{{$posts[1]->category->name??''}}</a></span>

                            <h1><a href="{{route('blog.show', $posts[1]->id)}}" title="">{{$posts[1]->title??''}}</a></h1>

                            <div class="entry__info">
                                <a href="{{route('blog.show', $posts[1]->id)}}" class="entry__profile-pic">
                                    <img class="avatar" src="{{asset($posts[1]->user->image??'')}}" alt="">
                                </a>

                                <ul class="entry__meta">
                                    <li><a href="{{route('blog.show', $posts[1]->id)}}">{{$posts[1]->user->name??''}}</a></li>
                                    <li>{{$posts[1]->created_at->format('d/m/Y')??''}}</li>
                                </ul>
                            </div>
                        </div> <!-- end entry__content -->

                    </div> <!-- end entry -->

                    <div class="entry" style="background-image:url({{url('storage/'.$posts[2]->image??'')}});">

                        <div class="entry__content">
                            <span class="entry__category"><a href="#0">{{$posts[2]->category->name??''}}</a></span>

                            <h1><a href="{{route('blog.show', $posts[2]->id)}}" title="">{{$posts[2]->title??''}}</a></h1>

                            <div class="entry__info">
                                <a href="{{route('blog.show', $posts[2]->id)}}" class="entry__profile-pic">
                                    <img class="avatar" src="{{url($posts[2]->user->image??'')}}" alt="">
                                </a>

                                <ul class="entry__meta">
                                    <li><a href="{{route('blog.show', $posts[2]->id)}}">{{$posts[2]->user->name??''}}</a></li>
                                    <li>{{$posts[2]->created_at->format('d/m/Y')??''}}</li>
                                </ul>
                            </div>
                        </div> <!-- end entry__content -->

                    </div> <!-- end entry -->

                </div> <!-- end featured__small -->
            </div> <!-- end featured -->

        </div> <!-- end col-full -->
    </div> <!-- end pageheader-content row -->

</section> <!-- end s-pageheader -->


<!-- s-content

================================================== -->

<section class="s-content" id="s-content">

    <div class="row masonry-wrap">
        <div class="masonry">
            <div class="grid-sizer"></div>
            @foreach($postsPaginate as $post)
                <article class="masonry__brick entry format-standard" data-aos="fade-up">
                    <div class="entry__thumb">
                        <a href="{{route('blog.show', $post->id)}}" class="entry__thumb-link">
                            <img src="{{url('storage/'.$post->image)}}"
                                 srcset="{{url('storage/'.$post->image)}} 1x, {{url('storage/'.$post->image)}} 2x" alt="">
                        </a>
                    </div>
                    <div class="entry__text">

                        <div class="entry__header">
                            <li style="list-style: none" class="cat mt-5 text-center">
                                <span class="entry__category featured"><a href="#0"> {{$post->category->name}}</a></span>
                            </li>
                            <h1 class="entry__title"><a href="{{route('blog.show', $post->id)}}">{{$post->title}}</a></h1>
                        </div>
                        <div class="entry__excerpt">
                            <p>
                               {{$post->description}}
                            </p>
                        </div>

                        <div class=" entry__info">
                            <a href="{{route('blog.show', $post->id)}}" class="entry__profile-pic">
                                <img class="avatar" src="{{asset($post->user->image)}}" alt="">
                            </a>

                            <ul class="entry__meta">
                                <li><a href="{{route('blog.show', $post->id)}}">{{$post->user->name??''}}</a><br>

                                </li>
                            </ul>
                        </div>
                        <div class="entry__date">
                            <a href="{{route('blog.show', $post->id)}}">Crée le {{($post->created_at)->format('d/m/Y')}}</a>
                        </div>
                        <div class="entry__meta">
{{--                                <span class="entry__meta-links">--}}
{{--                                    <a href="category.html">{{$post->category->name}}</a>--}}
{{--                                </span>--}}
                            <p class="s-content__tags">

                                <span class="s-content__tag-list">
                                    @foreach($post->tags as $tag)
                                        <a href="#0">{{isset($tag) ? $tag->name : ''}}</a>
                                    @endforeach
                                </span>
                            </p> <!-- end s-content__tags -->

                        </div>
                    </div>
                </article> <!-- end article -->
            @endforeach


{{--            <article class="masonry__brick entry format-quote" data-aos="fade-up">--}}

{{--                <div class="entry__thumb">--}}
{{--                    <blockquote>--}}
{{--                        <p>Good design is making something intelligible and memorable. Great design is making something memorable and meaningful.</p>--}}

{{--                        <cite>Dieter Rams</cite>--}}
{{--                    </blockquote>--}}
{{--                </div>--}}

{{--            </article> <!-- end article -->--}}

        </div> <!-- end masonry -->

    </div> <!-- end masonry-wrap  -->


    <div class="row">
        <div class="col-full">
            <nav class="pgn">
{{--                <ul>--}}
{{--                    <li><a class="pgn__prev" href="#0">Prev</a></li>--}}
{{--                    <li><a class="pgn__num" href="#0">1</a></li>--}}
{{--                    <li><span class="pgn__num current">2</span></li>--}}
{{--                    <li><a class="pgn__num" href="#0">3</a></li>--}}
{{--                    <li><a class="pgn__num" href="#0">4</a></li>--}}
{{--                    <li><a class="pgn__num" href="#0">5</a></li>--}}
{{--                    <li><span class="pgn__num dots">…</span></li>--}}
{{--                    <li><a class="pgn__num" href="#0">8</a></li>--}}
{{--                    <li><a class="pgn__next" href="#0">Next</a></li>--}}
{{--                </ul>--}}
                {{$postsPaginate->links()}}
            </nav>
        </div>
    </div>
</section> <!-- s-content -->


@section('extra')
    <section class="s-extra">

        <div class="row top">

            <div class="col-eight md-six tab-full popular">
                <h3>Popular Posts</h3>

                <div class="block-1-2 block-m-full popular__posts">
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/wheel-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">Visiting Theme Parks Improves Your Health.</a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2017-12-19">Dec 19, 2017</time></span>
                        </section>
                    </article>
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/shutterbug-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">Key Benefits Of Family Photography.</a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2017-12-18">Dec 18, 2017</time></span>
                        </section>
                    </article>
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/cookies-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">Absolutely No Sugar Oatmeal Cookies.</a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2017-12-16">Dec 16, 2017</time></span>
                        </section>
                    </article>
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/beetle-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">Throwback To The Good Old Days.</a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2017-12-16">Dec 16, 2017</time></span>
                        </section>
                    </article>
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/tulips-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">10 Interesting Facts About Caffeine.</a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2017-12-14">Dec 14, 2017</time></span>
                        </section>
                    </article>
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/salad-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">Healthy Mediterranean Salad Recipes</a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2017-12-12">Dec 12, 2017</time></span>
                        </section>
                    </article>
                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->

            <div class="col-four md-six tab-full about">
                <h3>About Philosophy</h3>

                <p>
                    Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Pellentesque in ipsum id orci porta dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada.
                </p>

                <ul class="about__social">
                    <li>
                        <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </li>
                </ul> <!-- end header__social -->
            </div> <!-- end about -->

        </div> <!-- end row -->

        <div class="row bottom tags-wrap">
            <div class="col-full tags">
                <h3>Tags</h3>

                <div class="tagcloud">
                    <a href="#0">Salad</a>
                    <a href="#0">Recipe</a>
                    <a href="#0">Places</a>
                    <a href="#0">Tips</a>
                    <a href="#0">Friends</a>
                    <a href="#0">Travel</a>
                    <a href="#0">Exercise</a>
                    <a href="#0">Reading</a>
                    <a href="#0">Running</a>
                    <a href="#0">Self-Help</a>
                    <a href="#0">Vacation</a>
                </div> <!-- end tagcloud -->
            </div> <!-- end tags -->
        </div> <!-- end tags-wrap -->

    </section> <!-- end s-extra -->
@show




 @include('partials.footer')



@section('link-footer')
    <!-- Java Script
    ================================================== -->
    <script src="{{asset('js/philosophy/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/philosophy/plugins.js')}}"></script>
    <script src="{{asset('js/philosophy/main.js')}}"></script>
@show
</body>

</html>
