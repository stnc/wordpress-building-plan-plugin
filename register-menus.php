<?php
add_action('admin_menu', 'stnc_wp_floor_MainMenu');
function stnc_wp_floor_MainMenu(){


 add_menu_page('STNC Building',__( 'STNC Building', 'the-stnc-map' ) , 'manage_options', 'stnc_map_homepage', 'stnc_wp_floor_adminMenu_stnc_map_homepage','dashicons-networking',67); ////burası main menuyu ekler yani üst ksıım 
 add_submenu_page( "stnc_map_homepage", 'Kat',  __( 'Companies List', 'the-stnc-map' ) , 'manage_options', 'stnc_building_list', 'stnc_wp_floor_render_list_page',null ); ////burası alt kısım onun altında olacak olan bolum için 
 add_submenu_page( "stnc_map_homepage", 'Kat', __( 'Shortcut', 'the-stnc-map' ), 'manage_options', 'stnc_map_shortcut', 'stnc_wp_floor_shortcut_page' ,null); ////burası alt kısım onun altında olacak olan bolum için 
 add_submenu_page( "stnc_map_homepage", 'Kat', __( 'About', 'the-stnc-map' ), 'manage_options', 'stnc_map_about', 'stnc_wp_floor_plans_adminMenu_About_contents',null ); ////burası alt kısım onun altında olacak olan bolum için 
 add_submenu_page( null, 'Kat', __( 'fixed map', 'the-stnc-map' ), 'manage_options', 'stnc_map_view', 'stnc_wp_floor_adminMenu_stnc_map_view',null ); ////burası alt kısım onun altında olacak olan bolum için 


 add_submenu_page( null, 'Kat', __( 'fixed map', 'the-stnc-map' ), 'manage_options', 'stnc_building_company', 'stnc_wp_floor_adminMenu_stnc_building_company',null ); ////burası alt kısım onun altında olacak olan bolum için 

 add_submenu_page( null, 'Kat', __( 'fixed map', 'the-stnc-map' ), 'manage_options', 'stnc_map_editor_building', 'stnc_wp_floor_adminMenu_stnc_map_editor_stnc',null ); ////binannın kat planı haritası ekleme düzenleme yeri
//  add_submenu_page( "stnc_map_homepage", 'Kat', 'Harita', 'manage_options', 'stnc_building_company', 'stnc_wp_floor_adminMenu_map' ); ////burası alt kısım onun altında olacak olan bolum için 
//  add_submenu_page( "stnc_map_homepage", 'Kat', 'Harita Sabit', 'manage_options', 'stnc_map_view', 'stnc_wp_floor_adminMenu_stnc_map_view' ); ////burası alt kısım onun altında olacak olan bolum için 

}
