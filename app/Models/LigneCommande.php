<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model {
    use HasFactory;

    protected $table = 'ligne_commandes';

    public $timestamps = false;

    protected $fillable = [
        'referenceCommande',
        'refP',
        'quantite',
    ];
}
