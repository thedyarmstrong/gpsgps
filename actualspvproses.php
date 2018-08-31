<?php
//error_reporting(0);
 include ('koneksi.php');

  //periksa apakah udah submit
  if (isset($_POST['submit']))
  {

    $num            = $_POST['num'];
    $stkb           = $_POST['idstkb'];
    $jamcs          = $_POST['jamcs'];
    $menitcs        = $_POST['menitcs'];
    $jamteller      = $_POST['jamteller'];
    $menitteller    = $_POST['menitteller'];
    $latitude       = $_POST['latitude'];
    $longitude      = $_POST['longitude'];
    $pewitness      = $_POST['pewitness'];
    $hasilgagal     = $_POST['hasilgagal'];
    $kodepwt        = $_POST['kodepwt'];
    date_default_timezone_set("Asia/Jakarta");
    $waktuassign    = date("Y-m-d H:i:s");

    if (empty($jamcs) && empty($menitcs) && empty($jamteller) && empty($menitteller) && empty($latitude) && empty($longitude)){
      echo "<script language='javascript'>";
      echo "alert('GAGAL!! HARAP ISI YANG KOSONG')";
      echo "</script>";
      echo "<script> document.location.href='actualspv.php?num=$num'; </script>";
    }

    else{

      $update=mysql_query("UPDATE quest SET status = 1, idstkb ='$stkb', waktuassign = '$waktuassign', latitude ='$latitude', longitude ='$longitude',
                                            tdcs ='$jamcs:$menitcs', tdteller ='$jamteller:$menitteller',
                                            pewitness ='$pewitness', hasilgagal ='$hasilgagal', pwt ='$kodepwt' WHERE num ='$num'");
    }
      //jika sudah berhasil

      if ($update){
        echo "<script language='javascript'>";
        echo "alert('Actual Berhasil')";
        echo "</script>";
        echo "<script> document.location.href='kunjungancabangspv.php'; </script>";
      }

      else {
        echo "<script language='javascript'>";
        echo "alert('Actual Gagal')";
        echo "</script>";
      }

      }
?>
