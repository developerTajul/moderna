<?php 
require_once 'vendor/autoload.php';
use App\classes\Database;
use App\classes\PostController;

$post = new PostController;
if( isset( $_GET['post_id'] ) ){
    $current_post_id = $_GET['post_id'];
    $single_post = $post->single_post($current_post_id);
}

if( isset( $_GET['cat_slug'] ) ){
    $current_post_slug = $_GET['cat_slug'];
    $cat_post = $post->category_post( $current_post_slug );
}


if( isset( $_GET['user_id'] ) ){
    $current_user_id = $_GET['user_id'];
    $user_posts = $post->user_wise_post($current_user_id); 
    echo "<pre>";
    print_r( $user_posts );
    echo "</pre>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Moderna - Bootstrap 3 flat corporate template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://bootstraptaste.com" />
<!-- css -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="assets/css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="assets/css/jcarousel.css" rel="stylesheet" />
<link href="assets/css/flexslider.css" rel="stylesheet" />
<link href="assets/css/style.css" rel="stylesheet" />


<!-- Theme skin -->
<link href="assets/skins/default.css" rel="stylesheet" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper">
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><span>M</span>oderna</a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li class="dropdown ">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Features <b class=" icon-angle-down"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="components.html">Components</a></li>
								<li><a href="pricingbox.html">Pricing box</a></li>
                            </ul>
                        </li>
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li class="active"><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->