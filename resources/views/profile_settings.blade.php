<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>User Profile </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
</head>

<body>

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">

            <ul class="navbar-item theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    {{-- <a href="index.html">
                        <img src="assets/img/90x90.jpg" class="navbar-logo" alt="logo">
                    </a> --}}
                </li>
                <li class="nav-item theme-text">
                    <a href="index.html" class="nav-link"> TEST </a>
                </li>
            </ul>

            

            <ul class="navbar-item flex-row ml-md-auto">

                <li class="nav-item dropdown user-profile-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <img src="assets/img/90x90.jpg" alt="avatar">
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="">
                            <div class="dropdown-item">
                                <a class="" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg><?= session('nama') ?></a>
                            </div>
                            <div class="dropdown-item">
                                <a class="" href="{{ route('actionlogout') }}"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-log-out">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg> Log Out</a>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Profile</span></li>
                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">

            <nav id="sidebar">
                <div class="shadow-bottom"></div>

                <ul class="list-unstyled menu-categories" id="accordionExample">             
                    <li class="menu">
                        <a href="fonticons.html" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span>My Profile</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="fonticons.html" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
                                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                    <polyline points="2 17 12 22 22 17"></polyline>
                                    <polyline points="2 12 12 17 22 12"></polyline>
                                </svg>
                                <span>My Orders</span>
                            </div>
                        </a>
                    </li>
                </ul>

            </nav>

        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
        
                <div class="account-settings-container layout-top-spacing">
        
                    <div class="account-content">
                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll"
                            data-offset="-100">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="general-info" action="{{ route('actionsaveprofile') }}" class="section general-info">
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
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script> 
    <script src="{{asset('assets/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    {{-- <script src="{{asset('assets/plugins/dropify/dropify.min.js')}}"></script> --}}
    <script src="{{asset('assets/plugins/blockui/jquery.blockUI.min.js')}}"></script>
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <script src="{{asset('assets/js/users/account-settings.js')}}"></script>
</body>

</html>