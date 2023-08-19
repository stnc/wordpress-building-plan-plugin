<?php

// function stnc_wp_floor_email_building_info($door_number,$company_name,$square_meters,$email,$phone,$web_site,$map_location,$company_description,$address){

  global $wpdb;
  $wp_stnc_map_floors =$wpdb->prefix .'stnc_map_floors' ;
  $wp_stnc_map_building =$wpdb->prefix .'stnc_map_building' ;
  $mapJoinData = $wpdb->get_row($wpdb->prepare("SELECT bina.name AS bina,kat.name build_name,kat.building_id,kat.scheme,bina.id
    AS bina_id,kat.id AS floor_id ,kat.scheme_media_id,full_area,empty_area,total_area  FROM " . $wp_stnc_map_floors . " AS kat INNER JOIN " . $wp_stnc_map_building . " 
     AS bina  ON  bina.id=%d AND kat.id = %d", $building_id,$floor_id));
     $binaName = $mapJoinData->bina;
     $build_name = $mapJoinData->build_name;

?>

<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; width: 100%;" width="100%">
<tbody>
  <tr>
    <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;" valign="top">
      <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
        <tbody>
          <tr>
            <td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border-bottom:solid #000 1px " valign="top" align="right" >  <?php esc_html_e( 'Building and Floor Information', 'the-stnc-map' ) ?> </td>
            <td style="border-bottom:solid #000 1px"> => </td>

            <td style="font-family: sans-serif; font-size: 15px; vertical-align: top;  text-align: center; padding:10px; color:#000;border-bottom:solid #000 1px" valign="top" align="left" >  <?php echo    $binaName?> / <?php echo    $build_name?> </td>
         
            <td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px; color:#000 ; border-left:solid #000 1px;border-bottom:solid #000 1px " valign="top" align="center" >  <?php esc_html_e( 'Door number', 'the-stnc-map' ) ?> </td>
            <td style="border-bottom:solid #000 1px"> => </td>
            <td style="font-family: sans-serif; font-size: 16px; vertical-align: top;  text-align: center; padding:10px; color:#000;border-bottom:solid #000 1px  " valign="top" align="left" >  <?php echo    $door_number?> </td>
            
          </tr>

          <tr>
            <td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border-bottom:solid #000 1px " valign="top" align="right" >  <?php esc_html_e( 'Company Name', 'the-stnc-map' ) ?> </td>
            <td style="border-bottom:solid #000 1px"> => </td>

            <td style="font-family: sans-serif; font-size: 16px; vertical-align: top;  text-align: center; padding:10px; color:#000;border-bottom:solid #000 1px" valign="top" align="left" >   <?php echo    $company_name?> </td>

            <td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px; color:#000 ; border-left:solid #000 1px;border-bottom:solid #000 1px " valign="top" align="center" > <?php esc_html_e( 'Building square meters', 'the-stnc-map' ) ?> </td>
            <td style="border-bottom:solid #000 1px"> => </td>
            <td style="font-family: sans-serif; font-size: 16px; vertical-align: top;  text-align: center; padding:10px; color:#000;border-bottom:solid #000 1px  " valign="top" align="left" >  <?php echo    $square_meters?>  </td>
          </tr>
  

          <tr>
            <td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border-bottom:solid #000 1px " valign="top" align="right" > <?php esc_html_e( 'Company email address', 'the-stnc-map' ) ?> </td>
            <td style="border-bottom:solid #000 1px"> => </td>

            <td style="font-family: sans-serif; font-size: 16px; vertical-align: top;  text-align: center; padding:10px; color:#000;border-bottom:solid #000 1px" valign="top" align="left" ><?php echo    $email?></td>

            <td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px; color:#000 ; border-left:solid #000 1px;border-bottom:solid #000 1px " valign="top" align="center" > <?php esc_html_e( 'Company phone', 'the-stnc-map' ) ?> </td>
            <td style="border-bottom:solid #000 1px"> => </td>
            <td style="font-family: sans-serif; font-size: 16px; vertical-align: top;  text-align: center; padding:10px; color:#000;border-bottom:solid #000 1px  " valign="top" align="left" >  <?php echo    $phone?> </td>
          </tr>

  
          <tr>
            <td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border-bottom:solid #000 1px " valign="top" align="right" > <?php esc_html_e( 'Company website', 'the-stnc-map' ) ?> </td>
            <td style="border-bottom:solid #000 1px"> => </td>

            <td style="font-family: sans-serif; font-size: 16px; vertical-align: top;  text-align: center; padding:10px; color:#000;border-bottom:solid #000 1px" valign="top" align="left" > <?php echo    $web_site?></td>

            <td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px; color:#000 ; border-left:solid #000 1px;border-bottom:solid #000 1px " valign="top" align="center" > <?php esc_html_e( 'Detailed information about the company', 'the-stnc-map' ) ?> </td>
            <td style="border-bottom:solid #000 1px"> => </td>
            <td style="font-family: sans-serif; font-size: 16px; vertical-align: top;  text-align: center; padding:10px; color:#000;border-bottom:solid #000 1px  " valign="top" align="left" >  <?php echo    $company_description?> </td>
          </tr>

        </tbody>
      </table>



          <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
        <tbody>
        <tr>
            <td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;" valign="top" align="right" > <?php esc_html_e( 'Address', 'the-stnc-map' ) ?> </td>
          

            <td style="font-family: sans-serif; font-size: 16px; vertical-align: top;  text-align: center; padding:10px; color:#000;" valign="top" align="left" > <?php echo    $address?></td>

     
          </tr>
        </tbody>
      </table>



    </td>
  </tr>
</tbody>
</table>
<?php
// global $wpdb;
// $floorInfoData = $wpdb->get_row($wpdb->prepare("SELECT *  FROM " . $wpdb->prefix ."stnc_map_floors_locations WHERE id = %d", 73));

// $door_number = $floorInfoData->door_number;
// $floors_locations_id = $floorInfoData->id;
// $company_name = $floorInfoData->company_name;
// $square_meters = $floorInfoData->square_meters;
// $email =  $floorInfoData->email;
// $phone = $floorInfoData->phone;
// $mobile_phone = $floorInfoData->mobile_phone;
// $web_site = $floorInfoData->web_site;
// $map_location = $floorInfoData->map_location;
// $company_description =  $floorInfoData->company_description;
// $address =  $floorInfoData->address;
// $id =  $floorInfoData->id;
// $media_id =  $floorInfoData->media_id;
// $web_permission =  $floorInfoData->web_permission;
//  $buildingID =  $floorInfoData->building_id;
//  $floorID =  $floorInfoData->floor_id;

// $wp_stnc_map_floors = $wpdb->prefix . 'stnc_map_floors';
// $wp_stnc_map_building = $wpdb->prefix . 'stnc_map_building';

// $mapJoinData = $wpdb->get_row($wpdb->prepare("SELECT bina.name AS bina,kat.name build_name,kat.building_id,kat.scheme,bina.id
//   AS bina_id,kat.id AS floor_id ,kat.scheme_media_id,full_area,empty_area,total_area  FROM " . $wp_stnc_map_floors . " AS kat INNER JOIN " . $wp_stnc_map_building . " 
//    AS bina  ON  bina.id=%d AND kat.id = %d", $buildingID, $floorID));
//    $binaName = $mapJoinData->bina;
//    $build_name = $mapJoinData->build_name;


// }
