<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $Fournisseurs = Fournisseur::all();
        return view('Fournisseur.listFournisseur', compact('Fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('Fournisseur.ajouterFournisseur');
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

            "nomFournisseur" => "bail|required|string",
            "prenomFournisseur" => "bail|required|string",
            "codeFournisseur" => "bail|required|string|unique:fournisseurs,codeFournisseur",
            "telFournisseur" => "bail|required|string",

        ]);

        $data = $request->except(['_token', '_method']);

        $fournisseur = Fournisseur::create($data);
        $fournisseur->save();

        session()->put('success', 'a été ajouté avec succès!');
        return redirect()->route('Admin.AllFournisseur');
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
        $Fournisseur = Fournisseur::find($id);
        return view('Fournisseur.editFournisseur', compact('Fournisseur'));
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

            "nomFournisseur" => "bail|required|string",
            "prenomFournisseur" => "bail|required|string",
            "codeFournisseur" => "bail|required|string|unique:fournisseurs,codeFournisseur",
            "telFournisseur" => "bail|required|string",
        ]);
        $data = $request->except(['_token', '_method']);

        Fournisseur::where('idF', $id)->update($data);

        session()->put('success', 'modification avec succès!');
        return redirect()->route('Admin.AllFournisseur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fournisseur $fournisseur) {
        //
        // $fournisseur->delete();
        $id = array_slice(explode('/', url()->current()), -1)[0];
        Fournisseur::where('idF', '=', $id)->delete();

        session()->put('success', 'suppression avec succès!');

        return redirect()->route('Admin.AllFournisseur');
    }
}
