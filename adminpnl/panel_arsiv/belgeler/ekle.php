<?	session_start();
  	$link_inherit="ekle.php";
	include("config.php");		  
    if (isset($_SESSION['yonet']))
	   {
			include($uzaklik."inc_s/baglanti.php");
			$max_file_size=substr($max_file_size,0,-3);
			$kategori=$_SESSION['kategori'];
			$ustkategori_adi_ogren=@$baglanti->query("Select ad from referans_kategori where numara=$kategori")->fetchAll(PDO::FETCH_ASSOC);
			$ustkategori_adi=$ustkategori_adi_ogren[0]["ad"];
?>
<SCRIPT language=JavaScript1.2 src="<? echo $uzaklik; ?>js/feedback.js"></SCRIPT>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body {	background-color: #EFEFEF;	margin-left: 0px;	margin-top: 0px;margin-right: 0px;	margin-bottom: 0px;}
</style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css">
.style1 {font-size: 10px}
</style>
</head>
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
<body onLoad="document.form1.ad.focus()">
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="3%" class="td_anabaslik"><div align="left"><img src="../pictures/encumen.gif" width="48" height="48"></div></td>
    <td width="97%" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt; 
	<a href="../belgeler_kategori/kontrol.php" class="veri_ana_baslik">Belge Kategori(<? print $ustkategori_adi; ?>)</a> &gt; 
	<a href="kontrol.php?kategori=<? print $kategori; ?>"  class="veri_ana_baslik">Belgeler</a> &gt; 
	</font></td>
  </tr>
</table>
<table width="950" border="0" align="center" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#FFFFFF" style="border:solid; border-width:1">
  <tr> 
    <form name="form1" method="post" action="ekle_islem.php" enctype="multipart/form-data">
      <td  valign="top" bordercolor="#C0C0C0" bgcolor="#FFFFFF"> 
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td colspan="2" class="anabaslik">Belge Ekle</td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>
            <font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
				<? 		
					if (isset($_GET['err']))
					   {
							switch($_GET['err'])
							  {
								 case 'eksik_veri':print("Tüm Alanlarü Doğru Bir Şekilde Doldurunuz!");break;                             
								 case 'yanlis_tarih': print("Tarih Formatında Hata Tesbit Edildi."); break;
								 case 'uzanti': print("Hatalı Resim Formatı"); break;
								 case 'boyut': print("İzin Verilenden Büyük Dosya Boyutu"); break;
							  }
					   }
					if (isset($_GET["don"])) { $mesaj="Lütfen daha küçük dosya seçiniz"; print($mesaj);}
                ?>
              </font></td>
          </tr>
          <tr> 
            <td width="186"><font class="baslik">Belge Adı *</font></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_ad'])) { $ad=$_SESSION[$tablo_ismi.'n_ad']; } ?>
			  <input name="ad" type="text" class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($ad)) {echo $ad; }?>" size="55" >              </td>
          </tr>
          <? if (1==2) { ?>
          <tr> 
            <td valign="top"><font class="baslik">Açıklama</font></td>
            <td bgcolor="#F9F9F9">
            <div align="left">
			<? if (isset($_SESSION[$tablo_ismi.'n_detay'])) { $detay=$_SESSION[$tablo_ismi.'n_detay']; } ?>
			<input name="detay" type="text" class="textbox1" id="detay" value="<? echo($detay) ?>" size="55">
			</div></td>
          </tr>
          <? } ?>
          
          <? if (1==2) { ?><tr>
            <td><font class="baslik">Web</font></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_yer'])) { $yer=$_SESSION[$tablo_ismi.'n_yer']; } ?>
              <input name="yer" type="text" class="textbox1" id="yer"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($yer)) {echo $yer; }?>" size="55"></td>
          </tr>
          <tr>
            <td><font class="baslik"><? echo $kategori ?> İçeriği</font></td>
            <td bgcolor="#F9F9F9">
			  <? if (isset($_SESSION[$tablo_ismi.'n_icerik'])) {$icerik=$_SESSION[$tablo_ismi.'n_icerik'];   } ?>
              <textarea name="icerik" cols="80" rows="25" class="mceAdvanced"><? if (isset($icerik)) { print $icerik; } ?></textarea>            </td>
          </tr>
          <? } ?>          <tr>
            <td><span class="baslik">Sıralama Puanı</span></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_siralama'])) { $siralama=$_SESSION[$tablo_ismi.'n_siralama']; } ?>
              <input name="siralama" type="text"   value="<? echo $siralama ?>"   class="textbox1" size="10"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" >           </td>
          </tr>
          <? if (1==1) { ?>
          <tr> 
            <td><font class="baslik">Resim</font></td>
            <td bgcolor="#F9F9F9">
              <input name="resim" type="file" class="textbox1" onFocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="46">
              <span class="veri_tarih"> İdeal Boyut: 222px - 185 px'in katları olmalıdır.</span></td>
          </tr>
          <? } ?>
          <tr> 
            <td height="32">&nbsp;</td>
            <td>
              <input name="Submit" type="button" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()">            </td>
          </tr>
          <tr> 
            <td colspan="2">&nbsp;</td>
         </tr>
      </table>
     </td>
    </form>
  </tr>
</table>
,
</body>
</html>
<script>
function kontrol()
	{
		if (document.form1.ad.value=="")
		   {																
				alert("* ile İşaretli Alanların Doldurulması Zorunludur");
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
	 }  //  (f)izinsiz girisleri engellemek i�in  kullanilmaktadir.
?>