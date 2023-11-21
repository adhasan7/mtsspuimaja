<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../index.php><b>LOGIN</b></a></center>";
}
else{
include "../configurasi/koneksi.php";
include "../configurasi/library.php";
include "../configurasi/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];
$idfile=$_GET['id'];

  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $tipe_file   = $_FILES['fupload']['type'];
  $direktori_file = "../files_upload_materi/$nama_file";

  $extensionList = array("zip", "rar", "doc", "docx", "ppt", "pptx", "pdf");
  $pecah = explode(".", $nama_file);
  $ekstensi = $pecah[1];
  
  if (!empty($lokasi_file)){
  
      if (file_exists($direktori_file)){
            echo "<script>window.alert('Nama file sudah ada, mohon diganti dulu dengan nama anda di depan nama file...!');
            window.location=(href='media.php?module=materi')</script>";
            }
      elseif (!in_array($ekstensi, $extensionList)){
               
                echo "<script>window.alert('Tipe file tidak diijinkan');
                window.location=('../../media.php?module=materi')</script>";
        }
        else{
                    UploadFileMateri($nama_file);
                    mysql_query("update file_materi set uploads=uploads+1 where id_file='$idfile'");
                    
                    header('location:media.php?module=materi');
            }
       }
   else {
               
        echo "<script>window.alert('File yang diupload belum dipilih...!');
                window.location=('media.php?module=materi')</script>";
        }
  }
?>