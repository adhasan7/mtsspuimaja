<script>
function confirmdelete(delUrl) {
if (confirm("Anda yakin ingin menghapus?")) {
document.location = delUrl;
}
}
</script>
<script language="JavaScript" type="text/JavaScript">

 function showpel()
 {
 <?php

 // membaca semua kelas
 $query = "SELECT * FROM absensi";
 $hasil = mysql_query($query);

 // membuat if untuk masing-masing pilihan absensi beserta isi option untuk combobox kedua
 while ($data = mysql_fetch_array($hasil))
 {
   $idsiswa = $data['id_siswa'];

   // membuat IF untuk masing-masing absensi
   echo "if (document.form_laporan.id_siswa.value == \"".$idsiswa."\")";
   echo "{";

   // membuat option matapelajaran untuk masing-masing absensi
   $query2 = "SELECT * FROM siswa WHERE id_siswa = '$idsiswa'";
   $hasil2 = mysql_query($query2);
   $content = "document.getElementById('pelajaran').innerHTML = \"<select name='".id_matapelajaran."'>";
   while ($data2 = mysql_fetch_array($hasil2))
   {
       $content .= "<option value='".$data2['id_matapelajaran']."'>".$data2['nama']."</option>";
   }
   $content .= "</select>\";";
   echo $content;
   echo "}\n";
 }

 ?>
 }
</script>

<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href=../css/style.css rel=stylesheet type=text/css>";
  echo "<div class='error msg'>Untuk mengakses Modul anda harus login.</div>";
}
else{

$aksi="modul/mod_laporanabsensi/aksi_laporanabsensi.php";
switch($_GET[act]){
// Tampil Mata Pelajaran
  default:
    if ($_SESSION[leveluser]=='admin'){
      $tampil_absensi = mysql_query("SELECT a.id_siswa,s.nis,s.nama_lengkap,k.nama,a.tanggal FROM ((absensi a INNER JOIN siswa s ON s.id_siswa=a.id_siswa) INNER JOIN kelas k ON k.id_kelas=s.id_kelas) ORDER BY a.tanggal");
	echo "<div class='logo clear'><img src='../../../images/logo.png' alt='Logo' width='100' height='100' /></div>";
      echo "<h2>Laporan Absensi Siswa</h2><hr>
          <input class='button blue' type=button value='Cetak Laporan' onclick=\"window.location.href='$aksi?module=laporanabsensi&act=cetaklaporan';\">";
          echo "<br><br><table id='table1' class='gtable sortable'><thead>
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
    }
    elseif ($_SESSION[leveluser]=='pengajar'){
         echo"<h2>Kelas Yang Anda Ajar</h2><hr>
         <input type=button class='button blue' value='Cetak Semua' onclick=\"window.location.href='$aksi?module=laporanabsensi&act=cetaklaporan';\">";

         $tampil_kelas = mysql_query("SELECT * FROM kelas WHERE id_pengajar = '$_SESSION[idpengajar]'");
         $ketemu=mysql_num_rows($tampil_kelas);
         if (!empty($ketemu)){
                echo "<br><br><table id='table1' class='gtable sortable'><thead>
                <tr><th>No</th><th>Kelas</th><th>Wali Kelas</th><th>Ketua Kelas</th><th>Aksi</th></tr></thead>";

                $no=1;
                while ($r=mysql_fetch_array($tampil_kelas)){
                    echo "<tr><td>$no</td>
                    <td>$r[nama]</td>";
                    $kelas=$r[nama];
                    
                    $pengajar = mysql_query("SELECT * FROM pengajar WHERE id_pengajar = '$_SESSION[idpengajar]'");
                    $ada_pengajar = mysql_num_rows($pengajar);
                    if(!empty($ada_pengajar)){
                    while($p=mysql_fetch_array($pengajar)){
                            echo "<td>$p[nama_lengkap]</td>";
                    }
                    }else{
                            echo "<td></td>";
                    }

                    $siswa = mysql_query("SELECT * FROM siswa WHERE id_siswa = '$r[id_siswa]'");
                    $ada_siswa = mysql_num_rows($siswa);
                    if(!empty($ada_siswa)){
                    while ($s=mysql_fetch_array($siswa)){
                            echo"<td>$s[nama_lengkap]</td>";
                     }
                    }else{
                            echo"<td></td>";
                    }

                    echo "<td><input class='button small white' type=button value='Cetak Absensi Kelas $kelas' onclick=\"window.location.href='$aksi?module=laporanabsensi&act=cetaklaporankelas&kelas=$kelas';\"></td>";
                $no++;
                }
                echo "</table>";
                }else{
                    echo "<script>window.alert('Tidak ada kelas yang anda ajar,kembali ke home untuk menambah');
                    window.location=(href='?module=home')</script>";
                }
    }
    elseif ($_SESSION[leveluser]=='siswa'){
        $siswa = mysql_query("SELECT * FROM siswa WHERE id_siswa = $_SESSION[idsiswa]");
        $data_siswa = mysql_fetch_array($siswa);
        $tampil_absensi = mysql_query("SELECT * FROM online WHERE id_siswa = $_SESSION[idsiswa]");
	   echo "<div class='logo clear'><img src='../../../images/logo.png' alt='Logo Aksi' width='100' height='100' /></div>";
        echo"<br><b class='judul'>Daftar Absensi Anda</b><br><p class='garisbawah'></p>";
        echo "<table>
          <tr><th>No</th><th>IP Address</th><th>Login</th></tr>";
        $no=1;
        while ($r=mysql_fetch_array($tampil_absensi)){
        echo "<tr><td>$no</td>
             <td>$r[ip]</td>";             
             echo "<td>$r[tanggal]</td>";
        $no++;
        }
        echo "</table>";
    }
    break;

case "xcetaklaporan":
    if ($_SESSION[leveluser]=='admin'){
      $tampil_absensi = mysql_query("SELECT a.id_siswa,s.nis,s.nama_lengkap,k.nama,a.tanggal FROM ((absensi a INNER JOIN siswa s ON s.id_siswa=a.id_siswa) INNER JOIN kelas k ON k.id_kelas=s.id_kelas) ORDER BY a.tanggal");
      echo "<h2>Laporan Absensi Siswa</h2><hr>";
          echo "<br><br><table id='table1' class='gtable sortable'><thead>
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
    elseif ($_SESSION[leveluser]=='pengajar'){
        echo "<form method=POST name='form_laporan' action='$aksi?module=matapelajaran&act=input_matapelajaran_pengajar'>          
          <fieldset>
          <legend>Mata Pelajaran Yang di Ajar</legend>
          <dl class='inline'>
          <dt><label>absensi </label></dt>             <dd><select name='id_siswa' onChange='showpel()'>
                                          <option value=''>-pilih-</option>";
                                          $pilih="SELECT * FROM absensi ORDER BY id_siswa";
                                          $query=mysql_query($pilih);
                                          while($row=mysql_fetch_array($query)){
                                          echo"<option value='".$row[id_siswa]."'>".$row[nama]."</option>";
                                          }
                                          echo"</select></dd>
          <dt><label>Pelajaran </label></dt>          <dd><div id='pelajaran'><select name='id_matapelajaran'></select></div></dd>
          <dt><label>Deskripsi </label></dt>             <dd><textarea name='deskripsi' id='wysiwyg' class='medium' rows='6'></textarea></dd>
          <p align=center><input type=submit class='button blue' value=Simpan>
                      <input type=button class='button blue' value=Batal onclick=self.history.back()></p>
          </dl></fieldset></form>";
    }
    break;

case "editmatapelajaran":
    if ($_SESSION[leveluser]=='admin'){
        $mapel=mysql_query("SELECT * FROM mata_pelajaran WHERE id = '$_GET[id]'");
        $m=mysql_fetch_array($mapel);
        $absensi = mysql_query("SELECT * FROM absensi WHERE id_siswa = '$m[id_siswa]'");
        $k = mysql_fetch_array($absensi);
        $pengajar = mysql_query("SELECT * FROM pengajar WHERE id_pengajar = '$m[id_pengajar]'");
        $d = mysql_fetch_array($pengajar);
        
        echo "
          <form method=POST action='$aksi?module=matapelajaran&act=update_matapelajaran'>
          <input type=hidden name=id value='$m[id]'>
          <fieldset>
          <legend>Edit Mata Pelajaran</legend>
          <dl class='inline'>
          <dt><label>Id Matapelajaran</label></dt>     <dd>: <input type=text name='id_matapelajaran' size=10 value='$m[id_matapelajaran]'></dd>
          <dt><label>Nama</label></dt>                 <dd>: <input type=text name='nama' size=30 value='$m[nama]'></dd>
          <dt><label>absensi</label></dt>                <dd>: <select name='id_siswa'>
                                                  <option value='$k[id_siswa]' selected>$k[nama]</option>";
                                                  $tampil=mysql_query("SELECT * FROM absensi ORDER BY nama");
                                                  while($r=mysql_fetch_array($tampil)){
                                                  echo "<option value=$r[id_siswa]>$r[nama]</option>";
                                                  }echo "</select></dd>
         <dt><label>Pengajar</label></dt>              <dd>: <select name='id_pengajar'>
                                                  <option value='$d[id_pengajar]' selected>$d[nama_lengkap]</option>";
                                                  $tampil_pengajar=mysql_query("SELECT * FROM pengajar ORDER BY nama_lengkap");
                                                  while($p=mysql_fetch_array($tampil_pengajar)){
                                                  echo "<option value=$p[id_pengajar]>$p[nama_lengkap]</option>";
                                                  }echo "</select></dd>
        <dt><label>Deskripsi</label></dt>            <dd>: <textarea name='deskripsi' id='wysiwyg' class='medium' rows='6'>$m[deskripsi]</textarea></dd>
        </dl>
          <div class='buttons'>
          <input class='button blue' type=submit value=Update>
          <input class='button blue' type=button value=Batal onclick=self.history.back()>
          </div>
          </fieldset></form>";
    }else{
        $mapel=mysql_query("SELECT * FROM mata_pelajaran WHERE id = '$_GET[id]'");
        $m=mysql_fetch_array($mapel);
        $absensi = mysql_query("SELECT * FROM absensi WHERE id_siswa = '$m[id_siswa]'");
        $k = mysql_fetch_array($absensi);
        $pengajar = mysql_query("SELECT * FROM pengajar WHERE id_pengajar = '$m[id_pengajar]'");
        $d = mysql_fetch_array($pengajar);

        echo "<form method=POST name='form_laporan' action='$aksi?module=matapelajaran&act=update_matapelajaran_pengajar'>
          <input type=hidden name=id value='$m[id]'>
          <fieldset>
          <legend>Edit Mata Pelajaran</legend>
          <dl class='inline'>
          <dt><label>absensi </label></dt>             <dd><select name='id_siswa' onChange='showpel()'>
                                          <option value='$k[id_siswa]' selected>$k[nama]</option>";
                                          $pilih="SELECT * FROM absensi ORDER BY nama";
                                          $query=mysql_query($pilih);
                                          while($row=mysql_fetch_array($query)){
                                          echo"<option value='".$row[id_siswa]."'>".$row[nama]."</option>";
                                          }
                                          echo"</select></dd>
          <dt><label>Pelajaran </label></dt>         <dd><select id='pelajaran' name='id_matapelajaran'>
                                          <option value='".$m[id_matapelajaran]."' selected>".$m[nama]."</option>
                                          </select></dd>
          <dt><label>Deskripsi </label></dt>         <dd><textarea name='deskripsi' id='wysiwyg' class='medium' rows='6'>$m[deskripsi]</textarea></dd>
          <p align=center><input class='button blue' type=submit value=Simpan>
                      <input class='button blue' type=button value=Batal onclick=self.history.back()></p>
          </dl></fieldset></form>";
    }
    break;
case "detailpelajaran":
    if ($_SESSION[leveluser]=='admin'){
        $detail =mysql_query("SELECT * FROM mata_pelajaran WHERE id_matapelajaran = '$_GET[id]'");
        echo "<div class='information msg'>Detail Mata Pelajaran</div>
          <br><table id='table1' class='gtable sortable'><thead>
          <tr><th>No</th><th>Id Mapel</th><th>Nama</th><th>absensi</th><th>Pengajar</th><th>Deskripsi</th><th>Aksi</th></tr></thead>";
        $no=1;
    while ($r=mysql_fetch_array($detail)){
       echo "<tr><td>$no</td>
             <td>$r[id_matapelajaran]</td>
             <td>$r[nama]</td>";
             $absensi = mysql_query("SELECT * FROM absensi WHERE id_siswa = '$r[id_siswa]'");
             $cek_absensi = mysql_num_rows($absensi);
             if(!empty($cek_absensi)){
             while($k=mysql_fetch_array($absensi)){
                 echo "<td><a href=?module=absensi&act=detailabsensi&id=$r[id_siswa] title='Detail absensi'>$k[nama]</td>";
             }
             }else{
                 echo"<td></td>";
             }
             $pengajar = mysql_query("SELECT * FROM pengajar WHERE id_pengajar = '$r[id_pengajar]'");
             $cek_pengajar = mysql_num_rows($pengajar);
             if(!empty($cek_pengajar)){
             while($p=mysql_fetch_array($pengajar)){
             echo "<td><a href=?module=admin&act=detailpengajar&id=$r[id_pengajar] title='Detail Pengajar'>$p[nama_lengkap]</a></td>";
             }
             }else{
                 echo"<td></td>";
             }
             echo "<td>$r[deskripsi]</td>
             <td><a href='?module=matapelajaran&act=editmatapelajaran&id=$r[id]' title='Edit'><img src='images/icons/edit.png' alt='Edit' /></a> |
                 <a href=javascript:confirmdelete('$aksi?module=matapelajaran&act=hapus&id=$r[id]') title='Hapus'><img src='images/icons/cross.png' alt='Delete' /></a></td></tr>";
      $no++;
    }
    echo "</table>
    <div class='buttons'>
    <br><input class='button blue' type=button value=Kembali onclick=self.history.back()>
    </div>";
    }else{
      $detail =mysql_query("SELECT * FROM mata_pelajaran WHERE id_matapelajaran = '$_GET[id]'");
        echo "<span class='judulhead'><p class='garisbawah'>Detail Mata Pelajaran</p></span>
          <table>
          <tr><th>no</th><th>nama</th><th>absensi</th><th>pengajar</th><th>deskripsi</th></tr>";
                    $no=1;
    while ($r=mysql_fetch_array($detail)){
       echo "<tr><td>$no</td>             
             <td>$r[nama]</td>";
             $absensi = mysql_query("SELECT * FROM absensi WHERE id_siswa = '$r[id_siswa]'");
             $cek_absensi = mysql_num_rows($absensi);
             if(!empty($cek_absensi)){
             while($k=mysql_fetch_array($absensi)){
                 echo "<td><a href=?module=absensi&act=detailabsensi&id=$r[id_siswa] title='Detail absensi'>$k[nama]</td>";
             }
             }else{
                 echo"<td></td>";
             }
             $pengajar = mysql_query("SELECT * FROM pengajar WHERE id_pengajar = '$r[id_pengajar]'");
             $cek_pengajar = mysql_num_rows($pengajar);
             if(!empty($cek_pengajar)){
             while($p=mysql_fetch_array($pengajar)){
             echo "<td><a href=?module=admin&act=detailpengajar&id=$r[id_pengajar] title='Detail Pengajar'>$p[nama_lengkap]</a></td>";
             }
             }else{
                 echo"<td></td>";
             }
             echo "<td>$r[deskripsi]</td></tr>";
             
      $no++;
    }
    echo "</table>
    <input type=button value=Kembali onclick=self.history.back()>";
    }
    break;
}
}
?>