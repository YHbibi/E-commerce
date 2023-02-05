<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller {
    //
    public static function Dashboard() {
        // return redirect()->route('Statistiques.index');
    }
    public static function AllProduit() {
        return redirect()->route('Produit.AllProduits');
    }
    public static function AllCouleur() {
        return redirect()->route('Couleur.index');
    }
    public static function AllCategorie() {
        return redirect()->route('Categorie.index');
    }
    public static function AllCommande() {
        return redirect()->route('Commande.index');
    }
    public static function AllFournisseur() {
        return redirect()->route('Fournisseur.index');
    }
    public static function Statistiques() {
        return redirect()->route('Statistiques.index');
    }
}
