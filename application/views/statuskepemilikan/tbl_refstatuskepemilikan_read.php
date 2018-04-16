<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?><div class="">
    <!-- Tab -->
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Tampil Data <small>Tbl_refstatuskepemilikan</small></h2> &nbsp&nbsp&nbsp&nbsp
          <ul class="nav navbar-right panel_toolbox">
            <li> <a href="<?php echo site_url('statuskepemilikan') ?>"><i class="fa fa-sign-out"></i></a></li>
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
                    <td width="200">Nama Status Kepemilikan <?php echo form_error('nama_status_kepemilikan') ?></td><td><input type="text" readonly=""  class="form-control" name="nama_status_kepemilikan" id="nama_status_kepemilikan" placeholder="Nama Status Kepemilikan" value="<?php echo $nama_status_kepemilikan; ?>" /></td>
                    </tr>
<tr>
                    <td width="200">Tgl Input <?php echo form_error('tgl_input') ?></td><td><input type="text" readonly=""  class="form-control" name="tgl_input" id="tgl_input" placeholder="Tgl Input" value="<?php echo $tgl_input; ?>" /></td>
                    </tr>
<tr>
                    <td width="200">User Input <?php echo form_error('user_input') ?></td><td><input type="text" readonly=""  class="form-control" name="user_input" id="user_input" placeholder="User Input" value="<?php echo $user_input; ?>" /></td>
                    </tr>
<tr>
                    <td width="200">Tgl Update <?php echo form_error('tgl_update') ?></td><td><input type="text" readonly=""  class="form-control" name="tgl_update" id="tgl_update" placeholder="Tgl Update" value="<?php echo $tgl_update; ?>" /></td>
                    </tr>
<tr>
                    <td width="200">User Update <?php echo form_error('user_update') ?></td><td><input type="text" readonly=""  class="form-control" name="user_update" id="user_update" placeholder="User Update" value="<?php echo $user_update; ?>" /></td>
                    </tr>
<tr>
                    <td></td><td> <a href="<?php echo site_url('statuskepemilikan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td>
                    </tr>
            </table>
           </div>   
        </div>
        <div class="clearfix"></div>
        </div>