<?php
if (isset($_REQUEST["submit"])) {
    
    $firstname = $_REQUEST["first_name"];
    $secondname = $_REQUEST["second_name"];
    $status = ($_REQUEST["dropdown"] == "active") ? 1 : 0; 

    
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "snew"; 

    
    $conn = mysqli_connect($host, $user, $pass, $dbname);

    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $sql = "INSERT INTO sanju (first_name, second_name, status) VALUES (?, ?, ?)";

    
    if ($stmt = mysqli_prepare($conn, $sql)) {
        
        mysqli_stmt_bind_param($stmt, "ssi", $firstname, $secondname, $status);

        
        if (mysqli_stmt_execute($stmt)) {
            echo "Data saved successfully!";
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

    
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing query: " . mysqli_error($conn);
    }


    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<body>
    <form action="#" method="POST">
        Enter First Name:<br>
        <input type="text" name="first_name" required><br>
        
        Enter Second Name:<br>
        <input type="text" name="second_name" required><br>
        
        <p>Status:</p>
        <select name="dropdown">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select><br><br>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
