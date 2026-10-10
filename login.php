<?php
$pageTitle = "Login";
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
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
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

    <div class="login-container">

        <h1>Login</h1>

        <form class="login-form" id="loginForm">

            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                placeholder="Enter username"
                autocomplete="username"
                required
            >

            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="Enter email"
                autocomplete="email"
                required
            >

            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Enter password"
                autocomplete="current-password"
                required
            >

            <div class="options">
                <label>
                    <input type="checkbox" name="remember">
                    Remember me
                </label>

                <a href="#" class="link-primary">Forgot Password?</a>
            </div>

            <button
                type="submit"
                class="login-btn"
                id="loginButton">
                Login
            </button>

            <!-- Attempts / status message -->
            <p id="loginMessage" aria-live="polite">
                Attempts remaining: 5
            </p>

            <p class="register">
                Don't have an account?
                <a href="register.php">Register Here</a>
            </p>

        </form>

    </div>

    <script>
        $(document).ready(function () {

            // Valid login credentials
            const validUsername = "Angelo1";
            const validPassword = "gelo123";

            // Maximum failed attempts
            const maxAttempts = 5;
            let failedAttempts = 0;

            // Elements
            const loginButton = $("#loginButton");
            const loginMessage = $("#loginMessage");

            // jQuery Validation
            $("#loginForm").validate({

                rules: {
                    username: {
                        required: true
                    },

                    email: {
                        required: true,
                        email: true
                    },

                    password: {
                        required: true
                    }
                },

                messages: {
                    username: {
                        required: "Please enter your username."
                    },

                    email: {
                        required: "Please enter your email.",
                        email: "Please enter a valid email address."
                    },

                    password: {
                        required: "Please enter your password."
                    }
                },

                errorElement: "label",
                errorClass: "error",
                validClass: "valid",

                errorPlacement: function (error, element) {
                    error.insertAfter(element);
                },

                submitHandler: function (form) {

                    if (failedAttempts >= maxAttempts) {
                        return false;
                    }

                    const username = $("#username").val().trim();
                    const password = $("#password").val();

                    // Check credentials
                    if (
                        username === validUsername &&
                        password === validPassword
                    ) {

                        loginMessage
                            .css("color", "green")
                            .text("Login successful! Redirecting...");

                        // Redirect to the landing page
                        window.location.href = "landing.php";

                        return false;
                    }

                    // Incorrect login
                    failedAttempts++;

                    const remainingAttempts =
                        maxAttempts - failedAttempts;

                    if (failedAttempts >= maxAttempts) {

                        loginButton.prop("disabled", true);
                        loginButton.addClass("locked");

                        loginMessage
                            .css("color", "red")
                            .text(
                                "Login locked! You have entered incorrect credentials 5 times."
                            );

                    } else {

                        loginMessage
                            .css("color", "red")
                            .text(
                                "Invalid username or password. " +
                                remainingAttempts +
                                " attempt(s) remaining."
                            );
                    }

                    // Clear password after failed login
                    $("#password").val("");

                    return false;
                }
            });
        });
    </script>

</body>
</html>
