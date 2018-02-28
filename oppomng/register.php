<?php 
    if(isset($_POST["register"])) {
        $conn=mysqli_connect("localhost", "root", "", "oppomng");
        if(!$conn) {
            die("Connection failed:" . mysqli_connect_error());
        }
        echo "connection successful <br>";
        
        
        $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);    
        $user = mysqli_real_escape_string($conn,$_POST['username']);
        $pass = mysqli_real_escape_string($conn,$_POST['pass']);
        
        $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname','$lastname', '$user', '$pass')";
        
        $data = mysqli_query($conn,$sql);
        
        if($data === false) {
            echo mysqli_error();
        } else {
            echo "New record created succesfully";
        }
    }

   
?>
<!DOCTYPE html>
<html lang="en">
<head> <title>Opportunity Management: Register</title>
     <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<form class="center" method="post" action="register.php">
    <label>First Name:</label><input type="text" name="firstname" placeholder="First Name" required><br>
    <label>Last Name:</label><input type="text" name="lastname" placeholder="Last Name" required><br>
    <label>Username:</label><input type="email" name="username" placeholder="Email" required><br>
    <label>Password:</label><input type="password" name="pass" placeholder="Password" required><br>  
    <input type="submit" value="Register" name="register">

</form>    

    <a href="index.php" class="center">Already have an account</a>
    
</body>    
</html>