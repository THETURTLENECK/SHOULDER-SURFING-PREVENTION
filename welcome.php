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
    <link href="CSS/welcome.css?v=2" media="screen,print" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- full login body -->
    <div id="main_body">

        <!-- welcome heading -->
        <p id="welcome" align="center">Welcome</p>

        <p id="name_line" align="center">
            <?php
                echo $_SESSION['sess_name'];
            ?>
        </p>

        <p id="subline" align="center">
            to the network open ended project
        </p>

        <form action="welcome.php" method="POST">
            <input id="lo_button" name="log_out" type="submit" value="Log Out" align="center">
        </form>

        <?php
            if(isset($_POST['log_out']))
            {
                session_destroy();
                header('location:index.php');
                ob_end_flush();
            }
        ?>
    </div>
</body>
</html>