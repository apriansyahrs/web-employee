<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Employee extends Model
{
    use SoftDeletes, HasFactory, Notifiable;

    protected $table = 'employees';

    protected $fillable = [
        'employee_id',
        'name',
        'email',
        'phone',
        'job_level_id',
        'job_position_id',
        'division_id',
        'business_entity_id',
    ];

    public function jobLevel(): BelongsTo
    {
        return $this->belongsTo(JobLevel::class);
    }

    public function jobPosition(): BelongsTo
    {
        return $this->belongsTo(JobPosition::class);
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    public function businessEntity(): BelongsTo
    {
        return $this->belongsTo(BusinessEntity::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function invitation()
    {
        return $this->hasOne(EmployeeInvitation::class);
    }

    public function hasRegistered(): HasOne
    {
        return $this->hasOne(User::class);
    }
    
    public function isRegistered(): bool
    {
        return $this->user()->exists();
    }
}
