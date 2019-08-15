<?php
	if(isset($_GET['form'])&& $_GET['form']=="tambah"){
		include("../kontent/".$_GET['halaman']."_tambah.php");
	}else if(isset($_GET['form'])&& $_GET['form']=="ubah"){
		include("../kontent/".$_GET['halaman']."_edit.php");
	}
?>
<div class="modal fade" id="modalInfo">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="infoJudul"></h4>
      </div>
      <div class="modal-body">
        <p id="infoSalah"></p>
      </div>
      <div id="statusHapus" class="modal-footer">
		<button id="statusHapus" type="button" tabel="pendonor" col="id_pendonor" class="btn btn-danger delete_class"><i class="fa fa-trash"></i> Hapus</button>
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
      </div>
	  <div id="statusOK" class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<div id="form_tabel">
<section class="content-header">
<h1>
Pendonor
</h1>
<ol class="breadcrumb">
<li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li class="active">Pendonor</li>
</ol>
</section>
<!-- Main content -->
<section class="content">
<div class="box">
	<div class="box-header">
	<h3 class="box-title">Data Pendonor</h3>
	<div class="box-tools">
			<div class="input-group input-group-sm" style="width: 150px;">
			  <div class="input-group-btn">
				<a style="margin-right: 1%;" href="<?php echo $eksporexcel; ?>pendonor"><button type="submit" class="btn btn-success" style="margin-right: 0.1%;"><i class="fa fa-file-excel-o"></i> Ekspor Excel</button></a>
				<a href="<?php echo base_url(); ?>admin/pendonor/tambah"><button type="submit" class="btn btn-default"><i class="fa fa-plus"></i> Tambah Data</button></a>
			  </div>
			</div>
	</div>
	</div>
	<div class="box-body table-responsive">
	  <table id="datatble" class="table table-bordered table-striped">
		<thead>
		<tr>
		  <th>No.</th>
		  <th>ID Pendonor</th>
		  <th>Nama</th>
		  <th>Jenis Kelamin</th>
		  <th>Tempat Tanggal Lahir</th>
		  <th>Alamat</th>
		  <th>Pekerjaan</th>
		  <th>Golongan Darah</th>
		  <th>Nomor Telepon</th>
		  <th>Opsi</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$penomoran = 0;
		$query = dapatkandata('pendonor');
		if(mysqli_num_rows($query) != 0){
		while($n = mysqli_fetch_array($query)){
			$id_pendonor = $n['id_pendonor'];
			$nama_lengkap_pendonor = $n['nama_lengkap_pendonor'];
			$jenis_kelamin_pendonor = $n['jenis_kelamin_pendonor'];
			$tanggal_lahir_pendonor = $n['tanggal_lahir_pendonor'];
			$tempat_lahir_pendonor = $n['tempat_lahir_pendonor'];
			$alamat_pendonor = $n['alamat_pendonor'];
			$pekerjaan_pendonor = $n['pekerjaan_pendonor'];
			$golongan_darah_pendonor = $n['golongan_darah_pendonor'];
			$no_telp_pendonor = $n['no_telp_pendonor'];
			$penomoran++;
			?>
			<tr>
				  <td><?php echo $penomoran.'.'?></td>
				  <td><?php echo $id_pendonor;?></td>
				  <td><?php echo $nama_lengkap_pendonor;?></td>
				  <td><?php echo $jenis_kelamin_pendonor;?></td>
				  <td><?php echo $tempat_lahir_pendonor.", ".date('j-F-Y',strtotime($tanggal_lahir_pendonor));?></td>
				  <td><?php echo $alamat_pendonor;?></td>
				  <td><?php echo $pekerjaan_pendonor;?></td>
				  <td><?php echo $golongan_darah_pendonor;?></td>
				  <td><?php echo $no_telp_pendonor;?></td>
				  <td><a href="<?php echo base_url(); ?>admin/pendonor/ubah/<?php echo $id_pendonor;?>"><button type="button" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i> Ubah</button></a> <button type="button" class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#modalHapus" onclick="formHapus('Apakah Anda Ingin Menghapus <?php echo $id_pendonor;?> .?','<?php echo $id_pendonor;?>')"><i class="fa fa-trash"></i> Hapus</button></td>
				</tr>
		<?php
		}
		}else{
			echo'<tr>
				<td colspan="10" align="center">Belum Ada Data Pendonor</td>
				</tr>';
		}
		?>
			</table>
		</div>
	</div>
</section>
</div>



