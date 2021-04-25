<?php  require_once("includes/db1.php"); 
session_start();?>

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
            background-color: #37B859;
          
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
        <!--Grid column-->
        <div class="col-lg-6">

            <!-- Card -->
            <div class="mb-3">
                <div class="pt-4">

                    <h5 class="mb-3">The total amount of</h5>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                            Temporary amount
                            <span>£<?php echo number_format($_SESSION['amount'] - 10);?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Shipping
                            <span>£10</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                            <div>
                                <strong>The total amount of</strong>
                                <strong>
                                    <p class="mb-0">(including VAT)</p>
                                </strong>
                            </div>
                                <span><strong>£<?php echo number_format( $_SESSION['amount']);?></strong></span>
                        </li>
                    </ul>

                    <a href="includes/payment.php"><button type="button" class="btn btn-primary btn-block">PAY</button></a>

                </div>
            </div>
        </div>


    </body>
</html>