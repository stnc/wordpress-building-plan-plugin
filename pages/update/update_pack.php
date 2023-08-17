<?php
function stnc_wp_floor_plans_adminMenu_update()
{
  global $wpdb; 

  $stncForm_tableNameMain = 'stnc_map_floors_locations';

  $sql = " ALTER TABLE  " . $wpdb->prefix ."stnc_map_floors DROP web_permission";
  @$wpdb->query( $sql );

  $sql = " ALTER TABLE  " . $wpdb->prefix ."stnc_map_floors DROP is_empty";
  @$wpdb->query( $sql );

  $sql = " ALTER TABLE " . $wpdb->prefix . $stncForm_tableNameMain . " ADD is_show TINYINT(1)  NULL DEFAULT '1' AFTER status ";
  @$wpdb->query( $sql );

  echo "Guncelleme Basari ile Yapildi ";

}
