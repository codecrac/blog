@extends('front_includes')

@section('body')
    <div class="main-content innerpagebg wf100">
        <!--News Large Page Start-->

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

{{--                <div class="gt-breadcrumbs">--}}
{{--                    <ul>--}}
{{--                        <li></li>--}}
{{--                        <li> <h1 class="text-uppercase" data-generated="{{$infos_generales['organisation']}}"> {{$infos_generales['organisation']}} </h1> </li>--}}
{{--                        <li></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>
        </div>
        <!--Start-->
        <div class="news-large">
            <div class="container">

                        <div class="container">
                            <div class="section-title">
                                <h2 > <span class="table-bordered p-3"> {{$la_categorie['titre']}} </span> </h2>
                            </div>
                            <div class="row">
                                @foreach($la_categorie->articles as $item_articles)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="ng-box">
                                            <div class="thumb">
                                                <a href="{{route('lire_article',[$item_articles['id']])}}"><i
                                                        class="fas fa-link"></i></a>
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
            </div>

        </div>
    </div>
    <!--End-->
    </div>
@endsection
