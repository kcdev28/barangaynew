<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BarangayIDController extends Controller
{
    public function showForm()
    {

        $areas = DB::table('tbl_area')->get();
        $civilStatuses = DB::table('tbl_civil')->get();
        $religions = DB::table('tbl_religion')->get();
        
      
        $resident = null;
        if (Session::has('user_id') && Session::get('user_type') === 'resident') {
      
            $resident = DB::table('tbl_residents')
                ->where('residentID', Session::get('user_id'))
                ->first();
        }
        
        return view('barangayIDpage', compact('areas', 'civilStatuses', 'religions', 'resident'));
    }
}