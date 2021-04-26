<?php
require('top.php');
$msg='';
$id='0';
if(isset($_GET['id']) && $_GET['id']!=''){
   $id=get_safe_value($conn,$_GET['id']);
   $sql="select * from `orders` where `order_id`='$id'";
    $res=mysqli_query($conn,$sql);
    $check=mysqli_num_rows($res);
    if($check){
        $row=mysqli_fetch_assoc($res);
        $orid = $row['order_id'];
    }else{
        header('location: orders.php');
        die();
    }
}
 
if(isset($_POST['submit'])){
    $status=$_POST['status'];
    echo $orid;
    $sql="UPDATE `orders` SET  `order_status`='$status' WHERE `order_id`='$orid' ";
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
            <form method="post">
                                 
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