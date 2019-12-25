@extends('layouts.app')
@section('header_styles')
<link rel="stylesheet" href="{{asset('/css/chat.css')}}" />
<link rel="stylesheet" href="{{asset('/css/modal.css')}}" />
@endsection

@section('content')

<div class="main_section" id="app">



   <div class="container">


      <div class="chat_container">

         <div class="col-sm-12 message_section">
					 <div id="myModal" class="modal">

					 <!-- The Close Button -->
					 <span class="close">&times;</span>

					 <!-- Modal Content (The Image) -->
					 <img class="modal-content" id="img01">

					 </div>
		 <div class="row">

       <div class="col-md-6">


		 <div class="chat_area" id="chat-box">




		 <ul class="list-unstyled" id="chats">
			 @foreach($messages as $message)
		 <li class="left clearfix">
                     <span class="chat-img1 pull-left">
                     <img src="{{$message->user->avatar_path != null? Storage::url($message->user->avatar_path) : asset('/img/avatar.jpg')}}" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body1 clearfix">
                        <p>{{$message->message}} <br />
													@if($message->images != null)

															@foreach(json_decode($message->images) as $test)
																<img src="{{Storage::url($test)}}" style="max-width: 50px" onclick="openModal(this)" class="hover-shadow" />
															@endforeach

													@endif

												</p>

												<div class="chat_time pull-right" style="float: right;">{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</div>
                     </div>
      </li>
		@endforeach


		 </ul>
		 </div><!--chat_area-->
          <div class="message_write">
						<form method="post" action="{{route('submitMessage')}}" enctype="multipart/form-data" id="chatForm">
							@csrf
								<div id="reset_area">

    	 					 <textarea class="form-control" placeholder="type a message" name="post_content" row="1"></textarea>
								 <div class="clearfix"></div>
								 <div class="chat_bottom">
									 @if(Auth::user()->role == "super")
									 <a href="#" id="addFile">Add More Files</a> <br />
										 <div id="fileContainer">
										 <input type="file" class="pull-left upload_btn" name="post_image[]" id="post_image"><br />
									 	</div>
									 @endif
									 <button type="button" class="pull-right btn btn-success" style="position: relative; right: 5px; bottom: 5px; float: right;" id="chat-submit">Send</button>
								 </div>
							 </div>
						</form>
		 			</div>
		 </div>
     <div class="col-md-6">

       <div class="form-submit" style="border-bottom: 2px solid #27b737">
         <h4>Financial Stats</h4>
         <div class="submit-section">
           <div class="form-row">

             <div class="form-group col-md-6">
               <label>Dollars Invested</label>
               <h3>${{$total_dollars}}</h3>
             </div>

             <div class="form-group col-md-6">
               <label>Dollars Active</label>
               <h3>${{$active_dollars}}</h3>
             </div>

             <div class="form-group col-md-6">
               <label>Active Projects</label>
               <h3>{{$investments->count()}}</h3>
             </div>

             <div class="form-group col-md-6">
               <label>Dollars Returned</label>
               <a href="{{route('view-my-completed-investments')}}"><h3 style="color: #27B737">${{$earned_dollars}}</h3></a>
             </div>



           </div>
         </div>
       </div>
     </div>
            </div>

         </div> <!--message_section-->
      </div>
   </div>
</div>
			{{-- <div class="home-map fl-wrap">
				<div class="map-container fw-map">
					<div id="map-main"></div>
				</div>
			</div> --}}
			<!-- ============================ Hero Banner End ================================== -->

			<!-- ============================ Slide Property Start ================================== -->
			<section>
				<div class="container">

					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<h2>New Listings</h2>
								<p>Find your next investment.</p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="property-slide">

								<!-- Single Property -->
								{{-- start foreach --}}
								@foreach($listings as $listing)
									@if($listing->remaining_shares > 0)
								<div class="single-items">
									<div class="property-listing property-2">

										<div class="listing-img-wrapper">
											<div class="list-img-slide">
												<div class="click">
													{{-- start foreach --}}
													@if($listing->image_1_path != null)
													<div><a href="{{route('investor-listing', $listing->id)}}"><img src="{{Storage::url($listing->image_1_path)}}" class="img-fluid mx-auto" alt="" /></a></div>
												@endif
												@if($listing->image_2_path != null)
												<div><a href="{{route('investor-listing', $listing->id)}}"><img src="{{Storage::url($listing->image_2_path)}}" class="img-fluid mx-auto" alt="" /></a></div>
											@endif
											@if($listing->image_3_path != null)
											<div><a href="{{route('investor-listing', $listing->id)}}"><img src="{{Storage::url($listing->image_3_path)}}" class="img-fluid mx-auto" alt="" /></a></div>
										@endif
										@if($listing->image_4_path != null)
										<div><a href="{{route('investor-listing', $listing->id)}}"><img src="{{Storage::url($listing->image_4_path)}}" class="img-fluid mx-auto" alt="" /></a></div>
									@endif
									@if($listing->image_5_path != null)
									<div><a href="{{route('investor-listing', $listing->id)}}"><img src="{{Storage::url($listing->image_5_path)}}" class="img-fluid mx-auto" alt="" /></a></div>
								@endif
										{{-- endforeach --}}
												</div>
											</div>
											<span class="property-type">Open</span>
										</div>

										<div class="listing-detail-wrapper pb-0">
											<div class="listing-short-detail">
												<h4 class="listing-name"><a href="{{route('investor-listing', $listing->id)}}">{{$listing->title}}</a><i class="list-status ti-check"></i></h4>
											</div>

										</div>

										<div class="price-features-wrapper">
											<div class="listing-price-fx">
												<h6 class="listing-card-info-price price-prefix">{{$listing->target_raise}}</h6>
												<div class="progress-bar bg-success" role="progressbar" style="width: {{($listing->current_raise/$listing->target_raise)*100}}%" aria-valuenow=" {{($listing->current_raise/$listing->target_raise)*100}}" aria-valuemin="0" aria-valuemax="100">{{round(($listing->current_raise/$listing->target_raise)*100)}}%</div>

											</div>

											{{-- <div class="list-fx-features">
												<div class="listing-card-info-icon">
													<span class="inc-fleat inc-bed">3 Beds</span>
												</div>
												<div class="listing-card-info-icon">
													<span class="inc-fleat inc-bath">1 Bath</span>
												</div>
											</div> --}}
										</div>


									</div>
								</div>
								{{-- endforeach --}}
							@endif
							@endforeach
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="text-center mt-4">
								<a href="{{route('view-listings')}}" class="btn btn-theme-2">Browse All Properties</a>
							</div>
						</div>
					</div>

				</div>
			</section>
			<!-- ============================ Slide Property End ================================== -->

			<!-- ============================ Agent Start ================================== -->
			<section class="gray-bg">
				<div class="container">

					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<h2>Current Investments</h2>
								<p>Monitor your current investments here.</p>
							</div>
						</div>
					</div>

					<div class="row">

						<!-- Single Agent -->
						{{-- start foreach --}}
						@foreach($investments as $listing)
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="agents-grid">


								<div class="single-items">
									<div class="property-listing property-2">

										<div class="listing-img-wrapper">
											<div class="list-img-slide">
												<div class="click">
													{{-- start foreach --}}
													@if($listing->listing->image_1_path != null)
													<div><a href="{{route('investor-listing', $listing->listing->id)}}"><img src="{{Storage::url($listing->listing->image_1_path)}}" class="img-fluid mx-auto" alt="" /></a></div>
												@endif
												@if($listing->listing->image_2_path != null)
												<div><a href="{{route('investor-listing', $listing->listing->id)}}"><img src="{{Storage::url($listing->listing->image_2_path)}}" class="img-fluid mx-auto" alt="" /></a></div>
											@endif
											@if($listing->listing->image_3_path != null)
											<div><a href="{{route('investor-listing', $listing->listing->id)}}"><img src="{{Storage::url($listing->listing->image_3_path)}}" class="img-fluid mx-auto" alt="" /></a></div>
										@endif
										@if($listing->listing->image_4_path != null)
										<div><a href="{{route('investor-listing', $listing->listing->id)}}"><img src="{{Storage::url($listing->listing->image_4_path)}}" class="img-fluid mx-auto" alt="" /></a></div>
									@endif
									@if($listing->listing->image_5_path != null)
									<div><a href="{{route('investor-listing', $listing->listing->id)}}"><img src="{{Storage::url($listing->listing->image_5_path)}}" class="img-fluid mx-auto" alt="" /></a></div>
								@endif
										{{-- endforeach --}}
												</div>
											</div>

										</div>

										<div class="listing-detail-wrapper pb-0">
											<div class="listing-short-detail">
												<h4 class="listing-name"><a href="{{route('investor-listing', $listing->listing->id)}}">{{$listing->listing->title}}</a><i class="list-status ti-check"></i></h4>
											</div>

										</div>

										<div class="price-features-wrapper">
											<div class="listing-price-fx">
												<h6 class="listing-card-info-price price-prefix">{{$listing->listing->target_raise}}</h6>
												<div class="progress-bar bg-success" role="progressbar" style="width: {{($listing->listing->current_raise/$listing->listing->target_raise)*100}}%" aria-valuenow=" {{($listing->listing->current_raise/$listing->listing->target_raise)*100}}" aria-valuemin="0" aria-valuemax="100">{{round(($listing->listing->current_raise/$listing->listing->target_raise)*100)}}%</div>

											</div>

											{{-- <div class="list-fx-features">
												<div class="listing-card-info-icon">
													<span class="inc-fleat inc-bed">3 Beds</span>
												</div>
												<div class="listing-card-info-icon">
													<span class="inc-fleat inc-bath">1 Bath</span>
												</div>
											</div> --}}
										</div>


									</div>
								</div>
								{{-- endforeach --}}


							</div>
						</div>
						{{-- end foreach --}}
	@endforeach

					</div>

				</div>
			</section>
			<!-- ============================ Agent End ================================== -->
			<section class="gray-bg">
				<div class="container">

					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<h2>Funded Projects</h2>
								<p>See what other projects have done.</p>
							</div>
						</div>
					</div>

					<div class="row">

						<!-- Single Agent -->
						{{-- start foreach --}}
						@foreach($funded_listings as $fl)

						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="agents-grid">


								<div class="single-items">
									<div class="property-listing property-2">

										<div class="listing-img-wrapper">
											<div class="list-img-slide">
												<div class="click">
													{{-- start foreach --}}
													@if($fl->image_1_path != null)
													<div><a href="{{route('investor-listing', $fl->id)}}"><img src="{{Storage::url($fl->image_1_path)}}" class="img-fluid mx-auto" alt="" /></a></div>
												@endif
												@if($fl->image_2_path != null)
												<div><a href="{{route('investor-listing', $fl->id)}}"><img src="{{Storage::url($fl->image_2_path)}}" class="img-fluid mx-auto" alt="" /></a></div>
											@endif
											@if($fl->image_3_path != null)
											<div><a href="{{route('investor-listing', $fl->id)}}"><img src="{{Storage::url($fl->image_3_path)}}" class="img-fluid mx-auto" alt="" /></a></div>
										@endif
										@if($fl->image_4_path != null)
										<div><a href="{{route('investor-listing', $fl->id)}}"><img src="{{Storage::url($fl->image_4_path)}}" class="img-fluid mx-auto" alt="" /></a></div>
									@endif
									@if($fl->image_5_path != null)
									<div><a href="{{route('investor-listing', $fl->id)}}"><img src="{{Storage::url($fl->image_5_path)}}" class="img-fluid mx-auto" alt="" /></a></div>
								@endif
										{{-- endforeach --}}
												</div>
											</div>
											<span class="property-type" style="background-color: rgba(243, 48, 108, .8); ">Funded</span>
										</div>

										<div class="listing-detail-wrapper pb-0">
											<div class="listing-short-detail">
												<h4 class="listing-name"><a href="{{route('investor-listing', $fl->id)}}">{{$fl->title}}</a><i class="list-status ti-check"></i></h4>
											</div>

										</div>

										<div class="price-features-wrapper">
											<div class="listing-price-fx">
												<h6 class="listing-card-info-price price-prefix">{{$fl->target_raise}}</h6>
												<p>
													Funded in {{$fl->elapsed}}
												</p>
											</div>

											{{-- <div class="list-fx-features">
												<div class="listing-card-info-icon">
													<span class="inc-fleat inc-bed">3 Beds</span>
												</div>
												<div class="listing-card-info-icon">
													<span class="inc-fleat inc-bath">1 Bath</span>
												</div>
											</div> --}}
										</div>


									</div>
								</div>
								{{-- endforeach --}}


							</div>
						</div>
						{{-- end foreach --}}
	@endforeach

					</div>

				</div>
			</section>


			<!-- ============================ Footer End ================================== -->


			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

@endsection
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
@section('footer-scripts')
	<script>
	var listings = {!!json_encode($og_listings)!!};

	$('#addFile').click(function(e){
		e.preventDefault();
		$('#fileContainer').append(`<input type="file" class="pull-left upload_btn" name="post_image[]"><br />`);

	});

	function scroll(){
		$('#chat-box').animate({
				scrollTop: $('#chat-box').get(0).scrollHeight
		}, 2000);
	}


	$("#chat-submit").click(function() {

		$.ajax({
			  url: '{{route('submitMessage')}}',
			  type: 'POST',
			  data: new FormData($('#chatForm')[0]), // The form with the file inputs.
			  processData: false,
			  contentType: false                    // Using FormData, no need to process data.
			}).done(function(){
				$('#reset_area').html(`<textarea class="form-control" placeholder="type a message" name="post_content" row="1"></textarea>
				<div class="clearfix"></div>
				<div class="chat_bottom">
					@if(Auth::user()->role == "super")
					<a href="#" id="addFile">Add More Files</a> <br />
						<div id="fileContainer">
						<input type="file" class="pull-left upload_btn" name="post_image[]" id="post_image"><br />
					 </div>
					@endif
					<button type="button" class="pull-right btn btn-success" style="position: absolute; right: 5px; bottom: 5px;" id="chat-submit">Send</button>
				</div>`);
			}).fail(function(){
			  alert('Whoops, something went wrong. We\'ve been notified and are currently working on a solution' );
			});

    // var data = $("#btn-input").val();
    //     //console.log(data);
    //     $('chat_log').append('<div class="row msg_container base_sent"><div class="col-md-10 col-xs-10"><div class="messages msg_receive"><p>'+data+'</p></div></div></div><div class="row msg_container base_receive"><div class="col-md-10 col-xs-10"><div class="messages msg_receive"><p>'+data+'</p></div></div></div>');
    //     clearInput();
    //     $(".msg_container_base").stop().animate({ scrollTop: $(".msg_container_base")[0].scrollHeight}, 1000);
});



Echo.channel('chat').listen('ChatMessage', function(data) {
	// console.log(data.message);
	$('#chats').append(data.message);

	scroll();
});

$(document).ready(function() {
	scroll();
});




// Get the modal
function openModal(e){
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = e;
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

  modal.style.display = "block";
  modalImg.src = img.src;


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
}

	</script>
@endsection
