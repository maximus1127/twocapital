@extends('layouts.app')

@section('content')
	@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{ $message }}</strong>
</div>
@endif
			<section class="gray">
				<div class="container">
					<div class="row">

						<!-- property main detail -->
						<div class="col-lg-8 col-md-12 col-sm-12">
							@if(Auth::user()->role == 'super')
								<a href="{{route('update-listing-form', $listing->id)}}"><button class="btn btn-danger">Update Listing</button></a>
							@endif
							<div class="slide-property-first mb-4">
								<div class="pr-price-into">
									<h2>${{$listing->target_raise}} <i>${{$listing->share_price}}/share</i> <span class="prt-type rent">{{$listing->category}}</span></h2>
									<span><i class="lni-map-marker"></i> {{$listing->address.' '.$listing->city.', '.$listing->state.' '.$listing->zip}}</span><hr />
									<p>
										<span style="color: rgb(243, 48, 108)">Your Investment</span> / <span style="color: #27B737">Total Raised</span>
									</p>
									<div class="progress">

										<div class="progress-bar bg-danger" role="progressbar" style="width:{{$user_bar_percent}}%; color:white;">
								      {{round($user_bar_percent)}}%
								    </div>
								    <div class="progress-bar bg-success" role="progressbar" style="width:{{$progress_bar_percent}}%; color: white;">
								         {{round($percent)}}%
								    </div>
									</div>
								</div>
							</div>

							<div class="property3-slide single-advance-property mb-4">

								<div class="slider-for">
									@if($listing->image_1_path != null)
									<img src="{{Storage::url($listing->image_1_path)}}" alt="Alt"></a>
									@endif
									@if($listing->image_2_path != null)
									<img src="{{Storage::url($listing->image_2_path)}}" alt="Alt"></a>
								@endif
								@if($listing->image_3_path != null)
									<img src="{{Storage::url($listing->image_3_path)}}" alt="Alt"></a>
								@endif
								@if($listing->image_4_path != null)
									<img src="{{Storage::url($listing->image_4_path)}}" alt="Alt"></a>
								@endif
								@if($listing->image_5_path != null)
									<img src="{{Storage::url($listing->image_5_path)}}" alt="Alt"></a>
								@endif

								</div>
								<div class="slider-nav">
											@if($listing->image_1_path != null)
									<div class="item-slick"><img src="{{Storage::url($listing->image_1_path)}}" alt="Alt"></div>
								@endif
								@if($listing->image_2_path != null)
									<div class="item-slick"><img src="{{Storage::url($listing->image_2_path)}}" alt="Alt"></div>
								@endif
								@if($listing->image_3_path != null)
									<div class="item-slick"><img src="{{Storage::url($listing->image_3_path)}}" alt="Alt"></div>
								@endif
								@if($listing->image_4_path != null)
									<div class="item-slick"><img src="{{Storage::url($listing->image_4_path)}}" alt="Alt"></div>
								@endif
								@if($listing->image_5_path != null)
									<div class="item-slick"><img src="{{Storage::url($listing->image_5_path)}}" alt="Alt"></div>
								@endif
								</div>

							</div>

							<!-- Single Block Wrap -->
							{{-- <div class="block-wrap">

								<div class="block-header">
									<h4 class="block-title">Property Info</h4>
								</div>


								<div class="block-body">
									<ul class="dw-proprty-info">
										<li><strong>Bedrooms</strong>2</li>
										<li><strong>Bathrooms</strong>2</li>
										<li><strong>Garage</strong>Yes</li>
										<li><strong>Area</strong>570 sq ft</li>
										<li><strong>Type</strong>Apartment</li>
										<li><strong>Price</strong>$53264</li>
										<li><strong>City</strong>New York</li>
										<li><strong>Build On</strong>2007</li>
									</ul>
								</div>

							</div> --}}

							<!-- Single Block Wrap -->
							<div class="block-wrap">

								<div class="block-header">
									<h4 class="block-title">Description</h4>
								</div>

								<div class="block-body">
									{{$listing->public_description}}
								</div>

							</div>

							<!-- Single Block Wrap -->
							{{-- <div class="block-wrap">

								<div class="block-header">
									<h4 class="block-title">Ameneties</h4>
								</div>

								<div class="block-body">
									<ul class="avl-features third">
										<li>Air Conditioning</li>
										<li>Swimming Pool</li>
										<li>Central Heating</li>
										<li>Laundry Room</li>
										<li>Gym</li>
										<li>Alarm</li>
										<li>Window Covering</li>
										<li>Internet</li>
										<li>Pets Allow</li>
										<li>Free WiFi</li>
										<li>Car Parking</li>
										<li>Spa & Massage</li>
									</ul>
								</div>

							</div> --}}

							<!-- Single Block Wrap -->
							{{-- <div class="block-wrap">

								<div class="block-header">
									<h4 class="block-title">Floor Plan</h4>
								</div>

								<div class="block-body">
									<div class="accordion" id="floor-option">
										<div class="card">
											<div class="card-header" id="firstFloor">
												<h2 class="mb-0">
													<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#firstfloor">First Floor<span>740 sq ft</span></button>
												</h2>
											</div>
											<div id="firstfloor" class="collapse" aria-labelledby="firstFloor" data-parent="#floor-option">
												<div class="card-body">
													<img src="assets/img/floor.jpg" class="img-fluid" alt="" />
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" id="seconfFloor">
												<h2 class="mb-0">
													<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#secondfloor">Second Floor<span>710 sq ft</span></button>
												</h2>
											</div>
											<div id="secondfloor" class="collapse" aria-labelledby="seconfFloor" data-parent="#floor-option">
												<div class="card-body">
													<img src="assets/img/floor.jpg" class="img-fluid" alt="" />
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" id="third-garage">
												<h2 class="mb-0">
													<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#garages">Garage<span>520 sq ft</span></button>
												</h2>
											</div>
											<div id="garages" class="collapse" aria-labelledby="third-garage" data-parent="#floor-option">
												<div class="card-body">
													<img src="assets/img/floor.jpg" class="img-fluid" alt="" />
												</div>
											</div>
										</div>
									</div>
								</div>

							</div> --}}


									<div class="map-container">
										<div id="singleMap" data-latitude="{{$listing->lat}}" data-longitude="{{$listing->lng}}" data-mapTitle="Our Location"></div>
									</div>



							<div class="block-wrap" style="max-height: 500px; overflow-y: scroll;">

								<div class="block-header">
									<h4 class="block-title">Discussion</h4>
								</div>

								<div class="block-body">
									@foreach($listing_posts as $lp)

										<p>
											{{$lp->content}} <br /><small>posted by {{$lp->user->fname}} {{Carbon\Carbon::parse($lp->created_at)->diffForHumans()}}</small>
										</p>
										<hr />
									@endforeach
								</div>

							</div>



						</div>

						<!-- property Sidebar -->
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="page-sidebar">

								<!-- slide-property-sec -->
								<div class="slide-property-sec mb-4">
									<div class="pr-all-info">

										<div class="pr-single-info">
											<div class="share-opt-wrap">
												{{-- <button type="button" class="btn-share" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-original-title="Share this">
													<i class="lni-share"></i>
												</button>
												<div class="dropdown-menu animated flipInX">
													<a href="#" class="cl-facebook"><i class="lni-facebook"></i></a>
													<a href="#" class="cl-twitter"><i class="lni-twitter"></i></a>
													<a href="#" class="cl-gplus"><i class="lni-google-plus"></i></a>
													<a href="#" class="cl-instagram"><i class="lni-instagram"></i></a>
												</div> --}}
											</div>

										</div>
{{--
										<div class="pr-single-info">
											<a href="JavaScript:Void(0);" data-toggle="tooltip" data-original-title="Get Print"><i class="ti-printer"></i></a>
										</div>

										<div class="pr-single-info">
											<a href="JavaScript:Void(0);" class="compare-button" data-toggle="tooltip" data-original-title="Compare"><i class="ti-control-shuffle"></i></a>
										</div>

										<div class="pr-single-info">
											<a href="JavaScript:Void(0);" class="like-bitt add-to-favorite" data-toggle="tooltip" data-original-title="Add To Favorites"><i class="lni-heart-filled"></i></a>
										</div>

									</div>
								</div> --}}
								<div class="sidebar-widgets">

																	<h4>Invest In This Property</h4>
																	<form method="post" action="{{route('submit-investment')}}">
																		<input type="hidden" value="{{$listing->id}}" name="listing" />
																		 <input type="hidden" name="investor" value="{{Auth::user()->id}}" />
																		 @csrf
																		 <div class="form-group">
	 																		<div class="input-with-icon">
																				<label for="acc">Account Type</label>
	 																			<select id="acc" name="account_type" class="form-control">
	 																				<option value="Checking">Checking</option>
	 																				<option value="Savings">Savings</option>
	 																			</select>
	 																		</div>
	 																	</div>

																	<div class="row">
																		<div class="col-lg-12 col-md-12 col-sm-12">
																			<div class="form-group">
																				<div class="input-with-icon">
																					<input type="text" class="form-control" placeholder="Name on Account" name="account_name" required>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-lg-12 col-md-12 col-sm-12">
																			<div class="form-group">
																				<div class="input-with-icon">
																					<input type="text" class="form-control" placeholder="Shares Purchasing" name="shares" id="shares" required>
																					<small>Remaining Shares: {{$listing->remaining_shares}} / Share Price: ${{$listing->share_price}}</small>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-lg-6 col-md-6 col-sm-6">
																			<div class="form-group">
																				<div>
																					<input type="text" class="form-control" placeholder="Account Number" name="ach" required>
																				</div>
																			</div>
																		</div>
																		<div class="col-lg-6 col-md-6 col-sm-6">
																			<div class="form-group">
																				<div>
																					<input type="text" class="form-control" placeholder="Routing Number" name="routing" required>
																				</div>
																			</div>
																		</div>
																		<img src="{{asset('/img/check.png')}}" style="width: 100%;"/>
																	</div>

																	<div class="row">
																		<div class="col-lg-6 col-md-6 col-sm-6">
																			<div class="form-group">
																				<div>
																					<input type="text" class="form-control" placeholder="Bank Name" name="bank_name" required>
																				</div>
																			</div>
																		</div>
																		<div class="col-lg-6 col-md-6 col-sm-6">
																			<div class="form-group">
																				<div>
																					<input type="text" class="form-control" placeholder="Bank City/State" name="bank_location" required>
																				</div>
																			</div>
																		</div>

																	</div>
																	<div class="row">
																		<div class="col-lg-2 col-md-2 col-sm-2">
																			<input id="agree" type="checkbox" required />

																		</div>
																		<div class="col-lg-10 col-md-10 col-sm-10">
																			I have read and agree to all property investment guidelines as made known by Salt Capital<br />

																		</div>
																	</div>
 																	<input type="hidden" name="investment" id="investment"><br />

																	<button type="submit" id="submit" class="btn btn-theme full-width" disabled>Invest <span id="total_submission"></span></button>


															</form>
															<a href="{{Storage::url($listing->document_1_path)}}" target="_blank">Download PPM</a>
																</div>
																<!-- Agent Detail -->
																<div class="agent-widget">
																	<div class="agent-title">

																			<h4>Have a question or a comment?</h4>

																	</div>
																	<form method="post" action="{{route('createPost')}}">
																		@csrf
																	<div class="form-group">
																		<textarea class="form-control" name="content"></textarea>
																		<input type="hidden" name="listing_id" value="{{$listing->id}}" />
																	</div>
																	<p>
																		This message will be seen by all users when viewing this listing page. For private messaging, use the "Contact Admin" link at the bottom of this page.
																	</p>
																	<button type="submit" class="btn btn-theme full-width">Send Message</button>
																</div>
															</form>




									</div>

								</div>

							</div>
						</div>

					</div>
				</div>
			</section>






			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

@endsection
@section('footer-scripts')
<script>
	 var singleMarker = '{{ URL::asset('assets/img/marker.png') }}';
</script>
<script>


	$("#shares").keyup(function(){
		var transfer = $('#shares').val() * {{$listing->share_price}};
		$("#total_submission").html("$"+transfer);
		$("#investment").val(transfer);
		if($("#shares").val() > {{$listing->remaining_shares}}){
			$('#submit').prop('disabled', true);
		}
		});

$(document).change(function(){
	if($("#shares").val() <= {{$listing->remaining_shares}} && $("#agree").prop('checked') && $("#shares").val() >= 5){
		$('#submit').prop('disabled', false);
	} else{
			$('#submit').prop('disabled', true);
	}
});


</script>

@endsection
