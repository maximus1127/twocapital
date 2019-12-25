@extends('layouts.app')
@section('content')

			<!-- ============================ Page Title End ================================== -->

			<!-- ============================ User Dashboard ================================== -->
			<section>
				<div class="container">
					<div class="row">

					@include('partials.myprofile-column')

						<div class="col-lg-8 col-md-12">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
							  <li class="nav-item">
							    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Active</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Pending</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Completed</a>
							  </li>
							</ul>

							<div class="dashboard-wraper">

								<!-- Bookmark Property -->
								<div class="form-submit">

								</div>
								<div class="tab-content" id="myTabContent">
								  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
													<h4>Active Properties</h4>
										<table class="property-table-wrap responsive-table">

											<tbody>
												<tr>
													<th><i class="fa fa-file-text"></i> Property</th>
													<th class="expire-date"><i class="fa fa-calendar"></i> Investment Date</th>
													<th></th>
												</tr>

												<!-- Item #1 -->
												@foreach($active_investments as $ap)
												<tr>
													<td class="property-container">
														<img src="{{Storage::url($ap->listing->image_1_path)}}" alt="">
														<div class="title">
															<h4><a href="#">{{$ap->listing->title}}</a></h4>
															<span>{{$ap->listing->address.' '.$ap->listing->city.', '.$ap->listing->state}}</span>
															<span class="table-property-price">${{$ap->amount_invested}} invested</span>
														</div>
													</td>
													<td class="expire-date">{{Carbon\Carbon::parse($ap->created_at)->format('F j, Y')}}</td>
													<td class="action">

														<a href="{{route('investor-listing', $ap->listing_id)}}"><i class="ti-eye"></i> View</a>

													</td>
												</tr>
												<form>
													<input type="text" />
												</form>


											@endforeach

											</tbody>
										</table></div>
								  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
													<h4>Pending Properties</h4>
										<table class="property-table-wrap responsive-table">

											<tbody>
												<tr>
													<th><i class="fa fa-file-text"></i> Property</th>
													<th class="expire-date"><i class="fa fa-calendar"></i> Investment Date</th>
													<th></th>
												</tr>

												<!-- Item #1 -->
												@foreach($pending_investments as $pp)
												<tr>
													<td class="property-container">
														<img src="{{Storage::url($pp->listing->image_1_path)}}" alt="">
														<div class="title">
															<h4><a href="#">{{$pp->listing->title}}</a></h4>
															<span>{{$pp->listing->address.' '.$pp->listing->city.', '.$pp->listing->state}}</span>
															<span class="table-property-price">${{$pp->amount_invested}} invested</span>
														</div>
													</td>
													<td class="expire-date">{{Carbon\Carbon::parse($pp->created_at)->format('F j, Y')}}</td>
													<td class="action">

														<a href="{{route('investor-listing', $pp->listing_id)}}"><i class="ti-eye"></i> View</a>

													</td>
												</tr>


											@endforeach




											</tbody>
										</table>
									</div>
								  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
													<h4>Completed Properties</h4>
										<table class="property-table-wrap responsive-table">

											<tbody>
												<tr>
													<th><i class="fa fa-file-text"></i> Property</th>
													<th class="expire-date"><i class="fa fa-calendar"></i> Investment Date</th>
													<th></th>
												</tr>

												<!-- Item #1 -->
												@foreach($completed_investments as $cp)
												<tr>
													<td class="property-container">
														<img src="{{Storage::url($cp->listing->image_1_path)}}" alt="">
														<div class="title">
															<h4><a href="#">{{$cp->listing->title}}</a></h4>
															<span>{{$cp->listing->address.' '.$cp->listing->city.', '.$cp->listing->state}}</span>
															<span class="table-property-price">${{$cp->amount_invested}} invested</span>
														</div>
													</td>
													<td class="expire-date">{{Carbon\Carbon::parse($cp->created_at)->format('F j, Y')}}</td>
													<td class="action">

														<a href="{{route('investor-listing', $cp->listing_id)}}"><i class="ti-eye"></i> View</a>

													</td>
												</tr>


											@endforeach




											</tbody>
										</table>
									</div>
								</div>


							</div>
						</div>

					</div>
				</div>
			</section>
			<!-- ============================ User Dashboard End ================================== -->


			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
@endsection
