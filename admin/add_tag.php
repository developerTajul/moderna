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
                    <h4 class="card-title">Tags</h4>
                    <p class="card-description">You can add tags from here.</p>

                    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
  
                        <?php 
                          $cat_obj = new App\classes\Categories;
                          $cats = $cat_obj->index(); 
                          ?>
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Choose Category</label>
                          <select class="form-control form-control-lg" name="cat_id" id="exampleFormControlSelect1">
                              <?php 
                              foreach( $cats as $cat ): ?>
                              <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
                              <?php 
                              endforeach; ?>
                          </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                          <label for="content">Content</label>
                          <textarea class="form-control" id="content" rows="5" name="content"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="file" class="form-control" name="thumbnail" id="thumbnail" placeholder="Update Thumbnail">
                        </div>
                        <button type="submit" class="btn btn-success mr-2" name="add_tag">Submit</button>
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