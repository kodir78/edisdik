<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA TBL_SEKOLAH</h3>
                         <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
                        
                    </div>
        
        <div class="box-body">
        <div style="padding-bottom: 10px;">
        <?php echo anchor(site_url('sekolah/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('sekolah/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-info btn-sm"'); ?></div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="30px">No</th>
		    <th>Npsn</th>
		    <th>Nss</th>
		    <th>Id Jenjang Sekolah</th>
		    <th>Nama Sekolah</th>
		    <th>Status Sekolah</th>
		    <th>Id Status Kepemilikan</th>
		    <th>Id Opdpembina</th>
		    <th>Kebutuhan Khusus</th>
		    <th>Mbs</th>
		    <th>Penerima Bos</th>
		    <th>Sertifikat Iso</th>
		    <th>Id Kategori Wilayah</th>
		    <th>Id Waktu Penyelengaraan</th>
		    <th>Provinci Id</th>
		    <th>Regency Id</th>
		    <th>Id Distrcs</th>
		    <th>Id Villages</th>
		    <th>No Sk Pendirian</th>
		    <th>Tgl Sk</th>
		    <th>File Pendirian</th>
		    <th>Logo</th>
		    <th>Tgl Input</th>
		    <th>User Input</th>
		    <th>Tgl Update</th>
		    <th>User Update</th>
		    <th width="200px">Action</th>
                </tr>
            </thead>
	    
        </table>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
      dataTables.bootstrap.js') ?>"></script>
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
                    ajax: {"url": "sekolah/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_data_sekolah",
                            "orderable": true
                        },{"data": "npsn"},{"data": "nss"},{"data": "id_jenjang_sekolah"},{"data": "nama_sekolah"},{"data": "status_sekolah"},{"data": "id_status_kepemilikan"},{"data": "id_opdpembina"},{"data": "kebutuhan_khusus"},{"data": "mbs"},{"data": "penerima_bos"},{"data": "sertifikat_iso"},{"data": "id_kategori_wilayah"},{"data": "id_waktu_penyelengaraan"},{"data": "provinci_id"},{"data": "regency_id"},{"data": "id_distrcs"},{"data": "id_villages"},{"data": "no_sk_pendirian"},{"data": "tgl_sk"},{"data": "file_pendirian"},{"data": "logo"},{"data": "tgl_input"},{"data": "user_input"},{"data": "tgl_update"},{"data": "user_update"},
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