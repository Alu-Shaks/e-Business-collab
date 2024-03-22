<?php
session_start();
include "connectdb.php";
if (!isset($_SESSION['email'])) {
  header("location:login.php");
  exit();
}
$sql = "SELECT * FROM bus_owner WHERE email='{$_SESSION['email']}'";
$result=mysqli_query($connect,$sql);

if($result){
  if (mysqli_num_rows($result)>0) {
    $bus_owner=mysqli_fetch_assoc($result);
    $first_name=$bus_owner['first_name'];
    $email=$bus_owner['email'];
    $phone_no=$bus_owner['phone_no'];
    $profile_picture_url=$bus_owner['profile_picture_url'];
  }else{
    header("location:Home.php");
    exit();
  }
}else{
  die("Query failed" . mysqli_error($connect));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_FILES['fileInput']) && $_FILES['fileInput']['error'] == UPLOAD_ERR_OK) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileInput"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileInput"]["tmp_name"]);
    if($check !== false) {
      // Allow only certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      } else {
        // Move uploaded file to destination directory
        if (move_uploaded_file($_FILES["fileInput"]["tmp_name"], $target_file)) {
          $update_sql = "UPDATE bus_owner SET profile_picture_url='$target_file' WHERE email='{$_SESSION['email']}'";
          if(mysqli_query($connect, $update_sql)) {
            echo "Profile photo uploaded successfully.";
            $profile_picture_url = $target_file; // Update profile photo URL
          } else {
            echo "Error updating profile photo: " . mysqli_error($connect);
          }
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
    } else {
      echo "File is not an image.";
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
    margin: 70px auto;
    padding: 20px;
    border-radius: 0px;
    box-shadow: 0 0 0px rgba(0,0,0,0.1);
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
</style>
</head>
<body>

<div class="container">
  <h1>User Profile</h1>
  
  <div class="profile-photo" id="profilePhotoContainer">
    <img id="profilePhoto" src="<?php echo $profile_picture_url; ?>" alt="Profile Photo">
  </div>
  
  <div class="user-details">
    <p><strong>Name:</strong> <?php echo $first_name; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Phone:</strong> <?php echo $phone_no; ?></p>
  </div>

  <form method="post" enctype="multipart/form-data">
    <input type="file" name="fileInput" id="fileInput" style="display:none;" accept="image/*">
    <button type="button" class="btn-update" onclick="document.getElementById('fileInput').click();">Upload Photo</button>
    <input type="submit" value="Save Photo" class="btn-update">
  </form>
</div>

</body>
</html>
