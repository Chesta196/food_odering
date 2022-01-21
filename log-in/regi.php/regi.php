<?
$first name =$_POST['first name'];
$last name =$_POST['last name'];
$email address =$_POST['email address'];
$password =$_POST['password'];
$confirm password =$_POST['confirm password'];
//database connection here
$conn = new mysqli('127.0.0.1','root','','register');
   if($conn->connect_error){
       die('connection failed:'.$conn->connect_error);
   }
   else{
       $stmt=$conn->prepare("insert into registration(first name,last name,email address,password,confirm password) 
       values(?,?,?,?,?)");
       $stmt->bind_param("sssss",$first name,$last name,$email address,$password,$confirm password);
       $stmt->execute();
       echo "Registration Successfully.."
       $stmt->close();
       $conn->close();
   }
?>