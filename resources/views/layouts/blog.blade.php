<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('css/philosophy/base.css')}}">
    <link rel="stylesheet" href="{{asset('css/philosophy/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('css/philosophy/main.css')}}">

    <!-- script
    ================================================== -->
    <script src="{{asset('js/philosophy/modernizr.js')}}"></script>
    <script src="{{asset('js/philosophy/pace.min.js')}}"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">




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

                <form role="search" method="get" class="header__search-form" action="{{route('welcome')}}">
                    <label>
                        <span class="hide-content">Rechercher un article:</span>
                        <input type="search" class="search-field" placeholder="Tapez des mots-clés" value="{{request()->query('search')}}" name="search" title="Search for:" autocomplete="off">
                    </label>
                    <input type="submit" class="search-submit" value="Rechercher">
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
                            <span class="entry__category"><a href="{{route('blog.category', $posts[0]->category->id)}}">{{$posts[0]->category->name??''}}</a></span>

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
                            <span class="entry__category"><a href="{{route('blog.category', $posts[1]->category->id)}}">{{$posts[1]->category->name??''}}</a></span>

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
                            <span class="entry__category"><a href="{{route('blog.category', $posts[2]->category->id)}}">{{$posts[2]->category->name??''}}</a></span>

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


  @yield('content')


<!-- s-footer
================================================== -->
<footer class="s-footer">

    <div class="s-footer__bottom">
        <div class="row">
            <div class="col-full">
                <div class="s-footer__copyright text-center">
                    <span style="color: #fff" class="h6">Blogify by <a href="https://gaoussou-coulibaly.fr/" target="_blank">  Gaoussou COULIBALY</a> réalisé grâce au Framework Laravel </span>
                </div>

                <div class="go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- end s-footer__bottom -->

</footer> <!-- end s-footer -->




<!-- Java Script
================================================== -->
<script src="{{asset('js/philosophy/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/philosophy/plugins.js')}}"></script>
<script src="{{asset('js/philosophy/main.js')}}"></script>

</body>

</html>
