<?php include "header.php";

$limit=3;
if(isset($_GET['page']) and $_GET['page']!=0)
{
  $page=safe($_GET['page']);
}else{
  $page=1;
}

$limit=3;
$increment=($limit*$page)-($limit-1);
$sql="Select * from category";
$query=mysqli_query($conn,$sql);
$limit=3;
$offset=($page-1)*$limit;
 $totalRecord=mysqli_num_rows($query);
if($totalRecord<$limit)
{
  $limit=$totalRecord;
}
//die();
$query=mysqli_query($conn,$sql);


$sql.=" limit $offset , $limit";
$query=mysqli_query($conn,$sql);

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <?php if(mysqli_num_rows($query)>0)
                    {
                      $total_page=ceil($totalRecord/$limit);

                      while($row=mysqli_fetch_assoc($query))
                      {
                       ?>
                    <tbody>
                        <tr>
                            <td class='id'><?php echo $increment++; ?></td>
                            <td><?php echo $row['category_name']; ?></td>
                            <td><?php echo $row['post']; ?></td>
                            <td class='edit'>
                              <a href='<?php echo $load ?>/admin/update-category?id=<?php echo $row['category_id']; ?>'>
                                <i class='fa fa-edit'></i></a></td>
                            <td class='delete'>
                              <a href='<?php echo $load ?>/admin/delete-category?id=<?php echo $row['category_id']; ?>'>
                                <i class='fa fa-trash-o'></i></a></td>
                        </tr>
                    </tbody>
                  <?php }
                  }
                  else{

                  echo "<td colspan='7' class='bg bg-danger' style='font-weight:bolder'>No Data Present</td>";
                  }
                  ?>
                </table>
                <ul class='pagination admin-pagination'>
                  <!-- --->
                  <?php

                  if($totalRecord > 0)
                  {
                    if($page>1){
                        ?>
                    <li><a href='<?php echo $load ?>/admin/category?page=<?php  echo $page-1 ;?>'>prev</a></li>
                      <?php


                    }
                    $count=ceil($totalRecord/$limit);
                    for($i=1;$i<=$total_page;$i++){
                      $active=$i==$page?"active":"";
                      echo "<li class=$active><a href='$load/admin/category?page=$i'>$i</a></li>";
                    }
                    if($page<$total_page){
                      echo "<li><a href='$load/admin/category?page=".($page+1)."'>Next</a></li>";
                    }
                  }
                   ?>
                  </ul>




                  <!-- --->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
