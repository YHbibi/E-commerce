<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model {
    use HasFactory;

    protected  $table = 'utilisateurs';
    protected  $primaryKey = 'idUtilisateur';
    public $timestamps = false;
    protected $fillable = [
        "nom",
        "prenom",
        "dateNaissance",
        "email",
        "adresse",
        "tel",
        "codePostal",
        "mdp",
        "sex",

    ];
}
