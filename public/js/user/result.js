const resultPage = {
    networkOperation: false,
    userInfoRetrievalHandler: null,
    userInfo: {},
    resultList: [],
    loadFinished() {
        const thisClass = this;
        thisClass.loadResultList();
    },
    loadResultList() {
        const thisClass = this;
        thisClass.networkOperation = true;
        $.ajax({
            type: "GET",
            url: $siteUrl + "/get-result-list",
            success: function (result) {
                if (result.status == 'success') {
                    thisClass.resultList = result.data;
                    console.log(thisClass.resultList);
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

}