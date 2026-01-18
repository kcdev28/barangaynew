<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResidentModel extends Model
{
    protected $table = 'tbl_residents';
    protected $primaryKey = 'residentID';
    public $timestamps = false;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'suffix',
        'profile_image',
        'house_no',
        'street',
        'area_no',
        'date_of_birth',
        'gender',
        'civil_no',
        'contact_no',
        'religion_no',
        'citizenship',
        'voter_status',
        'precinct_no',
        'occupation',
        'employment_status',
        'special_group_no',
        'verify_image',
        'email',
        'password',
        'status',
        'created_at',
        'updated_at'
    ];


    public function civilStatus()
    {
        return $this->belongsTo(civil::class,'civil_no', 'civilID');
    }

    public function religion()
    {
        return $this->belongsTo(religion::class, 'religion_no', 'religionID');
    }

    public function specialGroup()
    {
        return $this->belongsTo(special::class, 'special_group_no', 'specialID');
    }

    public function area()
    {
        return $this->belongsTo(area::class, 'area_no', 'areaID');
    }
}
