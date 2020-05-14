<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">

        <title>Categorie :{{$category->name}}</title>


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
<section class="s-pageheader">


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

                <form role="search" method="get" class="header__search-form" action="">
                    <label>
                        <span class="hide-content">Rechercher un article:</span>
                        <input type="search" class="search-field" placeholder="Tapez des mots-clés" value="{{request()->query('search')}}" name="search" title="Search for:" autocomplete="off">
                    </label>
                    <input type="submit" class="search-submit" value="Search">
                </form>

                <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

            </div>  <!-- end header__search -->


            <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

            @include('partials.navbar')

        </div> <!-- header-content -->
    </header> <!-- header -->


</section> <!-- end s-pageheader -->


<!-- s-content

================================================== -->

<section class="s-content" id="s-content">
    <div class="row narrow">
        <div class="col-full s-content__header" data-aos="fade-up">
            <h1>Categorie : {{$category->name}}</h1>

        </div>
    </div>
    <div class="row masonry-wrap">
        <div class="masonry">
            <div class="grid-sizer"></div>
            @forelse($posts as $post)
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
            @empty

                <p class="text-center">Pas de résultats trouvé pour votre recherche <strong>"{{request()->query('search')}}"</strong> 😥</p>
            @endforelse


        </div> <!-- end masonry -->

    </div> <!-- end masonry-wrap  -->


    <div class="row">
        <div class="col-full">
            <nav class="pgn">
                {{$posts->appends(['search' =>request()->query('search')])->links()}}
            </nav>
        </div>
    </div>
</section> <!-- s-content -->


@include('partials.extra')


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
