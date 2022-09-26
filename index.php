<!-- database connection -->
<?php
    session_start();
    require 'DATABASE/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- changables -->
    <title>THE NETWORK SITE</title>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href="CSS/sign_up.css?v=2" media="screen,print" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- full login body -->
    <div id="main_body">

        <!-- sign up heading -->
        <p id="sign_up" align="center">Sign Up</p>

        <!-- sign up form -->
        <form id="sign_up_form" action="index.php" method="POST">

            <!-- name -->
            <input class="sign_up_credentials" id="sign_up_name" name="su_name" type="text" align="center" placeholder="Name" required>

            <!-- email -->
            <input class="sign_up_credentials" id="sign_up_email" name="su_email" type="text" align="center" placeholder="Email" required>

            <!-- martix password -->
            <div id="mat_pass">
                <div class="square" id="sq1"></div>
                <div class="square" id="sq2"></div>
                <div class="square" id="sq3"></div>
                <div class="square" id="sq4"></div>
                <div class="square" id="sq5"></div>
                <div class="square" id="sq6"></div>
                <div class="square" id="sq7"></div>
                <div class="square" id="sq8"></div>
                <div class="square" id="sq9"></div>
            </div>

            <!-- password -->
            <input class="sign_up_credentials" id="password" type="password" align="center" placeholder="Password" readonly required>

            <!-- hidden -->
            <input id="ACTpassword" name="su_password" type="password" align="center" readonly required>

            <!-- sign up button -->
            <input id="sign_up_submit" type="submit" name="su_button" align="center" value="Sign Up">
        </form>

        <!-- PHP -->
        <?php
        if (isset($_POST['su_button'])) {
            $name = $_POST['su_name'];
            $email = $_POST['su_email'];
            $password = $_POST['su_password'];

            $query = "select * from login_database WHERE email = '$email'";

            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) 
            {
                echo '<script type="text/javascript"> alert("User already exixts!! Try another email or login.")</script>';
            } 
            else 
            {
                $query = "insert into login_database values('$name','$email','$password')";
                $query_run = mysqli_query($con, $query);

                if ($query_run) 
                {
                    echo '<script type="text/javascript"> alert("You are signed up. Go to Sign In page.")</script>';
                } 
                else 
                {
                    echo '<script type="text/javascript"> alert("Error in Sign Up!! Please retry.")</script>';
                }
            }
        }
        ?>

        <p id="or_line">or</p>
        <div id="sign_in_option">
            <a href="sign_in.php" id="sign_in_button" align="center">Sign In</a>
        </div>
    </div>
    <script type="text/javascript" src="JS/javascript.js?v=3"></script>
</body>

</html>