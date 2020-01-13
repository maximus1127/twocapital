@extends('layouts.app')

@section('header_styles')
<style>
.dark-footer{
	display:none;
}
</style>
@endsection
@section('content')
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->

			<!-- ============================ User Dashboard ================================== -->
			<section class="error-wrap">
				<div class="container">
					<div class="row justify-content-center">

						<div class="col-lg-6 col-md-10">
							<div class="text-center">

								<img src="assets/img/404.png" class="img-fluid" alt="">
								<p>For some reason, we can't seem to find what you're looking for. If this continues to happen, please contact the admin team. </p>
								<a class="btn btn-theme" href="https://saltcapitalportal.biz">Use Portal Classic</a>

							</div>
						</div>

					</div>
				</div>
			</section>
			<!-- ============================ User Dashboard End ================================== -->
		@endsection
