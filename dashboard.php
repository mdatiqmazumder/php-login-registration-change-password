<?php
    session_start();
    if(!(isset($_SESSION['is_true_sess']))){
        header("location: login.php?plz_lg_in");
        die();
    }
    $name = $_SESSION['name'];
    $usernane = $_SESSION['username'];
    $usernane = $_SESSION['username'];
    $email = $_SESSION['email'];
    $user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome <?php echo $name ?></h1>
    <h4>Your username is : <?php echo $usernane ?></h4>
    <h4>Your user ID is : <?php echo $user_id ?></h4>
    <h4>Your email is : <?php echo $email ?></h4>
    <a href="change_pass.php" >Change Password</a> <br>
    <a href="logout.php" >Log out</a>
</body>
</html>
<?php
    if(isset($_REQUEST['changed'])){ //show success update
        echo "</br> Password Changed.";
    }
?>