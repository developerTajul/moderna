<?php

use App\classes\PostController;

require_once 'template-parts/header.php';
?>
<!-- breadcrumb-area -->
<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">Blog</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<?php 
				$posts = new App\classes\PostController;
				$all_posts = $posts->index();
				if( is_array( $all_posts ) ):
					foreach( $all_posts as $post ):
						/**
						 * user info
						 */
						$con = new App\classes\Database;
						$current_user_id = $post['user_id'];
						$user_info = $con->connect()->query("SELECT * FROM users WHERE id='$current_user_id'");
						$user = mysqli_fetch_assoc( $user_info );

						$categories = json_decode( $post['category_id'] );
				 ?>
					<article>
							<div class="post-image">
								<div class="post-heading">
									<h3><a href="single.php?post_id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h3>
								</div>
								<a href="single.php?post_id=<?php echo $post['id']; ?>"><img src="uploads/blog/<?php echo $post['thumbnail']; ?>" alt="" /></a>
							</div>
							<p><?php echo $post['excerpt']; ?></p>
							<div class="bottom-article">
								<ul class="meta-post">
									<li><i class="icon-calendar"></i><a href="#"><?php echo date('F d, Y', strtotime($post['created_at'])); ?></a></li>
									<li><i class="icon-user"></i><a href="user.php?user_id=<?php echo $user['id']; ?>"><?php echo $user['fullname']; ?></a></li>
									
										<div>
									<?php 
									$resultstr = array();
									foreach( $categories as $value ): 
										$cat_slug = strtolower( implode('-', explode(' ', trim($value))));
										
										$resultstr[] .= '<a href="category.php?cat_slug='.$cat_slug.'">'.$value.'</a> ';
							
									endforeach; ?>		

										<?php echo implode(", ",$resultstr); ?>
									
								</div>
									<li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
								</ul>
								<a href="single.php?post_id=<?php echo $post['id']; ?>" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
							</div>
					</article>
					<?php 
					endforeach; 
				endif;
				?>

				<div id="pagination">
					<span class="all">Page 1 of 3</span>
					<span class="current">1</span>
					<a href="#" class="inactive">2</a>
					<a href="#" class="inactive">3</a>
				</div>
			</div>
			<div class="col-lg-4">
				<?php require_once 'template-parts/sidebar.php'; ?>						
			</div>
		</div>
	</div>
</section>


<?php 
require_once 'template-parts/footer.php';