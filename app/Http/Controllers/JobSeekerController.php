<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResidentModel;
use App\Models\JobSeekerModel;
use Carbon\Carbon;

class JobSeekerController extends Controller
{

    public function searchResident(Request $request)
    {
        $search = $request->input('search');

        $resident = ResidentModel::where('residentID', $search)
            ->orWhere('firstname', 'like', "%$search%")
            ->orWhere('lastname', 'like', "%$search%")
            ->first();

        if (!$resident) {
            return response()->json(['status' => 'not_found']);
        }

        return response()->json([
            'status' => 'found',
            'data' => [
                'residentID' => $resident->residentID,
                'fullname'   => $resident->firstname . ' ' . ($resident->middlename ?? '') . ' ' . $resident->lastname,
                'dob'        => $resident->date_of_birth,
                'address'    => $resident->house_no . ' ' . $resident->street . ', ' . ($resident->area->area_name ?? '')
            ]
        ]);
    }


    public function addJobSeeker(Request $request)
    {
        JobSeekerModel::create([
            'residentID'   => $request->residentID,
            'date_issued'  => Carbon::now(),
            'status'       => 'Pending'
        ]);

        return response()->json(['success' => true]);
    }

    public function load()
    {

        $jobSeekers = JobSeekerModel::with('resident.area')->orderBy('jobID', 'DESC')->get();

        return response()->json($jobSeekers);
    }


    public function view($id)
    {
        $jobSeeker = JobSeekerModel::with('resident.area')->find($id);

        if (!$jobSeeker) {
            return response()->json(['status' => 'not_found']);
        }

        return response()->json([
            'status' => 'found',
            'data' => [
                'jobID'       => $jobSeeker->jobID,
                'residentID'  => $jobSeeker->residentID,
                'fullname'    => $jobSeeker->resident->firstname . ' ' . ($jobSeeker->resident->middlename ?? '') . ' ' . $jobSeeker->resident->lastname,
                'address'     => $jobSeeker->resident->house_no . ' ' . $jobSeeker->resident->street . ', ' . ($jobSeeker->resident->area->area_name ?? ''),
                'status'      => $jobSeeker->status,
                'date_issued' => $jobSeeker->date_issued,
            ]
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $jobSeeker = JobSeekerModel::find($id);
        if (!$jobSeeker) {
            return response()->json(['success' => false, 'message' => 'Job Seeker not found']);
        }

        $status = $request->status;

        $jobSeeker->status = $status;

        if ($status === 'Approved') {
            $jobSeeker->date_issued = now();
        }

        $jobSeeker->save();

        return response()->json(['success' => true, 'status' => $status]);
    }

    public function delete($id)
    {
        $jobSeeker = JobSeekerModel::find($id);

        if (!$jobSeeker) {
            return response()->json(['success' => false, 'message' => 'Job Seeker not found']);
        }

        $jobSeeker->delete();

        return response()->json(['success' => true, 'message' => 'Job Seeker deleted successfully']);
    }
}
