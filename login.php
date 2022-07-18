<?php
    include('config.php');
    session_start();
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        if($username == null && $password == null){
            echo "Username and Password is required";
        }else if($username == null){
            echo "Username is required";
        }else if($password == null){
            echo "Password is required";
        }else{
            $check_sql = " SELECT * FROM cng_pass WHERE username='$username' AND password='$password' ";
            $info_query = mysqli_query($connection,$check_sql);
            $info_validator = mysqli_num_rows($info_query);
            if($info_validator > 0){
                $fatched_info = mysqli_fetch_assoc($info_query);
                $_SESSION['name'] = $fatched_info['name'];
                $_SESSION['username'] = $fatched_info['username'];
                $_SESSION['email'] = $fatched_info['email'];
                $_SESSION['user_id'] = $fatched_info['id'];
                $_SESSION['is_true_sess'] = 'yes';
                header("location: dashboard.php");
            }else{
                echo "Username or Password is wrong";
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
    <title>Login</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="text" name="username"> <br><br>
        <input type="password" name="password"> <br><br>
        <input type="submit" value="Log In" name="submit" >
    </form>
</body>
</html>
<?php
    if(isset($_REQUEST['plz_lg_in'])){ //show if not logged in
        echo "No session or expired! Please, Log in to view.";
    }else if(isset($_REQUEST['success_lg_out'])){ //view if logged out
        echo "Successfully Logged Out";
    }
?>