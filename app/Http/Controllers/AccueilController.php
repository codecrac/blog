<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\InfosGenerale;
use App\Models\Menu;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index(){
        $infos_generales = InfosGenerale::first();
        $menus_pricipaux = Menu::where('id_parent','=',null)->get();

        //A la une
        $last_article = Article::orderby('id','desc')->take(1)->get();
        $dernier_article= null;
        if(sizeof($last_article)>0){
            $dernier_article = $last_article[0];
        }

        //au hasard pour la sidebar
        $quatre_derniers_article = Article::orderby('id','desc')->skip(1)->take(3)->get();
        $cinq_au_hasard = Article::inRandomOrder()->limit(3)->get();
//        $recommandations = Article::inRandomOrder()->limit(4)->get();

        //present sur l'acceuil
        $menu_present_sur_accueil = Menu::where('type','=','menu_simple')->where('present_sur_accueil','=',true)->get();
//        dd($menu_present_sur_accueil);

//        dd($menus_pricipaux);
        return view('welcome',compact('infos_generales','menus_pricipaux',
            'dernier_article','cinq_au_hasard','menu_present_sur_accueil','quatre_derniers_article'));
    }
}
