<?php
session_start();
error_reporting(0);
include "timeout.php";
timer();

if($_SESSION[login]==1){
	if(!cek_login()){
		$_SESSION[login] = 0;
	}
}
if($_SESSION[login]==0){
  header('location:logout.php');
}else{
    if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
      echo "<link href=css/style.css rel=stylesheet type=text/css>";
      echo "<div class='error msg'>Untuk mengakses Modul anda harus login.</div>";
    }else{
        if ($_SESSION['leveluser']=='siswa'){
         echo "<link href=css/style.css rel=stylesheet type=text/css>";
         echo "<div class='error msg'>Anda tidak diperkenankan mengakses halaman ini.</div>";
        }else{
            echo "<link href=css/style.css rel=stylesheet type=text/css>";
            echo "<div class='error msg'>Silahkan mengakses halaman ini.</div>";
            //header('location:media_admin.php?module=home');
        }
    }
}
?>