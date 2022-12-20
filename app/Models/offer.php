<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'percentage',
        'food_id',
        'restaurant_id'
    ];
    function getFoods()
    {
        return $this->belongsTo(foods::class,'food_id','id');  
    }
}
