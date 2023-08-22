<?php 

function stnc_wp_floor_shortcut_page()
{
global $wpdb;
?>
<script>
    //https://jsfiddle.net/5p8k4vno/
function copyData(containerid) {
  var range = document.createRange();
  range.selectNode(containerid); //changed here
  window.getSelection().removeAllRanges(); 
  window.getSelection().addRange(range); 
  document.execCommand("copy");
  window.getSelection().removeAllRanges();
}

</script>
<div class="inside">
            <div class="card shadow1" style="max-width:100%!important">
            Classic Arayuz icin
            <?php esc_html_e( 'Place this code on the page you want to add, it will come to the whole page. If you want to add only one field, see the shortcode menu.', 'the-stnc-map' ) ?>
              <p></p>
              <pre> [stnc_building_classic]</pre>
              <hr>
              Minimal Arayuz icin
              <?php  esc_html_e( 'Place this code on the page you want to add, it will come to the whole page. If you want to add only one field, see the shortcode menu.', 'the-stnc-map' ) ?>

              <pre> [stnc_building_minimal perpage=40]</pre>
              <p>perpage : her sayfada kac adet firma gosterilecek </p>
              <hr>
                <h2><?php esc_html_e( 'Shortcode List for Company Lists', 'the-stnc-map' ) ?></h2>
                <p><?php esc_html_e( 'shortcode ; keywords written between square brackets', 'the-stnc-map' ) ?></p>  
                <a href="https://www.kemalkefeli.com.tr/wordpresse-shortcode-ekleme.html"><?php esc_html_e( 'Detailed information', 'the-stnc-map' ) ?></a>
                <strong><?php esc_html_e( 'Sample Code', 'the-stnc-map' ) ?></strong>
                <pre>[stnc_building title="TEKNO-1 - BODRUM KAT" id="1"]</pre>
                <p><mark class="dont"><?php esc_html_e( 'Adding', 'the-stnc-map' ) ?></mark>&nbsp;  <?php esc_html_e( 'add the above code inside the page', 'the-stnc-map' ) ?></p>
       
            </div>
        </div>

<?php 


$wp_stnc_map_floors1 =$wpdb->prefix . 'stnc_map_building';
$sql = "SELECT * FROM " . $wp_stnc_map_floors1 . ' ';
    $buildingsList = $wpdb->get_results($sql);
    foreach ($buildingsList as $building) :
      echo "<br>";
       echo "<div style='color:red'>"?> <?php echo $main_building_name=$building->name ?> <?php echo "</div>"?>
        <?php echo "<br>"?>
        <?php  $wp_stnc_map_floors =$wpdb->prefix . 'stnc_map_floors where building_id='.$building->id.'';
        $sql = "SELECT * FROM " . $wp_stnc_map_floors . ' ';
    
        $buildingsList = $wpdb->get_results($sql);
            foreach ($buildingsList as $building) : ?>
              
              <?php echo "<br>"?>
              <?php  $bina=htmlspecialchars('[stnc_building title="'.$main_building_name.' - '.$building->name.'" id="'.$building->id.'"]') ?>
               <?php echo '<label>'.$building->name.'</label><input  type="text" id="blogname" value="'.$bina.'" class="regular-text">'?>
           
               <div style="position:fixed;left:-999999px;right:-999999px" id="selectText<?php echo $building->id ?>"><?php echo $bina?></div>
               <button type="button" onclick="copyData(selectText<?php echo $building->id ?>)"><?php esc_html_e( 'Copy Shortcode', 'the-stnc-map' ) ?></button>
               <?php echo "<br>"?>
             <?php endforeach ; ?>
          
    <?php endforeach ;
 
 } 
 // [stnc_building title="tekno 1" id="12"]
