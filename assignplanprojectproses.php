<?php
//error_reporting(0);
 include ('koneksi.php');

 date_default_timezone_set("Asia/Bangkok");

  $project        = $_POST['project'];
  // $cabang         = $_POST['cabang'];
  $spvdua         = $_POST['spvdua'];
  $kareg          = $_POST['kareg'];
  $honor          = $_POST['honor'];
  $plantugasstart = $_POST['plantugasstart'];
  $plantugasend = $_POST['plantugasend'];
  $waktuassign    = date("Y-m-d H:i:s");

  //periksa apakah udah submit
  if (isset($_POST['submit']))
  {

      foreach ($_POST["cabang"] as $cbg) {

        $update=mysql_query("UPDATE cabang SET spvdua ='$spvdua', kareg ='$kareg', honor ='$honor', plantugasstart ='$plantugasstart',
                                               plantugasend ='$plantugasend' WHERE kode ='$cbg' AND project ='$project'");

      }

      //jika sudah berhasil
      if ($update){
        echo "<script language='javascript'>";
        echo "alert('Assign Plan Berhasil')";
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
