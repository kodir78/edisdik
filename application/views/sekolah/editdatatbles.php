<table class="table table-bordered table-striped" id="mytable">
<tbody>
<thead>
<tr>
<th width="10px">No</th>
		    <th>NPSN</th>
		    <th>Bentuk Sekolah</th>
		    <th>Nama Sekolah</th>
		    <th>Status</th>
		    <th>Kabupaten/Kota</th>
		    <th>Kecamatan</th>
		    <th width="103px">Aksi</th>
</tr>
</thead>
	    
<tfoot>
<tr>
<th width="10px">No</th>
		    <th>NPSN</th>
		    <th>Bentuk Sekolah</th>
		    <th>Nama Sekolah</th>
		    <th>Status</th>
		    <th>Kabupaten/Kota</th>
		    <th>Kecamatan</th>
		    <th width="103px">Aksi</th>
</tr>
</tfoot>
</tbody>
</table>
</div>
</div>
</div>
</div>

 //Set datacolumn field yang akan ditampilkan.
        {"data": "npsn"},{"data": "id_bentuk_sekolah"},{"data": "nama_sekolah"},{"data": "status_sekolah"},{"data": "regency_id"},{"data": "id_districts"},
        {


        	'formatter' => function( $d, $row ) {
					return anchor('sekolah/read/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-eye"></i>',"class='label bg-green'").' '.
					anchor('sekolah/update/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-edit"></i>',"class='label bg-blue'");
					return $this->datatables->generate();
				}