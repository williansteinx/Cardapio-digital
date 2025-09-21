<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prato extends Model
{
    protected $fillable = ['nm_prato', 
                           'desc_ingred', 
                           'vl_prato', 
                           'arquivo',
                           'user_id'];
}

