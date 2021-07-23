@extends('admin.includes')

@section('body')
    <div class="content-wrapper">

        {{--        MENU--}}
        {!! Session::get('message','')!!}
        <div class="row">
            <div class="offset-md-1 col-md-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center text-capitalize">Informations generales</h3>

                        <form method="post" action="{{route('enregistrer_infos_generales')}}" enctype="multipart/form-data">


                            <h4>Organisation</h4>
                            <input type="text" name="organisation" class="form-control" value="{{$infos_generales['organisation']}}">
                            <br/>

                            <h4>Logo <img src="data:image/jpeg;base64,{{$infos_generales['logo']}}" height="100px" width="100px" /> </h4>
                            <span>Choisissez un fichier pour modifier le logo actuel</span>
                            <input type="file" name="logo" class="form-control">
                            <br/>

                            <h4>Banniere <img src="data:image/jpeg;base64,{{$infos_generales['banniere']}}" height="100px" width="100px" /> </h4>
                            <span>Choisissez un fichier pour modifier la banniere actuel</span>
                            <input type="file" name="banniere" class="form-control">
                            <br/>

                            <h4>Adresse</h4>
                            <input type="text"  name="adresse" class="form-control" value="{{$infos_generales['adresse']}}">

                            <h4>Telephones</h4>
                            <input type="text" name="telephones" class="form-control" value="{{$infos_generales['telephones']}}">

                            <br/>
                            <h4>Email</h4>
                            <input type="email" name="email" class="form-control" value="{{$infos_generales['email']}}">

                            <br/>
                            <h4>A propos</h4>
                            <textarea name="apropos" maxlength="250" class="form-control">{{$infos_generales['apropos']}}</textarea>
                            <br/>

                            <br/>
                            <h4>Lien page Facebook</h4>
                            <input type="text" name="lien_fb" class="form-control" value="{{$infos_generales['lien_fb']}}">

                            <br/>
                            <h4>Lien page linkedin</h4>
                            <input type="text" name="lien_linkedin" class="form-control" value="{{$infos_generales['lien_linkedin']}}">

                            <br/>
                            <h4>Lien page Instagram</h4>
                            <input type="text" name="lien_insta" class="form-control" value="{{$infos_generales['lien_insta']}}">

                            <br/>
                            <h4>Lien page twitter</h4>
                            <input type="text" name="lien_twitter" class="form-control" value="{{$infos_generales['lien_twitter']}}">

                            <div class="container text-center">
                                @csrf
                                <br/>
                                <button class="btn btn-outline-dark" type="submit">Enregistrer</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
