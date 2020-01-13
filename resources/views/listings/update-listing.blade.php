@extends('layouts.app')


@section("content")
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

  <form method="post" enctype="multipart/form-data"
        class=" form-bordered" action="{{route('update-listing')}}">
        @csrf
        <input type="hidden" value="{{$listing->id}}" name="id" />
        <div class="form-group row">
            <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left"
                   for="active">Active</label>
            <div class="col-lg-6 col-12">
                <select id="active"
                       name="active" class="form-control">
                       <option value="{{$listing->active}}">
                         {{$listing->active}}
                       </option>
                       <option value="Active">Active</option>
                       <option value="Funded">Funded</option>
                       <option value="Development">Development</option>
                       <option value="Post-Development">Post-Development</option>
                        <option value="Completed">Completed</option>
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
                       <option value="{{$listing->category}}">
                         {{$listing->category}}
                       </option>
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
                     placeholder="Title" value="{{$listing->title}}">
          </div>
      </div>
      <div class="form-group row striped-col">
          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left"
                 for="start_date">Start Date</label>
          <div class="col-lg-6 col-12">
              <input type="date" id="start_date" name="start_date"
                     class="form-control" placeholder="Start Date" value="{{$listing->start_date}}">
          </div>
      </div>
      <div class="form-group row">
          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left"
                 for="end_date">End Date</label>
          <div class="col-lg-6 col-12">
              <input type="date" id="end_date" name="end_date"
                     class="form-control" placeholder="End Date" value="{{$listing->end_date}}">
          </div>
      </div>
      <div class="form-group row striped-col">
          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left" for="address">Street Address</label>
          <div class="col-lg-6 col-12">
              <input type="text" id="address"
                     name="address" class="form-control"
                     placeholder="Street Address" value="{{$listing->address}}">
          </div>
      </div>
      <div class="form-group row">
          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left" for="example-disabled1">City</label>
          <div class="col-lg-6 col-12">
              <input type="text" id="city"
                     name="city" class="form-control"
                     placeholder="City" value="{{$listing->city}}">
          </div>
      </div>
      <div class="form-group row striped-col">
          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left"
                 for="example-select1">State</label>
          <div class="col-lg-6 col-12">
            <select id="state" class="form-control select2" style="width:100%" name="state">
                <option value="{{$listing->state}}">{{$listing->state}}</option>
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
                     placeholder="70555" value="{{$listing->zip}}">
          </div>
      </div>
      <div class="form-group row striped-col">
          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left" for="public_description">Public Description</label>
          <div class="col-lg-6 col-12">
              <textarea id="public_description"
                        name="public_description" rows="7"
                        class="form-control resize_vertical"
                        placeholder="Description....">{{$listing->public_description}}</textarea>
          </div>
      </div>
      <div class="form-group row striped-col">
          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left" for="private_description">Private Description</label>
          <div class="col-lg-6 col-12">
              <textarea id="private_description"
                        name="private_description" rows="7"
                        class="form-control resize_vertical"
                        placeholder="Description....">{{$listing->private_description}}</textarea>
          </div>
      </div>
      <div class="form-group row">
          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left" for="shares">Shares</label>
          <div class="col-lg-6 col-12">
              <input type="text" id="shares"
                     name="shares" class="form-control"
                     placeholder="How many available shares" value="{{$listing->shares}}">
          </div>
      </div>
      <div class="form-group row">
          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left" for="share_price">Share Price</label>
          <div class="col-lg-6 col-12">
              <input type="text" id="share_price"
                     name="share_price" class="form-control"
                     placeholder="Price per share" value="{{$listing->share_price}}">
          </div>
      </div>
      <div class="form-group row">
          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left" for="minimum_raise">Minimum Raise</label>
          <div class="col-lg-6 col-12">
              <input type="text" id="minimum_raise"
                     name="minimum_raise" class="form-control"
                     placeholder="Minimum Needed" value="{{$listing->minimum_raise}}">
          </div>
      </div>
      <div class="form-group row">
          <label class="col-lg-3 col-12 col-form-label  text-lg-right text-left" for="target_raise">Target Raise</label>
          <div class="col-lg-6 col-12">
              <input type="text" id="target_raise"
                     name="target_raise" class="form-control"
                     placeholder="Target Raise" value="{{$listing->target_raise}}">
          </div>
      </div>

      <div class="form-group row striped-col ">
          <label class="col-lg-3 col-12 col-form-label file-margin  text-lg-right text-left"
                 for="document1">Document 1</label>
          <div class="col-lg-9 col-12  p-t-24 " id="document_1">
            @if($listing->document_1_path)
            <input type="text" name="document_1_title" placeholder="Document Title"value="{{$listing->document_1_title}}"/>
            <input type="hidden" name="document1" value="{{$listing->document_1_path}}">
              <a href="{{Storage::url($listing->document_1_path)}}" target="_blank">View Document</a>
              <button type="button" class="btn-sm btn-danger" onclick="deleteDocument(1)">Delete</button>
            @else
              <input type="text" name="document_1_title" placeholder="Document Title"/>
                <input type="file" id="document1"
                       name="document1">
            @endif
          </div>
      </div>
      <div class="form-group row striped-col ">
          <label class="col-lg-3 col-12 col-form-label file-margin  text-lg-right text-left"
                 for="document2">Document 2</label>
          <div class="col-lg-9 col-12  p-t-24 " id="document_2">
            @if($listing->document_2_path)
              <input type="text" name="document_2_title" placeholder="Document Title"value="{{$listing->document_2_title}}"/>
              <a href="{{Storage::url($listing->document_2_path)}}" target="_blank">View Document</a>
              <input type="hidden" name="document2" value="{{$listing->document_2_path}}">
              <button type="button" class="btn-sm btn-danger" onclick="deleteDocument(2)">Delete</button>
            @else
              <input type="text" name="document_2_title" placeholder="Document Title"/>
                <input type="file" id="document2"
                       name="document2">
            @endif
          </div>
      </div>
      <div class="form-group row striped-col ">
          <label class="col-lg-3 col-12 col-form-label file-margin  text-lg-right text-left"
                 for="document3">Document 3</label>
          <div class="col-lg-9 col-12  p-t-24 " id="document_3">
            @if($listing->document_3_path)
            <input type="text" name="document_3_title" placeholder="Document Title"value="{{$listing->document_3_title}}"/>
              <a href="{{Storage::url($listing->document_3_path)}}" target="_blank">View Document</a>
              <input type="hidden" name="document3" value="{{$listing->document_3_path}}">
              <button type="button" class="btn-sm btn-danger" onclick="deleteDocument(3)">Delete</button>
            @else
              <input type="text" name="document_3_title" placeholder="Document Title"/>
                <input type="file" id="document3"
                       name="document3">
            @endif
          </div>
      </div>
      <div class="form-group row striped-col ">
          <label class="col-lg-3 col-12 col-form-label file-margin  text-lg-right text-left"
                 for="document4">Document 4</label>
          <div class="col-lg-9 col-12  p-t-24 " id="document_4">
            @if($listing->document_4_path)
            <input type="text" name="document_4_title" placeholder="Document Title"value="{{$listing->document_4_title}}"/>
              <a href="{{Storage::url($listing->document_4_path)}}" target="_blank">View Document</a>
              <input type="hidden" name="document4" value="{{$listing->document_4_path}}">
              <button type="button" class="btn-sm btn-danger" onclick="deleteDocument(4)">Delete</button>
            @else
              <input type="text" name="document_4_title" placeholder="Document Title"/>
                <input type="file" id="document4"
                       name="document4">
            @endif
          </div>
      </div>
      <div class="form-group row striped-col ">
          <label class="col-lg-3 col-12 col-form-label file-margin  text-lg-right text-left"
                 for="document5">Document 5</label>
          <div class="col-lg-9 col-12  p-t-24 " id="document_5">
            @if($listing->document_5_path)
            <input type="text" name="document_5_title" placeholder="Document Title"value="{{$listing->document_5_title}}"/>
              <a href="{{Storage::url($listing->document_5_path)}}" target="_blank">View Document</a>
              <input type="hidden" name="document5" value="{{$listing->document_5_path}}">
              <button type="button" class="btn-sm btn-danger" onclick="deleteDocument(5)">Delete</button>
            @else
              <input type="text" name="document_5_title" placeholder="Document Title"/>
                <input type="file" id="document5"
                       name="document5">
            @endif
          </div>
      </div>
      <div class="form-group row striped-col ">
          <label class="col-lg-3 col-12 col-form-label file-margin  text-lg-right text-left"
                 for="example-file-input1">Image 1</label>
          <div class="col-lg-9 col-12  p-t-24 " id="image_1">
            @if($listing->image_1_path)
            <img src="{{Storage::url($listing->image_1_path)}}" style="max-width: 200px;" />
            <input type="hidden" name="image1" value="{{$listing->image_1_path}}">
            <button type="button" class="btn-sm btn-danger" onclick="deleteImage(1)">Delete</button>
            @else
              <input type="file" name="image1" >
            @endif
          </div>
      </div>
      <div class="form-group row striped-col ">
          <label class="col-lg-3 col-12 col-form-label file-margin  text-lg-right text-left"
                 for="example-file-input1">Image 2</label>
                 <div class="col-lg-9 col-12  p-t-24 " id="image_2">
                   @if($listing->image_2_path)
                   <img src="{{Storage::url($listing->image_2_path)}}" style="max-width: 200px;"/>
                   <input type="hidden" name="image2" value="{{$listing->image_2_path}}">
                   <button type="button" class="btn-sm btn-danger" onclick="deleteImage(2)">Delete</button>
                   @else
                     <input type="file" name="image2">
                   @endif
                 </div>
      </div>
      <div class="form-group row striped-col ">
          <label class="col-lg-3 col-12 col-form-label file-margin  text-lg-right text-left"
                 for="example-file-input1">Image 3</label>
                 <div class="col-lg-9 col-12  p-t-24 " id="image_3">
                   @if($listing->image_3_path)
                   <img src="{{Storage::url($listing->image_3_path)}}" style="max-width: 200px;"/>
                   <input type="hidden" name="image3" value="{{$listing->image_3_path}}">
                   <button type="button" class="btn-sm btn-danger" onclick="deleteImage(3)">Delete</button>
                   @else
                     <input type="file" name="image3">
                   @endif
                 </div>
      </div>
      <div class="form-group row striped-col ">
          <label class="col-lg-3 col-12 col-form-label file-margin  text-lg-right text-left"
                 for="example-file-input1">Image 4</label>
                 <div class="col-lg-9 col-12  p-t-24 " id="image_4">
                   @if($listing->image_4_path)
                   <img src="{{Storage::url($listing->image_4_path)}}" style="max-width: 200px;"/>
                   <input type="hidden" name="image4" value="{{$listing->image_4_path}}">
                   <button type="button" class="btn-sm btn-danger" onclick="deleteImage(4)">Delete</button>
                   @else
                     <input type="file" name="image4">
                   @endif
                 </div>
      </div>
      <div class="form-group row striped-col ">
          <label class="col-lg-3 col-12 col-form-label file-margin  text-lg-right text-left"
                 for="example-file-input1">Image 5</label>
                 <div class="col-lg-9 col-12  p-t-24 " id="image_5">
                   @if($listing->image_5_path)
                   <img src="{{Storage::url($listing->image_5_path)}}" style="max-width: 200px;"/>
                   <input type="hidden" name="image5" value="{{$listing->image_5_path}}">
                   <button type="button" class="btn-sm btn-danger" onclick="deleteImage(5)">Delete</button>
                   @else
                     <input type="file" name="image5">
                   @endif
                 </div>
      </div>

      <div class="form-group row form-actions">
          <div class="col-lg-9 col-12  offset-lg-3">
              <button type="submit" class="btn btn-effect-ripple btn-primary">
                  Submit
              </button>
              <button type="reset"
                      class="btn btn-effect-ripple btn-default reset_btn2">
                  Reset
              </button>
          </div>
      </div>
  </form>


@stop


@section('footer-scripts')

  <script>
  function deleteDocument(e){
    $.ajax({
      url: "{{route('delete-document')}}",
      method: "GET",
      data:{
        listing: {{$listing->id}},
        path: "document_"+e+"_path",
        title: "document_"+e+"_title"
      },
      success: function(data){
        $("#document_"+e).html(`
            <input type="text" name="document_${e}_title" placeholder="Document Title"/>
              <input type="file" id="document${e}"
                     name="document${e}">`
        )
      },
      error: function(){
        alert('Failed To Delete This Document');
      }
    });
}
function deleteImage(e){
  $.ajax({
    url: "{{route('delete-image')}}",
    method: "GET",
    data:{
      listing: {{$listing->id}},
      path: "image_"+e+"_path",
    },
    success: function(data){
      $("#image_"+e).html(`

            <input type="file"
                   name="image${e}">`
      )
    },
    error: function(){
      alert('Failed To Delete This Document');
    }
  });
}



  </script>

@endsection
