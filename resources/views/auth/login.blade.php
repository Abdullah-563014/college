@extends('app')
@section('main_container')
<div x-data="loginPage" class="login_page auth-page">
    <div class="right-side-img"></div>
    <div class="container custom-container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="sign-up-wrapper">
                    <h2 class="title pb10">Welcome to <?php echo siteName(); ?></h2>
                    <p class="sub-title pb30">Don't have an account? <a href="/registration"> Sign Up </a></p>
                    <p x-show="errorMessage.length" x-text="errorMessage" class="form_error text-center"></p>
                    <div class="sing-up-form-inner">
                        <form class="row g-3" @submit.prevent="submitButtonClicked" action="" method="POST">
                            @csrf

                            <input x-model="formData._token" type="hidden" name="_token" value="">

                            <div class="col-md-12">
                                <input x-model="formData.email" type="email" class="form-control" id="email" placeholder="Enter your Email">
                            </div>
                            <div class="col-md-12">
                                <input x-model="formData.password" type="password" class="form-control" id="password" placeholder="********">
                            </div>
                            <div class="col-12 mt30 mb10">
                                <button @click.prevent="submitButtonClicked" type="submit" class="btn btn-theme d-block w-100">Log in</button>
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                                <div class="form-check noselect">
                                    <input x-model="formData.remember_password" class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        <p>Remember Me</p>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



@push("js")
<script src="<?php echo siteUrl(); ?>/js/auth/login.js"></script>
@endpush
@endsection