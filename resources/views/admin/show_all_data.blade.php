<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautiful Table Design</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
            text-transform: uppercase;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .table-footer {
            font-weight: bold;
            background-color: #e9ecef;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .action-buttons button {
            padding: 5px 10px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .edit-button {
            background-color: #28a745;
            color: white;
        }

        .delete-button {
            background-color: #dc3545;
            color: white;
        }

        /* .pagination {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        } */

        .pagination .page-link {
            color: #007bff;
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }

        .pagination .page-item.disabled .page-link {
            color: #ccc;
        }

        .small {
            display: none;
        }
    </style>
</head>

<body>

    <h2>All Data</h2>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
    </script>
    <a href="{{ route('Excel') }}"><button type="submit" class="btn btn-warning">Download Excel</button> </a>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>Image</th>
                    <th>Action</th>
                    <th>Download_PDF</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;  // Initialize a counter *before* the loop
                @endphp
                @foreach ($all_data as $customers)
                    <tr>
                        <td>{{ $i++ }}</td>  <!-- Use the counter and increment it -->
                        <td>{{ $customers->name }}</td>
                        <td>{{ $customers->email }}</td>
                        <td>{{ $customers->phone }}</td>
                        <td>{{ $customers->city }}</td>

                        @if ($customers->image)
                            <td><img src="{{ asset('storage/' . $customers->image) }}" alt="Image"
                                    style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;"></td>
                        @else
                            <td><span>No Image</span></td>
                        @endif

                        <td class="action-buttons">
                            <a href="{{ route('update_form', $customers->id) }}">
                                <button class="edit-button">Edit</button>
                            </a>

                            <form action="{{ route('delete_data', $customers->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button"
                                    onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                            </form>
                        </td>

                        {{-- for PDF Download  --}}
                        <td><a href="{{ route('pdf', $customers->id) }}"><button type="submit"
                                    class="btn btn-warning">Download</button></a></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>  <!-- Move the tfoot *inside* the table -->
                <tr class="table-footer" style="color: #007bff;margin-top:40px;">
                    <td colspan="6" class="footer-text">Total Users:</td>
                    <td class="footer-count">{{ $all_data->total() }}</td> <!-- use ->total() method -->
                </tr>
            </tfoot>
        </table>

        <div class="pagination">
            {{ $all_data->links('pagination::bootstrap-5') }}
        </div>
    </div>



</body>

</html>
