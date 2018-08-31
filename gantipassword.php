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

</head>
<body class="cbp-spmenu-push">

<?php

include "header-shopper.php";
 ?>

		<!-- main content start-->
		<div id="page-wrapper">

      <div class="row">
        <div class="col-md-6 validation-grids widget-shadow" data-example-id="basic-forms">
          <div class="form-title">
            <h4>Ganti Password :</h4>
          </div>

          <div class="form-body">
            <form data-toggle="validator" method="POST" action="gantipasswordproses.php">

              <div class="form-group">
                <input type="text" class="form-control" id="inputName" value="<?php echo $_SESSION['Id']; ?>" name="username" readonly>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" id="nama" value="<?php echo $_SESSION['Nama']; ?>" name="nama" readonly>
              </div>

              <div class="form-group">
                <input type="password" class="form-control" id="passwordlama" placeholder="Password Lama" required name="passwordlama">
              </div>

              <div class="form-group">
                <input type="password" data-toggle="validator" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password Baru" required name="passwordbaru">
                <span class="help-block">Minimum of 6 characters</span>
              </div>

              <div class="form-group">
                <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm password" required>
                <div class="help-block with-errors"></div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary disabled" name="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>

  </div><!-- //Penutup Body -->

  <!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->

	<!-- Classie --><!-- for toggle left push menu script -->
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

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>

	<!--validator js-->
	<script src="js/validator.min.js"></script>
	<!--//validator js-->

</body>
</html>
