<?php
include '../include/conn.php';

    $id=$_GET['id'];

    $delete_note="DELETE from kopy_note where nid='$id'";


    $sql =mysqli_query($conn,$delete_note);

    if ($sql) {
        header('location: ../user/');
    }
    

?>