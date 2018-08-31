<?php
if(isset($_POST['submit'])){
$project    = $_POST['project'];
$spvdua     = $_POST['spvdua'];


?>

<div class="table-responsive bs-example widget-shadow">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Project</th>
        <th>Kota</th>
        <th>Jumlah Cabang</th>
        <th>Assign Plan</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <?php
        include "koneksi.php";
        $i = 1;
        $cabang = mysql_query("SELECT * FROM cabang WHERE project ='$project' GROUP BY kota");
        while ($a = mysql_fetch_array($cabang)){
         ?>
        <th scope="row"><?php echo $i++ ?></th>
        <td>
        <?php
        $np = $a['project'];
        $liatnama = mysql_query("SELECT * FROM project WHERE kode='$np'");
        $b = mysql_fetch_assoc($liatnama);
        $namapro = $b['nama'];
        echo "$namapro";
        ?>
        </td>
        <td><?php echo $a['kota']; ?></td>
        <td>
        <?php
        $nk = $a['kota'];
        $jmlcab = mysql_query("SELECT * FROM cabang WHERE kota='$nk' AND project='$np' AND kareg IS NULL");
        $c = mysql_num_rows($jmlcab);
        echo "$c";
        ?>
        </td>
        <td>
          <?php
          $kode = $a['kode'];
          ?>
          <button type="button" class="btn btn-default btn-small" onclick="plan_project('<?php echo $nk; ?>','<?php echo $spvdua; ?>','<?php echo $np; ?>')">Assign Plan</button>
        </td>
      </tr>
      <?php
        }
      }
      ?>
      </tr>
    </tbody>
  </table>
</div>

<div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Assign Plan</h4>
              </div>
              <div class="modal-body">
                  <div class="fetched-data"></div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
              </div>
          </div>
      </div>
  </div>

  <?php
    // $project    = isset($_GET['project']) && $_GET['project'] ? $_GET['project'] : NULL;
    // $cabang     = isset($_GET['cabang']) && $_GET['cabang'] ? $_GET['cabang'] : NULL;
    // $kunjungan  = isset($_GET['kunjungan']) && $_GET['kunjungan'] ? $_GET['kunjungan'] : NULL;
  ?>

      <script type="text/javascript">
        function plan_project(nk,spvdua,np){
          // alert(noid+' - '+waktu);
          $.ajax({
              type : 'post',
              url : 'assignplanproject.php',
              data :  {nk:nk, spvdua:spvdua, np:np},
              success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                $('#myModal').modal();
              }
          });
        }

      </script>
