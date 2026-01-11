<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResidentModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ResidentController extends Controller
{

    public function list()
    {
        $residents = ResidentModel::select(
            "residentID",
            "firstname",
            "lastname",
            "gender",
            "voter_status",
            "status",
            "civil_no",
            "religion_no",
            "special_group_no",
            "area_no"
        )
            ->with([

                'religion:religionID,religion',
                'civilStatus:civilID,civil_stat',
                'specialGroup:specialID,status',
                'area:areaID,area_name'
            ])
            ->orderBy('firstname', 'ASC')
            ->get();

        return response()->json([
            "success" => true,
            "data" => $residents
        ]);
    }

    public function show($id)
    {
        $resident = ResidentModel::with([

            'religion:religionID,religion',
            'civilStatus:civilID,civil_stat',
            'specialGroup:specialID,status',
            'area:areaID,area_name'
        ])->find($id);

        if (!$resident) {
            return response()->json([
                "success" => false,
                "message" => "Resident not found"
            ], 404);
        }

        return response()->json([
            "success" => true,
            "data" => $resident
        ]);
    }

    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'firstname' => 'required',
                'middlename' => 'nullable',
                'lastname' => 'required',
                'suffix' => 'nullable',
                'profile_image' => 'nullable',
                'house_no' => 'required',
                'street' => 'required',
                'area_no' => 'required',
                'date_of_birth' => 'required',
                'gender' => 'required',
                'civil_no' => 'nullable',
                'contact_no' => 'required',
                'religion_no' => 'nullable',
                'citizenship' => 'nullable',
                'voter_status' => 'nullable',
                'precinct_no' => 'nullable',
                'occupation' => 'nullable',
                'employment_status' => 'nullable',
                'special_group_no' => 'nullable',
                'verify_img' => 'nullable',
                'email' => [
                    'required',
                    Rule::unique('tbl_residents', 'email'),
                    function ($attribute, $value, $fail) {
                        if (DB::table('tbl_users')->where('email', $value)->exists()) {
                            $fail("The email has already been taken.");
                        }
                    }
                ],

                'password' => 'required',
                'confirm_password' => 'required',

            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors()
                ], 422);
            }


            $profileImagePath = null;
            if ($request->hasFile('profile_image')) {
                $profileImage = $request->file('profile_image');
                $profileImageName = time() . '_profile_' . $profileImage->getClientOriginalName();
                $profileImagePath = $profileImage->storeAs('residents/profiles', $profileImageName, 'public');
            }


            $verifyImagePath = null;
            if ($request->hasFile('verify_img')) {
                $verifyImage = $request->file('verify_img');
                $verifyImageName = time() . '_verify_' . $verifyImage->getClientOriginalName();
                $verifyImagePath = $verifyImage->storeAs('residents/verifications', $verifyImageName, 'public');
            }


            $residentData = [
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'suffix' => $request->suffix,
                'profile_image' => $profileImagePath,
                'house_no' => $request->house_no,
                'street' => $request->street,
                'area_no' => $request->area_no,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'civil_no' => $request->civil_no,
                'contact_no' => $request->contact_no,
                'religion_no' => $request->religion_no,
                'citizenship' => $request->citizenship,
                'voter_status' => $request->voter_status,
                'precinct_no' => $request->precinct_no,
                'occupation' => $request->occupation,
                'employment_status' => $request->employment_status,
                'special_group_no' => $request->special_group_no,
                'verify_image' => $verifyImagePath,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => 'Pending',
                'created_at' => Carbon::now()
              
            ];


            $resident = ResidentModel::create($residentData);

            return response()->json([
                'success' => true,
                'message' => 'Resident added successfully!',
                'data' => $resident
            ], 201);
        } catch (\Exception $e) {

            if (isset($profileImagePath)) {
                Storage::disk('public')->delete($profileImagePath);
            }
            if (isset($verifyImagePath)) {
                Storage::disk('public')->delete($verifyImagePath);
            }

            return response()->json([
                'success' => false,
                'message' => 'Failed to add resident. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function verify($id)
    {
        try {
            $resident = ResidentModel::find($id);

            if (!$resident) {
                return response()->json([
                    "success" => false,
                    "message" => "Resident not found"
                ], 404);
            }

            // Update status to Verified
            $resident->status = 'Verified';
            $resident->save();

            return response()->json([
                "success" => true,
                "message" => "Resident verified successfully!",
                "data" => $resident
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Failed to verify resident",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $resident = ResidentModel::find($id);

            if (!$resident) {
                return response()->json([
                    'success' => false,
                    'message' => 'Resident not found'
                ], 404);
            }

            // Validation rules
            $validator = Validator::make($request->all(), [
                'firstname' => 'required',
                'middlename' => 'nullable',
                'lastname' => 'required',
                'suffix' => 'nullable',
                'profile_image' => 'nullable',
                'house_no' => 'required',
                'street' => 'required',
                'area_no' => 'required',
                'date_of_birth' => 'required',
                'gender' => 'required',
                'civil_no' => 'required',
                'contact_no' => 'required',
                'religion_no' => 'nullable',
                'citizenship' => 'nullable',
                'voter_status' => 'nullable',
                'precinct_no' => 'nullable',
                'occupation' => 'nullable',
                'employment_status' => 'nullable',
                'special_group_no' => 'nullable',
                'verify_img' => 'nullable',
                'email' => [
                    'required',
                    Rule::unique('tbl_residents', 'email')->ignore($id, 'residentID'),
                    function ($attribute, $value, $fail) use ($id) {
                        if (DB::table('tbl_users')->where('email', $value)->where('userID', '!=', $id)->exists()) {
                            $fail("The email has already been taken.");
                        }
                    }
                ],
                'password' => 'nullable',
                'confirm_password' => 'nullable',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Handle profile image upload
            $profileImagePath = $resident->profile_image;
            if ($request->hasFile('profile_image')) {
                // Delete old image if exists
                if ($resident->profile_image) {
                    Storage::disk('public')->delete($resident->profile_image);
                }

                $profileImage = $request->file('profile_image');
                $profileImageName = time() . '_profile_' . $profileImage->getClientOriginalName();
                $profileImagePath = $profileImage->storeAs('residents/profiles', $profileImageName, 'public');
            }

            // Handle verification image upload
            $verifyImagePath = $resident->verify_image;
            if ($request->hasFile('verify_img')) {
                // Delete old image if exists
                if ($resident->verify_image) {
                    Storage::disk('public')->delete($resident->verify_image);
                }

                $verifyImage = $request->file('verify_img');
                $verifyImageName = time() . '_verify_' . $verifyImage->getClientOriginalName();
                $verifyImagePath = $verifyImage->storeAs('residents/verifications', $verifyImageName, 'public');
            }

            // Update resident data
            $resident->firstname = $request->firstname;
            $resident->middlename = $request->middlename;
            $resident->lastname = $request->lastname;
            $resident->suffix = $request->suffix;
            $resident->profile_image = $profileImagePath;
            $resident->house_no = $request->house_no;
            $resident->street = $request->street;
            $resident->area_no = $request->area_no;
            $resident->date_of_birth = $request->date_of_birth;
            $resident->gender = $request->gender;
            $resident->civil_no = $request->civil_no;
            $resident->contact_no = $request->contact_no;
            $resident->religion_no = $request->religion_no;
            $resident->citizenship = $request->citizenship;
            $resident->voter_status = $request->voter_status;
            $resident->precinct_no = $request->precinct_no;
            $resident->occupation = $request->occupation;
            $resident->employment_status = $request->employment_status;
            $resident->special_group_no = $request->special_group_no;
            $resident->verify_image = $verifyImagePath;
            $resident->email = $request->email;
            

            // Only update password if provided
            if ($request->filled('password')) {
                $resident->password = Hash::make($request->password);
            }

            // Automatically set updated_at to current timestamp
            $resident->updated_at = now();

            $resident->save();

            return response()->json([
                'success' => true,
                'message' => 'Resident updated successfully!',
                'data' => $resident
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update resident. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $resident = ResidentModel::find($id);

        if (!$resident) {
            return response()->json([
                'success' => false,
                'message' => 'Resident not found.'
            ], 404);
        }

        $resident->delete();

        return response()->json([
            'success' => true,
            'message' => 'Resident deleted successfully.'
        ]);
    }
}
