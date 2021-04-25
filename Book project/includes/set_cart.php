<?php

    session_start();

    require('db1.php');
    require('add_to_cart.php');

    $pid = $_POST['pid'];
    $qty = $_POST['qty'];
    $types = $_POST['type'];

    $obj = new add_to_cart();

    if($types == "add"){
        $obj->addProduct($pid,$qty);
    }
    if($types == "update"){
        $obj->updateProduct($pid,$qty);
    }
    if($types == "remove"){
        $obj->removeProduct($pid);
    }
    echo count($_SESSION['cart']);
    
?>