const userProfilePage = {
    networkOperation: false,
    errorMessage: "",
    userInfoRetrievalHandler: null,
    userInfo: {},
    profileForm: {
        name: "",
        email: "",
        oldPassword: "",
        newPassword: "",
        _token: $csrfToken
    },
    user_profile_pic_url: "",
    loadFinished() {
        const thisClass = this;
        thisClass.getUserInfo();
    },
    getUserInfo() {
        const thisClass = this;
        $.get($siteUrl + "/load-user-info", function (data, status) {
            thisClass.userInfo = data.data;
            if (thisClass.userInfo.profile_picture) {
                thisClass.user_profile_pic_url = $siteUrl + "/uploads/images/profile/" + thisClass.userInfo.profile_picture;
            } else {
                thisClass.user_profile_pic_url = $siteUrl + "/images/profile/temporary_profile_pic.png";
            }
            thisClass.profileForm.name = thisClass.userInfo.name;
            thisClass.profileForm.email = thisClass.userInfo.email;
        });
    },
    updateProfileInfo() {
        const thisClass = this;
        $(".form_error").html("");
        thisClass.errorMessage = "";
        $("input.form-control").removeClass("error");
        if (!$("#name").val()) {
            $("#name").addClass("error");
            thisClass.errorMessage = "Plase input your full name";
            return;
        }
        if (!$("#email").val()) {
            $("#email").addClass("error");
            this.errorMessage = "Plase input email address.";
            return;
        }
        if (!checkEmailValidation($("#email").val())) {
            $("#email").addClass("error");
            this.errorMessage = "Plase input valid email address.";
            return;
        }
        if ($("#newPassword").val() || $("#confirmPassword").val()) {
            if (!$("#oldPassword").val()) {
                $("#oldPassword").addClass("error");
                this.errorMessage = "Plase input old password to change current password.";
                return;
            } else {
                if ($("#newPassword").val() != $("#confirmPassword").val()) {
                    $("#confirmPassword").addClass("error");
                    this.errorMessage = "Confirm password is not matching.";
                    return;
                }
                if (passwordStrengthCheck($("#newPassword").val()) < 3) {
                    $("#newPassword").addClass("error");
                    this.errorMessage = "Password not strong. Please input strong password with digit, alphabet, number and symbol";
                    return;
                }
            }
        }
        const fd = new FormData();
        fd.append("name", thisClass.profileForm.name);
        fd.append("email", thisClass.profileForm.email);
        fd.append("oldPassword", thisClass.profileForm.oldPassword);
        fd.append("newPassword", thisClass.profileForm.newPassword);
        fd.append("_token", thisClass.profileForm._token);
        thisClass.networkOperation = true;
        $.ajax({
            type: "POST",
            url: $siteUrl + "/update-user-profile-info",
            data: fd,
            processData: false,
            contentType: false,
            cache: false,
            success: function (result) {
                toastr.success(result.msg);
                if (result.status == 'success') {
                    thisClass.getUserInfo();
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            },
            complete: () => {
                thisClass.networkOperation = false;
            }
        });
    },
    profilePicSelected(input) {
        const thisClass = this;
        if (!input[0] || input[0].name.length <= 0) {
            return;
        }
        var fd = new FormData();
        fd.append('profile_picture', input[0]);
        fd.append('_token', thisClass.profileForm._token);
        thisClass.networkOperation = true;
        $.ajax({
            url: $siteUrl + "/update-user-profile-picture",
            data: fd,
            type: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: fd,
            success: (result) => {
                toastr.success(result.msg);
                if (result.status == "success") {
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                }
            },
            error: (error) => { },
            complete: () => {
                thisClass.networkOperation = false;
            }
        });
    },

}