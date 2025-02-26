<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
<style>
    body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: #f4f4f4; /* Light background */
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    animation: fadeIn 0.5s ease-in-out; /* Initial fade-in animation */
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.container {
    width: 100%;
    max-width: 400px;
    padding: 20px;
    box-sizing: border-box;
}

.form-wrapper {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
    animation: slideInDown 0.7s ease-out; /* Title animation */
}

@keyframes slideInDown {
    from {
        transform: translateY(-100%);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

p {
    color: #555;
    text-align: center;
    margin-bottom: 30px;
}

.input-group {
    margin-bottom: 20px;
    position: relative;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
    font-weight: bold;
}

input[type="email"], input[type="password"], input[type="text"] {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
    transition: border-color 0.3s ease; /* Smooth border transition */
}

input[type="email"]:focus, input[type="password"]:focus, input[type="text"]:focus {
    border-color: #007bff; /* Bootstrap primary color */
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
}

.send-otp-btn, .verify-btn, .reset-btn {
    background-color: #007bff; /* Bootstrap primary color */
    color: white;
    padding: 14px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    width: 100%;
    transition: background-color 0.3s ease; /* Button hover transition */
}

.send-otp-btn:hover, .verify-btn:hover, .reset-btn:hover {
    background-color: #0056b3;
}

.login-link {
    text-align: center;
    margin-top: 20px;
    color: #555;
}

.login-link a {
    color: #007bff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.login-link a:hover {
    color: #0056b3;
}
.alert {
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
}

.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
}

.alert-danger {
    background-color: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
}
.text-danger {
    color: #dc3545;
    font-size: 0.8em;
    margin-top: 5px;
    display: block;
}

</style>
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <h1>Reset Password</h1>
            <p>Enter your new password.</p>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <form action="{{ route('password.reset') }}" method="POST">
                @csrf
                <div class="input-group">
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                 <div class="input-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button type="submit" class="reset-btn">Reset Password</button>
            </form>
        </div>
    </div>
</body>
</html>
