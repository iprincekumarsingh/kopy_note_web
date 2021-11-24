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
  include '../include/header.php';

  ?>
  <div class="container">
    <div class="box-kopy">
<!-- Php code -->
<?php
          $fetch_note="Select kopy_note.note,kopy_note.title,kopy_note.createad_on from kopy_note INNER JOIN  kopy_user ON kopy_note.uid=kopy_user.uid";

            $check_note=mysqli_query($conn,$fetch_note);
            if (mysqli_num_rows($check_note)>0) {
              while($row=mysqli_fetch_assoc($check_note)){
                ?>
            
            

      <div class="box_note">
        <div class="title_note">
          <h1>Hello</h1>
        </div>
        <div class="note_text">
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi voluptatum deserunt magni nostrum dolor perspiciatis ab, dicta atque deleniti? Placeat.</p>
        </div>
      </div>
      

    </div>
              <?php

  }
    ?>
</body>

<script>
  const d = new Date();
  document.getElementById("date_id").value = d;
  document.getElementById("title").style.textDecorationStyle = "bold";
</script>

<?php
            }?>
</html>