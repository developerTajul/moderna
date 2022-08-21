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
								<a href="single.php?post_id=<?php echo $post['id']; ?>" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
							</div>
					</article>
					<?php 
					endforeach; 
				endif;
				?>
				<!--
				<article>
						<div class="post-slider">
							<div class="post-heading">
								<h3><a href="#">This is an example of slider post format</a></h3>
							</div>
							
							<div id="post-slider" class="flexslider">
								<ul class="slides">
									<li>
									<img src="assets/img/dummies/blog/img1.jpg" alt="" />
									</li>
									<li>
									<img src="assets/img/dummies/blog/img2.jpg" alt="" />
									</li>
									<li>
									<img src="assets/img/dummies/blog/img3.jpg" alt="" />
									</li>
								</ul>
							</div>
							
						</div>
						<p>
							 Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi, id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper laoreet perfecto ad qui, est rebum nulla argumentum ei. Fierent adipisci iracundia est ei, usu timeam persius ea. Usu ea justo malis, pri quando everti electram ei, ex homero omittam salutatus sed.
						</p>
						<div class="bottom-article">
							<ul class="meta-post">
								<li><i class="icon-calendar"></i><a href="#"> Mar 23, 2013</a></li>
								<li><i class="icon-user"></i><a href="#"> Admin</a></li>
								<li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
								<li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
							</ul>
							<a href="#" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
						</div>
				</article>
				<article>
						<div class="post-quote">
							<div class="post-heading">
								<h3><a href="#">Nice example of quote post format below</a></h3>
							</div>
							<blockquote>
								<i class="icon-quote-left"></i> Lorem ipsum dolor sit amet, ei quod constituto qui. Summo labores expetendis ad quo, lorem luptatum et vis. No qui vidisse signiferumque...
							</blockquote>
						</div>
						<div class="bottom-article">
							<ul class="meta-post">
								<li><i class="icon-calendar"></i><a href="#"> Mar 23, 2013</a></li>
								<li><i class="icon-user"></i><a href="#"> Admin</a></li>
								<li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
								<li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
							</ul>
							<a href="#" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
						</div>
				</article>
				<article>
						<div class="post-video">
							<div class="post-heading">
								<h3><a href="#">Amazing video post format here</a></h3>
							</div>
							<div class="video-container">
								<iframe src="http://player.vimeo.com/video/30585464?title=0&amp;byline=0">
								</iframe>
							</div>
						</div>
						<p>
							 Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi, id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper laoreet perfecto ad qui, est rebum nulla argumentum ei. Fierent adipisci iracundia est ei, usu timeam persius ea. Usu ea justo malis, pri quando everti electram ei.
						</p>
						<div class="bottom-article">
							<ul class="meta-post">
								<li><i class="icon-calendar"></i><a href="#"> Mar 23, 2013</a></li>
								<li><i class="icon-user"></i><a href="#"> Admin</a></li>
								<li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
								<li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
							</ul>
							<a href="#" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
						</div>
				</article>
				-->
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