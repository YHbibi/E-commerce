<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class StatistiquesController extends Controller {
    //
    public function index() {
        $commandes = Commande::CommandesParUtilisateur();

        return view('Admin.listStatistiques', compact('commandes'));
    }
}
