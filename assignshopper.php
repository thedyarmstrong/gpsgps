<?php
    $servername = "192.168.15.233";
    $username = "jayatta";
    $password = "bm5092da";
    $dbname = "gps";

    session_start();
    if(!isset($_SESSION['nama_user'])){
      header("location:login.php");
        // die('location:login.php');//jika belum login jangan lanjut
    }

    // membuat koneksi
    $koneksi = new mysqli($servername, $username, $password, $dbname);

    // melakukan pengecekan koneksi
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    }

    if($_POST['project'] && $_POST['cabang'] && $_POST['kunjungan']) {
        $project    = $_POST['project'];
        $cabang     = $_POST['cabang'];
        $kunjungan  = $_POST['kunjungan'];


        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap

        $sql = "SELECT * FROM quest WHERE project='$project' AND cabang='$cabang' AND kunjungan='$kunjungan'";
        $result = $koneksi->query($sql);
        foreach ($result as $baris) {

        ?>

        <!-- MEMBUAT FORM -->
        <form action="editdireksiproses.php" method="post">

          <input type="hidden" name="project" value="<?php echo $baris['project']; ?>">
          <input type="hidden" name="cabang" value="<?php echo $baris['cabang']; ?>">
          <input type="hidden" name="kunjungan" value="<?php echo $baris['kunjungan']; ?>">

          <div class="form-group">
            <label for="status">Shopper :</label>
            <select class="form-control" id="status" name="namashp">
              <?php
              $sql2 = "SELECT * FROM id_data WHERE posisi ='SHP' AND pendidikan ='S1' ORDER BY Nama";
              $result2 = $koneksi->query($sql2);
              foreach ($result2 as $baris2) {
              ?>
              <option value="<?php echo $baris2['Nama']; ?>"><?php echo $baris2['Nama']; ?></option>
              <?php
              }
               ?>
            </select>
          </div>

        <button class="btn btn-primary" type="submit" name="submit">Update</button>

        </form>

      <?php } }
    $koneksi->close();
?>
