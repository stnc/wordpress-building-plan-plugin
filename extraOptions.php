<?php
add_filter('manage_staff_posts_columns', 'CHfw_add_img_column');
add_filter('manage_staff_posts_custom_column', 'CHfw_manage_img_column', 10, 2);

if (isset( $_GET['page'] ) && 'stnc_map_homepage' === $_GET['page'] ){
  stnc_wp_floor_admin_notices();
} else if (isset( $_GET['page'] ) && 'stnc_map_view' === $_GET['page']){
  stnc_wp_floor_admin_notices();
}else if (isset( $_GET['page'] ) && 'stnc_building_ext' === $_GET['page']){
  stnc_wp_floor_admin_notices();
}

function stnc_wp_floor_plans_admin_body_class( $classes = '' ) {
    // $onboarding_class = isset( $_GET['page'] ) && 'stnc_map_homepage' === $_GET['page'] ? 'stnc-header-page' : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
    // $classes .= ' ' . $onboarding_class . ' ';
$onboarding_class='';
    if (isset( $_GET['page'] ) && 'stnc_map_homepage' === $_GET['page']){
      $onboarding_class ='stnc-header-page'; 
    } else if (isset( $_GET['page'] ) && 'stnc_map_view' === $_GET['page']){
      $onboarding_class ='stnc-header-page'; 
    } else if (isset( $_GET['page'] ) && 'stnc_building_ext' === $_GET['page']){
      $onboarding_class ='stnc-header-page'; 
    }
    else if (isset( $_GET['page'] ) && 'stnc_map_editor_building' === $_GET['page']){
      $onboarding_class ='stnc-header-page'; 
    }
  $classes .= ' ' . $onboarding_class . ' ';;
  return $classes ;
}
//https://deluxeblogtips.com/wordpress-admin-body-class/
add_action( 'admin_body_class',  'stnc_wp_floor_plans_admin_body_class' );

function stnc_wp_floor_admin_notices(){
  add_action('admin_notices', function () {
  echo 'My notice';
});


function stnc_wp_floor_plans_hide_notices_to_all_but_super_admin(){
    remove_all_actions( 'user_admin_notices' );
    remove_all_actions( 'admin_notices' );
 }
 add_action('in_admin_header', 'stnc_wp_floor_plans_hide_notices_to_all_but_super_admin', 99);
}




// /* image size https://wpshout.com/wordpress-custom-image-sizes/*/
// if (function_exists('add_image_size')) {
//     add_image_size('stnc_wp_kiosk_size', 1815, 2550, false);
// }

// /*
// add custom_colum
// @use http://bit.ly/2zKE0k4
// */


// add_filter('manage_stnc_kiosk_posts_columns', 'stnc_wp_kiosk_add_img_column');
// add_filter('manage_stnc_kiosk_posts_custom_column', 'stnc_wp_kiosk_manage_img_column', 10, 2);


// function stnc_wp_kiosk_add_img_column($columns)
// {
//     $columns['img'] = 'Featured Image';
//     return $columns;
// }

// function stnc_wp_kiosk_manage_img_column($column_name, $post_id)
// {
//     if ($column_name == 'img') {
//         echo get_the_post_thumbnail($post_id, 'thumbnail');
//     }

//     return $column_name;
// }



/*---bu kısımı sileceğiz --*/
//staff pagination fix ---panelde sayfalama yapacak ama işe yaramadı
// $scFW_staffLimit_posts = 5;

// function stnc_wp_kiosk_mp_staff_posts_per_page($query)
// {
//     global $scFW_staffLimit_posts;
//     if (isset($query->query_vars['post_type'])) {
//         if ($query->query_vars['post_type'] == 'stnc_kiosk') {
//             $query->query_vars['posts_per_page'] = 5;
//         }
//     }

//     return $query;
// }

// if (!is_admin()) {
//     add_filter('pre_get_posts', 'stnc_wp_kiosk_mp_staff_posts_per_page');
// }


