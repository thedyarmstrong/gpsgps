<?php
//error_reporting(0);
 include ('koneksi.php');

  $num            = $_POST['num'];
  $stkb           = $_POST['idstkb'];
  $jamcs          = $_POST['jamcs'];
  $menitcs        = $_POST['menitcs'];
  $jamteller      = $_POST['jamteller'];
  $menitteller    = $_POST['menitteller'];
  $latitude       = $_POST['latitude'];
  $longitude      = $_POST['longitude'];

  //periksa apakah udah submit
  if (isset($_POST['submit']))
  {

      $update=mysql_query("UPDATE questtampung SET status = 1, idstkb ='$stkb', latitude ='$latitude', longitude ='$longitude',
                                            tdcs ='$jamcs:$menitcs', tdteller ='$jamteller:$menitteller' WHERE num ='$num'");

      //jika sudah berhasil
      if ($update){

        $insert =mysql_query("INSERT into quest (project, cabang, kunjungan, status, latitude, longitude, shpdua, spvdua, idstkb, waktuassign, tdcs, tdteller)
                              SELECT project, cabang, kunjungan, '1', latitude, longitude, shpdua, spvdua, idstkb, waktuassign, tdcs, tdteller
                              FROM questtampung WHERE num ='$num'");

      }

      if ($insert){
        echo "<script language='javascript'>";
        echo "alert('Actual Berhasil')";
        echo "</script>";
        echo "<script> document.location.href='plansukses.php'; </script>";
      }

      else {
        echo "<script language='javascript'>";
        echo "alert('Assign Shopper Gagal')";
        echo "</script>";
      }

      }
?>
