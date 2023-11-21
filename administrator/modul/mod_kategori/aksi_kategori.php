<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../configurasi/koneksi.php";
include "../../../configurasi/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];
$kategori_seo = seo_title($_POST['nama_kategori']);

// Input kategori
if ($module=='kategori' AND $act=='input_kategori'){
  mysql_query("INSERT INTO kategori(nama_kategori,
                                 kategori_seo)
	                       VALUES('$_POST[nama_kategori]',
                                '$kategori_seo')");
  header('location:../../media_admin.php?module='.$module);
}

elseif ($module=='kategori' AND $act=='update_kategori'){
  mysql_query("UPDATE kategori SET nama_kategori = '$_POST[nama_kategori]',
                                kategori_seo  = '$kategori_seo'
                        WHERE id_kategori = '$_POST[id]'");
  header('location:../../media_admin.php?module='.$module);
}

elseif ($module=='kategori' AND $act=='hapuskategori'){
  mysql_query("DELETE FROM kategori WHERE id_kategori = '$_GET[id]'");
  header('location:../../media_admin.php?module='.$module);
}


}
?>