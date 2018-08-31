<div class="main-content">
<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
  <!--left-fixed -navigation-->
  <aside class="sidebar-left">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <h1><a class="navbar-brand" href="home-shopper.php"> MRI<span class="dashboard_text">Actual SHP</span></a></h1>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="home-shopper.php">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>

      <li class="treeview">
              <a href="#">
              <i class="fa fa-book"></i>
              <span>Kunjungan</span>
              <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="kunjungancabang.php"><i class="fa fa-angle-right"></i> Kunjungan Pending</a></li>
                <li><a href="kunjungansukses.php"><i class="fa fa-angle-right"></i> Kunjungan Sukses</a></li>
              </ul>
            </li>


        <!-- /.navbar-collapse -->
    </nav>
  </aside>
</div>
  <!--left-fixed -navigation-->

  <!-- header-starts -->
  <div class="sticky-header header-section ">
    <div class="header-left">
      <!--toggle button start-->
      <button id="showLeftPush"><i class="fa fa-bars"></i></button>
      <!--toggle button end-->
      <div class="profile_details_left"><!--notifications of menu start -->

        <ul class="nofitications-dropdown">

          <li class="dropdown head-dpdn">
            <?php
            include "koneksi.php";
            $shpdua = $_SESSION['Id'];
            $notif = mysql_query("SELECT * FROM questtampung WHERE status = 0 AND shpdua='$shpdua'");
            $nt = mysql_num_rows($notif);
            ?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue"><?php echo $nt; ?></span></a>
            <ul class="dropdown-menu">
              <li>
                <div class="notification_header">
                  <h3><?php echo $nt; ?> Pemberitahuan Baru</h3>
                </div>
              </li>

            <?php
            while ($ntf = mysql_fetch_array($notif)){
            ?>
              <li><a href="#">
                 <div class="notification_desc">
                <p>Kunjungan <?php echo $ntf['project']; ?></p>
                <p><span>1 hour ago</span></p>
                </div>
                <div class="clearfix"></div>
               </a></li>
            <?php } ?>
            </ul>
          </li>

          <li class="dropdown head-dpdn">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue1">8</span></a>
            <ul class="dropdown-menu">
              <li>
                <div class="notification_header">
                  <h3>You have 8 pending task</h3>
                </div>
              </li>
              <li><a href="#">
                <div class="task-info">
                  <span class="task-desc">Database update</span><span class="percentage">40%</span>
                  <div class="clearfix"></div>
                </div>
                <div class="progress progress-striped active">
                  <div class="bar yellow" style="width:40%;"></div>
                </div>
              </a></li>
              <li><a href="#">
                <div class="task-info">
                  <span class="task-desc">Dashboard done</span><span class="percentage">90%</span>
                   <div class="clearfix"></div>
                </div>
                <div class="progress progress-striped active">
                   <div class="bar green" style="width:90%;"></div>
                </div>
              </a></li>
              <li><a href="#">
                <div class="task-info">
                  <span class="task-desc">Mobile App</span><span class="percentage">33%</span>
                  <div class="clearfix"></div>
                </div>
                 <div class="progress progress-striped active">
                   <div class="bar red" style="width: 33%;"></div>
                </div>
              </a></li>
              <li><a href="#">
                <div class="task-info">
                  <span class="task-desc">Issues fixed</span><span class="percentage">80%</span>
                   <div class="clearfix"></div>
                </div>
                <div class="progress progress-striped active">
                   <div class="bar  blue" style="width: 80%;"></div>
                </div>
              </a></li>
              <li>
                <div class="notification_bottom">
                  <a href="#">See all pending tasks</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
        <div class="clearfix"> </div>
      </div>
      <!--notification menu end -->

      <div class="clearfix"> </div>
    </div>


    <div class="header-right">
      <div class="profile_details">
        <ul>
          <li class="dropdown profile_details_drop">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <div class="profile_img">
                <span class="prfil-img"><img src="images/2.jpg" alt=""> </span>
                <div class="user-name">
                  <?php
                  $nama = $_SESSION['Id'];
                  $carinama = mysql_query("SELECT * FROM id_data WHERE id ='$nama'");
                  $a = mysql_fetch_assoc($carinama);
                  ?>
                  <p><?php echo $a['Nama']; ?></p>
                  <span><?php echo $_SESSION['level']; ?></span>
                </div>
                <i class="fa fa-angle-down lnr"></i>
                <i class="fa fa-angle-up lnr"></i>
                <div class="clearfix"></div>
              </div>
            </a>
            <ul class="dropdown-menu drp-mnu">
              <li> <a href="gantipassword.php"><i class="fa fa-sign-out"></i> Ganti Password</a> </li>
              <li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  <!-- //header-ends -->
