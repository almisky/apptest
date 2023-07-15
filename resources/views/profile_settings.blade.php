@extends('layout')
@section('css')
<link href="{{asset('assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title') Profile @endsection
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="javascript:void(0);">
        <?= session('role') == 1 ? 'Admin' : 'User'?>
    </a></li>
<li class="breadcrumb-item active" aria-current="page"><span>Profile Settings</span></li>

@endsection
@section('content')
            <div class="layout-px-spacing">
        
                <div class="account-settings-container layout-top-spacing">
        
                    <div class="account-content">
                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll"
                            data-offset="-100">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="general-info" action="{{ route('actionsaveprofile') }}" method="POST" class="section general-info">
                                        @csrf
                                        <input type="hidden" class="form-control mb-4" id="id_username" name="username" value="<?= session('user_id') ?>">
                                        <div class="info">
                                            <h6 class="">General Information</h6>
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-xl-2 col-lg-12 col-md-4">
                                                            <div class="upload mt-4 pr-md-4">
                                                                <input type="file" id="input-file-max-fs" class="dropify"
                                                                    data-default-file="assets/img/200x200.jpg"
                                                                    data-max-file-size="2M" />
                                                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>
                                                                    Upload
                                                                    Picture</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="id_name">Name</label>
                                                                            <input type="text" class="form-control mb-4"
                                                                                id="id_name" name="name" value="<?= $datas->nama ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="id_email">Email</label>
                                                                            <input type="text" class="form-control mb-4" id="id_email" name="email" value="<?= $datas->email ?>">
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
        
                    {{-- <div class="account-settings-footer">
        
                        <div class="as-footer-container">
        
                            <button id="multiple-reset" class="btn btn-primary">Reset All</button>
                            <div class="blockui-growl-message">
                                <i class="flaticon-double-check"></i>&nbsp; Settings Saved Successfully
                            </div>
                            <button id="multiple-messages" class="btn btn-dark">Save Changes</button>
        
                        </div>
        
                    </div> --}}
                </div>
        
            </div>    
@endsection
@section('js')
{{-- <script src="{{asset('assets/plugins/dropify/dropify.min.js')}}"></script> --}}
<script src="{{asset('assets/plugins/blockui/jquery.blockUI.min.js')}}"></script>
<script src="{{asset('assets/js/users/account-settings.js')}}"></script>
@endsection