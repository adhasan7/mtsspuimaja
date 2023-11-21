<?php
include "configurasi/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['user']);
$pass     = anti_injection($_POST['password']);
$pass=md5($_POST['password']);
$pass_user     = anti_injection($_POST['password']);

$level=$_POST['level'];
if($level=='admin'){
$login=mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  include "timeout.php";  
  $_SESSION[idadmin]      = $r[id_admin];
  $_SESSION[namauser]     = $r[username];
  $_SESSION[namalengkap]  = $r[nama_lengkap];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[leveluser]    = $level;
  $_SESSION[email]		  = $r[email];  
  $_SESSION[login] = 1;  
  timer();
  
  $sid_lama = session_id();
  session_regenerate_id();
  $sid_baru = session_id();
  mysql_query("UPDATE admin SET id_session='$sid_baru' WHERE username='$username'");
  header('location:administrator/media_admin.php?module=home');
}
else{
  echo "<script>alert('Maaf, Password Dan Username Anda Tidak Benar, atau account anda sudah di blokir !');javascript:history.go(-1) </script>";
}
}elseif($level=='pengajar'){
$login=mysql_query("SELECT * FROM pengajar WHERE username_login='$username' AND password_login='$pass' AND blokir='N'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  include "timeout.php";
  $_SESSION[nip]          = $r[nip];
  $_SESSION[idpengajar]   = $r[id_pengajar];
  $_SESSION[namauser]     = $r[username_login];
  $_SESSION[namalengkap]  = $r[nama_lengkap];
  $_SESSION[passuser]     = $r[password_login];
  $_SESSION[leveluser]    = $level;
  $_SESSION[email]		  = $r[email];
  $_SESSION[login] = 1;  
  timer();
  
  $sid_lama = session_id();
  session_regenerate_id();
  $sid_baru = session_id();
  mysql_query("UPDATE pengajar SET id_session='$sid_baru' WHERE username_login='$username'");
  header('location:administrator/media_admin.php?module=home');
}
else{
  $sql= "SELECT * FROM admin WHERE username='$username' AND password='$pass' AND blokir='N'";
  //echo "<script>alert($sql) </script>";
  echo "<script>alert('Maaf, Password Dan Username Anda Tidak Benar, atau account anda sudah di blokir !');javascript:history.go(-1) </script>";
}
}else{
$login=mysql_query("SELECT * FROM siswa WHERE username_login='$username' AND password_login='$pass' AND blokir='N'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  include "timeout.php";
  $_SESSION[namauser]     = $r[username_login];
  $_SESSION[namalengkap]  = $r[nama_lengkap];
  $_SESSION[passuser]     = $r[password_login];
  $_SESSION[leveluser]    = $r[level];
  $_SESSION[idsiswa]      = $r[id_siswa];

  // session timeout
  $_SESSION[login] = 1;
  timer();
  
  $sid_lama = session_id();
  session_regenerate_id();
  $sid_baru = session_id();
  $waktu = date("H:i:s");
  $tgl = date("Y-m-d");
  mysql_query("insert into pengunjung (id_acount,waktu,tgl) values ('$_SESSION[id_acount]','$waktu','$tgl') ");
  mysql_query("update acount set aktif='1' WHERE id_acount=' $_SESSION[id_acount]' ");
  header('location:./siswa/media.php?module=home');
}
else{
  echo "<script>alert('Maaf, Password Dan Username Anda Tidak Benar, atau account anda sudah di blokir !');javascript:history.go(-1) </script>";
}
}

?>
