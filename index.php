<!DOCTYPE html>
<html>
<body>

<h2> snew table</h2>

<table>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Second Name</th>
        <th>Status</th>
    </tr>

    <?php
    
    include "connectdb.php";
    
    $sql = "SELECT id, first_name, second_name, status FROM sanju";
    
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
    
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["id"]) . "</td>
                    <td>" . htmlspecialchars($row["first_name"]) . "</td>
                    <td>" . htmlspecialchars($row["second_name"]) . "</td>
                    <td>" . htmlspecialchars($row["status"]) . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No results found</td></tr>";
    }

    $conn->close();
    ?>

</table>

</body>
</html>
