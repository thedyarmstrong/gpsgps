<?php
//error_reporting(0);
 include ('koneksi.php');

  $num            = $_POST['num'];
  $stkb           = $_POST['stkb'];
  $latitude       = $_POST['latitude'];
  $longitude      = $_POST['longitude'];

  //periksa apakah udah submit
  if (isset($_POST['submit']))
  {

      $update=mysql_query("UPDATE quest SET idstkb ='$stkb', latitude ='$latitude', longitude ='$longitude' WHERE num ='$num'");

      //jika sudah berhasil
      if ($update){
        echo "<script language='javascript'>";
        echo "alert('Actual Berhasil')";
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
