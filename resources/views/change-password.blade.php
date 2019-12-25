@extends('layouts.app')


			<!-- ============================ Page Title End ================================== -->

			<!-- ============================ User Dashboard ================================== -->
			<section>
				<div class="container">
					<div class="row">
	@include('partials.myprofile-column')


						<div class="col-lg-8 col-md-12">
							<div class="dashboard-wraper">

								<!-- Basic Information -->
								<div class="form-submit">
									<h4>Change Your Password</h4>
									<div class="submit-section">
										<form method="post" action="{{route('change-password')}}" id="pwForm">
											@csrf

										<div class="form-row">

											<div class="form-group col-lg-12 col-md-6">
												<label>Old Password</label>
												<input type="password" class="form-control" name="oldPw">
												<small style="color: red; display: none" id="oldPwError"></small>
											</div>

											<div class="form-group col-md-6">
												<label>New Password</label>
												<input type="password" class="form-control" name="newPw1" id="newPw1">
											</div>

											<div class="form-group col-md-6">
												<label>Confirm password</label>
												<input type="password" class="form-control" name="newPw2" id="newPw2">
											</div>

											<div class="form-group col-lg-12 col-md-12">
												<button class="btn btn-theme" type="submit">Save Changes</button>
											</div>

										</div>
									</form>
									</div>
								</div>

							</div>
						</div>

					</div>
				</div>
			</section>
			<!-- ============================ User Dashboard End ================================== -->


			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
