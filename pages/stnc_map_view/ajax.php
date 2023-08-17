<?php
//bunu haritada konum kaydederken  kullaniyor , plaindraggle.js  

function stnc_wp_floor_stncStatus_ajax_request() {



    $nonce = $_POST['nonce'];
    if ( ! wp_verify_nonce( $nonce, 'stnc-kiosk-ajax-script' ) ) {
        die( 'Nonce value cannot be verified.' );
    }
   // wp_send_json_success( 'It works' );
   global $wpdb;
   $id = $_POST['id'];

   $jsonText =$_POST['location'];

  $stncForm_tableNameMain = $wpdb->prefix . 'stnc_map_floors_locations';

  $success= $wpdb->update( $stncForm_tableNameMain, array('map_location'=>$jsonText), array('id'=>$id));



   die;
}

add_action( 'wp_ajax_stnc_wp_floor_stncStatus_ajax_request', 'stnc_wp_floor_stncStatus_ajax_request' );
 
// If you wanted to also use the function for non-logged in users (in a theme for example)
add_action( 'wp_ajax_nopriv_stnc_wp_floor_stncStatus_ajax_request', 'stnc_wp_floor_stncStatus_ajax_request' );