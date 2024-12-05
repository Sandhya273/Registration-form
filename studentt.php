<?php
if (isset($_REQUEST["submit"])) {
    
    $firstname = $_REQUEST["first_name"];
    $secondname = $_REQUEST["second_name"];
    $status = $_REQUEST["dropdown"];
    echo "First name:" . ($first_name);"<br>";

    echo "Second name:" .($second_name);"<br>";
    echo "status:" .($status); "<br>";
    
}
    ?>