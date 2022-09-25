(function ($) {
    $(document).ready(function () {
// check box 

        /**
         * Frontend
         */
         $('#acb_frontend').click(function() {
            // $(this).attr('checked', 'checked');
            if ($('#acb_frontend').is(":checked"))
            {
                $(this).attr('value', '1');
            }else{
                // $(this).removeAttr('checked');
                $(this).attr('value', '0');
            }
            });

        /**
         * Backend
         */
            $('#acb_backend').click(function() {
                // $(this).attr('checked', 'checked');
                if ($('#acb_backend').is(":checked"))
                {
                    $(this).attr('value', '1');
                }else{
                    // $(this).removeAttr('checked');
                    $(this).attr('value', '0');
                }
                });

        /**
         * Set position
         */
    
         $('#acb_position').click(function() { 
            $("#arrow-left").toggle().css({"margin-top": "53px"});
            $("#arrow-right").toggle().css({"margin-top": "53px"});
         });

         $('#arrow-left').click(function() { 
            $(this).attr('value', '1').css({"background": "#8500ff"});
            $('#arrow-right').attr('value', '0').css({"background": "#043263"});
           

         });
         $('#arrow-right').click(function() { 
            $(this).attr('value', '1').css({"background": "#8500ff"});
            $('#arrow-left').attr('value', '0').css({"background": "#043263"});
           
         });


         /**
          * Auto selected btn color
          */
        var left =  $('#arrow-left').attr("value");
       
        var right =  $('#arrow-right').attr("value");
      
        if(left == 1){
            $('#arrow-left').css({"background": "#8500ff"});
           
        }else if(right== 1){
            $('#arrow-right').css({"background": "#8500ff"});
           
        }

          /**
         * Settings Customization 
         */

        $('.color-picker').hide();
        $('#acb_customization').click(function() { 
            $("#acb_colorPicker").toggle().css({"margin-top": "53px", "margin-left": "11px"});
            $('.color-picker').toggle();
            
         });

         
    
        let userColor= document.querySelector("#acb_colorPicker");
        userColor.addEventListener("change",(e) => {
            
            $("#cbox-header").css({"background": userColor.value});
        });


        
    
        $('#acb_save_settings').click(function() {
            // $(this).attr('checked', 'checked');
            if ($('#acb_save_settings').is(":checked"))
            {
                $(this).attr('value', '1');
            }else{
                // $(this).removeAttr('checked');
                $(this).attr('value', '0');
            }

            /**
             * Ajax values
             */
            var acb_frontend = $('#acb_frontend').attr("value");
            var acb_backend = $('#acb_backend').attr("value");
            var acb_position_settings_left_val = $('#arrow-left').attr("value");
            var acb_position_settings_right_val = $('#arrow-right').attr("value");

            var data = {
                action: "acb_data_truncate",
                acb_frontend: acb_frontend,
                acb_backend: acb_backend,
                left_pos_value:acb_position_settings_left_val,
                right_pos_value:acb_position_settings_right_val,
                bg_color_value:userColor.value,
            };

            console.log(data);

            $.ajax({
                url: acb_data_truncate.ajaxurl,
                data: data,
                type: "post",
                success: function(results) {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Chat Setting saved',
                        showConfirmButton: false,
                        timer: 1100
                      })

                }
            });
        });


        /**
         * Chat open and close
         */

        $("#chat-circle").click(function() {
            $(".chat-box").toggle('scale');
    
        });
    
        $(".chat-box-toggle").click(function() {
            $(".chat-box").toggle('scale');
    
        });



    });

})(jQuery);

