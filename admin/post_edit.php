<?php
require_once('template-parts/header.php'); ?>
  <div class="container-fluid page-body-wrapper">
  <!-- partial:partials/_sidebar.html -->
  <?php 
  require_once('template-parts/sidebar.php'); ?>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Post Edit</h4>
                    <?php 
                    $category_lists = json_decode($single_post['cats']);
                    $tag_lists = json_decode($single_post['tags']);
                    ?>
                    <p class="card-description">You can edit post from here.</p>

                    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?php echo $single_post['id']; ?>">

                        <div class="form-group">
                            <label for="update_title">Post Title</label>
                            <input type="text" class="form-control" value="<?php echo $single_post['title']; ?>" name="update_title" id="update_title" placeholder="Type Title Here">
                        </div>

                        <div class="form-group">
                          <label for="update_excerpt">Excerpt</label>
                          <textarea class="form-control" id="update_excerpt" rows="3" name="update_excerpt"><?php echo $single_post['excerpt']; ?></textarea>
                        </div>

                        <div class="form-group">
                          <label for="update_content">Content</label>
                          <textarea class="form-control" id="update_content" rows="10" name="update_content"><?php echo $single_post['content']; ?></textarea>
                        </div>


                        <div class="form-group">
                            <label for="update_thumbnail">Thumbnail</label>
                            <input type="file" class="form-control" name="update_thumbnail" id="update_thumbnail" placeholder="Update Thumbnail"> <br /><br />
                            <img style="width:200px; height:200px;" src="../uploads/blog/<?php echo $single_post['thumbnail']; ?>" alt="<?php echo $single_post['title']; ?>">
                        </div>
                        <?php
                        if(is_array( $category_lists )):
                          foreach($category_lists as $cat ){
                            echo "<h1>".$cat."</h1>";
                          }
                        endif;
                        ?>


                        <button type="submit" class="btn btn-success mr-2" name="update_post">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
      </div>
      <!-- content-wrapper ends -->
<?php 
require_once('template-parts/footer.php');