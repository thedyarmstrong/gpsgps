<?php
if(isset($_POST['submit'])){
$project =$_POST['project'];


?>

<div class="bs-example widget-shadow" data-example-id="hoverable-table">
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
        <th>Shopper</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <?php
        include "koneksi.php";
        $i = 1;
        $cabang = mysql_query("SELECT * FROM quest WHERE project ='$project' AND status = 0 ORDER BY cabang");
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
          $kode = $a['kode'];
          $kodepro = $a['project'];
           ?>
          <button type="button" class="btn btn-default btn-small" onclick="assign_shp('<?php echo $np; ?>','<?php echo $cb; ?>','<?php echo $kunj; ?>')">Assign SHP</button>
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
        function assign_shp(project,cabang,kunjungan){
          // alert(noid+' - '+waktu);
          $.ajax({
              type : 'post',
              url : 'assignshopper.php',
              data :  {project:project, cabang:cabang, kunjungan:kunjungan},
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
