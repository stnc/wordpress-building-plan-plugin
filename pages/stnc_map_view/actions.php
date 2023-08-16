<?php
//stnc_map_view&st_trigger=show&binaid=2&kat=9
//allow redirection, even if my theme starts to send output to the browser
function stnc_wp_floor_adminMenu_stnc_map_view()
{

    global $wpdb;
    $binaId = $_GET['binaid'];
    $katId = $_GET['kat'];

    $wp_stnc_map_floors = $wpdb->prefix . 'stnc_map_floors';
    $wp_stnc_map_building = $wpdb->prefix . 'stnc_map_building';

    $map = $wpdb->get_row($wpdb->prepare("SELECT bina.name AS bina,kat.name kat_adi,kat.building_id,kat.scheme,bina.id
      AS bina_id,kat.id AS katid ,kat.scheme_media_id,full_area,empty_area,total_area  FROM " . $wp_stnc_map_floors . " AS kat INNER JOIN " . $wp_stnc_map_building . " 
       AS bina  ON  bina.id=%d AND kat.id = %d", $binaId, $katId));
        // echo $wpdb->last_query;
        //  die;
    $scheme = $map->scheme;

    // echo '<br>';
    $binaName = $map->bina;
    $name = $map->bina;
    // echo '<br>';
    $kat_adi = $map->kat_adi;


    $full_area  = $map->full_area;//dolu alan 
    $empty_area  = $map->empty_area;//boş 
   $total_area  = $map->total_area;//toplam


    $results = array();
    $stncForm_tableNameMain = $wpdb->prefix . 'stnc_map_floors_locations';
    $sql = "SELECT * FROM " . $stncForm_tableNameMain . ' WHERE building_id=' . $binaId . ' and  floor_id=' . $katId . ' order by door_number';

    $results = $wpdb->get_results($sql);
    $i = 0;
    $top = 88;

    //others build
    $sql = 'SELECT * FROM ' . $wp_stnc_map_floors . ' WHERE building_id=' . $binaId ;


     $totalOffice = $wpdb->get_var('SELECT COUNT(*) FROM ' . $stncForm_tableNameMain . ' WHERE building_id=' . $binaId . ' and  floor_id=' . $katId  );
     $totalEmptyOffice = $wpdb->get_var('SELECT COUNT(*) FROM ' . $stncForm_tableNameMain . ' WHERE  is_empty=1 and building_id=' . $binaId . ' and  floor_id=' . $katId  );

     $totalOffice=((int)$totalOffice);
  
     $totalEmptyOffice=((int)$totalEmptyOffice);
   
     $totalFullOffice= $totalOffice- $totalEmptyOffice;
  



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

