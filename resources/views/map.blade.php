@extends('layouts.app')
@section('header_styles')
<link rel="stylesheet" href="{{asset('/css/chat.css')}}" />
 <link  href="{{asset('/css/lightbox.min.css')}}" rel="stylesheet" type="text/css">
 <link  href="{{asset('/assets/css/custom.css')}}" rel="stylesheet" type="text/css">


 <style>

#canvasHolder{
  position:relative;
  min-width: 80px;
  min-height: 250px;
}
@media only screen and (max-width: 600px) {
  #canvasHolder {
    min-height: 300px;
  }
}

 </style>
@endsection

@section('content')

<div class="main_section" id="app">


<section class="gray-bg">
   <div class="container">


      <div class="chat_container">

         <div class="col-sm-12 message_section" style="border: none;">

		 <div class="row">


     <div class="col-md-6 agent-widget">
       <div style="" id="canvasHolder">
         <canvas id="myChart"></canvas>
       </div>
<br />
       <div class="form-submit" style="border-top: 2px solid #27b737; padding-top: 10px">

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
     </div>
     <div class="col-md-6 agent-widget">


   <div class="chat_area" id="chat-box">




   <ul class="list-unstyled" id="chats">
     @foreach($messages as $message)
   <li class="left clearfix">
                   <span class="chat-img1 pull-left">
                   <img src="{{$message->user->avatar_path != null? Storage::url($message->user->avatar_path) : asset('/img/avatar.jpg')}}" alt="User Avatar" class="img-circle">
                   </span>
                   <div class="chat-body1 clearfix">
                      <p>{!!$message->message!!}</p> <br />
                        @if($message->images != null)

                            @foreach(json_decode($message->images) as $test)
                              {{-- <img src="{{Storage::url($test)}}" style="max-width: 50px" onclick="openModal(this)" class="hover-shadow" /> --}}
                              <a href = "{{Storage::url($test)}}"   data-lightbox = "message{{$message->id}}" ><img src="{{Storage::url($test)}}" style="max-width: 50px; cursor: pointer;" /></a>
                            @endforeach

                        @endif


                      <div class="chat_time pull-right" style="float: right;">{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans().' by '. $message->user->fname }}</div>
                   </div>
    </li>
  @endforeach


   </ul>
   </div><!--chat_area-->
        <div class="message_write">
          <form method="post" action="{{route('submitMessage')}}" enctype="multipart/form-data" id="chatForm">
            @csrf
              <div id="reset_area">

               <textarea class="form-control" placeholder="type a message then press enter" name="post_content" row="1" id="post_content"></textarea>
               <div class="clearfix"></div>
               <div class="chat_bottom">
                 @if(Auth::user()->role == "super")

                   <div id="fileContainer">
                   <input type="file" class="pull-left upload_btn" name="post_image[]" id="post_image" multiple><br />
                  </div>
                 @endif
                 <button type="button" class="pull-right btn btn-success" style="position: relative; right: 5px; bottom: 5px; float: right;" id="chat-submit">Send</button>
               </div>
             </div>
          </form>
        </div>
   </div>
            </div>

         </div> <!--message_section-->
      </div>
   </div>
 </section>
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
												<h6 class="listing-card-info-price price-prefix">{{number_format($listing->target_raise)}}</h6>
                        <div style="background-color: #9b9999">
												<div class="progress-bar bg-success" role="progressbar" style="width: {{($listing->current_raise/$listing->target_raise)*100}}%; " aria-valuenow=" {{($listing->current_raise/$listing->target_raise)*100}}" aria-valuemin="0" aria-valuemax="100">{{round(($listing->current_raise/$listing->target_raise)*100)}}%</div>


                        </div>
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

      <section  class="gray-bg">
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
						<div class="col-lg-12 col-md-12">
							<div class="property-slide">

								<!-- Single Property -->
								{{-- start foreach --}}
								@foreach($investments as $listing)
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
												<h6 class="listing-card-info-price price-prefix">{{number_format($listing->listing->target_raise)}}</h6>
                        <div style="background-color: #9b9999">
												<div class="progress-bar bg-success" role="progressbar" style="width: {{($listing->listing->current_raise/$listing->listing->target_raise)*100}}%; " aria-valuenow=" {{($listing->listing->current_raise/$listing->listing->target_raise)*100}}" aria-valuemin="0" aria-valuemax="100">{{round(($listing->listing->current_raise/$listing->listing->target_raise)*100)}}%</div>


                        </div>
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

							@endforeach
							</div>
						</div>
					</div>

				</div>
			</section>


      <section>
        <div class="container">

          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="sec-heading center">
                <h2>Funded Investments</h2>
                <p>See what other projects have done.</p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="property-slide">

                <!-- Single Property -->
                {{-- start foreach --}}
                @foreach($funded_listings as $listing)
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
                        <span class="fundedBanner" style="background-color: rgba(243, 48, 108, .8); width: 100%;">Funded</span>
                      </div>

											<span class="property-type" style="background-color: rgba(243, 48, 108, .8); ">Funded</span>

                    </div>

                    <div class="listing-detail-wrapper pb-0">
                      <div class="listing-short-detail">
                        <h4 class="listing-name"><a href="{{route('investor-listing', $listing->id)}}">{{$listing->title}}</a><i class="list-status ti-check"></i></h4>
                      </div>

                    </div>

                    <div class="price-features-wrapper">
											<div class="listing-price-fx">
                        <div class="progress-bar bg-success" role="progressbar" style="width:100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
												<h6 class="listing-card-info-price price-prefix">{{number_format($listing->current_raise).' of '.number_format($listing->target_raise)}}</h6>
												<p>
													Funded in {{$listing->elapsed}}
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

              @endforeach
              </div>
            </div>
          </div>

        </div>
      </section>
			<!-- ============================ Agent Start ================================== -->



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
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script  type="text/javascript" src="{{asset('js/lightbox.min.js')}}"></script>
	<script>

  lightbox.option({
     'resizeDuration': 200,
     'wrapAround': true,
     'fadeDuration': 200
   })



	var listings = {!!json_encode($og_listings)!!};



	function scroll(){
		$('#chat-box').animate({
				scrollTop: $('#chat-box').get(0).scrollHeight
		}, 2000);
	}

  $('#chat-submit').click(function(){
    sendMessage();
  })

	$("#post_content").keydown(function(e) {
    if(e.which == 13){
      e.preventDefault();
      sendMessage();
        }
      });

function sendMessage(){
  $.ajax({
      url: '{{route('submitMessage')}}',
      type: 'POST',
      data: new FormData($('#chatForm')[0]), // The form with the file inputs.
      processData: false,
      contentType: false,                    // Using FormData, no need to process data.
      success: function(){
        $('#post_content').val('');
          @if(Auth::user()->role == "super")
              $("#fileContainer").html(`<input type="file" class="pull-left upload_btn" name="post_image[]" id="post_image" multiple><br />`);
          @endif
        },
      error: function(){
             alert('Whoops, something went wrong. We\'ve been notified and are currently working on a solution' );
        }

        });
}

Echo.channel('chat').listen('ChatMessage', function(data) {
	// console.log(data.message);
	$('#chats').append(data.message);

	scroll();
});

$(document).ready(function() {
	scroll();
});




var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
    data: {
        labels: ['Completed Dollars', 'Active Dollars', 'Profit'],
        datasets: [{
            backgroundColor: ['rgb(255, 99, 132)', '#27B737', '#F7871E' ],
            borderColor: '#fff',
            data: [{{$completed_dollars}}, {{$active_dollars}}, {{$earned_dollars}}]
        }]
    },

    // Configuration options go here
    options: {
      maintainAspectRatio: false,
      title:{
        display: true,
        text: 'Financial Stats',
        fontSize: 14
      },
      responsive: true,
      legend:{
        position: 'top'
      },
      layout: {
            padding: {
                left: 0,
                right: 0,
                top: 20,
                bottom: 0
            }
        },

    }
});

	</script>
@endsection
