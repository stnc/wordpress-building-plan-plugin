<?php
// https://codepen.io/desandro/pen/YzPMBx
// uses
// [stnc_building_classic]




add_shortcode( "stnc_building_classic",  "stnc_map_building_company_shortcode");


/**
 * Output the form.
 *
 * @param      array  $atts   User defined attributes in shortcode tag
 */
function stnc_map_building_company_shortcode($attr)
{
    global $wpdb;

    $args = shortcode_atts(
        [
            "title" => "#",
            "id" => "1",
        ],
        $attr
    );


    $ver="2.4.0";
    wp_register_script( "isotope-pkgd-min-jscss-script",plugins_url("../../assets/js/isotope.pkgd.min.js", __FILE__), array( 'jquery' ), $ver, true );
    wp_enqueue_script("isotope-pkgd-min-jscss-script");

    wp_register_script( "stnc-front",plugins_url("../../assets/js/stnc-front.js", __FILE__), array( 'jquery' ), $ver, true );
    wp_enqueue_script("stnc-front");

    $wp_stnc_map_floors1 =
        $wpdb->prefix ."stnc_map_floors_locations where is_empty=0  and is_show=1 order by company_name asc";
    //  $wp_stnc_map_floors1 =$wpdb->prefix . 'stnc_map_floors_locations WHERE floor_id='.$args['id'].'';
    $sql = "SELECT * FROM " . $wp_stnc_map_floors1 . " ";
    $buildingsList = $wpdb->get_results($sql);

    $wp_stnc_building_extList = $wpdb->prefix . "stnc_building_ext_categories";
    //  $wp_stnc_map_floors1 =$wpdb->prefix . 'stnc_map_floors_locations WHERE floor_id='.$args['id'].'';
    $sql = "SELECT * FROM " . $wp_stnc_building_extList . "  where status=1";
    $stncMapCompanyList = $wpdb->get_results($sql);

    $wp_stnc_map_buildingList = $wpdb->prefix . "stnc_map_building";
    //  $wp_stnc_map_floors1 =$wpdb->prefix . 'stnc_map_floors_locations WHERE floor_id='.$args['id'].'';
    $sql = "SELECT * FROM " . $wp_stnc_map_buildingList . " ";
    $stncMapBuildingList = $wpdb->get_results($sql);
    // echo '<pre>';
    // print_r($buildingsList);
    // die;
    ?>



<div class="stnc-row" style="margin: 20px 0 20px 0 !important;
display: block;
padding: 15px;
background-color: #eee;
border-radius: 5px;">

<div class="stnc-col-6 cl-left">
   <label for="sas"> <?php esc_html_e( 'Choose Sector', 'the-stnc-map' ) ?></label>
      <select class="filters-select">
        <option value="*"> <?php esc_html_e( 'Show All', 'the-stnc-map' ) ?></option>
        <?php foreach ($stncMapCompanyList as $stncMapCompany): ?>
         <option value=".company<?php echo $stncMapCompany->id; ?>"><?php echo $stncMapCompany->name; ?></option>
        <?php endforeach; ?>
      </select>
</div>

<div class="stnc-col-6 cl-left">
<label for="sas"> <?php esc_html_e( 'Select Building', 'the-stnc-map' ) ?></label>
      <select class="filters-select-comnpany">
      <option value="*"> <?php esc_html_e( 'Show All', 'the-stnc-map' ) ?></option>
        <?php foreach ($stncMapBuildingList as $stncMapBuilding): ?>
         <option value=".build<?php echo $stncMapBuilding->id; ?>"><?php echo $stncMapBuilding->name; ?></option>
        <?php endforeach; ?>
      </select>
</div>
</div>

<div class="business-container" id="company-list">
<div class="grid list" >
<?php foreach ($buildingsList as $building):

    $door_number_permission_check = true;
    $square_meters_permission_check = true;
    $email_permission_check = true;
    $phone_permission_check = true;
    $mobile_phone_permission_check = true;
    $web_site_permission_check = true;
    $company_description_permission_check = true;
    $address_permission_check = true;
    $data = str_replace([" ", "\\"], "", $building->web_permission);
    $web_permission = json_decode($data, true, JSON_UNESCAPED_SLASHES);

    if ($web_permission != "") {
        if (
            $web_permission[0]["door_number_permission"] != "" &&
            $web_permission[0]["door_number_permission"]
        ) {
            $door_number_permission_check = false;
        }

        if (
            $web_permission[0]["square_meters_permission"] != "" &&
            $web_permission[0]["square_meters_permission"]
        ) {
            $square_meters_permission_check = false;
        }

        if (
            $web_permission[0]["email_permission"] != "" &&
            $web_permission[0]["email_permission"]
        ) {
            $email_permission_check = false;
        }

        if (
            $web_permission[0]["phone_permission"] != "" &&
            $web_permission[0]["phone_permission"]
        ) {
            $phone_permission_check = false;
        }

        if (
            $web_permission[0]["mobile_phone_permission"] != "" &&
            $web_permission[0]["mobile_phone_permission"]
        ) {
            $mobile_phone_permission_check = false;
        }

        if (
            $web_permission[0]["web_site_permission"] != "" &&
            $web_permission[0]["web_site_permission"]
        ) {
            $web_site_permission_check = false;
        }

        if (
            $web_permission[0]["company_description_permission"] != "" &&
            $web_permission[0]["company_description_permission"]
        ) {
            $company_description_permission_check = false;
        }

        if (
            $web_permission[0]["address_permission"] != "" &&
            $web_permission[0]["address_permission"]
        ) {
            $address_permission_check = false;
        }
    }

    $image = wp_get_attachment_image_src($building->media_id, "full");

    if ($image) {
        $images = $image[0];
    } else {
        $images =
            "/wp-content/uploads/2022/02/in-company-English-classes-head2.jpg";
    }
    ?>

    <div class="grid-display element-item company<?php echo $building->company_category_id; ?> build<?php echo $building->building_id; ?>  ">
      <div class="row">
          <div class="img-area stnc-col-3 cl-left">
            <figure>
              <a  target="_target" href="<?php echo $building->web_site; ?>">
                <img src="<?php echo $images; ?>" class="img-responsive- rt-team-img" alt="<?php echo $building->company_name; ?>" loading="lazy" width="197" height="78">
              </a>
            </figure>
          </div>

          <div class="rttm-content-area stnc-col-9 cl-left">
              <span class="team-name">
                <a  target="_blank" title="<?php echo $building->company_name; ?>" href="<?php echo $building->web_site; ?>"><?php echo $building->company_name; ?></a>
                <div class="name" ><?php echo $building->company_name; ?></div>
              </span>

            <?php if ($company_description_permission_check): ?>
              <?php if ($building->company_description != ""): ?>
              <div class="short-bio">
                <p><?php echo $building->company_description; ?></p>
              </div>
              <?php endif; ?>
            <?php endif; ?>

            <div class="contact-info">
              <ul>
              <?php if ($email_permission_check): ?>  
              <?php if ($building->email != ""): ?>
                <li>
                  <i class="far fa-envelope"></i>
                  <a class="mail" href="mailto:<?php echo $building->email; ?>">
                    <span class="tlp-email"><?php echo $building->email; ?></span>
                  </a>
                </li>
              <?php endif; ?>
              <?php endif; ?>

              <?php if ($phone_permission_check): ?>  
                <?php if ($building->phone != ""): ?>
                <li>
                  <i class="fa fa-phone"></i>
                  <a href="tel:<?php echo $building->phone; ?>" class="tlp-phone"><?php echo $building->phone; ?></a>
                </li>
                <?php endif; ?>
                <?php endif; ?>

                <?php if ($mobile_phone_permission_check): ?>  
                <?php if ($building->mobile_phone != ""): ?>
                <li class="tlp-fax">
                  <i class="fa fa-fax"></i>
                  <a href="fax:<?php echo $building->mobile_phone; ?>">
                    <span>Cep Telefonu: <?php echo $building->mobile_phone; ?></span>
                  </a>
                </li>
                <?php endif; ?>
                <?php endif; ?>
                
                <?php if ($address_permission_check): ?>  
                <?php if ($building->address != ""): ?>
                <li>
                  <i class="fa fa-map-marker"></i>
                  <span class="tlp-location"><?php echo $building->address; ?></span>
                </li>
                <?php endif; ?>
                <?php endif; ?>

                <?php if ($web_site_permission_check): ?>  
                <?php if ($building->web_site != ""): ?>
                <li>
                  <a target="_blank" href="<?php echo $building->web_site; ?>">
                    <i class="fa fa-globe"></i>
                    <span class="tlp-url"><?php echo $building->web_site; ?></span>
                  </a>
                </li>
                <?php endif; ?>
                <?php endif; ?>
              </ul>

      <?php if ( current_user_can("editor") ||  current_user_can("administrator")) { ?>
          <a href="/wp-admin/admin.php?page=stnc_building_company&building_id=1&floor_id=<?php echo $building->floor_id; ?>&st_trigger=show&id=<?php echo $building->id; ?>"><?php esc_html_e( 'edit', 'the-stnc-map' ) ?></a>
        <?php } ?>
            </div>
          </div>
      </div>
    </div>
    <?php
endforeach; ?>
  </div>
  </div>
    <?php
}