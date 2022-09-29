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
            // $(this).attr('checked', 'checked');
            if ($('#acb_position').is(":checked"))
            {
                $(this).attr('value', '1');
            }else{
                // $(this).removeAttr('checked');
                $(this).attr('value', '0');
            }
            });

            if ($('#acb_position').is(":checked")){
                var acb_pos =  $('#acb_position').attr("value");
                if(acb_pos == '1'){
                    $("#arrow-left").toggle().css({"margin-top": "53px"});
                    $("#arrow-right").toggle().css({"margin-top": "53px"});
                }
             }

            $('#acb_position').click(function() { 
                $("#arrow-left").toggle().css({"margin-top": "53px"});
                $("#arrow-right").toggle().css({"margin-top": "53px"});
            });


         $('#arrow-left').click(function() { 
            $(this).attr('value', '1').css({"background": "#8500ff"});
            $('#arrow-right').attr('value', '0').css({"background": "#043263"});
            $('.chat-box').css({"left": "700px"});
            $('#chat-circle').css({"left": "590px"});
           

         });
         $('#arrow-right').click(function() { 
            $(this).attr('value', '1').css({"background": "#8500ff"});
            $('#arrow-left').attr('value', '0').css({"background": "#043263"});
            $('.chat-box').css({"left": "unset"});
            $('#chat-circle').css({"left": "unset"});
           
         });

         var left =  $('#arrow-left').attr("value");
         var right =  $('#arrow-right').attr("value");

        if(left == '0' && right == '1'){
            $('.chat-box').css({"left": "auto"});
            $('#chat-circle').css({"left": "unset"});
        }
        if(left == '1' && right == '0'){
            $('.chat-box').css({"left": "700px"});
            $('#chat-circle').css({"left": "590px"});
        }




         /**
          * Auto selected btn color
          */
          $('#acb_customization').click(function() {
            // $(this).attr('checked', 'checked');
            if ($('#acb_customization').is(":checked"))
            {
                $(this).attr('value', '1');
            }else{
                // $(this).removeAttr('checked');
                $(this).attr('value', '0');
            }
            });

            
        $('.color-picker').hide();//color pic text hide
        $('#acb_customization').click(function() { 
            $("#acb_colorPicker").toggle().css({"margin-top": "53px", "margin-left": "11px"}); //color pic color bar show below
            $('.color-picker').toggle();
            
         });
         
        var acb_pos =  $('#acb_customization').attr("value");
            if(acb_pos == '1'){
                $("#acb_colorPicker").toggle().css({"margin-top": "53px", "margin-left": "11px"});
                $('.color-picker').toggle();
            }
             
            /**
             * Pos btn color set
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
            var acb_position = $('#acb_position').attr("value");
            var acb_customization = $('#acb_customization').attr("value");
            var acb_position_settings_left_val = $('#arrow-left').attr("value");
            var acb_position_settings_right_val = $('#arrow-right').attr("value");

            var data = {
                action: "acb_data_truncate",
                acb_frontend: acb_frontend,
                acb_backend: acb_backend,
                acb_position: acb_position,
                acb_customization: acb_customization,
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
                      location.reload(true); 

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

