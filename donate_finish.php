<!DOCTYPE html>
<html>
  <head>
    <title>DONATION FORM</title>
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
  td{
  text-align: left;
  width: 500px;
  }
  </style>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3"></br><img class="img-responsive center-block" src="logo.png" width="50%"/></div>
        <div class="col-sm-6 ">
          <a href="donate_form.html">
            <h2>NATIONAL SUN YAT-SEN UNIVERSITY DONATION FORM</br>
          國立中山大學捐款單</h2></a>
        </div>
      </div>
      
      <div class="row" >
        <div class="col-sm-3"></div>
        <div class="col-sm-6 bg-info ">
          <?php
          
          $name = $_POST['name'];
          $company = $_POST['company'];
          $title = $_POST['title'];
          $phone = $_POST['phone'];
          $email = $_POST['email'];
          $address = $_POST['address'];
          $degree = $_POST['degree'];
          $department = $_POST['department'];
          $money = $_POST['money'];
          $target = $_POST['target'];
          $project = $_POST['project'];
          $agreement = $_POST['agreement'];
          
          //Connect to the database
          require('dbconnect.php');
          if($name!='' && $money !=''){
          //And now to perform a simple query to make sure it's working
          $query = "INSERT INTO donor_data (name,company,title,phone,
          email, address,degree,department,money,target,agreement,project)
          VALUES ('$name','$company','$title','$phone','$email','$address','$degree','$department
          ' ,'$money','$target','$agreement','$project')";
          $result = mysqli_query($connection, $query);
          if($result) {
          echo '<h1 class="text-center">Your donation:</h1>';
          echo '<table class="table table-bordered" style="background-color:white;">';
            echo '<tr><td>Name:</td>'.'<td>'.$name.'</td></tr>';
            echo '<tr><td>Company:</td>'.'<td>'.$company.'</td></tr>';
            echo '<tr><td>Title:</td>'.'<td>'.$title.'</td></tr>';
            echo '<tr><td>Phone:</td>'.'<td>'.$phone.'</td></tr>';
            echo '<tr><td>Email:</td>'.'<td>'.$email.'</td></tr>';
            echo '<tr><td>Address:</td>'.'<td>'.$address.'</td></tr>';
            echo '<tr><td>Degree:</td>'.'<td>'.$degree.'</td></tr>';
            echo '<tr><td>department:</td>'.'<td>'.$department.'</td></tr>';
            echo '<tr><td>Donate:</td>'.'<td>'.$money.'</td></tr>';
            echo '<tr><td>Project to support:</td>'.'<td>'.$target.'  '.$project.'</td></tr>';
            echo '<tr><td>Agreement:</td>'.'<td>'.$agreement.'</td></tr></table>';
            echo '<form  action="http://140.117.13.70/olprs/step2-e-01.asp" method="post" name="form1">
              <input type="hidden" name="unitname" value="Office of Secretariat">
              <input type="hidden" name="unit2"    value="04KP0089;University Development Fund;1490">
              <input type="hidden" name="amount"   value="'.$money.'">
              <input type="hidden" name="currency" value="USD">
              <input type="hidden" name="uname"    value="'.$name.'">
              <input type="hidden" name="TitleName"    value="'.$company.'">
            </form>
            <button type="submit" class="btn btn-primary btn-block" onclick="form1_submit()">OK, submit!</button></br>';
            
            }
            
            }else{
            echo '<h1 class="text-center">Error!Please try again!</h1>';
            //echo '<meta http-equiv=REFRESH CONTENT=;url=donate_form.php>';
            
            }
            ?><!--<p  class="text-center"><a href="https://ufrc-donation-techord.c9.io/ufrc/donate_form.html">Donate again</a></p>-->
          </div>
          
        </div>
      </div>
      <script>
      function myFunction() {
      window.print();
      }
      function goBack() {
      window.history.back();
      }
      function form1_submit()
      {
      form1.submit();
      }
      </script>
      </br>
      <p class="text-center"><button  onclick="goBack()">Go back</button></p>
      <p class="text-center"><button  onclick="myFunction()">Print this page</button></p>
    </body>
  </html>