<!DOCTYPE html>
<html lang="zxx">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <title>Salt Capital</title>

        <!-- All Plugins Css -->
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('/assets/css/plugins.css')}}">
		<link rel="stylesheet" href="{{asset('/assets/css/nav.css')}}" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />


        <!-- Custom CSS -->
        <link href="{{asset('/assets/css/styles.css')}}" rel="stylesheet">

		<!-- Custom Color Option -->
		<link href="{{asset('/assets/css/colors.css')}}" rel="stylesheet">
		@yield('header_styles')
    <style>

    </style>

    </head>

    <body class="green-skin">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div id="preloader"><div class="preloader"><span></span><span></span></div></div>


        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">

            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
            <!-- Start Navigation -->

      <div class="header header-light nav-left-side">
        @auth
        <nav class="headnavbar">
          <div class="nav-header">
            <a href="{{route('home')}}" class="brand"><img src="{{asset('img/Logo.png')}}" style="max-width: 80px;" alt="" /></a>
            <button class="toggle-bar"><span class="ti-align-justify"></span></button>
          </div>
          <ul class="menu">

            {{-- <li class="dropdown">
              <a class="active" href="JavaScript:Void(0);">Home</a>
              <ul class="dropdown-menu">
                <li><a href="index.html">Home Layout 1</a></li>
                <li><a href="home-2.html">Home Layout 2</a></li>
                <li><a href="home-3.html">Home Layout 3</a></li>
                <li><a href="home-4.html">Home Layout 4</a></li>
                <li><a href="home-5.html">Home Layout 5</a></li>
                <li><a href="home-6.html">Home Layout 6</a></li>
                <li><a href="home-7.html">Home Layout 7</a></li>
                <li><a href="home-8.html">Home Layout 8</a></li>
                <li><a class="active" href="map.html">Map Home Layout</a></li>
              </ul>
            </li> --}}

            <li class="dropdown">
              <a href="JavaScript:Void(0);">Listings</a>
              <ul class="dropdown-menu">
                {{-- <li class="dropdown">
                  <a href="JavaScript:Void(0);">List Layouts</a>
                  <ul class="dropdown-menu"> --}}
                    <li><a href="{{route('view-listings')}}">All Active Listings</a></li>
                    <li><a href="{{route('funded-listings')}}">View Funded Listings</a></li>
                    {{-- <li><a href="list-layout-full.html">Full Width</a></li> --}}
                  {{-- </ul>
                </li> --}}
                {{-- <li class="dropdown">
                  <a href="JavaScript:Void(0);">Grid Layouts</a>
                  <ul class="dropdown-menu">
                    <li><a href="grid-layout-with-sidebar.html">With Sidebar</a></li>
                    <li><a href="classical-layout-with-sidebar.html">Classical With Sidebar</a></li>
                    <li><a href="grid-layout-with-map.html">With Map</a></li>
                    <li><a href="grid.html">Full Width</a></li>
                    <li><a href="classical-property.html">Classical Full Width</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="JavaScript:Void(0);">With Map Layouts</a>
                  <ul class="dropdown-menu">
                    <li><a href="list-layout-with-map.html">List With Map</a></li>
                    <li><a href="grid-layout-with-map.html">Grid With Map</a></li>
                    <li><a href="classical-layout-with-map.html">Classical With Map</a></li>
                    <li><a href="half-map.html">Half Map Search</a></li>
                  </ul>
                </li> --}}
              </ul>
            </li>

            <li class="dropdown">
              <a href="JavaScript:Void(0);">My Salt</a>
              <ul class="dropdown-menu">
                {{-- <li class="dropdown">
                  <a href="JavaScript:Void(0);">Single Property</a>
                  <ul class="dropdown-menu">
                    <li><a href="single-property-1.html">Single Property 1</a></li>
                    <li><a href="single-property-2.html">Single Property 2</a></li>
                    <li><a href="single-property-3.html">Single Property 3</a></li>
                  </ul>
                </li> --}}
                {{-- <li class="dropdown">
                  <a href="JavaScript:Void(0);">Agencies & Agents</a>
                  <ul class="dropdown-menu">
                    <li><a href="agents.html">Agents List</a></li>
                    <li><a href="agent-page.html">Agent Page</a></li>
                    <li><a href="agencies.html">Agencies List</a></li>
                    <li><a href="agency-page.html">Agency Page</a></li>
                  </ul>
                </li> --}}
                <li class="dropdown">
                  <a href="JavaScript:Void(0);">My Account</a>
                  <ul class="dropdown-menu">
                    <li><a href="{{route('update-profile')}}">My Profile</a></li>
                    <li><a href="{{route('viewMyActive')}}">Property List</a></li>
                    {{-- <li><a href="bookmark-list.html">Bookmarked Listings</a></li>
                    <li><a href="change-password.html">Change Password</a></li> --}}
                  </ul>
                </li>
                {{-- <li>
                  <a href="compare-property.html">Compare Property</a>
                </li>
                <li>
                  <a href="submit-property.html">Submit Property</a>
                </li> --}}
              </ul>
            </li>
						@if(Auth::user()->role == 'super')
							<li class="dropdown">
	              <a href="JavaScript:Void(0);">Manage</a>
	              <ul class="dropdown-menu">
	                <li class="dropdown">
	                  <a href="JavaScript:Void(0);">Users</a>
	                  <ul class="dropdown-menu">
	                    <li><a href="{{route('view-all-users')}}">All Users</a></li>
	                    <li><a href="{{route('approval-list')}}">All Pending Users</a></li>
	                  </ul>
	                </li>
	                <li class="dropdown">
	                  <a href="JavaScript:Void(0);">Investments</a>
	                  <ul class="dropdown-menu">
	                    <li><a href="#">Add Investment</a></li>
	                    <li><a href="{{route('view-active-investments')}}">Active Investments</a></li>
	                    <li><a href="{{route('view-pending-investments')}}">Pending Investments</a></li>
	                    <li><a href="{{route('view-completed-investments')}}">Completed Investments</a></li>
	                    <li><a href="#">Cancelled Investments</a></li>
	                  </ul>
	                </li>
	                <li class="dropdown">
	                  <a href="JavaScript:Void(0);">With Map Layouts</a>
	                  <ul class="dropdown-menu">
	                    <li><a href="list-layout-with-map.html">List With Map</a></li>
	                    <li><a href="grid-layout-with-map.html">Grid With Map</a></li>
	                    <li><a href="classical-layout-with-map.html">Classical With Map</a></li>
	                    <li><a href="half-map.html">Half Map Search</a></li>
	                  </ul>
	                </li>
	              </ul>
	            </li>
					@endif

          </ul>
          @if(Auth::user()->role == 'super')
          <ul class="attributes attributes-desk">
            <li class="submit-attri theme-log"><a href="{{route('create-listing')}}">Submit Property</a></li>
          </ul>
					@endif
        </nav>
      @endauth
      </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
		<!-- ============================ Footer Start ================================== -->
		<footer class="dark-footer skin-dark-footer">
			<div>
				<div class="container">
					<div class="row">

						<div class="col-lg-3 col-md-6">
							<div class="footer-widget">
								<h4 class="widget-title">About Salt Capital</h4>
								<p>Salt Capital Equity Group is trying to bridge the gap into the real estate market between small investors and otherwise out-of-reach opportunities.</p>
								<a href="#" class="other-store-link">
									{{-- <div class="other-store-app">
										<div class="os-app-icon">
											<i class="ti-android"></i>
										</div>
										<div class="os-app-caps">
											Google Store
										</div>
									</div> --}}
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="footer-widget">
								<h4 class="widget-title">Useful links</h4>
								<ul class="footer-menu">
									<li><a href="about-us.html">Cancel An Investment</a></li>
									<li><a href="faq.html">Contact Admin</a></li>

								</ul>
							</div>
						</div>

						{{-- <div class="col-lg-3 col-md-6">
							<div class="footer-widget">
								<h4 class="widget-title">Get in Touch</h4>
								<div class="fw-address-wrap">
									<div class="fw fw-location">
										7744 North Park, New York
									</div>
									<div class="fw fw-mail">
										support@drizvato77.com
									</div>
									<div class="fw fw-call">
										+91 254 584 7584
									</div>
									<div class="fw fw-skype">
										drizvato77
									</div>
									<div class="fw fw-web">
										www.Themez Hub.com
									</div>
								</div>
							</div>
						</div> --}}

						<div class="col-lg-3 col-md-6">
							<div class="footer-widget">
								<h4 class="widget-title">Follow Us</h4>
								<p>Follow to get updates on what we're up to.</p>
								<ul class="footer-bottom-social">
									<li><a href="#"><i class="ti-facebook"></i></a></li>
									<li><a href="#"><i class="ti-twitter"></i></a></li>
									<li><a href="#"><i class="ti-instagram"></i></a></li>
									<li><a href="#"><i class="ti-linkedin"></i></a></li>
								</ul>

								{{-- <form class="f-newsletter mt-4">
									<input type="email" class="form-control sigmup-me" placeholder="Your Email Address" required="required">
									<button type="submit" class="btn"><i class="ti-arrow-right"></i></button>
								</form> --}}
							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="footer-bottom">
				<div class="container">
					<div class="row align-items-center">

						<div class="col-lg-12 col-md-12 text-center">
							<p class="mb-0">© 2019 Salt Capital. Designd By <a href="https://themezhub.com">Themez Hub</a> All Rights Reserved</p>
						</div>

					</div>
				</div>
			</div>
		</footer>
		<script src="{{asset('/js/app.js')}}"></script>
    <script src="{{asset('/assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('/assets/js/popper.min.js')}}"></script>
		<script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('/assets/js/rangeslider.js')}}"></script>
		<script src="{{asset('/assets/js/select2.min.js')}}"></script>
		<script src="{{asset('/assets/js/aos.js')}}"></script>
		<script src="{{asset('/assets/js/owl.carousel.min.js')}}"></script>
		<script src="{{asset('/assets/js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('/assets/js/slick.js')}}"></script>
		<script src="{{asset('/assets/js/slider-bg.js')}}"></script>
		<script src="{{asset('/assets/js/lightbox.js')}}"></script>
		<script src="{{asset('/assets/js/imagesloaded.js')}}"></script>
		<script src="{{asset('/assets/js/isotope.min.js')}}"></script>
		<script src="{{asset('/assets/js/coreNavigation.js')}}"></script>
		<script src="{{asset('/assets/js/custom.js')}}"></script>

		<!-- Map -->
		@yield('footer-scripts')
		<script src="http://maps.google.com/maps/api/js?key=AIzaSyCr6kzadiLQhKFEFPSHU4QFtR3GClvLZtM"></script>
		<script src="{{asset('/assets/js/map_infobox.js')}}"></script>
		<script src="{{asset('/assets/js/markerclusterer.js')}}"></script>
		<script src="{{asset('/assets/js/map.js')}}"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->

	</body>
</html>
