<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Civil extends Model
{
    protected $table = 'tbl_civil';
    protected $primaryKey = 'civilID';
    public $timestamps = false;
}
