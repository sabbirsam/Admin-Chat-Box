<?php 
if ( is_user_logged_in() ) {
    
    $user = wp_get_current_user();

    $email = $user->user_email;
    $name = $user->display_name; 
    $msg =isset( $_POST['msg']) ?  $_POST['msg'] :''; 
    $date = date('Y-m-d H:i:s');
	$time = date('g:i a');


    if ($msg) {

        global $wpdb;
        $table=$wpdb->prefix. 'acb_admin_chat_box';
        $data = array('email' => $email, 'sender' => $name, 'msg' => $msg,'time' => $time,'date' => $date);
        $format = array('%s','%s','%s','%s','%s');
        $wpdb->insert($table,$data,$format);
        $save = $wpdb->insert_id;
        
    }

  
    
    ?>
<div align="center"><br />
    <span class="heading">Welcome to Chat Box</span><br />
    <?php 
   
?>
    <br /><br />
    <br />

    <div id="chat-circle" class="btn btn-raised">
        <div id="chat-overlay"></div>
        <i class="material-icons">▶Snap</i>
    </div>

    <div class="chat-box" id="sam">
        <div class="chat-box-header">
            <span class="chat-box-toggles"><i
                    class="material-icons"><?php echo "Welcome ".$user->display_name?></i></span>
            <span class="chat-box-toggle">X</span>
        </div>
        <div class="chat-box-body" id="vegan">
            <div class="chat-box-overlay">
            </div>
            <div class="chat-logs">

            </div>
            <!--chat-log -->
        </div>
        <form method="post" action="" id="acb_Form">
            <form method="post" action="" id="acb_Form">
                <div class="chat-input">

                    <!-- <input type="text" id="chat-input" placeholder="Send a message..."/> -->
                    <input name="msg" id="msg" class="fields" type="text" placeholder="Enter Your Message"
                        required="required" style="height:50px;" size="60" />
                    <input type="submit" value="▶" class="commandButton chat-submit" style="height:54px;" />
            </form>
    </div>
</div>

</div>
<?php
}
else {
?>
<div align="center"><br />
    <span class="heading">Sorry need to login on the admin account</span><br />
    <br /><br />
    <br />
    <form method="post" action="">
        <table class="table" cellpadding="4" cellspacing="4">
            <tr>
                <td align="center" colspan="2" class="tableHead">User Login</td>
            </tr>
            <tr>
                <td align="center" class="info" colspan="2"></td>
            </tr>
            <tr>
                <td class="labels">Email ID : </td>
                <td><input type="email" name="email" class="fields" size="30" required="required"
                        placeholder="Enter Email ID" /></td>
            </tr>
            <tr>
                <td class="labels">Password : </td>
                <td><input type="password" name="password" class="fields" size="30" required="required"
                        placeholder="Enter Password" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Login" class="commandButton" /></td>
            </tr>
        </table>
    </form>
    <?php
}
?>