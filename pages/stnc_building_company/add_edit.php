<?php

$building_id=isset($_GET['building_id']) ? sanitize_text_field($_GET['building_id']) : "";   
$floor_id= isset($_GET['floor_id']) ? sanitize_text_field($_GET['floor_id']) : "";   
$id=   isset($_GET['id']) ? sanitize_text_field($_GET['id']) : "";   




    $wp_stnc_map_floors =$wpdb->prefix . 'stnc_map_floors';
    $wp_stnc_map_building =$wpdb->prefix . 'stnc_map_building';
    $wp_stnc_map_floors_locations =$wpdb->prefix . 'stnc_map_floors_locations';
    




  $sql="SELECT building.name AS building_name ,floor.name as floor_name,floor.building_id,floor.scheme,floor.id AS floor_id 
 ,building.id AS building_id 
 FROM ".   $wp_stnc_map_floors." AS floor
  INNER JOIN ".$wp_stnc_map_building."  AS building  ON  building.id=%d AND floor.id = %d";

$map = $wpdb->get_row($wpdb->prepare($sql, $building_id,$floor_id));
  

//    $nextCompany= $wpdb->get_var("select building_id from " .  $wp_stnc_map_floors_locations  . " where id = (select min(id) from " .  $wp_stnc_map_floors_locations  . " where id > ".$id.")" );
//    $prevCompany= $wpdb->get_var("select building_id from " .  $wp_stnc_map_floors_locations  . " where id = (select min(id) from " .  $wp_stnc_map_floors_locations  .  " where id < ".$id.")" );

         $scheme = $map->scheme;
    
         $building_name = $map->building_name;
    
         $floor_name = $map->floor_name;

      
         $title ="Ekleme";
         $form = '<form action="/wp-admin/admin.php?page=stnc_building_company&st_trigger=store&building_id='. $_GET['building_id'] .'&floor_id='. $_GET['floor_id'] .'" method="post">';

         if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'show')) {
            $title =esc_html_e( 'Show', 'the-stnc-map' ) ;
            $form = '<form action="/wp-admin/admin.php?page=stnc_building_company&st_trigger=update&building_id='. $_GET['building_id'] .'&floor_id='. $_GET['floor_id'] .'&id='. $_GET['id'] .'" method="post">';
         }
         include ("_header-show.php");





    $door_number_permission_check="";
    $square_meters_permission_check="";
    $email_permission_check="";
    $phone_permission_check="";
    $mobile_phone_permission_check="";
    $web_site_permission_check="";
    $company_description_permission_check="";
    $address_permission_check="";

    if ($web_permission!=""){

         if ($web_permission[0]["door_number_permission"]!="" && $web_permission[0]["door_number_permission"]){
             $door_number_permission_check="checked";
         }

         if ($web_permission[0]["square_meters_permission"]!="" && $web_permission[0]["square_meters_permission"]){
             $square_meters_permission_check="checked";
         }

         if ($web_permission[0]["email_permission"]!="" && $web_permission[0]["email_permission"]){
             $email_permission_check="checked";
         }
         
         if ($web_permission[0]["phone_permission"]!="" && $web_permission[0]["phone_permission"]){
             $phone_permission_check="checked";
         }
 
         if ($web_permission[0]["mobile_phone_permission"]!="" && $web_permission[0]["mobile_phone_permission"]){
             $mobile_phone_permission_check="checked";
         }
 
         if ($web_permission[0]["web_site_permission"]!="" && $web_permission[0]["web_site_permission"]){
             $web_site_permission_check="checked";
         }
 
         if ($web_permission[0]["company_description_permission"]!="" && $web_permission[0]["company_description_permission"]){
             $company_description_permission_check="checked";
         }

         if ($web_permission[0]["address_permission"]!="" && $web_permission[0]["address_permission"]){
             $address_permission_check="checked";
         }
        
    }
    

?>

<main class="flex-shrink-0" style="margin-top:88px">
    <div class="stnc-container-fluid">
        <div> 
        <span style="color:red"><?php echo $building_name ?> / <?php  echo $floor_name ?> </span> 
        </div>

        <?php if  ($is_empty === "1") :   ?>
           <div style="font-size:20px" class="text-center alert alert-danger" role="alert"> <?php esc_html_e( 'THIS OFFICE IS EMPTY', 'the-stnc-map' ) ?></div>
         <?php endif ; ?>

        <?php
                if (isset($_SESSION['stnc_map_flash_msg'] )) {
                ?>
        <p class="alert alert-success">
            <?php echo $_SESSION['stnc_map_flash_msg']; ?>
        </p>
        <?php unset($_SESSION['stnc_map_flash_msg']); ?>
        <?php } ?>

        <?php echo $form  ?>

        <?php if  ($is_empty === "1") :   ?>
            <input type="hidden" name="office_empty" value="1" >
         <?php endif ; ?>
         <input type="hidden" name="floor_id" value="<?php echo  isset($_GET["floor_id"])?>" >
         <input type="hidden" value="<?php echo $media_id ?>" name="media_id" id="media_id">
                    <input type="hidden" value="<?php echo $floors_locations_id ?>" name="floors_locations_id" id="floors_locations_id">
        <div class="stnc-row">

            <div class="stnc-col-4">

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title"> <?php esc_html_e( 'Company Add', 'the-stnc-map' ) ?></h5>


                        <div class="form-group">
                            <label for="door_number"><strong><?php esc_html_e( 'Door number', 'the-stnc-map' ) ?></strong> </label>
                            
                            <input type="number" name="door_number" value="<?php echo $door_number ?>"
                                class="form-control" id="door_number" min="1" max="100">
                            <small id="kat_numarasiHelp" class="form-text text-muted"> <?php esc_html_e( 'Floor number must be numeric', 'the-stnc-map' ) ?></small>
                            <br>
                         <input type="checkbox" class="permission_check" <?php  echo  $door_number_permission_check?>  id="door_number_permission">  <?php esc_html_e( 'Do not show on web frontend', 'the-stnc-map' ) ?>
 
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="company_name"><strong> <?php esc_html_e( 'Company Name', 'the-stnc-map' ) ?></strong> </label>
                            <input type="text" name="company_name" value="<?php echo $company_name ?>" class="form-control" id="company_name" min="1" max="50">
                           
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="square_meters"> <strong> <?php esc_html_e( 'Building square meters', 'the-stnc-map' ) ?></strong> </label>
                            <input type="text" name="square_meters" value="<?php echo $square_meters ?>"  class="form-control" id="square_meters" min="1" max="50">
                         
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="company_category_id"> <strong><?php esc_html_e( 'Company Categories', 'the-stnc-map' ) ?></strong> </label>
                              <select name="company_category_id">
                                    <?php foreach ($categoriesList as $categories) : ?>
                                        <option  <?php if ($categories->id == $company_category_id) echo 'selected'; ?> value="<?php echo $categories->id ?>">
                                        <?php echo $categories->name ?></option>
                                   <?php endforeach ?>
                            </select>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="email"> <strong><?php esc_html_e( 'Company email address', 'the-stnc-map' ) ?></strong> </label>
                            <input type="text" name="email" value="<?php echo $email ?>" class="form-control" id="email">
                            <input type="checkbox" class="permission_check"  <?php  echo  $email_permission_check?>  id="email_permission"> 
                            <?php esc_html_e( 'Do not show on web frontend', 'the-stnc-map' ) ?>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="phone"> <strong> <?php esc_html_e( 'Company phone', 'the-stnc-map' ) ?></strong> </label>
                            <input type="text" name="phone" value="<?php echo $phone ?>" class="form-control" id="phone">
                            <input type="checkbox" class="permission_check"  <?php  echo  $phone_permission_check?>   id="phone_permission">
                            <?php esc_html_e( 'Do not show on web frontend', 'the-stnc-map' ) ?>
                        </div>

                    </div>
                </div>

            </div>

            <div class="stnc-col-4">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="mobile_phone"> <strong> <?php esc_html_e( 'Company mobile phone', 'the-stnc-map' ) ?></strong> </label>
                            <input type="text" name="mobile_phone" value="<?php echo $mobile_phone ?>"
                                class="form-control" id="mobile_phone">
                                <input type="checkbox" class="permission_check" <?php  echo  $mobile_phone_permission_check?>   id="mobile_phone_permission"> <?php esc_html_e( 'Do not show on web frontend', 'the-stnc-map' ) ?>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="web_site"> <strong> <?php esc_html_e( 'Company website', 'the-stnc-map' ) ?></strong>  </label>
                            <input type="text" name="web_site" value="<?php echo $web_site ?>" class="form-control" id="web_site">
                            <input type="checkbox" class="permission_check" <?php  echo  $web_site_permission_check?>   id="web_site_permission"> <?php esc_html_e( 'Do not show on web frontend', 'the-stnc-map' ) ?>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="company_description"> <strong> <?php esc_html_e( 'Detailed information about the company', 'the-stnc-map' ) ?></strong> </label>
                            <textarea class="form-control" name="company_description" id="company_description"
                                rows="3"><?php echo $company_description ?></textarea>
                                <input type="checkbox" class="permission_check" <?php  echo  $company_description_permission_check?>   id="company_description_permission">  <?php esc_html_e( 'Do not show on web frontend', 'the-stnc-map' ) ?>
                        </div>

                        <hr>
                        <div class="form-group">
                            <label for="address"><strong><?php esc_html_e( 'Address', 'the-stnc-map' ) ?></strong></label>

                            <textarea class="form-control" name="address" id="address" rows="3"><?php echo $address ?></textarea>
                            <input type="checkbox" class="permission_check" <?php  echo  $address_permission_check?>   id="address_permission"> <?php esc_html_e( 'Do not show on web frontend', 'the-stnc-map' ) ?>
                        </div>
                        <hr>

                    </div>
                </div>
            </div>


            <div class="stnc-col-4">
      
            <br>
                    <br>
                    <div class="form-group">
                           
                 
                            <input type="checkbox" class="is_show"  name="is_show" <?php  echo $is_show==0 ? 'checked' : '' ?> id="is_show"> 
                            <label for="is_show"> <strong><?php esc_html_e( 'Show company information on website', 'the-stnc-map' ) ?></strong> </label>
                        </div>
                        <br>
                        <br>
                <div class="form-group">
              
                    <input id="stnc_wp_kiosk_Metabox_video_extra"
                        class="page_upload_trigger_element button btn btn-warning"
                        name="stnc_wp_kiosk_Metabox_video_extra" type="button" value="<?php esc_html_e( 'Upload / Select Image', 'the-stnc-map' ) ?>" style="">
                  
                   <?php  if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'show')) : 
                             $image = wp_get_attachment_image_src(    $media_id  ,'full' );
                    
                    ?>
                    <div class="background_attachment_metabox_container">  <img class="img-fluid" src=" <?php echo $image[0]; ?> " alt="">  </div>
                    <?php else : ?>
                    <div class="background_attachment_metabox_container">  </div>
                    <?php endif ; ?>
                </div>
                <br>


                <?php  if ($is_empty === "0") :   ?>
                <a href="/wp-admin/admin.php?page=stnc_building_company&st_trigger=office_empty&building_id=1&floor_id=1&id=<?php echo $_GET['id']?>" class="btn btn-danger"> <?php esc_html_e( 'Vacate the Office', 'the-stnc-map' ) ?></a>
                <br>
                 <br>
                <?php endif ; ?>
             
                <!-- <a href="/wp-admin/admin.php?page=stnc_building_company&st_trigger=show&building_id=<?php echo $_GET['building_id']?>&floor_id=<?php echo $_GET['floor_id']?>&id=<?php echo $nextCompany?>" class="btn btn-warning">
                 <?php esc_html_e( 'Next Company', 'the-stnc-map' ) ?></a>


                <a href="/wp-admin/admin.php?page=stnc_building_company&st_trigger=show&building_id=<?php echo $_GET['building_id']?>&floor_id=<?php echo $_GET['floor_id']?>&id=<?php echo $prevCompany?>" class="btn btn-warning"> <?php esc_html_e( 'Previous Company', 'the-stnc-map' ) ?></a> -->

                <textarea id="web_permission" name="web_permission" style="display:none"></textarea>
<br>
<br>
<br>
                    <div class="form-group">
                     <button type="submit" value="Kaydet" id="savebtn-stncMap" class="btn btn-success"> <?php esc_html_e( 'Save', 'the-stnc-map' ) ?></button>
                     <!-- <a  href="#" id="savebtn-stncMap2" class="btn btn-primary">json</a> -->
                    </div>
            </div>
        </div>

        <?php echo   '</form>' ?>
    </div>


</main>


