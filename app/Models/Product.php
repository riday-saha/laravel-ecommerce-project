<?php

namespace App\Models;


use App\Models\Order;
use App\Models\add_cart;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function addcarts(){
        return $this->hasMany(add_cart::class);
    }


    public function orders() {
        return $this->hasMany(Order::class);
    }






}
