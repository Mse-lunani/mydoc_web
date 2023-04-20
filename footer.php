<!-- footer -->
<footer class="footer-bg footer-p">
	<div class="overly"><img src="img/an-bg/footer-bg.png" alt="rest" /></div>
	<div class="footer-top pb-30" style="background-color: #ecf1fa">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-xl-3 col-lg-3 col-sm-6">
					<div class="footer-widget mb-30">
						<div class="flog mb-35">
							<a href="#"><img src="img/logo/logo.png" alt="logo" /></a>
						</div>
						<div class="footer-text mb-20">
							<p>
								As a value-based healthcare solutions provider we consider ourselves health workers first;
								and our mission is to become access equalizers in healthcare delivery in Kenya,
								as well as the Great Lakes Region.
							</p>
						</div>
						<div class="footer-social">
							<a href="#"><i class="fab fa-facebook-f"></i></a>
							<a href="#"><i class="fab fa-twitter"></i></a>
							<a href="#"><i class="fab fa-instagram"></i></a>
							<a href="#"><i class="fab fa-google-plus-g"></i></a>
						</div>
					</div>
				</div>

				<div class="col-xl-2 col-lg-2 col-sm-6">
					<div class="footer-widget mb-30">
						<div class="f-widget-title">
							<h5>Our Links</h5>
						</div>
						<div class="footer-link">
							<ul>
								<li>
									<a href="#"><i class="fas fa-chevron-right"></i> Partners</a>
								</li>


								<li>
									<a href="#"><i class="fas fa-chevron-right"></i> Terms &
										Conditions</a>
								</li>
								<li>
									<a href="#"><i class="fas fa-chevron-right"></i> Help</a>
								</li>

							</ul>
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-lg-2 col-sm-6">
					<div class="footer-widget mb-30">
						<div class="f-widget-title">
							<h5>Other Links</h5>
						</div>
						<div class="footer-link">
							<ul>
								<li>
									<a href="#"><i class="fas fa-chevron-right"></i> Home</a>
								</li>
								<li>
									<a href="#"><i class="fas fa-chevron-right"></i> About Us</a>
								</li>
								<li>
									<a href="#"><i class="fas fa-chevron-right"></i> Services</a>
								</li>

							</ul>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-sm-6">
					<div class="footer-widget mb-30">
						<div class="f-widget-title">
							<h5>Contact Us</h5>
						</div>
						<div class="footer-link">
							<div class="f-contact">
								<ul>
									<li>
										<i class="icon dripicons-phone"></i>
										<span>+254 721 575 442</span>
									</li>
									<li>
										<i class="icon dripicons-mail"></i>
										<span><a href="mailto:info@my-daktari.com/">info@my-daktari.com</a></span>
									</li>
									<li>
										<i class="fal fa-map-marker-alt"></i>
										<span>380 St Kilda Road, Nairobi<br />VIC 3004,
											Kenya
										</span>
									</li>
									<li>
										<img src="img/badge.jpeg" class="HiddenOnLaptop" style="width:100%">
									</li>

								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="BadgePosition">
				<img src="img/badge.jpeg" style="width:25%;border-radius: 20px;">
			</div>
		</div>
	</div>
	<div class="copyright-wrap">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="copyright-text text-center">
						<p>&copy; <?= date('Y') ?> MyDaktari. Powered by Vesen Computing.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- footer-end -->

<style>
	.MyListedRow li {
		font-size: 0.8em;
	}

	.HiddenOnLaptop {
		display: none;
	}


	.DoctorSlider {
		width: 150%;
		margin-left: 50px;
		position: absolute;
		top: -500px;
		bottom: 0;
		left: 0;
		right: 0;
	}

	.HeaderText {
		margin-bottom: 100px;
	}

	.Flexing {
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.DifferentUsers h5 {
		text-align: center;
	}

	.DoctorSlider img {
		border-radius: 45% 55% 69% 31% / 53% 49% 51% 47%;
		/* border-radius: 30%;  */
		height: 100vh;
		-o-object-fit: cover;
		object-fit: cover;
	}

	.RoundedBackground {
		border-radius: 73% 27% 49% 51% / 53% 62% 38% 47%;
		background-color: #0154BA;
	}

	.MyDaktariCard {
		box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
		width: 90%;
		border-radius: 10px;
		padding: 10px;
		margin-top: 20px;
		margin-bottom: 30px;
		height: 100px;
		display: flex;
		justify-content: start;
		align-items: center;
		font-size: 0.9em;
	}

	.BadgePosition {
		display: flex;
		justify-content: center;
		margin-top: -15em;
		margin-bottom: 15em;
		margin-right: 12em;
	}

	.HiddenOnMobile {
		display: block;
	}
	
	.HeaderBadge{
	    width:50%;
	}
	
	.DeeStart{
	    display:flex;
	}
	
	

	@media screen and (max-width:600px) {
		.HeaderText {
			margin-bottom: unset;
		}

		.department-area li {
			display: flex;
			margin-bottom: 0px;
		}

		.BadgePosition {
			display: none;
		}

		.HiddenOnLaptop {
			display: block;
		}

		.HiddenOnMobile {
			display: none;
		}
		
		.SmallerOnMobile{
	    width: 60%;
	}
	}
</style>

<!-- JS here -->
<!-- JS here -->
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="js/vendor/jquery-1.12.4.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/one-page-nav-min.js"></script>
<script src="js/jquery.meanmenu.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/ajax-form.js"></script>
<script src="js/paroller.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/js_isotope.pkgd.min.js"></script>
<script src="js/imagesloaded.min.js"></script>
<script src="js/parallax.min.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/parallax-scroll.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/element-in-view.js"></script>
<script src="js/main.js"></script>
</body>

</html>