<?php

namespace ACB\Inc\Ajax_Parts;
use \ACB\Inc\ACB_BaseController;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

class ACB_MessageCreation {

    public function __construct() {
        /**
         * Demo tets
         */
        $this->ACB_message_creation();
       
    }

    /**
     * delete
     */
    public function ACB_message_creation() {
            //SELECT * FROM  wp_users WHERE user_email = 'msa.sabbir.ahmed.official@gmail.com'
            global $wpdb;
            $wpdb->hide_errors();
            $table=$wpdb->prefix. 'acb_admin_chat_box';
            $usr=$wpdb->prefix. 'users';
            $fetch= $wpdb->get_results("SELECT * FROM  $table ORDER BY id DESC"); 

            // print_r ($fetch);
            foreach ($fetch as $result){
                // echo $result->email;
                $email1 = $result->email; 
            }

            // $email1 = $result->email; //just use email from the obj of above using foreach
            // echo $email1;

            
            $msg = $result->msg;
            $time = $result->time;
            $date = $result->date;
            

            $match_res = $wpdb->get_results("SELECT * FROM  $usr WHERE user_email = '".$email1."'");
            // print_r ($match_res); // show all the obj data, now just use below foreach and show
            // print_r ($match_res);
            foreach ($match_res as $obj){  
                // echo $obj->user_email; 
            }

            
            echo $obj->user_email."<br>";
            echo $obj->display_name."<br>";
            echo $msg;
            echo $time;
            echo $date;
           
            

// apatoto lagse na ------------------------------------------------------------------------------------------
            // $userData = mysqli_fetch_array($wpdb->get_results("SELECT * FROM  $usr WHERE user_email = '".$f['email']."'"));
            // $userData = $wpdb->get_results("SELECT * FROM  $usr");
           

            // [This or below ]
            
            // foreach ($userData as $obj){
            //     // echo $obj->user_email;
            // }



            // $userData_array = json_encode($userData);
            // $get_userData = json_decode($userData_array,true);
            // // print_r($php_array);
            // foreach($get_userData as $key => $value){
            //     echo $value['user_email'];
            // }
 // apatoto lagse na ------------------------------------------------------------------------------------------


//  $admin_cb_db_mail = array();
//  $admin_users_email = array();

//  foreach ($fetch as $row) {
//   // print_r($row->email);
//   // array_push($admin_cb_db_mail, array('mail' => $row [1]));
//       array_push($admin_cb_db_mail, $row->email);
//   }
//   // echo json_encode(array("result" => $admin_cb_db_mail));
//   print_r( $admin_cb_db_mail);


//   $userData = $wpdb->get_results("SELECT * FROM  $usr");
//   //$admin_users_email = array();
//   foreach ($userData as $m) {                  
//       // array_push($admin_users_email, array('user_email' => $m->user_email)); 
//       array_push($admin_users_email,  $m->user_email); 
//   }
//   // echo json_encode(array("alq" =>$admin_users_email));
//   print_r( $admin_users_email);







            while($f=mysqli_fetch_array($fetch)){
                $userData = mysqli_fetch_array($wpdb->get_results("SELECT * FROM  $usr WHERE user_email = '".$f['email']."'"));
                // $userData = mysqli_fetch_array($wpdb->get_results("SELECT * FROM  $usr WHERE user_email = '".$f['email']."'"));
                // print_r($userData);
                // print_r($userData);

                            ?>
<span class="nick" style="color: black"> <?php echo $result['sender'];?> </span>: <span
    class="msg"><?php echo $result['msg']."<br>";?><span
        style="font-size:10px;color:rgba(89,255,0,1.00);"><br><?php echo $result['time']." | ". $result['date']."<br>";?></span></span><br />
<?php
                    } 


        
            

            while($f=mysqli_fetch_array($fetch)){
                $userData = mysqli_fetch_array($wpdb->get_results("SELECT * FROM  $usr WHERE user_email = '".$f['email']."'"));
                // print_r($userData);

                
                            ?>
<span class="nick" style="color: black"> <?php echo $f['sender'];?> </span>: <span
    class="msg"><?php echo $f['msg']."<br>";?><span
        style="font-size:10px;color:rgba(89,255,0,1.00);"><br><?php echo $f['time']." | ". $f['date']."<br>";?></span></span><br /> <?php
                    } 
    }

}


// ======================

//SELECT * FROM  wp_users WHERE user_email = 'msa.sabbir.ahmed.official@gmail.com'
global $wpdb;
$wpdb->hide_errors();
$table=$wpdb->prefix. 'acb_admin_chat_box';
$usr=$wpdb->prefix. 'users';
// $fetch= $wpdb->get_results("SELECT * FROM  $table ORDER BY id DESC"); 
// $fetch= $wpdb->get_results("SELECT * FROM  $table ORDER BY id DESC", ARRAY_N ); 
$fetch= $wpdb->get_results("SELECT * FROM  $table ORDER BY id DESC" ); 
// print_r ($fetch);



// foreach ($fetch as $result){
//     // echo $result->email;
//     $email1 = $result->email; 
// }

// $email1 = $result->email; //just use email from the obj of above using foreach
// echo $email1;


// $msg = $result->msg;
// $time = $result->time;
// $date = $result->date;


// $match_res = $wpdb->get_results("SELECT * FROM  $usr WHERE user_email = '".$email1."'");


// print_r ($match_res); // show all the obj data, now just use below foreach and show
// print_r ($match_res);
// foreach ($match_res as $obj){  
//     // echo $obj->user_email; 
// }


// echo $obj->user_email."<br>";
// echo $obj->display_name."<br>";
// echo $msg;
// echo $time;
// echo $date;



// apatoto lagse na ------------------------------------------------------------------------------------------
// $userData = mysqli_fetch_array($wpdb->get_results("SELECT * FROM  $usr WHERE user_email = '".$f['email']."'"));
// $userData = $wpdb->get_results("SELECT * FROM  $usr");


// [This or below ]

// foreach ($userData as $obj){
//     // echo $obj->user_email;
// }



// $userData_array = json_encode($userData);
// $get_userData = json_decode($userData_array,true);
// // print_r($php_array);
// foreach($get_userData as $key => $value){
//     echo $value['user_email'];
// }
// apatoto lagse na ------------------------------------------------------------------------------------------






   $admin_cb_db_mail = array();
   $admin_users_email = array();

   foreach ($fetch as $row) {
    // print_r($row->email);
    // array_push($admin_cb_db_mail, array('mail' => $row [1]));
        array_push($admin_cb_db_mail, $row->email);
    }
    // echo json_encode(array("result" => $admin_cb_db_mail));
    // print_r( $admin_cb_db_mail);


    $userData = $wpdb->get_results("SELECT * FROM  $usr");
    //$admin_users_email = array();
    foreach ($userData as $m) {                  
        // array_push($admin_users_email, array('user_email' => $m->user_email)); 
        array_push($admin_users_email,  $m->user_email); 
    }
    // echo json_encode(array("alq" =>$admin_users_email));
    // print_r( $admin_users_email);


    foreach ($fetch as $row) {
    ?>
<span class="nick" style="color: black"> <?php echo $row->sender ?> </span>: <span class="msg"><?php echo $row->msg ?>
    <br><span style="font-size:10px;color:black;"><br> <?php echo $row->date ?>
        <br></span></span><br />
<?php
    }       

// }

// }