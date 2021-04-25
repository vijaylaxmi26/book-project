<?php
require('top.php');
$msg='';
$name='';
$details='';
$quantity='';
$price='';
$Category='';
$image='';
$id='';
$image_required='required';

if(isset($_GET['id'])){
    
    $image_required='';
    $id=get_safe_value($conn,$_GET['id']);
    $sql="select *,category.cat_type as cat_type from `products`,`category` where `product_id`='$id' and `id` =`cat_id`";
    $res=mysqli_query($conn,$sql);
    $check=mysqli_num_rows($res);
    if($check){
        $row=mysqli_fetch_assoc($res);
        $name=$row['product_name'];
        $details=$row['product_discription'];
        $quantity=$row['product_quantity'];
        $price=$row['product_price'];
        $Category=$row['cat_id'];
        $image=$row['product_photo'];
    }else{
        header('location: product.php');
        die();
    }

}

if(isset($_POST['submit'])){
    
    $name_p=get_safe_value($conn,$_POST['name']);
    $details_p=get_safe_value($conn,$_POST['details']);
    $quantity_p=get_safe_value($conn,$_POST['quantity']);
    $price_p=get_safe_value($conn,$_POST['price']);
    $Category_p=get_safe_value($conn,$_POST['Category']);

    $image_p = rand(1111111,9999999999).'_'.$_FILES['photo']['name'];
    $target_p ='image/'.basename($_FILES['photo']['name']);
    move_uploaded_file($_FILES['photo']['tmp_name'],$target_p);

    $sql="select * from `products` where `product_id`='$id'";
    $res=mysqli_query($conn,$sql);
    $check=mysqli_num_rows($res);
    
    if($check > 0){
        if(isset($_GET['id']) || isset($_GET['type'])){
            $getdata=mysqli_fetch_assoc($res);
            if($id == $getdata['product_id']){
                $temp = 1;
            }else{
                echo "ok";
                $msg="product already";
            }
        }
        else{
            echo "noooo";
            $msg="product already existe";
        }
    } 

    if($msg=='')
    {
        if(isset($_GET['id'])){
            
            $id=get_safe_value($conn,$_GET['id']);
            
            $sql= "UPDATE `products` SET `product_name`='$name_p',
            `product_discription`='$details_p',`product_price`='$price_p',`product_quantity`='$quantity_p',`product_photo`='$image_p',`cat_id`='$Category_p' where `id`='$id'";

            if(mysqli_query($conn,$sql)){
                header('location: product.php');
                die();
            }
            else{
                $msg="somthing went wrong";
            }
        }
        else
        {
            echo "nnooo";
            $sql1="INSERT INTO `products`(`product_name`, `product_discription`,`product_price`, `product_quantity`, `product_photo`, `cat_id`) 
             VALUES('$name_p','$details_p','$price_p','$quantity_p','$image_p','$Category_p')";
            if(mysqli_query($conn,$sql1))
            {
                header('location: product.php');
                die();
            }else{
                $msg="somthing went wrong";
            }
        }
        
         
    }
}



?>
<div class="content pb-0">
    <div class="animated fadeIn">
     <div class="row">
      <div class="col-lg-12">
       <div class="card">
        <div class="card-header"><strong>Product</strong><small> Form</small></div>
        <div class="card-body card-block">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                 <label for="name" class=" form-control-label">Product name</label>
                 <input type="text" id="name" name="name" placeholder="Enter Product Name" class="form-control" required value="<?php echo $name ?>">
                 </div>
                 <div class="form-group">
                 <label for="details" class=" form-control-label">Details</label>
                 <textarea type="text" id="details" name="details" placeholder="Enter Product details" class="form-control" required  ><?php echo $details ?></textarea>
                 </div>
                 <div class="form-group">
                 <label for="quantity" class=" form-control-label">Quantity</label>
                 <input type="number" id="quantity" name="quantity" placeholder="Enter Quantity" class="form-control" required value="<?php echo $quantity ?>"> 
                 </div>
                 <div class="form-group">
                 <label for="price" class=" form-control-label">Price</label>
                 <input type="number" id="price" name="price" placeholder="Enter price" class="form-control" required value="<?php echo $price ?>"> 
                 </div>
                 <div class="form-group">
                 <label for="Category" class="form-control-label">Category</label>
                 <select class="form-control" name="Category">
                     <option>Select Categorie</option>
                     <?php
                     $res=mysqli_query($conn,"select id,cat_type from category order by cat_type desc");
                     while($row=mysqli_fetch_assoc($res)){
                         if($row['id']==$Category){
                            echo "<option selected value=".$row['id'].">".$row['cat_type']."</option>";

                         }else{
                        echo "<option value=".$row['id'].">".$row['cat_type']."</option>";
                         }
                     }

                     ?>
                  
                 </select>
                 </div>

                 <div class="form-group">
                 <label for="photo" class=" form-control-label">Product image</label>
                 <input type="file" id="photo" name="photo" class="form-control" <?php echo $image_required ?>/>
                 </div>
             
             <button type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                 <span>Submit</span>
             </button>
             <div class="field_error"><?php echo $msg ?></div>
         </div>
     </form>
 </div>
</div>
</div>
</div>
</div>

<?php require('bottom.php') ?>   