<?php
require('top.php');

   if(isset($_GET['type']) && $_GET['type']!=''){
      $type=get_safe_value($conn,$_GET['type']);
      if($type=='status'){
            $operation=get_safe_value($conn,$_GET['operation']);
            $id = get_safe_value($conn,$_GET['id']);
            if($operation=='active'){
               $status='1';
            }else{
               $status='0';
            }
         $update_status = "update category set status='$status' where id='$id'";
         mysqli_query($conn,$update_status);
      }
      if($type=='delete'){
         $id = get_safe_value($conn,$_GET['id']);
         $delete_sql = "delete from category where id='$id'";
         mysqli_query($conn,$delete_sql);
      }
   }
   $sql = "select * from category order by id";
   $res=mysqli_query($conn,$sql);
 
?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Categories </h4>
                           <h4 class="box-link"><a href="add_categories.php">Add Categories</a></h4>
                        </div>
                         <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th class="avatar">ID</th>
                                       <th>Categories</th>
                                       <th>Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                      
                                    <?php $i=1;while($row=mysqli_fetch_assoc($res)){ ?>
                                    <tr>
                                       <td class="serial"><?php echo $i ?></td>
                                       <td><?php echo $row['id'] ?></td>
                                       <td><?php echo $row['cat_type'] ?></td>
                                       <td>
                                            <?php
                                            
                                            if($row['status']==1){
                                               echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";

                                            }else{
                                                 echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactivate</a></span>&nbsp;";
                                            } 
                                            echo "<span class='badge badge-edit'><a href='add_categories.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
                                            echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a>&nbsp;</span>";
                                             
                                            ?>
                                       </td>

                                    </tr>
                                    <?php $i=$i+1;
                                     } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
<?php require('bottom.php') ?>   