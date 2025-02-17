<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Form Popup</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* Custom styling (optional) */
        .modal-header {
            background-color: #007bff;
            color: white;
        }
        .modal-footer {
            justify-content: space-between;
        }
    </style>
</head>
<body>

    <div class="container text-center mt-5">
        <!-- Address Button -->
        <button type="button" class="btn btn-primary" onclick="openModal()">
            Add Address
        </button>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Enter Your Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Address Form -->
                    <form id="addressForm" action="{{route('address_form_submit')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" rows="3" name="address" required></textarea>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" onclick="saveAddress()">Save Address</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap & jQuery Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function openModal() {
            $("#addressModal").modal("show"); // Open the modal
        }

        function saveAddress() {
            let name = document.getElementById("name").value;
            let phone = document.getElementById("phone").value;
            let address = document.getElementById("address").value;

            if (name && phone && address) {
                alert("Address saved successfully!");
                $("#addressModal").modal("hide"); // Close the modal after saving
                document.getElementById("addressForm").reset(); // Clear form fields
            } else {
                alert("Please fill out all fields.");
            }
        }
    </script>

</body>
</html>
