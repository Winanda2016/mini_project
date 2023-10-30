<?php
//buat array judul
$ar_judul = ['NO','NAMA','JURUSAN','KAMPUS','EMAIL','ACTION'];

//ciptakan obj dari class Mentor
$obj_mentor = new Mentor();

//panggil fungsionalitas terkait
$rs = $obj_mentor->index();
?>

<h1 class="mt-4">Data Mentor</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Data Mentor MSIB-5 Akademi Full Stack Web Development di NF Computer</li>
</ol>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DataTable Example
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
				foreach($rs as $mentor){
				?>
				<tr>
				    <td><?= $no ?></td>
				    <td><?= $mentor['nama'] ?></td>
				    <td><?= $mentor['jurusan'] ?></td>
				    <td><?= $mentor['kampus'] ?></td>
				    <td><?= $mentor['email'] ?></td>
				    <td></td>
				</tr>
				<?php    
				$no++;
				}	
				?>
            </tbody>
        </table>
    </div>
</div>