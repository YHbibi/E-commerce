<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categorie extends Model {
    use HasFactory;

    protected $fillable = [
        'nomCategorie',

    ];
    public $timestamps = false;
    protected $primaryKey = 'idC';


    public static function ProduitsParCategories() {
    
    /*
    
     $rq =
            'SELECT `idC`, `nomCategorie`, count(`referenceProduit`) AS nbProduitsParCategorie
            FROM  `categories`,`produits` 
            WHERE categories.idC = produits.idCat GROUP BY (`nomCategorie`)';
            
                    return DB::select($rq, [1]);
    */
    
       
     
     /*           
         $rq =
		'SELECT `idC`, `nomCategorie`, count(`referenceProduit`) AS nbProduitsParCategorie
	    	FROM  `categories`,`produits` 
		WHERE categories.idC = produits.idCat GROUP BY (`nomCategorie`)';
  	return DB::select($rq);
  	
      */
  
       $ProduitsParCategorie = DB::table('produits')
            ->join('categories', 'categories.idC', '=', 'produits.idCat')
            ->select('produits.idCat','categories.nomCategorie' ,'categories.idC', 'produits.referenceProduit',DB::raw('count(`referenceProduit`) AS nbProduitsParCategorie'))
             ->groupBy('nomCategorie')
            ->get();
            return $ProduitsParCategorie;
        
        
    
    }
}
