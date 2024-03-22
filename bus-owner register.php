<?php
include "connectdb.php";
$success = 0;
$unsuccess = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_no = $_POST['phone_no'];

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $mysql = "SELECT * FROM  bus_owner WHERE email='$email'";
    $myresult = mysqli_query($connect, $mysql);

    if ($myresult) {
        if (mysqli_num_rows($myresult) > 0) {
            $unsuccess = 1; // Email already exists
        } else {
            $sql = "INSERT INTO bus_owner(first_name, last_name, email, password, phone_no) VALUES('$first_name', '$last_name', '$email', '$password_hash', '$phone_no')";
            $result = mysqli_query($connect, $sql);
            if ($result) {
                $success = 1;
                header("location:login.php"); // Registration successful
            } else {
                die(mysqli_error($connect)); // Display error if insertion fails
            }
        }
    } else {
        die(mysqli_error($connect)); // Display error if query fails
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign up</title>
</head>
<style>
		.error{
    		color:blue;

    	}

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
           
            border-radius: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
            padding: 30px;
            width: 600px;
            border: 5px  #e0e0e0;
            margin: 0;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            font-weight: bold;
        }
        .checkbox-container {
            display: flex;
            align-items: center;
        }
        .checkbox-label {
            margin-left: 10px;
        }
        .create-account-btn {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: bold;
        }
        
        .error{
            color: red;
            text-align: center;
            font-size: 20px;
            padding: 20px;
        }

</style>
<body>
	<body style="background-image: url('sky.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
   
    
    <div class="container">
        <h3 style="text-align: left;">RegE</h3>
        <hr>
        <h1>REGISTER AND SIGNUP : </h1>
         <div id="error-message" style="color: red; margin-bottom: 10px;"></div> <!-- Error message display -->
        

        <form action="" method="post">
            <label for="firstName">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>
            
            
            <label for="secondName">Last Name:</label>
                <input type="text"id="last_name" name="last_name"required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

                <label for="phoneNo">Phone NO:</label>
            <input type="number" id="phone_no" name="phone_no" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="confirmpassword">Confirm Password:</label>
            <input type="confirmPassword" id="confirmPassword" name="confirmPassword" required>
            <?php
    if ($unsuccess) {
      echo "<div class='error'>Email already exists!</div>";
    }
    if ($success) {
      echo "<div class='error'>Signup successful</div>";
    }
  ?>
            <div class="checkbox-container">
                <input type="checkbox" id="updates" name="updates">
                <label class="checkbox-label" for="updates">Receive updates, ads, and offers</label>
            </div>
        

            <p>By creating an account, you agree to the <a href="#">Terms of Use</a> and have read our <a href="#">Privacy Policy</a>.</p>
            <button class="create-account-btn" type="submit">REGISTER</button>
        </form>

</body>
</html>