<?php
    $servername = "192.168.15.233";
    $username = "jayatta";
    $password = "bm5092da";
    $dbname = "jay2";

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
        <form action="assignplanproses.php" method="POST">

          <input type="hidden" name="project" value="<?php echo $baris['project']; ?>">
          <input type="hidden" name="cabang" value="<?php echo $baris['kode']; ?>">
          <input type="hidden" name="spvdua" value="<?php echo $spvdua; ?>">

          <div class="form-group">
            <label class="control-label">Nama Cabang :</label>
              <input type="text" class="form-control" placeholder="<?php echo $baris['nama']; ?>" readonly>
          </div>

          <div class="form-group">
            <label class="control-label">Alamat Cabang :</label>
              <input type="text" class="form-control" placeholder="<?php echo $baris['alamat']; ?>" readonly>
          </div>



          <div class="form-group">
            <label for="status">Team Leader :</label>
            <select class="form-control" id="status" name="shpdua">
              <?php
              $sql2 = "SELECT * FROM id_data WHERE posisi ='D10' ORDER BY Nama";
              $result2 = $koneksi->query($sql2);
              foreach ($result2 as $baris2) {
              ?>
              <option value="<?php echo $baris2['Id']; ?>"><?php echo $baris2['Nama']; ?> (<?php echo $baris2['KotaTgl']; ?>)</option>
              <?php
              }
               ?>
            </select>
          </div>

          <div class="form-group">
            <label for="checkbox" class="control-label">Jenis Kunjungan</label>
              <?php
              $cabang = $baris['kode'];
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
                      		project = '$np' AND cabang = '$cabang'
                      )";
              $result2 = $koneksi->query($sql2);
              foreach ($result2 as $baris2) {
              ?>
              <div class="checkbox">
                <label><input type="checkbox" name="kunjungan[]" value="<?php echo $baris2['att']; ?>"><?php echo $baris2['nama']; ?></label>
              </div>
              <?php
              }
               ?>
          </div>

        <button class="btn btn-primary" type="submit" name="submit">Update</button>

        </form>

      <?php } }
    $koneksi->close();
?>
