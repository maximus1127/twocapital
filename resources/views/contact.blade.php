@extends('layouts.app')
			<!-- End Navigation -->

			@section('content')
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->

			<!-- ============================ Page Title Start================================== -->
			<div class="page-title">
				<div class="container">
					@if ($message = Session::get('success'))
				<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>{{ $message }}</strong>
				</div>
				@endif

					<div class="row">
						<div class="col-lg-12 col-md-12">

							<h2 class="ipt-title">Contact Us</h2>
							<span class="ipn-subtitle">We'd love to hear from you!</span>

						</div>
					</div>
				</div>
			</div>
			<!-- ============================ Page Title End ================================== -->

			<!-- ============================ Agency List Start ================================== -->
			<section>

				<div class="container">

					<!-- row Start -->
					<div class="row">

						<div class="col-lg-7 col-md-7">
							<form action="{{route('sendContactForm')}}" method="post">
								@csrf
							<div class="row">
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<label>Name</label>
										<input type="text" class="form-control simple" value="{{Auth::user()->fname.' '.Auth::user()->lname}}" readonly>
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<label>Email</label>
										<input type="email" class="form-control simple" value="{{Auth::user()->email}}" readonly>
									</div>
								</div>
							</div>


							<div class="form-group">
								<label>Message</label>
								<textarea class="form-control simple" name="message"></textarea>
							</div>

							<div class="form-group">
								<button class="btn btn-theme" type="submit">Submit Request</button>
							</div>
						</form>
						</div>

						<div class="col-lg-5 col-md-5">
							<div class="contact-info">

								<h2>Get In Touch</h2>
								<p>The admin team is always at your service. Reach out in multiple ways to have your questions answered. </p>

								<div class="cn-info-detail">
									<div class="cn-info-icon">
										<i class="ti-home"></i>
									</div>
									<div class="cn-info-content">
										<h4 class="cn-info-title">Reach Us</h4>
										{{-- 2512, New Market,<br>Eliza Road, Sincher 80 CA,<br>Canada, USA --}}
										412 W University, Lafayette LA 70506, United States
									</div>
								</div>

								<div class="cn-info-detail">
									<div class="cn-info-icon">
										<i class="ti-email"></i>
									</div>
									<div class="cn-info-content">
										<h4 class="cn-info-title">Drop A Mail</h4>
										saltcapitalequitygroup@gmail.com
									</div>
								</div>

								<div class="cn-info-detail">
									<div class="cn-info-icon">
										<i class="ti-mobile"></i>
									</div>
									<div class="cn-info-content">
										<h4 class="cn-info-title">Call Us</h4>
										+1 (832) 909-7581
									</div>
								</div>

							</div>
						</div>

					</div>
					<!-- /row -->

				</div>

			</section>
		@endsection
