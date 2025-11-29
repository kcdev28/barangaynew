<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResidentModel;
use App\Models\ResidencyModel;
use Carbon\Carbon;

class ResidencyController extends Controller
{
    public function search(Request $request)
    {
        $q = $request->q;

        $resident = ResidentModel::with('civilStatus', 'area')
            ->where('residentID', $q)
            ->orWhere('firstname', 'like', "%$q%")
            ->orWhere('lastname', 'like', "%$q%")
            ->first();

        if (!$resident) {
            return response()->json([
                'status' => 'not_found',
                'message' => 'Resident not found'
            ]);
        }

        return response()->json([
            'residentID' => $resident->residentID,
            'firstname' => $resident->firstname,
            'middlename' => $resident->middlename,
            'lastname' => $resident->lastname,
            'date_of_birth' => $resident->date_of_birth,
            'civil_status_name' => $resident->civilStatus->civil_stat ?? '',
            'house_no' => $resident->house_no,
            'street' => $resident->street,
            'area' => $resident->area->area_name ?? '',
            'citizenship' => $resident->citizenship
        ]);
    }

    public function store(Request $request)
    {
        ResidencyModel::create([
            'residentID' => $request->residentID,
            'purpose' => $request->purpose,
            'year_of_residency' => $request->year_of_residency,
            'status' => 'Pending',
            'date_issued' => Carbon::now()
        ]);

        return response()->json(['message' => 'Saved']);
    }

    public function load()
    {
        $requests = ResidencyModel::with(['resident' => function ($query) {
            $query->with('civilStatus');
        }])->orderBy('residencyID', 'DESC')->get();

        return response()->json($requests);
    }

    public function view($id)
    {
        $request = ResidencyModel::with('resident.civilStatus', 'resident.area')->find($id);


        if (!$request) {
            return response()->json([
                'status' => 'not_found',
                'message' => 'Residency request not found'
            ]);
        }

        return response()->json($request);
    }

    // Update status
    public function updateStatus(Request $request, $id)
    {
        $residency = ResidencyModel::find($id);
        if (!$residency) return response()->json(['success' => false]);

        $residency->status = $request->status;

        if ($request->status === 'Approved') {
            $residency->date_approved = now();
        }

        $residency->save();

        return response()->json(['success' => true]);
    }

    public function delete($id)
    {
        $residency = ResidencyModel::find($id);

        if (!$residency) {
            return response()->json(['success' => false, 'message' => 'Residency not found']);
        }

        $residency->delete();

        return response()->json(['success' => true, 'message' => 'Residency deleted successfully']);
    }
}
