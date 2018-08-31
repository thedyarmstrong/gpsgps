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

    if($_POST['kd'] && $_POST['np'] && $_POST['num']) {
        $kd       = $_POST['kd'];
        $np       = $_POST['np'];
        $num      = $_POST['num'];

        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap

        $sql = "SELECT * FROM quest WHERE cabang ='$kd' AND project='$np'";
        $result = $koneksi->query($sql);
        $baris = mysqli_fetch_assoc($result);
        ?>

          <div class="form-group">
            <label class="control-label">Kode Cabang :</label>
              <input type="text" class="form-control" placeholder="<?php echo $baris['cabang']; ?>" readonly>
          </div>

          <div class="form-group">
            <label class="control-label">Nama Cabang :</label>
            <?php
            $sql2 = "SELECT * FROM cabang WHERE kode ='$kd' AND project='$np'";
            $result2 = $koneksi->query($sql2);
            $ea = mysqli_fetch_assoc($result2);
            ?>
              <input type="text" class="form-control" placeholder="<?php echo $ea['nama']; ?>" readonly>
          </div>

          <div class="form-group">
            <label class="control-label">Nama & Alamat Cabang :</label>
              <input type="text" class="form-control" placeholder="<?php echo $ea['alamat']; ?>" readonly>
            <?php
            // }
            ?>
          </div>

          <div class="work-progres">
                                   <header class="widget-header">
                                       <h4 class="widget-title">Jenis Kunjungan</h4>
                                   </header>
         <hr class="widget-separator">
                       <div class="table-responsive">
                           <table class="table table-hover">
                             <thead>
                               <tr>
                                 <th>#</th>
                                 <th>Project</th>
                                 <th>Kunjungan</th>
                                 <th>Status</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                             $i = 1;
                             $sql3 = "SELECT * FROM quest WHERE cabang ='$kd' AND project='$np' ORDER BY kunjungan";
                             $result3 = $koneksi->query($sql3);
                             foreach ($result3 as $baris3) {
                            ?>
                            <tr>
                            <td><?php echo $i++ ?></td>
                            <td>
                              <?php
                              $pr = $baris3['project'];
                              $sql4 = "SELECT nama FROM project WHERE kode='$pr'";
                              $result4 = $koneksi->query($sql4);
                              $baris4 = mysqli_fetch_assoc($result4);
                              echo $baris4['nama'];
                              ?>
                            </td>
                            <td>
                            <?php
                            $kunj = $baris3['kunjungan'];
                            $sql5 = "SELECT nama FROM attribute WHERE kode='$kunj'";
                            $result5 = $koneksi->query($sql5);
                            $baris5 = mysqli_fetch_assoc($result5);
                            echo $baris5['nama'];
                            ?>
                            </td>
                            <td><span class="badge badge-info"><?php echo $baris3['status']; ?></span></td>
                         </tr>
                           <?php
                            }
                            ?>
                     </tbody>
                 </table>
             </div>
        </div>

      <?php }
    $koneksi->close();
?>
