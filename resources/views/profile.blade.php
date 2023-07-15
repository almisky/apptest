@extends('layout')
@section('page-title') Profile @endsection
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="javascript:void(0);"><?= session('role') == 1 ? 'Admin' : 'User'?></a></li>
<li class="breadcrumb-item active" aria-current="page"><span>Profile</span></li>
@endsection
@section('content')
            <div class="layout-px-spacing">

                <div class="row layout-spacing">

                    <!-- Content -->
                    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                        <div class="user-profile layout-spacing">
                            
                            <div class="widget-content widget-content-area">
                                @if(session('error'))
                                <div class="alert alert-danger">
                                    {{session('error')}}
                                </div>
                                @endif
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                                @endif
                                <div class="d-flex justify-content-between">
                                    <h3 class="">Profile</h3>
                                    <a href="{{ route('profilesettings') }}" class="mt-2 edit-profile"> <svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-edit-3">
                                            <path d="M12 20h9"></path>
                                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                        </svg></a>
                                </div>
                                <div class="text-center user-info">
                                    
                                    <?php if (File::exists($full_path)) : ?>
                                        <img src="{{asset("assets/img/$datas->username.jpg")}}" style="height:150px;" alt="avatar">
                                    <?php else: ?>
                                        <img src="{{asset("assets/img/90x90.jpg")}}" alt="avatar">
                                    <?php endif ?>
                                    <p class=""><?= $datas->nama ?></p>
                                </div>
                                <div class="user-info-list">

                                    <div class="">
                                        <ul class="contacts-block list-unstyled">
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-coffee">
                                                    <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                                                    <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                                                    <line x1="6" y1="1" x2="6" y2="4"></line>
                                                    <line x1="10" y1="1" x2="10" y2="4"></line>
                                                    <line x1="14" y1="1" x2="14" y2="4"></line>
                                                </svg> <?= session('role') == 1 ? 'Admin' : 'User'?>
                                            </li>
                                            <li class="contacts-block__item">
                                                <a href="mailto:example@mail.com"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-mail">
                                                        <path
                                                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                        </path>
                                                        <polyline points="22,6 12,13 2,6"></polyline>
                                                    </svg><?= $datas->email ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
@endsection
@section('js')

@endsection