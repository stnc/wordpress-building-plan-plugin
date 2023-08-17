<?php
$ver="2.4.0";

///////////////////////////////////////////////////////
/////--------- ADMIN 
///////////////////////////////////////////////////////



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
    wp_enqueue_style( "stnc-style-boot",plugins_url("assets/css/bootstrap.min.css", __FILE__) ,"",$ver );
    wp_enqueue_style( "stnc-style-style2", plugins_url("assets/css/stnc-admin2.css", __FILE__) ,"",$ver);
}

function stnc_wp_floor_script_in_admin($hook)
{   global $ver;
    wp_register_script( "stnc-bootstrap", plugin_dir_url(__FILE__) . "assets/js/bootstrap.bundle.min.js", "",$ver,true);
    wp_enqueue_script("stnc-bootstrap");
    wp_register_script( "stnc-my",   plugin_dir_url(__FILE__) . "assets/js/my.js", ["jquery"] );
    wp_enqueue_script("stnc-my");
    wp_enqueue_media();
}

function stnc_wp_floor_map_script_in_admin($hook)
{   global $ver;
    wp_register_script( "stnc-map",plugin_dir_url(__FILE__) . "assets/js/plain-draggable.js","", $ver, true);
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
    wp_enqueue_style("custom-gallery",plugins_url("/assets/css/stnc-building-front.css?ver=7.2.2", __FILE__),"",$ver);
    // wp_enqueue_script( 'custom-gallery', plugins_url( '/js/gallery.js' , __FILE__ ) );
    wp_enqueue_style( "load-fa", "https://use.fontawesome.com/releases/v5.5.0/css/all.css");
}
add_action("wp_enqueue_scripts", "stnc_wp_floor_front");


function stnc_building_for_company_js_css()
{
    global $ver;
    wp_register_script( "isotope-pkgd-min-jscss-script",plugins_url("/assets/js/isotope.pkgd.min.js", __FILE__), array( 'jquery' ), $ver, true );
    wp_enqueue_script("isotope-pkgd-min-jscss-script");

    wp_register_script( "stnc-front",plugins_url("/assets/js/stnc-front.js", __FILE__), array( 'jquery' ), $ver, true );
    wp_enqueue_script("stnc-front");
    // wp_register_script("list-min-jscss-script", plugins_url("/assets/js/list.min.js", __FILE__), array('jquery'), "2.0", true);
    // wp_register_style("zz-shortcode-jscss-style", plugins_url("style.css", __FILE__), array(), "1.0", "all");
}
add_action("wp_enqueue_scripts", "stnc_building_for_company_js_css",999999);