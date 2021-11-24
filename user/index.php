<?php
session_start();

if (isset($_SESSION['id'])) {
} else {

  header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assests/theme/custom-theme.css">


</head>

<body>

  <?php
    
  include '../include/conn.php';
  include 'header.php';

  ?>
  <div>Welcome back,
     <h2><?php echo $_SESSION['name'];?></h2> <br>
     </div>
    <div class="box_kopy container">
     
      <!-- Php code -->
      <?php
      $fetch_note = "Select kopy_note.nid, kopy_note.note,kopy_note.title,kopy_note.createad_on from kopy_note INNER JOIN  kopy_user ON kopy_note.uid=kopy_user.uid";

      $check_note = mysqli_query($conn, $fetch_note);
      if (mysqli_num_rows($check_note) > 0) {
        while ($row = mysqli_fetch_assoc($check_note)) {
      ?>
          <div class="box_note">
            <div class="title_note">
              <h4><?php $tt= $row['title']; 
if (strlen($tt)>20) {
    echo $tt=substr($tt,0,10);
}
else{
  if (strlen($tt) <50) {
    echo $tt = substr($tt, 0, 100) ;
  }
}
              ?></h4>
            </div>
            <div class="note_text">
              <p><?php  $txt = $row['note'];

                  if (strlen($txt) > 20) {
                    echo $txt = substr($txt, 0, 100);
                  }
                  else{
                    if (strlen($txt) <40) {
                      echo $txt = substr($txt, 0, 100) ;
                    }
                  } ?></p>
            </div>
            <div class=" button btn-right">
              <a class="btn btn-primary" href="update_note.php?id=<?php echo $row['nid']; ?>">Edit</a>
              <a class="btn btn-primary" href="../backend/delete.php?id=<?php echo $row['nid']; ?>">Delete</a>
              <a class="btn btn-primary" href="view.php?id=<?php echo $row['nid']; ?>">View Note</a>

            </div>
          </div>


  
  <?php

        }
  ?>
</body>
<script src="../assests//js//bootstrap.bundle.js"></script>

<script>
  const d = new Date();
  document.getElementById("date_id").value = d;
  document.getElementById("title").style.textDecorationStyle = "bold";
</script>

<?php
      }
       ?>

</html>