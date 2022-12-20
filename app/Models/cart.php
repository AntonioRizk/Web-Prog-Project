<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $fillable = [  
       'quantity',
       'price',
       'food_id',
       'user_id',
       'restaurant_id'  
    ];
    public function getFood()
    {
        return $this->belongsTo(foods::class,'food_id','id');
    } 
}
