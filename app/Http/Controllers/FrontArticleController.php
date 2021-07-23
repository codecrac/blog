<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\InfosGenerale;
use App\Models\Menu;
use Illuminate\Http\Request;

class FrontArticleController extends Controller
{
    public function index($id_article)
    {
        $infos_generales = InfosGenerale::first();
        $menus_pricipaux = Menu::where('id_parent','=',null)->get();

        $larticle = Article::find($id_article);
        if($larticle==null){
            return redirect('/');
        }

        $cinq_au_hasard = Article::inRandomOrder()->limit(3)->get();
        $trois_de_la_meme_categorie = Article::Where('id_menu','=',$larticle['id_menu'])->inRandomOrder()->limit(3)->get();
        return view('lire_article',compact('infos_generales','larticle','menus_pricipaux','cinq_au_hasard','trois_de_la_meme_categorie'));
    }

    public function page_article($id_menu_simple)
    {
        $infos_generales = InfosGenerale::first();
        $menus_pricipaux = Menu::where('id_parent','=',null)->get();

        $la_categorie = Menu::find($id_menu_simple);
        if($la_categorie==null){
            return redirect('/');
        }

        return view('page_liste_article',compact('infos_generales','la_categorie','menus_pricipaux'));
    }
}
