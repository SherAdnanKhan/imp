
@extends('Schoolwebsite.layout.master')
@section('content')
        <div class="main-container">
            <section class="text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="type--uppercase">Introducing Stack</h6>
                            <div class="typed-headline">
                                <span class="h1 inline-block">The template for</span>
                                <span class="h1 inline-block typed-text typed-text--cursor color--primary" data-typed-strings="bootstrapped startups.,marketing sites., portfolios.,blogging.,rapid development.,small business.,showcasing products., the design conscious.">the design conscious.</span>
                            </div>
                            <p class="lead">
                                A robust, multipurpose template built with modularity at the core.
                            </p>
                            <a class="btn btn--primary type--uppercase inner-link" href="#demos">
                                <span class="btn__text">
                                    Explore Demos
                                </span>
                            </a>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <a id="demos"></a>
            <section class="text-center cta cta-4 space--xxs border--bottom imagebg" data-gradient-bg='#4876BD,#5448BD,#8F48BD,#BD48B1'>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="label label--inline">Hot!</span>
                            <span>Over 290 interface blocks, 140 demo pages and Variant Page Builder.
                                <a href="#">Purchase Stack</a> for $18 USD.</span>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section class="bg--dark space--sm">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="masonry masonry-demos">
                                <div class="masonry-filter-container text-center row justify-content-center align-items-center">
                                    <span>Viewing:</span>
                                    <div class="masonry-filter-holder">
                                        <div class="masonry__filters">
                                            <ul>
                                                <li class="active" data-masonry-filter="*">All Categories</li>
                                                <li data-masonry-filter="blog">Blog</li>
                                                <li data-masonry-filter="coming-soon">Coming Soon</li>
                                                <li data-masonry-filter="industry">Industry</li>
                                                <li data-masonry-filter="landing">Landing</li>
                                                <li data-masonry-filter="portfolio">Portfolio</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="masonry__container masonry--active">
                                    <div class="masonry__item col-lg-4 col-md-6"></div>
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Landing">
                                        <a href="home-landing-1.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Landing 1" src="{{asset('school_website_asset/img/demos/landing-1.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Landing 1</h5>
                                            <span>Landing Page</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Landing">
                                        <a href="home-landing-2.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Landing 2" src="{{asset('school_website_asset/img/demos/landing-2.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Landing 2</h5>
                                            <span>Landing Page</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Landing">
                                        <a href="home-landing-3.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Landing 3" src="{{asset('school_website_asset/img/demos/landing-3.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Landing 3</h5>
                                            <span>Landing Page</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Landing">
                                        <a href="home-landing-4.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Landing 4" src="{{asset('school_website_asset/img/demos/landing-4.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Landing 4</h5>
                                            <span>Landing Page</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Landing">
                                        <a href="home-landing-5.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Landing 5" src="{{asset('school_website_asset/img/demos/landing-5.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Landing 5</h5>
                                            <span>Landing Page</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Landing">
                                        <a href="home-landing-6.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Landing 6" src="{{asset('school_website_asset/img/demos/landing-6.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Landing 6</h5>
                                            <span>Landing Page</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Landing">
                                        <a href="home-landing-7.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Landing 7" src="{{asset('school_website_asset/img/demos/landing-7.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Landing 7</h5>
                                            <span>Landing Page</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Landing">
                                        <a href="home-landing-8.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Landing 8" src="{{asset('school_website_asset/img/demos/landing-8.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Landing 8</h5>
                                            <span>Landing Page</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Landing">
                                        <a href="home-landing-9.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Landing 9" src="{{asset('school_website_asset/img/demos/landing-9.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Landing 9</h5>
                                            <span>Landing Page</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Landing">
                                        <a href="home-landing-10.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Landing 10" src="{{asset('school_website_asset/img/demos/landing-10.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Landing 10</h5>
                                            <span>Landing Page</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Landing">
                                        <a href="home-software-1.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Software 1" src="{{asset('school_website_asset/img/demos/software-1.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Software 1</h5>
                                            <span>Landing Page</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Landing">
                                        <a href="home-software-2.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Software 2" src="{{asset('school_website_asset/img/demos/software-2.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Software 2</h5>
                                            <span>Landing Page</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Landing">
                                        <a href="home-software-3.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Software 3" src="{{asset('school_website_asset/img/demos/software-3.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Software 3</h5>
                                            <span>Landing Page</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Landing">
                                        <a href="home-crypto.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Crypto" src="{{asset('school_website_asset/img/demos/crypto.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Crypto</h5>
                                            <span>Landing Page</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Industry">
                                        <a href="home-accommodation.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Accommodation" src="{{asset('school_website_asset/img/demos/accommodation.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Accommodation</h5>
                                            <span>Niche Industry</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Industry">
                                        <a href="home-construction.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Construction" src="{{asset('school_website_asset/img/demos/construction.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Construction</h5>
                                            <span>Niche Industry</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Industry">
                                        <a href="home-coworking.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Coworking" src="{{asset('school_website_asset/img/demos/coworking.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Coworking</h5>
                                            <span>Niche Industry</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Industry">
                                        <a href="home-drone-photography.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Drone Photography" src="{{asset('school_website_asset/img/demos/drone-photography.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Drone Photography</h5>
                                            <span>Niche Industry</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Industry">
                                        <a href="home-education.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Education" src="{{asset('school_website_asset/img/demos/education.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Education</h5>
                                            <span>Niche Industry</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Industry">
                                        <a href="home-event.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Event" src="{{asset('school_website_asset/img/demos/event.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Event</h5>
                                            <span>Niche Industry</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Industry">
                                        <a href="home-fitness.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Fitness" src="{{asset('school_website_asset/img/demos/fitness.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Fitness</h5>
                                            <span>Niche Industry</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Industry">
                                        <a href="home-health-insurance.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Insurance" src="{{asset('school_website_asset/img/demos/insurance.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Insurance</h5>
                                            <span>Niche Industry</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Industry">
                                        <a href="home-knowledge-base.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Knowledge Base" src="{{asset('school_website_asset/img/demos/knowledge-base.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Knowledge Base</h5>
                                            <span>Niche Industry</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Industry">
                                        <a href="home-musician.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Musician" src="{{asset('school_website_asset/img/demos/musician.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Musician</h5>
                                            <span>Niche Industry</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Industry">
                                        <a href="home-nonprofit.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Nonprofit" src="{{asset('school_website_asset/img/demos/nonprofit.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Nonprofit</h5>
                                            <span>Niche Industry</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Industry">
                                        <a href="home-political.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Political" src="{{asset('school_website_asset/img/demos/political.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Political</h5>
                                            <span>Niche Industry</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Industry">
                                        <a href="home-restaurant.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Restaurant" src="{{asset('school_website_asset/img/demos/restaurant.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Restaurant</h5>
                                            <span>Niche Industry</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Industry">
                                        <a href="home-recruitment.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Recruitment" src="{{asset('school_website_asset/img/demos/recruitment.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Recruitment</h5>
                                            <span>Niche Industry</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Industry">
                                        <a href="home-tourism.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Tourism" src="{{asset('school_website_asset/img/demos/tourism.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Tourism</h5>
                                            <span>Niche Industry</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Industry">
                                        <a href="home-wedding.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Wedding" src="{{asset('school_website_asset/img/demos/wedding.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Wedding</h5>
                                            <span>Niche Industry</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Portfolio">
                                        <a href="home-portfolio-agency-1.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Agency" src="{{asset('school_website_asset/img/demos/agency.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Agency</h5>
                                            <span>Portfolio</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Portfolio">
                                        <a href="home-portfolio-agency-2.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Agency 2" src="{{asset('school_website_asset/img/demos/agency-2.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Agency 2</h5>
                                            <span>Portfolio</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Portfolio">
                                        <a href="home-portfolio-personal-1.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Personal 1" src="{{asset('school_website_asset/img/demos/personal-1.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Personal 1</h5>
                                            <span>Portfolio</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Portfolio">
                                        <a href="home-portfolio-photography.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Photography" src="{{asset('school_website_asset/img/demos/photography.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Photography</h5>
                                            <span>Portfolio</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Portfolio">
                                        <a href="home-portfolio-photography-2.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Photography 2" src="{{asset('school_website_asset/img/demos/photography-2.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Photography 2</h5>
                                            <span>Portfolio</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Portfolio">
                                        <a href="home-portfolio-studio-1.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Studio 1" src="{{asset('school_website_asset/img/demos/studio-1.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Studio 1</h5>
                                            <span>Portfolio</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Portfolio">
                                        <a href="home-portfolio-studio-2.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Studio 2" src="{{asset('school_website_asset/img/demos/studio-2.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Studio 2</h5>
                                            <span>Portfolio</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Portfolio">
                                        <a href="home-portfolio-video.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Video" src="{{asset('school_website_asset/img/demos/video.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Video</h5>
                                            <span>Portfolio</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Blog">
                                        <a href="home-magazine.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Magazine" src="{{asset('school_website_asset/img/demos/magazine.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Magazine</h5>
                                            <span>Blog</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Blog">
                                        <a href="blog-articles-magazine.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Magazine" src="{{asset('school_website_asset/img/demos/magazine-2.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Magazine 2</h5>
                                            <span>Blog</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Coming Soon">
                                        <a href="home-coming-soon-1.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Coming Soon 1" src="{{asset('school_website_asset/img/demos/coming-soon-1.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Coming Soon 1</h5>
                                            <span>Coming Soon</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Coming Soon">
                                        <a href="home-coming-soon-2.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Coming Soon 2" src="{{asset('school_website_asset/img/demos/coming-soon-2.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Coming Soon 2</h5>
                                            <span>Coming Soon</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                    <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="Coming Soon">
                                        <a href="home-coming-soon-3.html" class="block text-block">
                                            <div class="hover-item">
                                                <img alt="Coming Soon 3" src="{{asset('school_website_asset/img/demos/coming-soon-3.jpg')}}" />
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <h5>Coming Soon 3</h5>
                                            <span>Coming Soon</span>
                                        </div>
                                    </div>
                                    <!--end item-->
                                </div>
                                <!--end of masonry container-->
                            </div>
                            <!--end masonry-->
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section class="text-center bg--secondary">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8">
                            <h2>Why you'll love Stack</h2>
                            <p class="lead">
                                Whether you’re building a welcome mat for your SaaS or a clean, corporate portfolio, Stack has your design and functionality needs covered.
                            </p>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section class="bg--secondary">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature feature-2 boxed boxed--border">
                                <i class="icon icon-Wizard color--primary"></i>
                                <div class="feature__body">
                                    <h5>140+ Styled Pages</h5>
                                    <p>
                                        Jump start your project with Stack's diverse array of beautiful pre-built templates
                                    </p>
                                </div>
                            </div>
                            <!--end feature-->
                        </div>
                        <div class="col-md-4">
                            <div class="feature feature-2 boxed boxed--border">
                                <i class="icon icon-Clock-Back color--primary"></i>
                                <div class="feature__body">
                                    <h5>Time Saving Components</h5>
                                    <p>
                                        Save time with over 290 carefully styled components designed to showcase your content
                                    </p>
                                </div>
                            </div>
                            <!--end feature-->
                        </div>
                        <div class="col-md-4">
                            <div class="feature feature-2 boxed boxed--border">
                                <i class="icon icon-Duplicate-Window color--primary"></i>
                                <div class="feature__body">
                                    <h5>Visual Page Building</h5>
                                    <p>
                                        Construct mockups or production-ready pages in-browser with Variant Page Builder
                                    </p>
                                </div>
                            </div>
                            <!--end feature-->
                        </div>
                        <div class="col-md-4">
                            <div class="feature feature-2 boxed boxed--border">
                                <i class="icon icon-Coding color--primary"></i>
                                <div class="feature__body">
                                    <h5>Clever Markup</h5>
                                    <p>
                                        With fully documented elements pages that help you customize Stack to your needs
                                    </p>
                                </div>
                            </div>
                            <!--end feature-->
                        </div>
                        <div class="col-md-4">
                            <div class="feature feature-2 boxed boxed--border">
                                <i class="icon icon-Laptop-Phone color--primary"></i>
                                <div class="feature__body">
                                    <h5>Responsive Design</h5>
                                    <p>
                                        Stack scales intuitively for all devices. Delighting your users no matter the screen
                                    </p>
                                </div>
                            </div>
                            <!--end feature-->
                        </div>
                        <div class="col-md-4">
                            <div class="feature feature-2 boxed boxed--border">
                                <i class="icon icon-Life-Jacket color--primary"></i>
                                <div class="feature__body">
                                    <h5>Personal Support</h5>
                                    <p>
                                        Six months of included, premium support with a dedicated support forum
                                    </p>
                                </div>
                            </div>
                            <!--end feature-->
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section class="switchable feature-large bg--secondary">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-md-6 col-12">
                            <div class="video-cover border--round box-shadow-wide">
                                <div class="background-image-holder">
                                    <img alt="image" src="{{asset('school_website_asset/img/inner-6.jpg')}}" />
                                </div>
                                <div class="video-play-icon"></div>
                                <iframe data-src="https://www.youtube.com/embed/6p45ooZOOPo?autoplay=1" allowfullscreen="allowfullscreen"></iframe>
                            </div>
                            <!--end video cover-->
                        </div>
                        <div class="col-md-6 col-lg-5">
                            <div class="switchable__text">
                                <h2>Build your site in-browser with modular interface blocks</h2>
                                <p class="lead">
                                    The included Variant Page Builder allows you to quickly assemble and customize pages in the comfort of your browser. Variant outputs pure HTML &mdash; No junk styles or classes.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section class="space--xs imagebg" data-gradient-bg="#4876BD,#5448BD,#8F48BD,#BD48B1">
                <div class="container">
                    <div class="row cta cta--horizontal text-center-xs">
                        <div class="col-md-4">
                            <h4>Build your site now</h4>
                        </div>
                        <div class="col-md-5">
                            <p class="lead">
                                Themeforest's most popular HTML page builder
                            </p>
                        </div>
                        <div class="col-md-3 text-right text-center-xs">
                            <a class="btn btn--primary type--uppercase" href="#purhcase-template">
                                <span class="btn__text">
                                    Purchase Stack
                                </span>
                            </a>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <div class="modal-container">
                <div class="modal-content">
                    <section class="imageblock feature-large bg--white border--round ">
                        <div class="imageblock__content col-lg-5 col-md-3 pos-left">
                            <div class="background-image-holder">
                                <img alt="image" src="{{asset('school_website_asset/img/cowork-8.jpg')}}" />
                            </div>
                        </div>
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-lg-6 col-md-7">
                                    <div class="row">
                                        <div class="col-md-11 col-lg-10">
                                            <h1>Ideal for design conscious startups.</h1>
                                            <p class="lead">
                                                Start building a beautiful site for your startup &mdash; right in the comfort of your browser.
                                            </p>
                                            <hr class="short">
                                            <form>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <input type="email" name="Email Address" placeholder="Email Address" />
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="password" name="Password" placeholder="Password" />
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn--primary type--uppercase">Create Account</button>
                                                    </div>
                                                    <div class="col-12">
                                                        <span class="type--fine-print">By signing up, you agree to the
                                                            <a href="#">Terms of Service</a>
                                                        </span>
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </form>
                                        </div>
                                        <!--end of col-->
                                    </div>
                                    <!--end of row-->
                                </div>
                            </div>
                            <!--end of row-->
                        </div>
                        <!--end of container-->
                    </section>
                </div>
            </div>
@endsection