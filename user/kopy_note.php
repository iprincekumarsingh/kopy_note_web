<?php
session_start();

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
    <title>Home</title>
    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">


</head>

<body>
    <?php
    include 'header.php';

    ?>
    <div class="container">

    <form action="../backend/add.php" method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title_id" placeholder="">
           

        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input  type="text" readonly name="datee" class="form-control" Date id="date_id" >

        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" required class="form-label">Note</label>
            <textarea class="form-control" name="kopy_note" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <input type="submit" name="submit" class="btn btn-primary"></input>
    </div>
    </form>
</body>

<script>
const d = new Date();   

    document.getElementById("date_id").value=d;
    document.getElementById("title").style.textDecorationStyle="bold";
</script>

</html> 