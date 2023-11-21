<?php
if(!isset($_SESSION))
{
	session_start();
}
?>

<?php
include"configurasi/koneksi.php";
include"configurasi/fungsi_kalender.php";
include "configurasi/fungsi_indotgl.php";

?>
<script src="includes/ajax/libs/jquery.js"></script>
<script src="includes/js/jsDate/Scripts/DateTimePicker.js" type="text/javascript"></script>
    <script type="text/javascript" src="includes/ajax/libs/jquery.ui.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="includes/ajax/libs/jquery.ui.css">
<script src="js/jquery-1.9.1.js">
</script>
<script> 
$(document).ready(function(){
  $("#flip2").click(function(){
    $("#panel2").slideToggle("slow2");
  });
});
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome To E-Learning MTSS PUI Maja - Jawa Barat<?php echo $_GET['dir']."-".$_GET['module']; ?></title>
<link rel="shortcut icon" HREF="images/logo.png">
<link href="css.css" rel="stylesheet" type="text/css" />
<link href="css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/dropdown/themes/nvidia.com/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="css.css">
<link rel="stylesheet" type="text/css" href="css/style6.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style/siap.css">
<link rel="stylesheet" type="text/css" href="style/xstylesiap.css">
<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        onClose: function(dateText, inst) { 
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    });
});
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function altRows(id){
	if(document.getElementsByTagName){  
		
		var table = document.getElementById(id);  
		var rows = table.getElementsByTagName("tr"); 
		 
		for(i = 0; i < rows.length; i++){          
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}      
		}
	}
}

window.onload=function(){
	altRows('alternatecolor');
}
</script>

<style type="text/css">body, a:hover {cursor: url(http://cur.cursors-4u.net/cursors/cur-11/cur1026.ani) url(http://cur.cursors-4u.net/cursors/cur-11/cur1026.png),, progress;}</style>

<style type="text/css">
    body { font-family:tahoma; font-size:12px; }
    #container { width:450px; padding:20px 40px; margin:50px auto; border:0px solid #555; box-shadow:0px 0px 2px #555; }
    input[type="text"] { width:200px; }
    input[type="text"], textarea { padding:5px; margin:2px 0px; border: 1px solid #777; }
    input[type="submit"], input[type="reset"],input[type="button"] { padding: 3px 15px; margin:2px 0px; font-weight:bold; cursor:pointer; }
 	#error { border:1px solid red; background:#ffc0c0; padding:5px; }
</style>

	<link rel="stylesheet" href="galery/galery_files/vlb_files1/vlightbox1.css" type="text/css" />
		<link rel="stylesheet" href="galery/galery_files/vlb_files1/visuallightbox.css" type="text/css" media="screen" />
<script src="galery/galery_files/vlb_engine/jquery.min.js" type="text/javascript"></script>
		<script src="galery/galery_files/vlb_engine/visuallightbox.js" type="text/javascript"></script>
</head>

<body>
 
<center>
<div id="awal"><div class="box1">

<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" bgcolor="#FFFFFF">
   <tr>
    <td colspan="4" align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3" class="altrowstable">
    	<tr>
     	<td colspan="4" align="center"><img src="images/header1.jpg" width="1181" height="193" />    	</td>
    	</tr>
        <!--
   	 	<tr>
    	<td  colspan="2" align="center"><p class="wadah-mengetik">Welcome To E-Discussion MTSS PUI Maja - Jawa Barat </a></p></td>
      	</tr> -->
<!---------------------------------------------------#Header------------------------------------------------------------------------------------->


<!---------------------------------------------------#Menu--------------------------------------------------------------------------------------->
		<tr>
		<td colspan="4">
		<div class="fly">
   <div class="content">
       <ul id="nav" class="dropdown dropdown-horizontal" class="kotak_fixed">
        
        <li><a href="./" >Home</a></li>
 		<li><a href="./" title="">&nbsp;Profil Sekolah</a>
  	      <ul>                    	
             <li><a href="./media.php?page=visi" title="">&nbsp;Visi Misi</a></li>
             <li><a href="./media.php?page=tentangsekolah" title="">&nbsp;Tentang Sekolah</a></li>
          </ul>        
        </li>			 	
        <li><a href="./media.php?page=berita" >Berita</a></li>
            <?php
			  if(empty($_SESSION['id_acount'])){
    			  echo "<li><a href='./media.php?page=registrasi'>Registrasi</a></li>";			  
			  }else{
			     echo "<li><a href='./media.php?page=logout'>Logout</a></li>";
    		  }
			?>  	
	</ul>
	</div>
	</div>
	</td>
	</tr>
<!---------------------------------------------------#Sidebar------------------------------------------------------------------------------------->

<!---------------------------------------------------#Content------------------------------------------------------------------------------------->
    <tr>
        <td width="80%" valign="top" align="justify" colspan="3">
		<?php
		$page=$_GET['page'];
		if($page=='home'){
			if(empty($_SESSION['id_acount'])){
			include"home.php";
			}else{
			include"home.php";
			}
		}
		else if($page=='profil'){
		include"profil.php";
		}
		else if($page=='berita'){
		include"berita.php";
		}
		else if($page=='registrasi'){
		include"registrasi.php";
		}
		else if($page=='visi'){
		include"visimisi.php";
		}
		else if($page=='tentangsekolah'){
		include"tentangsekolah.php";
		}

// Modul detail berita
elseif ($page=='detailberita'){
	$detail=mysql_query("SELECT * FROM berita,kategori    
                      WHERE kategori.id_kategori=berita.id_kategori 
                      AND id_berita='$_GET[id]'");
	$d   = mysql_fetch_array($detail);
	$tgl = tgl_indo($d['tanggal']);
	$baca = $d['dibaca']+1;
	echo "<br><br><span class=date>$d[hari], $tgl - $d[jam] WIB</span><br />";
	echo "<h5>$d[judul]</h5>";
	echo "<span class=posting>Diposting oleh : <b>Admin</b><br /> 
        Kategori: <a href=kategori-$d[id_kategori]-$d[kategori_seo].php><b>$d[nama_kategori]</b></a> 
        - Dibaca: <b>$baca</b> kali</span><br /><br />";
        error_reporting(0);
 	$isi_berita=nl2br($d[isi_berita]); // membuat paragraf pada isi berita
//	echo "$isi_berita<br />";	 		  
	echo "$d[isi_berita] <br />";	 		  

  // Apabila ada gambar dalam berita, tampilkan   
 	if ($d['gambar']!=''){
		echo "<p><a href='foto_berita/$d[gambar]' title='$d[judul]'>
<img src='foto_berita/kecil_$d[gambar]' alt='$d[gambar]'><a/></p>";
	}
  
  // Tampilkan judul berita yang terkait (maks: 5) 
  echo "<br/><p class='style1'><h2 class='title_icon news'><img src=images/status.png> &nbsp;Berita Terkait</h2><ul>";
  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata  = explode(" ",$d['judul']);
  $jml_katakan = (integer)count($pisah_kata);

  $jml_kata = $jml_katakan-1; 
  //$ambil_id = substr($_GET['id'],0,4);
  $ambil_id = $_GET['id'];

  // Looping query sebanyak jml_kata
  $cari = "SELECT * FROM berita WHERE id_berita!='$ambil_id' and (" ;
    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "judul LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    }
   $cari .= ") ORDER BY id_berita DESC LIMIT 5";
 
  $hasil  = mysql_query($cari);
  while($h=mysql_fetch_array($hasil)){
  		echo "<li><a href=media.php?page=detailberita&id=$h[id_berita]>$h[judul]</a></li>";
  }      
	echo "</ul></p>";

  // Apabila detail berita dilihat, maka tambahkan berapa kali dibacanya
  mysql_query("UPDATE berita SET dibaca=$d[dibaca]+1 
              WHERE id_berita='$_GET[id]'"); 

}
		?>
        </td>
                <td width="20%" align="left" valign="top">
		<?php
		if(isset($_SESSION['id_acount']))
		{
		include("logout.php");
		include("jam.php");
		}else{
		include("login.php");
		include("jam.php");
		}
		?>
<br>

		</td>
		</tr>
		    
  </table>
  </td>
  </tr>
  
<!---------------------------------------------------#Footer------------------------------------------------------------------------------------->
  <tr>
    <td colspan="2" align="center" valign="top" bgcolor="#0099FF"><div id="bawah"><br/>Copyright &copy; 2020 <br/><br />
    </div></td>
  </tr>
</table>
</div>
</div>
</body>
</html>