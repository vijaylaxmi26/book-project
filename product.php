<?php require_once("./includes/header.php");   ?>


<header>
            <a href="#" class="logo" style="color:black">Book<span>.</span></a>
           <div class="menuToggle" onclick="toggleMenu();"></div>
            <ul class="navigation"  >
                <li><a href="#banner">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#expert">Expert</a></li>
                <li><a href="#testimonials">Testimonials</a></li>
                <li><a href="#contact">Contact</a></li>
                <?php 
                    if(isset($_SESSION['sno'])) {
                        echo "<li><a href='#'>Profile</a></li>";
                        echo "<li><a href='includes/logout.php'>Logout</a></li>";
                    }
                    else {
                        echo "<li><a href='#' id='loginv' class='loginbtn' onclick=\"document.getElementById('login-form').style.display='block'; \" style='width:auto;'>Login</a></li> ";
                    }
          
                ?>
                <!-- <li><a href="#" id="loginv" class='loginbtn' onclick="document.getElementById('login-form').style.display='block'; " style="width:auto;">Login</a></li>  -->
                <!-- <li><a href="userdashb.php" id="profile" >Profile</a></li> -->
            </ul>
</header>

<section class="menu" id="menu">
            <div class="title">
                <h2 class="titleText">Our <span>P</span>roduct</h2>
                <p>he latest tech news about the world's best (and sometimes worst) hardware, apps, and much more.</p>
            </div>
            <div class="content">
            <?php

               $sql ="select * from product";
               $stmt =$pdo->prepare($sql);
               $stmt->execute();
               
               while($posts=$stmt->fetch(PDO::FETCH_ASSOC)){
                   $product_name =$posts['product_name'];
                   $product_detail=substr($posts['product_discription'],0,140) ;
                   $product_photo = $posts['product_photo'];
                   $product_rating = $posts['product_rating'];
                   $product_price = $posts['product_price'];
                    
                   ?>
                       
                        <div class="box">
                            <div class="imgBx">
                               <img src="images/<?php echo $product_photo ?>" alt="<?php echo $product_photo ?>">
                            </div>
                            <div class="text">
                                <h3><?php echo $product_name ?></h3>
                                <p class="card-text" style="font-size:12px;"><?php echo $product_detail ?></p>
                            </div>
                            <div style="color: rgb(108, 192, 83); font-size:11px;">
                                <h3>Product rating :: <?php echo $product_rating ?></h3>
                            </div>
                        </div>

                   <?php
               }

            ?>
               
            </div>
            
        </section>
<?php require_once("./includes/footer.php");   ?>