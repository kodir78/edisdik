<div class="row" >
	<div class="col-md-4">
		<h2 style="margin-top:0px">Daftar Sekolah  </h2>
	</div>
	<!-- message -->
	<div class="col-md-4 text-center">
		<div style="margin-top: 4px"  id="message">
			<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
		</div>
	</div>
	<!-- /message -->
</div> 
<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<!-- Button Create | Export -->
				<?php echo anchor(site_url('sekolahcopy/create'), '<i class="fa fa-files-o"></i> Create', 'class="btn btn-sm btn-warning"'); ?>
				<?php echo anchor(site_url('sekolahcopy/excel'), '<i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-sm btn-success"'); ?>
				<!-- /Button Create | Export -->
				<!-- Judul --> 
				<!-- <h2>Tbl_sekolah_copy </h2> -->
				<!-- /Judul --> 
				<ul class="nav navbar-right panel_toolbox">
					<li> <a href="<?php echo base_url(); ?>"><i class="fa fa-sign-out"></i></a></li>
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Settings 1</a></li>
							<li><a href="#">Settings 2</a></li>
						</ul>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">

				<div class='row'>
					<div class='col-md-9'>
						<div style="padding-bottom: 10px;"'>
							<?php echo anchor(site_url('tblsekolahcopy/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
							<?php echo anchor(site_url('tblsekolahcopy/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?></div>
						</div>
						<div class='col-md-3'>
							<form action="<?php echo site_url('tblsekolahcopy/index'); ?>" class="form-inline" method="get">
								<div class="input-group">
									<input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
									<span class="input-group-btn">
										<?php 
										if ($q <> '')
										{
											?>
											<a href="<?php echo site_url('tblsekolahcopy'); ?>" class="btn btn-default">Reset</a>
											<?php
										}
										?>
										<button class="btn btn-primary" type="submit">Search</button>
									</span>
								</div>
							</form>
						</div>
					</div>


					<div class="row" style="margin-bottom: 10px">
						<div class="col-md-4 text-center">
							<div style="margin-top: 8px" id="message">
								<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
							</div>
						</div>
						<div class="col-md-1 text-right">
						</div>
						<div class="col-md-3 text-right">

						</div>
					</div>
					<table class="table table-bordered table-responsive" style="margin-bottom: 10px">
						<tr>
							<th>No</th>
							<th>Npsn</th>
							<th>Id Bentuk Sekolah</th>
							<th>Nama Sekolah</th>
							<th>Status Sekolah</th>
							<th>Regency Id</th>
							<th>Id Districts</th>
							<th>Action</th>
							</tr><?php
							foreach ($tblsekolahcopy_data as $tblsekolahcopy)
							{
								?>
								<tr>
									<td width="10px"><?php echo ++$start ?></td>
									<td><?php echo $tblsekolahcopy->npsn ?></td>
									<td><?php echo $tblsekolahcopy->id_bentuk_sekolah ?></td>
									<td><?php echo $tblsekolahcopy->nama_sekolah ?></td>
									<td><?php echo $tblsekolahcopy->status_sekolah ?></td>
									<td><?php echo $tblsekolahcopy->regency_id ?></td>
									<td><?php echo $tblsekolahcopy->id_districts ?></td>
									<td style="text-align:center" width="200px">
										<?php 
										echo anchor(site_url('tblsekolahcopy/read/'.$tblsekolahcopy->id_data_sekolah),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
										echo '  '; 
										echo anchor(site_url('tblsekolahcopy/update/'.$tblsekolahcopy->id_data_sekolah),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
										echo '  '; 
										echo anchor(site_url('tblsekolahcopy/delete/'.$tblsekolahcopy->id_data_sekolah),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
										?>
									</td>
								</tr>
								<?php
							}
							?>
						</table>
						<div class="row">
							<div class="col-md-6">

							</div>
							<div class="col-md-6 text-right">
								<?php echo $pagination ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>