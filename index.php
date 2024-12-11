<?php
include "header.php";
include "cfg/dbconnect.php";
$sql="select * from users";
$stmt=$conn->prepare($sql);
$stmt->execute();
$result=$stmt->get_result();
?>
<body>
<div class="container">
    <h1>PHP CRUD-User List(READ)</h1>
    <a class="btn btn-primary" href="user.php">user(+)</a>
    <?php if (isset($_SESSION['succ_msg'])){ ?>
            <div class="alert alert-sucess">
                <?= $_SESSION['succ_msg']; unset($_SESSION)?>
            </div>
            <?php

        }
        ?>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>

                

        </tr></thead>
        <tbody>
            <?php
            if ($result->num_rows > 0){
                foreach($result as $row){ 
                    $name=$row['name'];?>
                  <tr class=""><td scope="row"><?php echo $row['id']?></td>
                      <td><?php echo $row['name']?></td>
                      <td><?php echo $row['email']?></td>
                      <td><?php echo $row['address']?></td>
                      <td>
                        <a class="btn btn-primary" href="upd_user.php?id=<?=$row['id']?>">Update</a>
                        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete the user <?php echo $name ?>?')" href="del_user.php?id=<?=$row['id']?>">Delete</a>
                      </td>
                 </tr>
                 <?php
                }
            }
            else {
                ?>
            
            <tr>
                <td colspan="5">No users to display</td>
            
            </tr>
            <?php }
                ?>
            

            
        </tbody>
    </table>
</div>
</div>
            </body>
</html>