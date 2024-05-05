<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/UpdatePasien.php");


$tp = new UpdatePasien();
$data = $tp->tampil();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $proses = $tp->update();
}
