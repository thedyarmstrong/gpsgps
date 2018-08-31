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

    if($_POST['nk'] && $_POST['spvdua'] && $_POST['np']) {
        $nk       = $_POST['nk'];
        $spvdua     = $_POST['spvdua'];
        $np         = $_POST['np'];

        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap

        $sql = "SELECT * FROM cabang WHERE kota='$nk' AND project='$np' AND kareg IS NULL";
        $result = $koneksi->query($sql);
        foreach ($result as $baris) {

        ?>

        <!-- MEMBUAT FORM -->
        <form action="assignplanprojectproses.php" method="POST">

          <input type="hidden" name="project" value="<?php echo $baris['project']; ?>">
          <input type="hidden" name="spvdua" value="<?php echo $spvdua; ?>">

          <div class="form-group">
            <label class="control-label">Kota :</label>
              <input type="text" class="form-control" placeholder="<?php echo $baris['kota']; ?>" readonly>
          </div>

          <div class="form-group">
            <label for="status">Kepala Regional :</label>
            <select class="form-control" id="status" name="kareg">
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
            <label class="control-label">Transport :</label>
              <input type="number" class="form-control" name="honor">
          </div>

          <div class="form-group">
            <label class="control-label">Plan Start :</label>
              <input type="date" class="form-control" name="plantugasstart">
          </div>

          <div class="form-group">
            <label class="control-label">Plan End :</label>
              <input type="date" class="form-control" name="plantugasend">
          </div>

          <div class="form-group">
            <label for="checkbox" class="control-label">Daftar Cabang</label>
              <?php
              foreach ($result as $baris3) {
              ?>
              <div class="checkbox">
                <label><input type="checkbox" name="cabang[]" value="<?php echo $baris3['kode']; ?>"><?php echo $baris3['nama']; ?></label>
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
