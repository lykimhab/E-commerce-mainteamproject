<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title> eCommerce </title>
	<!-- Favicon -->
  <base href="/">
	<link rel="icon" type="user/assets/image/png" href="user/assets/images/logo.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="user/assets/css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="user/assets/css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="user/assets/css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="user/assets/css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="user/assets/css/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="user/assets/css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="user/assets/css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="user/assets/css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="user/assets/css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="user/assets/css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="user/assets/css/reset.css">
	<link rel="stylesheet" href="user/assets/style.css">
    <link rel="stylesheet" href="user/assets/css/responsive.css">

	
	
</head>
<body class="js">
	
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	
	
	<!-- Header -->
	@include('customer.include.header')
	<!--/ End Header -->
	
	<!-- Slider Area -->
	<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="https://as2.ftcdn.net/v2/jpg/02/21/92/47/1000_F_221924727_22gAZipfnoFh5hjuCrMGkgjflxrFnRyf.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="text-lg-center text-danger my-4">Lorem Ipsum</h2>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://as1.ftcdn.net/v2/jpg/03/03/46/92/1000_F_303469293_trQsPvECtbAYyKW7JfavMPG7RG7SG1gz.jpg" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h2>Lorem Ipsum</h2>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://img.freepik.com/free-photo/supermarket-banner-concept-with-ingredients_23-2149421125.jpg?w=2000" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h2>Lorem Ipsum</h2>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>




	<!--/ End Slider Area -->
	
	<!-- Start Small Banner  -->
	@yield('content')
	
	<!-- Start Footer Area -->
	@include('customer.include.footer')
	<!-- /End Footer Area -->
 
	<!-- Jquery -->
    <script src="user/assets/js/jquery.min.js"></script>
    <script src="user/assets/js/jquery-migrate-3.0.0.js"></script>
	<script src="user/assets/js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="user/assets/js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="user/assets/js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="user/assets/js/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="user/assets/js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="user/assets/js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="user/assets/js/magnific-popup.js"></script>
	<!-- Waypoints JS -->
	<script src="user/assets/js/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="user/assets/js/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	<script src="user/assets/js/nicesellect.js"></script>
	<!-- Flex Slider JS -->
	<script src="user/assets/js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="user/assets/js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="user/assets/js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="user/assets/js/easing.js"></script>
	<!-- Active JS -->
	<script src="user/assets/js/active.js"></script>
	<script>
    // JavaScript/jQuery to toggle the categories dropdown
    $(document).ready(function () {
        $('#categories-toggle').click(function () {
            $('#categories-dropdown').slideToggle();
        });
    });
</script>
</body>
</html>