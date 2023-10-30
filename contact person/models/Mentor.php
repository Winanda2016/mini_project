<?php
class Mentor {
    //member1 variabel
    private $koneksi;
    // member2 konstruktor
    public function __construct(){
        global $dbh; //globalkan instance obj $dbh difile koneksi.php
        $this->koneksi = $dbh;
    }

    // member3 fungsionalitas
    public function index(){
        $sql = "SELECT mentor.*, agama.nama AS agama
                FROM mentor
                INNER JOIN agama ON agama.id = mentor.id_agama";

        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;

    }
}
?>