@extends('layouts.app')



	@section("content")
		<!-- End Navigation -->
		<div class="clearfix"></div>
		<!-- ============================================================== -->
		<!-- Top header  -->
		<!-- ============================================================== -->

		<!-- ============================ Page Title Start================================== -->
		<div class="page-title">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12">

						<h2 class="ipt-title">Submit Property</h2>
						<span class="ipn-subtitle">Just Submit Your Property</span>

					</div>
				</div>
			</div>
		</div>
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
	<div class="container">

	  <form method="post" enctype="multipart/form-data"
	        class=" form-bordered" action="{{route('post-listing')}}">
	        @csrf
	        <div class="form-group row">
	            <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left"
	                   for="active">Active</label>
	            <div class="col-lg-6 col-12">
	                <select id="active"
	                       name="active" class="form-control">
	                       <option value="Active">Active</option>
	                       <option value="Inactive">Inactive</option>
	                       <option value="Archived">Archived</option>
	                     </select>
	            </div>
	        </div>
	        <div class="form-group row">
	            <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left"
	                   for="category">Category</label>
	            <div class="col-lg-6 col-12">
	                <select id="category"
	                       name="category" class="form-control">
	                       <option value="Residential">Residential</option>
	                       <option value="Commercial">Commercial</option>
	                       <option value="Multi-Family">Multi-Family</option>
	                       <option value="Mixed Use">Mixed Use</option>
	                     </select>
	            </div>
	        </div>

	      <div class="form-group row">
	          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left"
	                 for="title">Title</label>
	          <div class="col-lg-6 col-12">
	              <input type="text" id="title"
	                     name="title" class="form-control"
	                     placeholder="Title">
	          </div>
	      </div>
	      <div class="form-group row striped-col">
	          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left"
	                 for="start_date">Start Date</label>
	          <div class="col-lg-6 col-12">
	              <input type="date" id="start_date" name="start_date"
	                     class="form-control" placeholder="Start Date">
	          </div>
	      </div>
	      <div class="form-group row">
	          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left"
	                 for="end_date">End Date</label>
	          <div class="col-lg-6 col-12">
	              <input type="date" id="end_date" name="end_date"
	                     class="form-control" placeholder="End Date">
	          </div>
	      </div>
	      <div class="form-group row striped-col">
	          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left" for="address">Street Address</label>
	          <div class="col-lg-6 col-12">
	              <input type="text" id="address"
	                     name="address" class="form-control"
	                     placeholder="Street Address">
	          </div>
	      </div>
	      <div class="form-group row">
	          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left" for="example-disabled1">City</label>
	          <div class="col-lg-6 col-12">
	              <input type="text" id="city"
	                     name="city" class="form-control"
	                     placeholder="City" >
	          </div>
	      </div>
	      <div class="form-group row striped-col">
	          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left"
	                 for="example-select1">State</label>
	          <div class="col-lg-6 col-12">
	            <select id="state" class="form-control select2" style="width:100%" name="state">
	                <option value="">Select State...</option>
	                <optgroup label="Alaskan/Hawaiian Time Zone">
	                    <option value="AK">Alaska</option>
	                    <option value="HI">Hawaii</option>
	                </optgroup>
	                <optgroup label="Pacific Time Zone">
	                    <option value="CA">California</option>
	                    <option value="NV">Nevada</option>
	                    <option value="OR">Oregon</option>
	                    <option value="WA">Washington</option>
	                </optgroup>
	                <optgroup label="Mountain Time Zone">
	                    <option value="AZ">Arizona</option>
	                    <option value="CO">Colorado</option>
	                    <option value="ID">Idaho</option>
	                    <option value="MT">Montana</option>
	                    <option value="NE">Nebraska</option>
	                    <option value="NM">New Mexico</option>
	                    <option value="ND">
	                        North Dakota
	                    </option>
	                    <option value="UT">Utah</option>
	                    <option value="WY">Wyoming</option>
	                </optgroup>
	                <optgroup label="Central Time Zone">
	                    <option value="AL">Alabama</option>
	                    <option value="AR">Arkansas</option>
	                    <option value="IL">Illinois</option>
	                    <option value="IA">Iowa</option>
	                    <option value="KS">Kansas</option>
	                    <option value="KY">Kentucky</option>
	                    <option value="LA">Louisiana</option>
	                    <option value="MN">Minnesota</option>
	                    <option value="MS">
	                        Mississippi
	                    </option>
	                    <option value="MO">Missouri</option>
	                    <option value="OK">Oklahoma</option>
	                    <option value="SD">
	                        South Dakota
	                    </option>
	                    <option value="TX">Texas</option>
	                    <option value="TN">Tennessee</option>
	                    <option value="WI">Wisconsin</option>
	                </optgroup>
	                <optgroup label="Eastern Time Zone">
	                    <option value="CT">
	                        Connecticut
	                    </option>
	                    <option value="DE">Delaware</option>
	                    <option value="FL">Florida</option>
	                    <option value="GA">Georgia</option>
	                    <option value="IN">Indiana</option>
	                    <option value="ME">Maine</option>
	                    <option value="MD">Maryland</option>
	                    <option value="MA">
	                        Massachusetts
	                    </option>
	                    <option value="MI">Michigan</option>
	                    <option value="NH">
	                        New Hampshire
	                    </option>
	                    <option value="NJ">New Jersey</option>
	                    <option value="NY">New York</option>
	                    <option value="NC">
	                        North Carolina
	                    </option>
	                    <option value="OH">Ohio</option>
	                    <option value="PA">
	                        Pennsylvania
	                    </option>
	                    <option value="RI">
	                        Rhode Island
	                    </option>
	                    <option value="SC">
	                        South Carolina
	                    </option>
	                    <option value="VT">Vermont</option>
	                    <option value="VA">Virginia</option>
	                    <option value="WV">
	                        West Virginia
	                    </option>
	                </optgroup>
	            </select>
	          </div>
	      </div>
	      <div class="form-group row">
	          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left" for="zip">Zip</label>
	          <div class="col-lg-6 col-12">
	              <input type="text" id="zip"
	                     name="zip" class="form-control"
	                     placeholder="70555" >
	          </div>
	      </div>
	      <div class="form-group row striped-col">
	          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left" for="public_description">Public Description</label>
	          <div class="col-lg-6 col-12">
	              <textarea id="public_description"
	                        name="public_description" rows="7"
	                        class="form-control resize_vertical"
	                        placeholder="Description...."></textarea>
	          </div>
	      </div>
	      <div class="form-group row striped-col">
	          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left" for="private_description">Private Description</label>
	          <div class="col-lg-6 col-12">
	              <textarea id="private_description"
	                        name="private_description" rows="7"
	                        class="form-control resize_vertical"
	                        placeholder="Description...."></textarea>
	          </div>
	      </div>
	      <div class="form-group row">
	          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left" for="shares">Shares</label>
	          <div class="col-lg-6 col-12">
	              <input type="text" id="shares"
	                     name="shares" class="form-control"
	                     placeholder="How many available shares" >
	          </div>
	      </div>
	      <div class="form-group row">
	          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left" for="share_price">Share Price</label>
	          <div class="col-lg-6 col-12">
	              <input type="text" id="share_price"
	                     name="share_price" class="form-control"
	                     placeholder="Price per share" >
	          </div>
	      </div>
	      <div class="form-group row">
	          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left" for="minimum_raise">Minimum Raise</label>
	          <div class="col-lg-6 col-12">
	              <input type="text" id="minimum_raise"
	                     name="minimum_raise" class="form-control"
	                     placeholder="Minimum Needed" >
	          </div>
	      </div>
	      <div class="form-group row">
	          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left" for="target_raise">Target Raise</label>
	          <div class="col-lg-6 col-12">
	              <input type="text" id="target_raise"
	                     name="target_raise" class="form-control"
	                     placeholder="Target Raise" >
	          </div>
	      </div>

	      <div class="form-group row striped-col ">
	          <label class="col-lg-3 col-12 col-form-label file-margin  text-lg-right text-left"
	                 for="document1">Document 1</label>
	          <div class="col-lg-9 col-12  p-t-24 ">
	            <input type="text" name="document_1_title" placeholder="Document Title"/>
	              <input type="file" id="document1"
	                     name="document1">
	          </div>
	      </div>
	      <div class="form-group row striped-col ">
	          <label class="col-lg-3 col-12 col-form-label file-margin  text-lg-right text-left"
	                 for="document2">Document 2</label>
	          <div class="col-lg-9 col-12  p-t-24 ">
	            <input type="text" name="document_2_title" placeholder="Document Title"/>
	              <input type="file" id="document2"
	                     name="document2">
	          </div>
	      </div>
	      <div class="form-group row striped-col ">
	          <label class="col-lg-3 col-12 col-form-label file-margin  text-lg-right text-left"
	                 for="document3">Document 3</label>
	          <div class="col-lg-9 col-12  p-t-24 ">
	            <input type="text" name="document_3_title" placeholder="Document Title"/>
	              <input type="file" id="document3"
	                     name="document3">
	          </div>
	      </div>
	      <div class="form-group row striped-col ">
	          <label class="col-lg-3 col-12 col-form-label file-margin  text-lg-right text-left"
	                 for="document4">Document 4</label>
	          <div class="col-lg-9 col-12  p-t-24 ">
	            <input type="text" name="document_4_title" placeholder="Document Title"/>
	              <input type="file" id="document4"
	                     name="document4">
	          </div>
	      </div>
	      <div class="form-group row striped-col ">
	          <label class="col-lg-3 col-12 col-form-label file-margin  text-lg-right text-left"
	                 for="document5">Document 5</label>
	          <div class="col-lg-9 col-12  p-t-24 ">
	              <input type="text" name="document_5_title" placeholder="Document Title"/>
	              <input type="file" id="document5"
	                     name="document5">
	          </div>
	      </div>
	      <div class="form-group row striped-col ">
	          <label class="col-lg-3 col-12 col-form-label file-margin  text-lg-right text-left"
	                 for="example-file-input1">Image 1</label>
	          <div class="col-lg-9 col-12  p-t-24 ">
	              <input type="file" id="example-file-input1"
	                     name="image1">
	          </div>
	      </div>
	      <div class="form-group row striped-col ">
	          <label class="col-lg-3 col-12 col-form-label file-margin  text-lg-right text-left"
	                 for="example-file-input1">Image 2</label>
	          <div class="col-lg-9 col-12  p-t-24 ">
	              <input type="file" id="example-file-input1"
	                     name="image2">
	          </div>
	      </div>
	      <div class="form-group row striped-col ">
	          <label class="col-lg-3 col-12 col-form-label file-margin  text-lg-right text-left"
	                 for="example-file-input1">Image 3</label>
	          <div class="col-lg-9 col-12  p-t-24 ">
	              <input type="file" id="example-file-input1"
	                     name="image3">
	          </div>
	      </div>
	      <div class="form-group row striped-col ">
	          <label class="col-lg-3 col-12 col-form-label file-margin  text-lg-right text-left"
	                 for="example-file-input1">Image 4</label>
	          <div class="col-lg-9 col-12  p-t-24 ">
	              <input type="file" id="example-file-input1"
	                     name="image4">
	          </div>
	      </div>
	      <div class="form-group row striped-col ">
	          <label class="col-lg-3 col-12 col-form-label file-margin  text-lg-right text-left"
	                 for="example-file-input1">Image 5</label>
	          <div class="col-lg-9 col-12  p-t-24 ">
	              <input type="file" id="example-file-input1"
	                     name="image5">
	          </div>
	      </div>

	      <div class="form-group row form-actions">
	          <div class="col-lg-9 col-12  offset-lg-3">
	              <button type="submit" class="btn btn-effect-ripple btn-primary">
	                  Submit
	              </button>
	             
	          </div>
	      </div>
	  </form>

	</div>

	@stop
