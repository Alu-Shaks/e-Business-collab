<?php
session_start();
include "connectdb.php";

// Check if user is logged in
if (!isset($_SESSION['email'])) {
  header("location:login.php");
  exit();
}

// Fetch user data from the database including owner_id
$sql = "SELECT * FROM bus_owner WHERE email='{$_SESSION['email']}'";
$result = mysqli_query($connect, $sql);

if ($result) {
  if (mysqli_num_rows($result) > 0) {
    $bus_owner = mysqli_fetch_assoc($result);
    $owner_id = $bus_owner['owner_id']; // Fetch owner_id
    $first_name = $bus_owner['first_name'];
    $email = $bus_owner['email'];
    $phone_no = $bus_owner['phone_no'];
    $profile_picture_url = $bus_owner['profile_picture_url'];
  } else {
    header("location:Home.php");
    exit();
  }
} else {
  die("Query failed: " . mysqli_error($connect));
}

// Handle file upload and form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Handle file upload for profile picture
  if (isset($_FILES['fileInput']) && $_FILES['fileInput']['error'] == UPLOAD_ERR_OK) {
    $file = $_FILES['fileInput']['tmp_name'];
    $fileContent = addslashes(file_get_contents($file)); // Convert image to binary data
    
    // Prepare and execute SQL statement to update profile picture
    $update_sql = "UPDATE bus_owner SET profile_picture_url='$fileContent' WHERE email='{$_SESSION['email']}'";
    if (mysqli_query($connect, $update_sql)) {
      echo "Profile photo uploaded successfully.";
      $profile_picture_url = $fileContent; // Update profile photo URL
    } else {
      echo "Error updating profile photo: " . mysqli_error($connect);
    }
  }

  // Handle form submission for updating user information
  if (isset($_POST['newFirstName']) && isset($_POST['newPhoneNo'])) {
    $newFirstName = $_POST['newFirstName'];
    $newPhoneNo = $_POST['newPhoneNo'];

    // Prepare and execute SQL statement to update user information
    $update_info_sql = "UPDATE bus_owner SET first_name='$newFirstName', phone_no='$newPhoneNo' WHERE email='{$_SESSION['email']}'";
    if (mysqli_query($connect, $update_info_sql)) {
      echo "User information updated successfully.";
      $first_name = $newFirstName; // Update first name
      $phone_no = $newPhoneNo; // Update phone number
    } else {
      echo "Error updating user information: " . mysqli_error($connect);
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Profile</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
  }
  
  .container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }
  
  h1 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 40px;
  }
  
  .profile-photo {
    display: block;
    width: 190px;
    height: 190px;
    margin: 0 auto 20px;
    border-radius: 50%;
    background-color: #ccc;
    overflow: hidden;
  }
  
  .profile-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  
  .user-details {
    text-align: center;
    margin-bottom: 20px;
    font-size: 20px;
  }
  
  .user-details p {
    margin: 5px 0;
  }
  
  .btn-update {
    display: block;
    width: 100%;
    padding: 10px;
    text-align: center;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: background-color 0.3s;
    font-size: 15px;
  }
  
  .btn-update:hover {
    background-color: #0056b3;
  }
  h1 {
    text-align: center;
    margin: 20px 0;
    color: #333;
}

/* Navigation styles */
nav {
    background-color: #333;
    color: #fff;
    padding: 10px;
}

nav img {
    width: 40px;
    float: left;
    display: inline-block;
    margin:  auto;
}
.taskbar {
    list-style-type: none;
    text-align: center;
    margin-top: 10px;
}

.taskbar li {
    display: inline;
    margin-right: 20px;
}

.taskbar li a {
    text-decoration: none;
    color: #fff;
}

</style>
</head>
<body>

  <h1>RegE</h1>
    <nav>
        <img src="logo.png" alt="Logo">
    <ul class="taskbar">
        <li><a href="Home.php"title="Home"target="_self">Home</a></li>
        <li><a href="business-registration.php"title="Register" target="_self">Register Business</a></li>
        <li><a href="login.php" title="Login"target="_self">Login</a></li>
        <li><a href="contact.php" title="Contact"target="_self">Contact</a></li>

        <li><a href="profile.php" title="Profile"target="_self">profile</a></li>
        <li style="float: right;"><a href="logout.php" title="Profile"target="_self">logout</a></li>
    </ul>
</nav>

<div class="container">
  <h1>User Profile</h1>
  
  <div class="profile-photo" id="profilePhotoContainer">
    <img id="profilePhoto" src="placeholder.png">
  </div>
  
  <div class="user-details">
    <p><strong>Name:</strong><?php echo $first_name; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Phone:</strong>  <?php echo $phone_no; ?></p>
  </div>
  <button style="justify-content: center;display: flex;align-items: center;margin: auto;padding: 7px;margin-bottom: 10px;">
  <a href='update-user info.php?owner_id=<?php echo $owner_id; ?>'>Edit</a>
</button>

  
  
  <input type="file" id="fileInput" style="display:none;" accept="image/*">
  <button class="btn-update" onclick="document.getElementById('fileInput').click();">Upload Photo</button>
</div>

 <h1>COMPANIES REGISTERED</h1>
    <div class="table" style="
    padding: 20px;
    display: flex;
 
    margin: auto;">
        <table>
            <tr>
                <th>COMPANY NAME </th>
                <th>OWNERS NAME</th>
                <th>COMPANY DESCRIPTION</th>
                <th>STREET ADDRESS</th>
                <th>CITY</th>
                <th>POSTAL CODE</th>
                <th>WEBSITE</th>
            </tr>

    <?php
    include 'connectdb.php';
    $sql="SELECT * FROM Company_Information";
    $result=mysqli_query($connect,$sql);
    if ($result) {
        // code...
    
    while($Company_Information=mysqli_fetch_assoc($result)){
        $companyID=$Company_Information['companyID'];
        $companyName=$Company_Information['companyName'];
        $owner=$Company_Information['owner'];
        $companyDescription=$Company_Information['companyDescription'];
        $streetAddress=$Company_Information['streetAddress'];
        $city=$Company_Information['city'];
        $postalCode=$Company_Information['postalCode'];
        $website=$Company_Information['website'];
        echo "<tr>
        <td>$companyName</td>
        <td>$owner</td>
        <td>$companyDescription</td>
        <td>$streetAddress</td>
        <td>$city</td>
        <td>$postalCode</td>
        <td>$website</td>
        
        <td><button>
  <a href='delete.php?companyID=$companyID'>Delete</a>
        </button>
      </td>
      <td>
        <button>
  <a href='update.php?companyID=$companyID'>Update</a>
        </button>
      </td>

        </tr>";
    }
}

    
    ?>
</table>
</div>


<script>
  const fileInput = document.getElementById('fileInput');
  const profilePhoto = document.getElementById('profilePhoto');

  fileInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(event) {
        profilePhoto.src = event.target.result;
      }
      reader.readAsDataURL(file);
    }
  });
</script>

</body>
</html>