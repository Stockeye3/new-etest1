<?php

namespace App;
use app\category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'qty', 'description', 'photo', 'category_id' , 'visible'
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }
    
     public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function getCatName(Product $product){
        $cat = Category::find($product->category_id);
        return $cat->name;
    }
    
}
