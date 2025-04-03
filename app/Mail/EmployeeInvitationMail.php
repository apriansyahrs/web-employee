<?php

namespace App\Mail;

use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmployeeInvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $employee;
    public $registrationUrl;

    /**
     * Create a new message instance.
     *
     * @param Employee $employee
     * @param string $registrationUrl
     * @return void
     */
    public function __construct(Employee $employee, $registrationUrl)
    {
        $this->employee = $employee;
        $this->registrationUrl = $registrationUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Registration Invitation for Employee Portal')
                    ->view('emails.employee-invitation');
    }
}
