<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facture extends Model {
    use HasFactory;

    protected $fillable = [
        'referenceCommande',
        'dateFacture',
        'prixTotal'
    ];
    public $timestamps = false;


    public static function findByUser($idU) {
        $rq = 'SELECT  idFacture, `referenceCommande`, `dateFacture`,`prixTotal` 
        FROM `factures` NATURAL JOIN `commandes` 
        WHERE idU = :idU ';

        return DB::select($rq, array('idU' => $idU));
    }

    public static function DetailsFacture($idU, $idFacture) {
        $rq = 'SELECT  idFacture, `referenceCommande`, `dateFacture`,`prixTotal` ,`refP` ,`quantite`,`titreProduit`,`prixProduit` ,`nom`,`prenom`,`email`,`tel` ,`adresse`  
        FROM `produits`,`factures` NATURAL JOIN `ligne_commandes` NATURAL JOIN `commandes` NATURAL JOIN  `utilisateurs` 
        WHERE idU = :idU  AND idFacture = :idFacture AND referenceProduit = refP
        ';
        return DB::select($rq, array('idU' => $idU, 'idFacture' => $idFacture));
    }
}
