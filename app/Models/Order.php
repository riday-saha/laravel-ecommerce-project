<?php

namespace App\Models;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    

    public function product(){
        return $this->belongsTo(Product::class,'rec_product_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'rec_user_id','id');
    }










}
