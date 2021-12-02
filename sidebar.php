<?php

$sql="select post.*,category.category_name,user.username
 from post left join category on post.category=category.category_id
 left join user on post.author=user.user_id  order by post.post_id desc limit 0,4 ";

 $query=mysqli_query($conn,$sql);


 ?>
<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="<?php echo $load ?>/search" method ="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
        <?php if(mysqli_num_rows($query) > 0) {
          while($row=mysqli_fetch_assoc($query)){
          ?>
        <div class="recent-post">
            <a class="post-img" href="">
                <img src="<?php echo $load ?>/admin/upload/<?php echo $row['post_img'] ?>" alt=""/>
            </a>
            <div class="post-content">
                <h5><a href="<?php echo $load ?>/single/<?php echo $row['post_id'] ?>"><?php echo $row['title'] ?></a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='<?php echo $load ?>/category/<?php echo $row['category'] ?>'><?php echo $row['category_name'] ?></a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo $row['post_date'] ?>
                </span>
                <a class="read-more" href="<?php echo $load ?>/single?id=<?php echo $row['post_id'] ?>">read more</a>
            </div>
        </div>
      <?php }} ?>

    </div>
    <!-- /recent posts box -->
</div>
