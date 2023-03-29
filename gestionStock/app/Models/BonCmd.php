<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonCmd extends Model
{
    use HasFactory;
    public function factures()
    {
       return $this->hasMany(Facture::class,"bonCmd_id");
    }
    public function fournisseurs()
    {
        return $this->belongsTo(Fournisseur::class,"fournisseur_id");
    }
}
