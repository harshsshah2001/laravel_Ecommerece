<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .form-container {
            max-width: 600px; /* Set a maximum width for the form */
            margin: auto; /* Center the form */
            background-color: white; /* White background for the form */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Shadow for depth */
            padding: 20px; /* Padding inside the form */
        }
        h2 {
            text-align: center; /* Center the title */
            color: #333; /* Darker text color */
        }
        .form-group {
            margin-bottom: 15px; /* Space between form groups */
        }
        label {
            display: block; /* Block display for labels */
            margin-bottom: 5px; /* Space below labels */
            font-weight: bold; /* Bold labels */
        }
        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%; /* Full width inputs */
            padding: 10px; /* Padding inside inputs */
            border-radius: 4px; /* Rounded corners for inputs */
            border: 1px solid #ccc; /* Border color */
            box-sizing: border-box; /* Include padding and border in element's total width and height */
        }
        input[type="file"] {
            padding: 3px; /* Less padding for file inputs */
        }
        .submit-btn {
            background-color: #007bff; /* Blue background for submit button */
            color: white; /* White text color */
            padding: 10px; /* Padding inside button */
            border: none; /* No border */
            border-radius: 4px; /* Rounded corners for button */
            cursor: pointer; /* Pointer cursor on hover */
            width: 100%; /* Full width button */
            font-size: 16px; /* Font size of button text */
        }
        .submit-btn:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Upload Image</h2>

    <form action="{{ route('popular_products_post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image_name">Image Name</label>
            <input type="text" id="image_name" name="image_name" required placeholder="Enter image name">
        </div>

        <div class="form-group">
            <label for="price">Price (in Rupees)</label>
            <input type="number" id="price" name="price" required placeholder="Enter price">
        </div>

        <div class="form-group">
            <label for="image">Select Image</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>

        <button type="submit" class="submit-btn">Upload Image</button>
    </form>
</div>

</body>
</html>
