
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fa; /* Light background color */
            color: #333; /* Dark text color */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
            margin: 0;
        }

        .container {
            background: white; /* White background for form area */
            padding: 30px;
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            width: 400px; /* Fixed width for the form */
        }

        h1 {
            text-align: center;
            color: #007BFF; /* Primary color for heading */
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px; /* Space between form elements */
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold; /* Bold labels for clarity */
        }

        input[type="text"] {
            width: 100%; /* Full width input field */
            padding: 10px;
            border-radius: 5px; /* Rounded corners for input */
            border: 1px solid #ccc; /* Light gray border */
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1); /* Inner shadow for depth */
        }

        input[type="text"]:focus {
            border-color: #007BFF; /* Primary color on focus */
            outline: none; /* Remove default outline */
        }

        .btn {
            width: 100%; /* Full width button */
            padding: 10px;
            background-color: #007BFF; /* Primary button color */
            color: white; /* White text on button */
            border: none;
            border-radius: 5px; /* Rounded corners for button */
            cursor: pointer; /* Pointer cursor on hover */
            font-size: 16px; /* Larger font size for button text */
        }

        .btn:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }

        .alert {
            margin-top: 15px;
            padding: 10px;
            border-radius: 5px;
        }

        .alert-danger {
            background-color: #f8d7da; /* Light red background for error messages */
            color: #721c24; /* Dark red text for error messages */
        }

        .error-messages {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Verify Your OTP</h1>
        <form action="{{ route('otp.verify.submit') }}" method="POST">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">

            <div class="form-group">
                <label for="otp">Enter OTP:</label>
                <input id="otp" type="text" class="form-control @error('otp') is-invalid @enderror" name="otp" value="{{ old('otp') }}" required autofocus>
                @error('otp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn">Verify</button>

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
        </form>

        @if ($errors->any())
            <div class="error-messages">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>
</body>

</html>
