<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\EmployeeInvitation;
use App\Notifications\EmployeeInvitation as EmployeeInvitationNotification;
use Carbon\Carbon;
use Illuminate\Support\Str;

class EmployeeInvitationService
{
    public function createInvitation(Employee $employee): EmployeeInvitation
    {
        // Delete any existing invitations
        $employee->invitation()->delete();
        
        // Create a new invitation
        $invitation = EmployeeInvitation::create([
            'employee_id' => $employee->id,
            'token' => Str::uuid(),
            'expires_at' => Carbon::now()->addHours(48),
        ]);
        
        // Send invitation email if employee has email
        if ($employee->email) {
            $employee->notify(new EmployeeInvitationNotification($invitation));
        }
        
        return $invitation;
    }
}
