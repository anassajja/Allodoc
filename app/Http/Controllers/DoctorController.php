<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctor.index', compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:doctors',
            'password' => 'required|min:6|confirmed',
            'specialization' => 'required',
            'phone' => 'required|numeric|digits:10',
            'address' => 'required',
            'city' => 'required',
            'workplace' => 'required',
        ]);
    
        $doctorData = $request->all();
        $doctorData['password'] = Hash::make($request->password);
    
        $doctor = Doctor::create($doctorData);
        Auth::guard('doctor')->login($doctor);
    
        return redirect()->route('doctor.dashboard')
            ->with('success', 'Doctor registered successfully.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
    
        if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...
            return redirect()->route('doctor.dashboard')
                ->with('success', 'Doctor logged in successfully.');
        }
    
        return back()->with('error', 'Invalid Login Details');
    }
    public function logout()
    {
        Auth::guard('doctor')->logout();
        return redirect()->route('doctor.login')
            ->with('success', 'Doctor logged out successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('doctor.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:doctors,email,' . $doctor->id,
            'password' => 'required|min:8',
            'specialization' => 'required',
            'phone' => 'required|numeric|digits:10',
            'address' => 'required',
            'city' => 'required',
            'workplace' => 'required',
        ]);

        $doctorData = $request->all();
        $doctorData['password'] = Hash::make($request->password);

        $doctor->update($doctorData);

        return redirect()->route('doctor.dashboard')
            ->with('success', 'Doctor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('doctor.dashboard')
            ->with('success', 'Doctor deleted successfully.');
    }
}