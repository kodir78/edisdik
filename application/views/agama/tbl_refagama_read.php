<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?><div class="">
    <!-- Tab -->
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Tampil Data <small>Agama</small></h2> &nbsp&nbsp&nbsp&nbsp
          <ul class="nav navbar-right panel_toolbox">
            <li> <a href="<?php echo site_url('agama') ?>"><i class="fa fa-sign-out"></i></a></li>
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>P
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
        <td width="200">Agama <?php echo form_error('agama') ?></td><td><input type="text" readonly=""  class="form-control" name="agama" id="agama" placeholder="Agama" value="<?php echo $agama; ?>" /></td>
    </tr>
    <tr>
        <td></td><td> <a href="<?php echo site_url('agama') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td>
    </tr>
</table>
</div>   
</div>
<div class="clearfix"></div>
</div>