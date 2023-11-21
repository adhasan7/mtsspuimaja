<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
  <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../index.php><b>LOGIN</b></a></center>";
}else{
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

  $extensionList = array("zip", "rar", "doc", "docx", "xls", "xlsx", "ppt", "pptx", "pdf");
  $pecah = explode(".", $nama_file);
  $ekstensi = $pecah[1];
  
  if (!empty($lokasi_file)){
        $cek_siswa = mysql_query("SELECT * FROM siswa_sudah_upload WHERE id_file='$idfile' AND id_siswa='$_SESSION[idsiswa]'");
        $info_siswa = mysql_fetch_array($cek_siswa);
        if ($info_siswa[hits]<= 0){
            $infofile='Nama file sudah ada, mohon diganti dulu dengan nama anda di depan nama file...!';
        }else{
            $infofile='File ini sudah pernah anda upload, mohon diganti dulu dengan nama anda di depan nama file...!';            
        }    
  
      if (file_exists($direktori_file)){
            echo "<script>window.alert('$infofile');
            window.location=(href='media.php?module=materi')</script>";
      }elseif (!in_array($ekstensi, $extensionList)){              
            echo "<script>window.alert('Tipe file tidak diijinkan');
            window.location=('media.php?module=materi')</script>";
      }else{
            UploadFileMateri($nama_file);
            mysql_query("update file_materi set uploads=uploads+1 where id_file='$idfile'");
            if ($info_siswa[hits]<= 0){
                   mysql_query("INSERT INTO siswa_sudah_upload (id_file,id_siswa,nama_file,hits)
                                                            VALUES ('$idfile','$_SESSION[idsiswa]','$nama_file',hits+1)");
            }elseif ($info_siswa[hits] > 0){                                        
                mysql_query("update siswa_sudah_upload set hits=hits+1, nama_file = '$nama_file' where id_file='$idfile' AND id_siswa='$_SESSION[idsiswa]'");
            }
            header('location:media.php?module=materi');
       }
   }else {               
        echo "<script>window.alert('File yang diupload belum dipilih...!');
                window.location=('media.php?module=materi')</script>";
   }
}
?>