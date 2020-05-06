<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Standard Post Format - Philosophy</title>
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

                    <span class="entry__category featured"><a href="#0"> {{$post->category->name}}</a></span>
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

            <p class="s-content__tags">
                <span>Tags</span>

                <span class="s-content__tag-list">
                    @foreach($post->tags as $tag)
                        <a href="#0">{{$tag->name}}</a>
                        @endforeach
                    </span>
            </p> <!-- end s-content__tags -->

            <div class="s-content__author">
                <img src="{{asset($post->user->image)}}" alt="">

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

            <div class="s-content__pagenav">
                <div class="s-content__nav">
                    <div class="s-content__prev">
                        <a href="#0" rel="prev">
                            <span>Previous Post</span>
                            Tips on Minimalist Design
                        </a>
                    </div>
                    <div class="s-content__next">
                        <a href="#0" rel="next">
                            <span>Next Post</span>
                            Less Is More
                        </a>
                    </div>
                </div>
            </div> <!-- end s-content__pagenav -->

        </div> <!-- end s-content__main -->

    </article>


    <!-- comments
    ================================================== -->
{{--    <div class="comments-wrap">--}}

{{--        <div id="comments" class="row">--}}
{{--            <div class="col-full">--}}

{{--                <h3 class="h2">5 Comments</h3>--}}

{{--                <!-- commentlist -->--}}
{{--                <ol class="commentlist">--}}

{{--                    <li class="depth-1 comment">--}}

{{--                        <div class="comment__avatar">--}}
{{--                            <img width="50" height="50" class="avatar" src="images/avatars/user-01.jpg" alt="">--}}
{{--                        </div>--}}

{{--                        <div class="comment__content">--}}

{{--                            <div class="comment__info">--}}
{{--                                <cite>Itachi Uchiha</cite>--}}

{{--                                <div class="comment__meta">--}}
{{--                                    <time class="comment__time">Dec 16, 2017 @ 23:05</time>--}}
{{--                                    <a class="reply" href="#0">Reply</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="comment__text">--}}
{{--                                <p>Adhuc quaerendum est ne, vis ut harum tantas noluisse, id suas iisque mei. Nec te inani ponderum vulputate,--}}
{{--                                    facilisi expetenda has et. Iudico dictas scriptorem an vim, ei alia mentitum est, ne has voluptua praesent.</p>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                    </li> <!-- end comment level 1 -->--}}

{{--                    <li class="thread-alt depth-1 comment">--}}

{{--                        <div class="comment__avatar">--}}
{{--                            <img width="50" height="50" class="avatar" src="images/avatars/user-04.jpg" alt="">--}}
{{--                        </div>--}}

{{--                        <div class="comment__content">--}}

{{--                            <div class="comment__info">--}}
{{--                                <cite>John Doe</cite>--}}

{{--                                <div class="comment__meta">--}}
{{--                                    <time class="comment__time">Dec 16, 2017 @ 24:05</time>--}}
{{--                                    <a class="reply" href="#0">Reply</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="comment__text">--}}
{{--                                <p>Sumo euismod dissentiunt ne sit, ad eos iudico qualisque adversarium, tota falli et mei. Esse euismod--}}
{{--                                    urbanitas ut sed, et duo scaevola pericula splendide. Primis veritus contentiones nec ad, nec et--}}
{{--                                    tantas semper delicatissimi.</p>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <ul class="children">--}}

{{--                            <li class="depth-2 comment">--}}

{{--                                <div class="comment__avatar">--}}
{{--                                    <img width="50" height="50" class="avatar" src="images/avatars/user-03.jpg" alt="">--}}
{{--                                </div>--}}

{{--                                <div class="comment__content">--}}

{{--                                    <div class="comment__info">--}}
{{--                                        <cite>Kakashi Hatake</cite>--}}

{{--                                        <div class="comment__meta">--}}
{{--                                            <time class="comment__time">Dec 16, 2017 @ 25:05</time>--}}
{{--                                            <a class="reply" href="#0">Reply</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="comment__text">--}}
{{--                                        <p>Duis sed odio sit amet nibh vulputate--}}
{{--                                            cursus a sit amet mauris. Morbi accumsan ipsum velit. Duis sed odio sit amet nibh vulputate--}}
{{--                                            cursus a sit amet mauris</p>--}}
{{--                                    </div>--}}

{{--                                </div>--}}

{{--                                <ul class="children">--}}

{{--                                    <li class="depth-3 comment">--}}

{{--                                        <div class="comment__avatar">--}}
{{--                                            <img width="50" height="50" class="avatar" src="images/avatars/user-04.jpg" alt="">--}}
{{--                                        </div>--}}

{{--                                        <div class="comment__content">--}}

{{--                                            <div class="comment__info">--}}
{{--                                                <cite>John Doe</cite>--}}

{{--                                                <div class="comment__meta">--}}
{{--                                                    <time class="comment__time">Dec 16, 2017 @ 25:15</time>--}}
{{--                                                    <a class="reply" href="#0">Reply</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="comment__text">--}}
{{--                                                <p>Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est--}}
{{--                                                    etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}

{{--                                    </li>--}}

{{--                                </ul>--}}

{{--                            </li>--}}

{{--                        </ul>--}}

{{--                    </li> <!-- end comment level 1 -->--}}

{{--                    <li class="depth-1 comment">--}}

{{--                        <div class="comment__avatar">--}}
{{--                            <img width="50" height="50" class="avatar" src="images/avatars/user-02.jpg" alt="">--}}
{{--                        </div>--}}

{{--                        <div class="comment__content">--}}

{{--                            <div class="comment__info">--}}
{{--                                <cite>Shikamaru Nara</cite>--}}

{{--                                <div class="comment__meta">--}}
{{--                                    <time class="comment-time">Dec 16, 2017 @ 25:15</time>--}}
{{--                                    <a class="reply" href="#">Reply</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="comment__text">--}}
{{--                                <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</p>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                    </li>  <!-- end comment level 1 -->--}}

{{--                </ol> <!-- end commentlist -->--}}


{{--                <!-- respond--}}
{{--                ================================================== -->--}}
{{--                <div class="respond">--}}

{{--                    <h3 class="h2">Add Comment</h3>--}}

{{--                    <form name="contactForm" id="contactForm" method="post" action="">--}}
{{--                        <fieldset>--}}

{{--                            <div class="form-field">--}}
{{--                                <input name="cName" type="text" id="cName" class="full-width" placeholder="Your Name" value="">--}}
{{--                            </div>--}}

{{--                            <div class="form-field">--}}
{{--                                <input name="cEmail" type="text" id="cEmail" class="full-width" placeholder="Your Email" value="">--}}
{{--                            </div>--}}

{{--                            <div class="form-field">--}}
{{--                                <input name="cWebsite" type="text" id="cWebsite" class="full-width" placeholder="Website" value="">--}}
{{--                            </div>--}}

{{--                            <div class="message form-field">--}}
{{--                                <textarea name="cMessage" id="cMessage" class="full-width" placeholder="Your Message"></textarea>--}}
{{--                            </div>--}}

{{--                            <button type="submit" class="submit btn--primary btn--large full-width">Submit</button>--}}

{{--                        </fieldset>--}}
{{--                    </form> <!-- end form -->--}}

{{--                </div> <!-- end respond -->--}}

{{--            </div> <!-- end col-full -->--}}

{{--        </div> <!-- end row comments -->--}}
{{--    </div> <!-- end comments-wrap -->--}}

</section> <!-- s-content -->


<!-- s-extra
================================================== -->

<!-- s-footer
================================================== -->
@include('partials.footer')




<script src="{{asset('js/philosophy/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/philosophy/plugins.js')}}"></script>
<script src="{{asset('js/philosophy/main.js')}}"></script>

</body>

</html>
