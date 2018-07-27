<?php
error_reporting(0);
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$op = $_GET['op'];

if($op=="in"){
    $sql = mysql_query("SELECT * FROM tb_user WHERE username='$username' AND PASSWORD='$password'");

        if(mysql_num_rows($sql)==1){//jika berhasil akan bernilai 1
            $qry = mysql_fetch_array($sql);
            $_SESSION['nama'] = $qry['nama'];
            $_SESSION['divisi'] = $qry['divisi'];
            $_SESSION['username'] = $qry['username'];
            $_SESSION['level'] = $qry['level'];

                if($qry){
                    if ($qry['level'] == "Supervisor" || $qry['level'] == "Supervisor")
                  {
                    header("location:home-spv.php");
                  }
                    else if ($qry['divisi'] == "Manager" || $qry['divisi'] == "Manager")
                  {
                    header("location:home-manager.php");
                  }
                  else {
                    header("location:home-shopper.php");
                  }
                }

                }else{
                ?>
<script language="JavaScript">
    alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
    document.location='index.php';
</script>
<?php
}
}else if($op=="out"){
    unset($_SESSION['USERNAME']);
    unset($_SESSION['AKSES']);
    header("location:index.php");
}

?>
