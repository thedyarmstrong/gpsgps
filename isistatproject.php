<?php
if(isset($_POST['submit'])){
$project    = $_POST['project'];

?>

<!-- mainpage-chit -->
<div class="chit-chat-layer1">
<div class="col-md-12 chit-chat-layer1-left">
           <div class="work-progres">
                                    <header class="widget-header">
                                        <h4 class="widget-title">Recent Followers</h4>
                                    </header>
          <hr class="widget-separator">
                        <div class="table-responsive">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Project</th>
                                  <th>Status</th>
                                  <th>Progress</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            $selper = mysql_query("SELECT * FROM quest WHERE project='$project'");
                            $ea = mysql_num_rows($selper);
                            $aw = mysql_fetch_assoc($selper);

                            ?>
                            <tr>
                              <td>1</td>
                              <td><?php echo $ea ?></td>
                              <td><span class="label label-danger">in progress</span></td>
                              <td><span class="badge badge-info">70%</span></td>
                          </tr>
                      </tbody>
                  </table>
              </div>
         </div>
  </div>
</div>
<div class="clearfix"> </div>
</div>


<div class="table-responsive bs-example widget-shadow">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Kode</th>
        <th>Project</th>
        <th>Nama Cabang</th>
        <th>Alamat</th>
        <th>Kota</th>
        <th>Kunjungan</th>
        <th>Supervisor</th>
        <th>Shopper</th>
        <th>Status</th>
        <th>Map</th>
        <th>Actual</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <?php
        include "koneksi.php";
        $username = $_SESSION['username'];
        $i = 1;
        $cabang = mysql_query("SELECT * FROM quest WHERE project='$project'");
        while ($a = mysql_fetch_array($cabang)){
         ?>
        <th scope="row"><?php echo $i++ ?></th>
        <td><?php echo $a['cabang']; ?></td>
        <td>
        <?php
        $np = $a['project'];
        $liatnama = mysql_query("SELECT * FROM project WHERE kode='$np'");
        $b = mysql_fetch_assoc($liatnama);
        $namapro = $b['nama'];
        echo "$namapro";
        ?>
        </td>
        <td>
        <?php
        $cb = $a['cabang'];
        $liatcab = mysql_query("SELECT * FROM cabang WHERE project='$np' AND kode='$cb'");
        $c = mysql_fetch_assoc($liatcab);
        $namacabang = $c['nama'];
        echo "$namacabang";
        ?>
        </td>
        <td><?php echo $c['alamat']; ?></td>
        <td><?php echo $c['kota']; ?></td>
        <td>
        <?php
        $kunj = $a['kunjungan'];
        $liatkunj = mysql_query("SELECT nama FROM attribute WHERE kode='$kunj'");
        $d = mysql_fetch_assoc($liatkunj);
        $namakunj = $d['nama'];
        echo "$namakunj";
        ?>
        </td>
        <td>
          <?php
          $kodespv = $a['spvdua'];
          $liatspv = mysql_query("SELECT nama FROM tb_user WHERE username='$kodespv'");
          $e = mysql_fetch_assoc($liatspv);
          $namaspv = $e['nama'];
          echo "$namaspv";
        ?>
        </td>
        <td>
          <?php
          $kodeshp = $a['shpdua'];
          $liatshp = mysql_query("SELECT nama FROM tb_user WHERE username='$kodeshp'");
          $e = mysql_fetch_assoc($liatshp);
          $namashp = $e['nama'];
          echo "$namashp";
          ?>
        </td>
        <td><?php echo $a['status']; ?></td>
        <td><a href="https://www.google.com/maps/place/<?php echo $a['latitude']; ?>,<?php echo $a['longitude']; ?>" target="_blank">Koordinat</a></td>
        <td><a href="actualshopper.php?num=<?php echo $a['num']; ?>">Actual</a></td>
      </tr>
      <?php
    } }
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
                  <h4 class="modal-title">Assign Shopper</h4>
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
        function assign_shp(num,spvdua){
          // alert(noid+' - '+waktu);
          $.ajax({
              type : 'post',
              url : 'assignshopper.php',
              data :  {num:num, spvdua:spvdua},
              success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                $('#myModal').modal();
              }
          });
        }

      </script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">

var geocoder = new google.maps.Geocoder();
var address = jQuery('#address').val();

geocoder.geocode( { 'address': address}, function(results, status) {

if (status == google.maps.GeocoderStatus.OK) {
    var latitude = results[0].geometry.location.lat();
    var longitude = results[0].geometry.location.lng();
    jQuery('#coordinates').val(latitude+', '+longitude);
    }
});
</script>
