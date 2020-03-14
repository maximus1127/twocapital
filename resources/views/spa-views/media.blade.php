@extends('spa-views.master')


@section('content')
  <section id="page-title" data-bg-parallax="{{asset('spa-img/tabloid.png')}}">
      <div class="container">
          <div class="page-title">
              <h1>See Who's Talking</h1>
              <span>Check out our media spotlights.</span>
          </div>

      </div>
  </section>
  <section id="page-content">
         <div class="container">

             <div id="blog" class="grid-layout post-3-columns m-b-30" data-item="post-item" id="blog-area">
               @foreach($medias as $media)
                 <div class="post-item border">
                     <div class="post-item-wrap">
                         <div class="post-video">
                             <img src="" width="560" height="376" frameborder="0">
                             {{-- <span class="post-meta-category"><a href="">Video</a></span> --}}
                         </div>
                         <div class="post-item-description">
                             <span class="post-meta-date"><i class="fa fa-calendar-o"></i>{{Carbon\Carbon::parse($media->created_at)->format('m/d/y')}}</span>
                             {{-- <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>33 Comments</a></span> --}}
                             <h2><a href="{{$media->link}}">{{$media->title}}</a></h2>
                             {{-- <p>Curabitur pulvinar euismod ante, ac sagittis ante posuere ac. Vivamus luctus commodo dolor porta feugiat. Fusce at velit id ligula pharetra laoreet.</p>
                             <a href="#" class="item-link">Read More <i class="icon-chevron-right"></i></a> --}}
                         </div>
                     </div>
                 </div>
               @endforeach
               </div>
             </div>

     </section>


@endsection

@section('footer-scripts')

<script>

</script>

@endsection
