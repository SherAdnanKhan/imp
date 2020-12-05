
@extends('Schoolwebsite.layout.master')
@section('page-css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')
<div class="main-container">
            <section class="cover imagebg height-100 text-center" data-overlay="3">
                <div class="background-image-holder"><img alt="background" src="{{asset('school_website_asset/img/landing-10.jpg')}}"></div>
                <div class="container pos-vertical-center">
                    <div class="row">
                        <div class="col-md-9 col-lg-8">
                            <h1>Streamline your workflow with Stack</h1>
                            <p class="lead">Stack offers a clean and contemporary look to suit a range of purposes from corporate, tech startup, marketing site to digital storefront.</p>
                        </div>
                    </div>
                </div>
                <div class="pos-absolute pos-bottom col-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-left">
                                <div class="text-block">
                                    <h5>Teahupo'o Beach</h5> <span>French Polynesia</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="switchable feature-large">
                <div class="container">
                    <div class="row justify-content-around">
                        <div class="col-lg-5 col-md-6 switchable__text">
                            <h2>Perfect for bootstrapped startups</h2>
                            <p class="lead"> Launching an attractive and scalable website quickly and affordably is important for modern startups — Stack offers massive value without looking 'bargain-bin'. </p>
                            <a class="btn btn--primary type--uppercase" href="#"> <span class="btn__text">
                        Explore Detail
                    </span> </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="boxed boxed--lg boxed--border box-shadow-wide">
                                <div class="slider" data-paging="true">
                                    <ul class="slides">
                                        <li class="col-12">
                                            <div class="feature feature-3 text-center"> <i class="icon icon--lg icon-Mail-3 color--primary"></i>
                                                <h4>Mailer Integrations</h4>
                                                <p> Stack comes with integration for Mail Chimp and Campaign Monitor forms - ideal for modern marketing campaigns </p> <a href="#">
                                        Learn More
                                    </a> </div>
                                        </li>
                                        <li class="col-12">
                                            <div class="feature feature-3 text-center"> <i class="icon icon--lg icon-Air-Balloon color--primary"></i>
                                                <h4>Diverse Icons</h4>
                                                <p> Including the premium Icons Mind icon kit, Stack features a highly diverse set of icons suitable for all purposes. </p> <a href="#">
                                        Learn More
                                    </a> </div>
                                        </li>
                                        <li class="col-12">
                                            <div class="feature feature-3 text-center"> <i class="icon icon--lg icon-Bacteria color--primary"></i>
                                                <h4>Modular Design</h4>
                                                <p> Combine blocks from a range of categories to build pages that are rich in visual style and interactivity </p> <a href="#">
                                        Learn More
                                    </a> </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="row justify-content-center no-gutters">
                        <div class="col-md-10 col-lg-8">
                            <div class="boxed boxed--border">
                                <form class="text-left form-email row mx-0" method="post" id="submit_admiss_form" data-success="Thanks for your enquiry, we'll be in touch shortly." data-error="Please fill in all fields correctly.">
                                    <div class="col-md-6"> <span>Name:</span> <input type="text" name="name" class="validate-required"> </div>
                                    <div class="col-md-6"> <span>Father Name:</span> <input type="text" name="company" class="validate-required"> </div>
                                    <div class="col-md-6"> <span>Father Contact:</span> <input type="email" name="email" class="validate-required validate-email"> </div>
                                    <div class="col-md-6"> <span>Present Address:</span> <input type="tel" name="phone" class="validate-required"> </div>
                                    <div class="col-md-6"> <span>Permanent Address:</span> <input type="tel" name="phone" class="validate-required"> </div>
                                    <div class="col-md-6"> <span>Date of Birth:</span> <input type="tel" name="phone" class="validate-required"> </div>
                                    <div class="col-md-6 boxed">
                                        <h5>Gender</h5>
                                       
                                    </div>
                                    <div class="col-md-6 boxed">
                                        <h5>Shift</h5>
                                       
                                    </div>
                                    <div class="col-md-3 col-3 text-center" > <span class="block">MALE</span>
                                    <input type="radio" id="male" name="gender" value="male">
                                    </div>
                                    <div class="col-md-3 col-3 text-center"> <span class="block">FEMALE</span>
                                    <input type="radio" id="female" name="gender" value="female">
                                    </div>
                                    <div class="col-md-3 col-3 text-center"> <span class="block">MORNING</span>
                                    <input type="radio" id="morning" name="shift" value="male">
                                    </div>
                                    <div class="col-md-3 col-3 text-center"> <span class="block">EVENING</span>
                                    <input type="radio" id="evening" name="shift" value="female">
                                    </div>
                                    <div class="col-md-3 col-3 text-center">
                                    </div>
                                    <div class="col-md-6 col-6 text-center"> <span class="block"> <b>CLASS </b></span>                
                                    <small id="Classes_id_error" class="form-text text-danger"></small>
                                    <select name="Classes_id" id="classes_id" class="form-control formselect required">
                                    @foreach($classes as $class)
                                        <option value="{{$class->Class_id}}">{{$class->Class_name}}</option>
                                    @endforeach
                                     </select>
                                    </div>
                                   
                                    <div class="col-md-12 boxed"> <button type="submit" class="btn btn--primary type--uppercase">Submit&nbsp;</button> </div>
                               
                                </form>
                            </div>
                        </div>
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