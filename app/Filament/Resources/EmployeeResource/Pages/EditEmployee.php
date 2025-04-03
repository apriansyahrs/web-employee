<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployeeInvitationMail;
use App\Models\EmployeeInvitation;
use Illuminate\Support\Str;

class EditEmployee extends EditRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('invite')
                ->label('Send Invitation')
                ->icon('heroicon-o-envelope')
                ->color('success')
                ->visible(fn () => !$this->record->isRegistered())
                ->action(function () {
                    $employee = $this->record;
                    
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
                        
                        Notification::make()
                            ->title('Invitation Sent')
                            ->body("Registration invitation has been sent to {$employee->name}")
                            ->success()
                            ->send();
                    } catch (\Exception $e) {
                        Notification::make()
                            ->title('Failed to Send Invitation')
                            ->body($e->getMessage())
                            ->danger()
                            ->send();
                    }
                }),
            Actions\DeleteAction::make(),
        ];
    }
}
