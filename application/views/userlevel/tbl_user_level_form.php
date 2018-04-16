<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
       <h2>Data User Level <?php echo $button ?></h2>
       <ul class="nav navbar-right panel_toolbox">
        <li> <a href="<?php echo site_url('userlevel') ?>"><i class="fa fa-sign-out"></i></a></li>
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>           
        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
    </ul>
    <div class="clearfix"></div>
</div>
<div class="x_content">
  <br />
  <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
    <table class="table table-bordered table-responsive">        
       <tr><td width='200'>Nama Level <?php echo form_error('nama_level') ?></td><td><input type="text" class="form-control" name="nama_level" id="nama_level" placeholder="Nama Level" value="<?php echo $nama_level; ?>" /></td></tr>
        <tr><td></td><td><input type="hidden" name="id_user_level" value="<?php echo $id_user_level; ?>" /> 
            <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
            <a href="<?php echo site_url('userlevel') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
        </table>
    </form>        
</div>   
</div>
<div class="clearfix"></div>
</div>