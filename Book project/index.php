<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Book Store</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">

      
    </head>
    <body>

 <?php
   include 'db.php';

   if(isset($_POST['lsubmit'])){
       $lemail=$_POST['lemail'];
       $lpass=$_POST['lpass'];

       $emailcheck ="select *  from usersignup where email='$lemail' ";
       $row= mysqli_query($conn,$emailcheck);
       $num = mysqli_num_rows($row);
       if($num>0){
           $data = mysqli_fetch_assoc($row);
           $dpass=$data['pass'];
           $passmatch = password_verify($lpass,$dpass);
           if($passmatch){
            ?>
            <script>
                 alert("you have succuessfuly login!!");
            </script>
             <?php
           }else{
            ?>
            <script>
                 alert("Incorect Password!!");
            </script>
             <?php
           }
       }else{
        ?>
        <script>
             alert("Email not exsist!!");
        </script>
         <?php

       }
   }

   if(isset($_POST['ssubmit'])){
     $username=mysqli_real_escape_string($conn,$_POST['uname']);
     $email=mysqli_real_escape_string($conn,$_POST['semail']);
     $address=mysqli_real_escape_string($conn,$_POST['address']);
     $phone =mysqli_real_escape_string($conn,$_POST['phone']);
     $password=mysqli_real_escape_string($conn,$_POST['password']);
     $cpassword=mysqli_real_escape_string($conn,$_POST['cpassword']);

     $pass=password_hash($password, PASSWORD_BCRYPT);
     $cpass=password_hash($cpassword, PASSWORD_BCRYPT);

      $emailmatch="select * from usersignup where email='$email'";
      $row= mysqli_query($conn,$emailmatch);
      $num = mysqli_num_rows($row);
      if($num>0){
        ?>
           <script>
                alert("Email already exsist!!");
           </script>
        <?php
      }else{
        if($password === $cpassword){
          $query="INSERT INTO usersignup( username, email, addr, phone, pass, cpassword ) VALUES ('$username','$email','$address','$phone','$pass','$cpass')";
          $result= mysqli_query($conn,$query);
          if($result){
            ?>
            <script>
                 alert("you have successfully signup!!");
            </script>
            <?php
          } 
        }else{
          ?>
           <script>
                alert("Password not mathcing!!");
           </script>
        <?php
        }
      }
   }
  
?>
     
        
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
                <li><a href="#" class='loginbtn' onclick="document.getElementById('login-form').style.display='block'; " style="width:auto;">Login</a></li>
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
                    <form id='login' class='input-group-login' method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type='text'class='input-field' name='lemail' placeholder='Email Id' required >
                        <input type='password'class='input-field' name='lpass' placeholder='Enter Password' required>
                        <br><br>
                         <h4>Don't have account go to signup</h4><br><br>
                        <button type='submit' name='lsubmit' class='submit-btn'>Log in</button>
                    </form>
                    <form id='register' class='input-group-register' method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type='text'class='input-field' name='uname' placeholder='Username' required>
                        <input type='email'class='input-field' name='semail' placeholder='Email Id' required>
                        <input type='textarea'class='input-field' name='address' placeholder='Address' required>
                        <input type='tel'class='input-field' name='phone' placeholder='Phone Number' required>
                        <input type='password'class='input-field' name='password' placeholder='Enter Password' required>
                        <input type='password'class='input-field' name='cpassword' placeholder='Confirm Password'  required>
                        <input type='checkbox'class='check-box' required><span>I agree to the terms and conditions</span>
                        <button type='submit' name='ssubmit' class='submit-btn'>Signup</button>
                    </form>
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
                <div class="box">
                    <div class="imgBx">
                        <img src="images/book1.jpg" alt="image">
                    </div>
                    <div class="text">
                        <h3>Your Soul is a River</h3>
                    </div>
                </div>

                <div class="box">
                    <div class="imgBx">
                        <img src="images/book2.jpg" alt="image">
                    </div>
                    <div class="text">
                        <h3>NeuroLogic</h3>
                    </div>
                </div>

                <div class="box">
                    <div class="imgBx">
                        <img src="images/book3.jpg" alt="image">
                    </div>
                    <div class="text">
                        <h3>Grahic Design</h3>
                    </div>
                </div>

                <div class="box">
                    <div class="imgBx">
                        <img src="images/book4.jpg" alt="image">
                    </div>
                    <div class="text">
                        <h3>The passion</h3>
                    </div>
                </div>

                <div class="box">
                    <div class="imgBx">
                        <img src="images/book5.jpg" alt="image">
                    </div>
                    <div class="text">
                        <h3>Face it Debbie Harry</h3>
                    </div>
                </div>

                <div class="box">
                    <div class="imgBx">
                        <img src="images/book6.jpg" alt="image">
                    </div>
                    <div class="text">
                        <h3>Women</h3>
                    </div>
                </div>

            </div>

            <div class="title">
                 <a href="#" class="btn">view All</a>
            </div>
            
        </section>

        <section class="expert" id="expert">
            <div class="title">
                <h2 class="titleText">Our Authors <span>E</span>xpert</h2>
                <p>he latest tech news about the world's best (and sometimes worst) hardware, apps, and much more.</p>
            </div>
            <div class="content">
                <div class="box">
                    <div class="imgBx">
                        <img src="images/a1.jpg" alt="image">
                    </div>
                    <div class="text">
                        <h2>Methali</h2>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="images/a2.jpg" alt="image">
                    </div>
                    <div class="text">
                        <h2>Jaina</h2>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="images/a3.jpg" alt="image">
                    </div>
                    <div class="text">
                        <h2>Steve</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="images/4.jpg" alt="image">
                    </div>
                    <div class="text">
                        <h2>Ann</h3>
                    </div>
                </div>
                 
            </div>
        </section>

        <section class="testimonials" id="testimonials">
            <div class="title white">
                <h2 class="titleText">They <span>S</span>aid About us</h2>
                <p>he latest tech news about the world's best (and sometimes worst) hardware, apps, and much more.</p>
            </div>
            <div class="content">
                <div class="box">
                    <div class="imgBx">
                        <img src="images/5.jpg" alt="image">
                    </div>
                    <div class="text">
                       <p>he latest tech news about the world's best (and sometimes worst) hardware, apps, and much more.he latest tech news about the world's best (and sometimes worst) hardware, apps, and much more.he latest tech news about the world's best (and sometimes worst) hardware, apps, and much more.he latest tech news about the world's best (and sometimes worst).</p>
                       <h3>Someone Famous</h3>
                    </div>                  
                </div> 

                <div class="box">
                    <div class="imgBx">
                        <img src="images/5.jpg" alt="image">
                    </div>
                    <div class="text">
                       <p>he latest tech news about the world's best (and sometimes worst) hardware, apps, and much more.he latest tech news about the world's best (and sometimes worst) hardware, apps, and much more.he latest tech news about the world's best (and sometimes worst) hardware, apps, and much more.he latest tech news about the world's best (and sometimes worst).</p>
                       <h3>Someone Famous</h3>
                    </div>                  
                </div>    

                <div class="box">
                    <div class="imgBx">
                        <img src="images/5.jpg" alt="image">
                    </div>
                    <div class="text">
                       <p>he latest tech news about the world's best (and sometimes worst) hardware, apps, and much more.he latest tech news about the world's best (and sometimes worst) hardware, apps, and much more.he latest tech news about the world's best (and sometimes worst) hardware, apps, and much more.he latest tech news about the world's best (and sometimes worst).</p>
                       <h3>Someone Famous</h3>
                    </div>                  
                </div> 
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