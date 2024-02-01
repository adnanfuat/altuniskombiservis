<?	session_start();
$link_inherit='duzenle.php';
include("config.php");
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
		$max_file_size=round($max_file_size/10485760);	
		$numara=$_GET["numara"];
		$sql_cumlesi="select * from $tablo_ismi where numara='$numara'";
		$recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
		if (count($recordset)<>0)
		   {
				$ad=$recordset[0]["ad"];
				 $dil=$recordset[0]["dil"];
			  switch ($dil)
					{		
						case 1: $dil_aciklama="Türkçe"; break;
						case 2: $dil_aciklama="İngilizce"; break;
						case 3: $dil_aciklama="Almanca"; break;
						case 4: $dil_aciklama="Rusça"; break;
					} 
				$dosya=$recordset[0]["dosya"];
			}
		else
			{
				header('Location:kontrol.php');
			}
?>
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>js/feedback.js"></SCRIPT>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css"> .style3 {font-size: 10px} </style>
</head>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="50" class="td_anabaslik"><div align="center"><img src="../pictures/ana_dok.gif" width="48" height="48"></div></td>
    <td width="902" class="td_anabaslik"><div align="left"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt;</font></div></td>
  </tr>
</table>
<table width="950" border="0" align="center" bordercolor="#CCCCCC" bgcolor="#FFFFFF" style="border:solid; border-width:1">
  <tr > 
    <form name="form1" method="post" action="duzenle_islem.php" enctype="multipart/form-data">
      <td width="1229"  valign="top" bordercolor="#C0C0C0" bgcolor="#FFFFFF" > 
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td colspan="2" class="anabaslik">Döküman Düzenle </td>
          </tr>
          <tr> 
            <td width="21%"><input name="gizli" type="hidden" id="gizli" value="<? echo $numara; ?>"></td>
            <td width="79%">
			<font  class="hata1"> 
			<? 		
			if (isset($_GET['err']))
			   {
				 switch($_GET['err'])
					{
					   case 'eksik_veri': print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!"); break;
					   case 'yanlis_tarih': print("Tarih Formatında Hata Tesbit Edildi."); break;
					   case 'uzanti': print("Hatalı Resim Formatı"); break;
					   case 'boyut': print("İzin Verilenden Büyük Dosya Boyutu");break;
				    }
			   }
			?>
              </font></td>
          </tr>
          <tr> 
            <td><font class="baslik"> Konu/Başlık *</font></td>
            <td bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'ad'])) { $ad=$_SESSION[$tablo_ismi.'ad']; } ?>
            <input name="ad" type="text" class="textbox1" id="ad" value="<? echo $ad; ?>" size="55"></td>
          </tr>
          <tr>
            <td><font class="baslik"> Dilo *</font></td>
            <td bgcolor="#F9F9F9">
            
            
            <? if (isset($_SESSION[$tablo_ismi.'dil'])) { $dil=$_SESSION[$tablo_ismi.'dil']; } ?>
                <select name="dil" class="textbox1">
                  <option value="1" <? if ($dil==1) { ?> selected="selected" <? } ?>>Türkçe </option>
                  <option value="2" <? if ($dil==2) { ?> selected="selected" <? } ?>>İngilizce </option>
                  <!--<option value="3" <? //if ($dil==3) { ?> selected="selected" <?// } ?>>Almanca </option>
                  <option value="4" <? //if ($dil==4) { ?> selected="selected" <? //} ?>>Rusça </option> -->
              </select>
            
            </td>
          </tr>
          <tr>
            <td><font class="baslik">Dosya</font></td>
            <td bgcolor="#F9F9F9">
              <input name="dosya" type="file" id="dosya"  class="textbox1" onFocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="46">
			  <a href="<? echo $dosya_dizini.$dosya; ?>" target="_blank"><? echo $dosya; ?></a>            </td>
          </tr>
          <tr>
            <td height="32" colspan="2">&nbsp;</td>
          </tr>
          <tr> 
            <td height="32">&nbsp;</td>
            <td>
              <input name="Submit" type="button" id="Submit" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" id="Submit2" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()">			</td>
          </tr>
          <tr> 
            <td colspan="2"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                <tr valign="bottom" bordercolor="#FFFFFF"> 
                  <td width="81%" >&nbsp;</td>
                  <td width="19%" valign="middle" >
				  <div align="left"><span class="veri_tarih">Max. Dosya Boyutu:<strong> <? print $max_file_size ?> mb</strong></span></div></td>
                </tr>
                <tr valign="bottom" bordercolor="#FFFFFF">
                  <td colspan="2">&nbsp;</td>
                </tr>
            </table></td>
          </tr>
      </table></td>
    </form>
  </tr>
</table>
</body>
</html>
<script> function kontrol() {document.form1.submit(); } </script>
<?
     }
  else 
	 {
		  unset($_SESSION['yonet']);
		  include('error.php');
	 }
?>
