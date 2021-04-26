<?php  require_once("includes/db1.php"); 

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
            height: 150px;
            width: 100%;
        }
        .col-lg-4,.col-md-4 {
            padding: 5px;
            
            margin-top: 5px;
            box-sizing: border-box;
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
            padding: 10px;
            font-weight: 500;
            margin-top: 0;
            letter-spacing: normal;
        }
        .btn:hover {
            letter-spacing: normal;
        }
        .form-outline{
            display: flex;
        }
        .pl-0 input {
            width: 10%;
        }
        
        .fa {
            font-size: 0.9rem;
            padding: 5px;
            outline: white;
            border: white;
        }
        table {
            padding: 50px;
            width: 50%;
        }
        table td{
            padding: 20px;
        }
        section {
            padding: 50px;
        }
        .padding-63{
            padding-left: 64px;
        }
        
        
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/cart.js"></script>
      
    </head>
    <body>
        <?php 
            include 'includes/navigation.php';
        ?>
            <div class="space"></div>
        <?php

            if(isset($_GET['id'])){
                // check for valid id
                $id_display = $_GET['id'];
                $sql = "SELECT count(*), products.*, cat_type from products, category where products.product_id = '$id_display'";
                $stmt =$pdo->prepare($sql);
                $stmt->execute();
                $posts = $stmt->fetch(PDO::FETCH_ASSOC);
                $temp = $posts['count(*)'];
             
                if($temp > 0){
                    $productName = $posts['product_name'];
                    $productPrice = $posts['product_price'];
                    $productImage = $posts['product_photo'];
                    $productRating = floor($posts['product_rating']);
                    $productDes = $posts['product_discription'];
                    $productCategory = $posts['cat_type'];
                    $product_qty = $posts['product_quantity'];
                    
                }
                else {
                    header('location: product.php');
                    exit();
                }
            }
            else {
                header('location: product.php');
                exit();
            }

        ?>

        






        
        <!--Section: Block Content-->
        <section class="margin-bottom-low mb-5">

            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">

                    <div id="mdb-lightbox-ui"></div>

                    <div class="mdb-lightbox">

                    <div class="row product-gallery mx-1">

                        <div class="col-12 mb-0">
                        <figure class="view overlay rounded z-depth-1 main-img">
                            <!-- <a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg"
                            data-size="710x823"> -->
                            <img src="admin/image/<?php echo $productImage; ?>" class="img-fluid z-depth-1">
                            <!-- </a> -->
                        </figure>
                        </div>
             
                    </div>

                    </div>

                </div>
                <div class="col-md-6">

                    <h5><?php echo $productName; ?></h5>
                    <p class="mb-2 text-muted text-uppercase small"><?php echo $productCategory; ?></p>
                    <ul class="d-flex rating">
                    <?php 
                        $tempe = 5-$productRating;
                            while($productRating !=0 )
                            {
                                echo "<li><i class='fas fa-star fa-sm text-primary'></i></li>";
                                $productRating -= 1;
                            }
                            while($tempe != 0)
                            {
                                echo "<li><i class='far fa-star fa-sm text-primary'></i></li>";
                                $tempe -= 1;
                            }        
                    ?>
                    </ul>
                    <p><span class="mr-1"><strong>£<?php echo $productPrice?></strong></span></p>
                    <p class="pt-1"><?php echo $productDes; ?></p>
                    
                    <div class="table-responsive mb-2">
                    <table class="table table-sm table-borderless">
                        <tbody>
                        <tr>
                            
                            <td class="pl-0 pb-0 w-25">Quantity</td>
                            
                        </tr>
                        <tr>
                            
                            <td class="pl-0">
                                <div class="def-number-input number-input safari_only mb-0 w-100">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus decrease"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    <input id="qty-input" class="quantity" min="0" max="<?php echo $product_qty;?>" name="quantity" type="number">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus increase"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                            </td>
                            
                        </tr>
                        </tbody>
                    </table>
                    </div>
                    
                    <a href="javascript:void(0)" onclick="manage_cart(<?php echo $id_display;?>,'add')"><button type="button" class="btn btn-light btn-md mr-1 mb-2"><i class="fas fa-shopping-cart pr-2"></i>Add to cart</button></a>
                    <a href="product.php"><button type="button" class="btn btn-light btn-md mr-1 mb-2"><i class="fas fa-shopping-cart pr-2"></i>Continue Shopping</button></a>
                </div>
            </div>

        </section>
        <!--Section: Block Content-->
        
        
    </body>
</html>
