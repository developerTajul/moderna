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
        <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Categories</h4>
                    <p class="card-description"> You can add categoris from here </p>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> Name </th>
                          <th> Thumbnail </th>
                          <th> status </th>
                          <th> action </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $cat_obj = new App\classes\Categories;

                        $cats = $cat_obj->index();
                     
                        $number = 1;
                        foreach( $cats as $cat ):?>
                          <tr>
                            <td> <?php echo $number++; ?> </td>
                            <td> <?php echo $cat['name']; ?> </td>
                            <td class="py-1">
                              <img src="../uploads/categories/<?php echo $cat['thumbnail']; ?>" alt="image">
                            </td>

                            <td>
								<?php
								if( $cat['status'] == '1'):
								?>
                              		<a href="?status=<?php echo $cat['status']; ?>&id=<?php echo $cat['id']; ?>" class="btn btn-danger">Deactivate</a>  
								<?php 
								else: ?>
									<a href="?status=<?php echo $cat['status']; ?>&id=<?php echo $cat['id']; ?>" class="btn btn-success">Activate</a>
								<?php 
								endif; ?>
                            </td>
                            <td> 
                              <a href="category_edit.php?edit_id=<?php echo $cat['id']; ?>">Edit</a>
                              <a href="?deleted_id=<?php echo $cat['id']; ?>">Delete</a>
                            </td>
                          </tr>
                        <?php 
                        endforeach; ?>    

                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
      </div>
      <!-- content-wrapper ends -->
<?php 
require_once('template-parts/footer.php');