<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foods extends Model
{
    use HasFactory;
    protected $fillable = [
    'restaurant_id',
     'name',
     'caloriecount',
     'cuisine',
     'diets',
     'description',
     'image',
     'category_id',
     'price',
     'discountpercentage',
     'available',
    ];
    public function getCategory()
    {
        return $this->belongsTo(categorie::class,'category_id','id');
    }
}
