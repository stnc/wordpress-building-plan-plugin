<?php

function stnc_wp_floor_database_install1()
{
    global $wpdb; 

    $stncForm_tableNameMain = 'stnc_map_floors_locations';

    $charset_collate = $wpdb->get_charset_collate();
     $sql = "CREATE TABLE IF NOT EXISTS  " . $wpdb->prefix . $stncForm_tableNameMain . " (
            id INT NOT NULL AUTO_INCREMENT,
            building_id TINYINT DEFAULT NULL,
            floor_id TINYINT DEFAULT NULL,  
            company_category_id TINYINT DEFAULT NULL,  
            door_number TINYINT DEFAULT NULL,
            company_name varchar(255) DEFAULT NULL,
            square_meters varchar(255) DEFAULT NULL,
            email varchar(255) DEFAULT NULL,
            phone varchar(255) DEFAULT NULL,
            mobile_phone varchar(255) DEFAULT NULL,
            web_site varchar(255) DEFAULT NULL,
            map_location varchar(255) DEFAULT NULL,
            company_description TEXT DEFAULT NULL,
            address TEXT DEFAULT NULL,
          
            media_id INT DEFAULT NULL,
            add_date DATETIME NOT NULL,
            web_permission TEXT DEFAULT NULL,
            is_empty TINYINT(1) NULL DEFAULT '0' ,
            is_show TINYINT(1) NULL DEFAULT '0' ,
            PRIMARY KEY  (id)
        ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
     dbDelta($sql);




  

     $stncForm_tableNameMain = 'stnc_map_floors_locations_off_company';
     $charset_collate = $wpdb->get_charset_collate();
      $sql = "CREATE TABLE IF NOT EXISTS  " . $wpdb->prefix . $stncForm_tableNameMain . " (
             id INT NOT NULL AUTO_INCREMENT,
             floors_locations_id INT DEFAULT NULL,
             building_id TINYINT DEFAULT NULL,
             floor_id TINYINT DEFAULT NULL,  
             door_number TINYINT DEFAULT NULL,
             company_name varchar(255) DEFAULT NULL,
             square_meters varchar(255) DEFAULT NULL,
             email varchar(255) DEFAULT NULL,
             phone varchar(255) DEFAULT NULL,
             mobile_phone varchar(255) DEFAULT NULL,
             web_site varchar(255) DEFAULT NULL,
             map_location varchar(255) DEFAULT NULL,
             company_description TEXT DEFAULT NULL,
             address TEXT DEFAULT NULL,
             media_id INT DEFAULT NULL,
             web_permission TEXT DEFAULT NULL,
             is_empty TINYINT(1) NULL DEFAULT '0' ,
             add_date DATETIME NOT NULL,
             PRIMARY KEY  (id)
         ) $charset_collate;";
         require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);
      

     $stncForm_tableNameMain = 'stnc_map_building';
     $charset_collate = $wpdb->get_charset_collate();
      $sql = "CREATE TABLE IF NOT EXISTS  " . $wpdb->prefix . $stncForm_tableNameMain . " (
             id INT NOT NULL AUTO_INCREMENT,
             name varchar(255) DEFAULT NULL,
             short_name varchar(255) DEFAULT NULL,
             text_color varchar(255) DEFAULT NULL,
             color varchar(255) DEFAULT NULL,
             global_capacity INT(10) UNSIGNED NOT NULL,
             total_office INT(10) UNSIGNED NOT NULL,
             created_at TIMESTAMP NULL DEFAULT NULL,
             updated_at TIMESTAMP NULL DEFAULT NULL,
             PRIMARY KEY  (id)
         ) $charset_collate;";
         require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);



      $stncForm_tableNameMain = 'stnc_map_floors';
      $charset_collate = $wpdb->get_charset_collate();
       $sql = "CREATE TABLE IF NOT EXISTS  " . $wpdb->prefix . $stncForm_tableNameMain . " (
              id INT NOT NULL AUTO_INCREMENT,
              name VARCHAR(255) NOT NULL ,
              building_id INT(10) UNSIGNED NOT NULL,
              type INT(11) NOT NULL,
              full_office INT(10) UNSIGNED NOT NULL,
              empty_office INT(10) UNSIGNED NOT NULL,
              full_area DECIMAL(8,2) NOT NULL,
              empty_area DECIMAL(8,2) NOT NULL,
              total_area DECIMAL(8,2) NOT NULL,
              scheme VARCHAR(255) NOT NULL ,
              scheme_media_id int(10) DEFAULT NULL,
              created_at TIMESTAMP NULL DEFAULT NULL,
              updated_at TIMESTAMP NULL DEFAULT NULL,
              class VARCHAR(255) NULL DEFAULT NULL,
              PRIMARY KEY  (id)
          ) $charset_collate;";
          require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
       dbDelta($sql);


       $stncForm_tableNameMain = 'stnc_building_ext_categories';
       $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE IF NOT EXISTS  " . $wpdb->prefix . $stncForm_tableNameMain . " (
               id INT NOT NULL AUTO_INCREMENT,
               name VARCHAR(255) NOT NULL ,
               status TINYINT(1) NULL DEFAULT '1' ,
               PRIMARY KEY  (id)
           ) $charset_collate;";
           require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
       
        $stncForm_tableNameMain = 'stnc_map_company_categories';
        $charset_collate = $wpdb->get_charset_collate();
         $sql = "CREATE TABLE IF NOT EXISTS  " . $wpdb->prefix . $stncForm_tableNameMain . " (
                id INT NOT NULL AUTO_INCREMENT,
                name VARCHAR(255) NOT NULL ,
                status TINYINT(1) NULL DEFAULT '1' ,
                PRIMARY KEY  (id)
            ) $charset_collate;";
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
         dbDelta($sql);
        


    // echo $wpdb->last_error;
  //  INDEX `tekno_kats_building_id_foreign` (`building_id`) USING BTREE,
//	CONSTRAINT `tekno_kats_building_id_foreign` FOREIGN KEY (`building_id`) REFERENCES `summit`.`wp_stnc_map_building` (`id`) ON UPDATE RESTRICT ON DELETE CASCADE
}

register_activation_hook(__FILE__, 'stnc_wp_floor_database_install1');

add_action('admin_init', 'stnc_wp_floor_database_install1');

function stnc_wp_floor_remove_database()
{

    global $wpdb;
    // global $stncForm_tableNameMain;
    $stncForm_DeleteTableNameMain = 'stnc_map_floors_locations_old_company';
     $sql = "DROP TABLE  " . $wpdb->prefix . $stncForm_DeleteTableNameMain ;
    $wpdb->query($sql);
    //  delete_option("my_plugin_db_version");
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    die;
}

register_uninstall_hook(__FILE__, 'stnc_wp_floor_remove_database');
register_deactivation_hook(__FILE__, 'stnc_wp_floor_remove_database');


// add_action('admin_init','stncForm_remove_database');
