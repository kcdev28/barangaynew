<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResidencyModel extends Model
{
    protected $table = 'tbl_residency';
    protected $primaryKey = 'residencyID';
    public $timestamps = false;

    protected $fillable = [
        'residentID',
        'purpose',
        'year_of_residency',
        'date_issued',
        'status',
        'date_approved',
        'valid_until',
    ];

    public function resident()
    {
        return $this->belongsTo(ResidentModel::class, 'residentID', 'residentID');
    }
}
