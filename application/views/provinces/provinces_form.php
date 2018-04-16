<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
       <h2>Provinces <?php echo $button ?></h2>
       <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>           <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br />
      <form action="<?php echo $action; ?>" method="post">
        <div class="row">
         <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Name Prov <?php echo form_error('name_prov') ?></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="name_prov" id="name_prov" placeholder="Name Prov" value="<?php echo $name_prov; ?>" />
          </div>
        </div>
      </div>
      <br />
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
         <input type="hidden" name="province_id" value="<?php echo $province_id; ?>" /> 
         <button type="submit" class="btn btn-sm btn-primary"><?php echo '<i class="fa fa-files-o"></i> ', $button ?></button> 
         <a href="<?php echo site_url('provinces') ?>" class="btn btn-sm  btn-success"><i class="fa fa-reply-all"></i> Kembali</a>
       </div>
     </div>
   </form>
 </div>
</div>
</div>
</div>