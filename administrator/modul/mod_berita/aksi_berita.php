<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../configurasi/koneksi.php";
include "../../../configurasi/fungsi_thumb.php";
include "../../../configurasi/library.php";

$module=$_GET[module];
$act=$_GET[act];

// Input admin
if ($module=='berita' AND $act=='input_berita'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $direktori_file = "../../../foto_berita/$nama_file";
  
  //apabila nis tersedia dan ada foto
  if (!empty($lokasi_file)){
      if (file_exists($direktori_file)){
            echo "<script>window.alert('Nama file gambar sudah ada, mohon diganti dulu');
            window.location=(href='../../media_admin.php?module=berita&act=tambahberita')</script>";
      }else{
            if($tipe_file != "image/jpeg" AND
               $tipe_file != "image/jpg"){
                    echo "<script>window.alert('Tipe File tidak diizinkan.');
                    window.location=(href='../../media_admin.php?module=berita&act=tambahberita')</script>";
            }else{
                mysql_query("INSERT INTO berita(id_kategori,
                                 judul,
                                 isi_berita,
                                 jam,
                                 tanggal,
                                 hari,
                                 gambar) 
	                       VALUES('$_POST[kategori]',
                                '$_POST[judul]',
                                '$_POST[isi_berita]',
                                '$jam_sekarang',
                                '$tgl_sekarang',
                                '$hari_ini',
                                '$nama_file')");
                UploadBerita($nama_file);
            }
      }
      header('location:../../media_admin.php?module='.$module);
  }
  //apablia foto tidak ada
  elseif(empty($lokasi_file)){
        mysql_query("INSERT INTO berita(id_kategori,
                                 judul,
                                 isi_berita,
                                 jam,
                                 tanggal,
                                 hari) 
	                       VALUES('$_POST[kategori]',
                                '$_POST[judul]',
                                '$_POST[isi_berita]',
                                '$jam_sekarang',
                                '$tgl_sekarang',
                                '$hari_ini')");
        header('location:../../media_admin.php?module='.$module);
   }     
}
 //updata berita
elseif ($module=='berita' AND $act=='update_berita'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $direktori_file = "../../../foto_berita/$nama_file";

  $cek = mysql_query("SELECT * FROM berita WHERE id_berita = '$_POST[id]'");
  $ketemu=mysql_fetch_array($cek);

   //apabila foto tidak diubah dan password tidak di ubah
  if (empty($lokasi_file)){
      mysql_query("UPDATE berita SET
                                  id_kategori  = '$_POST[kategori]',
                                  judul        = '$_POST[nama]',
                                  isi_berita   = '$_POST[isi_berita]'
                           WHERE  id_berita    = '$_POST[id]'");
  
  }
  //apabila foto diubah dan password tidak diubah
  elseif(!empty($lokasi_file)){
      if (file_exists($direktori_file)){
            echo "<script>window.alert('Nama file gambar sudah ada, mohon diganti dulu');
            window.location=(href='../../media_admin.php?module=berita')</script>";
         }else{
            if($tipe_file != "image/jpeg" AND
               $tipe_file != "image/jpg"){
                     echo "<script>window.alert('Tipe File tidak di ijinkan.');
                     window.location=(href='../../media_admin.php?module=berita')</script>";
            }else{
                $cek = mysql_query("SELECT * FROM berita WHERE id_berita = '$_POST[id]'");
                $r = mysql_fetch_array($cek);
    
                if(!empty($r[foto])){
                $img = "../../../foto_berita/$r[gambar]";
                unlink($img);
                $img2 = "../../../foto_berita/kecil_$r[gambar]";
                unlink($img2);
                }
                
                UploadBerita($nama_file);
                mysql_query("UPDATE berita SET
                                      id_kategori  = '$_POST[kategori]',
                                      judul        = '$_POST[nama]',
                                      isi_berita   = '$_POST[isi_berita]',
                                      gambar       = '$nama_file'
                               WHERE  id_berita    = '$_POST[id]'");
             }
         }
  }
 
}

elseif ($module=='berita' AND $act=='update_kelas_berita'){
    mysql_query("UPDATE berita SET id_kelas         = '$_POST[id_kelas]'
                                WHERE  id_berita    = '$_SESSION[idberita]'");

header('location:../../../media.php?module=kelas');
}

elseif ($module=='berita' AND $act=='hapusberita'){
    
    $cek = mysql_query("SELECT * FROM berita WHERE id_berita = '$_GET[id]'");
    $r = mysql_fetch_array($cek);
    
    if(!empty($r[gambar])){
        $img = "../../../foto_berita/$r[gambar]";
        unlink($img);
        $img2 = "../../../foto_berita/kecil_$r[gambar]";
        unlink($img2);
    }    
  mysql_query("DELETE FROM berita WHERE id_berita = '$_GET[id]'");
  header('location:../../media_admin.php?module='.$module);
}

}
?>