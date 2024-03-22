<?php 
//update operation
	//connect to db
	include 'connectdb.php';
	$owner_id = $_GET['owner_id'];
	$mysql = "SELECT * FROM bus_owner WHERE owner_id=$owner_id";
	$result = mysqli_query($connect, $mysql);
	if ($result) {
		$record = mysqli_fetch_assoc($result);
		$first_name = $record['first_name'];
		$last_name = $record['last_name'];
		$email= $record['email'];
		$phone_no= $record['phone_no'];
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Pick data user has enter
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email= $_POST['email'];
		$phone_no= $_POST['phone_no'];
		
		// query to update user data
		$sql = "UPDATE bus_owner SET first_name='$first_name', last_name='$last_name', email='$email', phone_no= $phone_no,  WHERE owner_id=$owner_id";
		// execute query
		$result = mysqli_query($connect, $sql);
		if ($result) {
			//echo "Updated Successfully";
			header("location:profile.php");
		} else {
			die(mysqli_error($connect));
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update</title>
</head>
<style>
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
            margin: auto;
            justify-content: center;
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
        
</style>
<body>
	<h1 style="border: 1px red dotted;">Update Owner Details</h1>
	
	 <form action="" method="post">
            <label for="firstName">First Name:</label>
            <input type="text" id="first_name" name="first_name" required value="<?php echo $first_name;?>">
            
            
            <label for="secondName">Last Name:</label>
                <input type="text"id="last_name" name="last_name"required value="<?php echo $last_name;?>">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="<?php echo $email;?>">

                <label for="phoneNo">Phone NO:</label>
                
            <input type="number" id="phone_no" name="phone_no" required value="<?php echo $phone_no;?>">

            <button><a href="update.php?owner_id=<?php echo $owner_id; ?>">Update</a></button>


            
            
        </form>
</body>
</html>