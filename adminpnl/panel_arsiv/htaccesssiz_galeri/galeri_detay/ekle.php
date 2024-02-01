<? session_start();
$link_inherit="ekle.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
	 	//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");

		$ustkategori_no=$_SESSION['ust_kategori_no'];
   		$altkategori=$_SESSION['alt_kategori'];
		$max_file_size=substr($max_file_size,0,-3);
		////////////////////////////////////////////////////////////////////////////////
		//(s) Ust kategori adini ogrenmek için olusturulan sorgu
		$ustkategori_adi_ogren=@$baglanti->query("Select ad from $ustkategori_tablo_adi where numara=$ustkategori_no")->fetchAll(PDO::FETCH_ASSOC);
		$ustkategori_adi=$ustkategori_adi_ogren[0]["ad"];
		//(f)  Ust kategori adini ogrenmek için olusturulan sorgu
		////////////////////////////////////////////////////////////////////////////////
		//(s) Alt kategori adini ogrenmek için olusturulan sorgu
		$altkategori_adi_ogren=@$baglanti->query("Select ad from $altkategori_tablo_adi where numara=$altkategori")->fetchAll(PDO::FETCH_ASSOC);
		$altkategori_adi=$altkategori_adi_ogren[0]["ad"];
		//(f) Alt kategori adini ogrenmek için olusturulan sorgu
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body {
	background-color: #EFEFEF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css">
.style6 {font-size: 12px}
.style7 {font-size: 10px}
.style10 {	color: #CC0000;font-weight: bold;}
</style>
</head>
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
<body  onLoad="javascript:document.form1.ad.focus()">
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="50" class="td_anabaslik"><div align="left"><img src="../pictures/galeri.gif" width="48" height="48"></div></td>
    <td width="902" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt;
	<a href="../galeri_kategori/kontrol.php" class="veri_ana_baslik">Galeri Kategorileri(<? print($ustkategori_adi); ?>)</a> &gt;
	<a href="../galeri_altkategori/kontrol.php" class="veri_ana_baslik">Galeri Alt Kategorileri(<? print($altkategori_adi);?>)</a> &gt; 
	<a href="kontrol.php" class="veri_ana_baslik">Resimler</a> &gt;</font></td>
  </tr>
</table>
<table width="950" border="0" align="center" bgcolor="#FFFFFF">
  <tr> 
    <form name="form1" method="post" action="ekle_islem.php" enctype="multipart/form-data">
      <td valign="top"> 
        <div align="center">
          <table width="944" border="0" align="center" cellpadding="4" cellspacing="6">
            <tr>
              <td colspan="2" class="anabaslik">Resim Ekle</td>
            </tr>
            <tr> 
              <td></td>
              <td width="725">
			  <font class="hata1"> 
				<? 		
				if (isset($_GET['err']))
				   {
					 switch($_GET['err'])
						  {
							 case 'eksik_veri':  print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!");  break;
							 case 'resimboyut':  print("Büyük Dosya Boyutu ya da Desteklenmeyen Resim Formatı");  break;
							 case 'yanlis_tarih': print("Tarih Formatında Hata Tesbit Edildi."); break;
							 case 'uzanti': print("Hatalı Resim Formatı"); break;
							 case 'boyut':  print("İzin Verilenden Büyük Dosya Boyutu"); break;
						 }
				  }
				if (isset($_GET["don"])) { $mesaj="Lütfen daha küçük dosya seçiniz";    print($mesaj); }											 
				?>
       			</font></td>
            </tr>
            <tr> 
              <td width="185"><span class="baslik">Ad *</span> </td>
              <td bgcolor="#F9F9F9">
			  <?  if (isset($_SESSION[$tablo_ismi.'n_ad'])) {$ad=$_SESSION[$tablo_ismi.'n_ad']; }  ?>                
			 <input name="ad" type="text" id="ad"  value="<? if (isset($ad)) { print($ad); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);">
			<font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">              
			<? 
			if (isset($_SESSION[$tablo_ismi.'n_hata'])) 
			   {
					$hata=$_SESSION[$tablo_ismi.'n_hata'];	if (isset($hata[1]) && $hata[1]==1 ) { echo 'Resim Adını Giriniz';}
				}
			?>
			</font></td>
            </tr>
            <tr>
              <td><span class="baslik">Puan *</span></td>
              <td bgcolor="#F9F9F9">
			  <? if (isset($_SESSION[$tablo_ismi.'n_puan'])) {$puan=$_SESSION[$tablo_ismi.'n_puan']; } ?>
                  <input name="puan" type="text" id="puan" value="<? if (isset($puan)) { print($puan); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >
                  <font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
					<? if (isset($_SESSION[$tablo_ismi.'n_hata'])) 
						{
							$hata=$_SESSION[$tablo_ismi.'n_hata'];
							if (isset($hata[4]) && $hata[4]==1 ) { echo 'Puanı Giriniz';}
						}
					?>
                </font></td>
            </tr>
            <tr>
              <td class="baslik">Açıklama </td>
              <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_aciklama'])) {$aciklama=$_SESSION[$tablo_ismi.'n_aciklama']; } ?>
              <textarea name="aciklama" cols="80" rows="25" class="mceAdvanced"><? if (isset($aciklama)) { print $aciklama; } ?></textarea>
              <font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
			  <? if (isset($_SESSION[$tablo_ismi.'n_hata'])) 
					{
						$hata=$_SESSION[$tablo_ismi.'n_hata'];
						if (isset($hata[6]) && $hata[6]==1 ) { echo 'Açıklamayı Giriniz';}
					}
			   ?>
              </font></td>
            </tr>
            <tr> 
              <td width="185" valign="middle"><span class="baslik">Resim</span></td>
              <td bgcolor="#F9F9F9">
			  <? if (isset($_SESSION[$tablo_ismi.'n_resim'])) {$resim=$_SESSION[$tablo_ismi.'n_resim'];  print($resim); }?>
              <input name="resim" type="file" id="resim"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="37">
              <span class="veri_tarih">Tavsiye Edilen Boyut: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları</span>
			  </td>
            </tr>
            <tr> 
              <td height="32">&nbsp;</td>
              <td>
			  <input name="kaydet" type="button" class="dugmeler_ekle" value="Kaydet"  onClick="kontrol()">
			  <input name="Submit2" type="button" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()">
			  </td>
            </tr>
            <tr> 
              <td colspan="2">
              <table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                  <tr> 
                    <td width="81%">&nbsp;</td>
                    <td width="19%" valign="middle">
					  <div align="center"><font class="veri_tarih">Max. Dosya Boyutu:<strong> <? print $max_file_size ?> kb </strong></font></div></td>
                  </tr>
                  <tr>
                    <td colspan="2">&nbsp;</td>
                  </tr>
              </table>
              </td>
            </tr>
          </table>
      </div></td>
    </form>
  </tr>
</table>
</body>
</html>
<script> function kontrol() { document.form1.submit(); } </script>
<?
   } 
else 
   {
	  unset($_SESSION['yonet']);
	  include("error.php"); 
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>