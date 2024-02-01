<? session_start();
$link_inherit="ekle.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
 		$max_file_size=substr($max_file_size,0,-3);
		include($uzaklik."inc_s/baglanti.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css">
.style1 {font-weight: bold}
</style>
</head>
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></SCRIPT>
<script language="javascript">
function textCounter(field, countfield, maxlimit) 
	{
		if (field.value.length > maxlimit)
			{
				field.value = field.value.substring(0, maxlimit);
			}
		else 
			{
				countfield.value = maxlimit - field.value.length;
			}
	}
</script>
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
    <td width="48" class="td_anabaslik"><div align="left"><img src="../../pictures/beyazmasa.gif" width="48" height="48"></div></td>
    <td width="890" class="td_anabaslik"><span class="veri_ana_baslik"><a href="../../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt;<a href="kontrol.php" class="veri_ana_baslik"> Mail Listesi</a> &gt;</span></td>
  </tr>
</table>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <form name="form1" method="post" action="ekle_islem.php" enctype="multipart/form-data" >
      <td valign="top"> 
        <table width="942" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td colspan="2" class="anabaslik"> <p>Ekle</p></td>
          </tr>
          <tr> 
            <td></td>
            <td>
			<font class="hata1"> 
			<? 		
				if (isset($_GET['err']))
				   {
						switch($_GET['err'])
						  {
							 case 'eksik_veri':   print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!");  break;
							 case 'yanlis_tarih': print("Tarih Formatında Hata Tesbit Edildi.");  break;
							 case 'uzanti':  print("Hatalı Resim Formatı"); break;
							 case 'boyut':  print("İzin Verilenden Büyük Dosya Boyutu"); break;
						 }
				   }
			?>
            </font>			  </td>
          </tr>
          <? if (1==5) {  ?>
          <tr> 
            <td width="184"><strong class="baslik">Ad  *</strong></td>
            <td bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_ad'])) { $ad=$_SESSION[$tablo_ismi.'n_ad']; } ?>
			<input name="ad" type="text" class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($ad)) {echo $ad; }?>" size="55">            </td>
          </tr>        <tr>
            <td><strong class="baslik">Sıralama</strong></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_puan'])) { $puan=$_SESSION[$tablo_ismi.'n_puan']; } ?>
              <input name="puan" type="text" class="textbox1" id="puan"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($puan)) {echo $puan; }?>" size="10">
           </td>
          </tr>
          
          <tr> 
            <td width="184"><strong class="baslik">Pozisyon </strong></td>
            <td bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_pozisyon'])) { $pozisyon=$_SESSION[$tablo_ismi.'n_pozisyon']; } ?>
			<input name="pozisyon" type="text" class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($pozisyon)) {echo $pozisyon; }?>" size="55">
            </td>
          </tr>


          <tr> 
            <td width="184"><strong class="baslik">Meslek </strong></td>
            <td bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_meslek'])) { $meslek=$_SESSION[$tablo_ismi.'n_meslek']; } ?>
			<input name="meslek" type="text" class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($meslek)) {echo $meslek; }?>" size="55">
            </td>
          </tr>

          <? } ?>


          <tr> 
            <td width="184"><strong class="baslik">E-posta </strong></td>
            <td bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_eposta'])) { $eposta=$_SESSION[$tablo_ismi.'n_eposta']; } ?>
			<input name="eposta" type="text" class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($eposta)) {echo $eposta; }?>" size="55">
            </td>
          </tr>

          
          <tr>
            <td><font class="baslik"><strong>Dil *</strong></font></td>
            <td bgcolor="#F9F9F9" colspan="2"><? if (isset($_SESSION[$tablo_ismi.'n_dil'])) { $dil=$_SESSION[$tablo_ismi.'n_dil']; } ?>
                <select name="dil" class="textbox1">
                  <option value="1" <? if ($dil==1) { ?> selected="selected" <? } ?>>Türkçe </option>
                  <option value="2" <? if ($dil==2) { ?> selected="selected" <? } ?>>İngilizce </option>
				  <option value="3" <? if ($dil==3) { ?> selected="selected" <? } ?>>Almanca</option>
                  <option value="4" <? if ($dil==4) { ?> selected="selected" <? } ?>>Rusça </option>
                </select>
            </td>
          </tr>
          
        <? if (1==2) { ?><tr>
            <td valign="middle"><strong class="baslik"><? echo $kategori_ad; ?> Özet * </strong></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_ozet'])) { $ozet=$_SESSION[$tablo_ismi.'n_ozet']; } ?>
              <textarea name="ozet" cols="80" rows="4" class="textbox1" wrap="physical" 
			  onKeyDown="textCounter(form1.ozet,form1.ozet_uzunluk,430);" onKeyUp="textCounter(form1.ozet,form1.ozet_uzunluk,430);"><? if (isset($ozet)) { print $ozet; } ?></textarea>
			<br>
            <br>
            <input type="text"  readonly="true" name="ozet_uzunluk" class="textbox1" size="3" maxlength="3" value="430">
            <span class="veri_baslik">karakter kaldı</span></td>
          </tr><? } ?>
        <? if (1==2) { ?>  <tr>
            <td><span class="baslik">İçerik  </span></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_icerik'])) {$icerik=$_SESSION[$tablo_ismi.'n_icerik'];   } ?>
              <textarea name="icerik" cols="80" rows="25" class="mceAdvanced"><? if (isset($icerik)) { print $icerik; } ?></textarea></td>
          </tr><? } ?>
        <? if (1==2) { ?>  <tr> 
            <td><strong class="baslik">Resim</strong></td>
            <td bgcolor="#F9F9F9">
              <input name="resim" type="file" class="textbox1" onFocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="46">
              <span class="veri_tarih">Tavsiye Edilen: <? echo $kck_m_w; ?>px-<? echo $kck_m_h; ?>px ve katları</span></td>
          </tr> <? } ?>
          <tr> 
            <td height="32">&nbsp;</td>
            <td>
              <input name="Submit" type="button" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()"></td>
          </tr>
          <tr> 
            <td colspan="2">
            <table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                <tr> 
                  <td width="80%">&nbsp;</td>
                  <td width="20%" valign="middle">
				    <div align="left"><font class="veri_tarih"> Max. Dosya Boyutu:<strong> <? print $max_file_size ?> kb</strong></font></div></td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
            </table></td>
          </tr>
      </table></td>
    </form>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?
   } 
else 
   {
	  unset($_SESSION['yonet']);
	  include('error.php');
	}  //  (f)izinsiz girisleri engellemek iin  kullanilmaktadir.
?>
<script>
function kontrol()
	{
		if  (document.form1.eposta.value=="")
			{																
				alert("Lütfen Gerekli Alanları Giriniz");
			}
		else
			{
				document.form1.submit();
			}		
	}
</script>