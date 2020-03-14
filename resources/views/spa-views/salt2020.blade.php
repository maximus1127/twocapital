@extends('spa-views.master')
<!-- Inspiro Slider -->

@section('header-styles')
<link rel="stylesheet" href="{{asset('/spa-css/owl.carousel.min.css')}}" />
<link rel="stylesheet" href="{{asset('/spa-css/owl.theme.default.min.css')}}" />
<style>
  .owl-next{
    width: 30px;
    height: 30px;
    background-color: gray;
  }
  .owl-prev{
    width: 30px;
    height: 30px;
    background-color: gray;
  }

  .owl-nav{
    font-size: 30pt;
  }

</style>

@endsection
@section('content')

  <section id="page-title" data-bg-parallax="{{asset('spa-img/salt2020.jpg')}}">
      <div class="container">
          <div class="page-title">
              <h1>Experience Madeline Cove</h1>
              <span>We're on the move. Read more below to find out how SALT is impacting the community.</span>
          </div>

      </div>
  </section>
      <div class="container">
  <p>&nbsp;</p>
<p>Madeline Cove is a mixed-use development in Lafayette, Louisiana, located on Madeline Avenue within what is known locally as "University Corridor." This area is also part of the "Northside," referring to the geographic region that lies between Interstate 10 and downtown Lafayette. This exciting new micro-community is offering a wide variety of affordable housing for both sale and rent. Madeline Cove will be offering selections for single family dwellings, townhomes, senior and student housing, as well as commercial and green space.&nbsp;</p>
<p>Sponsored by SALT Capital Equity Group, our goal is to create an anchor for investment within the University Corridor that accomplishes the following:</p>
<ol>
<li>Design in a manner that complements the efforts of local government and quasi-governmental agencies to revitalize this area of Lafayette</li>
<li>Build affordable and unique housing</li>
<li>Create opportunity for economic growth by being the first major residential development in this area in years</li>
<li>Be the first major Opportunity Zone project in Lafayette, focusing on building in a sustainable and positively impactful manner</li>
</ol>
<p>SALT Capital Equity Group has created several strategic partnerships that include local community leaders, the city-parish government, quasi-governmental organizations, lending institutions, and other real estate investors that all share the same goal: to positively impact the Northside. &nbsp;</p>
<p>We are actively seeking equity partners and additionally welcome any other inquiries.</p>
<p>Interested parties can reach us through our webform <a href="https://www.saltcapitalequitygroup.com/spa-contact" target="_blank" rel="noopener">here</a>.
<p>&nbsp;</p>
<h3 style="text-align: center;">Drive-Through Rendering</h3>
<video width="100%" controls>
  <source src="{{asset('spa-img/salt2020/Madeline Cove.mp4')}}" type="video/mp4">
Your browser does not support the video tag.
</video>
<h3 style="text-align: center;">Other Renderings</h3>
<div class="owl-carousel owl-theme">
    <img style="width: 100%" src="{{asset('/spa-img/salt2020/Entrance.jpg')}}">
    <img style="width: 100%" src="{{asset('/spa-img/salt2020/TH-SF.jpg')}}">
    <img style="width: 100%" src="{{asset('/spa-img/salt2020/TH1.jpg')}}">
    <img style="width: 100%" src="{{asset('/spa-img/salt2020/TH2.jpg')}}">
    <img style="width: 100%" src="{{asset('/spa-img/salt2020/TH3.jpg')}}">
    <img style="width: 100%" src="{{asset('/spa-img/salt2020/Overhead1.jpg')}}">
    <img style="width: 100%" src="{{asset('/spa-img/salt2020/Overhead2.jpg')}}">
</div>
</div>
@endsection


@section('footer-scripts')
  <script src="{{asset('/spa-js/owl.carousel.min.js')}}"></script>

  <script>
  $('.owl-carousel').owlCarousel({
      loop:true,
      items: 1,
      nav:true,
  })
</script>
@endsection
