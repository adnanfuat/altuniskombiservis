<?	session_start();
$link_inherit='duzenle.php';
include("config.php");	
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
		//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");

		$haber_no=$_SESSION[$tablo_ismi.'haber_no'];
		$max_file_size=substr($max_file_size,0,-3);
		$haber_adi_ogren=@$baglanti->query("Select ad from $ustkategori_tablo_ismi where numara='$haber_no'")->fetchAll(PDO::FETCH_ASSOC);
		$haber_adi=$haber_adi_ogren[0]["ad"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css"> .style1 {font-size: 10px} </style>
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
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="50" class="td_anabaslik"><div align="left"><img src="../pictures/calendar.jpg" width="48" height="48"></div></td>
    <td width="902" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt;
	<a href="../etkinlikler/kontrol.php" class="veri_ana_baslik">Etkinlikler(<? echo $haber_adi; ?>)</a> &gt; 
	<a href="kontrol.php" class="veri_ana_baslik">Etkinlik Detayları</a> ></font></td>
  </tr>
</table>
<table width="950" border="0" align="center" bgcolor="#FFFFFF">
  <tr> 
    <form name="form1" method="post" action="ekle_islem.php" enctype="multipart/form-data">
      <td valign="top"> 
        <table width="942" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td colspan="3" class="anabaslik">Etkinlik Detayı Ekle </td>
          </tr>
          <tr> 
            <td width="184"></td>
            <td colspan="2">
    		<font class="hata1"> 
				<? 		
				if  (isset($_GET['err']))
				    {
						switch($_GET['err'])
						  {
							 case 'eksik_veri':  print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!");  break;
							 case 'yanlis_tarih':  print("Tarih Formatında Hata Tesbit Edildi.");  break;
							 case 'uzanti':  print("Hatalı Resim Formatı");  break;
							 case 'boyut':   print("İzin Verilenden Büyük Dosya Boyutu");  break;
						 }
				   }
				if (isset($_GET["don"])) { $mesaj="Lütfen daha küçük dosya seçiniz";    print($mesaj) ;  }											 
				?>
              </font></td>
          </tr>
          <tr>
            <td><span class="baslik">İçerik </span></td>
            <td colspan="2" bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_icerik'])) {$icerik=$_SESSION[$tablo_ismi.'n_icerik'];   } ?>
              <textarea name="icerik" cols="90" rows="25" class="mceAdvanced"><? if (isset($icerik)) { print $icerik; } ?></textarea>
              </td>
          </tr>
          <tr>
            <td><font class="baslik">Resmi Yasla</font></td>
            <td colspan="2" bgcolor="#F9F9F9"> 
				<span class="textbox1"> Sola Yasla </span>
                <input name="radyo" type="radio" value="Left" checked>
                <span class="textbox1">Sağa Yasla</span>
                <input name="radyo" type="radio" value="Right">
                <span class="textbox1">Aşağı Yasla</span>
                <input name="radyo" type="radio" value="Bottom">
			</td>
          </tr>
          <tr>
            <td height="32"><strong class="baslik">Resim</strong></td>
            <td width="521">
              <input name="resim" type="file" id="resim"  class="textbox1" onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="35">
            <span class="veri_tarih">Tavsiye Edilen: <? echo $kck_m_w; ?>px*<? echo $kck_m_h; ?>px ve katları </span></td>
            <td width="189"><div align="center"><img src="<? print $uzaklik; ?>rsmlr/resim_destek2.gif" width="116" height="63"></div></td>
          </tr>
          <tr> 
            <td height="32">&nbsp;</td>
            <td colspan="2">
              <input name="Submit" type="button" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" class="dugmeler_sil" id="Submit2" onClick="javascript:history.back()"  value="Geri Dön">
			</td>
          </tr>
          <tr> 
            <td colspan="3">
            <table width="922" border="0" align="center" cellpadding="2" cellspacing="4">
                <tr> 
                  <td width="717">&nbsp;</td>
                  <td width="185" valign="middle"><div align="center"><span class="veri_tarih">Max. Dosya Boyutu:<strong><? print $max_file_size ?> kb </strong></span></div></td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
            </table>
            </td>
          </tr>
      </table>
      </td>
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