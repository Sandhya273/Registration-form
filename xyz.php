<!DOCTYPE html>
<html>
    <body>
        <form name="myform" method="POST">
            Enter First Name:<br>
            <input name="first_name"><br>
            Enter Second Name:<br>
            <input name="second_name"><br><br>
            <button type="submit">sub</button>
        </form>
        <?php
        if (isset($_REQUEST["first_name"]) && isset($_REQUEST["second_name"])){
            $a=$_REQUEST["first_name"];
            $b=$_REQUEST["second_name"];
            echo $a;
            echo $b;
        }
        ?>

    </body>
</html>