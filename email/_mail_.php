<?php
require "email_style.php";
require "email_building_info.php";
require "email_button.php";
require "email_general_info.php";
require "email_empty_office_list.php";
require "email_footer.php";
function stnc_wp_floor_plans_Email_Set_content_type(){
  return "text/html";
}

add_filter( 'wp_mail_content_type','stnc_wp_floor_plans_Email_Set_content_type' );



function stnc_wp_floor_plans_send_email($door_number,$company_name,$square_meters,$email,$phone,$web_site,$map_location,$company_description,$address,$status){

include("email_test.php");

//user posted variables
// $name = "Erciyes-Teknopark IT";
$options = get_option( 'stnc_wp_floor_option' ); 
$to = get_option('admin_email');
echo $messageTest = stnc_wp_floor_mail_template($door_number,$company_name,$square_meters,$email,$phone,$web_site,$map_location,$company_description,$address,$status);


// $message = stnc_wp_floor_mail_template($door_number,$company_name,$square_meters,$email,$phone,$web_site,$map_location,$company_description,$address,$status);

$subject = $options['mail_subject'];

if (($options['is_mail_send'])) :
    if (!empty($options['email_adress'])) :
        foreach ($options['email_adress'] as $key =>  $option) :     
          if (stnc_wp_floor_validateEMAIL($option["mailadress"])) {
            $email= $option["mailadress"];
            $headers = 'From: '. $email . "\r\n" .
                         'Reply-To: ' . $email . "\r\n";
            $sent = wp_mail($to, $subject, $messageTest , $headers);
            // $sent = wp_mail($to, $subject, $message , $headers);
            die;
           }
          endforeach;
      endif;
endif;



// if($sent) {
//   //message sent!       
// }
// else  {
//   //message wasn't sent       
// }


}



function stnc_wp_floor_mail_template($door_number,$company_name,$square_meters,$email,$phone,$web_site,$map_location,$company_description,$address,$status)
{

?>
<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Erciyes Teknopark Kat Planlari Mail</title>
    <?php // echo  stnc_wp_floor_email_template_for_style() ?>
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

                      
                      <?php if ($status=="empty") : ?>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">Bu maili Erciyes Teknopark da <strong style="color:red">ofis bosaltma</strong> islemi nedeniyle aldiniz </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">Bosaltilan bina ve firmaya ait bilgiler asagida verilmistir 
                        <?php endif ?>


                        <?php if ($status=="added") : ?>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">Bu maili Erciyes Teknopark da <strong style="color:red">ofise yeni firma ekleme</strong> islemi nedeniyle aldiniz </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">Yeni Eklenen firma ait bilgiler asagida verilmistir 
                        <?php endif ?>

                        <?php echo  stnc_wp_floor_email_building_info($door_number,$company_name,$square_meters,$email,$phone,$web_site,$map_location,$company_description,$address) ?>
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




<?php

}
