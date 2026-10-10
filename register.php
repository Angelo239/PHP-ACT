```php
<?php
$pageTitle = "Register";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $pageTitle; ?></title>

    <link rel="stylesheet" href="styles.css">

    <!-- jQuery -->
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous">
    </script>

    <!-- jQuery Validate -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.22.1/jquery.validate.min.js"
        integrity="sha512-qu7dMuIm2f0KcKZ3BOoP4c+Hn+r4E8PbD2Ro4rmKsOyheCxcwhzQpf6SojA76dn+owqfANzfTFUTkGA+HpHjOA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer">
    </script>

</head>

<body>

    <div class="register-container">

        <h1>Register</h1>

        <form class="register-form" id="registerForm">

            <!-- Username -->
            <input
                type="text"
                id="username"
                name="username"
                placeholder="Username"
                autocomplete="username"
                required
            >

            <!-- Email -->
            <input
                type="email"
                id="email"
                name="email"
                placeholder="Email"
                autocomplete="email"
                required
            >

            <!-- Phone Number -->
            <input
                type="tel"
                id="phone"
                name="phone"
                placeholder="Phone Number"
                autocomplete="tel"
                required
            >

            <!-- Password -->
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Password"
                autocomplete="new-password"
                required
            >

            <!-- Confirm Password -->
            <input
                type="password"
                id="confirm-password"
                name="confirm-password"
                placeholder="Confirm Password"
                autocomplete="new-password"
                required
            >

            <!-- Register Button -->
            <button type="submit" class="register-btn">
                Register
            </button>

            <!-- Login Link -->
            <p class="login-link">
                Already have an account?
                <a href="login.php">Login Here</a>
            </p>

        </form>

    </div>

    <script>
        $(document).ready(function () {

            $("#registerForm").validate({

                rules: {

                    username: {
                        required: true,
                        minlength: 3,
                        maxlength: 10
                    },

                    email: {
                        required: true,
                        email: true
                    },

                    phone: {
                        required: true,
                        pattern: /^09[0-9]{9}$/
                    },

                    password: {
                        required: true,
                        minlength: 8
                    },

                    "confirm-password": {
                        required: true,
                        equalTo: "#password"
                    }

                },

                messages: {

                    username: {
                        required: "Please enter your username.",
                        minlength: "Username must be at least 3 characters.",
                        maxlength: "Username cannot exceed 10 characters."
                    },

                    email: {
                        required: "Please enter your email address.",
                        email: "Please enter a valid email address."
                    },

                    phone: {
                        required: "Please enter your phone number.",
                        pattern: "Enter an 11-digit mobile number starting with 09."
                    },

                    password: {
                        required: "Please enter your password.",
                        minlength: "Password must be at least 8 characters."
                    },

                    "confirm-password": {
                        required: "Please confirm your password.",
                        equalTo: "Passwords do not match."
                    }

                },

                errorElement: "label",
                errorClass: "error",
                validClass: "valid",

                errorPlacement: function (error, element) {
                    error.insertAfter(element);
                },

                submitHandler: function (form) {

                    alert("Registration successful!");

                    window.location.href = "login.php";

                    return false;
                }

            });

        });
    </script>

</body>
</html>
