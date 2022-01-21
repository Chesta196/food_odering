<?php 
include 'commonfunctions.php';
include 'database.php';
if(isset($_POST['login'])){
	$sql = "SELECT * from user where email='".$_POST['email']."' and password= '".md5($_POST['password'])."'";
	$res = getquery($sql,$conn);
	if($res){
		session_start();
		$_SESSION['email'] = $res[1]['email'];
		header('Location: ../welcome.php');
	}
}
if(isset($_POST['register'])){
	$sql = "INSERT INTO  `user`(`name`, `email`, `password`)Values('".$_POST['name']."','".$_POST['email']."','".md5($_POST['password'])."')";
	$res = getquery($sql,$conn,true);
	if($res){
		session_start();
		$_SESSION['email'] = $_POST['email'];
		header('Location: ../welcome.php');
	}
}

?>