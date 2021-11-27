<!-- Fixing the bug of updating the note of the current selected  note -->
<?php
session_start();
    include '../include/conn.php';


if (isset($_SESSION['id'])) {
//   header('location: user/kopy_note.php');
}
else{
    header('location: ../index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php

$id = $_GET['id'];

    $query = "Select * from kopy_note where nid= '$id'";

    $sql=mysqli_query($conn,$query) or die("Eroor in fetchi");
    
   if (mysqli_num_rows($sql)>0) {
       
 
        while($row=mysqli_fetch_assoc($sql)){
      
            echo $row['title'];
        }}
?>
    </title>
    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">


</head>

<body>
    <?php
    include 'header.php';

    ?>
    <div class="container">

    <form action="<?php  $_SERVER['PHP_SELF'];?>" method="post">
        <?php

                   $id=$_GET['id'];

             
                    $query = "Select * from kopy_note where nid= '$id'";

                    $sql=mysqli_query($conn,$query) or die("Eroor in fetchi");
                    
                   if (mysqli_num_rows($sql)>0) {
                       
                 
                        while($row=mysqli_fetch_assoc($sql)){
                      
                 

        ?>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"></label>
            <input type="text" class="form-control" value="<?php echo $row['title'];?>" name="title" id="title_id" placeholder="">
           

        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Created</label>
            <input  type="text"  readonly name="datee" class="form-control" Date id="date_id" >

        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" required class="form-label">Note</label>
            <textarea class="form-control"  name="kopy_note" id="exampleFormControlTextarea1" rows="3"><?php echo $row['note'];?></textarea>
        </div>
        <input type="submit" name="submit" class="btn btn-primary"></input>
    </div>
    </form>
    <?php
   }
    ?>
    <?php
// Database connection file

include '../include/conn.php';
       

       if (isset($_POST['submit'])) {
           
$update_id = $_GET['id'];
        $title=$_POST['title'];
        $note =$_POST['kopy_note'];
        $datenow=$_POST['datee'];


        // echo $title. " ". " ". " $note". " $datenow";



        $sql = "Update  kopy_note SET title='{$title}',note='{$note}',createad_on='{$datenow}' WHERE nid = '{$update_id}' ";

        $query=mysqli_query($conn,$sql);

        if ($query) {
            echo "Note Update";

            header('location: ../index.php');
           
        }
        else{
            echo "Failed to update the note";
        }
       }
?>
</body>

<script>
const d = new Date();   

    document.getElementById("date_id").value=d;
    document.getElementById("title").style.textDecorationStyle="bold";
</script>

</html> 
<?php
                   }?>