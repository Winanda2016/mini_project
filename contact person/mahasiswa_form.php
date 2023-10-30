<?php
$obj_mentor = new Mentor();
$rs = $obj_mentor->index();

$obj_agama = new Agama();
$data_agama= $obj_agama->index();

//buat array gender
$ar_gender = ['P','L'];

$id = $_REQUEST['id'];
$obj_mahasiswa = new Mahasiswa(); 
if(!empty($id)){
    $row = $obj_mahasiswa->getMahasiswa($id);
}
else {
    $row = [];
}
?>


<h1 class="mt-4">Tambah Data Mahasiswa</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Tambah Data Mahasiswa Peserta MSIB-5 Akademi Full Stack Web Development di NF Computer</li>
</ol>
<div class="container px-10 my-5" >
    <div class="card-body "
            style=" width:50%; 
                box-shadow: 5px 5px 5px 5px rgb(0, 0, 0, 0.089);
                border-radius: 10px;
                padding : 40px">
        <h3 class="mb-4" align="center">Form Tambah Data Mahasiswa</h3><hr style="margin-bottom:50px">
        
        <form id="contactForm" method="POST" action="mahasiswa_controller.php">
            <div class="form-floating mb-3">
                <input class="form-control" name="nama" <?= $row['nama'] ?> id="nama" type="text" placeholder="Nama" data-sb-validations="required" />
                <label for="nama">Nama</label>
                <div class="invalid-feedback" data-sb-feedback="nama:required">Nama is required.</div>
            </div>

            <div class="mb-3">
                <label class="form-label d-block">Gender</label>
                <?php
                foreach($ar_gender as $gender){
                //--------proses edit gender mahasiswa-------
                $cek = ($gender == $row['gender']) ? "checked" : "" ;
                ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="<?=$gender?>" type="radio" name="gender" data-sb-validations="required" />
                    <label class="form-check-label" for="<?=$gender?>"><?=$gender?></label>
                </div>
                <?php } ?>

                <div class="invalid-feedback" data-sb-feedback="gender:required">One option is required.</div>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" name="tempat_lahir" <?= $row['tempat_lahir'] ?> id="tempatLahir" type="text" placeholder="Tempat Lahir" data-sb-validations="required" />
                <label for="tempatLahir">Tempat Lahir</label>
                <div class="invalid-feedback" data-sb-feedback="tempatLahir:required">Tempat Lahir is required.</div>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" name="tanggal_lahir" <?= $row['tanggal_lahir'] ?> id="tanggalLahir" type="text" placeholder="Tanggal Lahir" data-sb-validations="required" />
                <label for="tanggalLahir">Tanggal Lahir</label>
                <div class="invalid-feedback" data-sb-feedback="tanggalLahir:required">Tanggal Lahir is required.</div>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" name="alamat" <?= $row['alamat'] ?> id="alamat" type="text" placeholder="Alamat" style="height: 10rem;" data-sb-validations="required"></textarea>
                <label for="alamat">Alamat</label>
                <div class="invalid-feedback" data-sb-feedback="alamat:required">Alamat is required.</div>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" name="no_hp" <?= $row['no_hp'] ?> id="nomorHandphone" type="text" placeholder="Nomor Handphone" data-sb-validations="required" />
                <label for="nomorHandphone">Nomor Handphone</label>
                <div class="invalid-feedback" data-sb-feedback="nomorHandphone:required">Nomor Handphone is required.</div>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" name="email" <?= $row['email'] ?> id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required,email" />
                <label for="emailAddress">Email Address</label>
                <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div>
                <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" name="kampus" <?= $row['email'] ?> id="kampus" type="text" placeholder="Kampus" data-sb-validations="required" />
                <label for="kampus">Kampus</label>
                <div class="invalid-feedback" data-sb-feedback="kampus:required">Kampus is required.</div>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" name="jurusan" <?= $row['jurusan'] ?> id="jurusan" type="text" placeholder="Jurusan" data-sb-validations="required" />
                <label for="jurusan">Jurusan</label>
                <div class="invalid-feedback" data-sb-feedback="jurusan:required">Jurusan is required.</div>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" name="sosmed" <?= $row['sosmed'] ?> id="sosialMedia" type="text" placeholder="Sosial Media" data-sb-validations="required" />
                <label for="sosialMedia">Sosial Media</label>
                <div class="invalid-feedback" data-sb-feedback="sosialMedia:required">Sosial Media is required.</div>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" id="foto" <?= $row['foto'] ?> name="foto" type="text" placeholder="Foto" data-sb-validations="" />
                <label for="foto">Foto</label>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" name="quotes" id="quotes" type="text" placeholder="Quotes" style="height: 10rem;" data-sb-validations=""></textarea>
                <label for="quotes">Quotes</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" name="id_agama" id="agama" aria-label="Agama">
                    <option value="-- pilih agama --">-- pilih agama --</option>
                    <?php
                    foreach($rs as $agama){
                        $sel = ($agama['id'] == $row['id_agama']) ? "selected" : "" ;
                    ?>    
                        <option value="<?= $agama['id'] ?>" <?= $sel ?>><?= $agama['nama'] ?></option>
                    <?php } ?>
                </select>
                <label for="agama">Agama</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" name="id_mentor" id="mentor" aria-label="Mentor">
                    <option value="-- pilih mentor --">-- pilih mentor --</option>
                    <?php
                    foreach($rs as $mentor){
                        $sel = ($mentor['id'] == $row['id_mentor']) ? "selected" : "" ;
                    ?>    
                        <option value="<?= $mentor['id'] ?>" <?= $sel ?>><?= $mentor['nama'] ?></option>
                    <?php } ?>
                </select>
                <label for="mentor">Mentor</label>
            </div>

            <div class="text-center">
                <?php
                if(empty($id)){
                ?>
                    <button class="btn btn-primary" name="proses" type="submit" value="simpan">Simpan</button>
                <?php
                }
                else{
                ?>
                    <button class="btn btn-success" name="proses" type="submit" value="ubah">Ubah</button>
                    <input type="hidden" name="idx" value="<?= $id ?>" />
                <?php } ?>
                <a href="index.php?hal=mahasiswa_list" class="btn btn-info" name="unproses">Kembali</a>
            </div>
        </form> 
    </div>
</div>

<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> 