<?php 
//update operation
	//connect to db
	include 'connectdb.php';
	$companyID = $_GET['companyID'];
	$mysql = "SELECT * FROM Company_Information WHERE companyID=$companyID";
	$result = mysqli_query($connect, $mysql);
	if ($result) {
		$record = mysqli_fetch_assoc($result);
		$companyName = $record['companyName'];
		$owner = $record['owner'];
		$streetAddress = $record['streetAddress'];
		$city = $record['city'];
		$postalCode=$record['postalCode'];
		$website=$record['website'];
		$companyDescription=$record['companyDescription'];
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Pick data user has enter
		$companyName = $_POST['companyName'];
		$owner = $_POST['owner'];
		$streetAddress = $_POST['streetAddress'];
		$city = $_POST['city'];
		$postalCode=$_POST['postalCode'];
		$website=$_POST['website'];
		$companyDescription=$_POST['companyDescription'];
		// query to update user data
		$sql = "UPDATE Company_Information SET companyName='$companyName', owner='$owner', streetAddress='$streetAddress', city= $city , postalCode='$postalCode',website='$website',companyDescription='$companyDescription' WHERE companyID=$companyID";
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
    background-image: url('background.jpg');
    background-size: cover;
    margin: 0;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: left;
}

.container {
    background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.1); /* Box shadow for depth */
}

h1 {
    color: #333333;
    text-align: center;
    margin-bottom: 20px;
}

p {
    color: #666666;
}

form {
    width: 100%;
}

fieldset {
    border: none;
    padding: 5px;
}

legend {
    font-weight: bold;
    margin-bottom: 10px;
}

label {
    color: #333333;
    display: block;
    margin-bottom: 0.5em;
}

input[type="text"],
input[type="url"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
    border: 1px solid #ccc;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="url"]:focus,
textarea:focus {
    border-color: #007bff; /* Focus border color */
}

.required::after {
    content: "*";
    color: red;
}

.address {
    display: flex;
}

.address div {
    flex-grow: 1;
    margin-right: 10px;
}

.captcha {
    margin-top: 10px;
}

.registerbtn {
    background-color: #007bff; /* Button color */
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.registerbtn:hover {
    background-color: #0056b3; /* Button color on hover */
}
</style>
<body>
	<h1 style="border: 1px red dotted;">Update Company Details</h1>
	<div class="container">
	<form method="post">


            <fieldset>
                <legend>Company Information</legend>

                <label for="companyName">Company Name*</label>
                <input type="text" id="companyName" name="companyName"value="<?php echo $companyName;?>" required>

                <label for="owner">Owner*</label>
                <input type="text" id="owner" name="owner"value="<?php echo $owner;?>" required>

                <div class="address">
                    <div>
                        <label for="streetAddress">Street Address*</label>
                        <input type="text" id="streetAddress" name="streetAddress"value="<?php echo $streetAddress;?>" required>
                    </div>

                    <div>
                        <label for="city">City</label>
                        <input type="text" id="city" name="city"value="<?php echo $city;?>">
                    </div>

                    <div>
                        <label for="postalCode">Postal Code</label>
                        <input type="text" id="postalCode" name="postalCode"value="<?php echo $postalCode;?>">
                    </div>
                </div>

                <label for="website">Website</label>
                <input type="url" id="website" name="website"value="<?php echo $website;?>">

                <label for="companyDescription">Company Description</label>
                <textarea id="companyDescription" name="companyDescription" rows="4"value="<?php echo $companyDescription;?>"></textarea>
                
                <label for="verification">Verification*</label>
                <div class="captcha">
                    <input type="checkbox" id="verification" name="verification" required>
                    <span>I'm not a robot</span>
                </div>
            </fieldset>

           <input type="submit" name="update" value="Update">


        </form>
    </div>

</body>
</html>