<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangayIDModel extends Model
{
    protected $table = 'tbl_identification';
    protected $primaryKey = 'brgyID';
    public $timestamps = false;

    protected $fillable = [
        'residentID',
        'id_picture',
        'height',
        'weight',
        'place_of_birth',
        'emergency_firstname',
        'emergency_middlename',
        'emergency_suffix',
        'phone_num',
        'emergency_houseno',
        'emergency_street',
        'date_issued',
        'status',
        'valid_until',
        'created_at',
        'updated_at',
        'deleted_at'

    ];


    public function area()
    {
        return $this->belongsTo(area::class, 'area_no', 'areaID');
    }

  
    public function emergencyArea()
    {
        return $this->belongsTo(area::class, 'emergency_area_no', 'areaID');
    }


    public function civilStatus()
    {
        return $this->belongsTo(civil::class, 'civil_no', 'civilID');
    }

    public function religion()
    {
        return $this->belongsTo(religion::class, 'religion_no', 'religionID');
    }

  
}
