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




   @yield('header')


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
