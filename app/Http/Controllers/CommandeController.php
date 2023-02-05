<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\LigneCommande;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $commandes = Commande::allCommandes();
        return view('Commande.listCommandes', compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //

        //bail : on arrête de vérifier dès qu’une règle n’est pas respectée
        $this->validate($request, [

            "connected" => "string"

        ]);


        if ((session('idU') && session('panier')) && count(session('panier')) > 0) {
            $tabCmd = array(
                'dateCommandePass' =>  date('Y-m-d G:i:s'),
                'dateCommandeLiv' => date('Y-m-d', strtotime('+7 day')),
                'idU' => session('idU')
            );
            // enregistrer la commande correspond a l'utilisateur connecté
            $C = Commande::create($tabCmd);
            $r = $C->save();

            // var_dump($C);
            // dd($r);

            if ($r === true) {

                //pour recuperer le reference du commande (auto increment)
                $C1 = Commande::where('dateCommandePass', '=', $tabCmd['dateCommandePass'])->first();
                $C1 = collect($C1)->all();
                // dd($C1);
                $prixTotal = 0;
                //enregistrer tous les lignes de commande pour cette referenceCommande 
                foreach (session('panier') as $pabniers => $panier) {

                    $tabLC["referenceCommande"] = $C1["referenceCommande"];
                    $tabLC["refP"] = key($panier);
                    $tabLC["quantite"] = $panier[key($panier)];


                    //enregistrer une ligne de commande
                    $LC = LigneCommande::create($tabLC);
                    $LC->save();

                    //modifier la qte disponible & vendue
                    $ProdCmd = new Produit(array("referenceProduit" => $tabLC["refP"]));

                    $p = Produit::where('referenceProduit', '=', $tabLC['refP'])->first();
                    $p = collect($p)->all();

                    $quantiteProduitDisp = $p['quantiteProduitDisp'];

                    $ProdCmd = new Produit(array("referenceProduit" => $tabLC["refP"], "quantiteProduitVend" => $tabLC["quantite"], "quantiteProduitDisp" => $quantiteProduitDisp));



                    $qteVend =  $p['quantiteProduitVend'] + $ProdCmd->quantiteProduitVend;
                    $qteDisp =  $p['quantiteProduitDisp'] - $ProdCmd->quantiteProduitVend;

                    $ProdCmd->quantiteProduitVend = $qteVend;
                    $ProdCmd->quantiteProduitDisp = $qteDisp;

                    $ProdCmd->updateProduitCmd();


                    // pour calculer la somme du prix de toute la commande
                    $prixTotal += $p['prixProduit'] * $tabLC["quantite"];
                }
                // enregistrer une facture
                $f =  Facture::create(array("referenceCommande" => $C1["referenceCommande"], "dateFacture" => date("Y-m-d"), "prixTotal" => $prixTotal));
                $f->save();
                PanierController::ViderPanier();

                session()->put('success', 'Commande passé avec succés !');

                return redirect()->route('index');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
        $commandes =  Commande::CommandeDeUtilisateur();
        if (count($commandes) > 0) {
            return view('Commande.listCommandesParUtilisateur', compact('commandes'));
        } else {
            return back()->with('warning', 'Pas de commandes!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($refCmd) {
        //

        $commande = Commande::find($refCmd);
        return view('Commande.editCommande', compact('commande'));
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
            "etat" => "required|string"
        ]);

        $data = $request->except(['_token', '_method']);
        Commande::where('referenceCommande', $data['referenceCommande'])->update($data);

        session()->put('success', 'modification avec succès!');
        return redirect()->route('Commande.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
