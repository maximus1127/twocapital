@extends('spa-views.master')
<!-- Inspiro Slider -->
@section('content')
<div id="slider" class="inspiro-slider slider-fullscreen dots-creative">
    <!-- Slide 1 -->
    <div class="slide kenburns" data-bg-image="{{asset('/spa-img/homepage1.jpg')}}">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="slide-captions text-center text-light">
                <!-- Captions -->
                <h1>WELCOME TO SALT</h1>
                <p>SALT Capital seeks to bridge the gap between our members by brokering investor-to-investor transactions, whereby investors from all backgrounds and income levels can pool their resources together to gain direct access to a larger pool of real estate investment opportunities. </p>
                <a href="/spa-contact" class="btn scroll-to">Contact Us</a>
                <!-- end: Captions -->
            </div>
        </div>
    </div>
    <!-- end: Slide 1 -->
    <!-- Slide 2 -->
    <div class="slide" data-bg-video="{{asset('/spa-videos/pexels-waves.mp4')}}">
        <div class="bg-overlay"></div>
        <div class="container">
          <div class="slide-captions text-center text-light">
              <!-- Captions -->
              <h1>Generational Wealth</h1>
              <p>SALT Capital is a membership-based equity group focused on helping investors build generational wealth through sustainable and transparent real estate investments.</p>
              <a href="/spa-contact" class="btn scroll-to">Contact Us</a>
              <!-- end: Captions -->
          </div>
        </div>
    </div>
    <!-- end: Slide 2 -->
</div>
<!--end: Inspiro Slider -->
<!-- WELCOME -->
<section id="welcome" class="p-b-0">
    <div class="container">
        <div class="heading-text heading-section text-center m-b-40" data-animate="fadeInUp">
            <h2>A DIFFERENT PATH</h2>
            <span class="lead">WELCOME TO THE FUTURE OF INVESTMENT EDUCATION</span>
        </div>
        <div class="row" data-animate="fadeInUp">
            <div class="col-lg-12 text-center">
               <p>A successful investor is an educated investor. A successful education requires an appropriate combination of first-hand experience, self-initiated learning, and a strong network of individuals who have demonstrated success in the area in which you are seeking to invest. SALT Capital seeks to act as a guard rail to this process, minimizing the risk exposure to prospective real estate investors by providing access to a robust network of experience and education.</p>
            </div>
        </div>
    </div>
</section>
<!-- end: WELCOME -->
<!-- WHAT WE DO -->
{{-- <section class="background-grey">
    <div class="container">
        <div class="heading-text heading-section">
            <h2>WHAT WE DO</h2>
            <span class="lead">Create amam ipsum dolor sit amet, Beautiful nature, and rare feathers!.</span>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div data-animate="fadeInUp" data-animate-delay="0">
                    <h4>Modern Design</h4>
                    <p>Lorem ipsum dolor sit amet, blandit vel sapien vitae, condimentum ultricies magna et.
                        Quisque euismod orci ut et lobortis aliquam.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div data-animate="fadeInUp" data-animate-delay="200">
                    <h4>Loaded with Features</h4>
                    <p>Lorem ipsum dolor sit amet, blandit vel sapien vitae, condimentum ultricies magna et.
                        Quisque euismod orci ut et lobortis aliquam.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div data-animate="fadeInUp" data-animate-delay="400">
                    <h4>Completely Customizable</h4>
                    <p>Lorem ipsum dolor sit amet, blandit vel sapien vitae, condimentum ultricies magna et.
                        Quisque euismod orci ut et lobortis aliquam.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div data-animate="fadeInUp" data-animate-delay="600">
                    <h4>100% Responsive Layout</h4>
                    <p>Lorem ipsum dolor sit amet, blandit vel sapien vitae, condimentum ultricies magna et.
                        Quisque euismod orci ut et lobortis aliquam.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div data-animate="fadeInUp" data-animate-delay="800">
                    <h4>Clean Modern Code</h4>
                    <p>Lorem ipsum dolor sit amet, blandit vel sapien vitae, condimentum ultricies magna et.
                        Quisque euismod orci ut et lobortis aliquam.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div data-animate="fadeInUp" data-animate-delay="1000">
                    <h4>Free Updates & Support</h4>
                    <p>Lorem ipsum dolor sit amet, blandit vel sapien vitae, condimentum ultricies magna et.
                        Quisque euismod orci ut et lobortis aliquam.</p>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- END WHAT WE DO -->
<!-- PORTFOLIO -->

<!-- end: PORTFOLIO -->
<!-- SERVICES -->
<section  id="wwd">
    <div class="container">
        <div class="heading-text heading-section text-center">
            <h2>What We Do</h2>
            <p>SALT Capital facilitates an environment for learning about real estate investing.</p>
        </div>
        <div class="row">
            <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="0">
                <div class="icon-box effect medium border small">
                    <div class="icon">
                        <div><i class="fa fa-plug"></i></div>
                    </div>
                    <h3>Networking</h3>
                    <p>Perhaps the largest contributor to individual success, growing your network is crucial in extending your reach and effectivity by providing an opportunity for you to pair strengths with like-minded professionals</p>
                </div>
            </div>
            <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="200">
                <div class="icon-box effect medium border small">
                    <div class="icon">
                        <div><i class="fa fa-desktop"></i></div>
                    </div>
                    <h3>Resources</h3>
                    <p>Learning begins with first identifying the things you do not know - we call these "blind spots". From there, it's simply a amtter of deep-diving into different subject matter.</p>
                </div>
            </div>
            <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="400">
                <div class="icon-box effect medium border small">
                    <div class="icon">
                        <div><i class="fa fa-cloud"></i></div>
                    </div>
                    <h3>Industry Experts</h3>
                    <p>Using monthly meetups, our members gain access to experts from an array of industries, including investing, personal and business finance, leadership, and personal development.</p>
                </div>
            </div>
            <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="600">
                <div class="icon-box effect medium border small">
                    <div class="icon">
                        <div><i class="far fa-lightbulb"></i></div>
                    </div>
                    <h3>Hands-On Learning</h3>
                    <p>What better way to learn about real estate investing than being able to watch a project unfold from acquisition to final sale? Members are able to observe and, in some cases, participate in real estate development.</p>
                </div>
            </div>
            <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="800">
                <div class="icon-box effect medium border small">
                    <div class="icon">
                        <div><i class="fa fa-trophy"></i></div>
                    </div>
                    <h3>Exclusive Deals</h3>
                    <p>Through our partnership with other organizations, members gain access to exclusive deals that include conferences, membership discounts, and members-only events.</p>
                </div>
            </div>
            <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="1000">
                <div class="icon-box effect medium border small">
                    <div class="icon">
                        <div><i class="fa fa-thumbs-up"></i></div>
                    </div>
                    <h3>Partnership Opportunities</h3>
                    <p>Relationships are important to us! Those that opt to invest in that relationship are considered for direct partnership opportunities with SALT Capital.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end: SERVICES -->
<section class="p-b-0" id="membership">
    <div class="container">
        <div class="heading-text heading-section text-center">
            <h2>Membership</h2>
            <span class="lead">Become a member today and gain access to these benefits and many more. This can be accomplished in 3 simple steps: Fill out an application, complete your investor interview, get approved!</span>
            <br /><br />
            <a href="/learn-about-membership"  target="_blank" class="btn scroll-to">Learn About Membership</a>

        </div>
    </div>

</section>
<!-- COUNTERS -->
<section class="text-light p-t-150 p-b-150 " data-bg-parallax="{{asset('spa-img/countingsection.jpg')}}">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="text-center">
                    <div class="icon"><i class="fa fa-3x fa-clock"></i></div>
                    <div class="counter"> <span data-speed="3000" data-refresh-interval="50" data-to="20" data-from="0" data-seperator="true"></span> </div>
                    <div class="seperator seperator-small"></div>
                    <p>20+ COMBINED YEARS OF EXPERIENCE</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="text-center">
                    <div class="icon"><i class="fa fa-3x fa-dollar-sign"></i></div>
                    <div class="counter"> <span data-speed="2500" data-refresh-interval="1" data-to="15" data-from="1" data-seperator="true"> </span> million </div>
                    <div class="seperator seperator-small"></div>
                    <p>REAL ESTATE DEVELOPMENT POTENTIAL</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="text-center">
                    <div class="icon"><i class="fa fa-3x fa-home"></i></div>
                    <div class="counter"> <span data-speed="2000" data-refresh-interval="12" data-to="155" data-from="50" data-seperator="true"></span> </div>
                    <div class="seperator seperator-small"></div>
                    <p>PROPERTY ASSETS</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="text-center">
                    <div class="icon"><i class="fa fa-3x fa-smile"></i></div>
                    <div class="counter"> <span data-speed="2050" data-refresh-interval="1" data-to="1" data-from="0" data-seperator="true"></span> </div>
                    <div class="seperator seperator-small"></div>
                    <p>1 DEDICATED GROUP OF PROFESSIONALS</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end: COUNTERS -->
<!-- CLIENTS -->
<section class="p-t-60">
    <div class="container">
        <div class="heading-text heading-section text-center">
            <h2>Testimonials</h2>
            <span class="lead">Hear what others are saying about SALT</span>
        </div>
        <div class="carousel client-logos" data-items="1" data-items-sm="1" data-items-xs="1" data-items-xxs="1" data-margin="20" data-arrows="false" data-autoplay="true" data-autoplay="3000" data-loop="true">
            <div>
              <p><em>Salt has given me way to create residual income for me and my family. Not only am I investing, but I’m also learning, networking, and creating relationships that will help me along my journey. Salt allowed me to join them in playing monopoly in real life and I’m grateful for the opportunity! </em></p>
              <p>K. Owens - Louisiana</p>
                {{-- <a href="#"><img alt="" src="{{asset('spa-img/clients/1.png')}}"> </a> --}}
            </div>
            <div>
                  <p><em>I joined SALT Capital Equity Group to help create passive income. It’s a beautiful thing – seeing people upgrade their homes. It’s good to know that the investing at SALT goes towards helping others make those upgrades.</em></p>
                  <p>J. Baker - Louisiana</p>
            </div>
            {{-- <div>
                <a href="#"><img alt="" src="{{asset('spa-img/clients/3.png')}}"> </a>
            </div> --}}
            {{-- <div>
                <a href="#"><img alt="" src="{{asset('spa-img/clients/4.png')}}"> </a>
            </div>
            <div>
                <a href="#"><img alt="" src="{{asset('spa-img/clients/5.png')}}"> </a>
            </div>
            <div>
                <a href="#"><img alt="" src="{{asset('spa-img/clients/6.png')}}"> </a>
            </div>
            <div>
                <a href="#"><img alt="" src="{{asset('spa-img/clients/7.png')}}"> </a>
            </div>
            <div>
                <a href="#"><img alt="" src="{{asset('spa-img/clients/8.png')}}"> </a>
            </div>
            <div>
                <a href="#"><img alt="" src="{{asset('spa-img/clients/9.png')}}"> </a>
            </div> --}}
        </div>
    </div>
</section>
<!-- end: CLIENTS -->
<!-- TEAM -->
<section class="background-grey" id="team">
    <div class="container">
        <div class="heading-text heading-section text-center">
            <h2>MEET OUR TEAM</h2>
            <p>Out team is comprised of individuals from diverse backgrounds and expertise.
            </p>
        </div>
        <div class="row team-members justify-content-center">
          <div class="col-lg-3">
              <div class="team-member">
                      <div class="team-image" style="max-height: 236px; overflow: hidden;">
                      <img src="{{asset('spa-img/headshots/thumbnail5.jpg')}}">
                  </div>
                  <div class="team-desc">
                      <h3>Terrica Smith</h3>
                      <span>Managing Partner</span><br />
                      <div class="align-center">
                          <a class="btn btn-xs btn-slide btn-light" href="https://www.facebook.com/terrica.l.smith.5?__tn__=%2CdlC-RH-R-R&eid=ARAjv_vPDjv4qdWzA7AADAsQoHq5Cqc1HQEwD-S7GFsQ2DpLcSVXDMxRAj3SmftEEBWbGccXWo5rK3RP&hc_ref=ARROxa7J8i_2jAiNH5RvUH9pXKx5jJRlwGrgv5bajXeD7vYdB7yAncpBchgQQDfeGgc">
                              <i class="fab fa-facebook-f"></i>
                              <span>Facebook</span>
                          </a>
                          <a class="btn btn-xs btn-slide btn-light" href="https://twitter.com/Tee21Al" data-width="100">
                              <i class="fab fa-twitter"></i>
                              <span>Twitter</span>
                          </a>
                          <a class="btn btn-xs btn-slide btn-light" href="https://www.instagram.com/femalerealestateguru/" data-width="118">
                              <i class="fab fa-instagram"></i>
                              <span>Instagram</span>
                          </a>
                          {{-- <a class="btn btn-xs btn-slide btn-light" href="mailto:#" data-width="80">
                              <i class="icon-mail"></i>
                              <span>Mail</span>
                          </a> --}}
                      </div>
                  </div>
              </div>
          </div>
            <div class="col-lg-3">
                <div class="team-member">
                        <div class="team-image" style="max-height: 236px; overflow: hidden;">
                        <img src="{{asset('spa-img/headshots/dmoney.jpg')}}">
                    </div>
                    <div class="team-desc">
                        <h3>Derik Godeaux</h3>
                        <span>Managing Partner</span><br />
                        <div class="align-center">
                            <a class="btn btn-xs btn-slide btn-light" href="https://www.facebook.com/godeaux">
                                <i class="fab fa-facebook-f"></i>
                                <span>Facebook</span>
                            </a>
                            <a class="btn btn-xs btn-slide btn-light" href="https://twitter.com/DerikGodeaux" data-width="100">
                                <i class="fab fa-twitter"></i>
                                <span>Twitter</span>
                            </a>
                            <a class="btn btn-xs btn-slide btn-light" href="https://www.instagram.com/bruhmanguy/" data-width="118">
                                <i class="fab fa-instagram"></i>
                                <span>Instagram</span>
                            </a>
                            {{-- <a class="btn btn-xs btn-slide btn-light" href="mailto:#" data-width="80">
                                <i class="icon-mail"></i>
                                <span>Mail</span>
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="team-member">
                      <div class="team-image" style="max-height: 236px; overflow: hidden;">
                        <img src="{{asset('spa-img/headshots/thumbnail6.jpg')}}">
                    </div>
                    <div class="team-desc">
                        <h3>Justin Lee</h3>
                        <span>Managing Partner</span><br />
                        <div class="align-center">
                            <a class="btn btn-xs btn-slide btn-light" href="https://www.facebook.com/JustinL9">
                                <i class="fab fa-facebook-f"></i>
                                <span>Facebook</span>
                            {{-- </a>
                            <a class="btn btn-xs btn-slide btn-light" href="#" data-width="100">
                                <i class="fab fa-twitter"></i>
                                <span>Twitter</span>
                            </a> --}}
                            <a class="btn btn-xs btn-slide btn-light" href="https://www.instagram.com/jlee_tha_ikon/" data-width="118">
                                <i class="fab fa-instagram"></i>
                                <span>Instagram</span>
                            </a>
                            {{-- <a class="btn btn-xs btn-slide btn-light" href="mailto:#" data-width="80">
                                <i class="icon-mail"></i>
                                <span>Mail</span>
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <div class="row team-members justify-content-center">
            <div class="col-lg-3">
                <div class="team-member">
                    <div class="team-image" style="max-height: 236px; overflow: hidden;">
                        <img src="{{asset('spa-img/headshots/thumbnail4.jpg')}}" style="margin-top: -29px;">
                    </div>
                    <div class="team-desc">
                        <h3>Stephanie Bailey</h3>
                        <span>Member Manager</span><br />
                        <div class="align-center">
                            <a class="btn btn-xs btn-slide btn-light" href="https://www.facebook.com/stephanie.j.bailey.50">
                                <i class="fab fa-facebook-f"></i>
                                <span>Facebook</span>
                            </a>
                            {{-- <a class="btn btn-xs btn-slide btn-light" href="#" data-width="100">
                                <i class="fab fa-twitter"></i>
                                <span>Twitter</span>
                            </a> --}}
                            <a class="btn btn-xs btn-slide btn-light" href="https://www.instagram.com/divabaileymom/" data-width="118">
                                <i class="fab fa-instagram"></i>
                                <span>Instagram</span>
                            </a>
                            {{-- <a class="btn btn-xs btn-slide btn-light" href="mailto:#" data-width="80">
                                <i class="icon-mail"></i>
                                <span>Mail</span>
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="team-member">
                      <div class="team-image" style="max-height: 236px; overflow: hidden;">
                        <img src="{{asset('spa-img/headshots/thumbnail2.jpg')}}">
                    </div>
                    <div class="team-desc">
                        <h3>Gianni Logan</h3>
                        <span>Accounting and Finance Manager</span><br />
                        <div class="align-center">
                            <a class="btn btn-xs btn-slide btn-light" href="https://www.facebook.com/gianni.logan.587">
                                <i class="fab fa-facebook-f"></i>
                                <span>Facebook</span>
                            </a>
                            {{-- <a class="btn btn-xs btn-slide btn-light" href="#" data-width="100">
                                <i class="fab fa-twitter"></i>
                                <span>Twitter</span>
                            </a> --}}
                            <a class="btn btn-xs btn-slide btn-light" href="https://www.instagram.com/gianni_logan_pfc/" data-width="118">
                                <i class="fab fa-instagram"></i>
                                <span>Instagram</span>
                            </a>
                            {{-- <a class="btn btn-xs btn-slide btn-light" href="mailto:#" data-width="80">
                                <i class="icon-mail"></i>
                                <span>Mail</span>
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="team-member">
                      <div class="team-image" style="max-height: 236px; overflow: hidden;">
                        <img src="{{asset('spa-img/headshots/thumbnail3.jpg')}}" style="margin-top: -20px;">
                    </div>
                    <div class="team-desc">
                        <h3>Michelle Parker</h3>
                        <span>Member Manager</span><br />
                        <div class="align-center">
                            <a class="btn btn-xs btn-slide btn-light" href="https://www.facebook.com/michelle.parket.5">
                                <i class="fab fa-facebook-f"></i>
                                <span>Facebook</span>
                            </a>
                            {{-- <a class="btn btn-xs btn-slide btn-light" href="#" data-width="100">
                                <i class="fab fa-twitter"></i>
                                <span>Twitter</span>
                            </a>
                            <a class="btn btn-xs btn-slide btn-light" href="#" data-width="118">
                                <i class="fab fa-instagram"></i>
                                <span>Instagram</span>
                            </a> --}}
                            {{-- <a class="btn btn-xs btn-slide btn-light" href="mailto:#" data-width="80">
                                <i class="icon-mail"></i>
                                <span>Mail</span>
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contactButtonDiv">
          <a href="/spa-contact" class="btn"  >Contact Us</a>
        </div>
    </div>
</section>
<!-- end: TEAM -->
@endsection
