<?php
include("KontrakView.php");
include("presenter/ProsesPasien.php");

class UpdatePasien implements KontrakView
{
    private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
    private $tpl;

    public function __construct()
    {
        $this->prosespasien = new ProsesPasien();
    }

    public function tampil()
    {
        // Mengambil data pasien yang akan diedit
        $id = $_GET['id'];
        $dataPasien = $this->prosespasien->getPasienById($id);
        $nik = $dataPasien['nik'];
        $nama = $dataPasien['nama'];
        $tempat = $dataPasien['tempat'];
        $tl = $dataPasien['tl'];
        $gender = $dataPasien['gender'];
        $email = $dataPasien['email'];
        $telp = $dataPasien['telp'];

        // Tabel pengeditan data
        $data = "";
        $data .= "<form action='update.php' method='POST'>";

        $data .= "<input type='hidden' name='id' value='$id'>";

        $data .= "<label for='nik'>NIK</label>";
        $data .= "<input type='text' name='nik' value='$nik'><br>";

        $data .= "<label for='nama'>Nama</label>";
        $data .= "<input type='text' name='nama' value='$nama'><br>";

        $data .= "<label for='tempat'>Tempat</label>";
        $data .= "<input type='text' name='tempat' value='$tempat'><br>";

        $data .= "<label for='tl'>Tanggal Lahir</label>";
        $data .= "<input type='text' name='tl' value='$tl'><br>";

        $data .= "<label for='gender'>Gender</label>";
        $data .= "<input type='text' name='gender' value='$gender'><br>";

        $data .= "<label for='email'>Email</label>";
        $data .= "<input type='email' name='email' value='$email'><br>";

        $data .= "<label for='telp'>Telepon</label>";
        $data .= "<input type='text' name='telp' value='$telp'><br>";

        $data .= "<button type='submit'>Update</button>";
        $data .= "</form>";

        // Membaca template skin.html
        $this->tpl = new Template("templates/update.html");

        // Mengganti kode Data_Tabel dengan data yang sudah diproses
        $this->tpl->replace("DATA_EDIT", $data);

        // Menampilkan ke layar
        $this->tpl->write();
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $nik = $_POST['nik'];
            $nama = $_POST['nama'];
            $tempat = $_POST['tempat'];
            $tl = $_POST['tl'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $telp = $_POST['telp'];
            $this->prosespasien->updateDataPasien($id, $nik, $nama, $tempat, $tl, $gender, $email, $telp);
        }
    }
}
