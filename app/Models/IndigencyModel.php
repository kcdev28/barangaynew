<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndigencyModel extends Model
{
    protected $table = 'tbl_indigency';
    protected $primaryKey = 'indigencyID';
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
