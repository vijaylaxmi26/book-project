<?php
session_start();
include('db.php');


if(isset($_POST['pin-submit'])){

    $pin = $_POST['pincode'];
    $email = $_SESSION['useremail'];
    $query = "SELECT * FROM usersignup WHERE email = '$email'";
    $res = mysqli_query($conn,$query);

    while($users=mysqli_fetch_assoc($res)){
        $address = $users['addr'];
        $user_id = $users['sno'];
    }

    // echo $address;
    // echo "<br>";
    // echo $user_id;
    // echo "<br>";
    // echo $pin;
    // echo "<br>";
    // echo $email;

    foreach($_SESSION['cart'] as $key=>$value){
        
        $pro_id = $key;
        $pro_qty = $_SESSION['cart'][$key]['qty'];

        // echo $pro_id;
        // echo "<br>";
        // echo $pro_qty;
        // echo "<br>";
        // echo $pin;
        // echo "<br>";
        // echo $email;
        // echo "<br>";
        // echo $user_id;
        // echo "<br>";
        // echo $address;
        // echo "<br>";
        
        
        $sql = "INSERT INTO `orders`(`order_add`, `order_pincode`, `order_qty`, `email`,`p_id`, `user_id`,`status`) VALUES ('$address','$pin','$pro_qty','$email','$pro_id','$user_id','pending')";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            die(mysqli_error($conn));
        }
    }

    unset($_SESSION['cart']);
    
    header('location: ../index.php?error=orderdone');
    exit();

}
else {
    header('location: ../pay.php?error=pininvalid');
    exit();
}
