<?php

namespace App\Http\Controllers;

use App\Models\Couleur;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //

        return view(
            'Produit.listProduitAccueil',
            [
                'produits' => Produit::all(),
                'couleurs' => Couleur::all()->toArray()

            ]
        );
    }
    public function AllProduits() {
        //

        return view(
            'Produit.listProduits',
            [
                'produits' => Produit::all(),
                'couleurs' => Couleur::all()->toArray(),
                'categories' => Categorie::all()->toArray(),
                'fournisseurs' => Fournisseur::all()->toArray()

            ]
        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view(
            'Produit.ajouterProduit',
            [
                'couleurs' => Couleur::all()->toArray(),
                'categories' => Categorie::all()->toArray(),
                'fournisseurs' => Fournisseur::all()->toArray()

            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //



        $this->validate($request, [

            "referenceProduit" => "bail|required|string|unique:produits,referenceProduit",
            "titreProduit" => "bail|required|string",
            "descriptionProduit" => "bail|required|string",
            "poidsProduit" => "bail|required|numeric",
            "prixProduit" => "bail|required|numeric",
            "quantiteProduitDisp" => "bail|required|numeric",
            "quantiteProduitVend" => "bail|required|numeric",
            "idCat" => "bail|required|numeric",
            "idCouleur" => "bail|required|numeric",
            "idF" => "bail|required|numeric",
            "imageProduit" => "bail|required|image|mimes:png,jpeg,jpg,gif",

        ]);

        $data = $request->except(['_token', '_method', 'submit']);


        // Enregistrement de l'image
        $imgName = $request->imageProduit->getClientOriginalName();
        $path = $request->file('imageProduit')->storeAs(

            'pictures',
            $imgName,
            'public'
        );
        $data['imageProduit'] = $path;


        $produit = Produit::create($data);
        $produit->save();

        session()->put('success', 'a été ajouté avec succès!');
        return redirect()->route('Admin.AllProduit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        // details produit

        return view(
            'Produit.detailsProduit',
            [
                'produit' => Produit::findOrFail($id),
                'couleurs' => Couleur::all()->toArray()


            ]
        );
    }


    public function SearchProduit() {

        if (isset($_GET["Search"])) {

            $resultats = Produit::DeatailsProduitsRechercher();
            $couleurs = Couleur::all()->toArray();
            //var_dump($resultats);


            // pour stocker les produits correspondants  a cette recherche
            $produits = array();
            foreach ($resultats as $resultat) {

                $produit = Produit::find($resultat->referenceProduit)->toArray();

                $produits[] = $produit;
            }
            //dd($produit);
            if (count($produits) > 0) {
                $r = (count($produits) > 1) ? "résultats" : "résultat";
                $msg = "Recherche de ''" . $_GET["Search"] . "'' : " . count($produits) . ' ' . $r;
                session()->put('info', $msg);
                return view('Produit.detailsProduitRechercher', compact('produits', 'couleurs'));
            } else {

                return back()->with('info', "Ce produit  ''" . $_GET["Search"] . "'' n'existe pas!");
            }
        } else {
            return back();
        }
    }

    public  function DetailsProduitsParCategories($nomCat) {

        return view(
            'Produit.listProduitParCategorie',
            [
                'produits' => Produit::DetailsProduitsParCategories($nomCat),
                'couleurs' => Couleur::all()->toArray()

            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
        return view(
            'Produit.editProduit',
            [
                'produit' => Produit::find($id),
                'couleurs' => Couleur::all()->toArray(),
                'categories' => Categorie::all()->toArray(),
                'fournisseurs' => Fournisseur::all()->toArray()

            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //

        $this->validate($request, [

            "titreProduit" => "bail|required|string",
            "descriptionProduit" => "bail|required|string",
            "poidsProduit" => "bail|required|numeric",
            "prixProduit" => "bail|required|numeric",
            "quantiteProduitDisp" => "bail|required|numeric",
            "idCat" => "bail|required|numeric",
            "idCouleur" => "bail|required|numeric",
            "idF" => "bail|required|numeric",
            "imageProduit" => "bail|required|image|mimes:png,jpeg,jpg,gif",

        ]);

        $data = $request->except(['_token', '_method', 'submit']);

        // Enregistrement de l'image
        $imgName = $request->imageProduit->getClientOriginalName();
        $path = $request->file('imageProduit')->storeAs(

            'pictures',
            $imgName,
            'public'
        );
        $data['imageProduit'] = $path;


        Produit::where('referenceProduit', $id)->update($data);

        session()->put('success', 'modification avec succès!');
        return redirect()->route('Admin.AllProduit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit) {
        //

        //$produit->delete();

        $id = array_slice(explode('/', url()->current()), -1)[0];
        Produit::where('referenceProduit', '=', $id)->delete();

        session()->put('success', 'suppression avec succès!');
        return redirect()->route('Admin.AllProduit');
    }
}
