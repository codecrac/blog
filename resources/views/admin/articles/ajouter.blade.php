@extends('admin.includes')

@section('style_complementaire')

    <link rel="stylesheet" href="{{asset('purple_template/vendors/summernote/dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('purple_template/vendors/quill/quill.snow.css')}}">
    <link rel="stylesheet" href="{{asset('purple_template/vendors/simplemde/simplemde.min.css')}}">

    <style>
        input,textarea{
            border-color: #222 !important;
        }
    </style>
@endsection

@section('body')

    <div class="content-wrapper">
        <div class="page-header">

        </div>

        <div class="card">
            <div class="card-header">
                {!! Session::get('message','') !!}
                <h3> Nouvel article dans : {{$le_menu->parent['titre']}}/{{$le_menu['titre']}} </h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('enregistrer_article',[$le_menu['id']])}}" enctype="multipart/form-data">

                    <div class="row grid-margin">

                        <div class="form-group col-12">
                            <div class="row">
                                <h4>Image Illustration</h4>
                                <input type="file" name="image" class="form-control" required />
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <div class="row">
                                <h4>Titre</h4>
                                <input name="titre" class="form-control" required />
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <div class="row">
                                <h4>Extrait</h4>
                                <textarea name="extrait" class="form-control" maxlength="250" required></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <h4 class="card-title">Corps de l'article</h4>
                            <textarea id="summernoteExample" name="contenu" required></textarea>
                        </div>
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>

    </div>
@endsection


@section('script_complementaire')

    <script src="{{asset('purple_template/js/vendor.bundle.base.js')}}"></script>

    <script src="{{asset('purple_template/js/editorDemo.js')}}"></script>
    <script src="{{asset('purple_template/vendors/summernote/dist/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('purple_template/vendors/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('purple_template/vendors/quill/quill.min.js')}}"></script>
    <script src="{{asset('purple_template/vendors/simplemde/simplemde.min.js')}}"></script>



    <script src="{{asset('purple_template/js/off-canvas.js')}}"></script>
    <script src="{{asset('purple_template/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('purple_template/js/misc.js')}}"></script>
    <script src="{{asset('purple_template/js/settings.js')}}"></script>
    <script src="{{asset('purple_template/js/todolist.js')}}"></script>


    <script src="{{asset('purple_template/js/editorDemo.js')}}"></script>
@endsection