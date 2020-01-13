@extends('layouts.app')
@section('content')

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
									<div class="form-submit" style="border-bottom: 2px solid #27b737; padding-top: 10px">

 					         <div class="submit-section">
 					           <div class="form-row">

 					             <div class="form-group col-md-6">
 					               <label>Completed Investments</label>
 					               <h3>${{number_format($completed_dollars)}}</h3>
 					             </div>

 					             <div class="form-group col-md-6">
 					               <label>Active Investments</label>
 					               <h3>${{number_format($active_dollars)}}</h3>
 					             </div>

 					             <div class="form-group col-md-6">
 					               <label>Completed Projects</label>
 					               <h3>{{number_format($completed_projects)}}</h3>
 					             </div>

 					             <div class="form-group col-md-6">
 					               <label>Active Projects</label>
 					               <h3>{{number_format($active_projects)}}</h3>
 					             </div>

 					             <div class="form-group col-md-6">
 					               <label>Profit</label>
 					               <a href="{{route('view-my-completed-investments')}}"><h3 style="color: #27B737">${{number_format($earned_dollars)}}</h3></a>
 					             </div>



 					           </div>
 					         </div>
 					       </div>
									<form method="post" action="{{route('update-profile')}}" enctype="multipart/form-data">

										@csrf
									<h4>My Account</h4>
									<div class="submit-section">
										<div class="form-row">

											<div class="form-group col-md-3">
												<label>First Name</label>
												<input type="text" class="form-control" value="{{$user->fname}}" name="first_name">
											</div>
											<div class="form-group col-md-3">
												<label>Last Name</label>
												<input type="text" class="form-control" value="{{$user->lname}}" name="last_name">
											</div>

											<div class="form-group col-md-6">
												<label>Email</label>
												<input type="email" class="form-control" value="{{$user->email}}" name="email">
											</div>

											<div class="form-group col-md-6">
												<label>Organization Name</label>
												<input type="text" class="form-control" value="{{$user->organization_name}}" name="organization_name">
											</div>

											<div class="form-group col-md-6">
												<label>Phone</label>
												<input type="text" class="form-control" value="{{$user->phone}}" name="phone">
											</div>

											<div class="form-group col-md-6">
												<label>Address</label>
												<input type="text" class="form-control" value="{{$user->address}}" name="address">
											</div>

											<div class="form-group col-md-6">
												<label>City</label>
												<input type="text" class="form-control" value="{{$user->city}}" name="city">
											</div>

											<div class="form-group col-md-6">
												<label>State</label>
												<select name="state" class="form-control">
																<option value="{{$user->state}}">
																	{{$user->state}}
																</option>
																 <option value="AL">Alabama</option>
																 <option value="AK">Alaska</option>
																 <option value="AZ">Arizona</option>
																 <option value="AR">Arkansas</option>
																 <option value="CA">California</option>
																 <option value="CO">Colorado</option>
																 <option value="CT">Connecticut</option>
																 <option value="DE">Delaware</option>
																 <option value="DC">District Of Columbia</option>
																 <option value="FL">Florida</option>
																 <option value="GA">Georgia</option>
																 <option value="HI">Hawaii</option>
																 <option value="ID">Idaho</option>
																 <option value="IL">Illinois</option>
																 <option value="IN">Indiana</option>
																 <option value="IA">Iowa</option>
																 <option value="KS">Kansas</option>
																 <option value="KY">Kentucky</option>
																 <option value="LA">Louisiana</option>
																 <option value="ME">Maine</option>
																 <option value="MD">Maryland</option>
																 <option value="MA">Massachusetts</option>
																 <option value="MI">Michigan</option>
																 <option value="MN">Minnesota</option>
																 <option value="MS">Mississippi</option>
																 <option value="MO">Missouri</option>
																 <option value="MT">Montana</option>
																 <option value="NE">Nebraska</option>
																 <option value="NV">Nevada</option>
																 <option value="NH">New Hampshire</option>
																 <option value="NJ">New Jersey</option>
																 <option value="NM">New Mexico</option>
																 <option value="NY">New York</option>
																 <option value="NC">North Carolina</option>
																 <option value="ND">North Dakota</option>
																 <option value="OH">Ohio</option>
																 <option value="OK">Oklahoma</option>
																 <option value="OR">Oregon</option>
																 <option value="PA">Pennsylvania</option>
																 <option value="RI">Rhode Island</option>
																 <option value="SC">South Carolina</option>
																 <option value="SD">South Dakota</option>
																 <option value="TN">Tennessee</option>
																 <option value="TX">Texas</option>
																 <option value="UT">Utah</option>
																 <option value="VT">Vermont</option>
																 <option value="VA">Virginia</option>
																 <option value="WA">Washington</option>
																 <option value="WV">West Virginia</option>
																 <option value="WI">Wisconsin</option>
																 <option value="WY">Wyoming</option>
																 </select>
											</div>

											<div class="form-group col-md-6">
												<label>Zip</label>
												<input type="text" class="form-control" value="{{$user->zip}}" name="zip">
											</div>

											<div class="form-group col-md-12">
												<label>About Me</label>
												<textarea class="form-control" name="about_me">{{$user->about_me}}</textarea>
											</div>
											<div class="form-group col-lg-12 col-md-12">
												<button class="btn btn-theme" type="submit">Save Changes</button>
											</div>

										</div>
									</div>
								</form>
								</div>



							</div>
						</div>

					</div>
				</div>
			</section>
			<!-- ============================ User Dashboard End ================================== -->


			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
@endsection

@section('footer-scripts')

<script>
function avatar(){
	$('#avatar').click();
}

</script>

@endsection
