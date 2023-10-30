<?php
//buat array judul
$ar_judul = ['NO','NAMA','GENDER','JURUSAN','KAMPUS','MENTOR','ACTION'];

//ciptakan obj dari class Mahasiswa
$obj_mahasiswa = new Mahasiswa();

//panggil fungsionalitas terkait
$rs = $obj_mahasiswa->index();

//----------proses pencarian-----------
$keyword = $_GET['keyword']; // tangkap request pencarian berdasarkan keywordnya
if(!empty($keyword)){
	$rs = $obj_mahasiswa->cari($keyword); //jika ada pencarian
}
else{
	$rs = $obj_mahasiswa->index(); //jika tidak ada pencarian
}
//print_r($rs); die();
?>
?>

<h1 class="mt-4">Data Mahasiswa</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Data Mahasiswa Peserta MSIB-5 Akademi Full Stack Web Development di NF Computer</li>
</ol>

<a href="index.php?hal=mahasiswa_form" class="btn btn-primary" style="margin-bottom:10px">Tambah</a>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DataTable Mahasiswa
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
			<thead>
				<tr>
					<?php
					foreach($ar_judul as $jdl){
						echo '<th>'.$jdl.'</th>';
					}
					?>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach($rs as $mahasiswa){
				?>
				<tr>
				    <td><?= $no ?></td>
				    <td><?= $mahasiswa['nama'] ?></td>
				    <td><?= $mahasiswa['gender'] ?></td>
				    <td><?= $mahasiswa['jurusan'] ?></td>
				    <td><?= $mahasiswa['kampus'] ?></td>
				    <td><?= $mahasiswa['mentor'] ?></td>
				    <td>
						<form method="POST" action="mahasiswa_controller.php">
							<a href="index.php?hal=mahasiswa_detail&id=<?= $mahasiswa['id'] ?>" 
							title="Detail mahasiswa" class="btn btn-info btn-sm">
								<i class="bi bi-eye"></i>
							</a>
							<a href="index.php?hal=mahasiswa_form&id=<?= $mahasiswa['id'] ?>" 
							title="Ubah mahasiswa" class="btn btn-warning btn-sm">
								<i class="bi bi-pencil"></i>
							</a>
								<button type="submit" title="Hapus mahasiswa" class="btn btn-danger btn-sm"
									name="proses" value="hapus" onclick="return confirm('Anda Yakin diHapus?')">
									<i class="bi bi-trash"></i>
								</button>
							<input type="hidden" name="id" value="<?= $mahasiswa['id'] ?>" /> 
						</form>
					</td>
				</tr>
				<?php    
				$no++;
				}	
				?>
			</tbody>
		</table>
    </div>
</div>