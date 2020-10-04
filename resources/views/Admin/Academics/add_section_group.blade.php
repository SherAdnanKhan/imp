@extends('Admin.layout.master')

@section("content")
<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Blank page</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Agroxa</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Blank page</li>
                                    </ol>
            
                                    <div class="state-information d-none d-sm-block">
                                        <div class="state-graph">
                                            <div id="header-chart-1"></div>
                                            <div class="info">Balance $ 2,317</div>
                                        </div>
                                        <div class="state-graph">
                                            <div id="header-chart-2"></div>
                                            <div class="info">Item Sold 1230</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- Demo purpose only -->
                                            <div style="min-height: 300px;">
                                            <div class="col-sm-6 col-md-3 m-t-30">
                                                    <div class="text-center">
                                                        <p class="text-muted">Large modal</p>
                                                        <!-- Large modal -->
                                                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>
                                                    </div>
            
            
                                                    <!--  Modal content for the above example -->
                                                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Large modal</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Cras mattis consectetur purus sit amet fermentum.
                                                                        Cras justo odio, dapibus ac facilisis in,
                                                                        egestas eget quam. Morbi leo risus, porta ac
                                                                        consectetur ac, vestibulum at eros.</p>
                                                                    <p>Praesent commodo cursus magna, vel scelerisque
                                                                        nisl consectetur et. Vivamus sagittis lacus vel
                                                                        augue laoreet rutrum faucibus dolor auctor.</p>
                                                                    <p>Aenean lacinia bibendum nulla sed consectetur.
                                                                        Praesent commodo cursus magna, vel scelerisque
                                                                        nisl consectetur et. Donec sed odio dui. Donec
                                                                        ullamcorper nulla non metus auctor
                                                                        fringilla.</p>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page content-->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->
@endsection