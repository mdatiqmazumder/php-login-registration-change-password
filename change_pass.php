<?php
    require('config.php');
    session_start();
    if(!(isset($_SESSION['is_true_sess']))){
        header("location: login.php?plz_lg_in");
        die();
    }
    $user_id = $_SESSION['user_id'];
    if(isset($_POST['submit'])){
        $old_pass = md5($_POST['old_pass']);
        $new_pass = md5($_POST['new_pass']);
        if($old_pass == null && $new_pass == null){
            echo "Old and New Passwords are required";
        }else if($old_pass == null){
            echo "Old Password is required";
        }else if($new_pass == null){
            echo "New Password is required";
        }else{
            $sql_old_val = " SELECT * FROM cng_pass WHERE id='$user_id' AND password='$old_pass' ";
            $que_old_val = mysqli_query($connection,$sql_old_val);
            $res_old_val = mysqli_num_rows($que_old_val);
            if($res_old_val > 0){
                $sql_to_up = " UPDATE cng_pass SET password='$new_pass' WHERE id='$user_id' ";
                $que_to_update = mysqli_query($connection,$sql_to_up);
                if($que_to_update){
                    header("location: dashboard.php?changed");
                    die();
            }
        }else{
            echo "Old Password was wrong";
        }
        }   
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Pass</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="text" name="old_pass">
        <input type="text" name="new_pass">
        <input type="submit" value="submit" name="submit" >
    </form>
    <a href="dashboard.php" >Dashboard</a> <br>
    <a href="logout.php" >Log out</a>
</body>
</html>