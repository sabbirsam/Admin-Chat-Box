(function ($) {
$(document).ready(function () {
    var data = {
        action: "show_user_inputed_data",
    };

    function ajaxCall() {
        $.ajax({
            url: show_user_inputed_data.ajaxurl, 
            data: data,
            success: (function(result) {
                console.log(result);
                $("#vegan").html(result);
            })
        })
    };
    ajaxCall(); // To output when the page loads
    setInterval(ajaxCall, (1 * 1000)); // x * 1000 to get it in seconds
});
})(jQuery);