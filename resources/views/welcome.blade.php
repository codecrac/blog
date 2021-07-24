@extends('front_includes')

@section('body')

    <div class="main-content innerpagebg wf100">

        <!--Start-->
        <div class="news-large">
            <div class="container-fluid pt-4">
                {{--====================4 derniers Articles ========================--}}
                <div class="row">
                    <!--News Start-->
                    @if($dernier_article!=null)
                        <div class="col-lg-6">
                            <div class="news-wrap">
                                <!--Sticky Post Start-->
                                <div class="news-large-post sticky">
                                    <div class="post-thumb">
                                        <a href="{{route('lire_article',[$dernier_article['id']])}}"></a>
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
                                            <li> <i class="fas fa-calendar-alt"></i> {{date('d-m-Y',strtotime($dernier_article['updated_at']))}} </li>
                                            <li>  {{$infos_generales['afficher_auteur_article'] =='oui' ? '| '.$dernier_article->auteur->name : '' }}</li>
                                        </ul>
                                        <p> {{$dernier_article['extrait']}} </p>
                                        <h3 class="text-center">
                                            <a href="{{route('lire_article',[$dernier_article['id']])}}" style="color: #fff" class="rm">Lire la suite</a>
                                        </h3>
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
{{--                                <h4 style="background-color: orange;color: white;padding: 5px;text-align: center">Recommandations</h4>--}}

                                    @foreach($quatre_derniers_article as $item)
                                    <div class="featured-video-widget">
                                        <div class="news-list-post mb-3">
                                                <div class="post-thumb">
                                                    <a href="{{route('lire_article',[$item['id']])}}"></a>
                                                    <img src="data:image/jpeg;base64,{{$item['image']}}" style="max-width: " alt="">
                                                </div>
                                                <div class="post-txt">
                                                    <h4><a href="{{route('lire_article',[$item['id']])}}">{{$item['titre']}} </a></h4>
                                                    <ul class="post-meta">
                                                        <li style="color: #99a1b4"><i class="fas fa-calendar-alt"></i> {{date('d-m-Y',strtotime($item['updated_at']))}}  </li>
                                                        <li> {{$infos_generales['afficher_auteur_article'] =='oui' ? '| '.$item->auteur->name : '' }}</li>
                                                    </ul>
                                                    <a href="{{route('lire_article',[$item['id']])}}" class="rm">Voir plus</a>
                                                </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--Sidebar End-->
                </div>

                {{--<div class="section-title">
                    <h2 class="text-center" > <span class="table-bordered p-2 pl-15 pr-15"> A la une </span> </h2>
                </div>--}}
                <div class="row">
                   {{-- @foreach($quatre_derniers_article as $item_au_hasard)
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
                    @endforeach
--}}
                    {{--@foreach($quatre_derniers_article as $item_articles)
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
                    @endforeach--}}
                </div>



{{--====================EVENEMENTS ========================--}}

            @if(sizeof($les_evenements)>0)

                <div class="section-title mt-4">
                    <h2 > <span class="table-bordered p-3"> Evenements à Venir </span> </h2>
                </div>
                <div class="container">
                    <div class="row">
                        @foreach($les_evenements as $item)
                            <div class="col-lg-4 col-md-6">
                                <div class="ng-box">
                                    <div class="thumb">
                                        <a href="{{route('details_evenement',[$item['id']])}}">

                                            <img src="data:image/jpeg;base64,{{$item['image']}}" style="max-height: 280px;" alt="">

                                            <h6 style="text-align: center;position: absolute;bottom:0;width:100%;padding:10px;color: #fff;background-color:rgba(0,0,0,0.7)">
                                                {{$item['titre']}}
                                            </h6>
                                        </a>
                                    </div>
                                    <div class="ng-txt">
                                        <div class="post-meta row">
                                            {{--   <div class="col-md-4">
                                                   <b> {{date('d-m-Y',strtotime($item['date_evenement']))}}</b>
                                               </div>--}}
                                            <div class="col-md-12 text-center">
                                                <a target="_blank"
                                                   alt="{{date('Y-m-d',strtotime($item['date_evenement']))}}"
                                                   style="font-weight: bold;color:#222" href="https://logwork.com/countdown-qqqv" class="countdown-timer"
                                                   onclick="return false;" data-timezone="Africa/Lagos" data-language="fr" data-date="{{date('Y-m-d',strtotime($item['date_evenement']))}} 00:00">Bientot</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

{{--====================FIN EVENEMENTS ========================--}}
{{--====================Articles Classé par categories ========================--}}

            @foreach($menu_present_sur_accueil as $item_categorie_simple)
                    @if(sizeof($item_categorie_simple->articles) >0)
                        <br/><br/>
                        <div class="container">
                            <div class="section-title">
                                <h2 > <span class="table-bordered p-3">
                                        <a style="color: #2d3748" href="{{route('page_article',[$item_categorie_simple['id']])}}">
                                            {{$item_categorie_simple['titre']}}
                                        </a> </span> </h2>
                                <br/><br/>
                            </div>
                            <div class="row">
                                @php $i=0 @endphp
                                @foreach($item_categorie_simple->articles as $item_articles)

                                    @if($i<3)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="ng-box">
                                                <div class="thumb">
                                                    <a href="{{route('lire_article',[$item_articles['id']])}}">

                                                        <img src="data:image/jpeg;base64,{{$item_articles['image']}}" alt="">

                                                        <h6 style="position: absolute;bottom:0;width:100%;padding:10px;color: #fff;background-color:rgba(0,0,0,0.7)">
                                                            {{$item_articles['titre']}}
                                                        </h6>
                                                    </a>
                                                </div>
                                                <div class="ng-txt">
                                                    {{--<h4>
                                                        <a href="{{route('lire_article',[$item_articles['id']])}}">
                                                            {{$item_articles['titre']}}
                                                        </a>
                                                    </h4>--}}
                                                    <ul class="post-meta">
                                                        <li><i class="fas fa-calendar-alt"></i> {{date('d-m-Y',strtotime($item_articles['updated_at']))}}</li>
                                                        <li> <li> {{$infos_generales['afficher_auteur_article'] =='oui' ? '| '.$item_articles->auteur->name : '' }}</li> </li>
                                                    </ul>
                                                    <p> {{$item_articles['extrait']}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        @php $i++ @endphp
                                    @else
                                        <div class="container text-center">
                                            <a href="{{route('page_article',[$item_categorie_simple['id']])}}" class="btn btn-outline-dark">
                                                Decouvrir plus d'articles de {{$item_categorie_simple['titre']}}
                                            </a>
                                        </div>
                                        @break
                                   @endif
                                @endforeach
                           </div>
            </div>
            @endif
            @endforeach

{{--=============================Publicite ======================================--}}

                <div class="container-fluid">

                    @if(sizeof($les_publicites) >0)
                            <br/><br/>
                            <div class="container">
                                <div class="section-title">
                                    <h2 > <span class="table-bordered p-3"> Qui pourrait vous interessés </span> </h2>
                                </div>
                                <div class="row">
                                    @php $i=0 @endphp
                                    @foreach($les_publicites as $item_publicite)

                                        @if($i<3)
                                            <div class="col-lg-4 col-md-6">
                                                <div class="ng-box">
                                                    <div class="thumb">
                                                        <a href="{{$item_publicite['lien']}}">
                                                            <img src="data:image/gif;base64,{{$item_publicite['image']}}" style="max-height: 250px" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            @php $i++ @endphp
                                        @else
                                            @break
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif

                </div>
        </div>
    </div>
    <!--End-->
    </div>
@endsection
