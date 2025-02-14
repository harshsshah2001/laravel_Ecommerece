<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Olog - Account</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <style>
        .image-preview {
            margin-top: 10px;
            /* Space above the image preview */
            max-width: 100%;
            /* Responsive image */
            height: auto;
            /* Maintain aspect ratio */
        }
    </style>
</head>

<body>

    <main>
        <!-- Account-Login -->
        <section class="account-sign">
            <div class="container">
                <div class="row">

                    <div class="" style="margin-left: 374px;">
                        <div class="account-sign-up">
                            <h5 class="text-center">Sign up</h5>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
                            <script>
                                @if (Session::has('success'))
                                    toastr.success("{{ Session::get('success') }}");
                                @endif

                                @if (Session::has('error'))
                                    toastr.error("{{ Session::get('error') }}");
                                @endif
                            </script>

                            <form action="{{ route('registerform_data') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form__div">
                                    <input type="text" class="form__input" name="name" id="nameInput">
                                    <label for="nameInput" class="form__label">Name</label>
                                </div>
                                <span>@error('name'){{ "$message" }}@enderror</span>

                                <div class="form__div">
                                    <input type="email" class="form__input" name="email" id="emailInput">
                                    <label for="emailInput" class="form__label">Email</label>
                                </div>
                                <div class="form__div">
                                    <input type="password" class="form__input" name="password" id="password">
                                    <label for="password" class="form__label">Password</label>
                                </div>
                                <div class="show-password">
                                    <input type="checkbox" id="togglePassword">
                                    <label for="togglePassword">Show Password</label>
                                </div>

                                <script>
                                    document.getElementById('togglePassword').addEventListener('change', function() {
                                        let passwordField = document.getElementById('password');
                                        passwordField.type = this.checked ? 'text' : 'password';
                                    });
                                </script>

                                <style>
                                    .show-password {
                                        margin-top: 5px;
                                        font-size: 14px;
                                    }
                                </style>
                                <div class="form__div">
                                    <input type="text" class="form__input" name="city" id="city">
                                    <label for="city" class="form__label">City</label>
                                </div>
                                <div class="form__div">
                                    <input type="file" id="imageUpload" accept="image/*" name="image"
                                        style="padding-top: 10px;" id="image">
                                    <label for="imageUpload" class="form__label">Choose Image</label>
                                    <img id="imagePreview" src="" alt="" class="image-preview" style="display:none;">
                                </div>

                                <div class="form__div">
                                    <input type="number" class="form__input" name="phone" id="phone">
                                    <label for="phone" class="form__label">Phone Number</label>
                                </div>
                                <a href="{{route('loginform')}}" class="forgot-password" style="float: left;margin-bottom:10px">Login Here ?</a>

                                <button type="submit" class="btn bg-primary" id="submitOtp">Sign Up</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row align-items-center newsletter-area">
                <div class="col-lg-5">
                    <div class="newsletter-area-text">
                        <h4 class="text-white">Subscribe to get notification.</h4>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="newsletter-area-button">
                        <form action="#">
                            <div class="form">
                                <input type="email" name="email" id="mail"
                                    placeholder="Enter your email address" class="form-control">
                                <button class="btn bg-secondary border text-capitalize">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row main-footer">
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="main-footer-info">
                        <img src="dist/images/logo/white.png" alt="Logo" class="img-fluid">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam molestie malesuada
                            metus, non molestie ligula laoreet vitae. Ut et fringilla risus, vel.
                        </p>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="main-footer-quicklinks">
                        <h6>Company</h6>
                        <ul class="quicklink">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Help &amp; Support</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="main-footer-quicklinks">
                        <h6>Quick links</h6>
                        <ul class="quicklink">
                            <li><a href="#">New Realease</a></li>
                            <li><a href="#">Customize</a></li>
                            <li><a href="#">Sale &amp; Discount</a></li>
                            <li><a href="#">Men</a></li>
                            <li><a href="#">Women</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="main-footer-quicklinks">
                        <h6>Account</h6>
                        <ul class="quicklink">
                            <li><a href="#">Your Bag</a></li>
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Order Completed</a></li>
                            <li><a href="#">Log-out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright d-flex justify-content-between align-items-center">
                        <div class="copyright-text order-2 order-lg-1">
                            <p>&copy; 2020. Design and Developed by <a href="#">Zakir Soft</a></p>
                        </div>
                        <div class="copyright-links order-1 order-lg-2">
                            <a href="#" class="ml-0"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer -->

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('scss/vendors/plugin/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        function openNav() {

            document.getElementById("mySidenav").style.width = "350px";
            $('#overlayy').addClass("active");
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            $('#overlayy').removeClass("active");
        }

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        function checkInputs() {
            var name = $('#nameInput').val().trim();
            var phone = $('#phone').val().trim();
            var emailInput = $('#emailInput').val().trim();
            var password = $('#password').val().trim();
            var city = $('#city').val().trim();
            var image = $('#imageUpload').val();

            if (name && phone && emailInput && image && password && city) {
                $('#submitOtp').removeClass('bg-gray-400 cursor-not-allowed').addClass('bg-blue-500 hover:bg-blue-600').prop('disabled', false);
            } else {
                $('#submitOtp').removeClass('bg-blue-500 hover:bg-blue-600').addClass('bg-gray-400 cursor-not-allowed').prop('disabled', true);
            }
        }

        $('#nameInput, #emailInput, #phone, #password, #city, #imageUpload').on('input change', checkInputs);

        // Initialize the button state on page load
        checkInputs();
    });


</script>



    </script>
</body>
