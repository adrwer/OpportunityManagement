<?php 
    session_start();

    if(isset($_SESSION["username"]) && isset($_SESSION["loggedin"])) {
        
        header("Location: index.php");
        exit();
    }

     if(isset($_POST["create"])) {
        header("Location: register.php");
        exit();
    }

    if(isset($_POST["login"])) {
        $conn=mysqli_connect("localhost", "root", "", "oppomng");
        if(!$conn) {
            die("Connection failed:" . mysqli_connect_error());
        }
        echo "connection successful <br>";
        
        $user = mysqli_real_escape_string($conn,$_POST['username']);
        $pass = mysqli_real_escape_string($conn,$_POST['pass']);
        
        $sql = "SELECT firstname FROM users WHERE email='$user' AND password='$pass'";
        $data = mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($data)>0) {
            $_SESSION["username"] = $user;
            $_SESSION["loggedin"] = 1;
            
            header("Location: welcome.php");
            exit();
        } else {
            echo "Please check your inputs!";
        }
    }

   
?>
<!DOCTYPE html>
<html lang="en">
<head> <title>Opportunity Management</title>
     <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<form class="center" method="post" action="index.php">
    <label>Username:</label><input type="email" name="username" placeholder="Email"><br>
    <label>Password:</label><input type="password" name="pass" placeholder="Password"> <br> 
    <input type="submit" value="Log in" name="login">
    <input type="submit" value="Create User Account" name="create">
</form>    
    
    
</body>    
</html>