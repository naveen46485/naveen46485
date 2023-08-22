<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(categories::class);
    }
    public function subcategory(){
        return $this->belongsTo(subcategories::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}


