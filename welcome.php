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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Responsive Food Website Design Tutorial</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="addtoCart.css">
</head>
<body>
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

<!-- header section ends-->

<!-- search form  -->

<form action="" id="search-form">
    <input type="search" placeholder="search here..." name="" id="search-box">
    <label for="search-box" class="fas fa-search"></label>
    <i class="fas fa-times" id="close"></i>
</form>

<!-- home section starts  -->
<section id="homeside">
     <div class="container">
         <div class="inner">
             <h1>Welcome</h1>
         </div>
     </div>
</section>
<section class="home" id="home">
    
    <div class="swiper-container home-slider">

        <div class="swiper-wrapper wrapper">

            <div class="swiper-slide slide">
                <div class="content">
                    <span> <i><b>Resturant area</b></i> </span>
                    <h3><i> Facade Area </i> </h3>
                    </div>
                        <div class="image">
                            <img src="facade.jpg" alt="Facade Area ">
                        </div>
            </div>
            <div class="swiper-slide slide">
                <div class="content">
                    <span> <i><b>Resturant area</b></i> </span>
                    <h3><i>  Parking Area </i> </h3>
                        <p>  </p>
                    </div>
                        <div class="image">
                            <img src="parking area.jpg" alt=" Parking Area ">
                        </div>
            </div>
            <div class="swiper-slide slide">
                <div class="content">
                    <span> <i><b>Resturant area</b></i> </span>
                    <h3><i>  Meeting Area </i> </h3>
                        <p>  </p>
                    </div>
                        <div class="image">
                            <img src="meeting area.jpg" alt=" Meeting Area ">
                        </div>
            </div>

            <div class="swiper-slide slide">
                <div class="content">
                    <span><i><b>Restaurant Area</b></i> </span>
                    <h3> <i>Hall Dining Area</i></h3>
                     
                </div>
                <div class="image">
                    <img src="hall dining area.jpg" alt="Front Area">
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="content">
                    <span> <i><b>Resturant area</b></i> </span>
                    <h3><i>Family Dining Area</i> </h3>
                    <p>  </p>
                     
                </div>
                 <div class="image">
                    <img src="family dining area.jpg" alt="Side View">
                </div>
            
                
            </div>
            <div class="swiper-pagination"></div>

        </div> 
    </div>

</section>
<hr>
<!-- menu section starts  -->

<section class="menu" id="menu">

    <h1 class="sub-heading"> our menu </h1>

<h1 class="heading"> MORNING AND EVENING SNACKS </h1>
    <?php 
        $res = getquery("SELECT * from products where categoryid=1",$conn);
        foreach ($res as $key => $value) {?>
    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="<?php echo $value['image']; ?>" alt="">
                <a href="#" class="fas fa-heart"></a>
            </div>
            <div class="content">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            <h3><?php echo $value['product_name'] ?></h3>
            <a href="#" class="btn" product_id=<?php echo $value['id'] ?>> add to cart</a>
            <span class="price"> 
                <i class ="fas fa-rupee-sign"><?php echo $value['price'] ?></i>
            </span>
    
        </div>
    </div>
    <?php
            # code...
        }
     ?>

</section>

<!-- menu section starts  -->

<section class="menu" id="menu">


    <h1 class="heading">TODAY'S EXCLUSIVE DISHES</h1>

    <div class="heading"> MORNING AND EVENING SNACKS </h1>
    <?php 
        $res = getquery("SELECT * from products where categoryid=2",$conn);
        foreach ($res as $key => $value) {?>
    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="<?php echo $value['image']; ?>" alt="">
                <a href="#" class="fas fa-heart"></a>
            </div>
            <div class="content">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            <h3><?php echo $value['product_name'] ?></h3>
            <a href="#" class="btn" product_id=<?php echo $value['id'] ?>> add to cart</a>
            <span class="price"> 
                <i class ="fas fa-rupee-sign"><?php echo $value['price'] ?></i>
            </span>
    
        </div>
    </div>
    <?php
            # code...
        }
     ?>

</section>    

<section class="menu" id="menu">


    <h1 class="sub-heading"> Main menu </h1>
    <h1 class="heading"> SABGIYA </h1>

 <?php 
        $res = getquery("SELECT * from products where categoryid=3",$conn);
        foreach ($res as $key => $value) {?>
    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="<?php echo $value['image']; ?>" alt="">
                <a href="#" class="fas fa-heart"></a>
            </div>
            <div class="content">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            <h3><?php echo $value['product_name'] ?></h3>
            <a href="#" class="btn" product_id=<?php echo $value['id'] ?>> add to cart</a>
            <span class="price"> 
                <i class ="fas fa-rupee-sign"><?php echo $value['price'] ?></i>
            </span>
    
        </div>
    </div>
    <?php
            # code...
        }
     ?>
</section>
<section class="menu" id="menu">


    <h1 class="heading"> DAAL </h1>
     <?php 
            $res = getquery("SELECT * from products where categoryid=4",$conn);
            foreach ($res as $key => $value) {?>
        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="<?php echo $value['image']; ?>" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                <h3><?php echo $value['product_name'] ?></h3>
                <a href="#" class="btn" product_id=<?php echo $value['id'] ?>> add to cart</a>
                <span class="price"> 
                    <i class ="fas fa-rupee-sign"><?php echo $value['price'] ?></i>
                </span>
        
            </div>
        </div>
        <?php
                # code...
            }
         ?> 

</section>

<section class="menu" id="menu">


    <h1 class="heading"> RICE </h1>
     <?php 
            $res = getquery("SELECT * from products where categoryid=5",$conn);
            foreach ($res as $key => $value) {?>
        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="<?php echo $value['image']; ?>" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                <h3><?php echo $value['product_name'] ?></h3>
                <a href="#" class="btn" product_id=<?php echo $value['id'] ?>> add to cart</a>
                <span class="price"> 
                    <i class ="fas fa-rupee-sign"><?php echo $value['price'] ?></i>
                </span>
        
            </div>
        </div>
        <?php
                # code...
            }
         ?> 

</section>



<section class="menu" id="menu">


    <h1 class="heading"> BREADS</h1>
    
     <?php 
            $res = getquery("SELECT * from products where categoryid=6",$conn);
            foreach ($res as $key => $value) {?>
        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="<?php echo $value['image']; ?>" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                <h3><?php echo $value['product_name'] ?></h3>
                <a href="#" class="btn" product_id=<?php echo $value['id'] ?>> add to cart</a>
                <span class="price"> 
                    <i class ="fas fa-rupee-sign"><?php echo $value['price'] ?></i>
                </span>
        
            </div>
        </div>
        <?php
                # code...
            }
         ?> 
        
    </section>


    <section class="menu" id="menu">


        <h1 class="heading"> SIDES & SALADS</h1>
        
        <?php 
            $res = getquery("SELECT * from products where categoryid=7",$conn);
            foreach ($res as $key => $value) {?>
        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="<?php echo $value['image']; ?>" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                <h3><?php echo $value['product_name'] ?></h3>
                <a href="#" class="btn" product_id=<?php echo $value['id'] ?>> add to cart</a>
                <span class="price"> 
                    <i class ="fas fa-rupee-sign"><?php echo $value['price'] ?></i>
                </span>
        
            </div>
        </div>
        <?php
                # code...
            }
         ?> 
    </section>        
        
    
    <section class="menu" id="menu">


        <h1 class="heading"> SWEET DISHES</h1>
        <?php 
            $res = getquery("SELECT * from products where categoryid=8",$conn);
            foreach ($res as $key => $value) {?>
        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="<?php echo $value['image']; ?>" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                <h3><?php echo $value['product_name'] ?></h3>
                <a href="#" class="btn" product_id=<?php echo $value['id'] ?>> add to cart</a>
                <span class="price"> 
                    <i class ="fas fa-rupee-sign"><?php echo $value['price'] ?></i>
                </span>
        
            </div>
        </div>
        <?php
                # code...
            }
         ?> 
    </section>        
   <!--menu section ends -->    
            
<!-- about section starts  -->

<section class="about" id="about">

    <h3 class="sub-heading"> about us </h3>
    <h1 class="heading"> why choose us? </h1>

    <div class="row">

        <div class="image">
            <img src="images/about-img.png" alt="">
        </div>

        <div class="content">
            <h3>best food in the Barabanki</h3>
            <p><b>PANCHWATI DHABA</b> at <b>HAIDERGARH</b> highway makes sure one has a great food experience by offering highly palatable food. 
                The restaurant welcomes guests <b>24<sup>HRS</sup></b> allowing diners to relish a scrumptious meal between the functional hours.
                This listing is also listed in Restaurants, Inexpensive Restaurants (Below Rs 500), Dhaba Restaurants. From a total number of 0+ ratings, 
                the eating house has been rated a 4.5.</br><small>You can reach the restaurant on +(91)-9927559963,8958964721 for any other details.</small></p>

            <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-shipping-fast"></i>
                    <span>free delivery</span>
                </div>
                <div class="icons">
                    <i class="fas fa-rupee-sign"></i>
                    <span>easy payments</span>
                </div>
                <div class="icons">
                    <i class="fas fa-headset"></i>
                    <span>24/7 service</span>
                </div>
            </div>
            <a href="#" class="btn">learn more</a>
        </div>

    </div>

</section>

<!-- about section ends -->
<!-- review section starts  -->

<section class="review" id="review">

    <h3 class="sub-heading"> customer's review </h3>
    <h1 class="heading"> what they say </h1>

    <div class="swiper-container review-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/pic-1.png" alt="">
                    <div class="user-info">
                        <h3>john deo</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
            </div>

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/pic-2.png" alt="">
                    <div class="user-info">
                        <h3>john deo</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
            </div>

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/pic-3.png" alt="">
                    <div class="user-info">
                        <h3>john deo</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
            </div>

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/pic-4.png" alt="">
                    <div class="user-info">
                        <h3>john deo</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
            </div>

        </div>

    </div>
    
</section>

<!-- review section ends -->
<!-- order section starts  -->

<section class="order" id="order">

    <h3 class="sub-heading"> order now </h3>
    <h1 class="heading"> free and fast </h1>

    <form action="">

        <div class="inputBox">
            <div class="input">
                <span>your name</span>
                <input type="text" placeholder="enter your name">
            </div>
            <div class="input">
                <span>your number</span>
                <input type="number" placeholder="enter your number">
            </div>
        </div>
        <div class="inputBox">
            <div class="input">
                <span>your order</span>
                <input type="text" placeholder="enter food name">
            </div>
            <div class="input">
                <span>additional food</span>
                <input type="test" placeholder="extra with food">
            </div>
        </div>
        <div class="inputBox">
            <div class="input">
                <span>how much</span>
                <input type="number" placeholder="how many orders">
            </div>
            <div class="input">
                <span>date and time</span>
                <input type="datetime-local">
            </div>
        </div>
        <div class="inputBox">
            <div class="input">
                <span>your address</span>
                <textarea name="" placeholder="enter your address" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="input">
                <span>your message</span>
                <textarea name="" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="input-group">
            <div class="input-box">
                 <a href="payment mode/payment.html">Proceed to Pay</a>
            </div>
        </div>
    </form>

</section>

<!-- order section ends -->
 

<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>location</h3>
            <a href="#">Barabanki</a>
             
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="#">home</a>
            <a href="#">menu</a>
            <a href="#">about</a>
            <a href="#">order</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#">+(91)-9927559963 </a>
            <a href="#">+(91)-8958964721 </a>
            <a href="#">shaikhanas@gmail.com</a>
            <a href="#">anasbhai@gmail.com</a>
            <a href="#">mumbai, india - 400104</a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#">facebook</a>
            <a href="#">twitter</a>
            <a href="#">instagram</a>
             
        </div>

    </div>

</section>

<!-- footer section ends -->
<script type="text/javascript" src="addtoCart.js"></script>`
<!-- loader part  -->
<div class="loader-container">
    <img src="images/loader.gif" alt="">
</div>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>