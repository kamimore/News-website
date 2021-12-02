<?php include "header.php";

//include "config.php";
//include "function.php";

if(isset($_GET['page']) and $_GET['page']!=0)
{
  $page=safe($_GET['page']);

}else{
  
  $page=1;
}

$limit=3;
$increment=($limit*$page)-($limit-1);

$user_id=$_SESSION['user_id'];

if($_SESSION['role']==1)
{
  $sqlnew="SELECT * FROM user";
}
else{
  $sqlnew="SELECT * FROM user where user_id='$user_id'";
}
$querynew=mysqli_query($conn,$sqlnew) or die("Pagination Query Error");

$totalRecord=mysqli_num_rows($querynew);
if($totalRecord<$limit)
{
  $limit=$totalRecord;
}

 ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <?php if(isset($_SESSION['role']) and $_SESSION['role']!=0){ ?>
              <div class="col-md-2">
                  <a class="add-new" href="<?php echo $load ?>/admin/add-user">add user</a>
              </div>
            <?php } ?>
              <div class="col-md-12">

                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <?php

                      $offset=($page-1)*$limit;
                      //$i=1+$offset;
                      //$user_id=$_SESSION['user_id'];
                      if($_SESSION['role']==1){
                        $sql="SELECT * FROM user order by user_id desc limit $offset,$limit";
                      }
                      else{
                         $sql="SELECT * FROM user where user_id='$user_id' order by user_id desc limit $offset,$limit";
                    //  die();
                      }
                       $query=mysqli_query($conn,$sql) or die("Query Error");
                       while($run=mysqli_fetch_assoc($query))
                     {

                       ?>
                      <tbody>
                          <tr>
                              <td class='id'><?php
                              echo $increment++ ?></td>
                              <td><?php echo $run['first_name']." "; echo $run['last_name'] ; ?></td>
                              <td><?php echo $run['username'] ?></td>
                              <td><?php $role=$run['role']==0?'Normal':'Admin';
                                        echo $role;
                               ?></td>
                              <td class='edit'><a href='<?php echo $load ?>/admin/update-user?id=<?php echo $run['user_id']; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='<?php echo $load ?>/admin/delete-user?id=<?php echo $run['user_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>

                      </tbody>
                        <?php } ?>
                  </table>
                <ul class='pagination admin-pagination'>
                  <?php

                  if($totalRecord > 0)
                  {
                    if($page>1){
                      ?>
                      <li><a href='<?php echo $load ?>/admin/users?page=<?php  echo $page-1 ;?>'>prev</a></li>
                      <?php


                    }
                    $count=ceil($totalRecord/$limit);
                    for($i=1;$i<=$count;$i++){
                      $active=$i==$page?"active":"";
                      echo "<li class=$active><a href='$load/admin/users?page=$i'>$i</a></li>";
                    }
                    if($page<$count){
                      echo "<li><a href='$load/admin/users?page=".($page+1)."'>Next</a></li>";

                    }


                  }
                   ?>
                  </ul>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
