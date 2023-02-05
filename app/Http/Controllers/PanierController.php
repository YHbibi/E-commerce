<?php


namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


/* 
 * The Illuminate\Support\Collection class provides a fluent,
 * convenient wrapper for working with arrays of data. 
 * For example, check out the following code. 
 * We'll use the collect helper to create a new collection instance from the array
*/

class PanierController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        //Session::flush();

        //session()->push("panier", ["82C30009F" => 5]);
        // session()->push("panier", ["KL-HD1" => 2]);
        // session()->push("panier", ["GN416" => 4]);
        // session()->push("panier", ["S-FB23" => 1]);

        // var_dump(session("panier"));
        // die();

        if (Session::has('panier')  && count(session("panier")) > 0) {
            foreach (session("panier") as $Paniers => $Panier) {
                $refProd = key($Panier);
                $p = Produit::findOrFail($refProd);
                $p = collect($p)->all();
                $produits[] = $p;
            }
            //var_dump(session("panier"));
            // $data = session()->all();
            // var_dump($data);
            //foreach (session("panier") as $panier)
            //    var_dump($panier);

            //die();

            return view('Panier.listPanier', compact('produits'));
        } else {
            return redirect()->route('index')->with('warning', 'Panier vide');
        }
    }


    /*
    public  function AddProduitPanier($refProd, $qte) {
        /// RequestPanier validation des formulaires 
        // puis enregistrement  dans la session 
        echo $refProd;
        die();


        if (Session::has('panier')) {

            $aux = session('panier');
            var_dump($aux);
            die();
            //if(in_array())
            Session::put('panier', $aux);
        } else {
            // la 1er fois 
            session()->push("panier", [$refProd => $qte]);
        }

        return redirect()->action('App\Http\Controllers\PanierController@index');
    }
*/
    public function DeleteProduitPanier($ref) {

        /**
         * $i => position du produit a supprimer dans la session('panier) 
         */
        $i = 0;

        if (Session::has('panier')) {
            foreach (session("panier") as $panier) {
                if (key($panier) === $ref) {

                    /**
                     * creer une copie de la session("panier") => $aux
                     * supprimer le produit du panier  du tableau  $aux
                     * initialiser la session("panier") avec le tableau $aux
                     */

                    $aux = session('panier');
                    array_splice($aux, $i, 1);
                    Session::put('panier', $aux);

                    return back()->with('success', 'Produit supprimé');
                }
                $i++;
            }
        } else {
            //return back()->with('info', 'Produit supprimé');
            return redirect()->action('App\Http\Controllers\PanierController@index');
        }
    }
    public static function ViderPanier() {
        if (Session::has('panier')) {
            Session::forget('panier');
        }
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

        // validation du formulaire
        $this->validate($request, [
            'referenceProduit' => 'bail|required',
            'quantiteProduit' => 'bail|required|numeric',
        ]);

        $data = $request->except(['_token']);


        $i = 0;
        $exist = false;

        if (Session::has('panier')) {

            $aux = session('panier');
            foreach ($aux  as $panier) {
                //var_dump($panier);
                if (key($panier) === $data['referenceProduit']) {
                    var_dump($aux[$i]);
                    var_dump($aux[$i][key($panier)]);

                    $aux[$i][key($panier)] +=  $data['quantiteProduit'];
                    $exist = true;
                }
                $i++;
            }

            // si le produit n'existe pas dans le panier d'avence
            if ($exist == false) {
                echo '1';
                $aux[$i] = array($data['referenceProduit'] => (int) $data['quantiteProduit']);
            }

            Session::put('panier', $aux);
        } else {

            session()->push("panier", [$data['referenceProduit'] => (int) $data['quantiteProduit']]);
        }

        return redirect()->action('App\Http\Controllers\PanierController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
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
