<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'vw_admins';
    
    protected $fillable = [
        'email',
        'password',
        'full_name',
        'role',
        'position'
    ];

   
   
}