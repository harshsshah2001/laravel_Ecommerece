<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            animation: fadeIn 1.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .login-container {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            transform: scale(0.9);
            animation: scaleIn 0.5s ease-in-out forwards;
        }
        @keyframes scaleIn {
            from { transform: scale(0.9); }
            to { transform: scale(1); }
        }
        .form-control {
            border-radius: 20px;
        }
        .btn-primary {
            border-radius: 20px;
            transition: background 0.3s;
        }
        .btn-primary:hover {
            background: #2575fc;
        }
        .btn-primary:disabled {
            background: #8cbbf8;
            cursor: not-allowed;
        }
        .forgot-password {
            display: block;
            text-align: right;
            margin-top: 10px;
            text-decoration: none;
            color: #2575fc;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h3 class="text-center">Login</h3>
        <form action="{{ route('loginform_data') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" oninput="validateInputs()">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" oninput="validateInputs()">
            </div>
            <a href="{{route('registerform')}}" class="forgot-password" style="float: left;">Already Register?</a>
                        <a href="{{route('forgot.password.form')}}" style="float: right;" class="forgot-password">Forgot Password?</a>
            <button type="submit" class="btn btn-primary w-100 mt-3" id="loginButton" disabled>Login</button>
        </form>
    </div>

    <script>
        function validateInputs() {
            let email = document.getElementById('email').value.trim();
            let password = document.getElementById('password').value.trim();
            let loginButton = document.getElementById('loginButton');

            // Enable button only when both fields are filled
            loginButton.disabled = !(email.length > 0 && password.length > 0);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
