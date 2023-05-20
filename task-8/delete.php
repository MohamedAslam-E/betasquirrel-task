<?php
include ('database.php');

if($_GET['deleteid']){
    $id=$_GET['deleteid'];

    $sql="DELETE FROM list WHERE id = '$id'";
    $query=mysqli_query($conn,$sql);
    if($query){
        header('location:index.php');
        exit();
    }else{
        echo"no such id found";
    }
}
?>