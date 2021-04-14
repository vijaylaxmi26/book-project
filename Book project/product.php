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
            background-color: #057BFF;
        }
        *{
            font: normal;
           
        }
        .space {
            height: 150px;
            width: 100%;
        }
        .col-sm-4 {
            padding: 5px;
            margin: 0px;
            box-sizing: border-box;
        }
        .row  {
            margin: 13px;
        }
        
        .card {
            padding: 10px;
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
        
        
        </style>
      
    </head>
    <body>
        <?php include 'includes/navigation.php' ?>
        
        <div class="space"></div>
        <div class="row">
            <div class="col-sm-2">
                <br>
                <h3>Categories</h3>
                <ul>
                    <li>Sample 1</li>
                    <li>Sample 1</li>
                    <li>Sample 1</li>
                    <li>Sample 1</li>
                </ul>
                <br>
                <div class="input-group">
                    <div class="form-outline">
                        <input type="search" id="form1" class="form-control">
                    
                        <button type="submit" class="btn btn-primary" style="padding:10px;">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                
                <div class="row">
                    <div class="col-sm-4">
                        <!-- Card -->
                        <div class="card">

                        <div class="view zoom overlay">
                        <img class="img-fluid w-100" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg" alt="Sample">
                    
                        
                        </div>

                        <div class="card-body text-center">

                        <h5>Fantasy T-shirt</h5>
                        <p class="small text-muted text-uppercase mb-2">Shirts</p>
                        <ul class="d-flex justify-content-center rating">
                            <li>
                            <i class="fas fa-star fa-sm text-primary"></i>
                            </li>
                            <li>
                            <i class="fas fa-star fa-sm text-primary"></i>
                            </li>
                            <li>
                            <i class="fas fa-star fa-sm text-primary"></i>
                            </li>
                            <li>
                            <i class="fas fa-star fa-sm text-primary"></i>
                            </li>
                            <li>
                            <i class="far fa-star fa-sm text-primary"></i>
                            </li>
                        </ul>
                        <hr>
                        <h6 class="mb-3">
                            <span class="text-danger mr-1">$12.99</span>
                            <span class="text-grey"><s>$36.99</s></span>
                        </h6>

                        <!-- <button type="button" class="btn btn-primary btn-sm mr-1 mb-2">
                            <i class="fas fa-shopping-cart pr-2"></i>Add to cart
                        </button> -->
                        <button type="button" class="btn btn-light btn-sm mr-1 mb-2">
                            <i class="fas fa-info-circle pr-2"></i>Details
                        </button>
                        <!--
                        <button type="button" class="btn btn-danger btn-sm px-3 mb-2 material-tooltip-main" data-toggle="tooltip" data-placement="top" title="Add to wishlist">
                            <i class="far fa-heart"></i>
                        </button> -->

                        </div>

                        </div>
                        <!-- Card -->
                    </div>
                    <div class="col-sm-4">
                        <!-- Card -->
                        <div class="card">

                        <div class="view zoom overlay">
                        <img class="img-fluid w-100" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg" alt="Sample">
                    
                        
                        </div>

                        <div class="card-body text-center">

                            <h5>Fantasy T-shirt</h5>
                            <p class="small text-muted text-uppercase mb-2">Shirts</p>
                            <ul class="d-flex justify-content-center rating">
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="far fa-star fa-sm text-primary"></i>
                                </li>
                            </ul>
                            <hr>
                            <h6 class="mb-3">
                                <span class="text-danger mr-1">$12.99</span>
                                <span class="text-grey"><s>$36.99</s></span>
                            </h6>

                            <button type="button" class="btn btn-primary btn-sm mr-1 mb-2">
                                <i class="fas fa-shopping-cart pr-2"></i>Add to cart
                            </button>
                        

                        </div>

                        </div>
                        <!-- Card -->
                    </div>
                    <div class="col-sm-4">
                        <!-- Card -->
                        <div class="card">

                        <div class="view zoom overlay">
                        <img class="img-fluid w-100" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg" alt="Sample">
                    
                        
                        </div>

                        <div class="card-body text-center">

                            <h5>Fantasy T-shirt</h5>
                            <p class="small text-muted text-uppercase mb-2">Shirts</p>
                            <ul class="d-flex justify-content-center rating">
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="far fa-star fa-sm text-primary"></i>
                                </li>
                            </ul>
                            <hr>
                            <h6 class="mb-3">
                                <span class="text-danger mr-1">$12.99</span>
                                <span class="text-grey"><s>$36.99</s></span>
                            </h6>

                            <button type="button" class="btn btn-primary btn-sm mr-1 mb-2">
                                <i class="fas fa-shopping-cart pr-2"></i>Add to cart
                            </button>
                            <button type="button" class="btn btn-light btn-sm mr-1 mb-2">
                            <i class="fas fa-info-circle pr-2"></i>Details
                        </button>
                        

                        </div>

                        </div>
                        <!-- Card -->
                    </div>
                    <div class="col-sm-4">
                        <!-- Card -->
                        <div class="card">

                        <div class="view zoom overlay">
                        <img class="img-fluid w-100" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg" alt="Sample">
                    
                        
                        </div>

                        <div class="card-body text-center">

                            <h5>Fantasy T-shirt</h5>
                            <p class="small text-muted text-uppercase mb-2">Shirts</p>
                            <ul class="d-flex justify-content-center rating">
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="far fa-star fa-sm text-primary"></i>
                                </li>
                            </ul>
                            <hr>
                            <h6 class="mb-3">
                                <span class="text-danger mr-1">$12.99</span>
                                <span class="text-grey"><s>$36.99</s></span>
                            </h6>

                            <button type="button" class="btn btn-primary btn-sm mr-1 mb-2">
                                <i class="fas fa-shopping-cart pr-2"></i>Add to cart
                            </button>
                        

                        </div>

                        </div>
                        <!-- Card -->
                    </div>
                    <div class="col-sm-4">
                        <!-- Card -->
                        <div class="card">

                        <div class="view zoom overlay">
                        <img class="img-fluid w-100" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg" alt="Sample">
                    
                        
                        </div>

                        <div class="card-body text-center">

                            <h5>Fantasy T-shirt</h5>
                            <p class="small text-muted text-uppercase mb-2">Shirts</p>
                            <ul class="d-flex justify-content-center rating">
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="far fa-star fa-sm text-primary"></i>
                                </li>
                            </ul>
                            <hr>
                            <h6 class="mb-3">
                                <span class="text-danger mr-1">$12.99</span>
                                <span class="text-grey"><s>$36.99</s></span>
                            </h6>

                            <button type="button" class="btn btn-primary btn-sm mr-1 mb-2">
                                <i class="fas fa-shopping-cart pr-2"></i>Add to cart
                            </button>
                        

                        </div>

                        </div>
                        <!-- Card -->
                    </div>
                    <div class="col-sm-4">
                        <!-- Card -->
                        <div class="card">

                        <div class="view zoom overlay">
                        <img class="img-fluid w-100" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg" alt="Sample">
                    
                        
                        </div>

                        <div class="card-body text-center">

                            <h5>Fantasy T-shirt</h5>
                            <p class="small text-muted text-uppercase mb-2">Shirts</p>
                            <ul class="d-flex justify-content-center rating">
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="far fa-star fa-sm text-primary"></i>
                                </li>
                            </ul>
                            <hr>
                            <h6 class="mb-3">
                                <span class="text-danger mr-1">$12.99</span>
                                <span class="text-grey"><s>$36.99</s></span>
                            </h6>

                            <button type="button" class="btn btn-primary btn-sm mr-1 mb-2">
                                <i class="fas fa-shopping-cart pr-2"></i>Add to cart
                            </button>
                        

                        </div>

                        </div>
                        <!-- Card -->
                    </div>
                    <div class="col-sm-4">
                        <!-- Card -->
                        <div class="card">

                        <div class="view zoom overlay">
                        <img class="img-fluid w-100" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg" alt="Sample">
                    
                        
                        </div>

                        <div class="card-body text-center">

                            <h5>Fantasy T-shirt</h5>
                            <p class="small text-muted text-uppercase mb-2">Shirts</p>
                            <ul class="d-flex justify-content-center rating">
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="fas fa-star fa-sm text-primary"></i>
                                </li>
                                <li>
                                <i class="far fa-star fa-sm text-primary"></i>
                                </li>
                            </ul>
                            <hr>
                            <h6 class="mb-3">
                                <span class="text-danger mr-1">$12.99</span>
                                <span class="text-grey"><s>$36.99</s></span>
                            </h6>

                            <button type="button" class="btn btn-primary btn-sm mr-1 mb-2">
                                <i class="fas fa-shopping-cart pr-2"></i>Add to cart
                            </button>
                        

                        </div>

                        </div>
                        <!-- Card -->
                    </div>
                    <div class="col-sm-4">
                        <!-- Card -->
                        <div class="card">

                        <div class="view zoom overlay">
                        <img class="img-fluid w-100" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg" alt="Sample">
                    
                        
                        </div>

                        <div class="card-body text-center">

                        <h5>Fantasy T-shirt</h5>
                        <p class="small text-muted text-uppercase mb-2">Shirts</p>
                        <ul class="d-flex justify-content-center rating">
                            <li>
                            <i class="fas fa-star fa-sm text-primary"></i>
                            </li>
                            <li>
                            <i class="fas fa-star fa-sm text-primary"></i>
                            </li>
                            <li>
                            <i class="fas fa-star fa-sm text-primary"></i>
                            </li>
                            <li>
                            <i class="fas fa-star fa-sm text-primary"></i>
                            </li>
                            <li>
                            <i class="far fa-star fa-sm text-primary"></i>
                            </li>
                        </ul>
                        <hr>
                        <h6 class="mb-3">
                            <span class="text-danger mr-1">$12.99</span>
                            <span class="text-grey"><s>$36.99</s></span>
                        </h6>

                        <button type="button" class="btn btn-primary btn-sm mr-1 mb-2">
                            <i class="fas fa-shopping-cart pr-2"></i>Add to cart
                        </button>
                        <!-- <button type="button" class="btn btn-light btn-sm mr-1 mb-2">
                            <i class="fas fa-info-circle pr-2"></i>Details
                        </button>
                        <button type="button" class="btn btn-danger btn-sm px-3 mb-2 material-tooltip-main" data-toggle="tooltip" data-placement="top" title="Add to wishlist">
                            <i class="far fa-heart"></i>
                        </button> -->

                        </div>

                        </div>
                        <!-- Card -->
                    </div>
                </div>            
            </div>
        </div>
  
    </body>
</html>
