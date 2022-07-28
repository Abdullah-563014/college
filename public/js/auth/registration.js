const registrationPage = {
    networkOperation: true,
    userInfo: {},
    errorMessage: "",
    formData: {
        name: "",
        email: "",
        password: "",
        _token: $csrfToken,
    },
    loadingFinished() {
        const thisClass = this;
    },
    submitButtonClicked() {
        const thisClass = this;
        $(".form_error").html("");
        $("#name,#email,#password").removeClass("error");
        if (!$("#name").val()) {
            $("#name").addClass("error");
            this.errorMessage = "Please input your Full Name.";
            return;
        }
        if (!$("#email").val()) {
            $("#email").addClass("error");
            this.errorMessage = "Please input your Email address.";
            return;
        }
        if (!$("#password").val()) {
            $("#password").addClass("error");
            this.errorMessage = "Please input your Password.";
            return;
        }
        if (this.formData.name && this.formData.email && this.formData.password) {
            if (checkEmailValidation(this.formData.email)) {
                if (this.passwordStrengthCheck(this.formData.password) >= 3) {
                    thisClass.networkOperation = true;
                    fetch($siteUrl + "/registration-validation", {
                        method: "POST",
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(this.formData)
                    })
                        .then(res => res.json())
                        .then((result) => {
                            thisClass.networkOperation = false;
                            if (result.status == "success") {
                                setTimeout(() => {
                                    window.location.href = $siteUrl;
                                }, 1000);
                                toastr.success("Account created successfully");
                            } else {
                                toastr.success(result.msg);
                                thisClass.errorMessage = result.msg;
                            }
                        });
                } else {
                    this.errorMessage = "Please input a strong password.";
                    $("#password").addClass("error");
                }
            } else {
                this.errorMessage = "Please input a valid email address.";
                $("#email").addClass("error");
            }
        }
    },
    passwordStrengthCheck(password) {
        var strength = 0;
        if (password.match(/[a-z]+/)) {
            strength += 1;
        }
        if (password.match(/[A-Z]+/)) {
            strength += 1;
        }
        if (password.match(/[0-9]+/)) {
            strength += 1;
        }
        if (password.match(/[$@#&!]+/)) {
            strength += 1;
        }
        return strength;
    },
}