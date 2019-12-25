@extends('layouts.app')
			<!-- ============================ All Property ================================== -->
			@section('content')

				<div class="container">
					<div class="row">

						<div class="col-lg-12 col-sm-12 list-layout">
							<div class="row">

								<div class="col-lg-12 col-md-12">
									<div class="filter-fl">
										<h4>Total Investments: <span class="theme-cl">{{$investments->count()}}</span></h4>
										{{-- <div class="btn-group custom-drop">
											<button type="button" class="btn btn-order-by-filt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Sort By<i class="ti-angle-down"></i>
											</button>
											<div class="dropdown-menu pull-right animated flipInX">
												<a href="#">Latest</a>
												<a href="#">Most View</a>
												<a href="#">Most Popular</a>
											</div>
										</div> --}}
									</div>
								</div>


								<!-- Single Property Start -->
								@foreach($investments as $listing)
								<div class="col-lg-12 col-md-12">
									<div class="property-listing property-1">

										<div class="listing-img-wrapper">
											<a href="{{route('show-listing-pending', $listing->listing->id)}}">
												<img src="{{Storage::url($listing->listing->image_1_path)}}" class="img-fluid mx-auto" alt="" />
											</a>
										</div>

										<div class="listing-content">

											<div class="listing-detail-wrapper">
												<div class="listing-short-detail">
													<h4 class="listing-name"><a href="{{route('show-listing-pending', $listing->listing->id)}}">{{$listing->listing->title}}</a></h4>
													<span class="listing-location"><i class="ti-location-pin"></i>{{$listing->listing->address.' '.$listing->listing->city.', '. $listing->listing->state.' '.$listing->listing->zip}}</span>
												</div>
											</div>

											<div class="listing-features-info">
												<ul>
												Total Investors:&nbsp;	<h4><span class="theme-cl">{{$raw_investments->where('listing_id', $listing->listing->id)->count()}}</span></h4>

												</ul>

											</div>


{{--
											<div class="listing-features-info">
												<ul>
													<li><strong>Bed:</strong>2</li>
													<li><strong>Bath:</strong>1</li>
													<li><strong>Sqft:</strong>3,700</li>
												</ul>
											</div> --}}

											<div class="listing-footer-wrapper">
												<div class="listing-price">
													<h4 class="list-pr">${{$listing->listing->target_raise}}</h4>
													<div class="progress">
														<div class="progress-bar bg-success" role="progressbar" style="width: {{round(($listing->listing->current_raise / $listing->listing->target_raise)*100, 2)}}%" aria-valuenow="{{round(($listing->listing->current_raise / $listing->listing->target_raise)*100, 2)}}" aria-valuemin="0" aria-valuemax="100">{{round(($listing->listing->current_raise/$listing->listing->target_raise)*100)}}%</div>
													</div>
												</div>

											</div>

										</div>

									</div>
								</div>
							@endforeach
								<!-- Single Property End -->



							</div>



						</div>

					</div>
				</div>
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>



@endsection
@section('footer-scripts')
<script>
$(document).ready(function(){
	$('footer').css('display', 'none');
})
</script>
@endsection
