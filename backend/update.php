<?php
// Database connection file
session_start();
include '../include/conn.php';
        $usid = $_SESSION['note_id'];

        $title=$_POST['title'];
        $note =$_POST['kopy_note'];
        $datenow=$_POST['datee'];


        // echo $title. " ". " ". " $note". " $datenow";



        $sql = "Update  kopy_note SET title='{$title}',note='{$note}',createad_on='{$datenow}' WHERE nid = '{$usid}' ";

        $query=mysqli_query($conn,$sql);

        if ($query) {
            echo "Note Update";
            header('location: ../user/update_note.php');
        }
        else{
            echo "Failed to update the note";
        }
?>