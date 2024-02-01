<? session_start();
$link_inherit="ekle.php";
include("config.php");
if (isset($_SESSION['yonet']))
   {
		$max_file_size=substr($max_file_size,0,-3);
		//$syonetim=$_SESSION["siteyonetici"];
		include($uzaklik."inc_s/baglanti.php");

		//include("boyut_ogren.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title; ?></title>
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css"> .style1 {font-size: 10px} .style2 {font-size: 9px} </style>
</head>
<body onLoad="document.form1.ad.focus();">
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="3%" class="td_anabaslik"><div align="left"><img src="../pictures/ilrehberi.gif" width="48" height="48"></div></td>
    <td width="97%" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt; 
    <a href="kontrol.php"  class="veri_ana_baslik">Bilgiler</a> &gt;</font></td>
  </tr>
</table>
<table width="950" border="0" align="center"  bgcolor="#FFFFFF">
  <tr> 
    <form name="form1" method="post" action="ekle_islem.php" enctype="multipart/form-data">
      <td  valign="top"> 
        <table width="944" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td colspan="2" class="anabaslik">Bilgi Ekle</td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td width="726">
            <font class="hata1"> 
				<? 		
					if (isset($_GET['err']))
					   {
						 switch($_GET['err'])
							{
								 case 'eksik_veri': print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!"); break;
								 case 'yanlis_tarih': print("Tarih Formatında Hata Tesbit Edildi."); break;
								 case 'uzanti': print("Hatalı Resim Formatı"); break;
								 case 'boyut': print("İzin Verilenden Büyük Dosya Boyutu"); break;
							}
					   }
				   if  (isset($_GET["don"])) { $mesaj="Lütfen daha küçük dosya seçiniz";  print($mesaj) ; }											 
                ?>
              </font>
              </td>
          </tr>
          <tr> 
            <td width="184"><font class="baslik"> <? echo $kategori ?> Adı *</font></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_ad'])) { $ad=$_SESSION[$tablo_ismi.'n_ad']; } ?>
			  <input name="ad" type="text" class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($ad)) {echo $ad; }?>" size="55" >
            </td>
          </tr>
          <tr>
            <td><font class="baslik"><strong>Dil *</strong></font></td>
            <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_dil'])) { $dil=$_SESSION[$tablo_ismi.'n_dil']; } ?>
                <select name="dil" class="textbox1">
                  <option value="1" <? if ($dil==1) { ?> selected="selected" <? } ?>>Türkçe </option>
                 <? if (1==2) { ?> <option value="2" <? if ($dil==2) { ?> selected="selected" <? } ?>>İngilizce </option><? } ?>
                </select>
            </td>
          </tr>
          
        <? if (1==2) { ?>  <tr>
            <td><font class="baslik"><strong>Bilgi Kategori *</strong></font></td>
            <td bgcolor="#F9F9F9">
			
			
			<? if (isset($_SESSION[$tablo_ismi.'n_bilgikategori'])) { $bilgikategori=$_SESSION[$tablo_ismi.'n_bilgikategori']; } ?>
            <?  $tanimlamalar=@$baglanti->query("Select * from tanimlar where aktif=1 and dil=1 order by numara asc")->fetchAll(PDO::FETCH_ASSOC);
				$tanimlamalar_sayi=count($tanimlamalar);
			?>
                <select name="bilgikategori" class="textbox1">
                   	<?	if ($tanimlamalar_sayi>0) 
						{
							for ($sayac=0; $sayac<$tanimlamalar_sayi; $sayac++)
								{
									$bilgikategori_ad=$tanimlamalar[$sayac]["ad"];
									$bilgikategori_numara=$tanimlamalar[$sayac]["numara"];
					?>
                    					<option value="<? echo $bilgikategori_numara; ?>" <? if ($bilgikategori==$bilgikategori_numara) { ?> selected="selected" <? } ?>><? echo $bilgikategori_ad; ?></option>
                   <? 			} 
				   		}
				   ?>
                </select>
            </td>
          </tr> <? } ?>
          <tr>
            <td><span class="baslik">Özet *</span></td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'n_ozet'])) { $ozet=$_SESSION[$tablo_ismi.'n_ozet']; } ?>
              <textarea name="ozet" cols="55" rows="5" class="textbox1" id="ozet"><? echo $ozet; ?></textarea>
            </td>
          </tr>
          <tr>
            <td><span class="baslik">Açıklama</span></td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'n_aciklama'])) { $aciklama=$_SESSION[$tablo_ismi.'n_aciklama']; } ?>
            <textarea name="aciklama" cols="80" rows="25" class="mceAdvanced"><? if (isset($aciklama)) { print $aciklama; } ?></textarea></td>
          </tr>
          <tr>
            <td><font class="baslik">Sıralama</font></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_puan'])) { $puan=$_SESSION[$tablo_ismi.'n_puan']; } ?>
              <input name="puan" type="text" class="textbox1" id="puan"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($puan)) {echo $puan; }?>" size="10">
            </td>
          </tr>
          <tr> 
            <td><font class="baslik">Resim</font></td>
            <td bgcolor="#F9F9F9">
            <input name="resim" type="file" class="textbox1" onFocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="46">
            <span class="veri_tarih">Tavsiye Edilen Boyut: <? echo $kck_m_w; ?>px*<? echo $kck_m_h; ?>px</span></td>
          </tr>
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
                  <td width="79%">&nbsp;</td>
                  <td width="21%" valign="middle"><div align="left"><span class="veri_tarih">Max. Dosya Boyutu:<strong><? print $max_file_size ?> kb</strong></span></div></td></tr>
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
		if (document.form1.ad.value=="")
			{																
				alert("* ile İşaretli Alanların Doldurulması Zorunludur.");
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