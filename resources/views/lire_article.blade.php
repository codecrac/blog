@extends('front_includes')

@section('body')
   {{-- <div class="main-content innerpagebg wf100">

        <!--Start-->
        <div class="news-large p5">
            <img src="data:image/jpeg;base64,{{$larticle['image']}}" style="max-width: 60%; max-height: 60%">
            <br/>
            <h2>{{$larticle['titre']}}</h2>
            <br/>
            --}}{{--<div class="container p5">
                {!! $larticle['contenu'] !!}
            </div>--}}{{--
        </div>

        <div class="inner-banner-header wf100">
            <h1 data-generated="News Large">News Details</h1>
            <div class="gt-breadcrumbs">
                <ul>
                    <li> <a href="http://gramotech.net/html/tigers/news-details.html#" class="active"> <i class="fas fa-home"></i> Home </a> </li>
                    <li> <a href="http://gramotech.net/html/tigers/news-details.html#"> News </a> </li>
                    <li> <a href="http://gramotech.net/html/tigers/news-details.html#"> News Details </a> </li>
                </ul>
            </div>
        </div>
    <!--End-->
    </div>--}}

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

{{--           <div class="gt-breadcrumbs">--}}
{{--               <ul>--}}
{{--                   <li></li>--}}
{{--                   <li> <h1 class="text-uppercase" data-generated="{{$infos_generales['organisation']}}"> {{$infos_generales['organisation']}} </h1> </li>--}}
{{--                   <li></li>--}}
{{--               </ul>--}}
{{--           </div>--}}
       </div>
   </div>

   <div class="main-content innerpagebg wf100 p80">
       <!--News Large Page Start-->
       <!--Start-->
       <div class="news-details">
           <div class="container">
               <div class="row">
                   <!--News Start-->
                   <div class="col-lg-8">
                       <div class="news-details-wrap">
                           <div class="news-large-post">
                               <div class="post-thumb">
                                   <img src="data:image/jpeg;base64,{{$larticle['image']}}" alt="">
                               </div>
                               <div class="post-txt">
                                   <h3>{{$larticle['titre']}}</h3>
                                   <ul class="post-meta">
                                       <li><i class="fas fa-calendar-alt"></i> {{date('d-m-Y',strtotime($larticle['titre']))}} </li>
                                   </ul>

                                   {!! $larticle['contenu'] !!}
                               </div>
                           </div>
                       </div>
                   </div>
                   <!--News End-->
                   <!--Sidebar Start-->
                   <div class="col-lg-4">
                       <div class="sidebar">
                           <h4 style="background-color: orange;color: white;padding: 5px;text-align: center">Recommandations</h4>
                           @foreach($cinq_au_hasard as $item_au_hasard)
                               <div class="col-12">
                                   <div class="ng-box">
                                       <div class="thumb">
                                           <a href="#"><i class="fas fa-link"></i></a>
                                           <img src="data:image/jpeg;base64,{{$item_au_hasard['image']}}"
                                                style="max-height: 200px" alt="">
                                       </div>
                                       <div class="ng-txt">
                                           <h5><a href="{{route('lire_article',[$item_au_hasard['id']])}}" style="color: #222">{{$item_au_hasard['titre']}}</a>
                                           </h5>
                                           {{--  <ul class="post-meta">
                                                 <li><i class="fas fa-calendar-alt"></i> {{$item_au_hasard['updated_at']}}</li>
                                             </ul>--}}
                                           {{--                                                    <p> {{$item_au_hasard['extrait']}} </p>--}}
                                           {{--                                                    <a href="#" class="rm">En savoir plus </a>--}}
                                       </div>
                                   </div>
                               </div>
                           @endforeach
                       </div>
                   </div>
                   <!--Sidebar End-->
               </div>
           </div>
       </div>
       <!--End-->
   </div>
    <div class="container">
        <h4 > <span class="table-bordered p-4"> De la meme categorie </span></h4>
        <br/>
        <div class="row">
            @foreach($trois_de_la_meme_categorie as $item_de_la_meme_categorie)
                <div class="col-md-4">
                    <div class="ng-box">
                        <div class="thumb">
                            <a href="#"><i class="fas fa-link"></i></a>
                            <img src="data:image/jpeg;base64,{{$item_de_la_meme_categorie['image']}}"
                                 style="max-height: 200px" alt="">
                        </div>
                        <div class="ng-txt">
                            <h5><a href="{{route('lire_article',[$item_de_la_meme_categorie['id']])}}" style="color: #222">{{$item_de_la_meme_categorie['titre']}}</a>
                            </h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
