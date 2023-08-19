<?php
function stnc_wp_floor_adminMenu_stnc_map_homepage()
{
?> <style>
  .stnc-header-page #adminmenumain,
  .stnc-header-page #wpadminbar,
  .stnc-header-page #adminmenuback,
  .stnc-header-page #adminmenuwrap,
  .stnc-header-page #wpfooter {
    display: none;
  }

  #wpcontent,
  #wpfooter {
    margin-left: auto !important;
  }

  html.wp-toolbar {
    padding-top: 0 !important;
  }
</style>
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-secondary fixed-top bg-black">
    <div class="stnc-container-fluid">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/wp-admin/admin.php?page=stnc_map_homepage"><?php esc_html_e( 'Building List', 'the-stnc-map' ) ?></a>
          </li>
       
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/wp-admin/admin.php?page=stnc_building_list"><?php esc_html_e( 'Company List', 'the-stnc-map' ) ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/wp-admin"><?php esc_html_e( 'Wordpress Panel', 'the-stnc-map' ) ?></a>
          </li>
        </ul>
        <div class="text-center">
          <h1 class="stnc-title fw-bold"><?php esc_html_e( 'STNC building floors', 'the-stnc-map' ) ?></h1>
        </div>
      </div>
    </div>


  </nav>
</header>
<main class="flex-shrink-0" style="margin-top:88px">
  <div class="stnc-container-fluid">
    <div class="stnc-row">
      <?php 

    global $wpdb;
    $stncForm_tableNameMain =$wpdb->prefix .'stnc_map_building' ;
    $sql = "SELECT * FROM " .   $stncForm_tableNameMain ;
    $buildingsList = $wpdb->get_results($sql);

    foreach ($buildingsList as $building) :

        $stncForm_tableNameMain =$wpdb->prefix .'stnc_map_floors_locations' ;
        
        $totalOffice = $wpdb->get_var('SELECT COUNT(*) FROM ' . $stncForm_tableNameMain . ' WHERE building_id=' . $building->id  );
    
        $totalEmptyOffice = $wpdb->get_var('SELECT COUNT(*) FROM ' . $stncForm_tableNameMain . ' WHERE  is_empty=1 and building_id=' . $building->id );

        $totalOffice=((int)$totalOffice);
    
        $totalEmptyOffice=((int)$totalEmptyOffice);
      
        $totalFullOffice= $totalOffice - $totalEmptyOffice;
        
        $percentage=  round( $totalFullOffice /  $totalOffice * 100);
    
    ?>         
      <div class="stnc-col-2">
        <div class=" card-cover overflow-hidden rounded-5 shadow-lg stnc-card mx-auto" style="background-color: <?php echo $building->color ?> ;">
          <div class="d-flex flex-column   text-white text-center text-shadow-1">
            <h2 class="pt-5  display-6 lh-1 fw-bold text-center " style="color:<?php echo $building->text_color ?>  ;  font-size: 100px;"><?php echo $building->short_name ?>. </h2>
            <h3 class="pt-3 mt-3 lh-1 fw-bold text-center "> <?php esc_html_e( 'Building', 'the-stnc-map' ) ?></h3>
            <div class="d-flex list-unstyled mt-auto ">
              <svg class="bd-placeholder-img rounded-circle mt-auto" width="140" height="140" xmlns="http://www.w3.org/2000/svg" 
              role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                <rect width="100%" height="100%" fill="#fff"></rect>
                     <text x="20%" y="40%" fill="<?php echo $building->text_color ?>" dy=".3em " font-size="1.5em"> %</text>
                <text x="36%" y="40%" fill="<?php echo $building->text_color ?>" dy=".3em" font-size="3em" font-weight="bold"><?php echo $percentage?></text>
           
                <text x="25%" y="75%" fill="<?php echo $building->text_color ?>" dy=".3em" font-size="1.5em" font-weight="bold"> <?php esc_html_e( 'FULL', 'the-stnc-map' ) ?></text>
                <!-- <text x="20%" y="55%" fill="#7066D1" dy=".3em" font-size="2em" font-weight="bold">DOLU</text> -->
              </svg>
            </div>
          </div>
        </div>
        <div class="h-100 overflow-hidden rounded-5 mx-auto">
          <div class="media text-muted pt-3 mx-auto">
            <strong style="font-size:25px;color:<?php echo $building->text_color ?> " class="d-block text-gray-dark mx-auto text-center "><?php echo $building->name ?></strong>
            <span style="font-size:20px" class="d-block text-gray-dark  mx-auto text-center"><strong><?php echo $totalOffice?></strong>  <?php esc_html_e( 'Total Office', 'the-stnc-map' ) ?><br>
                          <span style="font-size: 22px;font-weight: bold;color: red;"><strong><?php echo $totalEmptyOffice?> </strong>  <?php esc_html_e( 'Empty Office', 'the-stnc-map' ) ?></span>  <br>

              <span style="font-size: 22px;font-weight: bold;"><strong><?php echo $totalFullOffice?> </strong>   <?php esc_html_e( 'Full Office', 'the-stnc-map' ) ?></span> 
            </span>
            <br>
            <select class="form-select form-select-sm mx-auto" style="width: 130px;" aria-label=".form-select-sm example" onchange="javascript:handleSelect(this)">
              <option value=""><?php esc_html_e( 'Select Floor', 'the-stnc-map' ) ?></option>
              <?php 
                  $stncForm_tableNameMain =$wpdb->prefix .'stnc_map_floors WHERE building_id='.$building->id ;
                  $sql = "SELECT * FROM " .   $stncForm_tableNameMain ;
                  $floorsList = $wpdb->get_results($sql);
                  foreach ($floorsList as $floors) :
                  ?>
              <option value="/wp-admin/admin.php?page=stnc_map_view&st_trigger=show&building_id=<?php echo $floors->building_id ?>&floor_id=<?php echo $floors->id ?>"><?php echo $floors->name ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
      </div>


      <!-- /.col-lg-2 -->
      <!-- <div class="stnc-col-2">
        <div class=" card-cover overflow-hidden rounded-5 shadow-lg stnc-card mx-auto" style="background-color: #bb53b1;">
          <div class="d-flex flex-column  text-white text-center text-shadow-1">
            <h2 class="pt-5  display-6 lh-1 fw-bold text-center " style="color:#9d4194  ;  font-size: 100px;">6. </h2>
            <h3 class="pt-3 mt-3 lh-1 fw-bold text-center ">Bina </h3>
            <div class="d-flex list-unstyled mt-auto ">
              <svg class="bd-placeholder-img rounded-circle mt-auto" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                <rect width="100%" height="100%" fill="#fff"></rect>
                <text x="10%" y="40%" fill="#bb53b1" dy=".3em" font-size="3.5em" font-weight="bold">25</text>
                <text x="60%" y="45%" fill="#bb53b1" dy=".3em " font-size="1.5em"> ofis</text>
                <text x="25%" y="75%" fill="#bb53b1" dy=".3em" font-size="2em" font-weight="bold">BOS</text>
              </svg>
            </div>
          </div>
        </div>
        <div class="  h-100 overflow-hidden rounded-5  mx-auto">
          <div class="media text-muted pt-3 mx-auto">
            <strong style="font-size:25px" class="d-block text-gray-dark mx-auto text-center ">Tekno 5- BİNASI</strong>
            <span style="font-size:20px" class="d-block text-gray-dark  mx-auto text-center">Toplam: 85 ofis <br>
              <span>250 Metrekare</span>
            </span>
            <br>
            <select class="form-select form-select-sm mx-auto" style="width: 130px;" aria-label=".form-select-sm example" onchange="javascript:handleSelect(this)">
              <option value="">Kat Seçiniz</option>
              <option value="/wp-admin/admin.php?page=stnc_map_view&st_trigger=show&building_id=5&floor_id=21">Bodrum kat</option>
              <option value="/wp-admin/admin.php?page=stnc_map_view&st_trigger=show&building_id=5&floor_id=22">Zemin kat</option>
              <option value="/wp-admin/admin.php?page=stnc_map_view&st_trigger=show&building_id=5&floor_id=23">1. kat</option>
              <option value="/wp-admin/admin.php?page=stnc_map_view&st_trigger=show&building_id=5&floor_id=24">2. kat</option>
              <option value="/wp-admin/admin.php?page=stnc_map_view&st_trigger=show&building_id=5&floor_id=25">3. kat</option>
            </select>
          </div>
        </div>
      </div> -->
      <!-- /.col-lg-2 -->

      <?php endforeach ?>

    </div>
  </div>
</main>
<script type="text/javascript">
  function handleSelect(elm) {
    window.location = elm.value;
  }
</script>
<footer class="footer mt-auto py-3 bg-light stnc-footer">
  <div class="container">
    <span class="text-muted"></span>
  </div>
</footer> <?php

}
