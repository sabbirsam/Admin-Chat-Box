(function ($) {
    $(document).ready(function () {
        
     /**
     * Show the chat box open
     */
        /**
         * Chat open and close
         */

        $("#chat-circle").click(function() {
            localStorage.setItem('acb_scale', 'active');    
        });

        // localStorage.setItem('scale', 1);
        // console.log(localStorage.getItem("scale"));
        // localStorage.removeItem('scale');
        // let cartItems = localStorage.getItem("productsInCart");
        // var jsonString = JSON.stringify(cartItems);

        $(".chat-box-toggle").click(function() {
            localStorage.setItem('acb_scale', 'inactive');

        });

        let scaleItems = localStorage.getItem("acb_scale");
        console.log(scaleItems);

        if(scaleItems == "active"){
            document.getElementById("sam").style.display = 'block';
        }
        else{
            document.getElementById("sam").style.display = 'none';
        }  

    });
})(jQuery);


