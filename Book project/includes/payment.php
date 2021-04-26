<?php
session_start();
include('db.php');


if(isset($_POST['pin-submit']) && $_POST['pincode'] != ''){

    $pin = $_POST['pincode'];
    foreach($_SESSION['cart'] as $key=>$value){
        $str = "rating-".$key;
        $_SESSION['carts']['rating'][$key] = $_POST[$str];
    }

    foreach($_SESSION['cart'] as $key=>$value){
        if($_SESSION['carts']['rating'][$key] > 5 || $_SESSION['carts']['rating'][$key] < 0){
            header('location: ../pay.php?=error=invalidrating');
            exit();
        }
    }

    
    $email = $_SESSION['useremail'];
    $query = "SELECT * FROM usersignup WHERE email = '$email'";
    $res = mysqli_query($conn,$query);

    while($users=mysqli_fetch_assoc($res)){
        $address = $users['addr'];
        $user_id = $users['sno'];
    }

    foreach($_SESSION['cart'] as $key=>$value){
        
        $pro_id = $key;
        $pro_qty = $_SESSION['cart'][$key]['qty'];
        $rating_given = $_SESSION['carts']['rating'][$key];

        $sqlbefore = "SELECT product_price FROM products WHERE product_id = '$key'";
        $resultbefore = mysqli_query($conn, $sqlbefore);
        if(!$resultbefore){
            die(mysqli_error($conn));
        }
        while($rows=mysqli_fetch_assoc($resultbefore)){ 
            $price = $rows['product_price'];
        }
        $price = $price*$pro_qty;
        
        
        $sql = "INSERT INTO `orders`( `order_add`, `order_pincode`, `total_price`,`order_rating`, `order_qty`, `p_id`, `user_id`) VALUES ('$address','$pin','$price','$rating_given','$pro_qty','$pro_id','$user_id')";
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
