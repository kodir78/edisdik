<?php 
$string ="<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>";
$string .= "\n\t <div class=\"row\" >
                    <div class=\"col-md-4\">
                        <h2 style=\"margin-top:0px\">Daftar ".ucfirst($table_name)."</h2>
                    </div>
                    <!-- message -->
                    <div class=\"col-md-4 text-center\">
                    <div style=\"margin-top: 4px\"  id=\"message\">
                    <?php echo \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?>
                    </div>
                    </div>
                    <!-- /message -->
                    </div> "; 
 $string .="\n\t\t <div class=\"clearfix\"></div>
                        <div class=\"row\">
                        <div class=\"col-md-12 col-sm-12 col-xs-12\">
                        <div class=\"x_panel\">
                    <div class=\"x_title\">
                    <!-- Button Create | Export -->";
$string .="\n\t\t<?php echo anchor(site_url('".$c_url."/create'), '<i class=\"fa fa-files-o\"></i> Create', 'class=\"btn btn-sm btn-warning\"'); ?>";

if ($export_excel == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), '<i class=\"fa fa-file-excel-o\"></i> Excel', 'class=\"btn btn-sm btn-success\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), '<i class=\"fa fa-file-word-o\"></i> Word', 'class=\"btn btn-sm btn-primary\"'); ?>";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'), 'PDF', 'class=\"btn btn-sm btn-primary\"'); ?>"; 
}
$string .="\n\t\t<!-- /Button Create | Export -->
                <!-- Judul --> 
                <!-- <h2>".ucfirst($table_name)." </h2> -->
                <!-- /Judul --> 
                <ul class=\"nav navbar-right panel_toolbox\">
                    <li> <a href=\"<?php echo base_url(); ?>\"><i class=\"fa fa-sign-out\"></i></a></li>
                    <li><a class=\"collapse-link\"><i class=\"fa fa-chevron-up\"></i></a>
                    </li>
                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\"><i class=\"fa fa-wrench\"></i></a>
                        <ul class=\"dropdown-menu\" role=\"menu\">
                            <li><a href=\"#\">Settings 1</a></li>
                            <li><a href=\"#\">Settings 2</a></li>
                        </ul>
                    </li>
                    <li><a class=\"close-link\"><i class=\"fa fa-close\"></i></a></li>
                </ul>
                <div class=\"clearfix\"></div>
                </div>
                <div class=\"x_content\">";
                $string .= "\n\t 
                <table class=\"table table-bordered table-striped table-responsive\" id=\"mytable\">
                    <tbody>
                    <thead>
                        <tr>
                            <th width=\"10px\">No</th>";
foreach ($non_pk as $row) {
$string .= "\n\t\t          <th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t          <th width=\"130px\">Aksi</th>
                        </tr>
                    </thead>";

$column_non_pk = array();
foreach ($non_pk as $row) {
    $column_non_pk[] .= "{\"data\": \"".$row['column_name']."\"}";
}
$col_non_pk = implode(',', $column_non_pk);

$string .= "\n\t    
                    <tfoot>
                        <tr>
                            <th width=\"10px\">No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t      <th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t          <th width=\"130px\">Aksi</th>
                        </tr>
                    </tfoot>
                </tbody>
            </table>
        </div>
        </div>
        </div>
        </div>";

$string.="\n\t <!-- DataTables Script -->
\n\t<script src=\"<?php echo base_url('assets/vendors/js/jquery-1.11.2.min.js') ?>\"></script>
<script src=\"<?php echo base_url('assets/vendors/datatables/jquery.dataTables.js') ?>\"></script>
<script src=\"<?php echo base_url('assets/vendors/datatables/dataTables.bootstrap.js') ?>\"></script>\n\t
<!-- Set dataTables properties. -->
<script type=\"text/javascript\">
$(document).ready(function() {
    var t =$('#mytable').DataTable( {
        //Load data for the table's content from an Ajax source
        \"ajax\": '<?php echo site_url('".strtolower($c)."/data')?>',
        \"order\": [[ 2, 'asc' ]],
        //Set datacolumn definition initialisation properties.
        \"columns\": [
         {
            //Set datacolumn nomor urut.
            \"data\": null,
            \"width\": \"50px\",
            \"sClass\": \"text-center\",
            \"orderable\": false,
        },
        //Set datacolumn field yang akan ditampilkan.
        ".$col_non_pk.",
        {
        //Set datacolumn button aksi.
            \"data\" : \"aksi\",
            \"orderable\": false,
            \"className\" : \"text-center\",
            \"width\": \"50px\"},
        ]
    } );
        //Set search.
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    } );
    </script>
`<!-- DataTables json -->
    <script type=\"text/javascript\">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        \"iStart\": oSettings._iDisplayStart,
                        \"iEnd\": oSettings.fnDisplayEnd(),
                        \"iLength\": oSettings._iDisplayLength,
                        \"iTotal\": oSettings.fnRecordsTotal(),
                        \"iFilteredTotal\": oSettings.fnRecordsDisplay(),
                        \"iPage\": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        \"iTotalPages\": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $(\"#mytable\").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: \"loading...\"
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {\"url\": \"".$c_url."/json\", \"type\": \"POST\"},
                    columns: [
                        {
                            \"data\": \"$pk\",
                            \"orderable\": true
                        },".$col_non_pk.",
                        {
                            \"data\" : \"action\",
                            \"orderable\": false,
                            \"className\" : \"text-center\"
                        }
                    ],
                    order: [[0, 'asc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>";

    $hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

    ?>