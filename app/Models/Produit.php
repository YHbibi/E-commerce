<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model {
    use HasFactory;

    protected $primaryKey = 'referenceProduit';
    protected $keyType = 'string';
    protected $fillable = [
        'referenceProduit',
        'quantiteProduitVend',
        'quantiteProduitDisp',
        "titreProduit",
        "poidsProduit",
        "descriptionProduit",
        "imageProduit",
        "prixProduit",
        "idCat",
        "idCouleur",
        "idF"

    ];
    public $timestamps = false;
    public $incrementing = false;

    public function updateProduitCmd() {
        $rq = 'UPDATE `produits`  
        SET `quantiteProduitVend`=   :quantiteProduitVend  , `quantiteProduitDisp`=  :quantiteProduitDisp    
        WHERE referenceProduit = :referenceProduit';

        return DB::update($rq, array(
            'referenceProduit' => $this->referenceProduit,
            'quantiteProduitVend' => $this->quantiteProduitVend,
            'quantiteProduitDisp' => $this->quantiteProduitDisp,

        ));
    }



    public static function DetailsProduitsParCategories($nomCat) {
        $rq = 'SELECT `referenceProduit`, `titreProduit`, `descriptionProduit`, `imageProduit`, `poidsProduit`, `prixProduit`, `quantiteProduitVend`, `quantiteProduitDisp`, `idF`, `idCat`, `idCouleur` 
        FROM `produits`,`categories` WHERE nomCategorie = :nomCat AND idC = idCat';

        return DB::select($rq, array($nomCat));
    }

    public static function DeatailsProduitsRechercher() {

        $rq = "SELECT distinct(referenceProduit ),titreProduit 
            FROM produits 
            WHERE titreProduit LIKE '%" .  $_GET["Search"]  . "%' LIMIT 10";
        return DB::select($rq);
    }
}
