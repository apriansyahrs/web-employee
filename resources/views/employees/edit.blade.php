{{-- Assuming this is the employee edit view file, add this in an appropriate location --}}

{{-- ...existing code... --}}

<div class="card">
    <div class="card-header">
        <h4>User Account Status</h4>
    </div>
    <div class="card-body">
        @if($employee->isRegistered())
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> This employee has already registered an account.
            </div>
        @else
            <div class="alert alert-warning">
                <i class="fas fa-exclamation-circle"></i> This employee has not yet registered an account.
            </div>
            
            <form action="{{ route('employees.invite', $employee->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-envelope"></i> Send Registration Invitation
                </button>
            </form>
        @endif
    </div>
</div>

{{-- ...existing code... --}}