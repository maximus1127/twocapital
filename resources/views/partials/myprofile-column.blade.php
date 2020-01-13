<div class="page-title">
  <div class="container">
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
  @if($user->id == Auth::user()->id)
    <div class="row">
      <div class="col-lg-12 col-md-12">

        <h2 class="ipt-title">Hi {{$user->fname}}!</h2>
        <span class="ipn-subtitle">Welcome To Your Account</span>

      </div>
    </div>
  @else
    <div class="row">
      <div class="col-lg-12 col-md-12">

        <h2 class="ipt-title">Welcome {{Auth::user()->fname}}!</h2>
        <span class="ipn-subtitle">You are viewing {{$user->fname}}'s account</span>

      </div>
    </div>
  @endif
  </div>
</div>

<div class="col-lg-4 col-md-12">
  <div class="dashboard-navbar">

    <div class="d-user-avater">
      <small>Click to change image</small>
      <img src="{{$user->avatar_path == null? asset('/img/avatar.jpg') : Storage::url($user->avatar_path)}}" class="img-fluid avater" alt="" onclick="avatar()" style="cursor: pointer;" id="currentAvatar">
      <form action="{{route('update-avatar')}}" method="post" enctype="multipart/form-data" id="avatar-form">
        @csrf
        <input type="file" name="avatar" class="form-control" style="display:none;" id="avatar" onchange="document.getElementById('avatar-form').submit()"/>
        <input type="hidden" name="id" value="{{$user->id}}">
        <button type="submit" name="avatar-submit" class="btn btn-sm btn-danger" id="avatar-submit" style="display: none;">Save</button>
      </form>
      <h4>{{$user->fname.' '.$user->lname}}</h4>
      <span>{{$user->city.', '.$user->state}}</span>
    </div>

    <div class="d-navigation">
      <ul>
        <li class="{{Route::current()->getName() == 'update-profile'? 'active':''}}"><a href="{{route('update-profile')}}"><i class="ti-user"></i>My Profile</a></li>
        <li class="{{Route::current()->getName() == 'viewMyActive'? 'active':''}}"><a href="{{$user->id == Auth::user()->id? route('viewMyActive'): route('viewInvestorProperties', $user->id)}}"><i class="ti-layers"></i>My Properties</a></li>
        <li class="{{Route::current()->getName() == 'change-password'? 'active':''}}"><a href="{{route('change-password')}}"><i class="ti-unlock"></i>Change Password</a></li>
        <li><a href="{{route('logout')}}"><i class="ti-power-off"></i>Log Out</a></li>
      </ul>
    </div>

  </div>
</div>
