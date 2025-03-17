<?php
    //get event trıgger
    //page=stnc_map_view & st_trigger === 'show'



    ?>
<?php
    include "_header-show.php";
    
    $scheme_media_id = $map->scheme_media_id;
    $scheme_media_id = wp_get_attachment_image_src($scheme_media_id, "full");
?>
<main class="flex-shrink-0" style="margin-top:88px">
    <div class="stnc-container-fluid">
        <div class="stnc-row">
            <div class="stnc-col-9" style="margin:0px!important">
                <div id="ex-040-stage" class="stage-m stage-m-size">
                    <div id="ex-040-wall1">
                        <img src="<?php echo $scheme_media_id[0]; ?> " alt="bina">
                        <?php foreach ($results as $key => $result):
                            $image = "";
                            
                            if ($result->media_id == "") {
                                $media_id = wp_get_attachment_image_src(
                                    $result->media_id,
                                    "thumb"
                                );
                                $image = "<img src=''.$media_id[0].'' width='175'>";
                            }
                            
                            $data = str_replace(
                                [" ", "\\"],
                                "",
                                $result->map_location
                            );
                            $position = json_decode(
                                $data,
                                true,
                                JSON_UNESCAPED_SLASHES
                            );
                            ?>
                        <div data-toggle="tooltip" data-placement="left"
                            style="left:<?php echo $position["left"] != ""
                                ? $position["left"] - 12
                                : "0"; ?>px; top:  <?php echo $position[
                                "top"
                                ] != ""
                                ? $position["top"] - 116
                                : "0"; ?>px;" title="<h4 class='fer'>
                            <?php if ( $result->is_empty === "1" ): ?>   BOŞ OFİS <?php else: ?><?php echo $result->company_name; ?>  <?php endif; ?>
                            </h4> <br> <span>
                            <?php echo $result->phone; ?></span> 
                            <?php echo $result->email; ?> <br><?php echo $result->company_description; ?><br>   <?php echo $image; ?>" data-bs-html="true"
                            id="ex-<?php echo $result->door_number; ?>-draggable" data-bs-toggle="tooltip" class="dragAbsolute">
                            
                            <span class="<?php if ( $result->is_empty === "1" ): ?> dragAbsoluteSpanRed<?php else: ?>dragAbsoluteSpanBlue<?php endif; ?>"><?php echo $result->door_number; ?></span>
                            <span class="dragAbsoluteSpan2"><?php echo $result->square_meters; ?> m2</span>
                        </div>
                        <?php
                            endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-9 -->
            <div class="stnc-col-3">
               
                <div class="stnc-row">
                 
                    <div class="stnc-col-7">
                    <h3 class="btn-secondary text-center" style="padding:5px"><?php echo $building_name; ?> / <?php echo $floor_name; ?></h3>

                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            
                            <div class="d-flex flex-column align-items-start">
                            <span class="badge bg-secondary"><?php esc_html_e( "Information about this building", "the-stnc-map"  ); ?></span>
                                <strong class="d-inline-block mb-2 text-primary"> <strong class="badge bg-primary rounded-pill"><?php echo $totalOffice; ?></strong> <?php esc_html_e(
                                    "Total Office",
                                    "the-stnc-map"
                                    ); ?></strong>
                                <strong class="d-inline-block mb-2 text-success"> <strong class="badge bg-success rounded-pill"><?php echo $totalFullOffice; ?></strong>  <?php esc_html_e(
                                    "Full Office",
                                    "the-stnc-map"
                                    ); ?></strong>
                                <strong class="d-inline-block mb-2 text-warning"><strong class="badge bg-warning rounded-pill"> <?php echo $totalEmptyOffice; ?></strong> <?php esc_html_e(
                                    "Empty Office",
                                    "the-stnc-map"
                                    ); ?></strong>
                            </div>
                        </div>
                        <a href="/wp-admin/admin.php?page=stnc_map_view&st_trigger=editor&building_id=<?php echo $_GET['building_id']?>&floor_id=<?php echo $_GET['floor_id']?>" class="btn btn-danger rounded-pill px-2" type="button"> <?php esc_html_e( "Change Placement", "the-stnc-map"  ); ?></a>
                    </div>

                    <div class="stnc-col-5">
                        <div class="list-group">
                            <label class="list-group-item d-flex gap-3">
                                <span class="pt-1 form-checked-content">
                                    <strong><?php esc_html_e(
                                        "Total area",
                                        "the-stnc-map"
                                        ); ?></strong>
                                    <small class="d-block text-body-secondary">
                                        <svg class="bi me-1" width="1em" height="1em">
                                            <use xlink:href="#calendar-event"></use>
                                        </svg>
                                        <?php echo  $total_area ?> m²
                                    </small>
                                </span>
                            </label>
                            <label class="list-group-item d-flex gap-3">
                                <span class="pt-1 form-checked-content">
                                    <strong><?php esc_html_e(
                                        "Full Field",
                                        "the-stnc-map"
                                        ); ?></strong>
                                    <small class="d-block text-body-secondary">
                                        <svg class="bi me-1" width="1em" height="1em">
                                            <use xlink:href="#calendar-event"></use>
                                        </svg>
                                        <?php echo  $full_area ?> m²
                                    </small>
                                </span>
                            </label>
                            <label class="list-group-item d-flex gap-3">
                                <span class="pt-1 form-checked-content">
                                    <strong><?php esc_html_e(
                                        "Free Space",
                                        "the-stnc-map"
                                        ); ?></strong>
                                    <small class="d-block text-body-secondary">
                                        <svg class="bi me-1" width="1em" height="1em">
                                            <use xlink:href="#alarm"></use>
                                        </svg>
                                        <?php echo  $empty_area ?> m²
                                    </small>
                               <small>     <a href="/wp-admin/admin.php?page=stnc_map_editor_building&st_trigger=show&teknoid=<?php echo $_GET["building_id"]; ?>&id=<?php echo $_GET["floor_id"]; ?>"><?php esc_html_e("Edit / Upload Map", "the-stnc-map"); ?></a></small>
                                </span>
                            </label>
                          
                        </div>
                   </div>

                    <div class="stnc-col-12">
                        <!-- <span class="badge bg-secondary"><?php esc_html_e(
                            "Company List",
                            "the-stnc-map"
                            ); ?></span> -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">#</th> -->
                                    <th scope="col"><?php esc_html_e(
                                        "Door No ",
                                        "the-stnc-map"
                                        ); ?></th>
                                    <th scope="col"><?php esc_html_e(
                                        "Company",
                                        "the-stnc-map"
                                        ); ?></th>
                                    <th scope="col"><?php esc_html_e(
                                        "Action",
                                        "the-stnc-map"
                                        ); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($results as $key => $result):
                                    $key++;
                                    $data = str_replace(
                                        [" ", "\\"],
                                        "",
                                        $result->map_location
                                    );
                                    $position = json_decode(
                                        $data,
                                        true,
                                        JSON_UNESCAPED_SLASHES
                                    );
                                    ?>
                                <tr <?php if (
                                    $result->is_empty === "1"
                                    ): ?> class="table-danger" <?php endif; ?>>
                                    <td><?php echo $result->door_number; ?></td>
                                    <td><?php if (
                                        $result->is_empty === "1"
                                        ): ?> 
                                        <?php esc_html_e(
                                            "Empty Office",
                                            "the-stnc-map"
                                            ); ?>
                                        <?php else: ?>
                                        <?php echo $result->company_name; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="/wp-admin/admin.php?page=stnc_building_company&st_trigger=show&building_id=<?php echo $building_id; ?>&floor_id=<?php echo $floor_id; ?>&id=<?php echo $result->id; ?>"><?php esc_html_e(
                                            "Edit",
                                            "the-stnc-map"
                                            ); ?></a>
                                    </td>
                                </tr>
                                <?php $key++;
                                    endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-lg-3 -->
    </div>
    </div>
</main>
<script>
    jQuery(document).ready(function($) {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
