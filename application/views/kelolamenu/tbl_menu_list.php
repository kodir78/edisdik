<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- page content -->
<div class="row" >
    <div class="col-md-4">
        <h1 style="margin-top:0px"></h1>
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
        <h2>Setting Tampilan Menu <small></small></h2>
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
    <br />
    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tampilkan Menu Berdasarkan Level <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <?php
          echo form_dropdown('tampil_menu',array('ya'=>'YA','tidak'=>'TIDAK'),$setting['value'],array('class'=>'form-control col-md-7 col-xs-12'));
          ?>
      </div>
  </div>
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <button type="submit" class="btn btn-success">Simpan Perubahan</button>
  </div>
</div>
</form>
</div>
</div>
</div>
</div>

<!-- DataTable List -->
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2 class="box-title">Kelola Data Menu</h2>
                <ul class="nav navbar-right panel_toolbox">
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
                <?php echo anchor(site_url('kelolamenu/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                <p></p>
                <table class="table table-bordered table-striped table-responsive" id="mytable">
                    <tbody>
                        <thead>
                           <tr>
                            <th width="30px">No</th>
                            <th>Title</th>
                            <th>Url</th>
                            <th>Icon</th>
                            <th>Is Main Menu</th>
                            <th>Is Aktif</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>

                    <tfoot>
                       <tr>
                        <th width="30px">No</th>
                        <th>Title</th>
                        <th>Url</th>
                        <th>Icon</th>
                        <th>Is Main Menu</th>
                        <th>Is Aktif</th>
                        <th width="100px">Action</th>
                    </tr>
                </tfoot>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
<div class="clearfix"></div>

<!-- DataTable List -->
<!-- DataTables Script -->
<script src="<?php echo base_url('assets/vendors/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables/dataTables.bootstrap.js') ?>"></script>
<!-- Set dataTables properties. -->
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
            ajax: {"url": "kelolamenu/json", "type": "POST"},
            columns: [
            {
                "data": "id_menu",
                "orderable": false
            },{"data": "title"},{"data": "url"},{"data": "icon"},{"data": "is_main_menu"},{"data": "is_aktif"},
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