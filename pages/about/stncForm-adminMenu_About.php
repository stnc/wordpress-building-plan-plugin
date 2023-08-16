<?php
function stnc_wp_floor_plans_adminMenu_About_contents()
{

    global $wpdb;
    $floorInfoData = $wpdb->get_row($wpdb->prepare("SELECT *  FROM " . $wpdb->prefix ."stnc_map_floors_locations WHERE id = %d", $_GET['id']));
    $door_number = $floorInfoData->door_number;
    $floors_locations_id = $floorInfoData->id;
    $company_name = $floorInfoData->company_name;
    $square_meters = $floorInfoData->square_meters;
    $email =  $floorInfoData->email;
    $phone = $floorInfoData->phone;
    $mobile_phone = $floorInfoData->mobile_phone;
    $web_site = $floorInfoData->web_site;
    $map_location = $floorInfoData->map_location;
    $company_description =  $floorInfoData->company_description;
    $address =  $floorInfoData->address;
    $id =  $floorInfoData->id;
    $media_id =  $floorInfoData->media_id;
    $web_permission =  $floorInfoData->web_permission;

?>
    <div id="advanced" class="postbox ">
        <div class="inside">
            <div class="card shadow1" style="max-width:100%!important">
                <h2>    <?php esc_html_e( 'Support', 'the-stnc-map' ) ?>  </h2>
                <?php esc_html_e( 'Place this code on the page you want to add, it will come to the whole page. If you want to add only one field, see the shortcode menu.', 'the-stnc-map' ) ?>
              <p></p>
              <pre> [stnc_building_for_company]</pre>
               
            </div>


            <!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Simple Transactional Email</title>
    <style>
@media only screen and (max-width: 620px) {
  table.body h1 {
    font-size: 28px !important;
    margin-bottom: 10px !important;
  }

  table.body p,
table.body ul,
table.body ol,
table.body td,
table.body span,
table.body a {
    font-size: 16px !important;
  }

  table.body .wrapper,
table.body .article {
    padding: 10px !important;
  }

  table.body .content {
    padding: 0 !important;
  }

  table.body .container {
    padding: 0 !important;
    width: 100% !important;
  }

  table.body .main {
    border-left-width: 0 !important;
    border-radius: 0 !important;
    border-right-width: 0 !important;
  }

  table.body .btn table {
    width: 100% !important;
  }

  table.body .btn a {
    width: 100% !important;
  }

  table.body .img-responsive {
    height: auto !important;
    max-width: 100% !important;
    width: auto !important;
  }
}
@media all {
  .ExternalClass {
    width: 100%;
  }

  .ExternalClass,
.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td,
.ExternalClass div {
    line-height: 100%;
  }

  .apple-link a {
    color: inherit !important;
    font-family: inherit !important;
    font-size: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
    text-decoration: none !important;
  }

  #MessageViewBody a {
    color: inherit;
    text-decoration: none;
    font-size: inherit;
    font-family: inherit;
    font-weight: inherit;
    line-height: inherit;
  }

  .btn-primary table td:hover {
    background-color: #34495e !important;
  }

  .btn-primary a:hover {
    background-color: #34495e !important;
    border-color: #34495e !important;
  }
}





/* SELMAN */

.dcf-txt-center {
      text-align: center!important
    }

    .dcf-txt-left {
      text-align: left!important
    }

    .dcf-txt-right {
      text-align: right!important
    }
    
.dcf-table caption {
      color: black;
      font-size: 1.13em;
      font-weight: 700;
      padding-bottom: .56rem
    }

    .dcf-table thead {
      font-size: .84em
    }

    .dcf-table tbody {
      border-bottom: 1px solid #242423;
      border-top: 1px solid #242423;
      font-size: .84em
    }

    .dcf-table tfoot {
      font-size: .84em
    }

    .dcf-table td, .dcf-table th {
      padding-right: 1.78em
    }

    .dcf-table-bordered, .dcf-table-bordered td, .dcf-table-bordered th {
      border: 1px solid #242423
    }

    .dcf-table-bordered td, .dcf-table-bordered th, .dcf-table-striped td, .dcf-table-striped th {
      padding-left: 1em;
      padding-right: 1em
    }

    .dcf-table-bordered tr:not(:last-child), .dcf-table-striped tr:not(:last-child) {
      border-bottom: 1px solid var(--b-table)
    }

    .dcf-table-striped tbody tr:nth-of-type(2n) {
      background-color: rgba(254, 253, 251, 0.03)
    }

    .dcf-table thead td, .dcf-table thead th {
      padding-bottom: .75em;
      vertical-align: bottom
    }

    .dcf-table tbody td, .dcf-table tbody th, .dcf-table tfoot td, .dcf-table tfoot th {
      padding-top: .75em;
      vertical-align: top
    }

    .dcf-table tbody td, .dcf-table tbody th {
      padding-bottom: .75em
    }

    .dcf-table-bordered thead th {
      padding-top: 1.33em
    }

    .dcf-wrapper-table-scroll {
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      left: 50%;
      margin-left: -50vw;
      margin-right: -50vw;
      padding-bottom: 1em;
      position: relative;
      right: 50%;
      width: 100vw
    }

    @media only screen and (max-width:42.09em) {
      .dcf-table-responsive thead {
        clip: rect(0 0 0 0);
        -webkit-clip-path: inset(50%);
        clip-path: inset(50%);
        height: 1px;
        overflow: hidden;
        position: absolute;
        width: 1px;
        white-space: nowrap
      }
      .dcf-table-responsive tr {
        display: block
      }
      .dcf-table-responsive td {
        -webkit-column-gap: 3.16vw;
        -moz-column-gap: 3.16vw;
        column-gap: 3.16vw;
        display: grid;
        grid-template-columns: 1fr 2fr;
        text-align: left!important
      }
      .dcf-table-responsive.dcf-table-bordered, .dcf-table-responsive.dcf-table-bordered thead th {
        border-width: 0
      }
      .dcf-table-responsive.dcf-table-bordered tbody td {
        border-top-width: 0
      }
      .dcf-table-responsive:not(.dcf-table-bordered) tbody tr {
        padding-bottom: .75em
      }
      .dcf-table-responsive:not(.dcf-table-bordered) tbody td {
        padding-bottom: 0
      }
      .dcf-table-responsive:not(.dcf-table-bordered):not(.dcf-table-striped) tbody td {
        padding-right: 0
      }
      .dcf-table-responsive.dcf-table-bordered tbody tr:last-child td:last-child {
        border-bottom-width: 0
      }
      .dcf-table-responsive tbody td:before {
        content: attr(data-label);
        float: left;
        font-weight: 700;
        padding-right: 1.78em
      }
    }

.dcf-overflow-x-auto {
      overflow-x: auto!important;
      -webkit-overflow-scrolling: touch
    }
    
.dcf-w-100\% {
  width: 100%!important;
		}



</style>
  </head>
  <body style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">This is preheader text. Some clients will show this text as a preview.</span>
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


                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; width: 100%;" width="100%">
                          <tbody>
                            <tr>
                              <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;" valign="top">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                  <tbody>
                                    <tr>
                                      <td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border-bottom:solid #000 1px " valign="top" align="right" >  <?php esc_html_e( 'Bina ve Kat Bilgisi', 'the-stnc-map' ) ?> </td>
                                      <td style="border-bottom:solid #000 1px"> => </td>

                                      <td style="font-family: sans-serif; font-size: 15px; vertical-align: top;  text-align: center; padding:10px; color:#000;border-bottom:solid #000 1px" valign="top" align="left" >  TEKNO-1 / Bodrum Kat  </td>

                                      <td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px; color:#000 ; border-left:solid #000 1px;border-bottom:solid #000 1px " valign="top" align="center" >  <?php esc_html_e( 'Door number', 'the-stnc-map' ) ?> </td>
                                      <td style="border-bottom:solid #000 1px"> => </td>
                                      <td style="font-family: sans-serif; font-size: 16px; vertical-align: top;  text-align: center; padding:10px; color:#000;border-bottom:solid #000 1px  " valign="top" align="left" >  12 </td>
                                      
                                    </tr>

                                    <tr>
                                      <td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border-bottom:solid #000 1px " valign="top" align="right" >  <?php esc_html_e( 'Company Name', 'the-stnc-map' ) ?> </td>
                                      <td style="border-bottom:solid #000 1px"> => </td>

                                      <td style="font-family: sans-serif; font-size: 16px; vertical-align: top;  text-align: center; padding:10px; color:#000;border-bottom:solid #000 1px" valign="top" align="left" >  semol yailim </td>

                                      <td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px; color:#000 ; border-left:solid #000 1px;border-bottom:solid #000 1px " valign="top" align="center" > <?php esc_html_e( 'Building square meters', 'the-stnc-map' ) ?> </td>
                                      <td style="border-bottom:solid #000 1px"> => </td>
                                      <td style="font-family: sans-serif; font-size: 16px; vertical-align: top;  text-align: center; padding:10px; color:#000;border-bottom:solid #000 1px  " valign="top" align="left" >  12 </td>
                                    </tr>
                            

                                    <tr>
                                      <td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border-bottom:solid #000 1px " valign="top" align="right" > <?php esc_html_e( 'Company email address', 'the-stnc-map' ) ?> </td>
                                      <td style="border-bottom:solid #000 1px"> => </td>

                                      <td style="font-family: sans-serif; font-size: 16px; vertical-align: top;  text-align: center; padding:10px; color:#000;border-bottom:solid #000 1px" valign="top" align="left" > dss@dd.om </td>

                                      <td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px; color:#000 ; border-left:solid #000 1px;border-bottom:solid #000 1px " valign="top" align="center" > <?php esc_html_e( 'Company phone', 'the-stnc-map' ) ?> </td>
                                      <td style="border-bottom:solid #000 1px"> => </td>
                                      <td style="font-family: sans-serif; font-size: 16px; vertical-align: top;  text-align: center; padding:10px; color:#000;border-bottom:solid #000 1px  " valign="top" align="left" >  656sssss5656 </td>
                                    </tr>

                            
                                    <tr>
                                      <td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;border-bottom:solid #000 1px " valign="top" align="right" > <?php esc_html_e( 'Company website', 'the-stnc-map' ) ?> </td>
                                      <td style="border-bottom:solid #000 1px"> => </td>

                                      <td style="font-family: sans-serif; font-size: 16px; vertical-align: top;  text-align: center; padding:10px; color:#000;border-bottom:solid #000 1px" valign="top" align="left" > dss@dssssss.om </td>

                                      <td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px; color:#000 ; border-left:solid #000 1px;border-bottom:solid #000 1px " valign="top" align="center" > <?php esc_html_e( 'Detailed information about the company', 'the-stnc-map' ) ?> </td>
                                      <td style="border-bottom:solid #000 1px"> => </td>
                                      <td style="font-family: sans-serif; font-size: 16px; vertical-align: top;  text-align: center; padding:10px; color:#000;border-bottom:solid #000 1px  " valign="top" align="left" >  TEKNOCC ARGE İNOVASYON LİMİTED ŞİRKETİ </td>
                                    </tr>


                               




                                  </tbody>
                                </table>

                          

                                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                  <tbody>
                                  <tr>
                                      <td style="font-family: sans-serif; font-size: 15px; font-weight:bold; vertical-align: top;  text-align: center; padding:10px;  color:#000;" valign="top" align="right" > <?php esc_html_e( 'Address', 'the-stnc-map' ) ?> </td>
                                    

                                      <td style="font-family: sans-serif; font-size: 16px; vertical-align: top;  text-align: center; padding:10px; color:#000;" valign="top" align="left" > Yıldırım Beyazıt Mah. Aşık Veysel Blv. ERÜ TGB İdare ve Kuluçka-1 Binası No:61/2 3039 Melikgazi/KAYSERİ </td>

                               
                                    </tr>
                                  </tbody>
                                </table>



                              </td>
                            </tr>
                          </tbody>
                        </table>



                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; width: 100%;" width="100%">
                          <tbody>
                            <tr>
                              <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;" valign="top">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                  <tbody>
                                    <tr>
                                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border-radius: 5px; text-align: center; background-color: #3498db;" valign="top" align="center" bgcolor="#3498db"> <a href="http://htmlemail.io" target="_blank" style="border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; display: inline-block; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-decoration: none; text-transform: capitalize; background-color: #3498db; border-color: #3498db; color: #ffffff;">Web Sitesine Gir</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <!-- <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">This is a really simple email template. Its sole purpose is to get the recipient to click the button with no distractions.</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">Good luck! Hope it works.</p> -->
                      </td>
                    </tr>




                    <div class="dcf-overflow-x-auto" tabindex="0">
<table class="dcf-table dcf-table-bordered dcf-table-striped dcf-w-100%">
	<caption>Genel Bilgi</caption>
	<thead>
		<tr>
			<th class="dcf-txt-center" scope="col"><span><strong>Ikinci Bina</strong></span></th>
			<th class="dcf-txt-center" scope="col">Ikinci Bina</th>
			<th class="dcf-txt-center" scope="col">Ucuncu Bina</th>
			<th class="dcf-txt-center" scope="col">Dorduncu Bina</th>
			<th class="dcf-txt-center" scope="col">Besinci Bina</th>
		</tr>
	</thead>
	<tbody>
		<tr>
        <td >54 Total Office</td>
			<td data-label="Ikinci Bina">% 93 FULL</td>
			<td data-label="Ucuncu Bina">% 93 FULL</td>
			<td data-label="Dorduncu Bina">% 93 FULL</td>
			<td class="dcf-txt-center" data-label="Besinci Bina">% 93 FULL</td>
		</tr>
		<tr>
			<td >54 Total Office</td>
			<td data-label="Ikinci Bina">54 Total Office</td>
			<td data-label="Ucuncu Bina">4 Empty Office</td>
			<td data-label="Dorduncu Bina">54 Total Office</td>
			<td data-label="Besinci Bina">4 Empty Office</td>
		</tr>
		<tr>
        <td >54 Total Office</td>
			<td data-label="Ikinci Bina">54 Total Office</td>
			<td data-label="Ucuncu Bina">4 Empty Office</td>
			<td data-label="Dorduncu Bina">54 Total Office</td>
			<td data-label="Besinci Bina">4 Empty Office</td>
		</tr>
		<tr>
		<td >54 Total Office</td>
			<td data-label="Ikinci Bina">4 Empty Office</td>
			<td data-label="Ucuncu Bina">54 Total Office</td>
			<td data-label="Dorduncu Bina">4 Empty Office</td>
			<td data-label="Besinci Bina">4 Empty Office</td>
		</tr>
	</tbody>
</table></div>




<table class="dcf-table dcf-table-responsive dcf-table-bordered dcf-table-striped dcf-w-100%">
	<caption>BOS OFISLER</caption>
	<thead>
		<tr>
			<th class="dcf-txt-center" scope="col">Bina / Kat </th>
			<th class="dcf-txt-center" scope="col">Ofis Numarasi</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="dcf-txt-center">TEKNO-1 / ZEMİN KAT </td>
			<td class="dcf-txt-center">12</td>
		</tr>
	</tbody>
</table>


                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>
            <!-- END CENTERED WHITE CONTAINER -->

            <!-- START FOOTER -->
            <div class="footer" style="clear: both; margin-top: 10px; text-align: center; width: 100%;">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                <tr>
                  <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #999999; font-size: 12px; text-align: center;" valign="top" align="center">
                    <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Company Inc, 3 Abbey Road, San Francisco CA 94102</span>
                    <br> Don't like these emails? <a href="http://i.imgur.com/CScmqnj.gif" style="text-decoration: underline; color: #999999; font-size: 12px; text-align: center;">Unsubscribe</a>.
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #999999; font-size: 12px; text-align: center;" valign="top" align="center">
                    Powered by <a href="http://htmlemail.io" style="color: #999999; font-size: 12px; text-align: center; text-decoration: none;">HTMLemail</a>.
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
      </tr>
    </table>
  </body>
</html>



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
