<?php
    include '../include/conn.php';
        session_start();
        $isid=$_SESSION['id'];
        echo $isid;
    if (isset($_POST['submit'])){
        $title=$_POST['title'];
        $datee=$_POST['datee'];
        $kopy_note=$_POST['kopy_note'];
      
        
        $insert_note="INSERT INTO kopy_note(title,note,createad_on,uid)VALUES(
            '$title','$kopy_note','$datee','$isid')";


    $sql = mysqli_query($conn,$insert_note);
            if ($sql) {
                echo "Successfuly saved";
                   header('location: ../user/kopy_note.php');
            }
            else{
                echo "Failed  to add Note";
            }

    }
?>
