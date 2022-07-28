const userDashboardPage = {
    networkOperation: false,
    userInfo: {},
    user_profile_pic_url: "",
    loadFinished() {
        const thisClass = this;
        thisClass.getUserInfo();
        thisClass.activateHeaderRightMenuToggle();
        setTimeout(() => {
            enableCustomSelect();
        }, 500);
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
            if (thisClass.userInfo.user_type === "admin") {
                window.location.href = $siteUrl + "/admin-product-approve-page";
            }
        });
    },
    activateHeaderRightMenuToggle() {
        $(".user_dashboard_page .header-right .user").on("click", function () {
            $(".user_dashboard_page .header-right .setting-items").fadeToggle();
        });
    },

}