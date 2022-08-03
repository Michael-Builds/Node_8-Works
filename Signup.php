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
        <section class="form signup">
            <header>
                <div class="image-text">
                    <span class="image">
                        <a href=""> <img src="./Images/logo.jpeg" alt=""> </a>
                    </span>

                    <div class="text logo-text">
                        <span class="name">Sign Up Form</span>
                    </div>
                </div>
            </header>
            <form action="#" enctype="multipart/form-data" autocomplete="off">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name"  required>
                    </div>
                </div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password"  required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label>Choose an Image</label>
                    <input type="file" name="image" required>
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
                    <input type="submit" value="Sign Up">
                </div>
            </form>
            <div class="link">Already have an account? <a href="./Login.php">Login here</a></div>
        </section>
    </div>
    <script src="./Javascript/Register.js"></script>
    <script src="./Javascript/signup.js"></script>
</body>
<html