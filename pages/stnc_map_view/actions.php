<?php
//stnc_map_view&st_trigger=show&building_id=2&floor_id=9
//allow redirection, even if my theme starts to send output to the browser
function stnc_wp_floor_adminMenu_stnc_map_view()
{

    global $wpdb;
    $building_id = $_GET['building_id'];
    $floor_id = $_GET['floor_id'];

    $wp_stnc_map_floors = $wpdb->prefix . 'stnc_map_floors';
    $wp_stnc_map_building = $wpdb->prefix . 'stnc_map_building';

// SELECT bina.name AS bina,kat.name kat_adi,kat.building_id,kat.scheme,bina.id  AS bina_id,kat.id AS floor_id ,kat.scheme_media_id,full_area,empty_area,total_area  
    



      $sql="SELECT building.name AS building_name ,floor.name as floor_name,floor.building_id,floor.scheme,floor.id AS floor_id 
    ,building.id AS building_id ,floor.scheme_media_id,full_area,empty_area,total_area  FROM ".   $wp_stnc_map_floors." AS floor 
     INNER JOIN ".$wp_stnc_map_building."  AS building  ON  building.id=%d AND floor.id = %d";
   
   $map = $wpdb->get_row($wpdb->prepare($sql, $building_id,$floor_id));
     
    // echo $wpdb->last_query;
        //  die;


 $scheme = $map->scheme;
 
 $building_name = $map->building_name;

 $floor_name = $map->floor_name;




    $full_area  = $map->full_area;//dolu alan 
    $empty_area  = $map->empty_area;//boş 
   $total_area  = $map->total_area;//toplam


    $results = array();
    $stncForm_tableNameMain = $wpdb->prefix . 'stnc_map_floors_locations';
    $sql = "SELECT * FROM " . $stncForm_tableNameMain . ' WHERE building_id=' . $building_id . ' and  floor_id=' . $floor_id . ' order by door_number';

    $results = $wpdb->get_results($sql);
    $i = 0;
    $top = 88;




     $totalOffice = $wpdb->get_var('SELECT COUNT(*) FROM ' . $stncForm_tableNameMain . ' WHERE building_id=' . $building_id . ' and  floor_id=' . $floor_id  );
     $totalEmptyOffice = $wpdb->get_var('SELECT COUNT(*) FROM ' . $stncForm_tableNameMain . ' WHERE  is_empty=1 and building_id=' . $building_id . ' and  floor_id=' . $floor_id  );

     $totalOffice=((int)$totalOffice);
  
     $totalEmptyOffice=((int)$totalEmptyOffice);
   
     $totalFullOffice= $totalOffice- $totalEmptyOffice;
  


    //others build
        $sql = 'SELECT * FROM ' . $wp_stnc_map_floors . ' WHERE building_id=' . $building_id ;
    $buildingsList = $wpdb->get_results($sql);


    if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'show'))
    {
        include ('show.php');
    }

    if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'editor'))
    {
        include ('editor.php');
    }
}

