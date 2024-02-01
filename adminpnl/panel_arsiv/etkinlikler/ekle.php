<? session_start();
$link_inherit="ekle.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
 		$max_file_size=substr($max_file_size,0,-3);
		include($uzaklik."inc_s/baglanti.php");
		//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
</head>
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></SCRIPT>
<script language="javascript">
function textCounter(field, countfield, maxlimit) 
	{
		if  (field.value.length > maxlimit)
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
<body onLoad="document.form1.ad.focus();">
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="48" class="td_anabaslik"><div align="left"><img src="../pictures/calendar.jpg" width="48" height="48"></div></td>
    <td width="890" class="td_anabaslik"><span class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt;
	<a href="kontrol.php" class="veri_ana_baslik">Etkinlikler</a> &gt;</span></td>
  </tr>
</table>
<table width="950" border="0" align="center" bgcolor="#FFFFFF">
  <tr> 
    <form name="form1" method="post" action="ekle_islem.php" enctype="multipart/form-data">
      <td valign="top"> 
        <table width="942" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td colspan="3" class="anabaslik">Etkinlik Ekle</td>
          </tr>
          <tr> 
            <td></td>
            <td colspan="2">
			<font class="hata1"> 
			<? 		
				if (isset($_GET['err']))
				   {
						switch($_GET['err'])
						  {
							 case 'eksik_veri': print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!"); break;
							 case 'yanlis_tarih':  print("Tarih Formatında Hata Tesbit Edildi."); break;
							 case 'uzanti': print("Hatalı Resim Formatı"); break;
							 case 'boyut':  print("İzin Verilenden Büyük Dosya Boyutu"); break;
						 }
				   }
			?>
            </font>			  </td>
          </tr>
          <tr> 
            <td width="184"><strong class="baslik">Etkinlik Başlığı *</strong></td>
            <td colspan="2" bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_ad'])) { $ad=$_SESSION[$tablo_ismi.'n_ad']; } ?>
			<input name="ad" type="text" class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($ad)) {echo $ad; }?>" size="55" onKeyUp="yoltanimla();">            </td>
          </tr>
          
          <tr> 
            <td width="127" class="baslik">Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9" colspan="2">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket'])) { $htaccess_etiket=$_SESSION[$tablo_ismi.'htaccess_etiket']; } ?>
            <input name="htaccess_etiket" type="text" class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket)) {echo $htaccess_etiket; }?>" size="55"> <span class="veri_baslik">* Eğer Htaccess Etiket kısmında özel karakterler var ise kaldırmalısınız ( ! , ? , + , % , & , ' , . , $ , # , * , ; , , , )  vs. gibi</span>              </td>
          </tr>
          
          <tr>
            <td><font class="baslik"><strong>Dil *</strong></font></td>
            <td bgcolor="#F9F9F9" colspan="2"><? if (isset($_SESSION[$tablo_ismi.'n_dil'])) { $dil=$_SESSION[$tablo_ismi.'n_dil']; } ?>
                <select name="dil" class="textbox1">
                  <option value="1" <? if ($dil==1) { ?> selected="selected" <? } ?>>Türkçe </option>
                  <? if (1==2) { ?><option value="2" <? if ($dil==2) { ?> selected="selected" <? } ?>>İngilizce </option><? } ?>
                </select>            </td>
          </tr>
          
          <tr>
            <td><font class="baslik"><strong>Ay</strong></font></td>
            <td bgcolor="#F9F9F9" colspan="2">
			
				<? if (isset($_SESSION[$tablo_ismi.'n_ay'])) { $ay=$_SESSION[$tablo_ismi.'n_ay']; } ?>
                <select name="ay" class="textbox1">
                  <option value="1" <? if ($ay==1) { ?> selected="selected" <? } ?>>Ocak</option>
                  <option value="2" <? if ($ay==2) { ?> selected="selected" <? } ?>>Şubat</option>
                  <option value="3" <? if ($ay==3) { ?> selected="selected" <? } ?>>Mart</option>
                  <option value="4" <? if ($ay==4) { ?> selected="selected" <? } ?>>Nisan</option>
                  <option value="5" <? if ($ay==5) { ?> selected="selected" <? } ?>>Mayıs</option>
                  <option value="6" <? if ($ay==6) { ?> selected="selected" <? } ?>>Haziran</option>
                  <option value="7" <? if ($ay==7) { ?> selected="selected" <? } ?>>Temmuz</option>
                  <option value="8" <? if ($ay==8) { ?> selected="selected" <? } ?>>Ağustos</option>
                  <option value="9" <? if ($ay==9) { ?> selected="selected" <? } ?>>Eylül</option>
                  <option value="10" <? if ($ay==10) { ?> selected="selected" <? } ?>>Ekim</option>
                  <option value="11" <? if ($ay==11) { ?> selected="selected" <? } ?>>Kasım</option>
                  <option value="12" <? if ($ay==12) { ?> selected="selected" <? } ?>>Aralık</option>
                </select>
             
             
             </td>
          </tr>
          
          <tr>
            <td valign="middle"><font class="baslik"><strong>Tarih</strong></font></td>
            <td colspan="2" bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_etkinliktarihi'])) { $etkinliktarihi=$_SESSION[$tablo_ismi.'n_etkinliktarihi']; } ?>
			<input name="etkinliktarihi" type="text" class="textbox1 "  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($etkinliktarihi)) {echo $etkinliktarihi; }?>" size="55">
            <span class="veri_baslik">GG/AA/YYYY</span> 
                        </td>

          </tr>
          <tr>
            <td valign="middle"><font class="baslik"><strong>Gün</strong></font></td>
            <td colspan="2" bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_gun'])) { $gun=$_SESSION[$tablo_ismi.'n_gun']; } ?>
			<input name="gun" type="text" class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($gun)) {echo $gun; }?>" size="55"> 
            <span class="veri_baslik">Pazartesi, Salı, Çarşamba, Perşembe, Cuma, Cumartesi, Pazar</span> 
            </td>
          </tr>
          <tr>
            <td valign="middle"><font class="baslik"><strong>Saat</strong></font></td>
            <td colspan="2" bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_saat'])) { $saat=$_SESSION[$tablo_ismi.'n_saat']; } ?>
			<input name="saat" type="text" class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($saat)) {echo $saat; }?>" size="55">
            
            <span class="veri_baslik">00:00</span> 
            </td>
          </tr>
          <tr>
            <td valign="middle"><strong class="baslik"> Özet * </strong></td>
            <td colspan="2" bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_ozet'])) { $ozet=$_SESSION[$tablo_ismi.'n_ozet']; } ?>
              <textarea name="ozet" cols="80" rows="4" class="textbox1" wrap="physical" 
			  onKeyDown="textCounter(form1.ozet,form1.ozet_uzunluk,430);" onKeyUp="textCounter(form1.ozet,form1.ozet_uzunluk,430);"><? if (isset($ozet)) { print $ozet; } ?></textarea>
			<br>
            <br>
            <input type="text"  readonly="true" name="ozet_uzunluk" class="textbox1" size="3" maxlength="3" value="430">
            <span class="veri_baslik">karakter kaldı</span></td>
          </tr>
          <tr>
            <td><span class="baslik">İçerik * </span></td>
            <td colspan="2" bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_icerik'])) {$icerik=$_SESSION[$tablo_ismi.'n_icerik'];   } ?>
              <textarea name="icerik" cols="90" rows="25" class="mceAdvanced"><? if (isset($icerik)) { print $icerik; } ?></textarea></td>
          </tr>
          <tr> 
            <td><strong class="baslik">Resim</strong></td>
            <td width="529" bgcolor="#F9F9F9">
              <input name="resim" type="file" class="textbox1" onFocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="46">
              <span class="veri_tarih">Tavsiye Edilen: <? echo $kck_m_w; ?>px*<? echo $kck_m_h; ?>px ve katları</span></td>
            <td width="181" bgcolor="#F9F9F9">
			<div align="center"><img src="<? print $uzaklik; ?>rsmlr/resim_destek2.gif" width="147" height="84"></div></td>
          </tr>
          <tr> 
            <td height="32">&nbsp;</td>
            <td colspan="2">
              <input name="Submit" type="button" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()"></td>
          </tr>
          <tr> 
            <td colspan="3">
            <table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                <tr> 
                  <td width="80%">&nbsp;</td>
                  <td width="20%" valign="middle">
				    <div align="left"><font class="veri_tarih"> Max. Dosya Boyutu:<strong> <? print $max_file_size ?> kb</strong></font></div></td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
            </table>            </td>
          </tr>
      </table>
      </td>
    </form>
  </tr>
</table>
</body>
</html>
<script>
function kontrol()
	{
		if  (document.form1.ad.value=="")
			{																
				alert("Lütfen Gerekli Alanları Giriniz");
			}
		else
			{
				document.form1.submit();
			}		
	}
function lower(str) 
	{
    	var letters=new Array(12)
		for (i=0; i <12; i++)
		letters[i]=new Array(2)
		letters[0][0]='İ'; letters[0][1]='i';
		letters[1][0]='Ç'; letters[1][1]='c';
		letters[2][0]='Ğ'; letters[2][1]='g';
		letters[3][0]='Ö'; letters[3][1]='o';
		letters[4][0]='Ş'; letters[4][1]='s';
		letters[5][0]='Ü'; letters[5][1]='u';
		letters[6][0]='ı'; letters[6][1]='i';
		letters[7][0]='ç'; letters[7][1]='c';
		letters[8][0]='ğ'; letters[8][1]='g';
		letters[9][0]='ö'; letters[9][1]='o';
		letters[10][0]='ş'; letters[10][1]='s';
		letters[11][0]='ü'; letters[11][1]='u';
		for ( i = 0; i < letters.length; i++ ) {
        var idx = str.indexOf( letters[i][0] );

        while ( idx > -1 ) {
            str = str.replace( letters[i][0], letters[i][1] ); 
            idx = str.indexOf( letters[i][0] );
        }
    }
    return str;
}
function yoltanimla()
	{
		yol_deger=document.form1.ad.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		document.form1.htaccess_etiket.value=yol_deger.toLowerCase();
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