<!DOCTYPE html>
<html>
<head>
	<title>Ebazaar | Home</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);
		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //for-mobile-apps -->
	<link href="<?php echo base_url(); ?>assets_ui/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo base_url(); ?>assets_ui/css/styles.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome icons -->
	<link href="<?php echo base_url(); ?>assets_ui/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //font-awesome icons -->
	<!-- js -->
	<script src="<?php echo base_url(); ?>assets_ui/js/jquery-1.11.1.min.js"></script>
	<!-- //js -->
	<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets_ui/js/move-top.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets_ui/js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->
</head>
<body>
	<!-- header -->
	<div class="agileits_header">
		<!-- Logo -->
		<div class="logoebazaar">
			<a href="<?php echo base_url('dashboard/index'); ?>" style="color: white; text-decoration: none;">
				e<span style="color: #ff5722;">ba</span>zaar<span style="color: #ff5722;">.</span>in
			</a>
		</div>

		<!-- Search bar -->
		<div class="search-nav">
			<form action="#" method="post" class="search-category">
				<input type="text" name="Product" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
				<button type="submit" value=" ">
					<i class="fa fa-search"></i>
				</button>
			</form>
		</div>

		<!-- User Data -->
		<div class="userData">
			<button type="button" title="Cart" data-toggle="modal" data-target="#cart" class="button">
    <i class="fa fa-shopping-cart"></i>
    (<span class="total-count" style="color:white; font-family: 'Open Sans', sans-serif;"></span>)
</button>


			<ul>
				<li class="dropdown_profile">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span>
					</a>
					<div class="mega-dropdown-menu">
						<ul class="dropdown-menu drp-mnu">
							<?php
							$session_data2 = $this->session->userdata();
							if ($session_data2['logged_in'] == FALSE): ?>
								<li><a href="<?php echo base_url('dashboard/login'); ?>">Login</a></li>
							<?php endif;
							if ($session_data2['logged_in'] == TRUE): ?>
								<li><a href="<?php echo base_url('dashboard/myorders'); ?>">My Orders</a></li>
								<li><a href="<?php echo base_url('auth/cust_logout'); ?>">Logout</a></li>
							<?php endif; ?>
						</ul>
					</div>
				</li>
			</ul>
			<h2><a href="<?php echo base_url('dashboard/mailpage'); ?>"><i class="fa fa-envelope"></i></a></h2>
		</div>
	</div>

	<!-- script-for sticky-nav -->
	<script>
		$(document).ready(function () {
			var navoffeset = $(".agileits_header").offset().top;
			$(window).scroll(function () {
				var scrollpos = $(window).scrollTop();
				if (scrollpos >= navoffeset) {
					$(".agileits_header").addClass("fixed");
				} else {
					$(".agileits_header").removeClass("fixed");
				}
			});
		});
	</script>
	<hr>
	<!-- //script-for sticky-nav -->
	<div class="logo_products">
		<div class="container">
			<button id="toggleSidebar" class="sidebar-toggle">
				<i class="fa fa-bars"></i> <!-- Toggle button icon -->
			</button>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a href="<?php echo base_url('dashboard/events'); ?>">Events</a></li>
					<li><a href="<?php echo base_url('dashboard/about'); ?>">About Us</a></li>
					<li><a href="<?php echo base_url('dashboard/products'); ?>">Best Deals</a></li>
					<li><a href="<?php echo base_url('dashboard/services'); ?>">Services</a></li>
				</ul>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">store@grocery.com</a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<!-- banner -->
	<div class="banner">
		<!-- Sidebar (left navigation) -->
		<div class="w3l_banner_nav_left collapse-sidebar">
			<nav class="navbar nav_bottom">
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
						<?php
						$cat_data = $this->Model_products->getCategoryData();
						if (!isset($shop_id)): $shop_id = 1; endif;
						foreach ($cat_data as $k => $v): ?>
							<li><a href="<?php echo base_url('dashboard/catalouge/' . $v['cat_id'] . '/' . $shop_id); ?>"><?php echo $v['cat_name']; ?></a></li>
						<?php endforeach; ?>
					</ul>
					<!-- Close button inside sidebar -->
					<button id="closeSidebar" class="close-sidebar">
						<i class="fa fa-times"></i> Close
					</button>
				</div>
			</nav>
		</div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!-- JavaScript to handle toggle functionality -->
	<script>
		$(document).ready(function () {
			// Toggle sidebar on button click
			$('#toggleSidebar').click(function () {
				$('.w3l_banner_nav_left').toggleClass('active');
			});

			// Close sidebar on close button click
			$('#closeSidebar').click(function () {
				$('.w3l_banner_nav_left').removeClass('active');
			});
		});
	</script>

</body>

</html>
