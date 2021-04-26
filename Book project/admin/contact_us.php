<?php
require('top.php');
 
   $sql_query_2 = "select 	countmessage()";
   $res_query_2 = mysqli_query($conn,$sql_query_2);
   $total_msg = mysqli_fetch_assoc($res_query_2)['countmessage()'];


if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $msg=$_POST['message'];

    $sql="INSERT INTO `contact_us`(`name`, `email`, `message`) VALUES ('$name','$email','$msg')";
    mysqli_query($conn,$sql);
    header('location: ../index.php');
    die();
}

if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($conn,$_GET['type']);
    if($type=='delete'){
      $id = get_safe_value($conn,$_GET['id']);
      $delete_sql = "delete from contact_us where id='$id'";
      mysqli_query($conn,$delete_sql);
   }
}

$sql = "call getcontact()";
$res=mysqli_query($conn,$sql);

?>
 <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Messages :: Total unresponded message - <?php echo $total_msg ?></h4>
                        </div>
                         <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th class="avatar">Name</th>
                                       <th>Email</th>
                                       <th>message</th>
                                       <th>status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php $i=1;while($row=mysqli_fetch_assoc($res)){ ?>
                                    <tr>
                                       <td class="serial"><?php echo $i ?></td>
                                       <td><?php echo $row['name'] ?></td>
                                       <td><?php echo $row['email'] ?></td>
                                       <td><?php echo $row['message'] ?></td>
                                       <td> 
                                       <?php
                                            if($row['status']==1){
                                               echo "<span class='badge badge-complete'>Responded</span>&nbsp;";

                                            }else{
                                                 echo "<span class='badge badge-pending'>Pending</span>&nbsp;";
                                            } 
                                            echo "<span class='badge badge-edit'><a href='responed.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
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
