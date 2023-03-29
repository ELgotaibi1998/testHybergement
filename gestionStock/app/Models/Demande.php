<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demande extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates="deleted_at";
    public function affectations( )
    {
       return $this->hasMany(Affectation::class,"demande_id");
    }
    public function users()
    {
        return $this->belongsTo(User::class,"user_id");
    }
    public function unites()
    {
        return $this->belongsTo(Unite::class,"unite_id");
    }
    public function articles()
    {
        return $this->belongsTo(Article::class,"article_id");
    }
    public function personnes()
    {
        return $this->belongsTo(Personne::class,"personne_id");
    }
    public function salles()
    {
        return $this->belongsTo(Salle::class,"salle_id");
    }
}
