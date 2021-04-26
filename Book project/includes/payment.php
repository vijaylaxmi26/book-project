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

        $sqlbefore = "SELECT product_price FROM products WHERE product_id = '$key'";
        $resultbefore = mysqli_query($conn, $sqlbefore);
        if(!$resultbefore){
            die(mysqli_error($conn));
        }
        while($rows=mysqli_fetch_assoc($resultbefore)){ 
            $price = $rows['product_price'];
        }
        $price = $price*$pro_qty;
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
        
        
        $sql = "INSERT INTO `orders`( `order_add`, `order_pincode`, `total_price`, `order_qty`, `p_id`, `user_id`) VALUES ('$address','$pin','$price','$pro_qty','$pro_id','$user_id')";
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
