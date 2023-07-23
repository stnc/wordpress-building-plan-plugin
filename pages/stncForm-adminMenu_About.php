<?php
function stnc_wp_floor_plans_adminMenu_About_contents()
{
?>
    <div id="advanced" class="postbox ">
        <div class="inside">
            <div class="card shadow1" style="max-width:100%!important">
                <h2>    <?php esc_html_e( 'Support', 'the-stnc-map' ) ?>  </h2>
                <?php esc_html_e( 'Place this code on the page you want to add, it will come to the whole page. If you want to add only one field, see the shortcode menu.', 'the-stnc-map' ) ?>
              <p></p>
              <pre> [stnc_building_for_company]</pre>
               
            </div>
        </div>
    </div>

<?php

}


function stnc_wp_floor_plans_adminMenu_About_contents2()
{
    set_current_screen();
    $admin_body_class = array( 'pll-wizard', 'wp-core-ui' );
    if ( is_rtl() ) {
        $admin_body_class[] = 'rtl';
    }
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
        <head>
            <meta name="viewport" content="width=device-width" />
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>
    
            ?>
            </title>
            <script type="text/javascript">
                var ajaxurl = '<?php echo esc_url( admin_url( 'admin-ajax.php', 'relative' ) ); ?>';
            </script>
     
        </head>
        <body class="<?php echo join( ' ', array_map( 'sanitize_key', $admin_body_class ) ); ?>">
    <div id="advanced" class="postbox ">
        <div class="inside">
            <div class="card shadow1" style="max-width:100%!important">
                <h2>Build  </h2>
         
            </div>
        </div>
    </div>
	</body>
</html>
<?php

}
