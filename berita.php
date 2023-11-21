<?php

include_once "configurasi/koneksi.php";
include_once "configurasi/fungsi_indotgl.php";

$module= $_GET['module'];
if ($module==''){
    $module='semuaberita';
}    

if ($module=='semuaberita'){
	echo "<h2 class='title_icon news'>Berita Terkini</h2>";
  // Tampilkan 5 headline berita terbaru dan hitung jumlah komentar masing-masing berita
  $terkini=mysql_query("select judul, jam, 
                       id_berita, hari, tanggal, gambar, isi_berita    
                       from berita where aktif='Y' order by id_berita
                       DESC LIMIT 6");

// 	$terkini= mysql_query("SELECT * FROM berita ORDER BY id_berita DESC LIMIT 5");		 
    echo "<ul class='list1'>";
	while($t=mysql_fetch_array($terkini)){
		$tgl = tgl_indo($t['tanggal']);
		echo "<em>$t[hari], $tgl - $t[jam] WIB</em> <h5> $t[judul] </h5>";
 		// Apabila ada gambar dalam berita, tampilkan
		if ($t['gambar']!=''){
				echo "<img src='./foto_berita/kecil_$t[gambar]' width=110 border=0>";
			}
		// Tampilkan hanya sebagian isi berita
		$isi_berita = htmlentities(strip_tags($t['isi_berita'])); // membuat paragraf pada isi berita dan mengabaikan tag html
		$isi = substr($isi_berita,0,220); // ambil sebanyak 220 karakter
		$isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat
	
		echo "<p>$isi... <a href=media.php?page=detailberita&id=$t[id_berita]>Selengkapnya click disini...</a></p>";
		echo "<div class='cleaner h30'></div>";
	}
		echo "";
}

?>