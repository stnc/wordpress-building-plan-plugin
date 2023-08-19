
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
                        <a class="nav-link"
                            href="/wp-admin/admin.php?page=stnc_map_view&st_trigger=show&building_id=<?php echo $_GET['teknoid']?>&floor_id=<?php echo $_GET['id']?>">
                            <?php esc_html_e( 'Show Location On Map', 'the-stnc-map' ) ?></a>
                     </a>
                    </li>

              
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown"
                            aria-expanded="false">  <?php esc_html_e( 'Other', 'the-stnc-map' ) ?></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                         <?php 
                         
                        $stncForm_tableNameMain =$wpdb->prefix .'stnc_map_floors' ;
                         $sql = "SELECT * FROM " .   $stncForm_tableNameMain . ' WHERE building_id=' . $_GET['teknoid'] . ' ';
                        $buildingsList = $wpdb->get_results($sql);

                         foreach ($buildingsList as $building) : ?>
                            <li><a class="dropdown-item" href="/wp-admin/admin.php?page=stnc_map_editor_building&st_trigger=show&teknoid=<?php echo $building->building_id ?>&id=<?php echo $building->id ?>"><?php echo $building->name ?></a></li>
                        <?php endforeach ?>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/wp-admin"><?php esc_html_e( 'WP Dashbord', 'the-stnc-map' ) ?></a>
                    </li>
                    
                </ul>

                <div class="text-center">
                    <h1 class="stnc-title fw-bold"><?php esc_html_e( 'STNC building floors', 'the-stnc-map' ) ?></h1>
                </div>


            </div>
        </div>
    </nav>
</header>

