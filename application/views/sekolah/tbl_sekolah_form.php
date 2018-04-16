<div class="">
    <!-- Tab -->
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><?php echo $button ?> Data <small>Sekolah</small></h2> &nbsp&nbsp&nbsp&nbsp
          <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg">Import</button> &nbsp&nbsp
          <ul class="nav navbar-right panel_toolbox">
            <li> <a href="<?php echo site_url('sekolah') ?>"><i class="fa fa-sign-out"></i></a></li>
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
          <h4 class="modal-title" id="myModalLabel">Impor Data Sekolah</h4>
      </div>
      <div class="modal-body">
          
          <!-- <h4 class="box-title">Import Data  Sekolah</h4> -->
          <!-- form start sesuiakan controller/upload-->
          <form action="<?php echo site_url();?>sekolah/upload/" enctype="multipart/form-data" method="post">  
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
                Npsn <?php echo form_error('npsn') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="npsn" id="npsn" placeholder="Npsn" value="<?php echo $npsn; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Nss <?php echo form_error('nss') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="nss" id="nss" placeholder="Nss" value="<?php echo $nss; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Id Bentuk Sekolah <?php echo form_error('id_bentuk_sekolah') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="id_bentuk_sekolah" id="id_bentuk_sekolah" placeholder="Id Bentuk Sekolah" value="<?php echo $id_bentuk_sekolah; ?>" />
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
                Id Status Kepemilikan <?php echo form_error('id_status_kepemilikan') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="id_status_kepemilikan" id="id_status_kepemilikan" placeholder="Id Status Kepemilikan" value="<?php echo $id_status_kepemilikan; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Id Opdpembina <?php echo form_error('id_opdpembina') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="id_opdpembina" id="id_opdpembina" placeholder="Id Opdpembina" value="<?php echo $id_opdpembina; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Kebutuhan Khusus <?php echo form_error('kebutuhan_khusus') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="kebutuhan_khusus" id="kebutuhan_khusus" placeholder="Kebutuhan Khusus" value="<?php echo $kebutuhan_khusus; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Mbs <?php echo form_error('mbs') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="mbs" id="mbs" placeholder="Mbs" value="<?php echo $mbs; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Penerima Bos <?php echo form_error('penerima_bos') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="penerima_bos" id="penerima_bos" placeholder="Penerima Bos" value="<?php echo $penerima_bos; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Sertifikat Iso <?php echo form_error('sertifikat_iso') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="sertifikat_iso" id="sertifikat_iso" placeholder="Sertifikat Iso" value="<?php echo $sertifikat_iso; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Id Kategori Wilayah <?php echo form_error('id_kategori_wilayah') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="id_kategori_wilayah" id="id_kategori_wilayah" placeholder="Id Kategori Wilayah" value="<?php echo $id_kategori_wilayah; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Id Waktu Penyelengaraan <?php echo form_error('id_waktu_penyelengaraan') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="id_waktu_penyelengaraan" id="id_waktu_penyelengaraan" placeholder="Id Waktu Penyelengaraan" value="<?php echo $id_waktu_penyelengaraan; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                No Sk Pendirian <?php echo form_error('no_sk_pendirian') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="no_sk_pendirian" id="no_sk_pendirian" placeholder="No Sk Pendirian" value="<?php echo $no_sk_pendirian; ?>" />
            </td>
        </tr>
        <tr>
            <td width='200'>
                Tgl Sk <?php echo form_error('tgl_sk') ?>
            </td>
            <td>
                <input type="date" class="form-control" name="tgl_sk" id="tgl_sk" placeholder="Tgl Sk" value="<?php echo $tgl_sk; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                File Pendirian <?php echo form_error('file_pendirian') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="file_pendirian" id="file_pendirian" placeholder="File Pendirian" value="<?php echo $file_pendirian; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Logo <?php echo form_error('logo') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="logo" id="logo" placeholder="Logo" value="<?php echo $logo; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Province Id <?php echo form_error('province_id') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="province_id" id="province_id" placeholder="Province Id" value="<?php echo $province_id; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Regency Id <?php echo form_error('regency_id') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="regency_id" id="regency_id" placeholder="Regency Id" value="<?php echo $regency_id; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Id Districts <?php echo form_error('id_districts') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="id_districts" id="id_districts" placeholder="Id Districts" value="<?php echo $id_districts; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Id Villages <?php echo form_error('id_villages') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="id_villages" id="id_villages" placeholder="Id Villages" value="<?php echo $id_villages; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Alamat <?php echo form_error('alamat') ?>
            </td>
            <td>
                <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
            </td>
        </tr>
        <tr>
            <td width="200">
                Rt <?php echo form_error('rt') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="rt" id="rt" placeholder="Rt" value="<?php echo $rt; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Rw <?php echo form_error('rw') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="rw" id="rw" placeholder="Rw" value="<?php echo $rw; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Dusun <?php echo form_error('dusun') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="dusun" id="dusun" placeholder="Dusun" value="<?php echo $dusun; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Postal Code <?php echo form_error('postal_code') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Postal Code" value="<?php echo $postal_code; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Lintang <?php echo form_error('lintang') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="lintang" id="lintang" placeholder="Lintang" value="<?php echo $lintang; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Bujur <?php echo form_error('bujur') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="bujur" id="bujur" placeholder="Bujur" value="<?php echo $bujur; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Kode Registrasi <?php echo form_error('kode_registrasi') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="kode_registrasi" id="kode_registrasi" placeholder="Kode Registrasi" value="<?php echo $kode_registrasi; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                No Tlp <?php echo form_error('no_tlp') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="no_tlp" id="no_tlp" placeholder="No Tlp" value="<?php echo $no_tlp; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                No Fax <?php echo form_error('no_fax') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="no_fax" id="no_fax" placeholder="No Fax" value="<?php echo $no_fax; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Hp <?php echo form_error('hp') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="hp" id="hp" placeholder="Hp" value="<?php echo $hp; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Email <?php echo form_error('email') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Website <?php echo form_error('website') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="website" id="website" placeholder="Website" value="<?php echo $website; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                No Rekening <?php echo form_error('no_rekening') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="no_rekening" id="no_rekening" placeholder="No Rekening" value="<?php echo $no_rekening; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Nama Bank <?php echo form_error('nama_bank') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="nama_bank" id="nama_bank" placeholder="Nama Bank" value="<?php echo $nama_bank; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Cabang Bank <?php echo form_error('cabang_bank') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="cabang_bank" id="cabang_bank" placeholder="Cabang Bank" value="<?php echo $cabang_bank; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Nama Direkening <?php echo form_error('nama_direkening') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="nama_direkening" id="nama_direkening" placeholder="Nama Direkening" value="<?php echo $nama_direkening; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Luas Tanahmilik <?php echo form_error('luas_tanahmilik') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="luas_tanahmilik" id="luas_tanahmilik" placeholder="Luas Tanahmilik" value="<?php echo $luas_tanahmilik; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Luas Tanahbukanmilik <?php echo form_error('luas_tanahbukanmilik') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="luas_tanahbukanmilik" id="luas_tanahbukanmilik" placeholder="Luas Tanahbukanmilik" value="<?php echo $luas_tanahbukanmilik; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                Nama Wajibpajak <?php echo form_error('nama_wajibpajak') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="nama_wajibpajak" id="nama_wajibpajak" placeholder="Nama Wajibpajak" value="<?php echo $nama_wajibpajak; ?>" />
            </td>
        </tr>
        <tr>
            <td width="200">
                No Npwp <?php echo form_error('no_npwp') ?>
            </td>
            <td>
                <input type="text" class="form-control" name="no_npwp" id="no_npwp" placeholder="No Npwp" value="<?php echo $no_npwp; ?>" />
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <input type="hidden" name="id_data_sekolah" value="<?php echo $id_data_sekolah; ?>" /> 
                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>&nbsp&nbsp&nbsp&nbsp
                <a href="<?php echo site_url('sekolah') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
            </td>
        </tr>
    </table>
</form>
</div>   
</div>
<div class="clearfix"></div>
</div>