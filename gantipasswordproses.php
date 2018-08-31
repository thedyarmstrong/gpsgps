<?php
include "koneksi.php";
session_start();
if(!isset($_SESSION['Id'])){
  header("location:login.php");
    // die('location:login.php');//jika belum login jangan lanjut
}

$username     = $_POST['username'];
$nama         = $_POST['nama'];
$passwordlama = $_POST['passwordlama'];
$passwordbaru = $_POST['passwordbaru'];

$checkpass = mysql_query("SELECT password FROM tb_user WHERE username='$username'");
$op = mysql_fetch_assoc($checkpass);
$old = $op['password'];

  if (isset($_POST['submit']))

  {
    if ($passwordlama == $old){

      $changepass = mysql_query("UPDATE tb_user SET password ='$passwordbaru' WHERE username='$username'");

      if($changepass){
      echo "<script language='javascript'>";
      echo "alert('Ubah Password Berhasil!!')";
      echo "</script>";

        if ($_SESSION['level'] == 'Supervisor'){
          echo "<script> document.location.href='home-spv.php'; </script>";
        }
        else if ($_SESSION['level'] == 'Manager'){
          echo "<script> document.location.href='home-manager.php'; </script>";
        }
        else{
      echo "<script> document.location.href='home-shopper.php'; </script>";
        }
      }else{
      echo "GAGAL!!";
      }
    }
    else{
      echo "<script language='javascript'>";
      echo "alert('Ubah Password GAGAL!! Password Lama Tidak Sesusai')";
      echo "</script>";
      echo "<script> document.location.href='gantipassword.php'; </script>";
    }
  }

echo $old;
echo $username;
echo $passwordbaru;
echo $passwordlama;
?>
