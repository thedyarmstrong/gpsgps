<?php
//error_reporting(0);
 include ('koneksi.php');

 date_default_timezone_set("Asia/Bangkok");

  $project        = $_POST['project'];
  $cabang         = $_POST['cabang'];
  $spvdua         = $_POST['spvdua'];
  $shpdua         = $_POST['shpdua'];
  $kunjungan      = $_POST['kunjungan'];
  $waktuassign    = date("Y-m-d H:i:s");

  //periksa apakah udah submit
  if (isset($_POST['submit']))
  {

      $update=mysql_query("INSERT INTO questtampung (project,cabang,kunjungan,spvdua,shpdua,waktuassign)
                            VALUES ('$project','$cabang','$kunjungan','$spvdua','$shpdua','$waktuassign')");

      //jika sudah berhasil
      if ($update){
        echo "<script language='javascript'>";
        echo "alert('Assign Shopper Berhasil')";
        echo "</script>";
        echo "<script> document.location.href='assign-spv.php?page=1'; </script>";
      }

      else {
        echo "<script language='javascript'>";
        echo "alert('Assign Shopper Gagal')";
        echo "</script>";
      }

      }
?>
