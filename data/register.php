<?php
require_once('../koneksi.php');


session_start();


if (isset($_SESSION["user"])) {
    header('location: index.php');
    exit(); 
}

if (isset($_POST['register'])) {
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    if ($password === $confirm_password) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO orang VALUES ('$nama_depan', '$nama_belakang','$email', '$password', NULL)";
        $query = mysqli_query($conn, $sql);
    } else {

        $error_message = "Password Mismatch: Please ensure that both passwords match.";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Grand Emporium Hotel</title>
    <link rel="shortcut icon" href="hotel/favicon_io/favicon.co" type="image/x-icon">
    <style>

        body {
            font-family: Arial, sans-serif;
            background-image: url('https://images.hdqwalls.com/wallpapers/dubai-popular-hotel-4k.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-width: 100%;
            background-height: 100%;  
            margin: 0;
            padding: 0;
            
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            max-width: 400px;
            transform:translateY(5%) !important;
        }

        .register-form {
            text-align: center;
            padding-right:20px;
        }

        h1 {
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        .input-container {
            position: relative;
        }

        input[type='text'],
        input[type='email'],
        input[type='password'] {
            width: 100%;
            padding: 10px 30px 10px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: -30px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .password-toggle img {
            width: 20px;
            height: 20px;
        }

        button[type='submit'] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        button[type='submit']:hover {
            background-color: #555;
        }

        a {
            color: #333;
            text-decoration: none;
        }

        .error-message {
        text-align: center;
        color: red;
        }
    </style>
</head>
<body>
<div class="container">
    <form class="register-form" id="registrationForm" method="post" action="" autocomplete="off">
        <h1>Register<br>Grand Emporium Hotel</h1>
        <div class="form-group">
            <label for="nama_depan">First Name</label>
            <input type="text" id="nama_depan" name="nama_depan" required>
        </div>
        <div class="form-group">
            <label for="nama_belakang">Last Name</label>
            <input type="text" id="nama_belakang" name="nama_belakang" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <div class="input-container">
                <input type="password" id="password" name="password" required>
                <span class="password-toggle" data-target="password">
                    <img src="../img/eye-close.svg" alt="Show Password">
                </span>
            </div>
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <div class="input-container">
                <input type="password" id="confirm-password" name="confirm-password" required>
                <span class="password-toggle" data-target="confirm-password">
                    <img src="../img/eye-close.svg" alt="Show Password">
                </span>
            </div>
        </div>
        <div class="form-group">
            <p>Already have an account? <a href="login.php">Login</a></p>
            <div class="form-group">
            <?php if (!empty($error_message)): ?>
                <!-- Display the error message with the "error-message" class for red styling -->
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <button type="submit" name="register">Register</button>
        </div>
    </form>
</div>



<script>
    function togglePasswordVisibility(targetInput) {
        const passwordInput = document.getElementById(targetInput);
        const eyeIcon = document.querySelector(`[data-target="${targetInput}"] img`);

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.src = '../img/eye.svg';
        } else {
            passwordInput.type = 'password';
            eyeIcon.src = '../img/eye-close.svg';
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const passwordToggleButtons = document.querySelectorAll('.password-toggle');
        
        passwordToggleButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                const targetInput = button.getAttribute('data-target');
                togglePasswordVisibility(targetInput);
            });
        });
    });
</script>
</body>
</html>
