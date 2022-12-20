<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    public function getUser()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    function getOrderdetails()
    {
        return $this->hasMany(Orderdetails::class);
    }

    public function getStatus()
    {
        return $this->belongsTo(Orderstatus::class,'orderstatus_id','id'); 
    }
    public function getFood()
    {
        return $this->belongsTo(foods::class,'food_id','id');
    }
}
