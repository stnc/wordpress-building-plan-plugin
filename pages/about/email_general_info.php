<?php

function stnc_wp_floor_email_general_info(){
	global $wpdb;
    $stncForm_tableNameMain =$wpdb->prefix .'stnc_map_building' ;
    $sql = "SELECT * FROM " .   $stncForm_tableNameMain ;
    $buildingsList = $wpdb->get_results($sql);



  

?>        




<div class="dcf-overflow-x-auto" tabindex="0">
<table class="dcf-table dcf-table-bordered dcf-table-striped dcf-w-100%">
	<caption>Genel Bilgi</caption>
	<tbody>
	<thead>
		<tr>
			<th class="dcf-txt-center" scope="col"> </th>
			<th class="dcf-txt-center" scope="col">Doluluk</th>
			<th class="dcf-txt-center" scope="col"><?php esc_html_e( 'Total Office', 'the-stnc-map' ) ?></th>
			<th class="dcf-txt-center" scope="col"><?php esc_html_e( 'Empty Office', 'the-stnc-map' ) ?></th>
			<th class="dcf-txt-center" scope="col"><?php esc_html_e( 'Full Office', 'the-stnc-map' ) ?></th>
		</tr>
	</thead>
	 <?php
			foreach ($buildingsList as $building) :

		$stncForm_tableNameMain =$wpdb->prefix .'stnc_map_floors_locations' ;

		$totalOffice = $wpdb->get_var('SELECT COUNT(*) FROM ' . $stncForm_tableNameMain . ' WHERE building_id=' . $building->id  );

		$totalEmptyOffice = $wpdb->get_var('SELECT COUNT(*) FROM ' . $stncForm_tableNameMain . ' WHERE  is_empty=1 and building_id=' . $building->id );

		$totalOffice=((int)$totalOffice);

		$totalEmptyOffice=((int)$totalEmptyOffice);

		$totalFullOffice= $totalOffice - $totalEmptyOffice;

		$yuzde =  round( $totalFullOffice /  $totalOffice * 100);
		?> 
		<tr>
			<td class="dcf-txt-center" style="font-weight:bold"><?php echo $building->short_name ?>. Bina </td>
			<td>% <?php echo $yuzde?> Dolu</td>
			<td><?php echo $totalOffice?>   </td>
			<td><?php echo $totalEmptyOffice?></td>
			<td><?php echo $totalFullOffice?></td>

		</tr>

		<?php endforeach ?>


	</tbody>
</table></div>



<?php

}
