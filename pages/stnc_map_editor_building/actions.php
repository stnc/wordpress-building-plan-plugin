<?php
   session_start();
 

//?page=stnc_map_editor_building&st_trigger=show&building_id=2
function stnc_wp_floor_adminMenu_stnc_map_editor_stnc()
{

    global $wpdb;

    date_default_timezone_set('Europe/Istanbul');
    $date = date('Y-m-d h:i:s');

  

    $stncForm_tableNameMain =$wpdb->prefix .'stnc_map_floors' ;
    
    if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'show')) {
 
        // $thepost = $wpdb->get_row($wpdb->prepare("SELECT *  FROM ".$stncForm_tableNameMain . "  WHERE id = %d", $_GET['kat']));
        // $name = $thepost->name;
        // $scheme_media_id = $thepost->scheme_media_id;
        // $image = wp_get_attachment_image_src($scheme_media_id  ,'thumbnail' );

         $id=$_GET['id'];

         $title =esc_html_e( 'Show', 'the-stnc-map' ) ;
        $form = '<form action="/wp-admin/admin.php?page=stnc_map_editor_building&st_trigger=update&id='. $_GET['id'] .'&teknoid='.$_GET['teknoid'].'" method="post">';

        $map = $wpdb->get_row($wpdb->prepare("SELECT *  FROM ".   $stncForm_tableNameMain." AS kat where id=%d",$id));

         $scheme = $map->scheme;
         $name  = $map->name;
         $katadi  = $map->name;

          $full_area  = $map->full_area;//dolu alan 
      
          $empty_area  = $map->empty_area;//boş 
       
          $total_area  = $map->total_area;//toplam
       
         $building_id  = $map->building_id;
 
         $scheme_media_id  = $map->scheme_media_id;
         $scheme_media_data = wp_get_attachment_image_src(    $scheme_media_id  ,'full' );

        include ('add_edit.php');
   
    }

    if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'update')) {
        $form = '<form action="/wp-admin/admin.php?page=stnc_map_editor_building&st_trigger=show&teknoid='.$_GET['teknoid'].'&id='. $_GET['id'] .'" method="post">';
 
         $name = isset($_POST["name"]) ? sanitize_text_field($_POST["name"]) : "-----";

         $scheme_media_id = isset($_POST["media_id"]) ? $_POST["media_id"] : 0;

         $full_area  = isset($_POST["full_area"]) ? $_POST["full_area"] : 0;
      
         $empty_area  = isset($_POST["empty_area"]) ? $_POST["empty_area"] : 0;
      
         $total_area  = isset($_POST["total_area"]) ? $_POST["total_area"] : 0;

        $success =   $wpdb->update(
            $wpdb->prefix .'stnc_map_floors',
            array(
                'scheme_media_id' =>  $scheme_media_id,
                'full_area' =>  $full_area,
                'empty_area' =>  $empty_area,
                'total_area' =>  $total_area,
                'name' =>   $name,
            ),
            array('id' => $_GET['id'])
        );
  

        if ($success) {
            $_SESSION['stnc_map_flash_msg'] = __( 'Record Update', 'the-stnc-map' );
            wp_redirect('/wp-admin/admin.php?page=stnc_map_editor_building&st_trigger=show&teknoid='.$_GET['teknoid'].'&id='.$_GET['id'], 302);
             die;
        } else {
            $_SESSION['stnc_map_flash_msg'] = 'There is a problem '.$success;
           wp_redirect('/wp-admin/admin.php?page=stnc_map_editor_building&st_trigger=show&teknoid='.$_GET['teknoid'].'&id='.$_GET['id'], 302);
            die("sorun");
        }
       include ('add_edit.php');
    }

/*
    if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'new')) {
        $floor_no = isset($_POST["floor_no"]) ? sanitize_text_field($_POST["floor_no"]) : "";
        $company_name = isset($_POST["company_name"]) ? sanitize_text_field($_POST["company_name"]) : "";
        $square_meters = isset($_POST["square_meters"]) ? sanitize_text_field($_POST["square_meters"]) : '';
        $email = isset($_POST["email"]) ? sanitize_text_field($_POST["email"]) : " ";
        $phone = isset($_POST["phone"]) ? sanitize_text_field($_POST["phone"]) : " ";
        $mobile_phone = isset($_POST["mobile_phone"]) ? sanitize_text_field($_POST["mobile_phone"]) : " ";
        $web_site = isset($_POST["web_site"]) ? sanitize_text_field($_POST["web_site"]) : " ";
        $map_location = isset($_POST["map_location"]) ? sanitize_text_field($_POST["map_location"]) : '{"left":12,"top":112,"width":82.42500305175781,"height":30,"x":12,"y":112,"right":94.42500305175781,"bottom":142}';
        $company_description = isset($_POST["company_description"]) ? sanitize_text_field($_POST["company_description"]) : " ";
        $address = isset($_POST["address"]) ? sanitize_text_field($_POST["address"]) : " ";
        $scheme_media_id = isset($_POST["scheme_media_id"]) ? sanitize_text_field($_POST["scheme_media_id"]) : " ";
        include ('add_edit.php');
    }



    if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'store')) {

        $door_number = isset($_POST["door_number"]) ? sanitize_text_field($_POST["door_number"]) : "0";
        $company_name = isset($_POST["company_name"]) ? sanitize_text_field($_POST["company_name"]) : " isim eklenmemiş";
        $square_meters = isset($_POST["square_meters"]) ? sanitize_text_field($_POST["square_meters"]) : 0;
        $email = isset($_POST["email"]) ? sanitize_text_field($_POST["email"]) : " ";
        $phone = isset($_POST["phone"]) ? sanitize_text_field($_POST["phone"]) : " ";
        $mobile_phone = isset($_POST["mobile_phone"]) ? sanitize_text_field($_POST["mobile_phone"]) : " ";
        $web_site = isset($_POST["web_site"]) ? sanitize_text_field($_POST["web_site"]) : " ";
        $map_location = '{"left":12,"top":112,"width":82.42500305175781,"height":30,"x":12,"y":112,"right":94.42500305175781,"bottom":142}';
        $company_description = isset($_POST["company_description"]) ? sanitize_text_field($_POST["company_description"]) : " ";
        $address = isset($_POST["address"]) ? sanitize_text_field($_POST["address"]) : " ";
        $building_id = isset($_GET["building_id"]) ? sanitize_text_field($_GET["building_id"]) : " ";
        $floor_id = isset($_GET["kat"]) ? sanitize_text_field($_GET["kat"]) : " ";
        $scheme_media_id = isset($_POST["scheme_media_id"]) ? sanitize_text_field($_POST["scheme_media_id"]) : 0;

        $success =   $wpdb->insert(
            $stncForm_tableNameMain,
            array(
                'building_id' =>   $building_id,
                'floor_id' =>   $floor_id,
                'door_number' =>   $door_number,
                'company_name' => $company_name,
                'email' =>   $email,
                'phone' =>   $phone,
                'mobile_phone' => $mobile_phone,
                'square_meters' => $square_meters,
                'web_site' =>   $web_site,
                'map_location' =>   $map_location,
                'company_description' =>   $company_description,
                'address' =>   $address,
                'scheme_media_id' =>      $scheme_media_id ,
                'add_date' =>   $date,
            ),
        );

        // echo $wpdb->last_query;
        //  die;


        if ($success) {
            $_SESSION['stnc_map_flash_msg'] = 'Kayıt Yapıldı';
            $lastid = $wpdb->insert_id;
            wp_redirect('/wp-admin/admin.php?page=stnc_building_company&building_id='.$building_id.'&floor_id='. $floor_id.'&st_trigger=show&id='. $lastid, 302);
            die;
        }

   
 
    }
*/
}