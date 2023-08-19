<?php
/*
Plugin Name:  Teknopark Binalar
Plugin URI:	https://github.com/stnc/wp-kat-planlari		
Description: Erciyes Teknopark Kat Planları
Version: 2.4.0
Author: Selman TUNC
Text Domain: the-stnc-map
Domain Path: /languages/

-- tenplate yazmak icin ama kullanilmiyor 
* Template Name: Firmalar Listesi
* Description: firmalar listesi sayfası 
* @package WordPress
* @subpackage stnc-kiosk
* @since stnc-building 2.0
*/

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

header('Content-type: application/json');

$stnc_wp_floor_plans_postID = isset($_GET['post']) ? $_GET['post'] : null;//post  id  for edit
$stnc_wp_floor_post_type = get_post_type($stnc_wp_floor_plans_postID);//get type
$stnc_wp_floor_post_type_post = isset($_REQUEST['post_type']) ? $_REQUEST['post_type'] : 'post';//for new

// define('stnc_wp_floor_plans_PATH', plugin_dir_path(__FILE__) . 'metaBox/');

add_action('init', 'do_output_buffer');
function do_output_buffer() {
        ob_start();
}

include ('register-menus.php');
include ('loader_css_js.php');
include ('installTable.php');

require_once "helper.php";

include ('pages/homepage/homepage.php');
include ('pages/stnc_building_company/actions.php');
include ('pages/stnc_map_editor_building/actions.php');
include ('pages/stnc_map_view/actions.php');
include ('pages/stnc_map_view/ajax.php');


require_once "pages/company_list_data_table/stncForm_company_list.php";
require_once "pages/company_empty_list_data_table/stncForm_empty_company_list.php";
require_once "pages/about/stncForm-adminMenu_About.php";
require_once "pages/update/update_pack.php";

require_once "pages/shortcut-classic/admin-menu.php";
require_once "pages/shortcut-classic/company-frontpage.php";

require_once "pages/shortcut-minimal/company-frontpage.php";

require_once 'codestar-framework/codestar-framework.php';
// require_once 'codestar-framework/samples/admin-options.php';
require_once 'pages/options/my-options.php';

require_once 'email/_mail_.php';


// Load plugin text-domain https://daext.com/blog/how-to-make-a-wordpress-plugin-translatable/
function stnc_wp_floor_initialize_plugin_lang() {
	// Retrieve the directory for the internationalization files
    load_plugin_textdomain('the-stnc-map', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}
add_action( 'plugins_loaded', 'stnc_wp_floor_initialize_plugin_lang' );


/*
// load css into the login page
function mytheme_enqueue_login_style() {
    wp_enqueue_style( 'mytheme-options-style', get_template_directory_uri() . '/css/login.css' ); 
}
add_action( 'login_enqueue_scripts', 'mytheme_enqueue_login_style' );

*/