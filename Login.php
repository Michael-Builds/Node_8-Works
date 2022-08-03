<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
}
?>
<?php
include_once "./header_Register.php";
?>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>
                <div class="image-text">
                    <span class="image">
                        <a href=""><img src="./Images/logo.jpeg" alt=""> </a>
                    </span>
                    <div class="text logo-text">
                        <span class="name">Login Form</span>
                    </div>
                </div>
            </header>
            <form action="#" autocomplete="off">
                <div class="error-txt"></div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <!-- Forget password and remember me section -->
                <div class="checkbox-text">
                    <div class="checkbox-content">
                        <input type="checkbox" id="sigCheck">
                        <label for="sigCheck" class="text">Remember me</label>
                    </div>

                    <a href="#" class="text">Forgot password?</a>
                </div>

                <div class="field button">
                    <input type="submit" value="Login">
                </div>
            </form>
            <div class="link">Don't have an account? <a href="./Signup.php">Signup here</a></div>
        </section>
    </div>
    <script src="./Javascript/Register.js"></script>
    <script src="./Javascript/login.js"></script>
</body>
<html