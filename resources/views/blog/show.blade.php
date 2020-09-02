<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>{{$post->title}}</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{asset('css/philosophy/base.css')}}">
    <link rel="stylesheet" href="{{asset('css/philosophy/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('css/philosophy/main.css')}}">
    <script src="{{asset('js/philosophy/modernizr.js')}}"></script>
    <script src="{{asset('js/philosophy/pace.min.js')}}"></script>


    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

<!-- pageheader
================================================== -->
<div class="s-pageheader ">

    <header class="header">
        <div class="header__content row">

            <div class="header__logo">
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



            <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

            @include('partials.navbar')
        </div> <!-- header-content -->
    </header> <!-- header -->


</div> <!-- end s-pageheader -->


<!-- s-content
================================================== -->
<section class="s-content s-content--narrow s-content--no-padding-bottom">

    <article class="row format-standard">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                {{$post->title}}
            </h1>
            <ul class="s-content__header-meta">

                <li class="date justify-content-center">Crée le {{($post->created_at)->format('d/m/Y')}} par {{$post->user->name}}</li>
                <br>
                <li class="cat mt-5">

                    <span class="entry__category featured"><a href="{{route('blog.category',$post->category->id)}}"> {{$post->category->name}}</a></span>
                </li>
            </ul>
        </div> <!-- end s-content__header -->

        <div class="s-content__media col-full">
            <div class="s-content__post-thumb">
                <img src="{{asset('storage/'.$post->image)}}"
                     srcset="{{asset('storage/'.$post->image)}} 2000w,
                                 {{asset('storage/'.$post->image)}} 1000w,
                                 {{asset('storage/'.$post->image)}} 500w"
                     sizes="(max-width: 2000px) 100vw, 2000px" alt="" >
            </div>
        </div> <!-- end s-content__media -->

        <div class="col-full s-content__main">

            <div id="content-post">
                {!! $post->content !!}
            </div>
            <div class="addthis_inline_share_toolbox"></div>
            <p class="s-content__tags">
                <span>Tags</span>

                <span class="s-content__tag-list">
                    @foreach($post->tags as $tag)
                        <a href="{{route('blog.tag', $tag->id)}}">{{$tag->name}}</a>
                        @endforeach
                    </span>
            </p> <!-- end s-content__tags -->

            <div class="s-content__author">

                <img src="{{ Gravatar::src($post->user->image) }}">

                <div class="s-content__author-about">
                    <h4 class="s-content__author-name">
                        <a href="#0">{{$post->user->name}}</a>
                    </h4>

                    <p>
                        {{$post->user->about}}
                    </p>

                    <ul class="s-content__author-social">
                        <li><a href="#0">Facebook</a></li>
                        <li><a href="#0">Twitter</a></li>
                        <li><a href="#0">GooglePlus</a></li>
                        <li><a href="#0">Instagram</a></li>
                    </ul>
                </div>
            </div>

            <div id="disqus_thread"></div>
            <script>

                /**
                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

                var disqus_config = function () {
                    this.page.url = "{{config('app.url')}}/blog/posts/{{$post->id}}";  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = "{{$post->id}}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };

                (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://blogify-1.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


        </div> <!-- end s-content__main -->

    </article>



{{--   comments--}}


</section> <!-- s-content -->


<!-- s-extra
================================================== -->

<!-- s-footer
================================================== -->
@include('partials.footer')




<script src="{{asset('js/philosophy/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/philosophy/plugins.js')}}"></script>
<script src="{{asset('js/philosophy/main.js')}}"></script>

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ebec71263ac7468"></script>
</body>

</html>
