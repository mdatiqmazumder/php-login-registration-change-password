<?php
    require('config.php');{
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            if($name == null){
                echo "Name is required";
            }else if($email == null){
                echo "Email is required";
            }else if($username == null){
                echo "Username is required";
            }else if($password == null){
                echo "Password is required";
            }else{
                $sql_to_insert = " INSERT INTO cng_pass (name,email,username,password) VALUES ('$name','$email','$username','$password') ";
                $query_to_insert = mysqli_query($connection,$sql_to_insert);
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
    <title>Sign up</title>
</head>
<body>
    <form method="post">
        <input type="text" name="name" placeholder="Enter Your Name"> <br><br>
        <input type="text" name="email" placeholder="Enter Your Email"> <br><br>
        <input type="text" name="username" placeholder="Enter Your Username"> <br><br>
        <input type="password" name="password" placeholder="Enter Your password"> <br> <br>
        <input type="submit" name="submit" value="Sign Up">
    </form>
</body>
</html>