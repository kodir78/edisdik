<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?><div class="">
    <!-- Tab -->
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Tampil Data <small>V_data_sekolah</small></h2> &nbsp&nbsp&nbsp&nbsp
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
<div class="x_content">
 <br />
<table class="table table-bordered table-responsive">
<tr>
                    <td width="200">Id Data Sekolah <?php echo form_error('id_data_sekolah') ?></td><td><input type="text" readonly=""  class="form-control" name="id_data_sekolah" id="id_data_sekolah" placeholder="Id Data Sekolah" value="<?php echo $id_data_sekolah; ?>" /></td>
                    </tr>
<tr>
                    <td width="200">Nama Bentuk <?php echo form_error('nama_bentuk') ?></td><td><input type="text" readonly=""  class="form-control" name="nama_bentuk" id="nama_bentuk" placeholder="Nama Bentuk" value="<?php echo $nama_bentuk; ?>" /></td>
                    </tr>
<tr>
                    <td width="200">Npsn <?php echo form_error('npsn') ?></td><td><input type="text" readonly=""  class="form-control" name="npsn" id="npsn" placeholder="Npsn" value="<?php echo $npsn; ?>" /></td>
                    </tr>
<tr>
                    <td width="200">Nama Sekolah <?php echo form_error('nama_sekolah') ?></td><td><input type="text" readonly=""  class="form-control" name="nama_sekolah" id="nama_sekolah" placeholder="Nama Sekolah" value="<?php echo $nama_sekolah; ?>" /></td>
                    </tr>
<tr>
                    <td width="200">Status Sekolah <?php echo form_error('status_sekolah') ?></td><td><input type="text" readonly=""  class="form-control" name="status_sekolah" id="status_sekolah" placeholder="Status Sekolah" value="<?php echo $status_sekolah; ?>" /></td>
                    </tr>
<tr>
                    <td width="200">Name Reg <?php echo form_error('name_reg') ?></td><td><input type="text" readonly=""  class="form-control" name="name_reg" id="name_reg" placeholder="Name Reg" value="<?php echo $name_reg; ?>" /></td>
                    </tr>
<tr>
                    <td width="200">Name Dist <?php echo form_error('name_dist') ?></td><td><input type="text" readonly=""  class="form-control" name="name_dist" id="name_dist" placeholder="Name Dist" value="<?php echo $name_dist; ?>" /></td>
                    </tr>
<tr>
                    <td></td><td> <a href="<?php echo site_url('vdatasekolah') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td>
                    </tr>
            </table>
           </div>   
        </div>
        <div class="clearfix"></div>
        </div>