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
                    <h4 class="card-title">Edit Tag</h4>
                    <p class="card-description">You can modify tag from here.</p>
                    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $result['id']; ?>">



                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="update_name" value="<?php echo $result['name']; ?>" id="name" placeholder="Name">
                        </div>

                        <div class="form-group">
                          <label for="content">Content</label>
                          <textarea class="form-control" id="content" rows="5" name="update_content"><?php echo $result['content']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="file" class="form-control" name="update_thumbnail" id="thumbnail" placeholder="Update Thumbnail">
                            <img src="../uploads/tags/<?php echo $result['thumbnail']; ?>" alt="<?php echo $result['name']; ?>">
                        </div>

                        <button type="submit" class="btn btn-success mr-2" name="update_tag">Submit</button>
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