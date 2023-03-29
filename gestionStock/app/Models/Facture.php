<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    public function bonCmd()
    {
        return $this->belongsTo(BonCmd::class,"bonCmd_id");
    }
    public function marches()
    {
        return $this->belongsTo(Marche::class,"marche_id");
    }
    
    public function articles()
    {
        return $this->belongsTo(Article::class,"article_id");
    }
}
