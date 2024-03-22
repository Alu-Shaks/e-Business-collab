<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
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


        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px;
        }
        
        .contact-info {
            flex: 1;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .contact-info h2 {
            font-size: 40px;
            margin-bottom: 10px;
            color: #333;
        }
        
        .contact-info p {
            margin: 10px 0;
            color: #666;
        }
        
        .social-icons a {
            margin-right: 10px;
        }
        
        .social-icons a:last-child {
            margin-right: 0;
        }
        
        .form-container {
            flex: 1;
            margin-left: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .form-container h2 {
            font-size: 30px;
            margin-bottom: 10px;
            color: #333;
        }
        
        .form-container label {
        display: block;
        margin-bottom: 5px;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
        }
        
        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container textarea {
            margin-bottom: 10px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        
        .form-container input[type="submit"] {
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
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
    </ul>
</nav>
    <div class="container">
        <div class="contact-info">
            <h2>Contact Us</h2>
            <p><i class="fas fa-envelope"></i> someone@example.com</p>
            <p><i class="fas fa-phone"></i> +1234567890</p>
            <div class="social-icons">
                <a href="https://facebook.com" target="https"><i class="fab fa-facebook"></i></a>
                <a href="https://instagram.com"target="https"><i class="fab fa-instagram"></i></a>
                <a href="https://tiktok.com"target="https"><i class="fab fa-tiktok"></i></a>
            </div>
        </div>
        <div class="form-container">
            <h2>Send Us a Message</h2>
            <form action="#" method="POST">
                <label for="name">Name:</label>
                <input type="text" name="name" placeholder="Enter your name" required>
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Your email address" required>
                <label for="message">Message:</label>
                <textarea name="message" rows="4" placeholder="Enter your message" required></textarea>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>