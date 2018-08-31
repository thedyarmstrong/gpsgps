<?php
//error_reporting(0);
 include ('koneksi.php');

  //periksa apakah udah submit
  if (isset($_POST['submit']))

  {

    $kode           = $_POST['kode'];
    $nama           = $_POST['nama'];
    $bank           = $_POST['bank'];
    // $tanggal        = $_POST['tanggal'];
    $visible        = $_POST['visible'];
    $type           = $_POST['type'];


    $insert = mysql_query("INSERT INTO project (kode,nama,bank,tanggal,visible,type)
                                      VALUES ('$kode','$nama','$bank','0000-00-00','$visible','$type')");



      if ($insert){
        echo "<script language='javascript'>";
        echo "alert('Pembuatan Project Baru Berhasil !!')";
        echo "</script>";
        echo "<script> document.location.href='buatproject.php'; </script>";
      }

      else {
        echo "<script language='javascript'>";
        echo "alert('Pembuatan Project Gagal!!')";
        echo "</script>";
      }

      }
?>
