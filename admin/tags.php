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
                    <h4 class="card-title">Tags</h4>
                    <p class="card-description"> You can add tags from here </p>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> Сategory Name </th>
                          <th> Name </th>
                          <th> Thumbnail </th>
                          <th> status </th>
                          <th> action </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $tag_obj = new App\classes\Tags;

                        $tags = $tag_obj->index();
                     
                        $number = 1;
                        foreach( $tags as $tag ):?>
                          <tr>
                            <td> <?php echo $number++; ?> </td>
                            <td> <?php echo $tag['cat_id']; ?> </td>
                            <td> <?php echo $tag['name']; ?> </td>
                            <td class="py-1">
                              <img src="../uploads/tags/<?php echo $tag['thumbnail']; ?>" alt="image">
                            </td>
                            <td>
								<?php
								if( $tag['status'] == '1'):
								?>
                              		<a href="?tag_status=<?php echo $tag['status']; ?>&id=<?php echo $tag['id']; ?>" class="btn btn-danger">Deactivate</a>  
								<?php 
								else: ?>
									<a href="?tag_status=<?php echo $tag['status']; ?>&id=<?php echo $tag['id']; ?>" class="btn btn-success">Activate</a>
								<?php 
								endif; ?>
                            </td>
                            <td> 
                              <a href="tag_edit.php?tag_edit_id=<?php echo $tag['id']; ?>">Edit</a>
                              <a href="?deleted_tag_id=<?php echo $tag['id']; ?>">Delete</a>
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