<html>
    <body>
        <form name="myform" method="get">
            Enter first Number:<br>
            <input name="first_number"><br>
            Enter second Number:<br>
            <input name="second_number"><br><br>
            <button type="submit">Sub</button>
        </form>

        <?php
        $a = $_GET["first_number"];
        $b = $_GET["second_number"];

        $sum = $a + $b;

        echo "Sum: " .$sum;
        ?>
    </body>
</html>
