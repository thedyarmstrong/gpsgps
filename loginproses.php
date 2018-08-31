<?php
error_reporting(0);
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$op = $_GET['op'];

if($op=="in"){
    $sql = mysql_query("SELECT * FROM id_data WHERE Id ='$username' AND password ='$password'");

        if(mysql_num_rows($sql)==1){//jika berhasil akan bernilai 1
            $qry = mysql_fetch_array($sql);
            $_SESSION['Nama'] = $qry['Nama'];
            $_SESSION['Id'] = $qry['Id'];
            $_SESSION['level'] = $qry['level'];

                if($qry){
                    if ($qry['level'] == "Supervisor" || $qry['level'] == "Supervisor")
                  {
                    header("location:home-spv.php");
                  }
                    else if ($qry['level'] == "Manager" || $qry['level'] == "Manager")
                  {
                    header("location:home-manager.php");
                  }
                  else if ($qry['level'] == "RE" || $qry['level'] == "RE")
                {
                  header("location:home-re.php");
                }
                else if ($qry['level'] == "Shopper" || $qry['level'] == "Shopper")
                {
                  header("location:home-shopper.php");
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
    unset($_SESSION['Id']);
    unset($_SESSION['AKSES']);
    header("location:index.php");
}
?>
