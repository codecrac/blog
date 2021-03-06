<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\InfosGenerale;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index($id_menu){
        $infos_generales = InfosGenerale::first();

        $liste_menus_simple = Menu::where('type','=','menu_simple')->get();
        $liste_article_menu = Article::where('id_menu','=',$id_menu)->get();
        $le_menu = Menu::findorfail($id_menu);
//        dd($liste_article_menu);
        return view('admin.articles.liste',compact('liste_menus_simple','le_menu','liste_article_menu','infos_generales'));
    }

    public function ajouter($id_menu){
        $liste_utilisateur = User::all();
        $infos_generales = InfosGenerale::first();
        $liste_menus_simple = Menu::where('type','=','menu_simple')->get();
        $le_menu = Menu::findorfail($id_menu);
        return view('admin.articles.ajouter',compact('liste_utilisateur','liste_menus_simple','le_menu','infos_generales'));
    }

    public function editer_article($id_article){
        $liste_utilisateur = User::all();

        $infos_generales = InfosGenerale::first();
        $liste_menus_simple = Menu::where('type','=','menu_simple')->get();
        $larticle = Article::findorfail($id_article);
        return view('admin.articles.editer',compact('liste_utilisateur','liste_menus_simple','larticle','infos_generales'));
    }

    public function enregistrer_article(Request $request,$id_menu)
    {
        $df = $request->all();
        $article = new Article();
        $article->id_menu = $id_menu;
        $article->id_auteur = $df['auteur'];
        $article->titre = $df['titre'];
        $article->extrait = $df['extrait'];
        $article->contenu = $df['contenu'];


        //stocker en base64
        if($request->hasFile('image')){
            $limage = $request->file('image');
            $path = $limage->getRealPath();
            $image_base64 = base64_encode(file_get_contents($path));

//            dd($str_to_store);
            $article->image = $image_base64;
        }else{
            return  redirect()->back()->with('message',"<div class='alert alert-danger'> Tous les champs sont obligatoires </div> ");
        }

        if($article->save()){
            $message = "<div class='alert alert-success text-center'> L' <b>article</b> a bien ??t?? enregistr??s </div>";
            return redirect()->back()->with('message',$message);
        }else{
            $message = "<div class='alert alert-danger text-center'> Quelque chose s'est mal pass??... veuillez reessayer</div>";
            return redirect()->back()->with('message',$message);
        }
    }

    public function modifier_article(Request $request,$id_article)
    {
        $df = $request->all();
        $article = Article::find($id_article);
        $article->titre = $df['titre'];
        $article->id_auteur = $df['auteur'];
        $article->extrait = $df['extrait'];
        $article->contenu = $df['contenu'];


        //stocker en base64
        if($request->hasFile('image')){
            $limage = $request->file('image');
            $path = $limage->getRealPath();
            $image_base64 = base64_encode(file_get_contents($path));
            $article->image = $image_base64;
        }

        if($article->save()){
            $message = "<div class='alert alert-success text-center'> L' <b>article</b> a bien ??t?? enregistr??s </div>";
            return redirect()->back()->with('message',$message);
        }else{
            $message = "<div class='alert alert-danger text-center'> Quelque chose s'est mal pass??... veuillez reessayer</div>";
            return redirect()->back()->with('message',$message);
        }
    }

    public function supprimer_article($id_article)
    {
        $larticle = Article::findorfail($id_article);

        if($larticle->delete()){
            $message = "<div class='alert alert-success text-center'> L' <b>article</b> a bien ??t?? supprim?? </div>";
            return redirect()->back()->with('message',$message);
        }else{
            $message = "<div class='alert alert-danger text-center'> Quelque chose s'est mal pass??... veuillez reessay??</div>";
            return redirect()->back()->with('message',$message);
        }
    }
}
