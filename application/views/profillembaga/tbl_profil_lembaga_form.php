<div class="">
  <!-- Tab -->
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>PROFIL LEMBAGA</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li> <a href="<?php echo base_url(); ?>"><i class="fa fa-sign-out"></i></a></li>
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
       <form action="<?php echo $action; ?>" method="post">
        <table class="table table-bordered table-responsive">
          <tr><td width='200'>Nama Lembaga <?php echo form_error('nama_lembaga') ?></td><td><input type="text" class="form-control" name="nama_lembaga" id="nama_lembaga" placeholder="Nama Lembaga" value="<?php echo $nama_lembaga; ?>" /></td>
           <td rowspan="5" width="350" align="center">
            <p></p>
            <img src="<?php echo base_url()?>assets/logo_lembaga/<?php echo $logo;?>" width="250px" borde="1">
          </td></tr>

          <tr><td width='200'>Alamat <?php echo form_error('alamat') ?></td><td> <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea></td></tr>
          <tr><td width='200'>Provinsi <?php echo form_error('provinsi') ?></td><td><input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?php echo $provinsi; ?>" /></td></tr>
          <tr><td width='200'>Kabupaten <?php echo form_error('kabupaten') ?></td><td><input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten" value="<?php echo $kabupaten; ?>" /></td></tr>
          <tr><td width='200'>No Telpon <?php echo form_error('no_telpon') ?></td><td><input type="text" class="form-control" name="no_telpon" id="no_telpon" placeholder="No Telpon" value="<?php echo $no_telpon; ?>" /></td></tr>

          <tr><td width='200'>Logo <?php echo form_error('logo') ?></td><td> 
            <!-- <input type="text" class="form-control" name="logo" id="logo" placeholder="Logo" value="<?php echo $logo; ?>" /> -->
            <!-- <input type="file" name="logo" id="logo"> -->
            <label for="file">Pilih file gambar jpg|png|gif, maks 500kb</label>
            <input name="logo" type="file" id="logo">
          </td></tr>
          <tr>
            <td>
            </td>
            <td>
              <input type="hidden" name="id_lembaga" value="<?php echo $id_lembaga; ?>" /> 
              <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>&nbsp&nbsp&nbsp&nbsp
              <a href="<?php echo base_url(); ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
            </td>
          </tr>
        </table>
      </form>
    </div>   
  </div>
  <div class="clearfix"></div>
</div>