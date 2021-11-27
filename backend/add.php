<?php
    include '../include/conn.php';
        session_start();
        $isid=$_SESSION['id'];
      $error="";
      $title=$_POST['title'];
      $datee=$_POST['datee'];
      $kopy_note=$_POST['kopy_note'];
      
        
        if (empty($title)  ) {
            echo "Fill title";
        }
        elseif(empty($datee)){
            echo "Date is not present";
        }
        else if (empty($kopy_note)) {
            # code...
            echo "Note should be filled";
        }
       
        else if (isset($_POST['submit'])) {
            $insert_note="INSERT INTO kopy_note(title,note,createad_on,uid)VALUES(
                '$title','$kopy_note','$datee','$isid')";
    
    
        $sql = mysqli_query($conn,$insert_note);
                if ($sql) {
                    echo "Successfuly saved";
                       header('location: ../user/');
                }
                else{
                    echo "Failed  to add Note";
                }
    
        }
        
       
      
        
        
?>
