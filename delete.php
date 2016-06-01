<?php
	//$id= $_POST["id"];
                                        //$index=36;
					$id=$_GET["id"];
                                        $host = "localhost";   //See Step 3 about how to get host name
                                        $user = "root";                     //Your Cloud 9 username
                                        $pass = "nsysumis";                                 //Remember, there is NO password!
                                        $db = "en_donors";                          //Your database name you want to connect to
                                        $port = 3306;                               //The port #. It is always 3306
                                        $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
                                        $query =  "DELETE FROM donor_data WHERE id='".$id."'";
//echo $query;
                                        $result = mysqli_query($connection, $query);
                                        //echo $result;
header("HTTP/1.1 301 Moved Permanently");
header("Location:/ufrc/donor_data.php");
?>

