<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        //$patients = Patient::paginate(10);
        return view('patient.index', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:patients',
            'password' => 'required|min:8|confirmed',
        ]);
    
        $patientData = $request->all();
        $patientData['password'] = Hash::make($request->password);
    
        $patient = Patient::create($patientData);
        Auth::guard('web')->login($patient); 
    
        return redirect()->route('patient.dashboard')
            ->with('success', 'Patient registered successfully.');
    }

    /**
     * login the specified resource.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
    
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('patient.dashboard')
                ->with('success', 'Patient logged in successfully.');
        }
    
        return back()->with('error', 'Invalid email or password.');
    }
    /**
     * logout the specified resource.
     */
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('patient.login')
            ->with('success', 'Patient logged out successfully.');
    } 
    
    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return view('patient.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patient.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:patients,email,' . $patient->id,
            'password' => 'required|min:8',
        ]);

        $patient->update($request->all());

        return redirect()->route('patient.dashboard')
            ->with('success', 'Patient updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patient.dashboard')
            ->with('success', 'Patient deleted successfully.');
    }
}