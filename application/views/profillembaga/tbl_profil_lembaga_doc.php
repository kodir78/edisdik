<!doctype html>
<html>
    <head>
        <title>SIM Terpadu</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tbl_profil_lembaga List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Lembaga</th>
		<th>Alamat</th>
		<th>Provinsi</th>
		<th>Kabupaten</th>
		<th>No Telpon</th>
		<th>Logo</th>
		
            </tr><?php
            foreach ($profillembaga_data as $profillembaga)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $profillembaga->nama_lembaga ?></td>
		      <td><?php echo $profillembaga->alamat ?></td>
		      <td><?php echo $profillembaga->provinsi ?></td>
		      <td><?php echo $profillembaga->kabupaten ?></td>
		      <td><?php echo $profillembaga->no_telpon ?></td>
		      <td><?php echo $profillembaga->logo ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>