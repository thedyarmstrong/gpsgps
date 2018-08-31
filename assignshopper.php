<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

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
        <form action="assignshopperproses.php" method="POST">

          <input type="hidden" name="project" value="<?php echo $baris['project']; ?>">
          <input type="hidden" name="cabang" value="<?php echo $baris['kode']; ?>">
          <input type="hidden" name="spvdua" value="<?php echo $spvdua; ?>">


          <div class="form-group">
            <label for="status">Shopper :</label>
            <select class="form-control" data-show-subtext="true" data-live-search="true" id="status" name="shpdua">
              <?php
              $sql2 = "SELECT * FROM id_data WHERE posisi != 'SHP' ORDER BY Nama";
              $result2 = $koneksi->query($sql2);
              foreach ($result2 as $baris2) {
              ?>
              <option data-subtext="<?php echo $baris2['Nama']; ?>" value="<?php echo $baris2['Id']; ?>"><?php echo $baris2['Nama']; ?></option>
              <?php
              }
               ?>
            </select>
          </div>

          <!-- <div class="form-group">
            <label for="status">Jenis Kunjungan :</label>
            <select class="form-control" id="kunjungan" name="kunjungan"> -->
              <?php
              // $cabang = $baris['kode'];
              // $sql2 = "SELECT
              //         	a.att,
              //         	b.nama
              //         FROM
              //         	skenario AS a
              //         LEFT JOIN attribute AS b ON a.att = b.kode
              //         WHERE
              //         	a.project = '$np'
              //         AND a.att NOT IN (
              //         	SELECT
              //         		kunjungan
              //         	FROM
              //         		questtampung
              //         	WHERE
              //         		project = '$np' AND cabang = '$cabang'
              //         )";
              // $result2 = $koneksi->query($sql2);
              // foreach ($result2 as $baris2) {
              ?>
              <!-- <option value="<?php //echo $baris2['att']; ?>"><?php //echo $baris2['nama']; ?></option>
              <?php
              }
               ?>
            </select>
          </div> -->

          <div class="form-group">
            <label for="status">Jenis Kunjungan :</label>
            <select class="form-control" id="kunjungan" name="kunjungan">
              <option selected disabled>Pilih Jenis Kunjungan</option>
              <option value="001">Q1</option>
              <option value="002">Q2</option>
              <option value="003">Q3</option>
              <option value="100">Teller Terpisah</option>
              <option value="062">ATM Malam</option>
            </select>
          </div>


          <div class="form-group">
            <label for="tglkunjspv">Tanggal Kunjungan :</label>
            <input type="date" class="form-control" name="tglkunjspv" id="tglkunjspv">
          </div>

        <button class="btn btn-primary" type="submit" name="submit">Update</button>

        </form>

      <?php }
    $koneksi->close();
?>
