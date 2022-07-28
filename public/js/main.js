document.addEventListener("DOMContentLoaded", function (event) {


    enableCustomSelect();
    enableBootstrapTooltip();
    enableFeedbackSelectionBtn();


    // Your code to run since DOM is loaded and ready
});



function enableCustomSelect() {
    let selectList;
    let expandIcon;
    let container1;
    $('.custom-select-wrap .select-head').unbind('click');
    $('.custom-select-wrap .select-head').on('click', function () {
        selectList = $(this).parent('.custom-select-wrap');
        expandIcon = $(this).find('.expand-icon');
        if (selectList.find('.select-list').is(':visible')) {
            selectList.find('.select-list').slideUp(200);
            expandIcon.removeClass('active');
        } else {
            selectList.find('.select-list').slideDown(200);
            expandIcon.addClass('active');
        }
    });
    $('.custom-select-wrap .select-list li').unbind('mouseup');
    $(".custom-select-wrap .select-list li").mouseup(function (e) {
        container1 = $(".custom-select-wrap .select-head , .custom-select-wrap .select-list");
        expandIcon.removeClass('active');
        if (!container1.is(e.target) && container1.has(e.target).length === 0) {
            $('.custom-select-wrap .select-list').slideUp();
        }
    });
}

function enableBootstrapTooltip() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl, {
            trigger: 'hover'
        });
    });
}

function enableFeedbackSelectionBtn() {
    $(".feedback_select_root .btn").on("click", function (event) {
        $(".feedback_select_root .btn").removeClass("feedback_active_btn");
        $(event.target).addClass("feedback_active_btn");
    });
}






