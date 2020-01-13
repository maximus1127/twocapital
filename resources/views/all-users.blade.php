@extends('layouts.app')
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			@section('header-styles')

			@endsection

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
			<section>

				<div class="container">


					<div class="row">
							<table class="table table-striped">
							  <thead>
							    <tr>
										<th scope="col">Approved</th>
							      <th scope="col">Name</th>
							      <th scope="col">Email</th>
							      <th scope="col">Phone</th>
							      <th scope="col">Date Joined</th>
										<th scope="col"></th>
							    </tr>
							  </thead>
							  <tbody>
										@foreach($users as $user)
							    <tr>
										<td>
											@if($user->approved == 0)
											<a href="{{route('approve-user', $user->id)}}" onclick="return confirm('Are you sure you want to APPROVE?')" ><i class="fas fa-check " style="color: green"></i></a>
											<a href="{{route('decline-user', $user->id)}}" onclick="return confirm('Are you sure you want to DENY?')"><i class="fas fa-user-lock " style="color: red"></i></a><br />
											 <small class="tooltiptext">Click lock to deny, check to approve</small>
										 @else
											 Approved
										 @endif
										</td>
							      <td scope="row"><a href="{{route('view-user', $user->id)}}">{{$user->lname.', '.$user->fname}}</a></td>
							      <td>{{$user->email}}</td>
							      <td>{{$user->phone}}</td>
							      <td>{{Carbon\Carbon::parse($user->created_at)->format('m-d-Y')}}</td>
											@if(Auth::user()->role == 'super')
										<td>
												<select name="role" onchange="updateUserRole({{$user->id}})" id="role{{$user->id}}">
													<optgroup label="Current Role">	<option id="currentRole{{$user->id}}">{{$user->role}}</option></optgroup>
													<optgroup label="Selections">
													<option value="super">super</option>
													<option value="investor">investor</option>
													<option value="member manager">member manager</option>
												</optgroup>
												</select>
											@endif
										</td>
							    </tr>
										@endforeach
							  </tbody>
							</table>



					</div>


			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
@endsection


@section('footer-scripts')
<script>
function updateUserRole(d){

	$.ajax({
		url: '{{route('updateUserRole')}}',
		type: 'get',
		data: {
			user: d,
			role: $("#role"+d).val()
		},
		success: function(data){
			$("#currentRole"+d).html(data);
		},
		error: function(){
			alert('Could not update role');
		}

	})
}




</script>

@endsection
