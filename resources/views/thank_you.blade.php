<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9; /* Light background color */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
        }
        .thank-you-container {
            background-color: white; /* White background for the card */
            border-radius: 12px; /* Rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Shadow for depth */
            padding: 40px;
            text-align: center; /* Centered text */
            animation: fadeIn 1s ease-in-out; /* Fade-in animation */
        }
        h1 {
            color: #28a745; /* Green color for the heading */
            margin-bottom: 20px;
        }
        p {
            color: #555; /* Darker gray for the text */
            margin-bottom: 30px;
            font-size: 18px; /* Slightly larger font size */
        }
        .icon {
            font-size: 50px; /* Size of the icon */
            color: #28a745; /* Green color for the icon */
            margin-bottom: 20px;
        }
        .back-button {
            display: inline-block; /* Inline block for button styling */
            padding: 12px 24px; /* Padding inside the button */
            font-size: 16px; /* Font size of button text */
            border-radius: 5px; /* Rounded corners for button */
            background-color: #007bff; /* Blue background color */
            color: white; /* White text color */
            text-decoration: none; /* Remove underline from link */
            transition: background-color 0.3s ease; /* Transition effect for hover */
        }
        .back-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px); /* Slide in from above */
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<div class="thank-you-container">
    <i class="fas fa-check-circle icon"></i> <!-- Font Awesome check icon -->
    <h1>Thank You!</h1>
    <p>Your submission has been received successfully.</p>
    <a href="" class="back-button">Go Back to Home</a> <!-- Link to go back to home -->
</div>

</body>
</html>
