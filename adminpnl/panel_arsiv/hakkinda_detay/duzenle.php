<?  session_start();
$link_inherit='duzenle.php';
include("config.php");	
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
		//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");

		$max_file_size=substr($max_file_size,0,-3);
		include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
		include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");
		$haber_no=$_SESSION[$tablo_ismi.'haber_no'];
		$haber_adi_ogren=@$baglanti->query("Select ad from $ustkategori_tablo_ismi where numara='$haber_no'")->fetchAll(PDO::FETCH_ASSOC);
		$haber_adi=$haber_adi_ogren[0]["ad"];
		if (isset($_GET["detay_no"]))
		   {
				unset($_SESSION[$tablo_ismi."detay_no"]);	
				$detay_no=$_GET["detay_no"];
				$_SESSION[$tablo_ismi."detay_no"]=$detay_no;
		   }
		else
		   {
				$detay_no=$_SESSION[$tablo_ismi."detay_no"];
		   }
		$sql_cumlesi="select * from $tablo_ismi where numara='$detay_no'";																	
		$detay=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
		if  (count($detay)<>0)
			{	  
				$icerik=stripslashes($detay[0]["icerik"]);
				$resim=$detay[0]["resim_adres"];
				$radyo_deger=$detay[0]["radiobutton"];			
				if ($resim=='') {$resim=$default_resim; }
				resim_yeniden_boyutlandir($kategori_thumb_resim_dizini,$resim,$kck_m_h,$kck_m_w);				
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
.style1 {font-size: 10px}
.style7 {color: #666666}
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
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="48" class="td_anabaslik"><div align="left"><img src="../pictures/ana_dok.gif" width="48" height="48"></div></td>
    <td width="890" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt;
	<a href="../hakkinda/kontrol.php" class="veri_ana_baslik">Hakkında(<? echo $haber_adi; ?>)</a> > 
	<a href="kontrol.php" class="veri_ana_baslik">Hakkında Detayları</a> ></font></td>
  </tr>
</table>
<table width="950" border="0" align="center" bgcolor="#FFFFFF">
  <tr> 
    <form name="form1" method="post" action="duzenle_islem.php" enctype="multipart/form-data">
      <td valign="top"> 
        <table width="942" border="0" align="center" cellpadding="3" cellspacing="5">
          <tr>
            <td colspan="3" class="anabaslik">Hakkında Detay Düzenle </td>
          </tr>
          <tr> 
            <td width="185"><input name="gizli" type="hidden" id="gizli" value="<? echo $detay_no; ?>">
            <input name="gizli2_ust_kategori_no" type="hidden" id="gizli2_ust_kategori_no" value="<? echo $haber_no; ?>"></td>
            <td colspan="2">
			<font color="#FF0000" class="hata1"> 
				<? 		
				if  (isset($_GET['err']))
				    {
						switch($_GET['err'])
						  {
							 case 'eksik_veri':  print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!"); break;
							 case 'yanlis_tarih':  print("Tarih Formatında Hata Tesbit Edildi."); break;
							 case 'uzanti': print("Hatalı Resim Formatı"); break;
							 case 'boyut':  print("İzin Verilenden Büyük Dosya Boyutu"); break;
						  }
				   }
				if (isset($_GET["don"]))  { $mesaj="Lütfen daha küçük dosya seçiniz";   print($mesaj) ;  }											 
				?>
              </font></td>
          </tr>
          <tr>
            <td><span class="baslik">İçerik</span></td>
            <td colspan="2" bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'icerik'])) {$icerik=$_SESSION[$tablo_ismi.'icerik'];   } ?>
              <textarea name="icerik" cols="90" rows="25" class="mceAdvanced"><? echo $icerik; ?></textarea>
            </td>
          </tr>
          <tr>
            <td><strong class="baslik">Resmi Yasla </strong></td>
            <? if (isset($_SESSION[$tablo_ismi.'radyo'])) { $radyo_deger=$_SESSION[$tablo_ismi.'radyo'];} ?>
            <td colspan="2" bgcolor="#F9F9F9">
			<span class="textbox1"> Sola Yasla </span>
                <input name="radyo" type="radio" value="Left" <? if ($radyo_deger=="Left"){ print "checked"; } ?>>
                <span class="textbox1">Sağa Yasla</span>
                <input name="radyo" type="radio" value="Right"  <? if ($radyo_deger=="Right"){ print "checked"; } ?>>
                <span class="textbox1">Aşağı Yasla</span>
                <input name="radyo" type="radio" value="Bottom"  <? if ($radyo_deger=="Bottom"){ print "checked"; } ?>></td>
          </tr>
          <tr>
            <td align="left" valign="middle"><strong class="baslik">Resim</strong></td>
            <td width="527" valign="middle"; bgcolor="#F9F9F9">
            <input name="resim" type="file" id="resim"  class="textbox1" onFocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="35">
            <span class="veri_tarih">Tavsiye Edilen: <? echo $kck_m_w; ?>px*<? echo $kck_m_h; ?>px ve katları</span></td>
            <td width="192">              
              <div align="left"><a href="<? print($kategori_thumb_resim_dizini.$resim); ?>" target="_blank"><img src="../../rsmlr/tel.gif" width="29" height="29" border="0"></a>            </div></td>
          </tr>
          <tr> 
            <td height="32">&nbsp;</td>
            <td colspan="2">
              <input name="Submit" type="button" id="Submit" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" id="Submit2" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()">
			  </td>
          </tr>
          <tr> 
            <td colspan="3">
            <table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                <tr> 
                  <td width="79%">&nbsp;</td>
                  <td width="21%" valign="middle"><div align="left"><span class="veri_tarih">Max. Dosya Boyutu:<strong> <? print $max_file_size ?> kb </strong></span></div></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td valign="middle">&nbsp;</td>
                </tr>
              </table></td>
          </tr>
      </table>
      </td>
    </form>
  </tr>
</table>
</body>
</html>
<script> function kontrol()	{document.form1.submit();}</script>
<?
   } 
else 
   {
	  unset($_SESSION['yonet']);
	  include("error.php");
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadr.
?>