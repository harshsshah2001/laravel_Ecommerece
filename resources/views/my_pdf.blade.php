<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Viewer</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #eef2f3; /* Light background color */
            color: #333; /* Dark text color */
            position: relative; /* Positioning context for watermark */
        }

        h1 {
            font-size: 28px;
            color: #007BFF; /* Primary color for headings */
            text-align: center;
            margin-bottom: 20px;
            text-transform: uppercase; /* Uppercase for emphasis */
        }

        hr {
            border: none;
            height: 2px;
            background-color: #4ea3ff; /* Primary color for horizontal rule */
            margin: 20px 0;
        }

        p {
            line-height: 1.6;
            margin: 10px 0;
            font-size: 16px; /* Increased font size for readability */
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white; /* White background for content area */
            padding: 30px;
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            position: relative; /* Positioning context for watermark */
            z-index: 1; /* Ensure container is above watermark */
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            border: 1px solid #4ea3ff; /* Border color */
            padding: 12px; /* Increased padding for better spacing */
            text-align: left;
        }

        .table th {
            background-color: #4ea3ff; /* Header background color */
            color: white; /* Header text color */
            font-weight: bold;
        }

        .table tr:nth-child(even) {
            background-color: #f2f9ff; /* Light blue for even rows */
        }

        .table tr:hover {
            background-color: #e7f3ff; /* Light hover effect */
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #666; /* Lighter text for footer */
        }

        .email {
            font-weight: bold;
            color: #007BFF; /* Primary color for email link */
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-390deg); /* Rotate watermark by 170 degrees */
            font-size: 70px; /* Size of the watermark text */
            color: rgba(110, 180, 255, 0.356); /* Light blue with transparency */
            white-space: nowrap;
            z-index: 0; /* Ensure watermark is behind other content */
        }

        @media print {
          body {
              -webkit-print-color-adjust: exact; /* Ensure colors are printed correctly */
          }
          .container {
              box-shadow: none; /* Remove shadow when printing */
          }
      }
    </style>
</head>
<body>
    <div class="watermark">Endel Digital Solutions</div> <!-- Watermark -->

    <div class="container">
        <h1>{{$title}}</h1>
        <hr>
        <p>Date: {{$date}}</p>

        <p>Check your details below carefully. If you want any changes, you can email us.</p>

        <!-- User Information Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->city }}</td>
                    <td>{{ $user->phone }}</td>
                </tr>
            </tbody>
        </table>

        <p>Email is: <span class="email">Endel.Digital@gmail.com</span></p>

        <div class="footer">
            &copy; {{ date('Y') }} Endel Digital Solutions. All rights reserved.
        </div>
    </div>
</body>
</html>
