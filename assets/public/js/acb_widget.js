(function ($) {
    $(document).ready(function () {
        
     /**
     * Show the chat box open
     */
        /**
         * Chat open and close
         */

        $("#chat-circle").click(function() {
            var chat_val =  $('#sam').attr("value");
            var data = {
                action: "store_acb_widget_scale_data",
                scale: chat_val,
            };

            $.ajax({
                url: store_acb_widget_scale_data.ajaxurl,
                data: data,
                type: "post",
                success: function(results) {
                    console.log(data)
                }
            });

        });
    
        $(".chat-box-toggle").click(function() {
            var chat_val =  $('#sam').attr("value");
            var data = {
                action: "store_acb_widget_scale_data",
                scale: chat_val,
            };

            $.ajax({
                url: store_acb_widget_scale_data.ajaxurl,
                data: data,
                type: "post",
                success: function(results) {
                    console.log(data)
                }
            });
        });
         

    });
})(jQuery);


