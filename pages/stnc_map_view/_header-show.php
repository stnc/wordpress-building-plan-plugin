<?php
//get event trıgger 
//page=stnc_map_view & st_trigger === 'show' 

    
?>
<style>
.dragAbsolute {
    padding: 3px 7px;
    font-weight: bold;
    color: white;
    position: absolute;
    height: 26px;
    width: 84px;
    text-align: center;
}
.fer {
    color:#fff;
}
.dragAbsoluteSpanBlue {
    border-radius: 78px;
    /* padding: 1px; */
    color: blanchedalmond;
    background-color: blue;
    display: inline-block;
    width: 26px;
    float: left;
    margin: 0;
    padding: 0;
}

.dragAbsoluteSpanRed {
    border-radius: 78px;
    /* padding: 1px; */
    color: blanchedalmond;
    background-color: red;
    display: inline-block;
    width: 26px;
    float: left;
    margin: 0;
    padding: 0;
}

.dragAbsoluteSpan2 {
    border-radius: 78px;
    padding: 1px;
    color: #212529;

    display: block;
    width: 90px;

    margin: 0;
    padding: 0;
}
.bg-black{
    background-color:#000;
    color:#fff;
}
</style>



<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-secondary fixed-top bg-black">
        <div class="container-fluid">
         
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               
                    <li class="nav-item">
                        <a class="nav-link" href="/wp-admin/admin.php?page=stnc_map_homepage"><?php esc_html_e( 'Building List', 'the-stnc-map' ) ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" st_trigger=new
                            href="/wp-admin/admin.php?page=stnc_building_company&st_trigger=new&building_id=<?php echo $_GET['building_id']?>&floor_id=<?php echo $_GET['floor_id']?>"><?php esc_html_e( 'Add New Company', 'the-stnc-map' ) ?></a>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="/wp-admin/admin.php?page=stnc_map_view&st_trigger=editor&building_id=<?php echo $_GET['building_id']?>&floor_id=<?php echo $_GET['floor_id']?>">
                            <?php esc_html_e( 'Change Placement', 'the-stnc-map' ) ?></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="/wp-admin/admin.php?page=stnc_map_editor_building&st_trigger=show&teknoid=<?php echo $_GET['building_id']?>&id=<?php echo $_GET['floor_id']?>">
                            <?php esc_html_e( 'Upload Map', 'the-stnc-map' ) ?></a>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown"
                            aria-expanded="false"><?php esc_html_e( 'Other Floors', 'the-stnc-map' ) ?></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                         <?php foreach ($buildingsList as $building) : ?>
                            <li><a class="dropdown-item" href="/wp-admin/admin.php?page=stnc_map_view&st_trigger=show&building_id=<?php echo $_GET['building_id']?>&floor_id=<?php echo $building->id ?>"><?php echo $building->name ?></a></li>
                        <?php endforeach ?>
                        </ul>
                    </li>
                    
                    <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/wp-admin/admin.php?page=stnc_building_list"><?php esc_html_e( 'Company List', 'the-stnc-map' ) ?></a>
          </li>
          
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/wp-admin"><?php esc_html_e( 'WP Dashbord', 'the-stnc-map' ) ?></a>
                    </li>

          
                    
                </ul>

                <div class="text-center">
                <h1 class="stnc-title fw-bold"><?php esc_html_e( 'STNC building floors', 'the-stnc-map' ) ?></span></h1>

                </div>


            </div>
        </div>
    </nav>
</header>
