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

    <div class="table-container">
        {{-- <form action="{{ route('delete_multiple_data') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger" style="margin-top: 10px;margin-bottom:10px" onclick="return confirm('Are you sure you want to delete these items?');">Delete Selected</button> --}}

        <table>
            <thead>
                <tr>
                    {{-- <th>Delete Multiple</th> --}}
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
                @foreach ($all_data as $key => $customers)
                    <tr>
                        {{-- <td><input type="checkbox" name="ids[]" value="{{ $customers->id }}"></td> --}}
                        <td>{{ $key + 1 }}</td>
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
                        <td><a href="{{route('pdf')}}"><button type="submit">Download</button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- </form> --}}


        <div class="pagination">
            {{ $all_data->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <tfoot>
        <tr class="table-footer" style="color: #007bff;margin-top:40px;">
            <td colspan="6" class="footer-text">Total Users:</td>
            <td class="footer-count">{{ $key + 1 }}</td>
        </tr>
    </tfoot>

</body>

</html>
