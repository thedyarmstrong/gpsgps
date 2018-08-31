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
if(!isset($_SESSION['Id'])){
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

.without_ampm::-webkit-datetime-edit-ampm-field {
   display: none;
 }
 input[type=time]::-webkit-clear-button {
   -webkit-appearance: none;
   -moz-appearance: none;
   -o-appearance: none;
   -ms-appearance:none;
   appearance: none;
   margin: -10px;
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

include "header-re.php";
 ?>

		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">

<form action="buatskenarioproses.php" method="POST" class="form-horizontal">

  <div class="form-group mb-n">
    <label class="col-md-2 control-label">Project :</label>
    <div class="col-md-8">
      <select name="project" class="form-control">
        <option selected disabled>Pilih Project</option>
        <?php
        $namabank = mysql_query("SELECT * FROM project WHERE visible ='y' ORDER BY nama");
        while ($nb = mysql_fetch_array($namabank)){
        ?>
        <option value="<?php echo $nb['kode']; ?>"><?php echo $nb['nama']; ?></option>
        <?php } ?>
      </select>
    </div>
  </div>

  <div class="form-group mb-n">
    <label class="col-md-2 control-label">Project :</label>
    <div class="col-md-8">
      <select name="ket" class="form-control">
        <option selected disabled>Pilih Project</option>
        <option value="001" id="q1">Q1</option>
        <option value="002" id="q2">Q2</option>
        <option value="003" id="q3">Q3</option>
        <option value="100" id="tt">Teller Terpisah</option>
        <option value="062">ATM Malam</option>
      </select>
    </div>
  </div>

  <div class="form-group" id="skenq1" style="display:none">
    <label for="checkbox" class="col-sm-2 control-label">Q1 :</label>
    <div class="col-sm-8">
      <div class="checkbox-inline"><label><input type="checkbox" value="051,001" name="attq1[]"> STR</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="055,001" name="attq1[]"> Setor Burek</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="052,001" name="attq1[]"> TRK</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="053,001" name="attq1[]"> TRF</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="054,001" name="attq1[]"> KTL</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="094,001" name="attq1[]"> KTL Terbilang</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="063,001" name="attq1[]"> ATM SIANG</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="081,001" name="attq1[]"> Satpam</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="038,001" name="attq1[]"> Toilet 1</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="039,001" name="attq1[]"> Toilet 2</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="039,001" name="attq1[]"> Satpam</label></div>
    </div>
  </div>

  <div class="form-group" id="skenq2" style="display:none">
    <label for="checkbox" class="col-sm-2 control-label">Q2 :</label>
    <div class="col-sm-8">
      <div class="checkbox-inline"><label><input type="checkbox" value="051" name="attq2[]"> STR</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="055" name="attq2[]"> Setor Burek</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="052" name="attq2[]"> TRK</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="053" name="attq2[]"> TRF</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="054" name="attq2[]"> KTL</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="094" name="attq2[]"> KTL Terbilang</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="063" name="attq2[]"> ATM SIANG</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="081" name="attq2[]"> Satpam</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="038" name="attq2[]"> Toilet 1</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="039" name="attq2[]"> Toilet 2</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="039" name="attq2[]"> Satpam</label></div>
    </div>
  </div>

  <div class="form-group" id="skenq3" style="display:none">
    <label for="checkbox" class="col-sm-2 control-label">Q3 :</label>
    <div class="col-sm-8">
      <div class="checkbox-inline"><label><input type="checkbox" value="051" name="attq3[]"> STR</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="055" name="attq3[]"> Setor Burek</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="052" name="attq3[]"> TRK</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="053" name="attq3[]"> TRF</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="054" name="attq3[]"> KTL</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="094" name="attq3[]"> KTL Terbilang</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="063" name="attq3[]"> ATM SIANG</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="081" name="attq3[]"> Satpam</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="038" name="attq3[]"> Toilet 1</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="039" name="attq3[]"> Toilet 2</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="039" name="attq3[]"> Satpam</label></div>
    </div>
  </div>

  <div class="form-group" id="skentt" style="display:none">
    <label for="checkbox" class="col-sm-2 control-label">Teller Terpisah :</label>
    <div class="col-sm-8">
      <div class="checkbox-inline"><label><input type="checkbox" value="051" name="atttt[]"> STR</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="052" name="atttt[]"> TRK</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="053" name="atttt[]"> TRF</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="054" name="atttt[]"> KTL</label></div>
      <div class="checkbox-inline"><label><input type="checkbox" value="094" name="atttt[]"> KTL Terbilang</label></div>
    </div>
  </div>


<div class="col-md-2 control-label">
<button class="btn btn-success" name="submit">SUBMIT</button>
</div>

<script>
$(function () {
        $("#q1").click(function () {
            if ($(this).is(":selected")) {
                $("#skenq1").show();
            } else {
                $("#skenq1").hide();
            }
        });
        $("#q2").click(function () {
            if ($(this).is(":selected")) {
                $("#skenq2").show();
            } else {
                $("#skenq2").hide();
            }
        });
        $("#q3").click(function () {
            if ($(this).is(":selected")) {
                $("#skenq3").show();
            } else {
                $("#skenq3").hide();
            }
        });
        $("#tt").click(function () {
            if ($(this).is(":selected")) {
                $("#skentt").show();
            } else {
                $("#skentt").hide();
            }
        });
    });
</script>



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

  </div><!-- //Penutup Body -->
  </div><!-- //Penutup Body -->

<script>
  $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="Gagal"){
            $(".Box").hide('slow');
        }
        if($(this).attr("value")=="Berhasil"){
            $(".Box").show('slow');

        }
    });
$('input[type="radio"]').trigger('click');
</script>

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
