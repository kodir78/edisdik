<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row" >
    <div class="col-md-4">
        <h2 style="margin-top:0px">Kelola Data User</h2>
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
                <?php echo anchor(site_url('user/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                <?php echo anchor(site_url('user/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
                <?php echo anchor(site_url('user/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?>
                <!-- /Button Create | Export -->
                <!-- Judul --> 
                <!-- <h2>Provinces </h2> -->
                <!-- /Judul --> 
                <ul class="nav navbar-right panel_toolbox">
                    <li> <a href="<?php echo base_url(); ?>"><i class="fa fa-sign-out"></i></a></li>
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-bordered table-striped table-responsive" id="mytable">
                    <thead>
                        <tr>
                            <th width="30px">No</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Nama Level</th>
                            <th>Status</th>
                            <th width="200px">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th width="30px">No</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Nama Level</th>
                            <th>Status</th>
                            <th width="200px">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- DataTables Script -->
<script src="<?php echo base_url('assets/vendors/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables/dataTables.bootstrap.js') ?>"></script>

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
            ajax: {"url": "user/json", "type": "POST"},
            columns: [
            {
                "data": "id_users",
                "orderable": false
            },{"data": "full_name"},{"data": "email"},{"data": "nama_level"},{"data": "is_aktif"},
            {
                "data" : "action",
                "orderable": false,
                "className" : "text-center"
            }
            ],
            order: [[0, 'desc']],
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