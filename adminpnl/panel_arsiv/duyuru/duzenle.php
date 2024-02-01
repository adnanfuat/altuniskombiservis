<?	 session_start();
$link_inherit='duzenle.php';
include("config.php");	
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
		$numara=$_GET["numara"];
		$sql_cumlesi="select * from $tablo_ismi where numara='$numara'";																	
		$recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
		if (count($recordset)<>0)
		   {	  
			  $ad=stripslashes($recordset[0]["ad"]); 
			  $icerik=stripslashes($recordset[0]["icerik"]);
			  $dil=$recordset[0]["dil"];
			  switch ($dil)
					{		
						case 1: $dil_aciklama="Türkçe"; break;
						case 2: $dil_aciklama="İngilizce"; break;
					}   //echo $dil_aciklama;
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
    <td width="50" class="td_anabaslik"><div align="left"><img src="../pictures/duyurular.gif" width="48" height="48"></div></td>
    <td width="902" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt;
	<a href="kontrol.php"  class="veri_ana_baslik">Hasar Bildirim Bilgiler</a> &gt;</font></td>
  </tr>
</table>
<table width="950" border="0" align="center" bordercolor="#CCCCCC" bgcolor="#FFFFFF" style="border:solid; border-width:1">
  <tr> 
    <form name="form1" method="post" action="duzenle_islem.php">
      <td  valign="top" bordercolor="#C0C0C0" bgcolor="#FFFFFF" > 
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td colspan="2" class="anabaslik">Hasar Bildirim Bilgisi Düzenle </td>
          </tr>
          <tr> 
            <td width="21%"><input name="gizli" type="hidden" id="gizli" value="<? echo $numara; ?>"></td>
            <td width="79%">
			<font  class="hata1"> 
			<?
			if (isset($_GET['err']))
			   {
					switch($_GET['err'])
						  {
							 case 'eksik_veri': print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!");  break;
						  }
			   }
			?>
              </font></td>
          </tr>
          <tr> 
            <td><font  class="baslik"><? echo $kategori ?> Başlığı * </font></td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'ad'])) { $ad=$_SESSION[$tablo_ismi.'ad']; } ?>			  
			<input name="ad" type="text" id="ad"  value="<? echo $ad ?>"  class="textbox1" size="55"  onblur="pchange(this, 0);" onFocus="pchange(this, 1);" >
            <span class="hata1">
            <? 
			if (isset($_SESSION[$tablo_ismi.'hata'])) 
					{
						$hata=$_SESSION[$tablo_ismi.'hata'];
						if (isset($hata[1]) && $hata[1]==1 ) { echo 'Duyuru Başlığını Giriniz';}
					}
			?>
            </span></td>
          </tr>
                      <tr>
            <td><span class="baslik"><strong>Dil *</strong></span></td>
            <td colspan="2" bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'dil'])) { $dil=$_SESSION[$tablo_ismi.'dil']; } ?>
                <select name="dil" class="textbox1">
                  <option value="1" <? if ($dil==1) { ?> selected="selected" <? } ?>>Türkçe </option>
                <? if (1==2) { ?>  <option value="2" <? if ($dil==2) { ?> selected="selected" <? } ?>>İngilizce </option> <? } ?>


              </select></td>
          </tr>
          <tr>
            <td><font class="baslik"><? echo $kategori ?> İçeriği *</font></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'icerik'])) {$icerik=$_SESSION[$tablo_ismi.'icerik'];   }?>
              <textarea name="icerik" cols="90" rows="25" class="mceAdvanced"><? echo $icerik; ?></textarea>
              <span class="hata1">
			  <? 
			  if (isset($_SESSION[$tablo_ismi.'hata'])) 
				 {
					$hata=$_SESSION[$tablo_ismi.'hata'];
					if (isset($hata[2]) && $hata[2]==1 ) { echo 'Duyuru Detaylarını Giriniz';}
				 }
			  ?>
              </span>
              </td>
          </tr>
          <tr> 
            <td height="32"></td>
            <td>
              <input name="kaydet" type="button" id="kaydet" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" id="Submit2" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()">
			</td>
          </tr>
          <tr>
            <td height="32"></td>
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
		if  (document.form1.ad.value=="")
			{																
				alert("Tum Alanlari Dogru Bir Sekilde Doldurunuz ");
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