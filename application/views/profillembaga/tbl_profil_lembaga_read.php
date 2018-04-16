<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?><div class="">
    <!-- Tab -->
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Tampil Data <small>Tbl_profil_lembaga</small></h2> &nbsp&nbsp&nbsp&nbsp
          <ul class="nav navbar-right panel_toolbox">
            <li> <a href="<?php echo site_url('profillembaga') ?>"><i class="fa fa-sign-out"></i></a></li>
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
<table class="table table-bordered">
<tr>
                    <td width="200">Nama Lembaga <?php echo form_error('nama_lembaga') ?></td><td><input type="text" readonly=""  class="form-control" name="nama_lembaga" id="nama_lembaga" placeholder="Nama Lembaga" value="<?php echo $nama_lembaga; ?>" /></td>
                    </tr>
 <tr>
                    <td width="200">Alamat <?php echo form_error('alamat') ?></td><td> <textarea class="form-control" readonly="" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea></td>
                    </tr>
<tr>
                    <td width="200">Provinsi <?php echo form_error('provinsi') ?></td><td><input type="text" readonly=""  class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?php echo $provinsi; ?>" /></td>
                    </tr>
<tr>
                    <td width="200">Kabupaten <?php echo form_error('kabupaten') ?></td><td><input type="text" readonly=""  class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten" value="<?php echo $kabupaten; ?>" /></td>
                    </tr>
<tr>
                    <td width="200">No Telpon <?php echo form_error('no_telpon') ?></td><td><input type="text" readonly=""  class="form-control" name="no_telpon" id="no_telpon" placeholder="No Telpon" value="<?php echo $no_telpon; ?>" /></td>
                    </tr>
 <tr>
                    <td width="200">Logo <?php echo form_error('logo') ?></td><td> <textarea class="form-control" readonly="" rows="3" name="logo" id="logo" placeholder="Logo"><?php echo $logo; ?></textarea></td>
                    </tr>
<tr>
                    <td></td><td> <a href="<?php echo site_url('profillembaga') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td>
                    </tr>
            </table>
           </div>   
        </div>
        <div class="clearfix"></div>
        </div>