<?php
$ver="2.4.0";

///////////////////////////////////////////////////////
/////--------- ADMIN 
///////////////////////////////////////////////////////

//
// IMPORTANT the links here are linked to register-menus.php
//
if (isset($_GET["page"]) && $_GET["page"] === "stnc_map_homepage") {
    stnc_wp_floor_all_scritps();
}

if (isset($_GET["page"]) && $_GET["page"] === "stnc_building_company") {
    stnc_wp_floor_all_scritps();
    add_action("admin_enqueue_scripts", "stnc_wp_floor_map_script_in_admin");
}

if (isset($_GET["page"]) && $_GET["page"] === "stnc_map_view") {
    // stnc_wp_floor_front() ;
    stnc_wp_floor_all_scritps();
    add_action("admin_enqueue_scripts", "stnc_wp_floor_map_script_in_admin");
}

if (isset($_GET["page"]) && $_GET["page"] === "stnc_map_editor_building") {
    stnc_wp_floor_all_scritps();
    add_action("admin_enqueue_scripts", "stnc_wp_floor_map_script_in_admin");
}


function stnc_wp_floor_MainMenu_enqueue_style()
{   global $ver;
    wp_enqueue_style( "stnc-style-boot",plugins_url("assets/admin/css/bootstrap.min.css", __FILE__) ,"",$ver );
    wp_enqueue_style( "stnc-style-style2", plugins_url("assets/admin/css/stnc-admin.css", __FILE__) ,"",$ver);
}

function stnc_wp_floor_script_in_admin($hook)
{   global $ver;
    wp_register_script( "stnc-bootstrap", plugin_dir_url(__FILE__) . "assets/admin/js/bootstrap.bundle.min.js", "",$ver,true);
    wp_enqueue_script("stnc-bootstrap");
    wp_register_script( "stnc-my",   plugin_dir_url(__FILE__) . "assets/admin/js/my.js", ["jquery"] );
    wp_enqueue_script("stnc-my");
    wp_enqueue_media();
}

function stnc_wp_floor_map_script_in_admin($hook)
{   global $ver;
    wp_register_script( "stnc-map",plugin_dir_url(__FILE__) . "assets/admin/js/plain-draggable.js","", $ver, true);
    wp_enqueue_script("stnc-map");
}



function stnc_wp_floor_all_scritps()
{
    add_action("admin_enqueue_scripts", "stnc_wp_floor_MainMenu_enqueue_style");
    add_action("admin_enqueue_scripts", "stnc_wp_floor_script_in_admin");
}





//////////////////////////////
/////--------- FRONTEND 
///////////////////////////////////


function stnc_wp_floor_front()
{   global $ver;
    wp_enqueue_style("custom-gallery",plugins_url("/assets/front/css/stnc-building-front.css?ver=7.2.2", __FILE__),"",$ver);
    // wp_enqueue_script( 'custom-gallery', plugins_url( '/js/gallery.js' , __FILE__ ) );
    wp_enqueue_style( "load-fa", "https://use.fontawesome.com/releases/v5.5.0/css/all.css");
}
add_action("wp_enqueue_scripts", "stnc_wp_floor_front");


// bu shortcode icindi ama onun icine eklendi 
// function stnc_building_for_company_js_css()
// {
//     global $ver;
//     wp_register_script( "isotope-pkgd-min-jscss-script",plugins_url("/assets/front/js/isotope.pkgd.min.js", __FILE__), array( 'jquery' ), $ver, true );
//     wp_enqueue_script("isotope-pkgd-min-jscss-script");

//     wp_register_script( "stnc-front",plugins_url("/assets/front/js/stnc-front.js", __FILE__), array( 'jquery' ), $ver, true );
//     wp_enqueue_script("stnc-front");
// }
// add_action("wp_enqueue_scripts", "stnc_building_for_company_js_css",999999);

function stnc_building_modern_js_css()
{
    global $ver;
    wp_register_script( "simple-datatable",plugins_url("assets/front/js/simple-datatables.js", __FILE__), "", $ver, false );
    wp_enqueue_script("simple-datatable");
}
add_action("wp_enqueue_scripts", "stnc_building_modern_js_css",1);