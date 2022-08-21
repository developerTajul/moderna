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
                          <th> Categories </th>
                          <th> Thumbnail </th>
                          <th> status </th>
                          <th> action </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 

                        $post_obj = new App\classes\PostController;

                        $posts = $post_obj->index();

				
                     
                        $number = 1;
                        foreach( $posts as $post ):

						 $categories = json_decode( $post['category_id'] );
						?>
                          <tr>
                            <td> <?php echo $number++; ?> </td>
                            <td> <?php echo $post['title']; ?> </td>
                            <td> 
							<?php 
							if( is_array( $categories) ):
								foreach( $categories as $value ): ?>
									<a href="#"><?php echo $value; ?></a>
								<?php 
								endforeach;
							endif;	
							?>
							</td>
                            <td class="py-1">
                              <img src="../uploads/blog/<?php echo $post['thumbnail']; ?>" alt="image">
                            </td>

                            <td>
								<?php
								if( $post['status'] == '1'):
								?>
                              		<a href="?status=<?php echo $post['status']; ?>&id=<?php echo $post['id']; ?>" class="btn btn-danger">Deactivate</a>  
								<?php 
								else: ?>
									<a href="?status=<?php echo $post['status']; ?>&id=<?php echo $post['id']; ?>" class="btn btn-success">Activate</a>
								<?php 
								endif; ?>
                            </td>
                            <td> 
                              <a href="category_edit.php?edit_id=<?php echo $post['id']; ?>">Edit</a>
                              <a href="?deleted_id=<?php echo $post['id']; ?>">Delete</a>
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