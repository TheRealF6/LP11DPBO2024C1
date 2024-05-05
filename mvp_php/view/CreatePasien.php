<?php
include("presenter/ProsesPasien.php");
include("KontrakView.php");

class CreatePasien implements KontrakView
{
    private $updatePasien; //presenter yang dapat berinteraksi langsung dengan view
    private $tpl;

    function __construct()
    {
        //konstruktor
        $this->updatePasien = new ProsesPasien();
    }

    function tampil()
    {
        // Membaca template update.html
        $this->tpl = new Template("templates/create.html");

        // Menampilkan ke layar
        $this->tpl->write();
    }

    function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nik = $_POST['nik'];
            $nama = $_POST['nama'];
            $tempat = $_POST['tempat'];
            $tl = $_POST['tl'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $telp = $_POST['telp'];
            $this->updatePasien->createDataPasien($nik, $nama, $tempat, $tl, $gender, $email, $telp);
        }
    }
}
