<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <!-- Document title -->
    <title>SALT Capital Equity Group</title>
    <!-- Stylesheets & Fonts -->
    <link href="{{asset('/spa-css/plugins.css')}}" rel="stylesheet">
    <link href="{{asset('/spa-css/style.css')}}" rel="stylesheet">

    <style>
      .contactButtonDiv{
        width: 100%;
        text-align: center;
        justify-content: center;
      }
    </style>
    @yield('header-styles')
</head>

<body>
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Header -->
        <header id="header" data-transparent="true" data-fullwidth="true" class="dark submenu-light">
            <div class="header-inner">
                <div class="container">
                    <!--Logo-->
                    <div id="logo">
                        <a href="/spa">
                          {{-- <img src="{{asset('/spa-img/Banner.png')}}"/> --}}
                            <span class="logo-default"><img src="{{asset('spa-img/Logo resized.png')}}" style="top: 0; padding: 0; height: 80px;"/></span>
                            <span class="logo-dark"><img src="{{asset('spa-img/Logo_High_res.png')}}" style="top: 0; padding: 0; height: 80px;"/></span>
                        </a>
                    </div>
                    <!--End: Logo-->
                    <!-- Search -->
                    {{-- <div id="search"><a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i class="icon-x"></i></a>
                        <form class="search-form" action="search-results-page.html" method="get">
                            <input class="form-control" name="q" type="search" placeholder="Type & Search..." />
                            <span class="text-muted">Start typing & press "Enter" or "ESC" to close</span>
                        </form>
                    </div> --}}
                    <!-- end: search -->
                    <!--Header Extras-->
                    {{-- <div class="header-extras">
                        <ul>
                            <li>
                                <a id="btn-search" href="#"> <i class="icon-search"></i></a>
                            </li>
                            <li>
                                <div class="p-dropdown">
                                    <a href="#"><i class="icon-globe"></i><span>EN</span></a>
                                    <ul class="p-dropdown-content">
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">Spanish</a></li>
                                        <li><a href="#">English</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div> --}}
                    <!--end: Header Extras-->
                    <!--Navigation Resposnive Trigger-->
                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>
                    <!--end: Navigation Resposnive Trigger-->
                    <!--Navigation-->
                    <div id="mainMenu">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li><a href="{{\Request::is('/') ? "#" : '/' }}" class="scroll-to">Home</a></li>
                                    <li><a href="{{\Request::is('/') ? "#wwd" : '/' }}" id="wwda" class="scroll-to">What We Do</a></li>
                                      <li><a href="{{\Request::is('/') ? "#membership" : '/' }}" class="scroll-to">Become A Member</a></li>
                                      <li><a href="{{\Request::is('/') ? "#team" : '/' }}"class="scroll-to">Meet Our Team</a></li>
                                      <li><a href="{{route('salt2020')}}" class="scroll-to">Madeline Cove</a></li>
                                      <li><a href="{{route('spa-media')}}" class="scroll-to">Media</a></li>
                                      <li><a href="{{route('investor-home')}}" class="scroll-to">Investor Login</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!--end: Navigation-->
                </div>
            </div>
        </header>
        <!-- end: Header -->
      @yield('content')
        <!-- Footer -->
        <footer id="footer">
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        {{-- <div class="col-lg-5">
                            <div class="widget">
                                <div class="widget-title">Polo HTML5 Template</div>
                                <p class="mb-5">Built with love in Fort Worth, Texas, USA<br>
                                    All rights reserved. Copyright © 2019. INSPIRO.</p>
                                <a href="https://themeforest.net/item/polo-responsive-multipurpose-html5-template/13708923" class="btn btn-inverted">Purchase Now</a>
                            </div>
                        </div> --}}
                        {{-- <div class="col-lg-7">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="widget">
                                        <div class="widget-title">Discover</div>
                                        <ul class="list">
                                            <li><a href="#">Features</a></li>
                                            <li><a href="#">Layouts</a></li>
                                            <li><a href="#">Corporate</a></li>
                                            <li><a href="#">Updates</a></li>
                                            <li><a href="#">Pricing</a></li>
                                            <li><a href="#">Customers</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget">
                                        <div class="widget-title">Features</div>
                                        <ul class="list">
                                            <li><a href="#">Layouts</a></li>
                                            <li><a href="#">Headers</a></li>
                                            <li><a href="#">Widgets</a></li>
                                            <li><a href="#">Footers</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget">
                                        <div class="widget-title">Pages</div>
                                        <ul class="list">
                                            <li><a href="#">Portfolio</a></li>
                                            <li><a href="#">Blog</a></li>
                                            <li><a href="#">Shop</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget">
                                        <div class="widget-title">Support</div>
                                        <ul class="list">
                                            <li><a href="#">Help Desk</a></li>
                                            <li><a href="#">Documentation</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="copyright-content">
                <div class="container">

                    <div class="copyright-text text-center">&copy; 2019 SALT Capital Equity Group
                        All Rights Reserved. </div>
                        <p style="font-size: 7pt;" class="text-center">Salt Capital Equity Group, LLC (“SCEG”) operates a website at saltcapitalequitygroup.com (the “Site”). By using this website, you accept our <a href="/terms-of-service">Terms of Use</a> and <a href="/privacy-policy">Privacy Policy</a>. Past performance is no guarantee of future results. Any historical returns, expected returns, or probability projections may not reflect actual future performance. All securities involve risk and may result in partial or total loss. While the data we use from our underwriters and third parties is believed to be reliable, we cannot ensure the accuracy or completeness of third parties. Neither SCEG nor any of its affiliates provide tax advice and do not represent in any manner that the outcomes described herein will result in any particular tax consequence. Prospective investors should confer with their personal tax advisors regarding the tax consequences based on their particular circumstances. Neither SCEG nor any of its affiliates assume responsibility for the tax consequences for any investor of any investment.</p>
                </div>
            </div>
        </footer>
        <!-- end: Footer -->
    </div>
    <!-- end: Body Inner -->
    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--Plugins-->
    <script src="{{asset('/spa-js/jquery.js')}}"></script>
    <script src="{{asset('/spa-js/plugins.js')}}"></script>
    <!--Template functions-->
    <script src="{{asset('/spa-js/functions.js')}}"></script>
    @yield('footer-scripts')
    <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158697150-2"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-158697150-2');
  </script>

</body>

</html>
