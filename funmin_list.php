<?php

			$q = $_GET['q'];
						//echo $q;
					$host = "localhost";   //See Step 3 about how to get host name
					$user = "root";                     //Your Cloud 9 username
					$pass = "nsysumis";                                 //Remember, there is NO password!
					$db = "en_donors";                          //Your database name you want to connect to
					$port = 3306;                               //The port #. It is always 3306
					$connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
					$connection->query("SET NAMES utf8");
					$query = "SELECT * FROM funmin_list WHERE date LIKE '104".$q."%'";
					$result = mysqli_query($connection, $query);
					
					echo '<table class="table table-bordered table-hover table-striped" style="background-color:white;">';
							echo '<th>日期</th>';
							echo '<th>收據抬頭</th>';
							echo '<th>捐款金額</th>';
							echo '<th>受贈單位</th>';
						
							while ($row = mysqli_fetch_assoc($result)) {
							
							echo '<tr><td>'.$row['date'].'</td>';
							echo '<td>'.$row['who'].'</td>';
							echo '<td>'.$row['much'].'</td>';
							echo '<td>'.$row['wheree'].'</td></tr>';
							}
					echo '</table>';
				
?>