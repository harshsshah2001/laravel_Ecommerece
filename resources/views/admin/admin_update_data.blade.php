<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            max-width: 500px; /* Set a maximum width for the form */
            margin: auto; /* Center the form */
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333; /* Darker text color */
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-group input[type="file"],
        .form-group select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        .form-group input[type="text"]:focus,
        .form-group input[type="email"]:focus,
        .form-group input[type="password"]:focus,
        .form-group input[type="file"]:focus,
        .form-group select:focus {
            border-color: #007bff; /* Change border color on focus */
            outline: none; /* Remove default outline */
        }
        .submit-button {
            background-color: #007bff; /* Primary color */
            color: white; /* White text */
            border: none; /* No border */
            padding: 10px 15px; /* Padding */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor on hover */
            font-size: 16px; /* Font size */
            transition: background-color 0.3s ease; /* Smooth transition for hover effect */
            width: 100%; /* Full width button */
        }
        .submit-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Update Profile</h2>

        <form action="{{ route('update_profile', $update_data->id) }}" method="POST" enctype="multipart/form-data"> <!-- Replace with your route -->
            @csrf
            @method('PUT') 

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $update_data->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email', $update_data->email) }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password (leave blank if you don't want to change)</label>
                <input type="password" id="password" name="password" placeholder="Enter new password">
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" value="{{ old('city', $update_data->city) }}" required>
            </div>

            <div class="form-group">
                <label for="image">Profile Image</label>
                <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png,.gif">
                <small>Leave blank if you don't want to change the image.</small>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $update_data->phone) }}" required>
            </div>

            <button type="submit" class="submit-button">Update</button>
        </form>
    </div>

</body>
</html>
