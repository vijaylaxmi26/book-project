<?php
require('db1.php');

if(isset($_POST['ssubmit'])){
    $username = $_POST['uname'];
    $email = $_POST['semail'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // check for password
    if($password != $cpassword){
        header('location: ../index.php?error=passnotmatch');
        exit();
    }

    // check for username
    if(!preg_match("/^[a-zA-Z]+$/",$username)){
        header('location: ../index.php?error=wrongusername');
        exit();
    }

    // // check for phone
    if(!preg_match("/^[6-9][0-9]{9}$/",$phone)) {
        header('location: ../index.php?error=wrongphone');
        exit();
    }

    // check for email
    $sql = "SELECT count(*) FROM usersignup WHERE email = :email";
    $stmt =$pdo->prepare($sql);
    $stmt->bindParam(':email',$email);
    $stmt->execute();

    if(!$stmt){
        header('location: ../index.php?error=servererror');
        exit();
    }

    $rows = $stmt->fetch(PDO::FETCH_ASSOC)['count(*)'];
    if($rows > 0){
        header('location: ../index.php?error=emailexsist');
        exit();
    }

    // if everything is fine, insert the values
    $query = "INSERT INTO `usersignup`(username, email, addr, phone, pass) VALUES (:username, :email, :addr, :phone, :pass)";
    $stmt1 = $pdo->prepare($query);
    
    $stmt1->bindParam(':username',$username);
    $stmt1->bindParam(':email',$email);
    $stmt1->bindParam(':addr',$address);
    $stmt1->bindParam(':phone',$phone);
    $stmt1->bindParam(':pass',$cpassword);

    $stmt1->execute();

    if(!$stmt1){
        header('location: ../index.php?error=servererror');
        exit();
    }

    header('location: ../index.php?error=none');
    exit();
}