<?php
class Mahasiswa {

    //member1 variabel
	private $koneksi;
	//member2 konstruktor
	public function __construct(){
		global $dbh; //memanggil variabel di file lain
		$this->koneksi = $dbh;
	}

    // member3 fungsionalitas
    public function index(){
        $sql = "SELECT mahasiswa.*, mentor.nama AS mentor, agama.nama AS agama
                FROM mahasiswa 
                INNER JOIN mentor ON mentor.id = mahasiswa.id_mentor
                INNER JOIN agama ON agama.id = mahasiswa.id_agama
                ORDER BY mahasiswa.id DESC";

        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;

    }

    public function simpan($data){
        $sql = "INSERT INTO mahasiswa (nama,gender,tempat_lahir,tanggal_lahir,alamat,no_hp,email,kampus,jurusan,sosmed,foto,quotes,id_agama,id_mentor)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);

    }

    public function getMahasiswa(){
        $sql = "SELECT mahasiswa.*, mentor.nama AS mentor, agama.nama AS agama
                FROM mahasiswa 
                INNER JOIN mentor ON mentor.id = mahasiswa.id_mentor
                INNER JOIN agama ON agama.id = mahasiswa.id_agama
                WHERE mahasiswa.id = ?";
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute([$id]);
		$rs = $ps->fetch();
		return $rs;
    }

    public function ubah($data){
        $sql = "UPDATE mahasiswa SET nama=?,gender=?,tempat_lahir=?,tanggal_lahir=?,alamat=?,no_hp=?,email=?,kampus=?,jurusan=?,sosmed=?,foto=?,quotes=?,id_agama=?,id_mentor=?
                WHERE id = ?";
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
    }

    public function hapus($id){
        $sql = "DELETE FROM mahasiswa WHERE id = ?";
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute([$id]);
    }

    public function cari($keyword){
        $sql = "SELECT mahasiswa.*, mentor.nama AS kategori
                FROM mahasiswa INNER JOIN mentor
                ON mentor.id = mahasiswa.id_mentor
                WHERE mahasiswa.nama LIKE '%$keyword%' OR 
                mentor.nama LIKE '%$keyword%' OR 
                mahasiswa.kondisi LIKE '%$keyword%'";
       
        $rs = $this->koneksi->query($sql);
        return $rs;
    }
}
?>