<?php
    $servername = "192.168.15.233";
    $username = "jayatta";
    $password = "bm5092da";
    $dbname = "gps";

    // membuat koneksi
    $koneksi = new mysqli($servername, $username, $password, $dbname);

    // melakukan pengecekan koneksi
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    }

    if($_POST['kode'] && $_POST['spvdua'] && $_POST['np']) {
        $kode       = $_POST['kode'];
        $spvdua     = $_POST['spvdua'];
        $np         = $_POST['np'];

        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap

        $sql = "SELECT * FROM cabang WHERE kode='$kode' AND project='$np'";
        $result = $koneksi->query($sql);
        foreach ($result as $baris) {

        ?>

        <!-- MEMBUAT FORM -->
        <form action="assignshopperproses.php" method="POST">

          <input type="hidden" name="project" value="<?php echo $baris['project']; ?>">
          <input type="hidden" name="cabang" value="<?php echo $baris['kode']; ?>">
          <input type="hidden" name="spvdua" value="<?php echo $spvdua; ?>">


          <div class="form-group">
            <label for="status">Shopper :</label>
            <select class="form-control" id="status" name="shpdua">
              <?php
              $sql2 = "SELECT * FROM id_data WHERE posisi ='SHP' AND pendidikan ='S1' ORDER BY Nama";
              $result2 = $koneksi->query($sql2);
              foreach ($result2 as $baris2) {
              ?>
              <option value="<?php echo $baris2['Id']; ?>"><?php echo $baris2['Nama']; ?></option>
              <?php
              }
               ?>
            </select>
          </div>

          <div class="form-group">
            <label for="status">Jenis Kunjungan :</label>
            <select class="form-control" id="kunjungan" name="kunjungan">
              <?php
              $sql2 = "SELECT
                      	a.att,
                      	b.nama
                      FROM
                      	skenario AS a
                      LEFT JOIN attribute AS b ON a.att = b.kode
                      WHERE
                      	a.project = '$np'
                      AND a.att NOT IN (
                      	SELECT
                      		kunjungan
                      	FROM
                      		questtampung
                      	WHERE
                      		project = '$np'
                      )";
              $result2 = $koneksi->query($sql2);
              foreach ($result2 as $baris2) {
              ?>
              <option value="<?php echo $baris2['att']; ?>"><?php echo $baris2['nama']; ?></option>
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
