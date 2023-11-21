<script>
function confirmdelete(delUrl) {
if (confirm("Anda yakin ingin menghapus?")) {
document.location = delUrl;
}
}
</script>


<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
   echo "<link href=../css/style.css rel=stylesheet type=text/css>";
   echo "<div class='error msg'>Untuk mengakses Modul anda harus login.</div>";
}
else{

$aksi="modul/mod_berita/aksi_berita.php";
include "../../../configurasi/class_paging.php";

switch($_GET[act]){
  // Tampil topik berita
  default:
      
      if ($_SESSION[leveluser]=='admin'){    
        echo "<h2>Manajemen Berita</h2><hr>
          <input type=button class='button blue' value='Tambah Berita' onclick=\"window.location.href='?module=berita&act=tambahberita';\">";

        echo "<br><br><table id='table1' class='gtable sortable'><thead>
          <tr><th>No</th><th>Judul</th><th>Kategori</th><th>Isi Berita</th><th>Hari</th><th>Tgl Posting</th><th>Jam</th><th>Aksi</th></tr></thead>";
        
        $tampil_berita = mysql_query("SELECT * FROM berita ORDER BY id_kategori");
        
    $no=1;
    while ($r=mysql_fetch_array($tampil_berita)){
      $tanggal   = tgl_indo($r[tanggal]);
       echo "<tr><td>$no</td>
             <td>$r[judul]</td>";
             $kategori = mysql_query("SELECT * FROM kategori WHERE id_kategori = '$r[id_kategori]'");
             $data_kategori = mysql_fetch_array($kategori);
             echo"<td>$data_kategori[nama_kategori]</td>";
             echo"<td>$r[isi_berita]</td>";
             echo"<td>$r[hari]</td>";
             echo"<td>$tanggal</td>
             <td>$r[jam]</td>
             <td><ul><li><a href='?module=berita&act=editberita&id=$r[id_berita]' title='Edit'><img src='images/icons/edit.png' alt='Edit' /></a> | 
                 <a href=javascript:confirmdelete('$aksi?module=berita&act=hapusberita&id=$r[id_berita]') title='Hapus'><img src='images/icons/cross.png' alt='Delete' /></a></li>
                 </ul></td></tr>";
      $no++;
    }
    echo "</table>";
    
    }    
 
    break;


case "tambahberita":
    if ($_SESSION[leveluser]=='admin'){
    echo "
    <form name='form_berita' method=POST action='$aksi?module=berita&act=input_berita' enctype='multipart/form-data'>
    <fieldset>
    <legend>Tambah Berita</legend>
    <dl class='inline'>
    <dt><label>Judul</label></dt>              <dd> <input type=text name='judul' size='50'></dd>
    <dt><label>Kategori</label></dt>              <dd> <select name='kategori'>
                                          <option value=''>-pilih-</option>";
                                          $pilih="SELECT * FROM kategori ORDER BY nama_kategori";
                                          $query=mysql_query($pilih);
                                          while($row=mysql_fetch_array($query)){
                                          echo"<option value='".$row[id_kategori]."'>".$row[nama_kategori]."</option>";
                                          }
                                          echo"</select></dd>
    <dt><label>Isi Berita</label></dt>              <dd> <textarea name='isi_berita' id='wysiwyg' class='medium' rows='6'></textarea></td></tr>
              <dt><label>Foto</label></dt>       <dd> : <input type=file name='fupload' size=40>
                                           <small>Tipe foto harus JPG/JPEG dan ukuran lebar maks: 400 px</small></dd>
<dt><label>Terbit</label></dt>            <dd> <label><input type=radio name='terbit' value='Y' checked>Y</input></label>
                                              <label><input type=radio name='terbit' value='N'>N</input></label></dd>
    </dl>

          <p align=center><input class='button blue' type=submit value=Simpan>
          <input class='button blue' type=button value=Batal onclick=self.history.back()></p>

          </fieldset></form>";
    }
    break;

case "editberita":
    if ($_SESSION[leveluser]=='admin'){

    $edit=mysql_query("SELECT * FROM berita WHERE id_berita = '$_GET[id]'");
    $t=mysql_fetch_array($edit);
    $editk=mysql_query("SELECT * FROM kategori WHERE id_kategori = '$t[id_kategori]'");
    $k=mysql_fetch_array($editk);

    echo "<form name='form_berita' method=POST action='$aksi?module=berita&act=edit_berita' enctype='multipart/form-data'>
    <input type=hidden name=id value='$t[id_berita]'>
    <fieldset>
    <legend>Edit Berita</legend>
    <dl class='inline'>
    <dt><label>Judul</label></dt>              <dd>: <input type=text name='judul' value='$t[judul]' size='50'></dd>
    <dt><label>Kategori</label></dt>            <dd>: <select name='id_kategori'>
                                          <option value='".$k[id_kategori]."' selected>".$k[nama_kategori]."</option>";
                                          $pilih="SELECT * FROM kategori ORDER BY nama_kategori";
                                          $query=mysql_query($pilih);
                                          while($row=mysql_fetch_array($query)){
                                          echo"<option value='".$row[id_kategori]."'>".$row[nama_kategori]."</option>";
                                          }
                                          echo"</select></dd>
    <dt><label>Isi Berita</label></dt>               <dd> <textarea name='isi_berita' id='wysiwyg' class='medium' rows='6'>$t[isi_berita]</textarea></td></tr>";
    echo "<dt><label>Foto</label></dt>   <dd> : ";
            if ($t[gambar]!=''){
              echo "<ul class='photos sortable'>
                    <li>
                    <img src='../foto_berita/kecil_$t[gambar]'>
                    <div class='links'>
                    <a href='../foto_berita/$t[gambar]' rel='facebox'>View</a>
		    <div>
                    </li>
                    </ul>";
          }
          echo "</dd>
          <dt><label>Ganti Foto</label></dt>       <dd> : <input type=file name='fupload' size=40>
                                                <small>Tipe foto harus JPG/JPEG dan ukuran lebar maks: 400 px</small>
                                                <small>Apabila foto tidak diganti, dikosongkan saja</small></dd>";
    if ($t[terbit]=='N'){
      echo "<dt><label>Terbit</label></dt>     <dd> : <label><input type=radio name='terbit' value='Y'> Y</label>
                                           <label><input type=radio name='terbit' value='N' checked> N </label></dd>";
    }
    else{
      echo "<dt><label>Terbit</label></dt>     <dd> : <label><input type=radio name='terbit' value='Y' checked> Y</label>
                                          <label><input type=radio name='terbit' value='N'> N </label></dd>";
    }
    echo "</dl>

          <p align=center><input class='button blue' type=submit value=Update>
          <input class='button blue' type=button value=Batal onclick=self.history.back()></p>

          </fieldset></form>";
    }
    break;

}
}
?>