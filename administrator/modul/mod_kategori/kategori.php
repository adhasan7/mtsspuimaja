<script>
function confirmdelete(delUrl) {
if (confirm("Anda yakin ingin menghapus?")) {
document.location = delUrl;
}
}
</script>
<script language="JavaScript" type="text/JavaScript">

 function showsiswa()
 {
 <?php

 // membaca semua kategori
 $query = "SELECT * FROM kategori";
 $hasil = mysql_query($query);

 // membuat if untuk masing-masing pilihan kategori beserta isi option untuk combobox kedua
 while ($data = mysql_fetch_array($hasil))
 {
   $idkategori = $data['id_kategori'];

   // membuat IF untuk masing-masing kategori
   echo "if (document.form_kategori.kategori.value == \"".$idkategori."\")";
   echo "{";

   // membuat option matapelajaran untuk masing-masing kategori
   $query2 = "SELECT * FROM siswa WHERE id_kategori = '$idkategori'";
   $hasil2 = mysql_query($query2);
   $content = "document.getElementById('siswa').innerHTML = \"<select name='ketua'><option value='0' selected>--Pilih--</option>";
   while ($data2 = mysql_fetch_array($hasil2))
   {
       $content .= "<option value='".$data2['id_siswa']."'>".$data2['nama_lengkap']."</option>";
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

$aksi="modul/mod_kategori/aksi_kategori.php";
switch($_GET[act]){
  // Tampil kategori
  default:
    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM kategori ORDER BY id_kategori");

      echo "<h2>Kategori Berita</h2><hr>
          <input type=button class='button blue' value='Tambah Kategori' onclick=\"window.location.href='?module=kategori&act=tambahkategori';\">";
      echo "<br><br><table id='table1' class='gtable sortable'><thead>
          <tr><th>No</th><th>Id Kategori</th><th>Kategori Berita</th><th>Seo</th><th>Aksi</th></tr></thead>";
    $no=1;
    while ($r=mysql_fetch_array($tampil)){       
       echo "<tr><td>$no</td>
             <td>$r[id_kategori]</td>
             <td>$r[nama_kategori]</td>
             <td>$r[kategori_seo]</td>";
             echo "<td><a href='?module=kategori&act=editkategori&id=$r[id_kategori]' title='Edit'><img src='images/icons/edit.png' alt='Edit' /></a> |
                 <a href=javascript:confirmdelete('$aksi?module=kategori&act=hapuskategori&id=$r[id_kategori]') title='Hapus'><img src='images/icons/cross.png' alt='Delete' /></a> 
                 </td></tr>";
      $no++;
      
    }
    echo "</table>";
    }
    break;
    
    case "tambahkategori":
    if ($_SESSION[leveluser]=='admin'){
    echo "<form method=POST action='$aksi?module=kategori&act=input_kategori'>
          <fieldset>
          <legend>Tambah Kategori</legend>
          <dl class='inline'>
          <dt><label>Kategori Berita</label></dt>    <dd> : <input type=text name='nama_kategori'></dd>
          </dl>
          <div class='buttons'>
          <input class='button blue' type=submit value=Simpan>
          <input class='button blue' type=button value=Batal onclick=self.history.back()>
          </div>
          </fieldset></form>";
    }
    break;

    case "editkategori":
    if ($_SESSION[leveluser]=='admin'){
    $tampil = mysql_query("SELECT * FROM kategori WHERE id_kategori = '$_GET[id]'");
    $r = mysql_fetch_array($tampil);
    
    echo "<form method=POST action='$aksi?module=kategori&act=update_kategori'>
          <input type=hidden name=id value='$r[id_kategori]'>
          <fieldset>
          <legend>Edit Kategori Berita</legend>
          <dl class='inline'>
          <dt><label>Kategori Berita</label></dt>     <dd> : <input type=text name='nama_kategori' value='$r[nama_kategori]'></dd>
          </dl>
          <div class='buttons'>
          <input class='button blue' type=submit value=Update>
          <input class='button blue' type=button value=Batal onclick=self.history.back()>
          </div>
          </fieldset></form>";
    }
    break;
}
}
?>