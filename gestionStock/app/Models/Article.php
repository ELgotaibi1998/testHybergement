<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function categorie()
    {
      return  $this->belongsTo(Categorie::class,"categorie_id","id");
    }
    public function images()
    {
        return $this->hasMany(Image::class,"article_id");
    }
    public function unite()
    {
        return $this->belongsTo(Unite::class,"unite_id");
    }
    public function emplacement()
    {
        return $this->belongsTo(Emplacement::class,"emplacement_id");
    }
    public function demandes()
    {
        return $this->hasMany(Demande::class,"article_id");
    }
    
}
