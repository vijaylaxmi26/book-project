<?php
require('top.php');
$categories='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
    $id=get_safe_value($conn,$_GET['id']);
    $sql="select * from `category` where `id`='$id'";
    $res=mysqli_query($conn,$sql);
    $check=mysqli_num_rows($res);
    if($check){
        $row=mysqli_fetch_assoc($res);
        $categories = $row['cat_type'];
    }else{
        header('location: category.php');
    }

}

if(isset($_POST['submit'])){
    $categories=get_safe_value($conn,$_POST['categories']);
    $sql="select * from `category` where `cat_type`='$categories'";
    $res=mysqli_query($conn,$sql);
    $check=mysqli_num_rows($res);

    if($check>0){
        if(isset($_GET['id']) && $_GET['id']!=''){
            $getdata=mysqli_fetch_assoc($res);
            if($id==$getdata['id']){

            }else{
                $msg="categorie already existe";
            }
        }else{
            $msg="categorie already existe";
        }


    }

    if($msg==''){
        if(isset($_GET['id']) && $_GET['id']!=''){
            $sql= "update `category` set `cat_type`= '$categories' where `id`='$id' ";
            mysqli_query($conn,$sql);
        }else{
            $sql= "INSERT INTO `category`(`cat_type`) VALUES ('$categories') ";
            mysqli_query($conn,$sql);
        }
        
        header('location: category.php');
        die();
    }
}


?>
<div class="content pb-0">
    <div class="animated fadeIn">
     <div class="row">
      <div class="col-lg-12">
       <div class="card">
        <div class="card-header"><strong>Categorie</strong><small> Form</small></div>
        <div class="card-body card-block">
            <form method="post">
                <div class="form-group">
                 <label for="categories" class=" form-control-label">Categories</label>
                 <input type="text" name="categories" placeholder="Enter categorie name" class="form-control" required value="<?php echo $categories ?>">
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