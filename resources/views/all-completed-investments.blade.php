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

							<h2 class="ipt-title">All Completed Investments</h2>
							<span class="ipn-subtitle">View stats and manage completed investments</span>

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
							      <th scope="col">Name</th>
							      <th scope="col">Amount</th>
							      <th scope="col">Property</th>
							      <th scope="col">Returned</th>
										<th scope="col">Percentage Returned</th>
										<th></th>
							    </tr>
							  </thead>
							  <tbody>
										@foreach($investments as $inv)
							    <tr>
							      <td scope="row"><a href="{{route('view-user', $inv->id)}}">{{$inv->user->lname.', '.$inv->user->fname}}</a></td>
							      <td>{{$inv->amount_invested}}</td>
							      <td>{{$inv->listing->title}}</td>
							      <td id="returned{{$inv->investmentReturn->id}}" class="returnCell">{{$inv->investmentReturn->amount_returned}}</td>
										<td>{{round((($inv->investmentReturn->amount_returned - $inv->amount_invested) / $inv->amount_invested) * 100, 2)}}%</td>
										<td id="editButton">
											<button class="btn btn-warning" id="edit" onclick="edit({{$inv->investmentReturn->id.', '.$inv->investmentReturn->amount_returned}})">Edit</button>
										</td>
							    </tr>
										@endforeach
							  </tbody>
							</table>



					</div>


			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">

						<form action="{{route('update-return')}}" method="post">
							@csrf

								<input type="hidden" id="returnID" name="returnID"/>
								<div class="modal-body">
									Original Amount: $<span id="original_amount"></span>
									<p>
										Adjusted Amount: $<input type="text" name="amount_returned" id="adjusted_amount" />
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

	function edit(e,f){
		$('#exampleModal').modal('show');
		$('#original_amount').html(f);
		$('#returnID').val(e);
	}

</script>


@endsection
