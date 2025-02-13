<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fa;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h1 {
            text-align: center;
            color: #007BFF;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        input[type="text"]:focus {
            border-color: #007BFF;
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .alert {
            margin-top: 15px;
            padding: 10px;
            border-radius: 5px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
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
                <input id="otp" type="text" class="form-control @error('otp') is-invalid @enderror"
                    name="otp" value="{{ old('otp') }}" required autofocus>
                @error('otp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" id="submitOtp" class="btn" disabled>Verify</button>



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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            function checkInputs() {
                var otpValue = $('#otp').val().trim();
                var isNumeric = /^\d{6}$/.test(otpValue);
                console.log("OTP Value:", otpValue);
                console.log("Is Numeric:", isNumeric);

                if (isNumeric) {
                    $('#submitOtp').prop('disabled', true);
                } else {
                    $('#submitOtp').prop('disabled', false);
                }
            }

            $('#otp').on('input change', checkInputs);

            checkInputs();
        });
    </script>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</body>

</html>
