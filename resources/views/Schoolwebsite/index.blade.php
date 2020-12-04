
@extends('Schoolwebsite.layout.master')
@section('page-css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')
<div class="main-container">
            <section class="text-center">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="slider" data-paging="true" data-children="8">
                                <ul class="slides flickity-enabled" tabindex="0">
                                    <div class="flickity-viewport">
                                        <div class="main-carousel">
                                            <li class="col-md-6 col-12 slide">
                                                <div class="project-thumb">
                                                    <a href="#"> <img alt="Image" class="border--round" src="{{asset('school_website_asset/img/work-6.jpg')}}"> </a>
                                                    <h4>Nike Active</h4> <span>Print Marketing</span> </div>
                                            </li>
                                            <li class="col-md-6 col-12 slide">
                                                <div class="project-thumb">
                                                    <a href="#"> <img alt="Image" class="border--round" src="{{asset('school_website_asset/img/work-2.jpg')}}"> </a>
                                                    <h4>Get Lost in Thailand</h4> <span>Print Marketing</span> </div>
                                            </li>
                                            <li class="col-md-6 col-12 slide">
                                                <div class="project-thumb">
                                                    <a href="#"> <img alt="Image" class="border--round" src="{{asset('school_website_asset/img/work-3.jpg')}}"> </a>
                                                    <h4>M&amp;D Stairs Company</h4> <span>Branding &amp; Identity</span> </div>
                                            </li>
                                            <li class="col-md-6 col-12 slide is-selected">
                                                <div class="project-thumb">
                                                    <a href="#"> <img alt="Image" class="border--round" src="{{asset('school_website_asset/img/work-4.jpg')}}"> </a>
                                                    <h4>Blossom Naturals</h4> <span>Branding &amp; Identity</span> </div>
                                            </li>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="switchable imagebg switchable--switch" data-overlay="4">
                <div class="background-image-holder"> <img alt="background" src="{{asset('school_website_asset/img/hero-1.jpg')}}"> </div>
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-md-6 switchable__text">
                            <ul class="accordion accordion-2 accordion--oneopen">
                                <li class="active">
                                    <div class="accordion__title"> <span class="h5">Code Quality</span> </div>
                                    <div class="accordion__content">
                                        <p class="lead"> Stack follows the BEM naming convention that focusses on logical code readability that is reflected in both the HTML and CSS. Interactive elements such as accordions and tabs follow the same markup patterns making rapid development easier for developers and beginners alike. </p>
                                        <p class="lead"> Add to this the thoughtfully presented documentation, featuring code highlighting, snippets, class customizer explanation and you've got yourself one powerful value package. </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="accordion__title"> <span class="h5">Visual Design</span> </div>
                                    <div class="accordion__content">
                                        <p class="lead"> Stack offers a clean and contemporary to suit a range of purposes from corporate, tech startup, marketing site to digital storefront. Elements have been designed to showcase content in a diverse yet consistent manner. </p>
                                        <p class="lead"> Multiple font and colour scheme options mean that dramatically altering the look of your site is just clicks away — Customizing your site in the included Variant Page Builder makes experimenting with styles and content arrangements dead simple. </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="accordion__title"> <span class="h5">Stack Experience</span> </div>
                                    <div class="accordion__content">
                                        <p class="lead"> Medium Rare is an elite author known for offering high-quality, high-value products backed by timely and personable support. Recognised and awarded by Envato on multiple occasions for producing consistently outstanding products, it's no wonder over 20,000 customers enjoy using Medium Rare templates. </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-5 col-md-6"> <img alt="Image" class="border--round box-shadow-wide" src="{{asset('school_website_asset/img/inner-2.jpg')}}"> </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="process-1">
                                <div class="process__item">
                                    <h4>Company established 2012<br> 4 founding members</h4>
                                    <p> Stack is built with customization and ease-of-use at its core — whether you're a seasoned developer or just starting out, you'll be making attractive sites faster than any traditional HTML template. </p>
                                </div>
                                <div class="process__item">
                                    <h4>Succsessfully funded through<br> Bray Investments</h4>
                                    <p> Stack is built with customization and ease-of-use at its core — whether you're a seasoned developer or just starting out, you'll be making attractive sites faster than any traditional HTML template. </p>
                                </div>
                                <div class="process__item">
                                    <h4>Posted profit<br> second quarter 2015</h4>
                                    <p> Stack is built with customization and ease-of-use at its core — whether you're a seasoned developer or just starting out, you'll be making attractive sites faster than any traditional HTML template. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature feature-8"> <img alt="Image" src="{{asset('school_website_asset/img/avatar-round-1.png')}}">
                                <h5>Vera Duncan</h5> <span>Founder &amp; CEO</span> </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature feature-8"> <img alt="Image" src="{{asset('school_website_asset/img/avatar-round-3.png')}}">
                                <h5>Zach Smith</h5> <span>Co-Founder &amp; CTO</span> </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature feature-8"> <img alt="Image" src="{{asset('school_website_asset/img/avatar-round-2.png')}}">
                                <h5>Bernice Lucas</h5> <span>Chief of Operations</span> </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature feature-8"> <img alt="Image" src="{{asset('school_website_asset/img/avatar-round-4.png')}}">
                                <h5>Cameron Nguyen</h5> <span>Lead Designer</span> </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature feature-8"> <img alt="Image" src="{{asset('school_website_asset/img/avatar-round-5.png')}}">
                                <h5>Josie Web</h5> <span>Head of Development</span> </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature feature-8"> <img alt="Image" src="{{asset('school_website_asset/img/avatar-round-6.png')}}">
                                <h5>Bryce Vaughn</h5> <span>Marketing Director</span> </div>
                        </div>
                    </div>
                </div>
            </section>   
@endsection

@section('custom-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.pkgd.min.js"></script>
<script>
jQuery(document).ready(function(){
    jQuery('.main-carousel').flickity({
    // options
    cellAlign: 'left',
    contain: true
    });
});
</script>

@endsection