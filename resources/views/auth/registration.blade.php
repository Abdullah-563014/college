@extends('app')
@section('main_container')
<div x-data="registrationPage" x-init="loadingFinished" class="registration_page auth-page">
    <div class="right-side-img"></div>
    <div class="container custom-container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="sign-up-wrapper">
                    <h2 class="title pb10"> Sign up for <?php echo siteName(); ?></h2>
                    <p class="sub-title pb30">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    <div class="sing-up-form-inner">
                        <p x-show="errorMessage.length>=5" x-text="errorMessage" class="form_error text-center"></p>
                        <form @submit.prevent="submitButtonClicked" action="" method="POST" class="row g-3">
                            <div class="col-md-12">
                                <input x-model="formData.name" type="text" class="form-control" id="name" placeholder="Full Name">
                            </div>
                            <div class="col-md-12">
                                <input x-model="formData.email" type="email" class="form-control" id="email" placeholder="info@gmail.com">
                            </div>
                            <div class="col-md-12">
                                <input x-model="formData.password" type="password" class="form-control" id="password" placeholder="********">
                            </div>
                            <div class="col-12">
                                <button @click.prevent="submitButtonClicked" type="submit" class="btn btn-theme d-block w-100">Sign Up</button>
                            </div>
                            <div class="col-12">
                                <p class="text-center">Already have an account? <a href="/login">Sign In</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@push("js")
<script>
    let $companyName = "<?php echo siteName(); ?>";
</script>

<script src="<?php echo siteUrl(); ?>/js/main.js"></script>
<script src="<?php echo siteUrl(); ?>/js/auth/registration.js"></script>
@endpush
@endsection