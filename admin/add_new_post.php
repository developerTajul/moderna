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
                    <h4 class="card-title">Categores</h4>
                    <p class="card-description">You can add categores from here.</p>

                    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Type Title Here">
                        </div>

                        <div class="form-group">
                          <label for="excerpt">Excerpt</label>
                          <textarea class="form-control" id="excerpt" rows="3" name="excerpt"></textarea>
                        </div>

                        <div class="form-group">
                          <label for="content">Content</label>
                          <textarea class="form-control" id="content" rows="10" name="content"></textarea>
                        </div>


                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="file" class="form-control" name="thumbnail" id="thumbnail" placeholder="Update Thumbnail">
                        </div>

                        <div class="form-group">
							<label for="categories">Categores : </label>
							<?php 
							$cats = $cat->index();
							if( is_array( $cats ) ):	
								foreach( $cats as $cat ):
								?>
									<div class="form-check form-check-flat">
										<label class="form-check-label">
										<input type="checkbox" name="cats[]" class="form-check-input" value="<?php echo $cat['slug']; ?>"><?php echo $cat['name']; ?><i class="input-helper"></i></label>
									</div>
								<?php 
								endforeach; 
							endif; ?>	
                        </div>

                        <button type="submit" class="btn btn-success mr-2" name="add_post">Submit</button>
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