<?php
$id = $_REQUEST['id'];
$obj_mahasiswa = new Mahasiswa();
$rs = $obj_mahasiswa->getMahasiswa($id);
?>

<h1 class="mt-4">Detail Data <?= $rs ['nama']?></h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Detail Data Mahasiswa Peserta MSIB-5 Akademi Full Stack Web Development di NF Computer</li>
</ol>
<div class="container px-10 my-5" >
    <div class="card" style="width: 18rem;">
    <?php
    if(!empty($rs['foto'])){
    ?>
        <img src="assets/img/<?= $rs['foto'] ?>" class="card-img-top" />
    <?php
    }
    else{
    ?>
    <img src="assets/img/nophoto.jpg" class="card-img-top" />
    <?php } ?>
    <div class="card-body">
        <h5 class="card-title"><?= $rs['nama'] ?></h5>
        <p class="card-text">
            Nama: <?= $rs['nama'] ?> <br/>
            Gender: <?= $rs['gender'] ?> <br/>
            Agama: <?= $rs['agama'] ?> <br/>
            TTL: <?= $rs['tempat_lahir'] ?> /  <?= $rs['tanggal_lahir'] ?><br/>
            Alamat: <?= $rs['alamat'] ?> <br/>
            No.HP: <?= $rs['no_hp'] ?> <br/>
            Email: <?= $rs['email'] ?> <br/>
            Jurusan: <?= $rs['jurusan'] ?> <br/>
            Kampus: <?= $rs['kampus'] ?> <br/>
            Sosmed: <?= $rs['sosmed'] ?> <br/>
            Mentor: <?= $rs['mentor'] ?> <br/>
            Quotes: <?= $rs['quotes'] ?> <br/>
        </p>
        <a href="index.php?hal=mahasiswa_list" class="btn btn-primary">Kembali</a>
    </div>
    </div>
</div>