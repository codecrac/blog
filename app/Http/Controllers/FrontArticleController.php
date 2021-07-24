<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Evenement;
use App\Models\InfosGenerale;
use App\Models\Menu;
use App\Models\Publicite;
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

//        $nb_vue = $larticle->nb_vue;
        $larticle->nb_vue = $larticle->nb_vue + 1;
        $larticle->save();
//        dd($larticle);

        $cinq_au_hasard = Article::inRandomOrder()->limit(3)->get();
        $trois_de_la_meme_categorie = Article::Where('id_menu','=',$larticle['id_menu'])->inRandomOrder()->limit(3)->get();

        $pub_1 = Publicite::first();
        $pub_2 = Publicite::skip(1)->first();
        $pub_3 = Publicite::skip(2)->first();

//        dd($pub_1,$pub_2,$pub_3);

        return view('lire_article',compact('infos_generales','larticle',
            'menus_pricipaux','cinq_au_hasard','trois_de_la_meme_categorie',
            'pub_1','pub_2','pub_3')
        );
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

    public function resultat_recherche(Request $request)
    {
        $df = $request->all();
        $mot_cle = $df['mot_cle'];
        $infos_generales = InfosGenerale::first();
        $menus_pricipaux = Menu::where('id_parent','=',null)->get();

        $resultat_article = Article::where('titre','LIKE','%'.$mot_cle.'%')
                                        ->orWHere('extrait','LIKE','%'.$mot_cle.'%')
                                        ->orWhere('contenu','LIKE','%'.$mot_cle.'%')
                                        ->get();

        $resultat_evenement = Evenement::where('titre','LIKE','%'.$mot_cle.'%')
                                        ->orWhere('contenu','LIKE','%'.$mot_cle.'%')
                                        ->get();

//        dd($resultat_article,$resultat_evenement);

        return view('resultat_recherche',compact('mot_cle','infos_generales','menus_pricipaux','resultat_article','resultat_evenement'));
    }
}
