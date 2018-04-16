
<div class="content-wrapper">
     <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">TAMPIL DATA PROVINCES</h3>
                  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href\="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

            <table class="table table-bordered">        

	
                    <tr>
                    <td width="200">Name Prov <?php echo form_error('name_prov') ?></td><td><input type="text" readonly=""  class="form-control" name="name_prov" id="name_prov" placeholder="Name Prov" value="<?php echo $name_prov; ?>" /></td>
                    </tr>
	
                    <tr>
                    <td></td><td> <a href="<?php echo site_url('provinces') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td>
                    </tr>
	
                </table>
            </div>
        </section>
    </div>
</div>