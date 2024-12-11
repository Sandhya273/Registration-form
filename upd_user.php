<?php
include "header.php";
include "cfg/dbconnect.php";


$err_flag = false;
$name_err = '';
$email_err = '';
$address_err = '';

if(isset($_REQUEST['id'])){
    $id=$_REQUEST['id'];

    $sql="select * from users where id= ?";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result=$stmt->get_result();
    if ($result->num_rows >0){
        $row=$result->fetch_assoc();
        $name=$row['name'];
        $email=$row['email'];
        $address=$row['address'];
    }
}

if (isset($_POST['submit'])) {

    $id=trim($_POST['id']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);

    
    if (empty($name)) {
        $name_err = "Enter Name";
        $err_flag = true;
    }

    
    if (empty($email)) {
        $email_err = "Enter Email";
        $err_flag = true;
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_err="Email format is not valid";
        $err_flag=true;
    }
    else{ //check for duplicate emails
        $sql="select * from users where email = ? and id !=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si",$email,$id);
        $stmt->execute();
        $result=$stmt->get_result();
        if ($result->num_rows > 0){
            $email_err="Email already exists";
            $err_flag=true;
        }
    }

    if (!$err_flag){
        //validations are successfull
        $sql="update users set name = ?, email = ?, address = ? where id = ?";
        try{
            $stmt=$conn->prepare($sql);
            $stmt->bind_param("sssi", $name, $email, $address, $id);
            $stmt->execute();
            $_SESSION['succ_msg'] = "user updated successfully";
            header("location:index.php");
        }
        catch(Exception $e){
            $err_msg= $e->getMessage();
        }
    }

    
    if (empty($address)) {
        $address_err = "Enter Address";
        $err_flag = true;
    }

    
    if (!$err_flag) {
    
    }
}
?>

<body>
    <div class="container">
        <h1>PHP CRUD- Update User(UPDATE)</h1>
        <?php if (!empty($err_msg)){ ?>
            <div class="alert alert-danger">
                <?= $err_msg?>
            </div>
            <?php

        }
        ?>
        <form action="" method="post">
            <input type="hidden" name="id" id="" value=<?=$id ?>>
            
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?php echo htmlspecialchars($name ?? '', ENT_QUOTES); ?>">
                <div class="text-danger"><?php echo $name_err; ?></div>
            </div>

            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email" value="<?php echo htmlspecialchars($email ?? '', ENT_QUOTES); ?>">
                <div class="text-danger"><?php echo $email_err; ?></div>
            </div>

        
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" name="address" id="address" rows="3"><?php echo htmlspecialchars($address ?? '', ENT_QUOTES); ?></textarea>
                <div class="text-danger"><?php echo $address_err; ?></div>
            </div>

    
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <a class="btn btn-danger" href="index.php">Cancel</a>
        </form>
    </div>
</body>
</html>
