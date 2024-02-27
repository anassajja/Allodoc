<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class TherapistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $therapists = Therapist::all();
        return view('therapist.index', compact('therapists'));
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

        $therapistData = $request->all();
        $therapistData['password'] = Hash::make($request->password);

        $therapist = Therapist::create($therapistData);
        Auth::guard('therapist')->login($therapist);

        return redirect()->route('therapist.dashboard')
            ->with('success', 'Therapist registered successfully.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if (Auth::guard('therapist')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...
            return redirect()->route('therapist.dashboard')
                ->with('success', 'Therapist logged in successfully.');
        }

        return back()->with('error', 'Invalid Login Details');
    }

    public function logout()
    {
        Auth::guard('therapist')->logout();
        return redirect()->route('therapist.login')
            ->with('success', 'Therapist logged out successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Therapist $therapist)
    {
        return view('therapist.show', compact('therapist'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Therapist $therapist)
    {
        return view('therapist.edit', compact('therapist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Therapist $therapist)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:doctors,email,'.$therapist->id,
            'specialization' => 'required',
            'phone' => 'required|numeric|digits:10',
            'address' => 'required',
            'city' => 'required',
            'workplace' => 'required',
        ]);

        $therapistData = $request->all();
        if ($request->password) {
            $therapistData['password'] = Hash::make($request->password);
        }

        $therapist->update($request->all());

        return redirect()->route('therapist.index')
            ->with('success', 'Therapist updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('therapist.index')
            ->with('success', 'Therapist deleted successfully.');
    }
}
