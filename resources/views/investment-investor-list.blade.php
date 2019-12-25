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

									<table class="table table-striped">
									  <thead>
									    <tr>
									      <th scope="col">Investor Name</th>
									      <th scope="col">Shares</th>
									      <th scope="col">Amount</th>
												<th scope="col">Invested On</th>
												<th>				</th>
									    </tr>
									  </thead>
										<hr />
									  <tbody>
												@foreach($investments as $listing)
									    <tr id="listing{{$listing->id}}">
									      <th scope="row">{{$listing->user->fname.' '. $listing->user->lname}} <br /> <a href="{{route('cancel-investment', $listing->id)}}"><button class="btn btn-sm btn-danger">Cancel</button></a></th>
									      <td>{{$listing->shares}}</td>
									      <td>{{$listing->amount_invested}}</td>
												<td>{{Carbon\Carbon::parse($listing->created_at)->format('m-d-Y')}}</td>
												@if($listing->investment_completed == 0)
									      <td><button onclick="registerInvestment({{$listing->id}})">Register Investment</button><br /><small>Click to change investment from 'pending' to 'active'</small></td>
											@elseif($listing->investment_completed = 1)
												<td>
													<button class="btn btn-success" onclick="reconcile({{$listing->id}})">Reconcile Earnings</button>
												</td>
											@endif
									    </tr>
									   			@endforeach
									  </tbody>
									</table>

								<!-- Single Property End -->



							</div>



						</div>

					</div>
				</div>
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="title"></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
						<form action="{{route('submit-return')}}" method="post">
							@csrf
							<input type="hidden" id="investorID" name="investorID" />
								<input type="hidden" id="listingID" name="listingID"/>
								<input type="hidden" id="investmentID" name="investmentID"/>
					      <div class="modal-body">
					        Amount Invested: <span id="amount_invested"></span>
									<p>
										Amount Being Returned: $<input type="text" name="amount_returned" id="amount_returned" />
									</p>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					        <button type="submit" class="btn btn-primary">Submit</button>
					      </div>
						</form>
			    </div>
			  </div>
			</div>


@endsection

@section('footer-scripts')
<script>
$(document).ready(function(){
	$('footer').css('display', 'none');
});

function registerInvestment(e){
	$.ajax({
		url: '{{route('add-investment')}}',
		method: 'POST',
		data:{
			investment: e,
			_token: '{{csrf_token()}}'
		},
		success: function(data){
			if(data == 'good'){
				$("#listing"+e).css('display', 'none');
			} else {
				alert('Could not update');
			}
		}
	});
}


function reconcile(e){
	$.ajax({
		url: '{{route('returnUser')}}',
		method: 'post',
		data:{id:e},
		success: function(data){
console.log(data)
			$('#exampleModal').modal('show');
			$("#title").html(data.user);
			$('#amount_invested').html(data.investment.amount_invested);
			$('#investorID').val(data.investment.user_id);
			$('#listingID').val(data.investment.listing_id);
			$('#investmentID').val(data.investment.id);
		}
	})

}



</script>



@endsection
