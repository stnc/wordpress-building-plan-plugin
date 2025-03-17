<?php
function stnc_wp_floor_adminMenu_stnc_building_company()
{
    // session_start();
    //  stnc_building_company
    global $wpdb;
    $stncForm_tableNameMain =$wpdb->prefix .'stnc_map_floors_locations' ;

    date_default_timezone_set('Europe/Istanbul');
    $date = date('Y-m-d h:i:s');

        //others build
        $building_id = $_GET['building_id'];
        $wp_stnc_map_floors = $wpdb->prefix . 'stnc_map_floors';
           $sql = 'SELECT * FROM ' . $wp_stnc_map_floors . ' WHERE building_id=' . $building_id ;
        $buildingsList = $wpdb->get_results($sql);


    if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'show')) {
        // session_start();
        $floorInfoData = $wpdb->get_row($wpdb->prepare("SELECT *  FROM " . $stncForm_tableNameMain . "  WHERE id = %d", $_GET['id']));
        $door_number = $floorInfoData->door_number;
        $floors_locations_id = $floorInfoData->id;
        $company_name = $floorInfoData->company_name;
        $square_meters = $floorInfoData->square_meters;
        $email =  $floorInfoData->email;
        $phone = $floorInfoData->phone;
        $mobile_phone = $floorInfoData->mobile_phone;
        $web_site = $floorInfoData->web_site;
        $map_location = $floorInfoData->map_location;
        $company_description =  $floorInfoData->company_description;
        $address =  $floorInfoData->address;
        $id =  $floorInfoData->id;
        $media_id =  $floorInfoData->media_id;
        $web_permission =  $floorInfoData->web_permission;
        $is_empty =  $floorInfoData->is_empty;
        $company_category_id =  $floorInfoData->company_category_id;
        $is_show =  $floorInfoData->is_show;
        $data =  str_replace([" ", '\\'], "", $web_permission);
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
        $office_empty = isset($_POST["office_empty"]) ? 1 : 0;//TODO : is not secure process
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
        $building_id = isset($_GET["building_id"]) ? sanitize_text_field($_GET["building_id"]) : " ";
        $floor_id = isset($_GET["floor_id"]) ? sanitize_text_field($_GET["floor_id"]) : " ";
        $media_id = isset($_POST["media_id"]) ? sanitize_text_field($_POST["media_id"]) : 0;
        $company_category_id = isset($_POST["company_category_id"]) ? sanitize_text_field($_POST["company_category_id"]) :16;
        $web_permission = isset($_POST["web_permission"]) ? $_POST["web_permission"] : '';
        $is_show = isset($_POST["is_show"]) ? 0: 1;

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
                'is_empty' =>0,//ofis bos yada dolu kontrolu 
                'is_show' =>$is_show,
            ),
            array('id' => $_GET['id'])
        );

        if ($success) {
         if  ($office_empty === 1) :  
            stnc_wp_floor_plans_send_email($door_number,$company_name,$square_meters,$email,$phone,$web_site,$map_location,$company_description,$address, $building_id, $floor_id, "added");
         endif ;
        $_SESSION['stnc_map_flash_msg'] =  __( 'Record Updated', 'the-stnc-map' );
        wp_redirect('/wp-admin/admin.php?page=stnc_building_company&st_trigger=show&building_id='.$building_id.'&floor_id='. $floor_id.'&id='.$_GET['id'], 302);
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
        $is_show = isset($_POST["is_show"]) ? 0: 1;
        $web_permission = '[{\"door_number_permission\":false,\"square_meters_permission\":false,\"email_permission\":false,\"phone_permission\":false,\"mobile_phone_permission\":false,\"web_site_permission\":false,\"company_description_permission\":false,\"address_permission\":false}]';
        $data =  str_replace([" ", '\\'], "", $web_permission);
        $web_permission =  json_decode($data, true, JSON_UNESCAPED_SLASHES);
        $is_empty = 0;
        $table=$wpdb->prefix.'stnc_building_ext_categories';
        $sql_company_list = 'SELECT * FROM ' . $table .'  WHERE status=1' ;
        $categoriesList = $wpdb->get_results($sql_company_list);
        include ('add_edit.php');
    }

    if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'store')) {
        // session_start();
        $building_id = isset($_GET["building_id"]) ? sanitize_text_field($_GET["building_id"]) : " ";
        $floor_id = isset($_GET["floor_id"]) ? sanitize_text_field($_GET["floor_id"]) : " ";

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
        $media_id = isset($_POST["media_id"]) ? sanitize_text_field($_POST["media_id"]) : 0;
        $company_category_id = isset($_POST["company_category_id"]) ? sanitize_text_field($_POST["company_category_id"]) : 16;
        $is_show = isset($_POST["is_show"]) ? 0: 1;
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
                'is_show' =>   $is_show,
                'is_empty' => 0,
            ),
        );

        if ($success) {
            $_SESSION['stnc_map_flash_msg'] =  __( 'Record Save', 'the-stnc-map' );
            $lastid = $wpdb->insert_id;
            wp_redirect('/wp-admin/admin.php?page=stnc_building_company&building_id='.$building_id.'&floor_id='. $floor_id.'&st_trigger=show&id='. $lastid, 302);
            die;
        }

    }


    if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'office_empty')) {
   
        $floorInfoData = $wpdb->get_row($wpdb->prepare("SELECT *  FROM " . $stncForm_tableNameMain . "  WHERE id = %d", $_GET['id']));

        $door_number = $floorInfoData->door_number;
        $floors_locations_id = $floorInfoData->id;
        $building_id = $floorInfoData->building_id;
        $floor_id = $floorInfoData->floor_id;
        $company_name = $floorInfoData->company_name;
        $square_meters = $floorInfoData->square_meters;
        $email =  $floorInfoData->email;
        $phone = $floorInfoData->phone;
        $mobile_phone = $floorInfoData->mobile_phone;
        $web_site = $floorInfoData->web_site;
        $map_location = $floorInfoData->map_location;
        $company_description =  $floorInfoData->company_description;
        $address =  $floorInfoData->address;
        $id =  $floorInfoData->id;
        $media_id =  $floorInfoData->media_id;
        $web_permission =  $floorInfoData->web_permission;
     

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
            stnc_wp_floor_plans_send_email($door_number,$company_name,$square_meters,$email,$phone,$web_site,$map_location,$company_description,$address, $building_id,$floor_id,"empty");
            $_SESSION['stnc_map_flash_msg'] =  __( 'Record Save', 'the-stnc-map' );
            wp_redirect('/wp-admin/admin.php?page=stnc_building_company&st_trigger=show&building_id='.$building_id.'&floor_id='. $floor_id.'&id='. $floors_locations_id, 302);
            die;
        }
    }
}