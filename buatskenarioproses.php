<?php
//error_reporting(0);
 include ('koneksi.php');

 date_default_timezone_set("Asia/Bangkok");

 $project = $_POST['project'];
 $attq1   = $_POST['attq1'];
 $q1ex    = explode(',',$attq1);

  if (isset($_POST['submit']))
  {

    foreach ($_POST["attq1"] as $q1) {

      $update=mysql_query("INSERT INTO skenario (project,att,ket)
                            VALUES ('$project','$q1ex[0]','$q1ex[1]')");

    }

      //jika sudah berhasil
      if ($update){
        echo "<script language='javascript'>";
        echo "alert('Pembuatan Skenario Berhasil!!')";
        echo "</script>";
        echo "<script> document.location.href='buatskenario.php'; </script>";
      }

      else {
        echo "<script language='javascript'>";
        echo "alert('Pembuatan Skenario Gagal!!')";
        echo "</script>";
        echo "<script> document.location.href='buatskenario.php'; </script>";
      }

      }
?>
