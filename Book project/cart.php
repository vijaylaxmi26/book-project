<?php  require_once("./includes/db1.php"); 
        
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Book Store</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        
        <style>
        header {
            background-color: #17e3b0;
          
        }
        *{
            font: normal;
           
        }
        .space {
            height: 50px;
            width: 100%;
        }
        .col-lg-4,.col-lg-7 {
            margin: 10px;
        }
        
        .row  {
            margin: 13px;
        }
        
        .card {
            padding: 7px;
        }
        ul li {
            list-style: none;
        }
        .btn {
            font-size: 0.7rem;
            background-color: #057BFF;
            padding: 5px;
            margin-top: 0;
            letter-spacing: normal;
        }
        .btn:hover {
            letter-spacing: normal;
        }
        .form-outline{
            display: flex;
        }
        .form-outline input {
            width: 90%;
        }
        .quantity {
            width: 30%;
        }
        .number-input {
            margin-left: 10%;
        }
        .fa {
            padding: 5px;
            outline: none;
            border: none;
        }
        #passwordHelpBlock {
            margin-left: 40%;
        }
        
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/cart.js"></script>
      
    </head>
    <body>
        <?php include 'includes/navigation.php' ?>
        
        <div class="space"></div>

        <!--Section: Block Content-->
        <section>

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-lg-7">

                    <!-- Card -->
                    <div class="mb-3">
                        <div class="pt-4 wish-list">

                        <h5 class="mb-4">Cart (<span><?php echo $totalProduct;?></span> items)</h5>

                        <?php 
                            $price = 0;
                            foreach($_SESSION['cart'] as $key=>$value){
                                $sql_query = "select * from products,category where products.product_id='$key' and products.cat_id = category.id order by products.product_id asc";
                                $stmts =$pdo->prepare($sql_query);
                                $stmts->execute();
                                
                                while($products=$stmts->fetch(PDO::FETCH_ASSOC)){
                                    $price += $_SESSION['cart'][$key]['qty']*$products['product_price'];
                        
                    
                        ?>
                                <div class="row mb-4">
                                    <div class="col-md-5 col-lg-3 col-xl-3">
                                        <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                            <img class="img-fluid w-100" src="admin/image/<?php echo $products['product_photo'];?>" alt="Sample">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-lg-9 col-xl-9">
                                        <div>
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h5><?php echo $products['product_name'];?></h5>
                                                    <p class="mb-3 text-muted text-uppercase small"><?php echo $products['cat_type'];?></p>
                                                    <p class="mb-2 text-muted text-uppercase small">Rating: <?php echo $products['product_rating'];?></p>
                                                    
                                                </div>
                                                <div class="quantity-add-class">
                                                    <div class="def-number-input number-input safari_only mb-0 w-100">
                                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus decrease"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                                        <input id="<?php echo $key;?>qty-input" class="quantity" min="0" max="<?php echo $products['product_quantity']?>" name="quantity" type="number" value="<?php echo $_SESSION['cart'][$key]['qty']?>">
                                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus increase"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                    </div>
                                                    <small id="passwordHelpBlock" class="form-text text-muted text-center">
                                                        
                                                        <span><?php echo $_SESSION['cart'][$key]['qty']?> piece </span>
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <a href="javascript:void(0)" onclick="manage_cart(<?php echo $key;?>,'remove')" type="button" class="card-link-secondary small text-uppercase mr-3"><i class="fas fa-trash-alt mr-1"></i> Remove item </a>
                                                    <a href="javascript:void(0)" onclick="manage_cart(<?php echo $key;?>,'update')" type="button" class="card-link-secondary small text-uppercase mr-3"><i class="fas fa-pen mr-1" aria-hidden="true"></i>Update</a>
                                    
                                                </div>
                                                <p class="mb-0"><span><strong id="summary">£<?php echo $products['product_price'];?></strong></span></p class="mb-0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-4">


                        <?php

                                }
                            }

                        ?>

                            
                            


                    
                            <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Do not delay the purchase, adding
                            items to your cart does not mean booking them.</p>

                        </div>
                    </div>
                    <!-- Card -->

                    <!-- Card -->
                    <!-- <div class="mb-3">
                        <div class="pt-4">

                            <h5 class="mb-4">Expected shipping delivery</h5>

                            <p class="mb-0"> Thu., 12.03. - Mon., 16.03.</p>
                        </div>
                    </div> -->
                    <!-- Card -->

                    <!-- Card -->
                    <div class="mb-3">
                        <div class="pt-4">

                            <h5 class="mb-4">We accept</h5>

                            <img class="mr-2" width="45px" src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg" alt="Visa">
                            <img class="mr-2" width="45px"src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg" alt="American Express">
                            <img class="mr-2" width="45px"src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg" alt="Mastercard">
                            <img class="mr-2" width="45px"src="https://mdbootstrap.com/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.png" alt="PayPal acceptance mark">
                        </div>
                    </div>
                    <!-- Card -->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4">

                    <!-- Card -->
                    <div class="mb-3">
                        <div class="pt-4">

                            <h5 class="mb-3">The total amount of</h5>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Temporary amount
                                    <span>£<?php echo number_format($price);?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Shipping
                                    <span>£0</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>The total amount of</strong>
                                        <strong>
                                            <p class="mb-0">(including VAT)</p>
                                        </strong>
                                    </div>
                                        <span><strong>£<?php $_SESSION['amount'] = $price; echo number_format($price);?></strong></span>
                                </li>
                            </ul>

                            <a href="includes/checkout.php"><button type="button" class="btn btn-primary btn-block">go to checkout</button></a>

                        </div>
                    </div>
                

                </div>
            <!--Grid column-->
            </div>

        </section>
        <!--Section: Block Content-->
    </body>
</html>