<?php 
include 'commonfunctions.php';
include 'database.php';
if(isset($_POST['login'])){
	$sql = "SELECT * from user where email='".$_POST['email']."' and password= '".md5($_POST['password'])."'";
	$res = getquery($sql,$conn);
	if($res){
		session_start();
		$_SESSION['email'] = $res[1]['email'];
		$_SESSION['id'] = $res[1]['id'];
		header('Location: ../welcome.php');
	}
}
if(isset($_POST['register'])){
	$sql = "INSERT INTO  `user`(`name`, `email`, `password`)Values('".$_POST['name']."','".$_POST['email']."','".md5($_POST['password'])."')";
	$res = getquery($sql,$conn,true);
	if($res){
		session_start();
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['id'] = mysqli_insert_id($con);
		header('Location: ../welcome.php');
	}
}
if(isset($_POST['addqnty'])){
	$sql ='UPDATE cart set quanttity='.$_POST['Quantity'].' where id='.$_POST['cart_id'].' ';
	$res=getquery($sql,$conn,true);
	echo json_encode(array('res'=>$res));
}
if(isset($_POST['placeOrder'])){
	$orders= $_POST['orders'];
	$values=array();
	$cart_id=array();
	foreach($orders as $value){
        $str="('".$value['product']."',".$value['cart_id'].")";
        array_push($values, $str);
        array_push($cart_id, $value['cart_id']);
    }
     $values= implode($values,",");
     $cart_id= implode($cart_id,",");

    $sql = "INSERT INTO orders (`product_id`,`cart_id`)VALUES$values";
     $res = getquery($sql,$conn,true);
     if($res){
     	$res=getquery('UPDATE cart set active=0 where id IN ('.$cart_id.')',$conn,true);
     	echo json_encode(array('result'=>$res));
     }

}

?>