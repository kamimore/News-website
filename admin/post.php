<?php include "header.php";
//pxr($_SESSION);
if(isset($_GET['page']) and $_GET['page']!="" and !$_GET['page']<1){
  $page=safe($_GET['page']);
}else{
  $page=1;
}

$limit=3;
$increment=($limit*$page)-($limit-1);
$offset=($page-1)*$limit;
$user_id=$_SESSION['user_id'];
if($_SESSION['role']==1){
  $sql="select post.*,category.category_name,user.username
   from post left join category on post.category=category.category_id
   left join user on post.author=user.user_id order by post.post_id desc  ";
}
else{
  $sql="select post.*,category.category_name,user.username
   from post left join category on post.category=category.category_id
   left join user on post.author=user.user_id where post.author='$user_id' order by post.post_id desc  ";
}
 $query=mysqli_query($conn,$sql);
 $total_records=mysqli_num_rows($query);
 if($total_records<$limit)
 {
   $limit=$total_records;
 }
 $sql.="limit $offset,$limit";
$query=mysqli_query($conn,$sql);


 ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post">add post</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <?php

                      if(mysqli_num_rows($query)>0)
                      {
                        $total_pages=ceil($total_records/$limit);

                        ?>
                      <tbody>
                        <?php while($row=mysqli_fetch_assoc($query)){ ?>
                          <tr>
                              <td class='id'><?php echo $increment++; ?></td>
                              <td><?php echo $row['title'] ?></td>
                              <td><?php echo $row['category_name'] ?></td>
                              <td><?php echo $row['post_date'] ?></td>
                              <td><?php echo $row['username'] ?></td>
                              <td class='edit'><a href='<?php echo $load ?>/admin/update-post?id=<?php echo $row['post_id'] ?>'>
                                <i class='fa fa-edit'></i></a></td>
    <td class='delete'><a href='<?php echo $load ?>/admin/delete-post?id=<?php echo $row['post_id'] ?>&cat_id=<?php echo $row['category'] ?>'>
                                <i class='fa fa-trash-o'></i></a></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    <?php }else{

                    echo "<td colspan='7' class='bg bg-danger' style='font-weight:bolder'>No Data Present</td>";
                    } ?>
                  </table>
                  <?php if($total_records>0) {?>
                  <ul class='pagination admin-pagination'>
                    <?php  if($page>1){?>
                  <li class=''><a href='<?php echo $load ?>/admin/post?page=<?php echo $page-1 ?>'>Prev</a></li>;
                <?php  }?>
                    <?php
                    for($i=1;$i<=$total_pages;$i++)
                    {
                      $active=($page==$i)?'active':'';
                      echo "<li class='{$active}' ><a href='{$load}/admin/post?page=$i'>{$i}</a></li>";
                    }

                     ?>
<?php if($page<$total_pages){ ?>
                     <li class=''><a href='<?php echo $load ?>/admin/post?page=<?php echo $page+1 ?>'>Next</a></li>;
                   <?php } ?>
                  </ul>
                <?php } ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
