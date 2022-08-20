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
                        <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="update_name" value="<?php echo $result['name']; ?>" id="name" placeholder="Name">
                        </div>
                        <button type="submit" class="btn btn-success mr-2" name="update_cat">Submit</button>
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