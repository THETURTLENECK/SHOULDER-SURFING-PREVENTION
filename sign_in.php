<!-- database connection -->
<?php
    ob_start();
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
    <link href="CSS/sign_in.css?v=2" media="screen,print" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- full login body -->
    <div id="main_body">

        <!-- sign up heading -->
        <p id="sign_in" align="center">Sign In</p>

        <!-- sign up form -->
        <form id="sign_in_form" action="sign_in.php" method="POST">

            <!-- email -->
            <input class="sign_in_credentials" id="sign_in_email" name="si_email" type="text" align="center" placeholder="Email" required>
    
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
            <input class="sign_in_credentials" id="password" type="password" align="center" placeholder="Password" readonly required>

            <!-- hidden -->
            <input id="ACTpassword" name="si_password" type="password" align="center" readonly required>

            <!-- sign up button -->
            <input id="sign_in_submit" type="submit" name="si_button" align="center" value="Sign In">
        </form>

        <!-- PHP -->
        <?php
        if(isset($_POST['si_button']))
        {
            $username = $_POST['si_email'];
            $password = $_POST['si_password'];

            $query = "select * from login_database WHERE email = '$username' AND password = '$password'";
            $query_run = mysqli_query($con,$query);
            $name = mysqli_fetch_assoc($query_run);

            if(mysqli_num_rows($query_run)>0)
            {
                $_SESSION['sess_name'] = $name['name'];
                header('location:welcome.php');
                ob_end_flush();
            }
            else
            {
                echo '<script type="text/javascript"> alert("Invalid credentials!!") </script>';
            }
        }
        ?>

        <p id="or_line">or</p>
        <div id="sign_up_option">
            <a href="index.php" id="sign_up_button" align="center">Sign Up</a>
        </div>
    </div>
    <script type="text/javascript" src="JS/javascript.js?v=3"></script>
</body>
</html>