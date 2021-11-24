<?php


$server ="localhost";
$username="root";
$password="";
$database="kopy_note";

try {
    $conn= mysqli_connect($server,$username,$password,$database);
} catch (\Throwable $th) {
    echo "<h1>Failed to Connect Database";
}

   

?>