<?php
require 'function.php';
if(isset($_SESSION["id"])){
  header("Location: game.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="asset/style.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>

  </head>
  <body>
  <div id="form" class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form action="">
                <input type="hidden" id="action" method="post" value="login">
                    <div class="input-field">
                        <input onkeyup="user()" type="text" placeholder="username" required name="username" id="username">
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input onkeyup="pw()" type="password" class="password" placeholder="password" required nama="password" id="password">
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                        
                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="button" value="Login" name="Login" onclick="submitData()">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="#" class="text signup-link">Signup Now</a>
                    </span>
                </div>
            </div>

            <!-- Registration Form -->
            <div class="form signup">
                <span class="title">Registration</span>

                <form action="">
                    <input type="hidden" id="action2" method="post" value="register">
                    <div class="input-field">
                        <input type="text" placeholder="fullname" required name="name2" id="name2">
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="username" required name="username" id="username2">
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="create a password" required name="password" id="password2">
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <!-- <div class="input-field">
                        <input type="password" class="password" placeholder="confirm a password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div> -->

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="termCon">
                            <label for="termCon" class="text">I accepted all terms and conditions</label>
                        </div>
                    </div>

                    <div class="input-field button">
                        <input id="Signup" type="button" value="Signup" name="Signup" onclick="submitDataReg()">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="#" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="dist/sweetalert2.min.js"></script>
    <script src="asset/script.js"></script>
  </body>
</html>
