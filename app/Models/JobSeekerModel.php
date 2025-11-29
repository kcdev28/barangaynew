<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobSeekerModel extends Model
{
    protected $table = 'tbl_jobseeker';
    protected $primaryKey = 'jobID';
    public $timestamps = false;

    protected $fillable = [
        'residentID',
        'year_of_residency',
        'status',
        'date_issued',
        'date_approved',
        'valid_until',
    ];

    public function resident()
    {
        return $this->belongsTo(ResidentModel::class, 'residentID', 'residentID');
    }
 
}
