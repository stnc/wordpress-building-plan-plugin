<?php
require "email_style.php";
require "email_building_info.php";
require "email_button.php";
require "email_general_info.php";
require "email_empty_office_list.php";
require "email_footer.php";
function stnc_wp_floor_plans_adminMenu_About_contents()
{
  global $wpdb; 
 echo  $sql = " ALTER TABLE  " . $wpdb->prefix ."stnc_building_ext_categories DROP test";
  $options = get_option( 'stnc_wp_floor_option' ); // unique id of the framework
echo "<pre>";
  print_r($options['email_adress']); // id of the field


?>
    <div id="advanced" class="postbox ">
        <div class="inside">
            <div class="card shadow1" style="max-width:100%!important">
                <h2>    <?php esc_html_e( 'Support', 'the-stnc-map' ) ?>  </h2>

               
            </div>

<!-- HMTL SABLON? -->
<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Erciyes Teknopark Kat Planlari Mail</title>
    <?php echo  stnc_wp_floor_email_template_for_style() ?>
  </head>
  <body style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">Bilgilendirme</span>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f6f6f6; width: 100%;" width="100%" bgcolor="#f6f6f6">
      <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;" width="580" valign="top">
          <div class="content" style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <table role="presentation" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%;" width="100%">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;" valign="top">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">

                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">Bu maili Erciyes Teknopark da <strong style="color:red">ofis bosaltma</strong> islemi nedeniyle aldiniz </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">Bosaltilan bina ve firmaya ait bilgiler asagida verilmistir <strong style="color:black">Tarih:</strong>  16 augtos 2023 </p>

                        <?php echo  stnc_wp_floor_email_building_info() ?>
                        <?php echo  stnc_wp_floor_email_button() ?>
                        <?php // email_test.php  data here  ?>
                      </td>
                    </tr>
                    <?php echo  stnc_wp_floor_email_empty_office_list() ?>
                    <?php echo  stnc_wp_floor_email_general_info() ?>
                
                    
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>
            <!-- END CENTERED WHITE CONTAINER -->

            <!-- START FOOTER -->
          <?php echo  stnc_wp_floor_email_footer() ?>
            <!-- END FOOTER -->

          </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
      </tr>
    </table>

  </body>
</html>

<!-- HMTL SABLON? -->
<pre>
================================================================================
        v2.4.0 Important changes and bug fixes in the release 
================================================================================
- Implemented: degisiklikleri mail ile gonderme ozelligi eklendi responsive arayuz ve ayrintili bilgi sunan mail olayi gelistirildi
- Implemented: ayarlar icin codestar framework kullanilacak https://codestarframework.com/documentation/#/ 
- Implemented: cakismalari onlemek icin css de boostrap grid yerine SIMPLE GRID yapisina gecis yapildi
- Implemented: bos binalar listelemesi yapildi 
- Changed: pages yapisi degistirildi daha anlasilir hale geldi
- Changed: css ve js yukleyici yenilendi daha anlasilir hale geldi TODO: asset klasoru admin ve frontend olarak ayrilacak  
- Bug fix: TODO : onceki sonraki ofis olayi iptal edildi ilerde acilacak 
- Bug fix: Eksik ceviriler yapildi
- Bug fix: firma eklerken  kategori secmeme sorunu duzeltildi
- Bug fix:  firma gosterimde ofisin bilgilerini gostermeyi unutmusuz orasi eklendi ve arayuzu daha guzel hale getirildi.
- TODO : las vegas da gordugum ozellik https://www.venetianlasvegas.com/digital-resort-map.html?map=on  The Venetian Resort Digital Map v3 de yapilacak 



================================================================================
        v1.5.0 Important changes and bug fixes in the release 
================================================================================
- Implemented: ofisi bosaltan firmalarin tutulacagi bir kolon eklendi - ama bu ozellik v3 de aktif olacaktir
- Implemented:  ingilizce dil destegi eklendi tum ceviriler yapildi
- Bug fix:  pages yapisindaki hata giderildi
- Bug fix: install table de eksik yuklemeler varmis onlar duzeltildi




================================================================================
        v1.0.0 Important changes and bug fixes in the release 
================================================================================
- Implemented:  eski sistemdeki veriler ve haritalar yeniden olusturuldu
- Changed: daha gelismis haritalama sistemi yazildi artik haritayi kullanicinin yukleyebilecegi 
bir arayuz ve konum belirleme arayuzu var https://anseki.github.io/plain-draggable/
- Implemented: firma listesini web sitesinde gosterecek shortcut
- Implemented: gelismis shortcut ozelligi her kat icin ozel listeleme 
- Bug fix: odemelerde silmede yaşanan sorun vardı düzeltidli 
- Implemented:  air ile çalışılmaya başlandı 
   </pre>
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
