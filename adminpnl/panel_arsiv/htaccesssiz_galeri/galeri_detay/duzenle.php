<? session_start();
$link_inherit='duzenle.php';
include("config.php");	
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
	 	//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");
		
		$ustkategori_no=$_SESSION['ust_kategori_no'];
		$altkategori_no=$_SESSION['alt_kategori'];
		$max_file_size=substr($max_file_size,0,-3);

		$ustkategori_adi_ogren=@$baglanti->query("Select ad from $ustkategori_tablo_adi where numara=$ustkategori_no")->fetchAll(PDO::FETCH_ASSOC);
		$ustkategori_adi=$ustkategori_adi_ogren[0]["ad"];

		$altkategori_adi_ogren=@$baglanti->query("Select ad from $altkategori_tablo_adi where numara=$altkategori_no")->fetchAll(PDO::FETCH_ASSOC);
		$altkategori_adi=$altkategori_adi_ogren[0]["ad"];

		include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
		include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");
		if  (isset($_GET['item']))
			{
		  		unset($_SESSION[$tablo_ismi.'numara']); 
				$numara=$_GET['item'];
				$_SESSION[$tablo_ismi.'numara']=$numara;						
			}
		elseif (isset($_SESSION[$tablo_ismi.'numara']))
			{
				$numara=$_SESSION[$tablo_ismi.'numara'];			
			}
		// Duzenlecek olan kayitin bilgileri veri tabanindan aliniyor...
		$kayit_sec=@$baglanti->query("Select * from $tablo_ismi where numara='$numara'")->fetchAll(PDO::FETCH_ASSOC);
		if  (count($kayit_sec)<>0) 
			{ 
				$ad=stripslashes($kayit_sec[0]['ad']);		
				$puan=$kayit_sec[0]['puan'];		
				$aciklama=stripslashes($kayit_sec[0]['aciklama']);
				$ekleyen=$kayit_sec[0]['ekleyen'];		
				$resim=$kayit_sec[0]['resim_adres'];		
	    		if ($resim=='') {$resim='resimyok.gif'; }
				resim_yeniden_boyutlandir($resim_dizini,$resim,$kck_m_h,$kck_m_w);
			}
		else 
			{
				header('Location:kontrol.php');
			}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css">
.style6 {font-size: 12px}
.style9 {font-size: 10px}
.style11 {color: #666666}
</style></head>
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></SCRIPT>
<script language="javascript" type="text/javascript" src="<? print $uzaklik; ?>/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "advanced",
	editor_selector : "mceAdvanced",
	plugins : "table,save,advhr,advimage,advlink,emotions,insertdatetime,preview,zoom,contextmenu",
	theme_advanced_buttons1_add : "fontselect,fontsizeselect",
	theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,zoom,separator,forecolor,backcolor",
	theme_advanced_buttons2_add_before: "cut,copy,paste,separator",
	theme_advanced_buttons3_add_before : "tablecontrols,separator",
	theme_advanced_buttons3_add : "emotions,advhr",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_path_location : "bottom",
	plugin_insertdate_dateFormat : "%Y-%m-%d",
	plugin_insertdate_timeFormat : "%H:%M:%S",
	extended_valid_elements : "a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
	external_link_list_url : "example_data/example_link_list.js",
	external_image_list_url : "example_data/example_image_list.js",
	flash_external_list_url : "example_data/example_flash_list.js"
});
</script>
<body onLoad="document.form1.ad.focus();">
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="50" height="26"  class="td_anabaslik"><div align="left">
    <img src="../pictures/galeri.gif" width="48" height="48"></div></td>
    <td width="902"  class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt;
	<a href="../galeri_kategori/kontrol.php" class="veri_ana_baslik">Galeri Kategorileri (<? print($ustkategori_adi); ?>)</a> &gt;
	<a href="../galeri_altkategori/kontrol.php" class="veri_ana_baslik">Galeri Alt Kategorileri (<? print($altkategori_adi);?>)</a> &gt; 
	<a href="kontrol.php" class="veri_ana_baslik">Resimler</a> &gt;</font></td>
  </tr>
</table>
<table width="950" border="0" align="center" bgcolor="#FFFFFF">
  <tr> 
    <form name="form1" method="post" action="duzenle_islem.php" enctype="multipart/form-data">
      <td  valign="top"> 
        <div align="center">
          <table width="944" border="0" align="center" cellpadding="4" cellspacing="6">
            <tr>
              <td colspan="2" class="anabaslik">Resim Düzenle</td>
            </tr>
            <tr> 
              <td width="185" class="baslik">&nbsp;</td>
              <td width="725">
			  <font class="hata1"> 
				<? 
				if (isset($_GET["don"])&& $_GET["don"]=="resimboyut"){ $mesaj="Resim: Uygunsuz Format ya da Büyük Dosya Boyutu";  print($mesaj); }											 
				if (isset($_GET["don"])&& $_GET["don"]=="eksik_veri"){ $mesaj="Lütfen gerekli alanları doldurunuz";  print($mesaj); }											 
				?>
				<input name="gizli" type="hidden" value="<? print($numara); ?>"> 
              </font>
			  </td>
            </tr>
            <tr> 
              <td class="baslik">Resim  Adı * </td>
              <td bgcolor="#F9F9F9">
			  <? if (isset($_SESSION[$tablo_ismi.'ad'])) {$ad=$_SESSION[$tablo_ismi.'ad']; } ?>			  
			  <input name="ad" type="text" class="textbox1" id="ad"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? print($ad); ?>" size="55">
			  <font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">  
				<? if (isset($_SESSION[$tablo_ismi.'hata'])) 
					{
						$hata=$_SESSION[$tablo_ismi.'hata'];
						if (isset($hata[1]) && $hata[1]==1 ) { echo 'Resim Adını Giriniz';}
					}	
				?>
              </font></td>
            </tr>
            <tr> 
              <td><span class="baslik">Puan *</span></td>
              <td bgcolor="#F9F9F9">
			  <? if (isset($_SESSION[$tablo_ismi.'puan'])) {$puan=$_SESSION[$tablo_ismi.'puan']; } ?>             
			  <input name="puan" type="text" id="puan" value="<? print($puan); ?>" class="textbox1" onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10">
				<font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">  
				<? if (isset($_SESSION[$tablo_ismi.'hata'])) 
					{
						$hata=$_SESSION[$tablo_ismi.'hata'];
						if (isset($hata[4]) && $hata[4]==1 ) { echo 'Puanı Giriniz';}
					}
				?>
				</font>
			</td>
            </tr>
            <tr>
              <td class="baslik">Açıklama </td>
              <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'aciklama'])) {$aciklama=$_SESSION[$tablo_ismi.'aciklama']; } ?>
              <textarea name="aciklama" cols="90" rows="25" class="mceAdvanced"><? echo $aciklama; ?></textarea>
              <font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
              <? if (isset($_SESSION[$tablo_ismi.'hata'])) 
					{
						$hata=$_SESSION[$tablo_ismi.'hata'];
						if (isset($hata[6]) && $hata[6]==1 ) { echo 'Açıklamayı Giriniz';}
					}
			  ?>
              </font>
              </td>
            </tr>
            <tr>
              <td class="baslik">Resim</td>
              <td bgcolor="#F9F9F9">
              &nbsp;<a href="<? print($thumb_resim_dizini.$resim); ?>" target="_blank"><img src="<? print($thumb_resim_dizini.$resim); ?>" border="0"></a>
			  </td>
            </tr>
            <tr>
              <td class="baslik">&nbsp;</td>
              <td bgcolor="#F9F9F9">
			  <div align="left">
              <input name="resim" type="file" id="resim"   class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="37">
              <span class="veri_tarih">Tavsiye Edilen Boyut: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları</span></div></td>
            </tr>
            <tr> 
              <td height="32" class="baslik">&nbsp;</td>
              <td>
			  <input name="kaydet" type="button" id="kaydet2" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
			  <input name="Submit2" type="button" id="Submit22"  class="dugmeler_sil"  value="Geri Dön" onClick="javascript:history.back()">
			  </td>
            </tr>
            <tr> 
              <td colspan="2">
              <table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                  <tr> 
                    <td width="79%">&nbsp;</td>
                    <td width="21%" valign="middle"><div align="left"><font class="veri_tarih">Max. Dosya Boyutu:<strong> <? print $max_file_size ?> kb </strong></font></div></td>
                  </tr>
                  <tr>
                    <td colspan="2">&nbsp;</td>
                  </tr>
              </table>
              </td>
            </tr>
          </table>
      </div>
      </td>
    </form>
  </tr>
</table>
</body>
</html>
<script> function kontrol() { document.form1.submit();  } </script>
<?	 
   } 
else 
   {
	  unset($_SESSION['yonet']);
	  include("error.php"); 
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>