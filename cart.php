<?php
include 'api/database.php';
include 'api/commonfunctions.php' ;
if(!isset($_SESSION)){
session_start();
}
if(!isset($_SESSION['email']) || $_SESSION['email']==''){
header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <!-- font awesome cdn link  -->

    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> -->

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="addtoCart.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body style="font-size: 2rem;">
<!-- header section starts      -->

<header>
     
    <a href="#" class="logo"><i class="fas fa-utensils"></i>Panchwati Dhaba and Resturant</a>
    <nav class="navbar">
         <a class="active" href="#home">home</a> 
          <a class="active" href="#menu">menu</a> 
         <a class="active" href="#about">about</a> 
         <a class="active" href="#review">review</a> 
         <a class="active" href="#ordernow">order</a>
    </nav>

    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        <i class="fas fa-search" id="search-icon"></i>
        <a href="#" class="fas fa-heart"></a>
        <a href="cart.php" class="fas fa-shopping-cart"></a>
    </div>

</header>
<br>
<br><br><br><br>
<form action="" id="search-form">
    <input type="search" placeholder="search here..." name="" id="search-box">
    <label for="search-box" class="fas fa-search"></label>
    <i class="fas fa-times" id="close"></i>
</form>






<table class="table table-striped">
	<thead>
		<th>Sno</th>
		<th>Product_name</th>
		<th>Quantity</th>
		<th>Total Price</th>

	</thead>
	<?php
	$sql = "SELECT id,price,product_name from products where 1";
	$priceArray = makeArray(getquery($sql,$conn),'id','price');
	$nameArray = makeArray(getquery($sql,$conn),'id','product_name');
	// var_dump($nameArray);

	$sql = "SELECT * from cart where user_id=".$_SESSION['id']." and active =1";
	$res = getquery($sql,$conn);
	// var_dump($res);
	foreach ($res as $key => $value) {?>
		<!-- # code... -->
		<tbody id="ctable">
			<tr>
				<td><?php echo $key; ?></td>
				<td><input type="text"  id="cart_id" cart_id="<?php echo $value['id']; ?>" value="<?php echo $nameArray[$value['product_id']]; ?>" product_id="<?php echo $value['product_id']; ?>" disabled></td>
				<td><input type="number" value="<?php echo $value['quanttity']; ?>"  id="qnty" cart_id="<?php echo $value['id']; ?>" price="<?php echo $priceArray[$value['product_id']]?>" min="1"></td>
				<td ><input type="number"  id="totalPrice" cart_id="<?php echo $value['id']; ?>" value="<?php echo $totalPrice = $priceArray[$value['product_id']]*$value['quanttity'] ?>" ></td>
			</tr>
		</tbody>
	<?php }
	?>
</table>
<div class="coantiner d-flex" style="justify-content: right;">
	<button id="order" class="btn btn-warning " style="    font-size: 1.7rem!important;">
		Place Order
	</button>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
	$(document).on('change','#qnty',function(e){
		var price = $(this).attr('price')
		var  qty = $(this).val()
		var total = price * qty
		// alert(total)
		// debugger;
		var  cart_id = $(this).attr('cart_id')
		$("#ctable").each(function(e) {
			// alert($(this).find('input').attr('id'))
			debugger;

		    if($(this).find('input').attr('cart_id') == cart_id){
		         $(this).find('#totalPrice').val(total)
		       
		    }})
		$.ajax({
			url: "api/server.php",
			type: "POST",
			data:{'cart_id':cart_id,'addqnty':'true','Quantity':qty},
			success: function(data){

			}
		})
		// $(this).pev().css({'boder':'red'})
		// alert($(this).next().css({'boder':'red'}))
	})
	$(document).on('click','#order',function(e){
		var orders=[];
		var total = 0;
		var i=0;
			$("tbody tr").each(function(e) {
			alert($(this).find('#cart_id').val())
			debugger;
			// orders[i]=[];
		        orders[i]={'product': $(this).find('#cart_id').attr('product_id'), 
		        'qnty':  $(this).find('#qnty').val(),
		        'cart_id' : $(this).find('#cart_id').attr('cart_id'),
		        'total' : $(this).find('#totalPrice').val()
		    	}
		    	total = total + parseInt($(this).find('#totalPrice').val())
		       i=i+1;
		    })
		$.ajax({
			url: "api/server.php",
			type: "POST",
			data:{'orders':orders,'placeOrder':'true','price':total},
			success: function(data){

			}
		})
	})
</script>
</html>