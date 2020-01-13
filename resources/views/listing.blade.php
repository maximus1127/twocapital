@extends('layouts.app')
@section('header_styles')
 <link  href="{{asset('/css/lightbox.min.css')}}" rel="stylesheet" type="text/css">
@endsection
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
									<h2>${{number_format($listing->target_raise)}} <i>${{number_format($listing->share_price)}}/share</i> <span class="prt-type rent">{{$listing->category}}</span><span class="prt-type">{{$listing->active}}</span></h2>
									<span><i class="lni-map-marker"></i> {{$listing->address.' '.$listing->city.', '.$listing->state.' '.$listing->zip}}</span><hr />
									<p>
										<span style="color: rgb(243, 48, 108)">Your Investment: ${{number_format($dollars)}}</span> / <span style="color: #27B737">Total Raised: ${{number_format($listing->current_raise)}}</span> / <span class="pull-right">Listing Amount: ${{number_format($listing->target_raise)}}</span>
									</p>
									<div class="progress" style="background-color: #9b9999;">

										<div class="progress-bar bg-danger" role="progressbar" style="width:{{$user_bar_percent}}%; color:white; ">
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
										<h5>{{$listing->title}}</h5>{{$listing->public_description}}
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
									<input type="checkbox" name="subscribe" id="subscribe" value="1" {{$pref != null? 'checked':''}}/> Subscribe to email alerts for this discussion
								</div>

								<div class="block-body">
									@foreach($listing_posts as $message)
										<div class="left clearfix">
								 									 <span class="chat-img1 pull-left">
								 									 <img src="{{$message->user->avatar_path != null? Storage::url($message->user->avatar_path) : asset('/img/avatar.jpg')}}" alt="User Avatar" class="img-circle" style="width:50px; float:left">
								 									 </span>
								 									 <div class="chat-body1 clearfix">
								 											<p>{{$message->content}} </p><br />

																				@if($message->images != null)
																					<div>
																						@for($i = 0; $i < count(json_decode($message->images)); $i++)
																							<a href = "{{Storage::url(json_decode($message->images)[$i])}}"   data-lightbox = "message{{$message->id}}" ><img src="{{Storage::url(json_decode($message->images)[$i])}}" style="max-width: 50px; cursor: pointer;" /></a>

																						@endfor
																					</div>
																				@endif


								 											<div class="chat_time pull-right" style="float: right;">{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</div>
								 									 </div>
								 		</div><hr />
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
                                    @if(Auth::user()->role != 'super')
																		 <input type="hidden" name="investor" value="{{Auth::user()->id}}" />
                                   @else
                                     <select name="investor" class='form-control'>

                                       @foreach(App\User::all() as $user)
                                         <option value="{{$user->id}}">{{$user->fname.' '.$user->lname}}</option>
                                       @endforeach

                                     </select>
                                   @endif
																		 @csrf



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
																	{{-- <div class="row">
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
																	</div> --}}
{{--
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

																	</div> --}}
																	<div class="row">
																		<div class="col-lg-2 col-md-2 col-sm-2">
																			<input id="agree" type="checkbox" required />

																		</div>
																		<div class="col-lg-10 col-md-10 col-sm-10">
																			I give permission for SALT Capital to contact me for additional information required to complete legal documentation.<br />

																		</div>
																	</div>
																	<div class="row">
																		<div class="col-lg-2 col-md-2 col-sm-2">
																			<input id="agree2" type="checkbox" required />

																		</div>
																		<div class="col-lg-10 col-md-10 col-sm-10"> I understand that my investment in this property is not final
																			until the Private Placement Memorandum and other supporting documents have been signed and executed.<br />

																		</div>
																	</div>
 																	<input type="hidden" name="investment" id="investment"><br />

																	<button type="submit" id="submit" class="btn btn-theme full-width" disabled>Invest <span id="total_submission"></span></button>


															</form>
															<div class="agent-widget">
																<div class="agent-title">

																		<h4>Listing Documents</h4>

																</div>
																<a href="{{Storage::url($listing->document_1_path)}}" target="_blank">Download PPM</a>
															</div>
																</div>
																<!-- Agent Detail -->
																<div class="agent-widget">
																	<div class="agent-title">

																			<h4>Have a question or a comment?</h4>

																	</div>

															<form method="post" enctype="multipart/form-data">
																<input type="hidden" name="listingId" value="{{$listing->id}}" />
																<input type="hidden" name="listingTitle" value="{{$listing->title}}" />
																@csrf
									    	 					 <textarea class="form-control" placeholder="type a message" name="post_content" row="1"></textarea>
																	 <p>
																		 This message will be seen by all users when viewing this listing page. For private messaging, use the "Contact Admin" link at the bottom of this page.
																	 </p>
																	 <div class="clearfix"></div>
																	 <div class="chat_bottom">
																		 @if(Auth::user()->role == "super")
																		 <a href="#" id="addFile">Add More Files</a> <br />
																			 <div id="fileContainer">
																			 <input type="file" class="pull-left upload_btn" name="post_image[]" id="post_image"><br />
																		 </div><br />
																			<button type="submit" class="btn btn-theme full-width" formaction="{{route('createPost')}}">Send To Public Feed & Listing</button><br />
																				<button type="submit" class="btn btn-warning full-width" formaction="{{route('createPrivatePost')}}">Send To Listing Only</button>

																		 @else
																		 <button type="submit" class="btn btn-theme full-width" formaction="{{route('createPrivatePost')}}">Send Message</button>
																		  @endif
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






			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

@endsection
@section('footer-scripts')
<script>
	 var singleMarker = '{{ URL::asset('assets/img/marker.png') }}';
</script>
<script  type="text/javascript" src="{{asset('js/lightbox.min.js')}}"></script>
<script>

lightbox.option({
	 'resizeDuration': 200,
	 'wrapAround': true,
	 'fadeDuration': 200
 })


	$("#shares").keyup(function(){
		var transfer = $('#shares').val() * {{$listing->share_price}};
		$("#total_submission").html("$"+transfer);
		$("#investment").val(transfer);
		if($("#shares").val() > {{$listing->remaining_shares}}){
			$('#submit').prop('disabled', true);
		}
		});

$(document).change(function(){
	if($("#shares").val() <= {{$listing->remaining_shares}} && $("#agree").prop('checked') && $('#agree2').prop('checked') && $("#shares").val() >= 5){
		$('#submit').prop('disabled', false);
	} else if("{{Auth::user()->role}}" == "super" && $("#shares").val() <= {{$listing->remaining_shares}} && $("#agree").prop('checked') && $('#agree2').prop('checked') && $("#shares").val() > 0)  {
    	$('#submit').prop('disabled', false);
  }


  else{
			$('#submit').prop('disabled', true);
	}
});


$("#subscribe").change(function(){
	var sub;
	if($('#subscribe').prop('checked') == true){
		sub = 1;
	} else {
		sub = 0;
	}
	$.ajaxSetup({
    headers: {
					       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    }
					});
	$.ajax({
		url: '{{route('change-pref')}}',
		type: 'post',
		data:{
			user: {{Auth::user()->id}},
			listing: {{$listing->id}},
			notify: sub
		},
		success: function(data){
			if(data == 1){
				alert('You are now subscribed to notifications');
			} else {
				alert('You are unsubscribed from notifications');
			}
		}
	});


});


$('#addFile').click(function(e){
	e.preventDefault();
	$('#fileContainer').append(`<input type="file" class="pull-left upload_btn" name="post_image[]"><br />`);

});

// // Open the Modal
// function openModal() {
//   document.getElementById("myModal").style.display = "block";
// }
//
// // Close the Modal
// function closeModal() {
//   document.getElementById("myModal").style.display = "none";
// }
//
// var slideIndex = 1;
// showSlides(slideIndex);
//
// // Next/previous controls
// function plusSlides(n) {
//   showSlides(slideIndex += n);
// }
//
// // Thumbnail image controls
// function currentSlide(n, o) {
//   showSlides(slideIndex = n, o);
// }
//
// function showSlides(n, o) {
//
//   var i;
//   var slides = document.getElementsByClassName("slides"+o);
//   if (n > slides.length) {slideIndex = 1}
//   if (n < 1) {slideIndex = slides.length}
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
// 		$('#modal-content').append('
// 			<div class="mySlides">
// 			<img src="'+$(slides[i]).attr('src')+'" style="width:100%">
// 			</div>');
//   }
//   slides[slideIndex-1].style.display = "block";
// }


</script>

@endsection
