<?php

namespace App\Models;


use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'category_id',
        'price',
        'quantity'
    ];

    // public function category(){
    //     return $this->belongsTo(Category::class);
    // }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
