<!DOCTYPE html>
<html>
	<head>
		<title>DONOR DATA</title>
		<meta charset="utf-8">
		
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</head>
	<style type="text/css">
	body{
	background-color: #F5F5F5;
	font-family: '微軟正黑體' ;
	margin: 50px;
	}
	label{
	font-size: 16px;
	color: #7d7d7d  ;
	}
	th{
	text-align: center;
	}
	td{
	text-align: center;
	}
	table{
		font-size:10px;
		word-break: keep-all;
	}
	</style>
	
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-2"></br><img class="img-responsive center-block" src="logo.png" width="70%"/></div>
				<div class="col-sm-8">
					<a href="donor_data.php"><h2>NATIONAL SUN YAT-SEN UNIVERSITY DONOR DATA</br>
					國立中山大學捐款者資料單</h2></a>
				</div>
			</div>
			
			<div class="row" >
				<div class="col-sm-2"></div>
				<div>
					
					<?php
					echo '<form " method="post" action="'.$_SERVER['PHP_SELF'].'">
								Account:<input type="text" size="8" name="account">
								Password: <input  type="password" size="8" name="pwd" >
								<input class="login" type="submit" value="Submit">
					</form></br>'; ?>
					
					<?php
					
					require('dbconnect.php');
					
					
					if (isset($_POST["account"]) && isset($_POST["pwd"])) {
					
					$account = $_POST["account"];
					$pwd = $_POST["pwd"];
					
					$query =  sprintf("SELECT * FROM users WHERE account='%s' AND pwd='%s'", $account, $pwd);
					$result = mysqli_query($connection, $query);
					$num_rows = $result->num_rows;
					if ($num_rows == 1) {
					$query = "SELECT * FROM donor_data";
					$result = mysqli_query($connection, $query);
					
					echo '<table class="table table-bordered table-hover table-striped" style="background-color:white;">';
							echo '<th>Name</th>';
							echo '<th>Company</th>';
							echo '<th>Title</th>';
							echo '<th>Phone</th>';
							echo '<th>Email</th>';
							echo '<th>Address</th>';
							echo '<th>Degree</th>';
							echo '<th>Department</th>';
							echo '<th>Donate</th>';
							echo '<th>Donate Project</th>';
							echo '<th>Project Name</th>';
							echo '<th>Agreement</th>';
							echo '<th>Delete</th>';
							while ($row = mysqli_fetch_assoc($result)) {
							echo '<tr><td>'.$row['name'].'</td>';
							echo '<td>'.$row['company'].'</td>';
							echo '<td>'.$row['title'].'</td>';
							echo '<td>'.$row['phone'].'</td>';
							echo '<td>'.$row['email'].'</td>';
							echo '<td>'.$row['address'].'</td>';
							echo '<td>'.$row['degree'].'</td>';
							echo '<td>'.$row['department'].'</td>';
							echo '<td>'.$row['money'].'</td>';
							echo '<td>'.$row['target'].'</td>';
							echo '<td>'.$row['project'].'</td>';
							echo '<td>'.$row['agreement'].'</td>';
							echo '<td>'.'<a href="delete.php?id='.$row['id'].'">刪除</a></td>';
							echo '</tr>';
							}
					echo '</table>';
					}else {
					echo '<h1 class="text-center">wrong!</h1>';
					}
					
					}
					
				?><p  class="text-center"><a href="donate_form.html">Donate again</a></p>
			</div>
		</div>
		
	</form>
</div>
</body>
</html>