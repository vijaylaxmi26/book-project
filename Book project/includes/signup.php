<?php 

if(isset($_POST['ssubmit']))
{
    $username=$_POST['uname'];
    $email=$_POST['semail'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];



    include 'db.php';
    require_once 'functions.php';



    if(invalidUid($username) != false) {
        header("location: ../index.php?error=invaliduser");
        exit();
    }

    if(invalidPhone($phone) != false) {
        header("location: ../index.php?error=invalidphone");
        exit();
    }

    if(pwdMatch($password,$cpassword) != false) {
        header("location: ../index.php?error=wrongpass");
        exit();
    }

    if(emailExists($conn,$email) != false) {
        header("location: ../index.php?error=emailTaken");
        exit();
    }

    $query="INSERT INTO usersignup(username, email, addr, phone, pass, cpassword) VALUES (?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../index.php?error=createfailed");
        exit();
    }
    
    $pass = password_hash($password, PASSWORD_DEFAULT);
    $cpass = $pass;
     
    mysqli_stmt_bind_param($stmt, "ssssss", $username, $email, $address, $phone, $pass, $cpass);
    
    

    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    
    header("location: ../index.php?error=none");
    exit();
}
else {
    echo "PRoblem";
}
?>

