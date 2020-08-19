<?php

namespace App;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasApiTokens;
    protected $fillable = [
        'name', 'price', 'quantity',
    ];
}
