<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../configurasi/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];
$kelas=$_GET[kelas];

// Input mapel
if ($module=='laporanabsensi' AND $act=='cetaklaporan'){
    if ($_SESSION[leveluser]=='admin'){
      $tampil_absensi = mysql_query("SELECT a.id_siswa,s.nis,s.nama_lengkap,k.nama,a.tanggal FROM ((absensi a INNER JOIN siswa s ON s.id_siswa=a.id_siswa) INNER JOIN kelas k ON k.id_kelas=s.id_kelas) ORDER BY a.tanggal");
    }elseif ($_SESSION[leveluser]=='pengajar'){
      $tampil_absensi = mysql_query("SELECT a.id_siswa,s.nis,s.nama_lengkap,k.nama,a.tanggal FROM ((absensi a INNER JOIN siswa s ON s.id_siswa=a.id_siswa) INNER JOIN kelas k ON k.id_kelas=s.id_kelas) WHERE k.id_pengajar = '$_SESSION[idpengajar]' ORDER BY a.tanggal");
    }
	echo "<div class='logo clear'><img src='../../../images/logo.png' alt='Logo Aksi' width='100' height='100' /></div>";
      echo "<h2>Laporan Absensi Siswa</h2><hr>";
          echo "<br><br><table border='1' style='width: 100%'><thead>
          <tr><th>No</th><th>Id Siswa</th><th>NIS</th><th>Nama</th><th>Kelas</th><th>Tanggal Absensi</th></tr></thead>";
    $no=1;
    while ($r=mysql_fetch_array($tampil_absensi)){
       echo "<tr><td>$no</td>
             <td>$r[id_siswa]</td>
             <td>$r[nis]</td>            
             <td>$r[nama_lengkap]</td>            
             <td>$r[nama]</td>
             <td>$r[tanggal]</td>";
      $no++;
    }
    echo "</table>";
	
    echo "<script>
		window.print();
	</script>";
        
}

// Input mapel
elseif ($module=='laporanabsensi' AND $act=='cetaklaporankelas'){
    if ($_SESSION[leveluser]=='admin'){
      $tampil_absensi = mysql_query("SELECT a.id_siswa,s.nis,s.nama_lengkap,k.nama,a.tanggal FROM ((absensi a INNER JOIN siswa s ON s.id_siswa=a.id_siswa) INNER JOIN kelas k ON k.id_kelas=s.id_kelas) ORDER BY a.tanggal");
    }elseif ($_SESSION[leveluser]=='pengajar'){
      $tampil_absensi = mysql_query("SELECT a.id_siswa,s.nis,s.nama_lengkap,k.nama,a.tanggal FROM ((absensi a INNER JOIN siswa s ON s.id_siswa=a.id_siswa) INNER JOIN kelas k ON k.id_kelas=s.id_kelas) WHERE k.id_pengajar = '$_SESSION[idpengajar]' and k.nama = '$kelas' ORDER BY a.tanggal");
    }
	echo "<div class='logo clear'><img src='../../../images/logo.png' alt='Logo Aksi' width='100' height='100' /></div>";
      echo "<h2>Laporan Absensi Siswa</h2><hr>";
          echo "<br><br><table border='1' style='width: 100%'><thead>
          <tr><th>No</th><th>Id Siswa</th><th>NIS</th><th>Nama</th><th>Kelas</th><th>Tanggal Absensi</th></tr></thead>";
    $no=1;
    while ($r=mysql_fetch_array($tampil_absensi)){
       echo "<tr><td>$no</td>
             <td>$r[id_siswa]</td>
             <td>$r[nis]</td>            
             <td>$r[nama_lengkap]</td>            
             <td>$r[nama]</td>
             <td>$r[tanggal]</td>";
      $no++;
    }
    echo "</table>";
	
    echo "<script>
		window.print();
	</script>";
}

}
?>