<?php 
    session_start();
?>
 <?php require_once("./includes/header.php");   ?>
        <header>
            <a href="#" class="logo">Book<span>.</span></a>
           <div class="menuToggle" onclick="toggleMenu();"></div>
            <ul class="navigation">
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

        <!-- Login Part Popup (Starting) -->
        <div class="login-part">
            <div id='login-form'class='login-page'>
                <div class="form-box">
                    <div class='button-box'>
                        <div id='btn'></div>
                        <button type='button'onclick='login()'class='toggle-btn'>Log In</button>
                        <button type='button'onclick='register()'class='toggle-btn'>Signup</button>
                        <button type='button'onclick='closeWindow()'class='special-btn close-btn'>x</button>
                    </div>
                    <form id='login' class='input-group-login' method="POST" action="includes/login.php">
                        <input type='text'class='input-field' name='lemail' placeholder='Email Id' required >
                        <input type='password'class='input-field' name='lpass' placeholder='Enter Password' required>
                        <br><br>
                         <h4>Don't have account go to signup</h4><br><br>
                        <button type='submit' name='lsubmit' class='submit-btn'>Log in</button>
                    </form>
                    <form id='register' class='input-group-register' method="POST" action="includes/signup.php">
                        <input type='text'class='input-field' name='uname' placeholder='Username' required>
                        <input type='email'class='input-field' name='semail' placeholder='Email Id' required>
                        <input type='textarea'class='input-field' name='address' placeholder='Address' required>
                        <input type='tel'class='input-field' name='phone' placeholder='Phone Number' required>
                        <input type='password'class='input-field' name='password' placeholder='Enter Password' required>
                        <input type='password'class='input-field' name='cpassword' placeholder='Confirm Password'  required>
                        <input type='checkbox'class='check-box' required><span>I agree to the terms and conditions</span>
                        <button type='submit' name='ssubmit' class='submit-btn'>Signup</button>
                    </form>

                    <?php 
                        if(isset($_GET['error']))
                        {
                            if($_GET['error'] == "invaliduser") {
                                ?>
                                <script>alert("Invalid Name");</script>
                                <?php
                            }
                            else if($_GET["error"] == "invalidphone") {
                                ?>
                                <script>alert("Invalid Phone number");</script>
                                <?php
                            }
                            else if($_GET["error"] == "wrongpass") {
                                ?>
                                <script>alert("Password doesn't match");</script>
                                <?php
                            }
                            else if($_GET["error"] == "emailTaken") {
                                ?>
                                <script>alert("Email already taken");</script>
                                <?php
                            }
                            else if($_GET["error"] == "createfailed") {
                                ?>
                                <script>alert("Error in database");</script>
                                <?php
                            }
                            else if($_GET["error"] == "none"){
                                ?>
                                <script>alert("Success");</script>
                                <?php
                            }
                            else if($_GET["error"] == "wrongloginpass"){
                                ?>
                                <script>alert("Password is Incorrect");</script>
                                <?php
                            }
                            else if($_GET["error"] == "wrongloginemail"){
                                ?>
                                <script>alert("Email is Incorrect");</script>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>

        <!-- (Ending) -->
       
        <section class="banner" id='banner'>
            <div class="content">
                <h2>Always choose good</h2>
                <p>he latest tech news about the world's best (and sometimes worst) hardware, apps, and much more. From top companies like Google and Apple to tiny startups vying for your attention, Verge Tech has the latest in what matters in technology daily.</p>
                <a href="#" class="btn">our menu</a>
            </div>          
        </section>
        <section class="about" id="about">
            <div class="row">
                <div class="col50">
                    <h2 class="titleText"><span>A</span>bout us</h2>
                    <p>he latest tech news about the world's best (and sometimes worst) hardware, apps, and much more. From top companies like Google and Apple to tiny startups vying for your attention, Verge Tech has the latest in what matters in technology daily.<br><br>he latest tech news about the world's best (and sometimes worst) hardware, apps, and much more. From top companies like Google and Apple to tiny startups vying for your attention, Verge Tech has the latest in what matters in technology daily.</p>
                </div>
                <div class="col50">
                    <div class="imgBx">
                        <img src="images/2.jpg" alt="image">
                    </div>
                </div>
            </div>
        </section>

        <section class="menu" id="menu">
            <div class="title">
                <h2 class="titleText">Our <span>M</span>enu</h2>
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

        <section class="contact" id="contact">
            <div class="title white">
                <h2 class="titleText"><span>C</span>ontact us</h2>
                <p>he latest tech news about the world's best (and sometimes worst) hardware, apps, and much more.</p>
            </div>
            <div class="contactForm">
                <h3>Send message</h3>
                <div class="inputBox">
                    <input type="text" placeholder="Name">
                </div>
                <div class="inputBox">
                    <input type="text" placeholder="Email">
                </div>
                <div class="inputBox">
                    <textarea placeholder="message"></textarea>
                </div>
                <div class="inputBox">
                    <input type="submit" placeholder="Send">
                </div>
            </div>
        </section>

        <script type="text/javascript">
            window.addEventListener('scroll',function(){
                const header = document.querySelector('header');
                header.classList.toggle("sticky",window.scrollY > 0);
            });



            function toggleMenu(){
                const menuToggle = document.querySelector('.menuToggle');
                const navigation = document.querySelector('.navigation');
                menuToggle.classList.toggle('active');
                navigation.classList.toggle('active');
            }

            var x=document.getElementById('login');
            var y=document.getElementById('register');
            var z=document.getElementById('btn');
    
            function register()
            {
                x.style.left='-400px';
                y.style.left='50px';
                z.style.left='110px';
            }
            function login()
            {
                x.style.left='50px';
                y.style.left='450px';
                z.style.left='0px';
            }
    
            
            let modal = document.getElementById('login-form');
            let closeBtn = document.querySelector(".close-btn");
            closeBtn.addEventListener('click',function(e){
                modal.style.display = "none";
            })
            
            
        </script>
 

    </body>
</html>