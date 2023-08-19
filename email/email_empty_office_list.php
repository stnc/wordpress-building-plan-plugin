<?php

function stnc_wp_floor_email_empty_office_list(){
    global $wpdb;
    $stnc_map_building =$wpdb->prefix .'stnc_map_building' ;
    $stnc_map_floors =$wpdb->prefix .'stnc_map_floors' ;
    $stnc_map_floors_locations =$wpdb->prefix .'stnc_map_floors_locations' ;
//   echo   $sql = " SELECT build.name AS build,floor.name as floorName,floor.building_id,loc.door_number FROM ".$stnc_map_floors." AS floor INNER JOIN ". $stnc_map_building." AS build INNER JOIN ".$stnc_map_floors_locations." AS loc WHERE loc.is_empty=1 and loc.building_id=floor.id and loc.floor_id=build.id " ;



  $sql = "SELECT loc.id,  loc.building_id ,loc.floor_id, build.name AS build,floors.name as floorName,floors.building_id,loc.door_number,CONCAT(build.name , '- ', floors.name) as  bina 
  FROM ".$stnc_map_floors_locations." AS loc INNER JOIN ". $stnc_map_building." AS build ON loc.building_id=build.id 
  INNER JOIN ".$stnc_map_floors." AS floors ON loc.floor_id=floors.id and loc.is_empty=1" ;
    $emptyBuildingsList = $wpdb->get_results($sql);
?>        





<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; width: 100%;" width="100%">
<caption style="font-family: sans-serif; font-size: 14px; vertical-align: center; padding-bottom: 15px; text-align:center">Bos Ofisler</caption>
<tbody>
  <tr>
    <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;" valign="top">
      <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
	  <thead>
		<tr>
			<th style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border:solid #000 1px " valign="top" align="right" scope="col">Bina / Kat </th>
			<th style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border:solid #000 1px " valign="top" align="right" scope="col">Ofis Numarasi</th>
			<th style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border:solid #000 1px " valign="top" align="right" scope="col">Goster</th>
		</tr>
	</thead>
	  <tbody>
	  <?php foreach ($emptyBuildingsList as $building) : ?>        
		<tr>
			<td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border:solid #000 1px " valign="top" align="right" >  <?php echo $building->build ?> / <?php echo $building->floorName ?></td>
			<td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border:solid #000 1px " valign="top" align="right" ><?php echo $building->door_number ?></td>
			<td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border:solid #000 1px " valign="top" align="right" > <a href="https://erciyesteknopark.com/wp-admin/admin.php?page=stnc_building_company&st_trigger=show&building_id=<?php echo $building->building_id ?>&floor_id=<?php echo $building->floor_id ?>&id=<?php echo $building->id ?>"></a>  <?php echo $building->door_number ?></td>
		</tr>
    <?php endforeach ?>
        </tbody>
      </table>
    </td>
  </tr>
</tbody>
</table>

<?php

}
