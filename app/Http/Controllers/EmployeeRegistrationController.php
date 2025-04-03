<?php

namespace App\Http\Controllers;

use App\Models\EmployeeInvitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class EmployeeRegistrationController extends Controller
{
    public function showRegistrationForm($token)
    {
        $invitation = EmployeeInvitation::where('token', $token)->first();

        if (!$invitation || $invitation->expires_at < Carbon::now()) {
            return redirect('/login')->with('error', 'Invalid or expired invitation link.');
        }

        $employee = $invitation->employee;

        return view('auth.employee-register', [
            'invitation' => $invitation,
            'employee' => $employee,
        ]);
    }

    public function register(Request $request, $token)
    {
        $invitation = EmployeeInvitation::where('token', $token)->first();

        if (!$invitation || $invitation->expires_at < Carbon::now()) {
            throw ValidationException::withMessages([
                'token' => ['Invalid or expired invitation link.'],
            ]);
        }

        $employee = $invitation->employee;

        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $employee->name,
            'email' => $employee->email,
            'employee_id' => $employee->id,
            'password' => Hash::make($request->password),
        ]);

        // Delete the invitation as it's been used
        $invitation->delete();

        // Log the user in
        Auth::login($user);

        return redirect('/admin');
    }
}
