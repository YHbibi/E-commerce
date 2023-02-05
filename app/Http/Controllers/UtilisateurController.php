<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UtilisateurController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        echo 'index';
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create() {
        //

        return view('Utilisateur.inscription');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // echo 'STORE';
        //

        //bail : on arrête de vérifier dès qu’une règle n’est pas respectée
        $this->validate($request, [

            'nom' => 'bail|required|min:1|max:255',
            'prenom' => 'bail|required|min:1|max:255',
            'email' => 'bail|required|email|unique :utilisateurs,email',
            'dateNaissance' => 'bail|required|date',
            'tel' => 'bail|required|min:1|max:255',
            'adresse' => 'bail|required|min:1|max:255',
            'codePostal' => 'bail|required|numeric',
            "mdp" => "bail|required|min:6",
            "sex" => "bail|required",
            "verif" => "required"


        ]);

        $data = $request->except(['_token', '_method', 'verif', 'mdp2']);
        $data['mdp'] = Hash::make($data['mdp']);
        //dd($data);

        $user = Utilisateur::create($data);
        $user->save();

        // pour recuperer l'idU (autoIncrement)
        $user = Utilisateur::where('email', '=', $data['email'])->first();
        $user = collect($user)->all();

        Session::put('idU', $user['idUtilisateur']);
        Session::put('nom', $data['nom']);
        Session::put('email', $data['email']);
        Session::put('mdp', Hash::make($data['mdp']));
        Session::put('admin', 0);
        Session::put('connected', true);

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
        //echo 'SHOW';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
        $utilisateur = Utilisateur::find($id);
        return view('Utilisateur.editUser', compact('utilisateur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Utilisateur $utilisateur) {
        //

        //bail : on arrête de vérifier dès qu’une règle n’est pas respectée
        $this->validate($request, [

            'nom' => 'bail|required|min:1|max:255',
            'prenom' => 'bail|required|min:1|max:255',
            'dateNaissance' => 'bail|required|date',
            'tel' => 'bail|required|min:1|max:255',
            'adresse' => 'bail|required|min:1|max:255',
            'codePostal' => 'bail|required|numeric',
        ]);

        $data = $request->except(['_token', '_method']);

        Utilisateur::where('idUtilisateur', session('idU'))->update($data);

        return back()->with('success', "modifications avec succes");
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
    public function logIn() {
        //
        return view('Utilisateur.connexion');
    }
    public function logOut() {
        //
        Session::flush();
        return redirect()->route('index');
    }


    public function Auth(Request $request) {
        //

        //bail : on arrête de vérifier dès qu’une règle n’est pas respectée
        $this->validate($request, [
            'email' => 'bail|required|email|exists:utilisateurs,email',
            'mdp' => 'bail|required|min:6|max:255',
        ]);

        $data = $request->except(['_token']);

        $user = Utilisateur::where('email', '=', $data['email'])->first();
        $user = collect($user)->all();

        // verification du mdp
        if (Hash::check($data['mdp'], $user['mdp'])) {

            Session::put('connected', true);
            Session::put('nom', $user['nom']);
            Session::put('idU', $user['idUtilisateur']);
            Session::put('email', $user['email']);
            Session::put('mdp', Hash::make($data['mdp']));
            Session::put('admin', $user['admin']);

            return redirect()->route('index');
        } else {

            return back()->with('danger', 'mot de passe incorrect');
        }
    }
}
