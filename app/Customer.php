<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'cname', 'cnumber', 'product','snumber','mnumber','warranty'
        ,'rnumber','datep'
    ];
}
