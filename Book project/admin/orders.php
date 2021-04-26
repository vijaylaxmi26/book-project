<?php
 require('top.php');

 if(isset($_GET['type']) && $_GET['type']!=''){
     $type=get_safe_value($conn,$_GET['type']);
     if($type=='delete'){
        $id = get_safe_value($conn,$_GET['id']);
       $delete_sql = "delete from orders where `order_id`='$id'";
       mysqli_query($conn,$delete_sql);
    }
 }
 $sql = "call getorders()";
 $res=mysqli_query($conn,$sql);
 
?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Orders</h4>
                        </div>
                         <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th class="avatar">ID</th>
                                       <th>Address</th>
                                       <th>Pincode</th>
                                       <th>Quantity</th>
                                       <th>Product</th>
                                       <th>Total price</th>                                        
                                       <th>User id</th>
                                       <th>Orderstatus</th>
                                       <th>Update</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                      
                                    <?php $i=1;while($row=mysqli_fetch_assoc($res)){ ?>
                                    <tr>
                                       <td class="serial"><?php echo $i ?></td>
                                       <td><?php echo $row['order_id'] ?></td>
                                       <td><?php echo $row['order_add'] ?></td>
                                       <td><?php echo $row['order_pincode'] ?></td>
                                        <td><?php echo $row['order_qty'] ?></td>
                                       <td><?php echo $row['product_name'] ?></td>
                                        <td><?php echo $row['total_price'] ?></td>
                                        <td><?php echo $row['user_id'] ?></td>
                                       <td>  
                                       <span class='badge badge-complete'><?php echo $row['ostatus'] ?></span>
                                       </td>
                                       <td>
                                           <?php 
                                           echo "<span class='badge badge-edit'><a href='order_master.php?id=".$row['order_id']."'>Edit</a></span>&nbsp;";
                                            echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['order_id']."'>Delete</a>&nbsp;</span>";
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
