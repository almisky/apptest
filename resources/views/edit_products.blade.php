@extends('layout')
@section('css')
<link href="{{asset('assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title') Products @endsection
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="javascript:void(0);">
        <?= session('role') == 1 ? 'Admin' : 'User'?>
    </a></li>
<li class="breadcrumb-item active" aria-current="page"><span>Edit Products</span></li>

@endsection
@section('content')
            <div class="layout-px-spacing">
        
                <div class="account-settings-container layout-top-spacing">
        
                    <div class="account-content">
                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll"
                            data-offset="-100">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 layout-spacing">
                                    <form id="general-info" action="{{ route('actioneditproducts') }}" method="POST" class="section general-info">
                                        @csrf
                                        <input type="hidden" class="form-control mb-4" id="id_id_products" name="id_products" value="<?= $datas->id ?>">
                                        <div class="info">
                                            <h6 class="">Edit Products</h6>
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="id_name">Products Name</label>
                                                                            <input type="text" class="form-control mb-4"
                                                                                id="id_name" name="name" placeholder="products name" value="<?= $datas->products_name ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="id_cc">CC</label>
                                                                            <input type="text" class="form-control mb-4" id="id_cc" name="cc" placeholder="cubicle centimeter" value="<?= $datas->cc ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <button id="multiple-messages" type="submit" class="btn btn-dark">Save Changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
        
                            </div>
                        </div>
                    </div>
        
                </div>
        
            </div>    
@endsection
@section('js')
{{-- <script src="{{asset('assets/plugins/dropify/dropify.min.js')}}"></script> --}}
<script src="{{asset('assets/plugins/blockui/jquery.blockUI.min.js')}}"></script>
<script src="{{asset('assets/js/users/account-settings.js')}}"></script>
@endsection