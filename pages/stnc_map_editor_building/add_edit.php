<?php include("_header-show.php") ?>
<main class="flex-shrink-0" style="margin-top:88px">
  <div class="stnc-container-fluid"> 
    <?php if (isset($_SESSION['stnc_map_flash_msg'] )) { ?> <p class="alert alert-success"> <?php echo $_SESSION['stnc_map_flash_msg']; ?> 
    </p> <?php unset($_SESSION['stnc_map_flash_msg']); ?> <?php } ?> <div>
      <span style="color:red"> <?php echo $building_id ?>. <?php esc_html_e( 'Building', 'the-stnc-map' ) ?> / <?php echo $katadi ?>
    </div> <?php echo $form  ?> <div class="stnc-row">
      <div class="stnc-col-4">
        <div class="form-group">
        
          <input type="hidden" value="<?php echo $id ?>" name="id" id="id">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">  <?php esc_html_e( 'Company', 'the-stnc-map' ) ?> <?php  echo $title?> </h5>
              <div class="form-group">
                <label for="company_name"> <?php esc_html_e( 'Name', 'the-stnc-map' ) ?></label>
                <input type="text" name="name" value="<?php echo $name ?>" class="form-control" id="name" min="1" max="50">
              </div>

              <div class="form-group">
                <label for="company_name">  <?php esc_html_e( 'Total area', 'the-stnc-map' ) ?></label>
                <input type="text" name="total_area" value="<?php echo $total_area ?>" class="form-control" id="total_area" min="1" max="50">
              </div>


              <div class="form-group">
                <label for="company_name"> <?php esc_html_e( 'Full Field', 'the-stnc-map' ) ?></label>
                <input type="text" name="full_area" value="<?php echo $full_area ?>" class="form-control" id="full_area" min="1" max="50">
              </div>


              <div class="form-group">
                <label for="company_name"> <?php esc_html_e( 'Free Space', 'the-stnc-map' ) ?></label>
                <input type="text" name="empty_area" value="<?php echo $empty_area ?>" class="form-control" id="empty_area" min="1" max="50">
              </div>



              <hr>
            </div>
          </div>
          <div class="form-group">
          <input id="stnc_wp_kiosk_Metabox_video_extra" class="page_upload_trigger_element btn btn-danger" name="stnc_wp_kiosk_Metabox_video_extra" type="button" value="<?php esc_html_e( 'Map Load', 'the-stnc-map' ) ?>" style="">

          </div>
          <br>
          <div class="form-group">
            <button type="submit" value="Kaydet" class="btn btn-success"><?php esc_html_e( 'Save', 'the-stnc-map' ) ?></button>
          </div>
        </div>
      </div>
      <div class="stnc-col-8"> 
         <input type="hidden" value="<?php echo $scheme_media_id ?>" name="media_id" id="media_id">
        <?php  if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'show')) :  ?> 
        <div class="background_attachment_metabox_container">
          <img  class="img-fluid" src="<?php echo $scheme_media_data[0]; ?> " alt="">
        </div> 
        <?php else : ?> 
          <div class="background_attachment_metabox_container"></div> <?php endif ; ?> </div>
    </div>
  </div>
  </div> 
  <?php echo   '</form>' ?> 
</div>
</main>