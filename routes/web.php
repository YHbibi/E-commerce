<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CouleurController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\UtilisateurController;

// Utilisateur
Route::post('Utilisateur/Auth', 'App\Http\Controllers\UtilisateurController@Auth')->name('Utilisateur.Auth');
Route::get('Utilisateur/login', 'App\Http\Controllers\UtilisateurController@logIn')->name('Utilisateur.logIn');
Route::get('Utilisateur/logOut', 'App\Http\Controllers\UtilisateurController@logOut')->name('Utilisateur.logOut');
Route::resource('Utilisateur', UtilisateurController::class)->except('edit', 'update');
// Route::get('Utilisateur/Inscription', 'App\Http\Controllers\UtilisateurController@Inscription')->name('Utilisateur.Inscription');

// Panier
Route::get('Panier/{ref}', 'App\Http\Controllers\PanierController@DeleteProduitPanier')->name('Panier.DeleteProduitPanier');
Route::resource('Panier', PanierController::class);
Route::post('Panier/{ref}', 'App\Http\Controllers\PanierController@AddProduitPanier')->name('Panier.AddProduitPanier');
//Route::get('Panier', 'App\Http\Controllers\PanierController@AllPanier')->name('Panier.AllPanier');

// Produit

Route::get('Produits', 'App\Http\Controllers\ProduitController@SearchProduit')->name('Produit.SearchProduit');
Route::get('ProduitsParCategories/{id}', 'App\Http\Controllers\ProduitController@DetailsProduitsParCategories')->name('Produit.detailsCategories');

Route::resource('Produit', ProduitController::class)->only('show', 'index', 'create');

// Categorie
Route::get('categories', 'App\Http\Controllers\CategorieController@ProduitsParCategories');



/*
    *
    * user => c'est un middelware d'authentification
    *
*/

Route::group(['middleware' => ['user']], function () {

    // Facture
    Route::resource('Facture', FactureController::class);

    // Commande
    Route::resource('Commande', CommandeController::class)->only('show', 'store');

    // Utilisateur

    Route::resource('Utilisateur', UtilisateurController::class)->only('edit', 'update');

    /*
        *
        * Admin =>  c'est un middelware d'autorisation
        *
    */

    Route::group(['middleware' => ['admin']], function () {

        Route::get('Admin/Dashboard', 'App\Http\Controllers\AdminController@Dashboard')->name('Admin.Dashboard');
        Route::get('Admin/Statistiques', 'App\Http\Controllers\AdminController@Statistiques')->name('Admin.Statistiques');
        Route::get('Admin/AllProduit', 'App\Http\Controllers\AdminController@AllProduit')->name('Admin.AllProduit');
        Route::get('Admin/AllCouleur', 'App\Http\Controllers\AdminController@AllCouleur')->name('Admin.AllCouleur');
        Route::get('Admin/AllCategorie', 'App\Http\Controllers\AdminController@AllCategorie')->name('Admin.AllCategorie');
        Route::get('Admin/AllCommande', 'App\Http\Controllers\AdminController@AllCommande')->name('Admin.AllCommande');
        Route::get('Admin/AllFournisseur', 'App\Http\Controllers\AdminController@AllFournisseur')->name('Admin.AllFournisseur');

        // Statistiques
        Route::get('Statistiques', 'App\Http\Controllers\StatistiquesController@index')->name('Statistiques.index');

        // All Produits
        Route::get('AllProduits', 'App\Http\Controllers\ProduitController@AllProduits')->name('Produit.AllProduits');

        // Fournisseur
        Route::resource('Fournisseur', FournisseurController::class);

        // Couleur
        Route::resource('Couleur', CouleurController::class);

        // Categorie
        Route::resource('Categorie', CategorieController::class);

        // Commande
        Route::resource('Commande', CommandeController::class)->except('show', 'store');

        // Produit
        Route::resource('Produit', ProduitController::class)->except('show', 'index');
    });
});


// index -> page d'accueil
Route::get('/', 'App\Http\Controllers\ProduitController@index')->name('index');
