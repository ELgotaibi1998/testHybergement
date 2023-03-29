<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Radiat extends Model
{
    use HasFactory;
    public function articles()
    {
       return $this->BelongsTo(Article::class,"article_id");
    }
}
