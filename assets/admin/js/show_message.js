!function(n){n(document).ready(function(){var a={action:"show_user_inputed_data",nonce:n("#msg").attr("data-nonce")};function t(){n.ajax({data:a,type:"GET",url:show_user_inputed_data.ajaxurl,success:function(a){n("#vegan").html(a)}})}console.log(a),t(),setInterval(t,1e3),window.onload=function(){document.getElementById("sam").style.display="block"}})}(jQuery);