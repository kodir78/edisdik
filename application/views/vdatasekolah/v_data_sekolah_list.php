<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
	 <div class="row" >
                    <div class="col-md-4">
                        <h2 style="margin-top:0px">Daftar V_data_sekolah</h2>
                    </div>
                    <!-- message -->
                    <div class="col-md-4 text-center">
                    <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                    </div>
                    <!-- /message -->
                    </div> 
		 <div class="clearfix"></div>
                        <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                    <div class="x_title">
                    <!-- Button Create | Export -->
		<?php echo anchor(site_url('vdatasekolah/create'), '<i class="fa fa-files-o"></i> Create', 'class="btn btn-sm btn-warning"'); ?>
		<?php echo anchor(site_url('vdatasekolah/excel'), '<i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-sm btn-success"'); ?>
		<!-- /Button Create | Export -->
                <!-- Judul --> 
                <!-- <h2>V_data_sekolah </h2> -->
                <!-- /Judul --> 
                <ul class="nav navbar-right panel_toolbox">
                    <li> <a href="<?php echo base_url(); ?>"><i class="fa fa-sign-out"></i></a></li>
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a></li>
                            <li><a href="#">Settings 2</a></li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
	 
                <table class="table table-bordered table-striped table-responsive" id="mytable">
                    <tbody>
                    <thead>
                        <tr>
                            <th width="10px">No</th>
		          <th>Id Data Sekolah</th>
		          <th>Nama Bentuk</th>
		          <th>Npsn</th>
		          <th>Nama Sekolah</th>
		          <th>Status Sekolah</th>
		          <th>Name Reg</th>
		          <th>Name Dist</th>
		          <th width="130px">Aksi</th>
                        </tr>
                    </thead>
	    
                    <tfoot>
                        <tr>
                            <th width="10px">No</th>
		      <th>Id Data Sekolah</th>
		      <th>Nama Bentuk</th>
		      <th>Npsn</th>
		      <th>Nama Sekolah</th>
		      <th>Status Sekolah</th>
		      <th>Name Reg</th>
		      <th>Name Dist</th>
		          <th width="130px">Aksi</th>
                        </tr>
                    </tfoot>
                </tbody>
            </table>
        </div>
        </div>
        </div>
        </div>
	 <!-- DataTables Script -->

	<script src="<?php echo base_url('assets/vendors/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables/dataTables.bootstrap.js') ?>"></script>
	
<!-- Set dataTables properties. -->
<script type="text/javascript">
$(document).ready(function() {
    var t =$('#mytable').DataTable( {
        //Load data for the table's content from an Ajax source
        "ajax": '<?php echo site_url('vdatasekolah/data')?>',
        "order": [[ 2, 'asc' ]],
        //Set datacolumn definition initialisation properties.
        "columns": [
         {
            //Set datacolumn nomor urut.
            "data": null,
            "width": "50px",
            "sClass": "text-center",
            "orderable": false,
        },
        //Set datacolumn field yang akan ditampilkan.
        {"data": "id_data_sekolah"},{"data": "nama_bentuk"},{"data": "npsn"},{"data": "nama_sekolah"},{"data": "status_sekolah"},{"data": "name_reg"},{"data": "name_dist"},
        {
        //Set datacolumn button aksi.
            "data" : "aksi",
            "orderable": false,
            "className" : "text-center",
            "width": "50px"},
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
    <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
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
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "vdatasekolah/json", "type": "POST"},
                    columns: [
                        {
                            "data": "",
                            "orderable": true
                        },{"data": "id_data_sekolah"},{"data": "nama_bentuk"},{"data": "npsn"},{"data": "nama_sekolah"},{"data": "status_sekolah"},{"data": "name_reg"},{"data": "name_dist"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
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
        </script>