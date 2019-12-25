@extends('layouts.app')
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->

@section('content')
			<!-- ============================ Page Title Start================================== -->
			<div class="page-title">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">

							<h2 class="ipt-title">All Users</h2>
							<span class="ipn-subtitle">View stats and manage users</span>

						</div>
					</div>
				</div>
			</div>
			<!-- ============================ Page Title End ================================== -->

			<!-- ============================ Agent List Start ================================== -->
			<section>

				<div class="container">

					<!-- row Start -->
					{{-- <div class="row">

						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<div class="input-with-icon">
									<input type="text" class="form-control" placeholder="Search agents">
									<i class="ti-search"></i>
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-md-3">
							<a href="#" class="btn search-btn">Find Agents</a>
						</div>

					</div> --}}
					<!-- /row -->

					<div class="row">





							<table class="table table-striped">
							  <thead>
							    <tr>
										<th scope="col">Approved</th>
							      <th scope="col">Name</th>
							      <th scope="col">Email</th>
							      <th scope="col">Phone</th>
							      <th scope="col">Date Requested</th>
							    </tr>
							  </thead>
							  <tbody>
										@foreach($users as $user)
							    <tr>
										<td>
											@if($user->approved == 1)
											<i class="fas fa-check" style="color: green"></i>
												@else
											<a href="{{route('approve-user', $user->id)}}"><i class="fas fa-user-lock" style="color: red"></i></a>
											@endif
										</td>
							      <td scope="row"><a href="{{route('view-user', $user->id)}}">{{$user->lname.', '.$user->fname}}</a></td>
							      <td>{{$user->email}}</td>
							      <td>{{$user->phone}}</td>
							      <td>{{Carbon\Carbon::parse($user->created_at)->format('m-d-Y')}}</td>
							    </tr>
										@endforeach
							  </tbody>
							</table>










						<!-- Single Agent -->
						{{-- <div class="col-lg-4 col-md-6 col-sm-12">
							<div class="agents-grid">

								{{-- <div class="jb-bookmark"><a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Bookmark"><i class="ti-bookmark"></i></a></div>
								@if($user->approved == 1)
								<div class="agent-call"><i class="fas fa-check" style="color: green"></i></div>
							@else
							<div class="agent-call"><a href="{{route('approve-user', $user->id)}}"><i class="fas fa-user-lock" style="color: red"></i></a></div>
						@endif
								<div class="agents-grid-wrap">

									<div class="fr-grid-thumb">
										<a href="freelancer-detail.html">
											{{-- <div class="overall-rate">4.4</div>
											<img src="{{Storage::url($user->avatar_path)}}" class="img-fluid mx-auto" alt="" />
										</a>
									</div>
									<div class="fr-grid-deatil">
										<h5 class="fr-can-name"><a href="#">{{$user->fname.' '.$user->lname}}</a></h5>
										<span class="fr-position">Member Since: {{Carbon\Carbon::parse($user->created_at)->format('Y')}}</span>

									</div>

								</div>

								<div class="fr-grid-info">
									<ul>
										<li>Dollars Invested<span>${{$user->dollars}}</span></li>
										<li>Email<span>{{$user->email}}</span></li>
										<li>Phone<span>{{$user->phone}}</span></li>
									</ul>
								</div>

								<div class="fr-grid-footer">
									<a href="{{route('view-user', $user->id)}}" class="btn btn-outline-theme full-width">View Profile<i class="ti-arrow-right ml-1"></i></a>
								</div>

							</div>
						</div> --}}

					</div>


			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
@endsection
