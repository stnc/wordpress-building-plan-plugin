<?php
// https://codepen.io/desandro/pen/YzPMBx
// uses
// [stnc_building_for_company]




add_shortcode( "stnc_building_minimal",  "stnc_map_stnc_building_minimal_shortcode");


/**
 * Output the form.
 *
 * @param      array  $atts   User defined attributes in shortcode tag
 */
function stnc_map_stnc_building_minimal_shortcode($attr)
{
    global $wpdb;

    $attr = shortcode_atts(
        [
            "perpage" => "",
            "title" => "#",
            "id" => "1",
        ],
        $attr
    );


    // $ver="2.4.0";
    // wp_register_script( "simple-datatable",plugins_url("../../assets/js/simple-datatables.js", __FILE__), "", $ver, false );
    // wp_enqueue_script("simple-datatable");

    $table = $wpdb->prefix . "stnc_map_floors_locations";
    $sql = "SELECT * FROM " . $table . " where is_empty=0 and is_show=1  order by company_name asc";
    $buildingsList = $wpdb->get_results($sql);


    ?>
<style>

table thead {
  background: #eee;
  border-radius: 15px;
}
table thead tr:nth-child(odd) {
  background: #eee;
}
table thead tr:nth-child(odd):hover {
  background: transparent;
}
table tr:nth-child(even) {
  background: #f8f8f8;
}
table tr:nth-child(even):hover {
  background: #dfdfdf;
}
table tr:nth-child(odd) {
  background: white;
}
table tr:nth-child(odd):hover {
  background: #e6e6e6;
}

.dataTable-input,
.dataTable-selector {
  border: 1px solid #eee;
  border-radius: 5px;
}

.dataTable-wrapper.no-footer .dataTable-container {
  border-bottom: 1px solid transparent;
}

.dataTable-top,
.dataTable-bottom {
  padding: 8px 0px;
}

.dataTable-pagination a {
  border-radius: 5px;
}

.datatable-wrapper.no-header .datatable-container {
	border-top: 1px solid #d9d9d9;
}

.datatable-wrapper.no-footer .datatable-container {
	border-bottom: 1px solid #d9d9d9;
}

.datatable-top,
.datatable-bottom {
	padding: 8px 10px;
}

.datatable-top > nav:first-child,
.datatable-top > div:first-child,
.datatable-bottom > nav:first-child,
.datatable-bottom > div:first-child {
	float: left;
}

.datatable-top > nav:last-child,
.datatable-top > div:last-child,
.datatable-bottom > nav:last-child,
.datatable-bottom > div:last-child {
	float: right;
}

.datatable-selector {
	padding: 6px;
}

.datatable-input {
	padding: 6px 12px;
}

.datatable-info {
	margin: 7px 0;
}

/* PAGER */
.datatable-pagination ul {
	margin: 0;
	padding-left: 0;
}

.datatable-pagination li {
	list-style: none;
	float: left;
}

.datatable-pagination li.datatable-hidden {
    visibility: hidden;
}

.datatable-pagination a,
.datatable-pagination button {
	border: 1px solid transparent;
	float: left;
	margin-left: 2px;
	padding: 6px 12px;
	position: relative;
	text-decoration: none;
	color: #333;
    cursor: pointer;
}

.datatable-pagination a:hover,
.datatable-pagination button:hover {
	background-color: #d9d9d9;
}

.datatable-pagination .datatable-active a,
.datatable-pagination .datatable-active a:focus,
.datatable-pagination .datatable-active a:hover,
.datatable-pagination .datatable-active button,
.datatable-pagination .datatable-active button:focus,
.datatable-pagination .datatable-active button:hover {
	background-color: #d9d9d9;
	cursor: default;
}

.datatable-pagination .datatable-ellipsis a,
.datatable-pagination .datatable-disabled a,
.datatable-pagination .datatable-disabled a:focus,
.datatable-pagination .datatable-disabled a:hover,
.datatable-pagination .datatable-ellipsis button,
.datatable-pagination .datatable-disabled button,
.datatable-pagination .datatable-disabled button:focus,
.datatable-pagination .datatable-disabled button:hover {
    pointer-events: none;
    cursor: default;
}

.datatable-pagination .datatable-disabled a,
.datatable-pagination .datatable-disabled a:focus,
.datatable-pagination .datatable-disabled a:hover,
.datatable-pagination .datatable-disabled button,
.datatable-pagination .datatable-disabled button:focus,
.datatable-pagination .datatable-disabled button:hover {
	cursor: not-allowed;
	opacity: 0.4;
}

.datatable-pagination .datatable-pagination a,
.datatable-pagination .datatable-pagination button {
	font-weight: bold;
}

/* TABLE */
.datatable-table {
	max-width: 100%;
	width: 100%;
	border-spacing: 0;
	border-collapse: separate;
}

.datatable-table > tbody > tr > td,
.datatable-table > tbody > tr > th,
.datatable-table > tfoot > tr > td,
.datatable-table > tfoot > tr > th,
.datatable-table > thead > tr > td,
.datatable-table > thead > tr > th {
	vertical-align: top;
	padding: 8px 10px;
}

.datatable-table > thead > tr > th {
	vertical-align: bottom;
	text-align: left;
	border-bottom: 1px solid #d9d9d9;
}

.datatable-table > tfoot > tr > th {
	vertical-align: bottom;
	text-align: left;
	border-top: 1px solid #d9d9d9;
}

.datatable-table th {
	vertical-align: bottom;
	text-align: left;
}

.datatable-table th a {
	text-decoration: none;
	color: inherit;
}

.datatable-table th button,
.datatable-pagination-list button {
    color: inherit;
    border: 0;
    background-color: inherit;
    cursor: pointer;
    text-align: inherit;
    font-weight: inherit;
    font-size: inherit;
}

.datatable-sorter, .datatable-filter {
	display: inline-block;
	height: 100%;
	position: relative;
	width: 100%;
}

.datatable-sorter::before,
.datatable-sorter::after {
	content: "";
	height: 0;
	width: 0;
	position: absolute;
	right: 4px;
	border-left: 4px solid transparent;
	border-right: 4px solid transparent;
	opacity: 0.2;
}


.datatable-sorter::before {
	border-top: 4px solid #000;
	bottom: 0px;
}

.datatable-sorter::after {
	border-bottom: 4px solid #000;
	border-top: 4px solid transparent;
	top: 0px;
}

.datatable-ascending .datatable-sorter::after,
.datatable-descending .datatable-sorter::before,
.datatable-ascending .datatable-filter::after,
.datatable-descending .datatable-filter::before {
	opacity: 0.6;
}

.datatable-filter::before {
    content: "";
    position: absolute;
    right: 4px;
    opacity: 0.2;
    width: 0;
    height: 0;
    border-left: 7px solid transparent;
    border-right: 7px solid transparent;
	border-radius: 50%;
    border-top: 10px solid #000;
    top: 25%;
}

.datatable-filter-active .datatable-filter::before {
    opacity: 0.6;
}

.datatable-empty {
	text-align: center;
}

.datatable-top::after, .datatable-bottom::after {
	clear: both;
	content: " ";
	display: table;
}

table.datatable-table:focus tr.datatable-cursor > td:first-child {
	border-left: 3px blue solid;
}

table.datatable-table:focus {
	outline: solid 1px black;
    outline-offset: -1px;
}

</style>
<table class="table">
    
            <tbody>
             
            <?php
		  	foreach ($buildingsList as $building) : ?>
                <tr>
                    <td><?php echo $building->company_name ?></td>

                  
      <?php if ( current_user_can("editor") ||  current_user_can("administrator")) { ?>  <td>
          <a href="/wp-admin/admin.php?page=stnc_building_company&building_id=1&floor_id=<?php echo $building->floor_id; ?>&st_trigger=show&id=<?php echo $building->id; ?>"><?php esc_html_e( 'edit', 'the-stnc-map' ) ?></a>
          </td> <?php } ?>

               
                </tr>
       
		<?php endforeach ?>
            </tbody>
        </table>
        <!-- CDN -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"></script> -->
        <!-- Custom Code -->
        <script>
		
let options = {
  labels: {
    placeholder: "Ara ...",
    searchTitle: "Liste de arama ",
    pageTitle: "Sayfa {page}",
    perPage: "sayfa başına veriler",
    noRows: "Icerik Bulunamadi",
    info: " {start} ile {end} arasinda {rows} adet firma",
    noResults: "Arama sorgunuzla eşleşen sonuç yok",
},
 perPage:<?php if( ! empty( $attr['perpage'] ) ) {echo $attr['perpage'];} else echo "20" ?>,
};
            new window.simpleDatatables.DataTable("table",options)
        </script>

<?php
}