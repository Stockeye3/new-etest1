<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'qty', 'description', 'image', 'cat_id' , 'visible'
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }
    
     public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    
}
