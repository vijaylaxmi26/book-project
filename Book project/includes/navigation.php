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