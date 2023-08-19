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
                        <p style="font-family: sans-serif; font-size: 17px; font-weight: normal; margin: 0; margin-bottom: 15px;">Bu maili <strong style="color:red">ofis bosaltma</strong> islemi nedeniyle aldiniz </p>
                        <p style="font-family: sans-serif; font-size: 17px; font-weight: normal; margin: 0; margin-bottom: 15px;">Bosaltilan bina ve firmaya ait bilgiler asagida verilmistir
                        
                        <?php endif ?>


                        <?php if ($status=="added") : ?>
                        <p style="font-family: sans-serif; font-size: 17px; font-weight: normal; margin: 0; margin-bottom: 15px;">Bu maili  <strong style="color:red">bos bir ofise yeni firma ekleme</strong> islemi nedeniyle aldiniz </p>
                        <p style="font-family: sans-serif; font-size: 17px; font-weight: normal; margin: 0; margin-bottom: 15px;">Yeni eklenen firmaya ait bilgiler asagida verilmistir 
                   
                        <?php endif ?>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 10px;">Tarih: <?php echo stnc_wp_floor_getTurkishDate()?></p>


                        <?php include "email_building_info.php"; ?>
                        <?php include "email_button.php";  ?>
                        <?php // email_test.php  data here  ?>
                      </td>
                    </tr>
					<?php include "email_empty_office_list.php";  ?>
					<?php include "email_general_info.php";  ?>
                  </table>
                </td>
              </tr>
            <!-- END MAIN CONTENT AREA -->
            </table>
            <!-- END CENTERED WHITE CONTAINER -->
            <!-- START FOOTER -->
          <?php include "email_footer.php"; ?>
            <!-- END FOOTER -->
          </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
      </tr>
    </table>

  </body>
</html>
<?php

// }
