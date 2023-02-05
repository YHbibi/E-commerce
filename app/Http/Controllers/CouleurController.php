<?php

namespace App\Http\Controllers;

use App\Models\Couleur;
use Illuminate\Http\Request;

class CouleurController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $couleurs = Couleur::all();
        return view('Couleur.listCouleurs', compact('couleurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('Couleur.ajouterCouleur');
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

            'libCouleur' => 'bail|required|string|unique:couleurs,libCouleur',

        ]);

        $data = $request->except(['_token', '_method']);

        $couleur = Couleur::create($data);
        $couleur->save();

        session()->put('success', 'a été ajouté avec succès!');
        return redirect()->route('Admin.AllCouleur');
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
        $couleur = Couleur::find($id);
        return view('Couleur.editCouleur', compact('couleur'));
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

            'libCouleur' => 'bail|required|string',

        ]);

        $data = $request->except(['_token', '_method']);
        Couleur::where('idCouleur', $id)->update($data);

        session()->put('success', 'modification avec succès!');
        return redirect()->route('Admin.AllCouleur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Couleur $couleur) {
        //

        //dd($couleur);
        $id = array_slice(explode('/', url()->current()), -1)[0];
        Couleur::where('idCouleur', '=', $id)->delete();

        //Couleur::where('idCouleur', '=', $couleur->idCouleur)->delete();
        //$couleur->delete();

        session()->put('success', 'suppression avec succès!');
        return redirect()->route('Admin.AllCouleur');
    }
}
