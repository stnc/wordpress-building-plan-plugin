<?php
function stnc_wp_floor_adminMenu_stnc_building_ext()
{
    // session_start();
    //  stnc_building_ext
    global $wpdb;
    $stncForm_tableNameMain =$wpdb->prefix .'stnc_map_floors_locations' ;

    date_default_timezone_set('Europe/Istanbul');
    $date = date('Y-m-d h:i:s');

    if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'show')) {
        // session_start();
        $thepost = $wpdb->get_row($wpdb->prepare("SELECT *  FROM " . $stncForm_tableNameMain . "  WHERE id = %d", $_GET['id']));
        $door_number = $thepost->door_number;
        $floors_locations_id = $thepost->id;
        $company_name = $thepost->company_name;
        $square_meters = $thepost->square_meters;
        $email =  $thepost->email;
        $phone = $thepost->phone;
        $mobile_phone = $thepost->mobile_phone;
        $web_site = $thepost->web_site;
        $map_location = $thepost->map_location;
        $company_description =  $thepost->company_description;
        $address =  $thepost->address;
        $id =  $thepost->id;
        $media_id =  $thepost->media_id;
        $web_permission =  $thepost->web_permission;
        $is_empty =  $thepost->is_empty;
        $company_category_id =  $thepost->company_category_id;
        $data =  str_replace([" ", '\\'], null, $web_permission);
        $web_permission =  json_decode($data, true, JSON_UNESCAPED_SLASHES);

         $table=$wpdb->prefix.'stnc_building_ext_categories';
          $sql_company_list = 'SELECT * FROM ' . $table .'  WHERE status=1' ;

        $categoriesList = $wpdb->get_results($sql_company_list);


    //   echo '<pre>';
    //   print_r(  $categoriesList);
    //   die;
        include ('add_edit.php');
    }

    if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'update')) {
        // session_start();
        $door_number = isset($_POST["door_number"]) ? sanitize_text_field($_POST["door_number"]) : "0";
        $company_name = isset($_POST["company_name"]) ? sanitize_text_field($_POST["company_name"]) : " isim eklenmemiş";
        $square_meters = isset($_POST["square_meters"]) ? sanitize_text_field($_POST["square_meters"]) : 0;
        $email = isset($_POST["email"]) ? sanitize_text_field($_POST["email"]) : " ";
        $phone = isset($_POST["phone"]) ? sanitize_text_field($_POST["phone"]) : " ";
        $mobile_phone = isset($_POST["mobile_phone"]) ? sanitize_text_field($_POST["mobile_phone"]) : " ";
        $web_site = isset($_POST["web_site"]) ? sanitize_text_field($_POST["web_site"]) : " ";
        $map_location = isset($_POST["map_location"]) ? sanitize_text_field($_POST["map_location"]) : '{"left":12,"top":112,"width":82.42500305175781,"height":30,"x":12,"y":112,"right":94.42500305175781,"bottom":142}';
        $company_description = isset($_POST["company_description"]) ? sanitize_text_field($_POST["company_description"]) : " ";
        $address = isset($_POST["address"]) ? sanitize_text_field($_POST["address"]) : " ";
        $media_id = isset($_POST["media_id"]) ? sanitize_text_field($_POST["media_id"]) : " ";
        $building_id = isset($_GET["binaid"]) ? sanitize_text_field($_GET["binaid"]) : " ";
        $floor_id = isset($_GET["kat"]) ? sanitize_text_field($_GET["kat"]) : " ";
        $media_id = isset($_POST["media_id"]) ? sanitize_text_field($_POST["media_id"]) : 0;
        $company_category_id = isset($_POST["company_category_id"]) ? sanitize_text_field($_POST["company_category_id"]) :16;
        $web_permission = isset($_POST["web_permission"]) ? $_POST["web_permission"] : '';

 /*   
        $tempData = str_replace("\\", "",  $web_permission );
        $cleanData = json_decode($tempData);
        echo '<pre>';
        print_r($cleanData);

        $cleanData1 = json_encode($tempData);
        echo '<pre>';
        print_r($cleanData1);

        // $cleanData = json_decode( $cleanData1);
        // echo '<pre>';
        // print_r($cleanData);
         die;

        // $web_permission = json_encode($web_permission);

        // // filtration
        // $web_permission = addslashes($web_permission);
*/



        $success =   $wpdb->update(
            $stncForm_tableNameMain,
            array(
                'building_id' =>  $building_id,
                'floor_id' =>  $floor_id,
                'company_category_id' =>  $company_category_id,
                'door_number' =>   $door_number,
                'company_name' => $company_name,
                'square_meters' => $square_meters,
                'email' =>   $email,
                'phone' =>   $phone,
                'mobile_phone' => $mobile_phone,
                'web_site' =>   $web_site,
                'company_description' =>   $company_description,
                'address' =>   $address,
                'media_id' =>    $media_id,
                'web_permission' =>    $web_permission,
                'add_date' =>   $date,
                'is_empty' =>0,
            ),
            array('id' => $_GET['id'])
        );

        if ($success) {
            $_SESSION['stnc_map_flash_msg'] =  esc_html_e( 'Record Updated', 'the-stnc-map' );
            wp_redirect('/wp-admin/admin.php?page=stnc_building_ext&binaid='.$building_id.'&kat='. $floor_id.'&st_trigger=show&id='.$_GET['id'], 302);
            die;
        }
        // include ('add_edit.php');
    }


    if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'new')) {
        // session_start();
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
        $media_id = isset($_POST["media_id"]) ? sanitize_text_field($_POST["media_id"]) : " ";
        $company_category_id = isset($_POST["company_category_id"]) ? sanitize_text_field($_POST["company_category_id"]) : 0;
        $web_permission = '[{\"door_number_permission\":false,\"square_meters_permission\":false,\"email_permission\":false,\"phone_permission\":false,\"mobile_phone_permission\":false,\"web_site_permission\":false,\"company_description_permission\":false,\"address_permission\":false}]';
        $data =  str_replace([" ", '\\'], null, $web_permission);
        $web_permission =  json_decode($data, true, JSON_UNESCAPED_SLASHES);
        print_r(     $web_permission);
        $is_empty = 0;
        
        include ('add_edit.php');
    }



    if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'add_save')) {
        // session_start();
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
        $building_id = isset($_GET["binaid"]) ? sanitize_text_field($_GET["binaid"]) : " ";
        $floor_id = isset($_GET["kat"]) ? sanitize_text_field($_GET["kat"]) : " ";
        $media_id = isset($_POST["media_id"]) ? sanitize_text_field($_POST["media_id"]) : 0;
        $company_category_id = isset($_POST["company_category_id"]) ? sanitize_text_field($_POST["company_category_id"]) : 16;
        $web_permission = isset($_POST["web_permission"]) ? "" : '';
// print_r(  json_decode($_POST["web_permission"], true) );
// die;


        $success =   $wpdb->insert(
            $stncForm_tableNameMain,
            array(
                'building_id' =>   $building_id,
                'floor_id' =>   $floor_id,
                'company_category_id' =>   $company_category_id,
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
                'media_id' =>      $media_id ,
                'web_permission' =>    $web_permission,
                'add_date' =>   $date,
                   'is_empty' => 0,
            ),
        );

        if ($success) {
            $_SESSION['stnc_map_flash_msg'] =  esc_html_e( 'Record Save', 'the-stnc-map' );
            $lastid = $wpdb->insert_id;
            wp_redirect('/wp-admin/admin.php?page=stnc_building_ext&binaid='.$building_id.'&kat='. $floor_id.'&st_trigger=show&id='. $lastid, 302);
            die;
        }

    }


    if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'office_empty')) {
   
        $thepost = $wpdb->get_row($wpdb->prepare("SELECT *  FROM " . $stncForm_tableNameMain . "  WHERE id = %d", $_GET['id']));

        $door_number = $thepost->door_number;
        $floors_locations_id = $thepost->id;
        $building_id = $thepost->building_id;
        $floor_id = $thepost->floor_id;
        $company_name = $thepost->company_name;
        $square_meters = $thepost->square_meters;
        $email =  $thepost->email;
        $phone = $thepost->phone;
        $mobile_phone = $thepost->mobile_phone;
        $web_site = $thepost->web_site;
        $map_location = $thepost->map_location;
        $company_description =  $thepost->company_description;
        $address =  $thepost->address;
        $id =  $thepost->id;
        $media_id =  $thepost->media_id;
        $web_permission =  $thepost->web_permission;
     

        $success =   $wpdb->insert(
            $wpdb->prefix .'stnc_map_floors_locations_off_company',
            array(
                'floors_locations_id' =>$floors_locations_id,
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
                'media_id' =>      $media_id ,
                'is_empty' =>     0 ,
                'web_permission' =>    $web_permission,
                'add_date' =>   $date,
            ),
        );


        $success =   $wpdb->update(
            $stncForm_tableNameMain,
            array(
                'door_number' =>   $door_number,
                'square_meters' => $square_meters,
                'map_location' =>   $map_location,
                'address' =>   $address,
                'company_name' =>  "",
                'email' =>    "",
                'phone' =>    "",
                'mobile_phone' =>  "",
                'web_site' =>   "",
                'company_description' =>   "",
                'media_id' =>     "",
                'web_permission' =>   '[{\"door_number_permission\":false,\"square_meters_permission\":false,\"email_permission\":false,\"phone_permission\":false,\"mobile_phone_permission\":false,\"web_site_permission\":false,\"company_description_permission\":false,\"address_permission\":false}]',
                'add_date' =>  "",
                'is_empty' => 1,
            ),
            array('id' => $floors_locations_id,)
        );
       // echo $wpdb->last_query;
    
        if ($success) {
            $_SESSION['stnc_map_flash_msg'] =  esc_html_e( 'Record Save', 'the-stnc-map' );
            wp_redirect('/wp-admin/admin.php?page=stnc_building_ext&st_trigger=show&binaid='.$building_id.'&kat='. $floor_id.'&id='. $floors_locations_id, 302);
            die;
        }
    }
}