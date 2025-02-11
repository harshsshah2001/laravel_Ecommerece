<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Send OTP</title>
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

        input[type="email"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s ease; /* Smooth border transition */
        }

        input[type="email"]:focus {
            border-color: #007bff; /* Bootstrap primary color */
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        .send-otp-btn {
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

        .send-otp-btn:hover {
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
    </style>
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <h1>Forgot Password</h1>
            <p>Enter your email address to receive an OTP for resetting your password.</p>
            <form action="#" method="POST">  <!-- Replace # with your route -->
                <div class="input-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="your@email.com" required>
                </div>
                <button type="submit" class="send-otp-btn">Send OTP</button>
            </form>
            
        </div>
    </div>
</body>
</html>
