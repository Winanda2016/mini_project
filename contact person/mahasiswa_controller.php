<?php
    include_once 'koneksi.php';
    include_once 'models/Mahasiswa.php';

    $nama = $_POST ['nama'];
    $gender = $_POST ['gender'];
    $tempat_lahir = $_POST ['tempat_lahir'];
    $tanggal_lahir = $_POST ['tanggal_lahir'];
    $alamat = $_POST ['alamat'];
    $no_hp = $_POST ['no_hp'];
    $email = $_POST ['email'];
    $kampus = $_POST ['kampus'];
    $jurusan = $_POST ['jurusan'];
    $sosmed = $_POST ['sosmed'];
    $foto = $_POST ['foto'];
    $quotes = $_POST ['quotes'];
    $id_agama = $_POST ['id_agama'];
    $id_mentor = $_POST ['id_mentor'];
    $tombol = $_POST['proses'];

    $data = [
        $nama,
        $gender,
        $tempat_lahir,
        $tanggal_lahir,
        $alamat,
        $email,
        $no_hp,
        $kampus,
        $jurusan,
        $sosmed,
        $foto,
        $quotes,
        $id_agama,
        $id_mentor,
    ];

    $obj_mahasiswa = new Mahasiswa();
    switch ($tombol) {
        case 'simpan': $obj_mahasiswa->simpan($data); break;
        case 'ubah': 
            $data[] = $_POST['idx'];
            $obj_mahasiswa->ubah($data); break;
        case 'hapus': $obj_mahasiswa->hapus($_POST['id']); break;
        default: header('location:index.php?hal=mahasiswa_list'); break;
    }

    header('location:index.php?hal=mahasiswa_list');

    //----------proses pencarian data---------------
    $tombol_cari = $_GET['proses_cari']; // untuk keperluan eksekusi sebuah tombol di form

    if(isset($tombol_cari)){
        //print_r('###########################'.$_GET['keyword']); 
        $obj_mahasiswa->cari($_GET['keyword']); 
        header('location:index.php?hal=mahasiswa_cari');
    }

?>