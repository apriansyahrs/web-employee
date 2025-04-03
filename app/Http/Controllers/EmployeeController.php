<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeInvitation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployeeInvitationMail;

class EmployeeController extends Controller
{
    /**
     * Send invitation to employee to register in the system
     */
    public function invite(Employee $employee)
    {
        // Check if employee is already registered
        if ($employee->isRegistered()) {
            return redirect()->back()->with('error', 'Employee has already registered.');
        }

        // Generate invite token
        $token = Str::random(60);
        
        // Create or update invitation
        $invitation = EmployeeInvitation::updateOrCreate(
            ['employee_id' => $employee->id],
            ['token' => $token, 'expires_at' => now()->addDays(7)]
        );

        // Send invitation email
        $registrationUrl = route('employee.register.form', $token);
        
        try {
            Mail::to($employee->email)->send(new EmployeeInvitationMail($employee, $registrationUrl));
            return redirect()->back()->with('success', 'Invitation has been sent to ' . $employee->name);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send invitation email: ' . $e->getMessage());
        }
    }
}