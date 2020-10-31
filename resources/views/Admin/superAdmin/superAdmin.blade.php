@extends('Admin.layout.master')

@section("content")

         <div class="page-content-wrapper">
               <div class="row">
                  <div class="col-12">
                     <div class="card m-b-20">
                        <div class="card-body">

                        <section class="serviceoffers" id="servicediv">
    <div class="container headings text-center">
      <h1 class="text-center font-weight-bold">Collabs.pk</h1>
      <h3 class="text-center">WHAT DO WE OFFER</h3>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-10 offset-1 offset-lg-0">
          <div class="names my-3">
            <h1>HTML</h1>
            <div class="progress w-75">
              <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%">100%</div>
            </div>
          </div>
          <div class="names my-3">
            <h1>CSS</h1>
            <div class="progress w-75">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 90%">90%
              </div>
            </div>
          </div>
          <div class="names my-3">
            <h1>JAVASCRIPT</h1>
            <div class="progress w-75">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" style="width: 80%">80%
              </div>
            </div>
          </div>
          <div class="names my-3">
            <h1>Laravel</h1>
            <div class="progress w-75">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" style="width: 75%">75%
              </div>
            </div>
          </div>
          <div class="names my-3">
            <h1>Jquery</h1>
            <div class="progress w-75">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" style="width: 70%">70%
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-12 servicediv">
          <div class="row">
            <div class="col-lg-2 col-2 service-icons">
              <i class="fa-3x fa fa-desktop" aria-hidden="true"></i>
            </div>
            <div class="col-lg-10 col-10">
              <h2>School Management System</h2>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi cupiditate asperiores doloremque
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-2 col-2 service-icons">
              <i class="fa-3x fa fa-wifi" aria-hidden="true"></i>
            </div>
            <div class="col-lg-10 col-10">
              <h2>Teachers Training</h2>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi cupiditate asperiores doloremque
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-2 col-2 service-icons">
              <i class="fa-3x fa fa-phone" aria-hidden="true"></i>
            </div>
            <div class="col-lg-10 col-10">
              <h2>Support 24/7</h2>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi cupiditate asperiores doloremque
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="project-work">
    <div class="container headings text-center">
      <p class="text-center font-weight-bold">MORE THEN 100 CLIENTS</p>
    </div>
    <div class="container d-flex justify-content-around align-items-center text-center">
      <div>
        <h1 class="count">1500</h1>
        <p>CMS Installation</p>
      </div>
      <div>
        <h1 class="count">2500</h1>
        <p>Awards Won</p>
      </div>
      <div>
        <h1 class="count">700</h1>
        <p>Happy clients</p>
      </div>
      <div>
        <h1 class="count">500</h1>
        <p>Working On</p>
      </div>
    </div>
  </section>
  <section class="happy-clients">
    <div class="container headings text-center">
      <h1 class="text-center font-weight-bold ">OUR HAPPY CLIENTS</h1>
      <p class="text-capitalize pt-1">Our Satisfied Customer Says</p>
    </div>

    <div id="demo" class="carousel slide" data-ride="carousel">

      <!-- Indicators -->
      <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ul>

      <!-- The slideshow -->
      <div class="carousel-inner container">
        <div class="carousel-item active">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
              <div class="box">
                <a href="#"><img src="{{asset('dashboard')}}/school1.jpeg" style=" width:350px; height:300px;" class="img-fluidi img-thumbnail"></a>
                <p class="m-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, repellat. Dignissimos
                  ducimus fuga excepturi impedit. </p>
                  <h4 style="text-align: center;">Wagon Wheel School</h4>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 card-on">
              <div class="box">
                <a href="#"><img src="{{asset('dashboard')}}/school2.jpg"  style=" width:350px; height:300px;" class="img-fluidi img-thumbnail"></a>
                <p class="m-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, repellat. Dignissimos
                  ducimus fuga excepturi impedit. </p>
                  <h4 style="text-align: center;">Laqoon Pvt</h4>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
              <div class="box">
                <a href="#"><img src="{{asset('dashboard')}}/school3.jpg" style=" width:350px; height:300px;" class="img-fluidi img-thumbnail"></a>
                <p class="m-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, repellat. Dignissimos
                  ducimus fuga excepturi impedit. </p>
                  <h4 style="text-align: center;">Alphabet Kids</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item ">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
              <div class="box">
                <a href="#"><img src="{{asset('dashboard')}}/school4.jpg" style=" width:350px; height:300px;" class="img-fluidi img-thumbnail"></a>
                <p class="m-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, repellat. Dignissimos
                  ducimus fuga excepturi impedit. </p>
                  <h4 class="text-center"> Oak Grove Middle School</h4>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 card-on">
              <div class="box">
                <a href="#"><img src="{{asset('dashboard')}}/school5.jpg" style=" width:350px; height:300px;" class="img-fluidi img-thumbnail"></a>
                <p class="m-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, repellat. Dignissimos
                  ducimus fuga excepturi impedit. </p>
                  <h4 style="text-align: center;">Central Technical School</h4>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
              <div class="box">
                <a href="#"><img src="{{asset('dashboard')}}/school6.jpg" style=" width:350px; height:300px;" class="img-fluidi img-thumbnail"></a>
                <p class="m-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, repellat. Dignissimos
                  ducimus fuga excepturi impedit. </p>
                  <h4 style="text-align: center;">Crestview School</h4>
               
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item ">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
              <div class="box">
                <a href="#"><img src="{{asset('dashboard')}}/school7.jpg" style=" width:350px; height:300px;" class="img-fluidi img-thumbnail"></a>
                <p class="m-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, repellat. Dignissimos
                  ducimus fuga excepturi impedit. </p>
                <h4 style="text-align: center;">Five Star Students</h4>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 card-on">
              <div class="box">
                <a href="#"><img src="{{asset('dashboard')}}/school8.jpg" style=" width:350px; height:300px;" class="img-fluidi img-thumbnail"></a>
                <p class="m-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, repellat. Dignissimos
                  ducimus fuga excepturi impedit. </p>
                <h4 style="text-align: center;">New Opportunties</h4>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
              <div class="box">
                <a href="#"><img src="{{asset('dashboard')}}/school9.jpg" style=" width:350px; height:300px;" class="img-fluidi img-thumbnail"></a>
                <p class="m-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, repellat. Dignissimos
                  ducimus fuga excepturi impedit. </p>
                <h4 style="text-align: center;">Five Star Students</h4>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>

    </div>
  </section>
                        </div>
                     </div>
                  </div>
@endsection

@section("customscript")
    
@endsection