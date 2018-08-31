<?php
error_reporting(0);
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
                <th>Honor</th>
                <th>Plan Start</th>
                <th>Plan End</th>
                <th>SPV</th>
                <th>Kareg</th>
                <th>Detail</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <?php
                include "koneksi.php";
                $username = $_SESSION['Id'];
                $i = 1;
                $cabang = mysql_query("SELECT * FROM cabang WHERE kareg IS NOT NULL ORDER BY kode");
                while ($a = mysql_fetch_array($cabang)){
                 ?>
                <th scope="row"><?php echo $i++ ?></th>
                <td><?php echo $a['kode']; ?></td>
                <td>
                <?php
                $np = $a['project'];
                $liatnama = mysql_query("SELECT * FROM project WHERE kode='$np'");
                $b = mysql_fetch_assoc($liatnama);
                $namapro = $b['nama'];
                echo "$namapro";
                ?>
                </td>
                <td><?php echo $a['nama']; ?></td>
                <td><?php echo $a['alamat']; ?></td>
                <td><?php echo $a['kota']; ?></td>
                <td><?php echo 'Rp. ' . number_format( $a['honor'], 0 , '' , ',' ); ?></td>
                <td><?php echo $a['plantugasstart']; ?></td>
                <td><?php echo $a['plantugasend']; ?></td>
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
                  $kodetl = $a['kareg'];
                  $liattl = mysql_query("SELECT nama FROM tb_user WHERE username='$kodetl'");
                  $e = mysql_fetch_assoc($liattl);
                  $namatl = $e['nama'];
                  echo "$namatl";
                  ?>
                </td>
                <td>
                  <?php
                   $kd = $a['kode'];
                   $num = $a['num'];
                  // $selstat =  mysql_query("SELECT status FROM quest WHERE cabang ='$kd' AND project ='$np'");
                  // $stts = mysql_fetch_assoc($selstat);
                  // echo $stts['status'];
                  ?>
                  <button type="button" class="btn btn-default btn-small" onclick="detail_plan('<?php echo $kd; ?>','<?php echo $np; ?>','<?php echo $num; ?>')">DETAIL</button>
                </td>
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

  <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Master Plan</h4>
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


    <script type="text/javascript">
      function detail_plan(kd,np,num){
        // alert(noid+' - '+waktu);
        $.ajax({
            type : 'post',
            url : 'detailmasterplan.php',
            data :  {kd:kd, np:np, num:num},
            success : function(data){
              $('.fetched-data').html(data);//menampilkan data ke dalam modal
              $('#myModal').modal();
            }
        });
      }

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
