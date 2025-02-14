<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
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
            animation: slideInDown 0.7s ease-out;
        }

        @keyframes slideInDown {
            from { transform: translateY(-100%); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        p {
            color: #555;
            text-align: center;
            margin-bottom: 20px;
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

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        .btn {
            background-color: #007bff;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn:disabled {
            background-color: #b0c4de;
            cursor: not-allowed;
        }

        .alert {
            padding: .5em;
            margin-bottom: .5em;
            border-radius: .25em;
            text-align: center;
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
            font-size: .8em;
            margin-top: .5em;
            display: block;
        }

        .login-link {
            text-align: center;
            margin-top: .5em;
            color: #555;
        }

        .login-link a {
            color: #007bff;
            text-decoration: none;
            transition: .3s ease;
        }

        .login-link a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <h1>Forgot Password</h1>
            <p>Enter your email address to receive an OTP for resetting your password.</p>

            <!-- Success & Error Messages -->
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Step 1: Send OTP Form -->
            <form action="{{ route('otp.send') }}" method="POST">
                @csrf
                <div class="input-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="your@email.com" required oninput="toggleSendOtpButton()">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn" id="sendOtpButton" disabled>Send OTP</button>
            </form>

            <hr>


            <div class="login-link">
            </div>
        </div>
    </div>

    <script>
        function toggleSendOtpButton() {
            const emailInput = document.getElementById('email');
            const sendOtpButton = document.getElementById('sendOtpButton');

            // Enable button if email is valid
            sendOtpButton.disabled = !validateEmail(emailInput.value);
        }

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Simple email regex
            return re.test(String(email).toLowerCase());
        }

        function toggleVerifyOtpButton() {
            const otpInput = document.getElementById('otp');

            // Enable button if OTP is exactly 6 digits
            verifyOtpButton.disabled = !(otpInput.value.length === 6 && /^\d+$/.test(otpInput.value));
        }
    </script>
</body>
</html>
