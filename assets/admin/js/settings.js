!function(t){t(document).ready(function(){if(t("#acb_frontend").click(function(){t("#acb_frontend").is(":checked")?t(this).attr("value","1"):t(this).attr("value","0")}),t("#acb_backend").click(function(){t("#acb_backend").is(":checked")?t(this).attr("value","1"):t(this).attr("value","0")}),t("#acb_position").click(function(){t("#acb_position").is(":checked")?t(this).attr("value","1"):t(this).attr("value","0")}),t("#acb_position").is(":checked")){var a=t("#acb_position").attr("value");"1"==a&&(t("#arrow-left").toggle().css({"margin-top":"53px"}),t("#arrow-right").toggle().css({"margin-top":"53px"}))}t("#acb_position").click(function(){t("#arrow-left").toggle().css({"margin-top":"53px"}),t("#arrow-right").toggle().css({"margin-top":"53px"})}),t("#arrow-left").click(function(){t(this).attr("value","1").css({background:"#8500ff"}),t("#arrow-right").attr("value","0").css({background:"#043263"}),t(".chat-box").css({left:"708px"}),t("#chat-circle").css({left:"708px"})}),t("#arrow-right").click(function(){t(this).attr("value","1").css({background:"#8500ff"}),t("#arrow-left").attr("value","0").css({background:"#043263"}),t(".chat-box").css({left:"unset"}),t("#chat-circle").css({left:"unset"})});var c=t("#arrow-left").attr("value"),e=t("#arrow-right").attr("value");"0"==c&&"1"==e&&(t(".chat-box").css({left:"auto"}),t("#chat-circle").css({left:"unset"})),"1"==c&&"0"==e&&(t(".chat-box").css({left:"708px"}),t("#chat-circle").css({left:"708px"})),t("#acb_customization").click(function(){t("#acb_customization").is(":checked")?t(this).attr("value","1"):t(this).attr("value","0")}),t(".color-picker").hide(),t("#acb_customization").click(function(){t("#acb_colorPicker").toggle().css({"margin-top":"53px","margin-left":"11px"}),t(".color-picker").toggle()});var a=t("#acb_customization").attr("value");"1"==a&&(t("#acb_colorPicker").toggle().css({"margin-top":"53px","margin-left":"11px"}),t(".color-picker").toggle());var c=t("#arrow-left").attr("value"),e=t("#arrow-right").attr("value");1==c?t("#arrow-left").css({background:"#8500ff"}):1==e&&t("#arrow-right").css({background:"#8500ff"});let o=document.querySelector("#acb_colorPicker");o.addEventListener("change",a=>{t("#cbox-header").css({background:o.value})}),t("#acb_save_settings").click(function(){t("#acb_save_settings").is(":checked")?t(this).attr("value","1"):t(this).attr("value","0");var a=t("#acb_frontend").attr("value"),c=t("#acb_backend").attr("value"),e=t("#acb_position").attr("value"),r=t("#acb_customization").attr("value"),i=t("#arrow-left").attr("value"),s=t("#arrow-right").attr("value"),l={action:"acb_data_truncate",acb_frontend:a,acb_backend:c,acb_position:e,acb_customization:r,left_pos_value:i,right_pos_value:s,bg_color_value:o.value};console.log(l),t.ajax({url:acb_data_truncate.ajaxurl,data:l,type:"post",success:function(t){Swal.fire({position:"top-end",icon:"success",title:"Chat Setting saved",showConfirmButton:!1,timer:1100}),location.reload(!0)}})}),t("#chat-circle").click(function(){t(".chat-box").toggle("scale")}),t(".chat-box-toggle").click(function(){t(".chat-box").toggle("scale")})})}(jQuery);