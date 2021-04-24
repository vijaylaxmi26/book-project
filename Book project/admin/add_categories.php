<?php
 require('top.php');
 $categories='';

 if(isset($Get['id']) && $_GET['id']!=''){
    $id=get_safe_value($conn,$_GET['id']);
    $res=mysqli_query($conn,"select *from `category` where id='$id'");
    $row=mysqli_fetch_assoc($res);
    $categories = $row['cat_type'];

 }

 if(isset($_POST['submit'])){
    $categories=get_safe_value($conn,$_POST['categories']);
    if(isset($Get['id']) && $_GET['id']!=''){
        $sql= "update `category` set `cat_type`=$categories where id=$id ";
        mysqli_query($conn,$sql);
    }else{
        $sql= "INSERT INTO `category`(`cat_type`) VALUES ('$categories') ";
        mysqli_query($conn,$sql);
    }
     
    header('location: category.php');
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
                               <input type="text" name="categories" placeholder="Enter categorie name" class="form-control" value="<?php echo $categories ?>" required>
                            </div>
                    
                           <button type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                           <span>Submit</span>
                           </button>
                        </div>
                            </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>

<?php require('bottom.php') ?>   