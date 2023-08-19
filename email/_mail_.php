<?php
// require "email_style.php";
// require "email_building_info.php";
// require "email_button.php";
// require "email_general_info.php";
// require "email_empty_office_list.php";
// require "email_footer.php";
function stnc_wp_floor_plans_Email_Set_content_type(){
  return "text/html";
}

add_filter( 'wp_mail_content_type','stnc_wp_floor_plans_Email_Set_content_type' );



//I could send this ($door_number,$company_name,$square_meters,$email,$phone,$web_site,$map_location,$company_description,$address ) 
//data with function but building and floor name is required, so it didn't work
function stnc_wp_floor_plans_send_email($door_number,$company_name,$square_meters,$email,$phone,$web_site,$map_location,$company_description,$address,$building_id,$floor_id,$status){

//user posted variables
// $name = "Erciyes-Teknopark IT";
$options = get_option( 'stnc_wp_floor_option' ); 
$to = get_option('admin_email');

$message=stnc_wp_floor_mail_renderHtml($door_number,$company_name,$square_meters,$email,$phone,$web_site,$map_location,$company_description,$address,$building_id,$floor_id,$status);

$subject = $options['mail_subject'];

if (($options['is_mail_send'])) :
    if (!empty($options['email_adress'])) :
        foreach ($options['email_adress'] as $key =>  $option) :     
          if (stnc_wp_floor_validateEMAIL($option["mailadress"])) {
            $email= $option["mailadress"];
            $headers = 'From: '. $email . "\r\n" .
                         'Reply-To: ' . $email . "\r\n";
            $sent = wp_mail($to, $subject, $message , $headers);
            // $sent = wp_mail($to, $subject, $message , $headers);
  
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
//require_once build_name( __FILE__ ) .'classes/setup.class.php';

function stnc_wp_floor_mail_renderHtml($door_number,$company_name,$square_meters,$email,$phone,$web_site,$map_location,$company_description,$address,$building_id,$floor_id,$status) {
  $data=stnc_wp_floor_mail_outputHtml($door_number,$company_name,$square_meters,$email,$phone,$web_site,$map_location,$company_description,$address,$building_id,$floor_id,$status); 
  /* TODO: maybe options add ?? 
  $file="template.html";
  if (file_exists(plugin_dir_path(__FILE__) . $file) == false) {
    throw new Exception('View not found in '. $file);
    return false;
   }
 // file_put_contents("template.html",  $data);
  $myfile = fopen( plugin_dir_path(__FILE__) . $file, "w") or die("Unable to open file!");
  fwrite($myfile, $data);
  fclose($myfile);
  */
  return  $data;
}


function stnc_wp_floor_mail_outputHtml($door_number,$company_name,$square_meters,$email,$phone,$web_site,$map_location,$company_description,$address,$building_id,$floor_id,$status) {
  // echo plugin_dir_path(__FILE__) ."render/_main.php";
  // die;
  if (file_exists(plugin_dir_path(__FILE__) ."render/_main.php") == false) {
      throw new Exception('View not found in render/_main.php');
      return false;
  }
  ob_start();
  require(plugin_dir_path(__FILE__) ."/render/_main.php");
  $output = ob_get_clean();
  return $output;
}