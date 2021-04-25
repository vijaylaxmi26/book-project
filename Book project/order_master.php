<?php
require('top.php');
$msg='';
$id='';
if(isset($_GET['id'])){
$id=get_safe_value($conn,$_GET['id']);
}

if(isset($_POST['submit'])){
    $status=$_POST['status'];
    $sql="UPDATE `orders` SET  `order_status`='$status' WHERE `or_id`='$id' ";
    if(mysqli_query($conn,$sql)){
        header('location: orders.php');
        die();
    }else{
        $msg="Something went wrong";
    }

}

?>
<div class="content pb-0">
    <div class="animated fadeIn">
     <div class="row">
      <div class="col-lg-12">
       <div class="card">
        <div class="card-header"><strong>Order detail</strong><small> Form</small></div>
        <div class="card-body card-block">
            <form method="post" action="order_master.php">
                                 
                 <div class="form-group">
                 <label for="Category" class="form-control-label">Order status</label>
                 <select class="form-control" name="status" required>
                     <option>Select Categorie</option>
                     <?php
                     $res=mysqli_query($conn,"select * from orderstatus order by os_id");
                     while($row=mysqli_fetch_assoc($res)){
                        echo "<option value=".$row['os_id'].">".$row['ostatus']."</option>";
                     }
                     ?>
                  
                 </select>
                 </div>
             
                <button type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                 <span>Submit</span>
                </button>
             <div class="field_error"><?php echo $msg ?></div>
     </form>
 </div>
</div>
</div>
</div>
</div>

<?php require('bottom.php') ?>   