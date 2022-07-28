const loginPage = {
    networkOperation: false,
    errorMessage: "",
    formData: {
        email: "",
        password: "",
        remember_password: false,
        _token: $csrfToken,
    },
    submitButtonClicked() {
        const thisClass = this;
        $(".form_error").html("");
        $("#email,#password").removeClass("error");
        thisClass.errorMessage = "";
        if (!$("#email").val()) {
            $("#email").addClass("error");
            thisClass.errorMessage = "Plase input email address.";
            return;
        }
        if (!$("#password").val()) {
            $("#password").addClass("error");
            thisClass.errorMessage = "Plase input password.";
            return;
        }
        if (thisClass.formData.email && thisClass.formData.password) {
            if (checkEmailValidation(thisClass.formData.email)) {
                thisClass.networkOperation = true;
                fetch($siteUrl + "/login-validation", {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(this.formData)
                })
                    .then(res => res.json())
                    .then(result => {
                        thisClass.networkOperation = false;
                        if (result.status == "success") {
                            window.location.href = $siteUrl;
                        } else {
                            toastr.success(result.msg);
                            thisClass.errorMessage = result.msg;
                        }
                    });
            } else {
                thisClass.errorMessage = "Please input a valid email address.";
                $("#email").addClass("error");
            }
        } else {
            $("#email").addClass("error");
            $("#password").addClass("error");
            thisClass.errorMessage = "Please input all field properly.";
        }
    },
}