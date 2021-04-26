<?php  require_once("./includes/db1.php"); ?>

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
            background-color:#17e3b0;
          
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
            decoration:none;
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
        
        </style>
      
    </head>
    <body>
        <?php include 'includes/navigation.php' ?>
        
        <div class="space"></div>
        <div class="row">
            <div class="col-lg-2 col-xs-12">
                <?php include 'includes/categories-side.php' ?>  
            </div>
            <div class="col-lg-10 col-xs-12">
                
                <div class="row">
                <?php 
                    $sql ="select * from products,category where category.status='1' and products.cat_id = category.id";
                    $stmt =$pdo->prepare($sql);
                    $stmt->execute();
                    while($posts=$stmt->fetch(PDO::FETCH_ASSOC)){
                        $product_id = $posts['product_id'];
                        $productName = $posts['product_name'];
                        $productPrice = $posts['product_price'];
                        $productImage = $posts['product_photo'];
                        $productCategory = $posts['cat_type'];
                        $productRating = floor($posts['product_rating']);
                ?>
                        <div class="col-lg-4 col-md-6">
                            <!-- Card -->
                            <div class="card">
                            <div class="view zoom overlay">
                            <img class="img-fluid w-100" src="admin/image/<?php echo $productImage; ?>" alt="<?php echo $productImage; ?>">
                            </div>

                            <div class="card-body text-center">

                            <h5><?php echo $productName; ?></h5>
                            <p class="small text-muted text-uppercase mb-2"><?php echo strtoupper($productCategory); ?></p>
                            <ul class="d-flex justify-content-center rating">
                            <?php 
                                $temp = 5-$productRating;
                                while($productRating !=0 )
                                {
                                    echo "<li><i class='fas fa-star fa-sm text-primary'></i></li>";
                                    $productRating -= 1;
                                }
                                while($temp != 0)
                                {
                                    echo "<li><i class='far fa-star fa-sm text-primary'></i></li>";
                                    $temp -= 1;
                                }
                            
                            ?>
                            </ul>
                            <hr>
                            <h6 class="mb-3">
                                <span class="text-danger mr-1">£<?php echo $productPrice; ?></span>
                            </h6>

                            <!-- <button type="button" class="btn btn-primary btn-sm mr-1 mb-2">
                                <i class="fas fa-shopping-cart pr-2"></i>Add to cart
                            </button> -->
                            <a href="product_details.php?id=<?php echo $product_id; ?>">
                                <button type="button" class="btn btn-outline-succes mr-1 mb-2">
                                    <i class="fas fa-info-circle pr-2"></i>
                                    Details
                                </button>
                            </a>
                            <!--
                            <button type="button" class="btn btn-danger btn-sm px-3 mb-2 material-tooltip-main" data-toggle="tooltip" data-placement="top" title="Add to wishlist">
                                <i class="far fa-heart"></i>
                            </button> -->

                            </div>

                            </div>
                            <!-- Card -->
                        </div>

                <?php
                    }
                ?>
                </div>            
            </div>
        </div>
  
    </body>
</html>
