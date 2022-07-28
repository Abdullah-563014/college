@extends('dashboard')
@section('user_dashboard_child_content')
<div x-data="userProfilePage" x-init="loadFinished" class="container user_profile_page">
    <div class="row">
        <div class="user_logo">
            <img :src="user_profile_pic_url" alt="img" style="width: 105px; height: 105px; cursor: default; border-radius: 50%">
            <div class="upload_logo" type="file">
                <img onclick="document.getElementById('profile_picture_upload').click()" src=" <?php echo siteUrl(); ?>/images/upload.png" alt="img">
            </div>
            <input id="profile_picture_upload" type="file" name="profile_picture" accept="image/*" x-on:change="profilePicSelected(Object.values($event.target.files))" style="display: none;">
        </div>
        <p x-show="errorMessage.length" x-text="errorMessage" class="form_error text-center"></p>
        <form @submit.prevent="updateProfileInfo" class="row g-3" id="myAccount" action="" method="POST">
            <div class="col-lg-6 modal-label-view account-form-control">
                <label for="name" class="form-label">Full Name</label>
                <input x-model="profileForm.name" type="text" class="form-control" id="name" placeholder="First Name">
            </div>
            <div class="col-lg-6 modal-label-view account-form-control">
                <label for="email" class="form-label">Email</label>
                <input x-model="profileForm.email" type="email" class="form-control" id="email" placeholder="example@gmail.com">
            </div>
            <div class="col-lg-6 modal-label-view account-form-control">
                <label for="oldPassword" class="form-label">Old Password</label>
                <input x-model="profileForm.oldPassword" type="password" class="form-control" id="oldPassword" placeholder="*********">
            </div>
            <div class="col-lg-6 modal-label-view account-form-control">
                <label for="newPassword" class="form-label">New Password</label>
                <input x-model="profileForm.newPassword" type="password" class="form-control" id="newPassword" placeholder="*********">
            </div>
            <div class="col-lg-6 modal-label-view account-form-control">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" placeholder="*********">
            </div>
            <div class="col-12">
                <div class="btn-form-submit">
                    <button @click.prevent="updateProfileInfo" type="submit" class="btn btn-outline" data-val="2">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>



@push("js")
<script>
    let $productId = "<?php echo (isset($product_id) && !empty(isset($product_id))) ? $product_id : "0"; ?>";
</script>
<script src="<?php echo siteUrl(); ?>/js/user/profile.js"></script>
@endpush
@endsection