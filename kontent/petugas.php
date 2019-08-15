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
		<button id="statusHapus" type="button" tabel="petugas" col="id_petugas" class="btn btn-danger delete_class"><i class="fa fa-trash"></i> Hapus</button>
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
Petugas
</h1>
<ol class="breadcrumb">
<li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li class="active">Petugas</li>
</ol>
</section>
<!-- Main content -->
<section class="content">
<div class="box">
	<div class="box-header">
	<h3 class="box-title">Data Petugas</h3>
	<div class="box-tools">
			<div class="input-group input-group-sm">
			<div class="input-group-btn">
				<a style="margin-right: 1%;" href="<?php echo $eksporexcel; ?>petugas_view"><button type="submit" class="btn btn-success" style="margin-right: 0.1%;"><i class="fa fa-file-excel-o"></i> Ekspor Excel</button></a>
				<a href="<?php echo base_url(); ?>admin/petugas/tambah"><button type="submit" class="btn btn-default"><i class="fa fa-plus"></i> Tambah Data</button></a>
			  </div>
			</div>
	</div>
	</div>
	<div class="box-body table-responsive">
	  <table id="datatble" class="table table-bordered table-striped">
		<thead>
		<tr>
		  <th>No.</th>
		  <th>ID Petugas</th>
		  <th>Nama</th>
		  <th>Posisi</th>
		  <th>Foto</th>
		  <th>Opsi</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$penomoran = 0;
		$query = dapatkandataterkecuali('petugas','id_petugas','nama_petugas',dapatkaninfo(username)[3],dapatkaninfo(username)[0]);
		if(mysqli_num_rows($query) != 0){
		while($n = mysqli_fetch_array($query)){
			$id_petugas = $n['id_petugas'];
			$nama_petugas = $n['nama_petugas'];
			$posisi_petugas = $n['posisi_petugas'];
			$foto_petugas = $n['foto_petugas'];
			$penomoran++;
			?>
			<tr>
				  <td><?php echo $penomoran.'.'?></td>
				  <td><?php echo $id_petugas;?></td>
				  <td><?php echo $nama_petugas;?></td>
				  <td><?php echo $posisi_petugas;?></td>
				  <td><img class="img-thumbnail" src="<?php echo $url;?>img/<?php echo $foto_petugas;?>" width="80px" height="90px"></img></td>
				  <td><a href="<?php echo base_url(); ?>admin/petugas/ubah/<?php echo $id_petugas;?>"><button type="button" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i> Ubah</button></a> <button type="button" class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#modalHapus" onclick="formHapus('Apakah Anda Ingin Menghapus <?php echo $id_petugas;?> .?','<?php echo $id_petugas;?>')"><i class="fa fa-trash"></i> Hapus</button></td>
				</tr>
		<?php
		}
		}else{
			echo'<tr>
				<td colspan="6" align="center">Belum Ada Data Petugas</td>
				</tr>';
		}
		?>
			</table>
		</div>
	</div>
</section>
</div>



