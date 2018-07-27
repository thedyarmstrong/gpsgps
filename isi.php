<?php

include"koneksi.php";
$page=$_GET['page'];

switch($page)

{
	case "1";
	include "isiassign.php";
	break;
}

?>
