<?php
include "connectdb.php";
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT * FROM bus_owner  WHERE email='$email'";
    $result=mysqli_query($connect,$sql);
    if ($result) {
    if (mysqli_num_rows($result)>0) {
        $bus_owner=mysqli_fetch_assoc($result);
        $password_hash=$bus_owner['password'];
        if(password_verify($password,$password_hash)){
            session_start();
            $_SESSION['email']=$email;
            $_SESSION['id']=$bus_owner['id'];
            header("location:userprofile.php");
        }else{
            //echo"invalid credentials";
            $unsuccess = 1;
            
        }
    }
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        h3{
            text-align: left;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            text-align: center;
                    }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            border: 5px  #e0e0e0;
            border-radius: 5px;

        }
        h1 {
            font-weight: bold;
            font-size: 24px;
            color: #000000;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 7px;
            margin: 17px 0;
            border: 2px solid #d0d0d0;
            border-radius: 2px;
        }
        button {
            background-color: #ff69b4;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
        a {
            color: #808080;
            text-decoration: none;
        }
        .error{
      color: red;
      text-align: center;
    }
    </style>
</head>
<body
    style="background-image: url('sky.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <h3 style="font-weight: 30px;">RegE</h3>
        <hr>
    <div class="container">
        
        <h1>SIGN IN</h1>
        <form method="post">
        <input   type="text"name="email" placeholder="EMAIL ADDRESS">
        <input type="password"name="password" placeholder="PASSWORD">
        <?php
    if ($unsuccess) {
      echo "<div class='error'>Invalid credentials</div>";
    }
    
  ?>
    
        <button>SIGN IN</button>
        <a href="#">Forgot password?</a>
        <p>New to RegE? <a href="register.php" style="color: blue;">Register here</a></p>
        <p ><a href="Home.php"style="color: blue;">Continue Browsing</a></p>
    </div>
    </form>
</body>
</html>