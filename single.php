<?php

use App\classes\PostController;

require_once 'template-parts/header.php';
/**
 * user info
 */

$con = new App\classes\Database;
$current_user_id = $single_post['user_id'];
$user_info = $con->connect()->query("SELECT * FROM users WHERE id='$current_user_id'");
$user = mysqli_fetch_assoc( $user_info );

$categories = json_decode( $single_post['categories'] );
?>
<!-- breadcrumb-area -->
<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">Blog Details</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<article>
						<div class="post-image">
							<div class="post-heading">
								<h3><?php echo $single_post['title']; ?></h3>
							</div>
							<img src="uploads/blog/<?php echo $single_post['thumbnail']; ?>" alt="" />
						</div>
						<p><?php echo $single_post['content']; ?></p>
						<div class="bottom-article">
							<ul class="meta-post">
								<li><i class="icon-calendar"></i><a href="#"><?php echo date('F d, Y', strtotime($single_post['created_at'])); ?></a></li>
								<li><i class="icon-user"></i><a href="user.php?user_id=<?php echo $user['id']; ?>"><?php echo $user['fullname']; ?></a></li>
								<li><i class="icon-folder-open"></i>
								<?php 
								foreach( $categories as $value ): 
									$cat_slug = strtolower( implode('-', explode(' ', trim($value))));
									?>
									<a href="category.php?cat_slug=<?php echo $cat_slug; ?>"><?php echo $value; ?></a>
								<?php 
								endforeach; ?>		
								</li>
								<li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
							</ul>
						</div>
				</article>
				<div id="pagination">
					<span class="all">Page 1 of 3</span>
					<span class="current">1</span>
					<a href="#" class="inactive">2</a>
					<a href="#" class="inactive">3</a>
				</div>
			</div>
			<div class="col-lg-4">
				<aside class="right-sidebar">
				<div class="widget">
					<form class="form-search">
						<input class="form-control" type="text" placeholder="Search..">
					</form>
				</div>
				<div class="widget">
					<h5 class="widgetheading">Categories</h5>
					<ul class="cat">
						<li><i class="icon-angle-right"></i><a href="#">Web design</a><span> (20)</span></li>
						<li><i class="icon-angle-right"></i><a href="#">Online business</a><span> (11)</span></li>
						<li><i class="icon-angle-right"></i><a href="#">Marketing strategy</a><span> (9)</span></li>
						<li><i class="icon-angle-right"></i><a href="#">Technology</a><span> (12)</span></li>
						<li><i class="icon-angle-right"></i><a href="#">About finance</a><span> (18)</span></li>
					</ul>
				</div>
				<div class="widget">
					<h5 class="widgetheading">Latest posts</h5>
					<ul class="recent">
						<li>
						<img src="assets/img/dummies/blog/65x65/thumb1.jpg" class="pull-left" alt="" />
						<h6><a href="#">Lorem ipsum dolor sit</a></h6>
						<p>
							 Mazim alienum appellantur eu cu ullum officiis pro pri
						</p>
						</li>
						<li>
						<a href="#"><img src="assets/img/dummies/blog/65x65/thumb2.jpg" class="pull-left" alt="" /></a>
						<h6><a href="#">Maiorum ponderum eum</a></h6>
						<p>
							 Mazim alienum appellantur eu cu ullum officiis pro pri
						</p>
						</li>
						<li>
						<a href="#"><img src="assets/img/dummies/blog/65x65/thumb3.jpg" class="pull-left" alt="" /></a>
						<h6><a href="#">Et mei iusto dolorum</a></h6>
						<p>
							 Mazim alienum appellantur eu cu ullum officiis pro pri
						</p>
						</li>
					</ul>
				</div>
				<div class="widget">
					<h5 class="widgetheading">Popular tags</h5>
					<ul class="tags">
						<li><a href="#">Web design</a></li>
						<li><a href="#">Trends</a></li>
						<li><a href="#">Technology</a></li>
						<li><a href="#">Internet</a></li>
						<li><a href="#">Tutorial</a></li>
						<li><a href="#">Development</a></li>
					</ul>
				</div>
				</aside>
			</div>
		</div>
	</div>
</section>


<?php 
require_once 'template-parts/footer.php';