<?php
session_start();

$u_id = $_SESSION['id'];
$_SESSION['id'];

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
  <div class="container-fluid" id>
    <form class="note_show" id="note_div" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title_id" placeholder="">


      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="text" readonly name="datee" class="form-control" Date id="date_id">

      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" required class="form-label">Note</label>
        <textarea class="form-control" name="kopy_note" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <input type="submit" name="submit" class="btn btn-primary"></input>
  </div>
  </form>
  <?php
  $isid = $_SESSION['id'];
  $vaild = true;
  if (isset($_POST['submit'])) {
    # code...
    $title = $_POST['title'];
    $datee = $_POST['datee'];
    $kopy_note = $_POST['kopy_note'];

    $checkemptyString = array($title, $datee, $kopy_note);
    foreach ($checkemptyString as $checkemptyString_v1) {
      if (empty($checkemptyString_v1)) {
        $vaild = false;
      }
    }
    if ($vaild) {
      if (isset($_POST['submit'])) {
        $insert_note = "INSERT INTO kopy_note(title,note,createad_on,uid)VALUES(
                  '$title','$kopy_note','$datee','$isid')";


        $sql = mysqli_query($conn, $insert_note);
        if ($sql) {
          echo "Successfuly saved";
          header('location: ../user/');
        } else {
          echo "Failed  to add Note";
        }
      }
    } else {
      echo  '<br>
            <div class="alert alert-warning alert-dismissible fade show" >
            <strong>Title , Note  </strong>shoulnd be empty
             
            </button>
          </div>';
    }
  }







  ?>
  </div>
  <div class="container"></div>
  <div class="box_kopy ">

    <!-- Php code -->
    <?php
    $fetch_note = "Select kopy_note.nid, kopy_note.note,kopy_note.title,kopy_note.createad_on from kopy_note INNER JOIN  kopy_user ON kopy_note.uid=kopy_user.uid WHERE kopy_note.uid='{$u_id}'  ";

    $check_note = mysqli_query($conn, $fetch_note);
    if (mysqli_num_rows($check_note) > 0) {
      while ($row = mysqli_fetch_assoc($check_note)) {
    ?>
        <div class="box_note">
          <div class="title_note">
            <h4><?php $tt = $row['title'];
                if (strlen($tt) > 50) {
                  echo $tt = substr($tt, 0, 10);
                } else {
                  if (strlen($tt) < 50) {
                    echo $tt = substr($tt, 0, 100);
                  }
                }
                ?></h4>
          </div>
          <div class="note_text">
            <p><?php $txt = $row['note'];

                if (strlen($txt) > 40) {
                  echo $txt = substr($txt, 0, 100);
                } else {
                  if (strlen($txt) < 100) {
                    echo $txt = substr($txt, 0, 100);
                  }
                } ?></p>
          </div>
          <div class=" button btn-right">
            <a class="btn btn-primary" href="update_note.php?id=<?php echo $row['nid']; ?>">Edit</a>
            <a class="btn btn-primary" href="../backend/delete.php?id=<?php echo $row['nid']; ?>">Delete</a>
            <!-- <a class="btn btn-primary" href="view.php?id=<?php echo $row['nid']; ?>">View Note</a> -->

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




  function create_note() {
    // alert("Active")
    var create_note = document.getElementById("note_div");
    create_note.classList.toggle("note_show");
  }
</script>


<?php
    }

?>


</html>