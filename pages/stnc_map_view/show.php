<?php
//get event trıgger
//page=stnc_map_view & st_trigger === 'show'

?>

<?php include ("_header-show.php");

$scheme_media_id = $map->scheme_media_id;
$scheme_media_id = wp_get_attachment_image_src($scheme_media_id, 'full');
?>

<main class="flex-shrink-0" style="margin-top:88px">
    <div class="container-fluid">
        <div class="row">
            <h3><?php echo $binaName ?> / <?php echo $kat_adi ?></h3>
            <div class="col-lg-9">
                <div id="ex-040-stage" class="stage-m stage-m-size">
                    <div id="ex-040-wall1">
                    <img src="<?php echo $scheme_media_id[0]; ?> " alt="bina">
                        <?php
                        foreach ($results as $key => $result):
                            $image = "";

                        if ($result->media_id == "")
                        {
                            $media_id = wp_get_attachment_image_src($result->media_id, 'thumb');
                            $image = "<img src=''.$media_id[0].'' width='175'>";
                        }

                        $data = str_replace([" ", '\\'], null, $result->map_location);
                        $position = json_decode($data, true, JSON_UNESCAPED_SLASHES);
                         ?>
                        <div data-toggle="tooltip" data-placement="left"
                            style="left:<?php echo $position["left"] != "" ? $position["left"] - 12 : '0'; ?>px; top:  <?php echo $position["top"] != "" ? $position["top"] - 116 : '0'; ?>px;" title="<h4 class='fer'>
                            <?php if ($result->is_empty === "1"): ?>   BOŞ OFİS <?php
    else: ?> <?php echo $result->company_name; ?> <?php
    endif; ?>
                         </h4> <br> <span>
                                    <?php echo $result->phone ?></span> 
                                    <?php echo $result->email ?> <br><?php echo $result->company_description ?><br>   <?php echo $image ?>" data-bs-html="true"
                            id="ex-<?php echo $result->door_number; ?>-draggable" data-bs-toggle="tooltip" class="dragAbsolute">
                            <span class="dragAbsoluteSpan1"><?php echo $result->door_number; ?></span>
                            <span class="dragAbsoluteSpan2"><?php echo $result->square_meters; ?> m2</span>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div><!-- /.col-lg-2 -->

            <div class="col-lg-3">

            <div class="col-md-12">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary"> <strong><?php echo $totalOffice  ?></strong> <?php esc_html_e('Total Office', 'the-stnc-map') ?></strong>
                    <strong class="d-inline-block mb-2 text-success"> <strong><?php echo $totalFullOffice ?></strong>  <?php esc_html_e('Full Office', 'the-stnc-map') ?></strong>
                    <strong class="d-inline-block mb-2 text-warning"><strong><?php echo $totalEmptyOffice ?></strong> <?php esc_html_e('Empty Office', 'the-stnc-map') ?></strong>
                    <!-- <strong class="d-inline-block mb-2 text-primary"><strong>487.69</strong> M2</strong> -->
                    </div>
                </div>
            </div>
                <span class="badge bg-secondary"><?php esc_html_e('Company List', 'the-stnc-map') ?></span>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <!-- <th scope="col">#</th> -->
                            <th scope="col"><?php esc_html_e('Door No ', 'the-stnc-map') ?></th>
                    <th scope="col"><?php esc_html_e('Company', 'the-stnc-map') ?></th>
                  
                    <th scope="col"><?php esc_html_e('Action', 'the-stnc-map') ?></th>
                        </tr>
                    </thead>
                    <tbody>

                  <?php
                    foreach ($results as $key => $result):
                        $key++;
                        $data = str_replace([" ", '\\'], null, $result->map_location);
                        $position = json_decode($data, true, JSON_UNESCAPED_SLASHES);
                  ?>
                        <tr <?php if ($result->is_empty === "1"): ?> class="table-danger" <?php endif; ?>>
                            <td><?php echo $result->door_number; ?></td>
                            <td><?php if ($result->is_empty === "1"): ?> 
                             <?php esc_html_e('Empty Office', 'the-stnc-map') ?>
                              <?php else: ?>
                              <?php echo $result->company_name; ?>
                               <?php endif; ?>
                            </td>

                            <td>
                                <a href="/wp-admin/admin.php?page=stnc_building_ext&st_trigger=show&binaid=<?php echo $binaId ?>&kat=<?php echo $katId ?>&id=<?php echo $result->id; ?>"><?php esc_html_e('Edit', 'the-stnc-map') ?></a>
                            </td>
                        </tr>
                        <?php $key++;
                        endforeach
                        ?>
                    </tbody>
                </table>
            </div><!-- /.col-lg-3 -->
        </div>
    </div>
</main>
<script>
jQuery(document).ready(function($) {
    $('[data-toggle="tooltip"]').tooltip()
})
</script>
