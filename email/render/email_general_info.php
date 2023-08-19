<?php
	global $wpdb;
    $stncForm_tableNameMain =$wpdb->prefix .'stnc_map_building' ;
    $sql = "SELECT * FROM " .   $stncForm_tableNameMain ;
    $buildingsList = $wpdb->get_results($sql);
?>        
<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; width: 100%;" width="100%">
<caption style="background-color: #fa6400;
  border: 1px solid transparent;
  border-radius: 3px;
  box-shadow: rgba(255, 255, 255, .4) 0 1px 0 0 inset;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: block;
  font-size: 20px;
  text-aligin:center;
  font-weight: 400;
  line-height: 1.15385;

  outline: none;
  padding: 8px .8em;
  position: relative;
  text-align: center;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: baseline;
  white-space: nowrap;">GENEL BILGI</caption>
<tbody>
  <tr>
    <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;" valign="top">
      <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width:100%;">
	  <thead>
		<tr>

    <th style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border:solid #000 1px " valign="top" align="right" scope="col" scope="col"> </th>

    <th style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border:solid #000 1px " valign="top" align="right" scope="col" scope="col">Doluluk </th>

    <th style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border:solid #000 1px " valign="top" align="right" scope="col" scope="col"><?php esc_html_e( 'Total Office', 'the-stnc-map' ) ?> </th>

    <th style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border:solid #000 1px " valign="top" align="right" scope="col" scope="col"><?php esc_html_e( 'Empty Office', 'the-stnc-map' ) ?> </th>

    <th style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border:solid #000 1px " valign="top" align="right" scope="col" scope="col"><?php esc_html_e( 'Full Office', 'the-stnc-map' ) ?> </th>


		</tr>
	</thead>
	  <tbody>
    <?php
			foreach ($buildingsList as $building) :

		$stncForm_tableNameMain =$wpdb->prefix .'stnc_map_floors_locations' ;

		$totalOffice = $wpdb->get_var('SELECT COUNT(*) FROM ' . $stncForm_tableNameMain . ' WHERE building_id=' . $building->id  );

		$totalEmptyOffice = $wpdb->get_var('SELECT COUNT(*) FROM ' . $stncForm_tableNameMain . ' WHERE  is_empty=1 and building_id=' . $building->id );

		$totalOffice=((int)$totalOffice);

		$totalEmptyOffice=((int)$totalEmptyOffice);

		$totalFullOffice= $totalOffice - $totalEmptyOffice;

		$percentage =  round( $totalFullOffice /  $totalOffice * 100);
		?>     
		<tr>
			<td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border:solid #000 1px " valign="top" align="right" > <?php echo $building->short_name ?>. Bina </td>

			<td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border:solid #000 1px " valign="top" align="right"> % <?php echo $percentage?> Dolu </td>


			<td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border:solid #000 1px " valign="top" align="right"> <?php echo $totalOffice?>  </td>

      <td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border:solid #000 1px " valign="top" align="right"> <?php echo $totalEmptyOffice?> </td>


      <td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border:solid #000 1px " valign="top" align="right"> <?php echo $totalFullOffice?> </td>

		</tr>
    <?php endforeach ?>
        </tbody>
      </table>
    </td>
  </tr>
</tbody>
</table>


