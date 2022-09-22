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
        global $wpdb;
        $wpdb->hide_errors();
        $collate = $wpdb->get_charset_collate();

        $table=$wpdb->prefix. 'acb_admin_chat_box';

        $sql = "CREATE TABLE ".$table." (
            `id` INT(255) NOT NULL AUTO_INCREMENT,
            `email` VARCHAR(255) NOT NULL,
            `sender` LONGTEXT,
            `msg` LONGTEXT,
            time datetime DEFAULT '0000-00-00' NOT NULL,
            date datetime DEFAULT '0000-00-00' NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ".$collate."";

		require_once ABSPATH."wp-admin/includes/upgrade.php";
        dbDelta($sql);
        
    }

}