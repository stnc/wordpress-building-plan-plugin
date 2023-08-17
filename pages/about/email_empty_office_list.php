<?php

function stnc_wp_floor_email_empty_office_list(){
    global $wpdb;
    $stnc_map_building =$wpdb->prefix .'stnc_map_building' ;
    $stnc_map_floors =$wpdb->prefix .'stnc_map_floors' ;
    $stnc_map_floors_locations =$wpdb->prefix .'stnc_map_floors_locations' ;
//   echo   $sql = " SELECT build.name AS build,floor.name as floorName,floor.building_id,loc.door_number FROM ".$stnc_map_floors." AS floor INNER JOIN ". $stnc_map_building." AS build INNER JOIN ".$stnc_map_floors_locations." AS loc WHERE loc.is_empty=1 and loc.building_id=floor.id and loc.floor_id=build.id " ;



  $sql = "SELECT build.name AS build,floors.name as floorName,floors.building_id,loc.door_number,CONCAT(build.name , '- ', floors.name) as  bina 
  FROM ".$stnc_map_floors_locations." AS loc INNER JOIN ". $stnc_map_building." AS build ON loc.building_id=build.id 
  INNER JOIN ".$stnc_map_floors." AS floors ON loc.floor_id=floors.id and loc.is_empty=1" ;
    $emptyBuildingsList = $wpdb->get_results($sql);
?>        

<table class="dcf-table dcf-table-responsive dcf-table-bordered dcf-table-striped dcf-w-100%">
	<caption>BOS OFISLER</caption>
	<thead>
		<tr>
			<th class="dcf-txt-center" scope="col">Bina / Kat </th>
			<th class="dcf-txt-center" scope="col">Ofis Numarasi</th>
		</tr>
	</thead>
	<tbody>
    <?php foreach ($emptyBuildingsList as $building) : ?>        
		<tr>
			<td class="dcf-txt-center">  <?php echo $building->build ?> / <?php echo $building->floorName ?></td>
			<td class="dcf-txt-center"><?php echo $building->door_number ?></td>
		</tr>
    <?php endforeach ?>

	</tbody>
</table>

<?php

}
