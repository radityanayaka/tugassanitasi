<!DOCTYPE html>
<html>
<head>
    <title>Form Data (POST)</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Form Input Data Mahasiswa - POST</h2>
<?php
function bersihkan($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

$nama = $umur = "";
$err_nama = $err_umur = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // VALIDASI NAMA
    if (empty($_POST["nama"])) {
        $err_nama = "Nama tidak boleh kosong!";
    } else {
        $nama = bersihkan($_POST["nama"]);
        if (!preg_match("/^[a-zA-Z ]+$/", $nama)) {
            $err_nama = "Nama hanya boleh huruf!";
        } else {
            $err_nama = ""; // FIX
        }
    }

    // VALIDASI UMUR
    if (empty($_POST["umur"])) {
        $err_umur = "Umur tidak boleh kosong!";
    } else {
        $umur = bersihkan($_POST["umur"]);
        if (!is_numeric($umur)) {
            $err_umur = "Umur harus angka!";
        } else {
            $err_umur = ""; // FIX
        }
    }

    if ($err_nama == "" && $err_umur == "") {
        session_start();
        $_SESSION['form_data'] = $_POST;
        header("Location: proses_post_sanitasi.php");
        exit;
    }
}
?>

<form action="" method="POST">

    NIM : <input type="text" name="nim"><br><br>

    Nama : 
    <input type="text" name="nama" value="<?= $nama ?>">
    <span style="color:red;"><?= $err_nama ?></span>
    <br><br>

    Tempat Lahir : <input type="text" name="tempat_lahir"><br><br>
    Tanggal Lahir : <input type="date" name="tanggal_lahir"><br><br>

    Umur :
    <input type="number" name="umur" value="<?= $umur ?>">
    <span style="color:red;"><?= $err_umur ?></span>
    <br><br>

    NO HP : <input type="text" name="no_hp"><br><br>

    Alamat : <br>
    <textarea name="alamat" cols="30" rows="4"></textarea><br><br>

    Kota :
    <select name="kota">
        <option>Semarang</option>
        <option>Solo</option>
        <option>Brebes</option>
        <option>Kudus</option>
        <option>Demak</option>
        <option>Salatiga</option>
    </select><br><br>

    Jenis Kelamin :
    <input type="radio" name="jk" value="Laki-laki">Laki-laki
    <input type="radio" name="jk" value="Perempuan">Perempuan
    <br><br>

    Status :
    <input type="radio" name="status" value="Kawin">Kawin
    <input type="radio" name="status" value="Belum Kawin">Belum Kawin
    <br><br>

    Hobi :
    <input type="checkbox" name="hobi[]" value="Membaca"> Membaca
    <input type="checkbox" name="hobi[]" value="Olah Raga"> Olah Raga
    <input type="checkbox" name="hobi[]" value="Musik"> Musik
    <input type="checkbox" name="hobi[]" value="Traveling"> Traveling
    <br><br>

    Email : <input type="email" name="email"><br><br>

    <input type="submit" value="Kirim">
</form>

</body>
</html>

