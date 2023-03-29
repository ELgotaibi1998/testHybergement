<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Affectation extends Model
{
    use HasFactory; 
    use SoftDeletes;
    protected $dates="deleted_at";
    public function demandes()
    {
        return $this->belongsTo(Demande::class,"demande_id");
    }
}
