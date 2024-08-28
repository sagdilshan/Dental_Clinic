<?php

namespace App\Http\Controllers;

use App\Models\PatientModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $allpatients = PatientModel::where('deleted', 'no')
            ->orderBy('created_at', 'desc')
            ->get();


        return view('website-pages.admin.admin-dashboard', compact('allpatients'));

    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function AddPatient()
    {
        return view('website-pages.admin.patient-add');

    }


    public function AdminStorePatients(Request $request)
    {
        $validatedData = $request->validate([
            'patient_name' => 'required|string|max:49',
            'mobile' => 'required|string|max:15',
            'date_visit' => 'required',
            'age' => 'required|numeric|min:0|max:150',
            'complain' => 'required|string',
            'investigation' => 'required|string',
            'treatments' => 'required|string',
            'charges' => 'required|numeric',


        ]);

        $patients = new PatientModel();
        $patients->patient_name = $validatedData['patient_name'];
        $patients->mobile = $validatedData['mobile'];
        $patients->date_visit = $validatedData['date_visit'];
        $patients->age = $validatedData['age'];
        $patients->complain = $validatedData['complain'];
        $patients->investigation = $validatedData['investigation'];
        $patients->treatments = $validatedData['treatments'];
        $patients->charges = $validatedData['charges'];

        $patients->created_by = Auth::user()->id;


        $patients->save();

        //Redirect back with a success message
        $notification = array(
            'message' => 'Patients Added',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.dashboard')->with($notification);
    }

    public function EditPatient($id)
    { {
            $patient = PatientModel::findOrFail($id);
            return view('website-pages.admin.edit-patient', compact('patient'));
        }
    }

    public function UpdatePatient(Request $request)
    {
        $validatedData = $request->validate([
            'patient_name' => 'required|string|max:49',
            'mobile' => 'required|string|max:15',
            'date_visit' => 'required',
            'age' => 'required|numeric|min:0|max:150',
            'complain' => 'required|string',
            'investigation' => 'required|string',
            'treatments' => 'required|string',
            'charges' => 'required|numeric',


        ]);

        $oid = $request->id;
        $patients = PatientModel::findOrFail($oid);

        $patients->patient_name = $validatedData['patient_name'];
        $patients->mobile = $validatedData['mobile'];
        $patients->date_visit = $validatedData['date_visit'];
        $patients->age = $validatedData['age'];
        $patients->complain = $validatedData['complain'];
        $patients->investigation = $validatedData['investigation'];
        $patients->treatments = $validatedData['treatments'];
        $patients->charges = $validatedData['charges'];

        $patients->updated_by = Auth::user()->id;


        $patients->save();

        //Redirect back with a success message
        $notification = array(
            'message' => 'Patient Details Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.dashboard')->with($notification);
    }


    public function RemovePatient($id)
    {
        $patient = PatientModel::find($id);

        if ($patient) {
            $patient->update([
                'deleted' => 'yes',
                'deleted_by' => Auth::user()->id, // Set the user who deleted the record
                'deleted_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Owner Details Removed',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }


}
