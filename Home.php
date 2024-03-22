<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" href="https://th.bing.com/th/id/OIP.9w0x4xNMZx-ER2p8PP0gYgHaE7?w=264&h=180&c=7&r=0&o=5&cb=11&dpr=1.5&pid=1.7">
    <title>Home</title>
</head>
<link rel="stylesheet" href="styl.css">
<style>
    /* Resetting default margin and padding */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styles */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f5f5f5;
}

/* Header styles */
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

/* Main content styles */
section {
    padding: 20px;
}

section h2 {
    color: #333;
}

/* Service container styles */
.container {
    background-color: #fff;
    border-radius: 10px;
    padding: 10px;
    margin-bottom: 10px;
    border-width: 1px;
    border: 1px;
    display: inline-block;
}

.container h3 {
    color: #333;
}

/* Testimonial styles */
.container p {
    color: #666;
}

/* Input button styles */
input[type="submit"] {
    display: block;
    margin: 20px auto;
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #555;
}

/*.image-container {
    float: right;
    height: 1000px;
   }*/
#align{
    display: flex;
    align-items: center; 
    margin: auto;
    justify-content: center;
}

.column{
    border-width: 1px;
    padding: 1px ;
    display: flex;
    align-items: center;
}
table{
    justify-content: center;
}
td,tr,th{
    padding: 20px ;
    margin: auto;
}
</style>
<body>
    <h1>RegE</h1>
    <nav>
        <img src="logo.png" alt="Logo">
    <ul class="taskbar">
        <li><a href="Home.php"title="Home"target="_self">Home</a></li>
        <li><a href="bus-owner register.php"title="Register" target="_self">Register</a></li>
        <li><a href="login.php" title="Login"target="_self">Login</a></li>
        <li><a href="contact.php" title="Contact"target="_self">Contact</a></li>
    </ul>
</nav>
<section id="align">
<img src="work3.png" height="300px">
    <p style="text-align:center;">Register your business and begin your entrepreneurial pathway today</p>
 <div class="image-container">
    <img src="work2.png" height="300px">
</div>
</section>
   
   <a href="business-registration.php">
    <input type="submit" name="register" value="Register">
</a>
    <section>
        <h2>About Us</h2>
        <p>A platform allowing for users to register and enlist their businesses online.
            Be it sole-proprietorship,partnership,LLC or corporations, we got you sorted.
            The system allows for guiding of the user through paramount steps, assuring compliance with legal and bereaucratic procedures.
            Some of the features include:<br>-name reservation<br>-necessary documentation<br>-display of business to other users...<br>
            and many more.
            With our comprehensive tools, we empower entrepreneurs to embark on their ventures with ease and having their peace of mind
        </p>
    </section>
    <div>
        <h2>Our Services</h2>
            <div class="container">
            <h3><b>Business Registration</b></h3>
             <p class="column">We offer a range of services to help you grow your business</p>
             <img src="work4.png"height="250px">
            </div>
            <div class="container">
            <h3><b>Registration and Login</b></h3>
            <p class="column">Access your business details hassle-free</p>
            <img src="work5.png"height="250px">
            </div>
            <div class="container">
            <h3><b>Business Listing</b></h3>
            <p class="column">Manage your business details anytime, anywhere</p>
            <img src="work6.png"height="250px">
            </div>
    </div>
    
    <h1>REGISTERED COMPANIES</h1>
    <div class="container" style="
    padding: 50px;
    display: flex;
    align-items: center; 
    margin: auto;
    justify-content: center;">
        <table>
            <tr>
                <th>COMPANY NAME </th>
                <th>OWNERS NAME</th>
                <th>COMPANY DESCRIPTION</th>
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
        echo "<tr>
        <td>$companyName</td>
        <td>$owner</td>
        <td>$companyDescription</td>

        </tr>";
    }
}

    
    ?>
</table>
</div>

    <div>

        <h2>Happy Customers</h2>
            <div class="container">
             <p class="column">This platform made it so easy for me to register my business. Highly recommended!</p>
            </div>
            <div class="container">
            <p class="column">I love how user friendly this website is. Managing a business has never been easier!</p>
            </div>
            <div class="container">
            <p class="column">Great service.Reliable customer support.Simply the best.</p>
            </div>
    </div>
</body>
</html>