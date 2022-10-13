<?php
namespace ACB\Inc;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');
/**
 * Create Chat box database table 
 */
final class ACB_DbTables {
    private $connection;
    private $sql;
    public function __construct() {
        /**
         * Default setting value
         */
        $acb_default_options=array(
            'acb_frontend_settings'=>"0",
            'acb_backend_settings'=>"1",
            'acb_position_settings'=>"0",
            'acb_customization_settings'=>"0",
            'acb_bg_color_value_settings'=>"1",
            'acb_left_pos_value_settings'=>"0",
            'acb_right_pos_value_settings'=>"#5A5EB9",
        );

        add_option( 'acb_settings_value', json_encode($acb_default_options) );
        add_option( 'acb_scale_settings_value', 'inactive' );
        
        global $wpdb;
        $wpdb->hide_errors();
        $collate = $wpdb->get_charset_collate();

        $table=$wpdb->prefix. 'acb_admin_chat_box';

        $sql = "CREATE TABLE ".$table." (
            `id` INT(255) NOT NULL AUTO_INCREMENT,
            `data` VARCHAR(255) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ".$collate."";


        // $sql = "CREATE TABLE ".$table." (
        //     `id` INT(255) NOT NULL AUTO_INCREMENT,
        //     `email` VARCHAR(255) NOT NULL,
        //     `sender` LONGTEXT,
        //     `msg` LONGTEXT,
        //     time datetime DEFAULT '0000-00-00' NOT NULL,
        //     date datetime DEFAULT '0000-00-00' NOT NULL,
        //     PRIMARY KEY (`id`)
        // ) ENGINE=InnoDB ".$collate."";

		require_once ABSPATH."wp-admin/includes/upgrade.php";
        dbDelta($sql);
        
    }

}