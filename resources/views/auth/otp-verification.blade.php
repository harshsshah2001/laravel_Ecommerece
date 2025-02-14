<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
            animation: slideInDown 0.7s ease-out;
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

        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #14c732;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        .verify-btn {
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

        .verify-btn:hover {
            background-color: #0056b3;
        }

        .verify-btn:disabled {
            background-color: #ADD8E6; /* Light Blue */
            cursor: not-allowed;
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
            <h1>OTP Verification</h1>

            <p>Enter the OTP sent to your email address.</p>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <form action="{{ route('otp.verifys') }}" method="POST" id="otpForm">
                @csrf
                <div class="input-group">
                    <label for="otp">OTP</label>
                    <input type="text" id="otp" name="otp" placeholder="Enter OTP" required>
                    @error('otp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="verify-btn" id="verifyBtn" disabled>Verify OTP</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            const otpInput = $('#otp');
            const verifyBtn = $('#verifyBtn');
            const otpForm = $('#otpForm');

            // Initialize Toastr options
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right"
            };

            function validateOTP() {
                const otpValue = otpInput.val().trim();
                const isValidOTP = /^\d{6}$/.test(otpValue);
                verifyBtn.prop('disabled', !isValidOTP);
            }

            otpInput.on('input', validateOTP);
            validateOTP();

            otpForm.on('submit', function(e) {
                const otpValue = otpInput.val().trim();
                if (!/^\d{6}$/.test(otpValue)) {
                    e.preventDefault();
                    toastr.error("Please enter a valid 6-digit OTP.");
                }
            });
        });
    </script>
</body>

</html>
