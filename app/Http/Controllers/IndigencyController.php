<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResidentModel;
use App\Models\IndigencyModel;
use Carbon\Carbon;

class IndigencyController extends Controller
{
    public function searchResident(Request $request)
    {
        $search = $request->input('search');

        $resident = \App\Models\ResidentModel::with('civilStatus')
            ->where('residentID', $search)
            ->orWhere('firstname', 'like', "%$search%")
            ->orWhere('lastname', 'like', "%$search%")
            ->first();

        if (!$resident) {
            return response()->json(['status' => 'not_found']);
        }

        return response()->json([
            'status' => 'found',
            'data' => $resident
        ]);
    }

    public function addIndigency(Request $request)
    {
        IndigencyModel::create([
            'residentID'        => $request->residentID,
            'purpose'           => $request->purpose,
            'year_of_residency' => $request->year_of_residency,
            'date_issued'       => Carbon::now(),
            'status'            => 'Pending',

        ]);

        return response()->json(['success' => true]);
    }

    public function loadRequests()
    {
        $requests = IndigencyModel::with(['resident'])
            ->orderBy('indigencyID', 'DESC')
            ->get();

        return response()->json($requests);
    }

    public function getRequest($id)
    {
        return IndigencyModel::with('resident')->find($id);
    }

    public function updateStatus(Request $request, $id)
    {
        $record = IndigencyModel::find($id);

        if (!$record) {
            return response()->json(['success' => false]);
        }

      
        $record->status = $request->status;

   
        if ($request->status === "Approved") {
            $record->date_approved = Carbon::now();
        }

        $record->save();

        return response()->json(['success' => true]);
    }

    public function deleteRequest($id)
    {
        $req = IndigencyModel::find($id);

        if (!$req) {
            return response()->json(['success' => false]);
        }

        $req->delete();

        return response()->json(['success' => true]);
    }
}
