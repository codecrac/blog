@extends('front_includes')

@section('body')


    <div class="inner-banner-header wf100" style="
                background-image:url('{{asset('images_statique/bg1.jpg')}}');
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

{{--            <div class="gt-breadcrumbs">--}}
{{--                <ul>--}}
{{--                    <li></li>--}}
{{--                    <li> <h1 class="text-uppercase" data-generated="{{$infos_generales['organisation']}}"> {{$infos_generales['organisation']}} </h1> </li>--}}
{{--                    <li></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
        </div>
    </div>
    <div class="main-content innerpagebg wf100">
        <!--News Large Page Start-->

        <!--Start-->
        <div class="news-large">
            <div class="container-fluid pt-4">

                {{--                //Vitrine--}}
                {{--<div class="row">
                    <!--News Start-->
                    @if($dernier_article!=null)
                        <div class="col-lg-6">
                            <div class="news-wrap">
                                <!--Sticky Post Start-->
                                <div class="news-large-post sticky">
                                    <div class="post-thumb">
                                        <a href="{{route('lire_article',[$dernier_article['id']])}}">
--}}{{--                                            --}}{{--
                                        </a>
                                        <span>{{$dernier_article->categorie_parente->titre}}</span>
                                        <img src="data:image/jpeg;base64,{{$dernier_article['image']}}" alt="">
                                    </div>
                                    <div class="post-txt">
                                        <h4>
                                            <a href="{{route('lire_article',[$dernier_article['id']])}}">
                                                {{$dernier_article['titre']}}
                                            </a>
                                        </h4>
                                        <ul class="post-meta">
                                            <li><i class="fas fa-calendar-alt"></i> {{$dernier_article['updated_at']}}
                                            </li>
                                        </ul>
                                        <p> {{$dernier_article['extrait']}} </p>
--}}{{--                                        <a href="#3" class="rm">Lire la suite</a>--}}{{--
                                    </div>
                                </div>
                                <!--Sticky Post End-->
                            </div>
                        </div>
                @endif
                <!--News End-->
                    <!--Sidebar Start-->
                    <div class="col-lg-6">
                        <div class="sidebar">
                            <!--widget start-->
                            <div class="widget">
--}}{{--                                <h4 style="background-color: orange;color: white;padding: 5px;text-align: center">Recommandations</h4>--}}{{--
                                <div class="featured-video-widget">

                                    @foreach($cinq_au_hasard as $item_au_hasard)
                                        <div class="news-list-post">
                                            <div class="post-thumb">
                                                <a href="{{route('lire_article',[$item_au_hasard['id']])}}"></a>
                                                <img src="data:image/jpeg;base64,{{$item_au_hasard['image']}}" alt="">
                                            </div>
                                            <div class="post-txt">
                                                <h4><a href="{{route('lire_article',[$item_au_hasard['id']])}}">{{$item_au_hasard['titre']}} </a></h4>
                                                <ul class="post-meta">
                                                    <li style="color: #99a1b4"><i class="fas fa-calendar-alt"></i> {{date('d-m-Y',strtotime($item_au_hasard['updated_at']))}}  </li>
                                                </ul>
                                                <a href="{{route('lire_article',[$item_au_hasard['id']])}}" class="rm">Voir plus</a>
                                            </div>
                                        </div
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Sidebar End-->
                </div>--}}

                {{--<div class="section-title">
                    <h2 class="text-center" > <span class="table-bordered p-2 pl-15 pr-15"> A la une </span> </h2>
                </div>--}}
                <div class="row">
                    {{--@foreach($quatre_derniers_article as $item_au_hasard)
                        <div class="col-md-6 card">
                            <div class="news-list-post card-header">
                                <div class="post-thumb">
                                    <a href="{{route('lire_article',[$item_au_hasard['id']])}}"></a>
                                    <img src="data:image/jpeg;base64,{{$item_au_hasard['image']}}" alt="">
                                </div>
                                <div class="post-txt card-body">
                                    <h6><a href="{{route('lire_article',[$item_au_hasard['id']])}}">{{$item_au_hasard['titre']}} </a></h6>
                                    <ul class="post-meta">
                                        <li style="color: #99a1b4"><i class="fas fa-calendar-alt"></i> {{date('d-m-Y',strtotime($item_au_hasard['updated_at']))}}  </li>
                                    </ul>
                                    <a href="{{route('lire_article',[$item_au_hasard['id']])}}" class="rm">Voir plus</a>
                                </div>
                            </div>
                        </div>
                    @endforeach--}}
                    @foreach($quatre_derniers_article as $item_articles)
                            <div class="col-lg-4 col-md-6">
                                <div class="ng-box">
                                    <div class="thumb">
                                        <a href="{{route('lire_article',[$item_articles['id']])}}"></a>
                                        <img src="data:image/jpeg;base64,{{$item_articles['image']}}" alt="">
                                    </div>
                                    <div class="ng-txt">
                                        <h4>
                                            <a href="{{route('lire_article',[$item_articles['id']])}}">
                                                {{$item_articles['titre']}}
                                            </a>
                                        </h4>
                                        <ul class="post-meta">
                                            <li><i class="fas fa-calendar-alt"></i> {{date('d-m-Y',strtotime($item_articles['updated_at']))}}</li>
                                        </ul>
                                        <p> {{$item_articles['extrait']}} </p>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>

                {{--                Menu present sur accueil--}}
                {{--                Menu present sur accueil--}}
                {{--                Menu present sur accueil--}}
                @foreach($menu_present_sur_accueil as $item_categorie_simple)
                    @if(sizeof($item_categorie_simple->articles) >0)
                        <br/><br/>
                        <div class="container">
                            <div class="section-title">
                                <h2 > <span class="table-bordered p-3"> <a style="color: #2d3748" href="{{route('page_article',[$item_categorie_simple['id']])}}"> {{$item_categorie_simple['titre']}} </a> </span> </h2>
                                <br/><br/>
                            </div>
                            <div class="row">
                                @php $i=0 @endphp
                                @foreach($item_categorie_simple->articles as $item_articles)

                                    <div class="col-lg-4 col-md-6">
                                        <div class="ng-box">
                                            <div class="thumb">
                                                <a href="{{route('lire_article',[$item_articles['id']])}}"></a>
                                                <img src="data:image/jpeg;base64,{{$item_articles['image']}}" alt="">
                                            </div>
                                            <div class="ng-txt">
                                                <h4>
                                                    <a href="{{route('lire_article',[$item_articles['id']])}}">
                                                        {{$item_articles['titre']}}
                                                    </a>
                                                </h4>
                                                <ul class="post-meta">
                                                    <li><i class="fas fa-calendar-alt"></i> {{date('d-m-Y',strtotime($item_articles['updated_at']))}}</li>
                                                </ul>
                                                <p> {{$item_articles['extrait']}} </p>
                                            </div>
                                        </div>
                                    </div>
                                    @php $i++ @endphp
                                    @if($i>=3)
                                        @break
                                    @endif

                                @endforeach
                           </div>
            </div>
            @endif
            @endforeach

        </div>
    </div>
    <!--End-->
    </div>
@endsection
