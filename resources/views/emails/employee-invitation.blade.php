<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Employee Registration Invitation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hello, {{ $employee->name }}!</h2>
        
        <p>You've been invited to register an account in our employee portal.</p>
        
        <p>As an employee of our company, you can access various services and information through the portal.</p>
        
        <p>Please click the button below to complete your registration:</p>
        
        <a href="{{ $registrationUrl }}" class="btn">Register Now</a>
        
        <p>If the button doesn't work, you can copy and paste the following link into your browser:</p>
        
        <p>{{ $registrationUrl }}</p>
        
        <p>This invitation link will expire in 7 days.</p>
        
        <p>Thank you,<br>HR Department</p>
    </div>
</body>
</html>
