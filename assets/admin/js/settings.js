(function ($) {
    $(document).ready(function () {
// check box 
        $('#acb_save_settings').click(function() {
            // $(this).attr('checked', 'checked');
            if ($('#acb_save_settings').is(":checked"))
            {
                $(this).attr('value', '1');
            }else{
                // $(this).removeAttr('checked');
                $(this).attr('value', '0');
            }

            var acb_save_settings_value = $('#acb_save_settings').attr("value");
            // console.log(acb_save_settings_value);

            var data = {
                action: "acb_data_truncate",
                acb_trunc: acb_save_settings_value
            };

            $.ajax({
                url: acb_data_truncate.ajaxurl,
                data: data,
                type: "post",
                success: function(results) {
                    // Swal.fire({
                    //     position: 'center',
                    //     icon: 'success',
                    //     title: 'Your Form has been saved',
                    //     showConfirmButton: false,
                    //     timer: 1500
                    // })
                }
            });
        });

        $("#chat-circle").click(function() {
            $(".chat-box").toggle('scale');
    
        })
    
        $(".chat-box-toggle").click(function() {
            // $("#chat-circle").toggle('scale');
            $(".chat-box").toggle('scale');
    
        })



    });
})(jQuery);

