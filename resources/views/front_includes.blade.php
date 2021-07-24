<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="data:image/png;base64,{{$infos_generales['logo']}}" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('front_template/custom.css')}}">
    <link rel="stylesheet" href="{{asset('front_template/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('front_template/color.css')}}">
    <link rel="stylesheet" href="{{asset('front_template/bootstrap.min.css')}}">
{{--    <link rel="stylesheet" href="{{asset('front_template/fontawesome.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('front_template/owl.carousel.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('front_template/prettyPhoto.css')}}">
{{--    <link rel="stylesheet" href="{{asset('front_template/audioplayer.css')}}">--}}

    <title>{{$infos_generales['organisation']}}</title>

    <style>
        .fb > img{
            height: 25px !important;
            width: 25px !important;
        }
    </style>
    <script src="https://cdn.logwork.com/widget/countdown.js"></script>

</head>
<body>
<button type="button" class="mobile-nav-toggle d-lg-none mr-1"> <img src="{{asset('images_statique/menu.png')}}" width="50px" /> </button>
<!--Wrapper Start-->
<div class="wrapper">

    <!--Header Start-->
    <header id="main-header" class="main-header header-scrolled">
        <!--topbar-->
        {{--<div class="topbar" style="background-color: #ffc966">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <ul class="topsocial">
                            @if($infos_generales['lien_fb'])
                                <li><a href="{{$infos_generales['lien_fb']}}" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                            @endif
                            @if($infos_generales['lien_linkedin'])
                                <li><a href="{{$infos_generales['lien_linkedin']}}" class="fb"><i class="fab fa-linkedin-in"></i></a></li>
                            @endif
                            @if($infos_generales['lien_insta'])
                                <li><a href="{{$infos_generales['lien_insta']}}" class="fb"><i class="fab fa-instagram-f"></i></a></li>
                            @endif
                            @if($infos_generales['lien_twitter'])
                                <li><a href="{{$infos_generales['lien_twitter']}}" class="fb"><i class="fab fa-twitter"></i></a></li>
                            @endif

                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <ul class="toplinks">
                            <li style="color: #99a1b4"> {{$infos_generales['telephones']}} </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>--}}
        <!--topbar end-->
        <!--Logo + Navbar Start-->
        <div class="logo-navbar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1 col-sm-5">
                        <div class="logo">
                            <a href="{{route('accueil')}}">
{{--                                <img src="/front_template/logo-dark.png" alt="">--}}
                                <img src="data:images/jpeg;base64,{{$infos_generales['logo']}}" style="max-width: 50px; max-height: 50px" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-11 col-sm-7">
                        <nav class="main-nav">
                            <ul>
                                <li class="nav-item drop-down">
                                    <a href="{{route('accueil')}}">Accueil</a>
                                </li>
                                @foreach($menus_pricipaux as $item_menu_pricipal)
                                    @if($item_menu_pricipal->type == 'menu_simple')
                                        <li class="nav-item drop-down">
                                            <a href="{{route('page_article',[$item_menu_pricipal['id']])}}">{{$item_menu_pricipal['titre']}}</a>
                                        </li>
                                    @else
{{--                                        S'il y'a des sous menus--}}
                                        @if(sizeof($item_menu_pricipal->enfants) >0)
                                            <li class="nav-item drop-down">
                                                <a href="#">{{$item_menu_pricipal['titre']}} <b>&triangledown;</b></a>
                                                <ul>
                                                    @foreach($item_menu_pricipal->enfants as $item_sous_menu)
                                                        <li>
                                                            <a href="{{route('page_article',[$item_sous_menu['id']])}}"> {{$item_sous_menu['titre']}} </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--Logo + Navbar End-->


    </header>

    <div class="inner-banner-header wf100" style="
        background-image:url('data:image/jpeg;base64,{{$infos_generales['banniere']}}');
        background-position: center;
        background-size: cover;
        ">
        <div class="overlay" style="
                background-color: rgba(255,69,0,0.3);
                position: absolute;
                top:0;
                left: 0;
                right: 0;
                bottom: 0
                ">
            <form method="get" action="{{route('resultat_recherche')}}" style="position: absolute;bottom: 0px;left: 10px">
                <div class="row">
                    <div class="col-md-10">
                        <input class="form-control" name="mot_cle" style="background-color: #fff" required>
                    </div>
                    <div class="col-md-2">
                    <button class="btn btn-warning"> Rechercher </button>
                    </div>
        </div>
            </form>
            {{--<div class="gt-breadcrumbs">
                <ul>
                    <form method="get" action="{{route('resultat_recherche')}}">
                        <li>

                        </li>
                        <li>
                            <input class="form-control" name="mot_cle" required>
                            <button class="btn btn-warning"> Rechercher </button>
                        </li>
                        <li>
                        </li>
                    </form>

                </ul>
            </div>--}}
        </div>
    </div>
        @yield('body')

<!--Main Footer Start-->
    <footer class="wf100 main-footer">
        <div class="container">
            <div class="row">
                <!--Footer Widget Start-->
                <div class="col-md-3">
                    <div class="footer-widget about-widget">
                        <a href="{{route('login')}}">
                            <img src="data:image/png;base64,{{$infos_generales['logo']}}" style="max-height:120px " alt="">
                        </a>
                    </div>
                    <ul class="topsocial">
                        @if($infos_generales['lien_fb'])
                            <li><a href="{{$infos_generales['lien_fb']}}" class="fb"> <img src="{{asset('images_statique/fb.png')}}"> </a></li>
                        @endif
                        @if($infos_generales['lien_linkedin'])
                            <li><a href="{{$infos_generales['lien_linkedin']}}" class="fb"> <img src="{{asset('images_statique/linkedin.png')}}"> </a></li>
                        @endif
                        @if($infos_generales['lien_insta'])
                            <li><a href="{{$infos_generales['lien_insta']}}" class="fb"> <img src="{{asset('images_statique/insta.jpg')}}"> </a></li>
                        @endif
                        @if($infos_generales['lien_twitter'])
                            <li><a href="{{$infos_generales['lien_twitter']}}" class="fb"> <img src="{{asset('images_statique/twitter.png')}}"> </a></li>
                        @endif

                    </ul>
                </div>
                <!--Footer Widget End-->
                <!--Footer Widget Start-->
                <div class="col-md-6">
                    <div class="footer-widget">
                        <h4>{{$infos_generales['organisation']}}</h4>
                        <span style="color: #99a1b4">
                            {{$infos_generales['apropos']}}
                        </span>
                    </div>
                </div>
                <!--Footer Widget End-->
                <!--Footer Widget Start-->
                <div class="col-md-3">
                    <div class="footer-widget">
                        <h4>Contacts</h4>
                        <address>
                            <ul>
                                <li style="color: #99a1b4"> {{$infos_generales['adresse']}}</li>
                                <li style="color: #99a1b4"> {{$infos_generales['telephones']}}</li>
                                <li > <a href="mailto:{{$infos_generales['email']}}" style="color: #99a1b4">
                                         {{$infos_generales['email']}}
                                    </a>
                                </li>
                            </ul>
                        </address>
                    </div>
                </div>
                <!--Footer Widget End-->
            </div>
        </div>
        <div class="container brtop">
            <div class="row">
                <div class="col-lg-6 col-md-6">
{{--                    <a href="{{route('login')}}"></a>--}}
                </div>
                <div class="col-lg-6 col-md-6">

                    <p class="copyr"> Tous droits réservé © 2021, Conçu &amp; Developpé par: <a
                            href="http://gramotech.net/html/tigers/news-large.html#">STRATON SYSTEM</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!--Main Footer End-->
</div>
<!--Wrapper End-->
<!-- Optional JavaScript -->
<script src="{{asset('front_template/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('front_template/jquery-migrate-3.0.1.js')}}"></script>
<script src="{{asset('front_template/popper.min.js')}}"></script>
<script src="{{asset('front_template/bootstrap.min.js')}}"></script>
<script src="{{asset('front_template/mobile-nav.js')}}"></script>

<nav class="mobile-nav d-lg-none">
    <li class="nav-item ">
        <a href="{{route('accueil')}}">Accueil</a>
    </li>
    @foreach($menus_pricipaux as $item_menu_pricipal)
        @if($item_menu_pricipal->type == 'menu_simple')
            <li class="nav-item ">
                <a href="{{route('page_article',[$item_sous_menu['id']])}}">{{$item_menu_pricipal['titre']}}</a>
            </li>
        @else
            {{--                                        S'il y'a des sous menus--}}
            @if(sizeof($item_menu_pricipal->enfants) >0)
                <li class="nav-item drop-down">
                    <a href="#">{{$item_menu_pricipal['titre']}} <b>&triangledown;</b></a>
                    <ul>
                    @foreach($item_menu_pricipal->enfants as $item_sous_menu)
                            <li>
                                <a href="{{route('page_article',[$item_sous_menu['id']])}}"> {{$item_sous_menu['titre']}} </a>
                            </li>
                    @endforeach
                    </ul>
                </li>
            @endif
        @endif
    @endforeach
</nav>
<div class="mobile-nav-overly"></div>

{{--<script src="{{asset('front_template/owl.carousel.min.js')}}"></script>--}}
{{--<script src="{{asset('front_template/jquery.countdown.js')}}"></script>--}}
{{--<script src="{{asset('front_template/audioplayer.min.js')}}"></script>--}}
<script src="{{asset('front_template/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('front_template/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('front_template/custom.js')}}"></script>


</body>
</html>
