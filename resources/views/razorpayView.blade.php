<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel - Razorpay Payment Gateway Integration</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div id="app">
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            Laravel - Razorpay Payment Gateway Integration
                        </div>
                        <div class="card-body text-center">
                            <form action="{{ route('razorpay.payment.store') }}" method="POST" id="razorpay-form">
                                @csrf
                                <!-- Hidden input to trigger Razorpay payment -->
                                <input type="hidden" name="amount" value="10000"> <!-- Amount in paise (100 INR) -->
                                <input type="hidden" name="currency" value="INR"> <!-- Currency code -->

                                <!-- Razorpay Checkout Button -->
                                <script
                                    src="https://checkout.razorpay.com/v1/checkout.js"
                                    data-key="rzp_test_Oy9e95ZeYiEu7D"
                                    data-amount="10000"
                                    data-name="Your Company Name"
                                    data-description="Razorpay Payment"
                                    data-image="https://www.example.com/logo.png"
                                    data-prefill.name="{{ old('name') }}"
                                    data-prefill.email="{{ old('email') }}"
                                    data-theme.color="#ff7529"
                                ></script>

                                <input type="hidden" name="hidden">
                                <!-- This button is for fallback, if Razorpay script fails -->
                                <button type="submit" class="btn btn-primary mt-3">Pay Now</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
