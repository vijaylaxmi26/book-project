<?php
include('db1.php');
if(isset($_POST['lsubmit'])){
    $email = $_POST['lemail'];
    $password = $_POST['lpass'];

    $sql = "SELECT count(*) FROM usersignup WHERE email = :email AND pass = :pass";

    $stmt1 = $pdo->prepare($sql);
    $stmt1->bindParam(':email',$email);
    $stmt1->bindParam(':pass',$password);

    
    $stmt1->execute();

    if(!$stmt1){
        header('location: ../index.php?error=servererror');
        exit();
    }

    $row = $stmt1->fetch(PDO::FETCH_ASSOC)['count(*)'];
    if($row > 0)
    {
        $_SESSION['useremail'] = $email;
        header('location: ../index.php');
        exit();
    }
    else {
        header('location: ../index.php?error=wronglogin');
        exit();
    }
    
}