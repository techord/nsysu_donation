<?php
        //$id= $_POST["id"];
//$index=36;
$id=$_GET["id"];
require('dbconnect.php');
$query =  "DELETE FROM donor_data WHERE id='".$id."'";
//echo $query;
$result = mysqli_query($connection, $query);
//echo $result;
header("HTTP/1.1 301 Moved Permanently");
header("Location:/ufrc/donor_data.php");

?>