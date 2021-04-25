<?php
include('db1.php');
if(isset($_SESSION['useremail'])){
    header('location: ../pay.php');
    exit();
}
else {
    
    header('location: ../index.php?error=loginfirst');
    exit();
   
}

