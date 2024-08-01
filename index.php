<style>
	/* Add your CSS for the logout message box here */
	#logout-message {
		display: none;
		/* Hide the message by default */
		background-color: rgb(255, 192, 140);
		/* Light green background */
		color: rgb(0, 0, 0);
		/* Dark green text */
		/* border: 1px solid rgb(0, 0, 0); */
		/* Light green border */
		padding: 10px;
		margin: 20px auto;
		/* Center the message box */
		width: fit-content;
		/* Adjust the width based on content */
		border-radius: 5px;
		/* Rounded corners */
		font-size: 14px;
		text-align: center;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		/* Subtle shadow */
		position: fixed;
		/* Fix the position relative to the viewport */
		top: 100px;
		/* Adjust the top distance from the viewport */
		left: 20%;
		/* Center the box horizontally */
		transform: translateX(-50%);
		/* Adjust horizontal alignment */
		z-index: 1000;
		/* Ensure it is on top of other elements */
	}
</style>
<?php
// Check if the logout query parameter is set
if (isset($_GET['logout']) && $_GET['logout'] == 'success') {
	echo '<div id="logout-message">You have logged Out</div>';
}
?>
<?php session_start(); ?>
<?php include "header.php";
include "con1.php"; ?>
<!-- start banner Area -->
<section class="banner-area" id="main-content">
	<div class="container">
		<div class="row fullscreen align-items-center justify-content-start">
			<div class="col-lg-12">
				<div class="active-banner-slider owl-carousel">
					<!-- single-slide -->
					<div class="row single-slide align-items-center d-flex">
						<div class="col-lg-5 col-md-6">
							<div class="banner-content">
								<h1>Nike New <br>Collection!</h1>
								<p>Nike has been creating great iconic sportswear for over five decades. The Nike Swoosh
									has become a staple for athletes and sneakerheads all over the world. Since 1964,
									Nike has created some of the best sneakers that not only influenced the sneakerhead
									culture but change the sneaker game completely.
								</p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="banner-img">
								<img class="img-fluid" src="img/banner/banner-img.png" alt="">
							</div>
						</div>
					</div>
					<!-- single-slide -->
					<div class="row single-slide">
						<div class="col-lg-5">
							<div class="banner-content">
								<h1>Nike New <br>Collection!</h1>
								<p>The best shoe that ever created by Nike is the Air Force 1 designed by Bruce Kilgore
									which were inspired by the American presidential plane. These sneakers were the
									first to use “Air Technology”. They are offered in low, mid and high-top shapes.</p>
								<!-- <div class="add-bag d-flex align-items-center">
									<a class="add-btn" href="cart.php"><span class="lnr lnr-cross"></span></a>
									<span class="add-text text-uppercase">Add to Bag</span>
								</div> -->
							</div>
						</div>
						<div class="col-lg-7">
							<div class="banner-img">
								<img class="img-fluid" src="img/banner/n2.png" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->

<!-- start features Area -->
<section class="features-area section_gap">
	<div class="container">
		<div class="row features-inner">
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon1.png" alt="">
					</div>
					<h6>Free Delivery</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon2.png" alt="">
					</div>
					<h6>Return Policy</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon3.png" alt="">
					</div>
					<h6>24/7 Support</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon4.png" alt="">
					</div>
					<h6>Secure Payment</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end features Area -->

<!-- Start category Area -->
<section class="category-area">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-12">
				<div class="row">
					<div class="col-lg-8 col-md-8">
						<div class="single-deal">
							<div class="overlay"></div>
							<img class="img-fluid w-100" src="img/category/c1.jpg" alt="">
							<a href="img/category/c1.jpg" class="img-pop-up" target="_blank">
								<div class="deal-details">
									<h6 class="deal-title">Sneaker for Sports</h6>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="single-deal">
							<div class="overlay"></div>
							<img class="img-fluid w-100" src="img/category/c2.jpg" alt="">
							<a href="img/category/c2.jpg" class="img-pop-up" target="_blank">
								<div class="deal-details">
									<h6 class="deal-title">Sneaker for Sports</h6>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="single-deal">
							<div class="overlay"></div>
							<img class="img-fluid w-100" src="img/category/c3.jpg" alt="">
							<a href="img/category/c3.jpg" class="img-pop-up" target="_blank">
								<div class="deal-details">
									<h6 class="deal-title">Product for Couple</h6>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-8 col-md-8">
						<div class="single-deal">
							<div class="overlay"></div>
							<img class="img-fluid w-100" src="img/category/c4.jpg" alt="">
							<a href="img/category/c4.jpg" class="img-pop-up" target="_blank">
								<div class="deal-details">
									<h6 class="deal-title">Sneaker for Sports</h6>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="single-deal">
					<div class="overlay"></div>
					<img class="img-fluid w-100" src="img/category/c5.jpg" alt="">
					<a href="img/category/c5.jpg" class="img-pop-up" target="_blank">
						<div class="deal-details">
							<h6 class="deal-title">Sneaker for Sports</h6>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End category Area -->


<!-- start product Area -->

<!-- end product Area -->

<!-- Start exclusive deal Area -->
<section class="exclusive-deal-area">
	<div class="container-fluid">
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-6 no-padding exclusive-left">
				<div class="row clock_sec clockdiv" id="clockdiv">
					<div class="col-lg-12">
						<h1>Exclusive Hot Deal Ends Soon!</h1>
						<p>Use the Coupon code for Maximum Discounts.</p>
					</div>
					<div class="col-lg-12">
						<?php
						// Define the query to fetch coupon data
						$query = "SELECT code, discount_percentage, expiration_date FROM coupons";
						$result = $con1->query($query);

						// Check if the query was successful
						if (!$result) {
							die("Query failed: " . $con1->error);
						}
						?>

						<!-- <!DOCTYPE html> -->
						<html lang="en">

						<body>
							<!-- <h1>Coupons List</h1> -->
							<div>
								<?php if ($result->num_rows > 0): ?>
									<?php while ($coupon = $result->fetch_assoc()): ?>
										<div class="row clock-wrap">
											<span class="col clockinner clockinner1"><strong>Discount:</strong>
												<?php echo htmlspecialchars($coupon['discount_percentage']); ?>%</span>&nbsp;&nbsp;&nbsp;&nbsp;
											<span class="col clockinner clockinner1"><strong>Code:</strong>
												<?php echo htmlspecialchars($coupon['code']); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
											<span class="col clockinner clockinner1"><strong>Expires:</strong>
												<?php echo htmlspecialchars($coupon['expiration_date']); ?></span>
										</div>
									<?php endwhile; ?>
								<?php else: ?>
									<div class="row clock-wrap">
										<span class="col clockinner clockinner1">
											<strong>No coupons available</strong>
										</span>
									</div>
								<?php endif; ?>
							</div>
						</body>

						</html>
					</div>
				</div>
				<a href="shop1.php" class="primary-btn">Shop Now</a>
			</div>
			<div class="col-lg-6 no-padding exclusive-right">
				<div class="active-exclusive-product-slider">
					<!-- single exclusive carousel -->
					<div class="single-exclusive-slider">
						<img class="img-fluid" src="img/product/e-p1.png" alt="">
						<div class="product-details">
							<!-- <div class="price">
								<h6>₹15000.00</h6>
								<h6 class="l-through">₹21000.00</h6>
							</div> --><br>
							<h4>addidas New Hammer sole
								for latest Style</h4>
							<!-- <div class="add-bag d-flex align-items-center justify-content-center">
								<a class="add-btn" href=""><span class="ti-bag"></span></a>
								<span class="add-text text-uppercase">Add to Bag</span>
							</div> -->
						</div>
					</div>
					<!-- single exclusive carousel -->
					<div class="single-exclusive-slider">
						<img class="img-fluid" src="img/banner/banner-img.png" alt="">
						<div class="product-details">
							<!-- <div class="price">
								<h6>₹15000.00</h6>
								<h6 class="l-through">₹21000.00</h6>
							</div> -->
							<h4>addidas New Hammer sole
								for sports person</h4>
							<!-- <div class="add-bag d-flex align-items-center justify-content-center">
								<a class="add-btn" href=""><span class="ti-bag"></span></a>
								<span class="add-text text-uppercase">Add to Bag</span>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End exclusive deal Area -->

<!-- Start brand Area -->
<section class="brand-area section_gap">
	<div class="container">
		<div class="row">
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="img/brand/1.png" alt="">
			</a>
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="img/brand/2.png" alt="">
			</a>
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="img/brand/3.png" alt="">
			</a>
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="img/brand/4.png" alt="">
			</a>
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="img/brand/5.png" alt="">
			</a>
		</div>
	</div>
</section>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		<?php if (!isset($_GET['page'])): ?>
			document.getElementById('main-content').scrollIntoView({ behavior: 'smooth' });
		<?php endif; ?>
	});
</script>
<!-- Logout script-->
<script>
	// Check if the logout message is present
	window.onload = function () {
		var logoutMessage = document.getElementById('logout-message');
		if (logoutMessage) {
			// Show the logout message
			logoutMessage.style.display = 'block';
			// Hide the logout message after 2-4 seconds
			setTimeout(function () {
				logoutMessage.style.display = 'none';
			}, 3000); // 3000 milliseconds = 3 seconds
		}
	};
</script>
<!-- End brand Area -->

<!-- end main page -->
<?php include "Footer.php"; ?>