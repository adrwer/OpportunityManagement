<?php
        require("logincheck.php");

       if(isset($_POST["create"])) {
        $conn=mysqli_connect("localhost", "root", "", "oppomng");
        if(!$conn) {
            die("Connection failed:" . mysqli_connect_error());
        }
        echo "connection successful <br>";
        
        
        $name = mysqli_real_escape_string($conn,$_POST['accntname']);
        $phone = mysqli_real_escape_string($conn,$_POST['phone']);    
        
        $sql = "INSERT INTO accounts (Name, Phone) VALUES ('$name','$phone')";
        
        $data = mysqli_query($conn,$sql);
        
        if($data === false) {
            echo "Unsuccessful!";
        } else {
            echo "New account created succesfully";
        }
    }

    if(isset($_POST["create2"])) {
        $conn=mysqli_connect("localhost", "root", "", "oppomng");
        if(!$conn) {
            die("Connection failed:" . mysqli_connect_error());
        }
        echo "connection successful <br>";
        
        
        $name = mysqli_real_escape_string($conn,$_POST['opname']);
        $accnt = mysqli_real_escape_string($conn,$_POST['account']); 
        $stage = mysqli_real_escape_string($conn,$_POST['stage']); 
        $amnt = mysqli_real_escape_string($conn,$_POST['amount']); 
        
        $sql = "INSERT INTO opportunities (Name, Account, Stage, Amount) VALUES ('$name','$accnt', '$stage', '$amnt')";
        
        $data = mysqli_query($conn,$sql);
        
        if($data === false) {
            echo "Unsuccessful!";
        } else {
            echo "New opportunity created succesfully";
        }
    }

    if(isset($_POST["update"])) {
        $conn=mysqli_connect("localhost", "root", "", "oppomng");
        if(!$conn) {
            die("Connection failed:" . mysqli_connect_error());
        }
        echo "connection successful <br>";
        
        
        $name = mysqli_real_escape_string($conn,$_POST['opname']);
        $stage = mysqli_real_escape_string($conn,$_POST['stage']);  
        
        $sql = "UPDATE opportunities SET Stage = '$stage' WHERE Name = '$name'";
        
        $data = mysqli_query($conn,$sql);
        
        if($data === false) {
            echo "Unsuccessful!";
        } else {
            echo "Updated succesfully";
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Opportunity Management: Home</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <p class="pull_right">Welcome <?php echo $_SESSION["username"] ?></p>
    <br>
    
<table border=1 >
        <tr>
            <td>ID</td>
            <td>Account</td>
            <td>Name</td>
            <td>Phone</td>
            <td>Stage</td>
            <td>Amount</td>
            
        </tr>
        <?php 
            $conn=mysqli_connect("localhost", "root", "", "oppomng");
    
            $sql = "SELECT accounts.id, opportunities.Account, opportunities.Name, accounts.Phone, opportunities.Stage, opportunities.Amount FROM accounts INNER JOIN opportunities  ON accounts.Name = opportunities.Account";
    
            $data = mysqli_query($conn,$sql);
        
            if(mysqli_num_rows($data)>0) {
                while($row = mysqli_fetch_assoc($data)){
                    echo "<tr>  
                    <td>" . $row['id'] . "</td> 
                    <td>" . $row['Account'] . "</td>
                    <td>" . $row['Name'] . "</td>  
                    <td>" . $row['Phone'] . "</td>
                    <td>" . $row['Stage'] . "</td>
                    <td>" . $row['Amount'] . "</td>
                    </tr>";
                }
            } else {
                echo "No results";
            }
                
        ?>
    </table>    
    <br>
    <form method="post" action="welcome.php">
    <label>Name:</label><input type="text" name="accntname" placeholder="Account Name" required><br>
    <label>Phone Number:</label><input type="text" name="phone" placeholder="Phone Number" required><br>
      
    <input type="submit" value="Create Account" name="create"><br>

</form>    
    
    <br>
<form method="post" action="welcome.php">
    <label>Name:</label><input type="text" name="opname" placeholder="Opportunity Name" required><br>
    <label>Account:</label><input type="text" name="account" placeholder="Account" required><br>
    <label>Stage:</label><input type="text" name="stage" placeholder="Stage" required><br>
    <label>Amount:</label><input type="text" name="amount" placeholder="Amount" required><br>
    <input type="submit" value="Create Opportunity" name="create2"><br>
    <input type="submit" value="Update Opportunity Details" name="update"><br>
    
</form>     
    <a href="view.php">View both tables</a>
</body>
</html>