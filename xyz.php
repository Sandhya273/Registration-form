<!DOCTYPE html>
<html>
    <body>
        <form name="myform" method="POST">
            Enter First Name:<br>
            <input name="first_name"><br>
            Enter Second Name:<br>
            <input name="second_name"><br>
            <p>status:</p><select name="dropdown">
            <option name="active">active</option>
            <option name="inactive">inactive</option>
            </select><br><br>
            <button type="submit">submit</button>
        </form>
        <?php
        if (isset($_REQUEST["first_name"]) && isset($_REQUEST["second_name"])) {
        
            $a = ($_REQUEST["first_name"]);
            $b = ($_REQUEST["second_name"]);

    
            $status = 0; 
            if (isset($_REQUEST["dropdown"]) && $_REQUEST["dropdown"] == "active") {
                $status = 1; 
            }

            echo "First Name: " . $a . "<br>";
            echo "Second Name: " . $b . "<br>";
            echo "Status: " . ($status == 1 ? "Active" : "Inactive") . "<br>";
        }
        ?>

    </body>
</html>
