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
        'house_no',
        'street',
        'area',
        'barangay',
        'city',
        'province',
        'business_house_no',
        'business_street',
        'business_area_no',
        'business_barangay',
        'business_city',
        'business_province',
        'date_of_birth',
        'gender',
        'civil_no',
        'contact_no',
        'religion',
        'citizenship',
        'voter_status',
        'precinct_no',
        'occupation',
        'employment_status',
        'special_group_no',
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
