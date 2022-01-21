<?php
  $user id = $_POST['user id'];
  $password = $_POST['password'];
  echo $user id;
  //database connection here
   $conn = new mysqli('127.0.0.1','root','','login');
   if($conn->connect_error){
       die('connection failed:'.$conn->connect_error);
   }
   else{
       $stmt=$conn->prepare("insert into login page(user id,password) values(?,?)");
       $stmt->bind_param("ss",$user id,$password);
       $stmt->execute();
       echo "login Sussesfull.."
       $stmt->close();
       $conn->close();
   }
?>