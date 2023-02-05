<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model {
    use HasFactory;

    protected $fillable = [
        'dateCommandePass',
        'dateCommandeLiv',
        'idU',
        'etat'
    ];

    protected  $primaryKey = 'referenceCommande';
    public $timestamps = false;



    public static function CommandeDeUtilisateur() {

        $rq = 'SELECT  commandes.referenceCommande,`titreProduit`,`referenceProduit`,`quantite`,`prixProduit`,`dateCommandePass` ,`dateCommandeLiv`, `etat`,`referenceProduit`,`nom`, `prenom` ,`email`,`tel` 
        FROM `commandes`, `produits`,`ligne_commandes`,`utilisateurs` 
        WHERE utilisateurs.idUtilisateur = :idU
        AND commandes.referenceCommande = ligne_commandes.referenceCommande
        AND ligne_commandes.refP = produits.referenceProduit
        AND utilisateurs.idUtilisateur = commandes.idU 
        Group BY commandes.referenceCommande,ligne_commandes.refP,utilisateurs.idUtilisateur';

        return DB::select($rq, array('idU' => session('idU')));
    }


    public static function CommandesParUtilisateur() {
        $rq = 'SELECT  ligne_commandes.quantite,`dateCommandePass` ,`dateCommandeLiv`, `etat`,`referenceProduit`,`nom`, `prenom` ,`email`,`tel`, produits.titreProduit, produits.prixProduit ,commandes.referenceCommande
        FROM `commandes`, `produits`,`ligne_commandes`,`utilisateurs` 
        WHERE  commandes.referenceCommande = ligne_commandes.referenceCommande
        AND ligne_commandes.refP = produits.referenceProduit
        AND utilisateurs.idUtilisateur = commandes.idU 
        Group BY commandes.referenceCommande ,ligne_commandes.refP , utilisateurs.idUtilisateur';
        return DB::select($rq);
    }
    public static function allCommandes() {
        $rq = 'SELECT `referenceCommande`, `dateCommandePass` ,`etat`,`tel`,`nom`,`prenom`
        FROM `Commandes` ,`utilisateurs`
        WHERE idU = idUtilisateur';
        return DB::select($rq);
    }
}
