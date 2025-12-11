<!DOCTYPE html>
<html>
<head>
    <title>Hasil Input POST</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Hasil input data mahasiswa (metode POST)</h2>
<?php
session_start();
$data = $_SESSION['form_data'];
if (!$data) {
    echo "Tidak ada data dikirim!";
    exit;
}

function bersihkan($d) {
    return htmlspecialchars($d, ENT_QUOTES, 'UTF-8');
}

$nim            = bersihkan($data['nim']);
$nama           = bersihkan($data['nama']);
$umur           = bersihkan($data['umur']);
$no_hp          = bersihkan($data['no_hp']);
$alamat         = bersihkan($data['alamat']);
$tempat_lahir   = bersihkan($data['tempat_lahir']);
$tanggal_lahir  = bersihkan($data['tanggal_lahir']);
$kota           = bersihkan($data['kota']);
$email           = bersihkan($data['email']);

$jk             = isset($data['jk']) ? bersihkan($data['jk']) : "-";
$status         = isset($data['status']) ? bersihkan($data['status']) : "-";

$hobi_list = [];
if (!empty($data['hobi'])) {
    foreach ($data['hobi'] as $h) {
        $hobi_list[] = bersihkan($h);
    }
}
$hobi_output = implode(", ", $hobi_list);
?>

<p><b>NIM:</b> <?= $nim ?></p>
<p><b>Nama:</b> <?= $nama ?></p>
<p><b>Umur:</b> <?= $umur ?></p>
<p><b>Tempat Lahir:</b> <?= $tempat_lahir ?></p>
<p><b>Tanggal Lahir:</b> <?= $tanggal_lahir ?></p>
<p><b>No. HP:</b> <?= $no_hp ?></p>
<p><b>Alamat:</b> <?= $alamat ?></p>

<p><b>Kota:</b>
<?php
    if ($kota == "Semarang") echo "Semarang";
    elseif ($kota == "Solo") echo "Solo";
    elseif ($kota == "Brebes") echo "Brebes";
    elseif ($kota == "Kudus") echo "Kudus";
    elseif ($kota == "Demak") echo "Demak";
    else echo "Salatiga";
?>
</p>

<p><b>Jenis Kelamin:</b> <?= $jk ?></p>
<p><b>Status:</b> <?= $status ?></p>
<p><b>Hobi:</b> <?= $hobi_output ?></p>
<p><b>Email:</b> <?= $email ?></p>
</body>
</html>
