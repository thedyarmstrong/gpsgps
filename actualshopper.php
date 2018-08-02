<VirtualHost 127.0.0.2:80>
  DocumentRoot "C:/xampp/htdocs/myproject/web"
  DirectoryIndex index.php

  <Directory "C:/xampp/htdocs/myproject/web">
	Options All
	AllowOverride All
	Require all granted
  </Directory>
</VirtualHost>


<?php
//error_reporting(0);
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

include "header-shopper.php";
 ?>

		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">

<form action="actualshopperproses.php" method="POST" class="form-horizontal">

  <?php
  $num = $_GET['num'];
  $selquest =  mysql_query("SELECT * FROM quest WHERE num='$num'");
  while ($a = mysql_fetch_array($selquest)){
  ?>

<input type="hidden" name="num" value="<?php echo $num; ?>">

<div class="form-group mb-n">
  <label class="col-md-2 control-label">Project :</label>
  <div class="col-md-8">
    <?php
    $prj = $a['project'];
    $project = mysql_query("SELECT nama FROM project WHERE kode='$prj'");
    $b = mysql_fetch_assoc($project);
    ?>
    <input type="text" class="form-control1" placeholder="<?php echo $b['nama']?>" readonly="">
  </div>
</div>

<div class="form-group mb-n">
  <label class="col-md-2 control-label">Cabang :</label>
  <div class="col-md-8">
    <?php
    $cbg = $a['cabang'];
    $cabang = mysql_query("SELECT * FROM cabang WHERE kode='$cbg' AND project='$prj'");
    $c = mysql_fetch_assoc($cabang);
    ?>
    <input type="text" class="form-control1" placeholder="[<?php echo $c['kode']?>] - <?php echo $c['nama']?>" readonly="">
  </div>
</div>

<div class="form-group mb-n">
  <label class="col-md-2 control-label">Kunjungan :</label>
  <div class="col-md-8">
    <?php
    $kunj = $a['kunjungan'];
    $kunjungan = mysql_query("SELECT nama FROM attribute WHERE kode='$kunj'");
    $d = mysql_fetch_assoc($kunjungan);
    ?>
    <input type="text" class="form-control1" placeholder="<?php echo $d['nama']?>" readonly="">
  </div>
</div>

<div class="form-group mb-n">
  <label class="col-md-2 control-label">STKB :</label>
  <div class="col-md-8">
    <input type="text" class="form-control1" placeholder="Enter ID STKB !!" name="idstkb">
  </div>
</div>

<div class="form-group mb-n">
  <label class="col-md-2 control-label">TD CS :</label>
  <div class="col-md-8">
    <input type="time" class="form-control1" name="idstkb" min="0:00" max="03:00">
  </div>
</div>

<div class="form-group mb-n">
  <label class="col-md-2 control-label">TD Teller :</label>
  <div class="col-md-8">
    <input type="time" class="form-control1" name="idstkb">
  </div>
</div>

<div class="form-group mb-n">
  <label class="col-md-2 control-label">Lokasi :</label>
  <div class="col-md-8">
    <button type="button" class="btn btn-warning" onclick="getLocation()">Get Maps</button>
  </div>
</div>

<div class="form-group mb-n">
  <label class="col-md-2 control-label">Latitude :</label>
  <div class="col-md-8">
    <input id="lat" name="latitude" type="text" required="required" readonly>
  </div>
</div>

<div class="form-group mb-n">
  <label class="col-md-2 control-label">Longitude :</label>
  <div class="col-md-8">
    <input id="lon" name="longitude" type="text" required="required" readonly>
  </div>
</div>

<div class="col-md-2 control-label">
<button class="btn btn-success" name="submit">SUBMIT</button>
</div>



<script>
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    $("#lat").val(position.coords.latitude);

    $("#lon").val(position.coords.longitude);
}
</script>





</form>

<?php } ?>

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
