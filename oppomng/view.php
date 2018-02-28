<!DOCTYPE html>
<html>
<head>
    <title>Opportunity Management: Home</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
        
<table border=1 >
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Phone</td>
            
        </tr>
        <?php 
            $conn=mysqli_connect("localhost", "root", "", "oppomng");
    
            $sql = "SELECT * FROM accounts";
    
            $data = mysqli_query($conn,$sql);
        
            if(mysqli_num_rows($data)>0) {
                while($row = mysqli_fetch_assoc($data)){
                    echo "<tr>  
                    <td>" . $row['id'] . "</td> 
                    <td>" . $row['Name'] . "</td>  
                    <td>" . $row['Phone'] . "</td>
                    </tr>";
                }
            } else {
                echo "No results";
            }
                
        ?>
    </table>    
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
    
            $sql = "SELECT * FROM opportunities";
    
            $data = mysqli_query($conn,$sql);
        
            if(mysqli_num_rows($data)>0) {
                while($row = mysqli_fetch_assoc($data)){
                    echo "<tr>  
                    <td>" . $row['id'] . "</td> 
                    <td>" . $row['Name'] . "</td>
                    <td>" . $row['Account'] . "</td>  
                    <td>" . $row['Stage'] . "</td>
                    <td>" . $row['Amount'] . "</td>
                    </tr>";
                }
            } else {
                echo "No results";
            }
                
        ?>
    </table>    
<a href="welcome.php">Back to homepage</a>
</body>
</html>