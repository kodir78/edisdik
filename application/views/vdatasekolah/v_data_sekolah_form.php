<div class="">
    <!-- Tab -->
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><?php echo $button ?> Data <small>V_data_sekolah</small></h2> &nbsp&nbsp&nbsp&nbsp
          <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg">Import</button> &nbsp&nbsp
          <ul class="nav navbar-right panel_toolbox">
            <li> <a href="<?php echo site_url('vdatasekolah') ?>"><i class="fa fa-sign-out"></i></a></li>
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
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
 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Import DataV_data_sekolah</h4>
                        </div>
                        <div class="modal-body">
                            <!-- form start sesuiakan controller/upload-->
                                    <form action="<?php echo site_url();?>vdatasekolah/upload/" enctype="multipart/form-data" method="post">  
                                      <div class="box-body">
                                        <div class="form-group">
                                        Pastikan file sumber yang Anda gunakan ekstensi <b>xls|xlsx</b> &nbsp&nbsp&nbsp&nbsp
                                        <?php echo anchor('downloads/templatedata_.xlsx', 'Download Template', array('class' => 'btn btn-info btn-sm')); ?><br>
                                          <label for="file">File input</label>
                                          <input name="file" type="file" id="file">
                                        </div>
                                      </div>
                                      <!-- /.box-body -->
                                      <div class="box-footer">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-upload"></i> Import</button>&nbsp&nbsp&nbsp&nbsp
                                      </div>
                                    </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>

                      </div>
                    </div>
                  </div>
<div class="x_content">
 <br />
<form action="<?php echo $action; ?>" method="post">
                                            <table class="table table-bordered table-responsive">
<tr>
                                                    <td width="200">
                                                        Id Data Sekolah <?php echo form_error('id_data_sekolah') ?>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="id_data_sekolah" id="id_data_sekolah" placeholder="Id Data Sekolah" value="<?php echo $id_data_sekolah; ?>" />
                                                    </td>
                                                </tr>
<tr>
                                                    <td width="200">
                                                        Nama Bentuk <?php echo form_error('nama_bentuk') ?>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="nama_bentuk" id="nama_bentuk" placeholder="Nama Bentuk" value="<?php echo $nama_bentuk; ?>" />
                                                    </td>
                                                </tr>
<tr>
                                                    <td width="200">
                                                        Npsn <?php echo form_error('npsn') ?>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="npsn" id="npsn" placeholder="Npsn" value="<?php echo $npsn; ?>" />
                                                    </td>
                                                </tr>
<tr>
                                                    <td width="200">
                                                        Nama Sekolah <?php echo form_error('nama_sekolah') ?>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah" placeholder="Nama Sekolah" value="<?php echo $nama_sekolah; ?>" />
                                                    </td>
                                                </tr>
<tr>
                                                    <td width="200">
                                                        Status Sekolah <?php echo form_error('status_sekolah') ?>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="status_sekolah" id="status_sekolah" placeholder="Status Sekolah" value="<?php echo $status_sekolah; ?>" />
                                                    </td>
                                                </tr>
<tr>
                                                    <td width="200">
                                                        Name Reg <?php echo form_error('name_reg') ?>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="name_reg" id="name_reg" placeholder="Name Reg" value="<?php echo $name_reg; ?>" />
                                                    </td>
                                                </tr>
<tr>
                                                    <td width="200">
                                                        Name Dist <?php echo form_error('name_dist') ?>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="name_dist" id="name_dist" placeholder="Name Dist" value="<?php echo $name_dist; ?>" />
                                                    </td>
                                                </tr>
<tr>
                                                    <td>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="" value="<?php echo $; ?>" /> 
                                                        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>&nbsp&nbsp&nbsp&nbsp
                                                        <a href="<?php echo site_url('vdatasekolah') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                        </div>   
                                     </div>
                                     <div class="clearfix"></div>
                                    </div>