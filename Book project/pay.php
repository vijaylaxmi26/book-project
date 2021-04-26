<?php  require_once("./includes/db1.php"); 

if($_SESSION['amount'] == 0){
    header('location: index.php?error=cartempty');
    exit();
}

if(isset($_GET['error'])){
    $errorr = $_GET['error'];
    if($errorr == "pininvalid"){
?>
        <script>alert("please enter a valid pin number");</script>
<?php
    }
}

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

            <div class="container col-lg-6">
                <form method="post" action="includes/payment.php">
                    <div class="form-group">
                        <label for="pin">Pincode:</label>
                        <input type="number" class="form-control" id="pin" placeholder="Enter Pincode" name="pincode">
                    </div>
                    <button name="pin-submit" type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
    </body>
</html>

