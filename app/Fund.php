<?php

namespace App;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    use HasApiTokens;
    protected $fillable = [
        'funds'
    ];
}
