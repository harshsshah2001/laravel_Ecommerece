<!DOCTYPE html>
<html>
<head>
    <title>Password Reset OTP</title>
</head>
<body>
    <p>{{ $emailMessage }}</p>  <!-- Updated variable name -->
    <p>Your OTP is: <strong>{{ $otp }}</strong></p>
    <p>This OTP will expire in 10 minutes.</p>
</body>
</html>
