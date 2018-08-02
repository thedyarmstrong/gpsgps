<?php
error_reporting(0);
include "koneksi.php";
session_start();
if(!isset($_SESSION['username'])){
  header("location:login.php");
    // die('location:login.php');//jika belum login jangan lanjut
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Glance Design Dashboard an Admin Panel Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome icons CSS-->

<!-- side nav css file -->
<link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<!-- //side nav css file -->

 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts-->

<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->

<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
<style>
#chartdiv {
  width: 100%;
  height: 295px;
}
</style>
<!--pie-chart --><!-- index page sales reviews visitors pie chart -->
<script src="js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#2dde98',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#8e43e7',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ffc168',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });


        });

    </script>
<!-- //pie-chart --><!-- index page sales reviews visitors pie chart -->

	<!-- requried-jsfiles-for owl -->
					<link href="css/owl.carousel.css" rel="stylesheet">
					<script src="js/owl.carousel.js"></script>
						<script>
							$(document).ready(function() {
								$("#owl-demo").owlCarousel({
									items : 3,
									lazyLoad : true,
									autoPlay : true,
									pagination : true,
									nav:true,
								});
							});
						</script>
					<!-- //requried-jsfiles-for owl -->
</head>
<body class="cbp-spmenu-push">

<?php

include "header-spv.php";
 ?>

		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">

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
                $cabang = mysql_query("SELECT * FROM quest WHERE shpdua IS NOT NULL AND status= 0 ");
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
                }
              ?>
              </tr>
            </tbody>
          </table>
        </div>

  </div><!-- //Penutup Body -->
  </div><!-- //Penutup Body -->

	<!-- new added graphs chart js-->

    <script src="js/Chart.bundle.js"></script>
    <script src="js/utils.js"></script>
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;

			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};


			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->

	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->

	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->




	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
	<!-- //Bootstrap Core JavaScript -->

</body>
</html>
