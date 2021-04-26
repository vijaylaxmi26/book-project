<?php 

include('add_to_cart.php');

$obj = new add_to_cart();
$totalProduct = $obj->totalProduct();


?>


<header>
            <a href="#" class="logo">Book<span>.</span></a>
           <div class="menuToggle" onclick="toggleMenu();"></div>
            <ul class="navigation">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#about">About Us</a></li>
                <li><a href="product.php">Menu</a></li>
                <!-- <li><a href="#expert">Expert</a></li> -->
                <li><a href="index.php#testimonials">Testimonials</a></li>
                <li><a href="index.php#contact">Contact Us</a></li>
                
                <?php 
                    if(isset($_SESSION['useremail'])) {
                        echo "<li><a href='includes/logout.php'>Logout</a></li>";
                    }
                    else {
                        echo "<li><a href='index.php' id='loginv' class='loginbtn' style='width:auto;'>Login</a></li> ";
                    }
          
                ?>
                <li>
                    <a href="cart.php">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                        <span id="shop-cart-num"><?php echo $totalProduct;?></span>
                    </a>
                </li>
                <!-- <li><a href="#" id="loginv" class='loginbtn' onclick="document.getElementById('login-form').style.display='block'; " style="width:auto;">Login</a></li>  -->
                <!-- <li><a href="userdashb.php" id="profile" >Profile</a></li> -->
            </ul>
        </header>