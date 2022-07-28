@extends('app')
@section('main_container')
<div x-data="userDashboardPage" x-init="loadFinished" class="user_dashboard_page">
    <div class="header_root d-flex justify-content-between align-items-center flex-wrap responsiveHeader">
        <h3 class="page-title"><a href="<?php echo siteUrl(); ?>"> <img src="<?php echo siteUrl(); ?>/images/logo.png" alt="logo" width="50"></a></h3>
        <div class="header-right">
            <div class="user">
                <div class="user_info d-flex align-items-center">
                    <div class="header_img">
                        <img :src="user_profile_pic_url" alt="user img">
                    </div>
                    <div class="user_profile-info">
                        <h6 x-text="userInfo.name"></h6>
                    </div>
                </div>
                <div class="arrow-down-icon">
                    <img src="<?php echo siteUrl(); ?>/images/arrow.png" alt="arrow">
                </div>
            </div>
            <div class="setting-items">
                <ul>
                    @if(Auth::user())
                    <li>
                        <a href="/">Result</a>
                    </li>
                    <li>
                        <a href="/profile">Profile</a>
                    </li>
                    <li>
                        <a href="/signout">Sign Out</a>
                    </li>
                    @else
                    <li>
                        <a href="/login">Sign In</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>


    <div class="user_dashboard_child_content_root mainContent">
        @yield("user_dashboard_child_content")
    </div>



    <!-- loading spinner -->
    <div x-show="networkOperation" class="loading_spinner_parent">
        <div class="la-ball-spin la-dark la-3x" style="color: #FF33FF;">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>



</div>


@push("js")
<script src="<?php echo siteUrl(); ?>/js/user/dashboard.js"></script>
@endpush
@endsection