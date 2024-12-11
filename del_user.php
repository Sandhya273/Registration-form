<?php
session_start();
include "cfg/dbconnect.php";
if (isset($_REQUEST['id'])){
    $id=$_REQUEST['id'];
    $sql="delete from users where id=?";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $_SESSION['succ_msg']="User delete successfully";
    header("location:index.php");
}