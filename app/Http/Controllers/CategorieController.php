<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $Categories = Categorie::all();
        return view('Categorie.listCategories', compact('Categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('Categorie.ajouterCategorie');
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

            'nomCategorie' => 'bail|required|string|unique:categories,nomCategorie',

        ]);

        $data = $request->except(['_token', '_method']);

        $categorie = Categorie::create($data);
        $categorie->save();

        session()->put('success', 'a été ajouté avec succès!');
        return redirect()->route('Admin.AllCategorie');
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
    public function ProduitsParCategories() {

        $produitParCategories = Categorie::ProduitsParCategories();
        return view('components.produitParCategories', compact('produitParCategories'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
        $categorie = Categorie::find($id);
        return view('Categorie.editCategorie', compact('categorie'));
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

            'nomCategorie' => 'bail|required|string|unique:categories,nomCategorie',

        ]);

        $data = $request->except(['_token', '_method']);
        Categorie::where('idC', $id)->update($data);

        session()->put('success', 'modification avec succès!');
        return redirect()->route('Admin.AllCategorie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie) {
        //

        //$categorie->delete();
        $id = array_slice(explode('/', url()->current()), -1)[0];
        Categorie::where('idC', '=', $id)->delete();

        session()->put('success', 'suppression avec succès!');

        return redirect()->route('Admin.AllCategorie');
    }
}
