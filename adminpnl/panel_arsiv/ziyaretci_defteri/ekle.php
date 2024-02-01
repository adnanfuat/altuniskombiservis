<? session_start();
$link_inherit="ekle.php";	
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
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
    <td width="48" class="td_anabaslik"><div align="left"><img src="../pictures/zdefter.gif" width="48" height="48"></div></td>
    <td width="890" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt;
	<a href="kontrol.php"  class="veri_ana_baslik">Ziyaretçi Defteri</a> &gt;</font></td>
  </tr>
</table>
<table width="950" border="0" align="center" cellpadding="5" cellspacing="5" bordercolor="#CCCCCC" bgcolor="#FFFFFF" style="border:solid; border-width:1">
  <tr> 
    <form name="form1" method="post" action="ekle_islem.php" id="form1">
      <td valign="top"> 
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td colspan="2" class="anabaslik">Ziyaretçi Defteri  Ekle</td>
          </tr>
          <tr> 
            <td></td>
            <td width="723">
            <font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
			<? 		
			if (isset($_GET['err']))
			   {
					switch($_GET['err'])
					  {
						 case 'eksik_veri': print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!"); break;
					  }
			   }
			?>
              </font></td>
          </tr>
          <tr> 
            <td width="185"><font class="baslik">Gönderen</font></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_ad'])) { $ad=$_SESSION[$tablo_ismi.'n_ad']; } ?>
			  <input name="ad" type="text" class="textbox1" id="ad"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($ad)) {echo $ad; }?>" size="55">            </td>
          </tr>
          <tr>
            <td><font class="baslik">Gönderen Telefon</font></td>
            <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_telefon'])) { $telefon=$_SESSION[$tablo_ismi.'n_telefon']; } ?>
            <input name="telefon" type="text" class="textbox1" id="telefon"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($telefon)) {echo $telefon; }?>" size="55">            </td>
          </tr>
          <tr>
            <td><font class="baslik">Gönderen E-Posta</font></td>
            <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_eposta'])) { $eposta=$_SESSION[$tablo_ismi.'n_eposta']; } ?>
              <input name="eposta" type="text" class="textbox1" id="eposta"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($eposta)) {echo $eposta; }?>" size="55">              </td>
          </tr>
          <tr>
            <td><font class="baslik">Mesaj *</font></td>
            <td bgcolor="#F9F9F9">
			  <? if (isset($_SESSION[$tablo_ismi.'n_mesaj'])) {$mesaj=$_SESSION[$tablo_ismi.'n_mesaj']; } ?>
              <textarea name="mesaj" cols="55"  rows="10" class="textbox1" id="mesaj"><? if (isset($mesaj)) { print $mesaj; } ?></textarea>
              <span class="hata1">
				<? 
				if  (isset($_SESSION[$tablo_ismi.'n_hata'])) 
					{
						$hata=$_SESSION[$tablo_ismi.'n_hata'];
						if (isset($hata[1]) && $hata[1]==1 ) { echo 'Mesaj� Giriniz';}
					}
				?>
              </span>              </td>
          </tr>
      
      <tr>
            <td><font class="baslik"><strong>Dil *</strong></font></td>
            <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_dil'])) { $dil=$_SESSION[$tablo_ismi.'n_dil']; } ?>
                <select name="dil" class="textbox1">
                  <option value="1" <? if ($dil==1) { ?> selected="selected" <? } ?>>Türkçe </option>
                  <option value="2" <? if ($dil==2) { ?> selected="selected" <? } ?>>İngilizce </option>
                  <option value="3" <? if ($dil==3) { ?> selected="selected" <? } ?>>Almanca </option>
                  <option value="4" <? if ($dil==4) { ?> selected="selected" <? } ?>>Rusça </option>
                </select>
            </td>
          </tr>
      
      
          
    <? if (1==2) { ?>    <tr>
         <td><font class="baslik"><strong>Değerlendirme</strong></font></td>
         <td bgcolor="#F9F9F9">
		     <? if (isset($_SESSION[$tablo_ismi.'n_puan'])) { $puan=$_SESSION[$tablo_ismi.'n_puan']; } ?>
             <select name="puan" class="textbox1">
                <option value="0" <? if ($puan==0) { ?> selected="selected" <? } ?>>Değerlendirme Yapın</option>
                <option value="1" <? if ($puan==1) { ?> selected="selected" <? } ?>>Kötü</option>
                <option value="2" <? if ($puan==2) { ?> selected="selected" <? } ?>>Vasat</option>
                <option value="3" <? if ($puan==3) { ?> selected="selected" <? } ?>>İyi</option>
                <option value="4" <? if ($puan==4) { ?> selected="selected" <? } ?>>Çok İyi</option>
                <option value="5" <? if ($puan==5) { ?> selected="selected" <? } ?>>Mükemmel</option>
              </select>
         </td>
       </tr>
       
       
      <tr>
            <td><span class="baslik">Dil *</span></td>
            <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_dil'])) { $dil=$_SESSION[$tablo_ismi.'n_dil']; } ?>
                <select name="dil" class="textbox1">
                  <option value="1" <? if ($dil==1) { ?> selected="selected" <? } ?>>Türkçe </option>
                  <option value="2" <? if ($dil==2) { ?> selected="selected" <? } ?>>İngilizce </option>
              </select></td>
          </tr> <? } ?>
          <tr> 
            <td height="32">&nbsp;</td>
            <td>
              <input name="kaydet" type="button" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()"></td>
          </tr>
          <tr>
            <td height="32">&nbsp;</td>
            <td>&nbsp;</td>
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
		if  (document.form1.mesaj.value=="")
			{																
				alert("Lütfen Gerekli Alanları Doldurunuz");
			}
		else
			{
				document.form1.submit();
			}		
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