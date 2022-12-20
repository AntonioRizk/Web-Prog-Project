<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class restaurant extends Model
{
    use HasFactory;
    protected $table = 'restaurants';
    protected $fillable = [
        'approved',
        'name',
        'email',
        'phone',
        'address',
        'mainimage',
        'active',
        'delivery_fee',
        'password',
    ];
}
