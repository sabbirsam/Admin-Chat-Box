(function ($) {
    $(document).ready(function () {

        var data = {
            action: "show_user_inputed_data",
            // result: "here need to add res"
        };
        // console.log(data);

        function ajaxCall() {
            $.ajax({
                data: data,
                type: "GET",
                // type:'post',
                url: show_user_inputed_data.ajaxurl, 
                // async: false,
                // dataType: "html",
                success: (function(result) {
                    $("#vegan").html(result);
                    // console.log(result);
                })
            })
        };
        ajaxCall(); // To output when the page loads
        setInterval(ajaxCall, (1 * 1000)); // x * 1000 to get it in seconds

        
     /**
     * Show the chat box open
     */
           window.onload = function() {
            document.getElementById("sam").style.display = 'block';
        };


    });
})(jQuery);


