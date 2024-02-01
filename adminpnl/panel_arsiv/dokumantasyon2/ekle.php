<?	session_start();
$link_inherit="ekle.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
		$max_file_size=round($max_file_size/1024);
		include($uzaklik."inc_s/baglanti.php");
		
		$urun_numara=$_SESSION[$tablo_ismi."urun_numara"];
		$max_file_size=substr($max_file_size,0,-3);	
		
		$urun_ogren=@$baglanti->query("Select ad,ustkategori_no,altkategori_no from urun_detay where  numara=$urun_numara")->fetchAll(PDO::FETCH_ASSOC);
		$ustkategori_no=$urun_ogren[0]["ustkategori_no"];
		$altkategori_no=$urun_ogren[0]["altkategori_no"];
		$urun_ad=$urun_ogren[0]["ad"];
		$kategori_ogren=@$baglanti->query("Select ad from urun_kategori where numara='$ustkategori_no'")->fetchAll(PDO::FETCH_ASSOC);
		$kategori_ad=$kategori_ogren[0]["ad"];
		
		$altkategori_ogren=@$baglanti->query("Select ad from urun_altkategori where numara='$altkategori_no'")->fetchAll(PDO::FETCH_ASSOC);
		$altkategori_ad=$altkategori_ogren[0]["ad"];


?>
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>js/feedback.js"></SCRIPT>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css">
.style1 {font-size: 10px}
</style>
</head>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="50" class="td_anabaslik"><div align="center"><img src="../pictures/ana_dok.gif" width="48" height="48"></div></td>
    <td width="902" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt;
	<a href="../urun_kategori/kontrol.php" class="veri_ana_baslik">Ürün Kategorileri (<? echo $kategori_ad; ?>)</a> &gt;
	<a href="../urun_altkategori/kontrol.php" class="veri_ana_baslik">Ürün Alt Kategorileri (<? echo $altkategori_ad; ?>)</a> &gt; 
	<a href="../urun_detay/kontrol.php"  class="veri_ana_baslik"><? echo $urun_ad; ?></a> &gt;	
	<a href="kontrol.php"  class="veri_ana_baslik">Dosyalar </a> &gt;</font>   </td>
  </tr>
</table>
<table width="950" border="0" align="center" bordercolor="#CCCCCC" bgcolor="#FFFFFF" style="border:solid; border-width:1">
  <tr> 
    <form name="form1" method="post" action="ekle_islem.php" enctype="multipart/form-data" >
      <td valign="top" bordercolor="#C0C0C0" bgcolor="#FFFFFF" > 
        <table width="942" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td colspan="2" class="anabaslik">Dosya Ekle </td>
          </tr>
          <tr> 
            <td width="184"></td>
            <td width="724">
			<font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
			<?
			if (isset($_GET['err']))
			   {
					switch($_GET['err'])
					  {
						 case 'eksik_veri':	 print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!");break;
						 case 'yanlis_tarih': print("Tarih Formatında Hata Tesbit Edildi."); break;
						 case 'uzanti': print("Hatalı  Format"); break;
						 case 'boyut': print("İzin Verilenden Büyük Dosya Boyutu");break;
					  }
			  }
			?>
           </font></td>
          </tr>
          <tr>
            <td><font class="baslik">Ad *</font></td>
            <td bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_ad'])) { $ad=$_SESSION[$tablo_ismi.'n_ad']; } ?>
            <input name="ad" type="text" class="textbox1" id="ad" value="<? echo $ad; ?>" size="55"></td>
          </tr>
<? /*<tr>
            <td><font class="baslik"><strong>Dil *</strong></font></td>
            <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_dil'])) { $dil=$_SESSION[$tablo_ismi.'n_dil']; } ?>
                <select name="dil" class="textbox1">
                  <option value="1" <? if ($dil==1) { ?> selected="selected" <? } ?>>Türkçe </option>
                  <option value="2" <? if ($dil==2) { ?> selected="selected" <? } ?>>İngilizce </option>
                </select>
            </td>
          </tr> */ ?>
          <tr> 
            <td><strong class="baslik">Dosya *</strong></td>
            <td bgcolor="#F9F9F9">
            <input name="dosya" type="file" class="textbox1" onFocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="46">			</td>
          </tr>
          <tr>
            <td height="26" colspan="2">&nbsp;</td>
          </tr>
          <tr> 
            <td height="32">&nbsp;</td>
            <td>
              <input name="Submit" type="button" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()">			  </td>
          </tr>
          <tr> 
            <td colspan="2">
            <table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                <tr valign="bottom" bordercolor="#FFFFFF"> 
                  <td width="79%">&nbsp;</td>
                  <td width="21%" valign="middle">
				  <div align="left"><span class="veri_tarih">Max. Dosya Boyutu:<strong> <? print $max_file_size ?> kb</strong></span></div></td>
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
<script>
function kontrol()
	{
		if (document.form1.dosya.value=="" || document.form1.ad.value=="" ) { alert("Lütfen Gerekli Alanları Giriniz"); }	else { document.form1.submit();	}		
	}
</script>
<?
     } 
  else 
	 {
		  unset($_SESSION['yonet']);
		  include('error.php');
	 }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>