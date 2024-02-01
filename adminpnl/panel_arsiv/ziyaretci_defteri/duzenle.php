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
			  $ad=$recordset[0]["ad"]; 
			  $mesaj=$recordset[0]["mesaj"];
			  $eposta=$recordset[0]["eposta"];
			  $telefon=$recordset[0]["telefon"];
			  $dil=$recordset[0]["dil"];
			  switch ($dil)
					{		
						case 1: $dil_aciklama="Türkçe"; break;
						case 2: $dil_aciklama="İngilizce"; break;
						case 3: $dil_aciklama="Almanca"; break;
						case 4: $dil_aciklama="Rusça"; break;
					} 
			  $puan=$recordset[0]["puan"];
		   }
		else
		   {
			  header('Location:kontrol.php');
		   }																			
?>
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="48" class="td_anabaslik"><div align="left"><img src="../pictures/zdefter.gif" width="48" height="48"></div></td>
    <td width="904" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt;
	<a href="kontrol.php"  class="veri_ana_baslik">Ziyaretçi Defteri</a> &gt;</font></td>
  </tr>
</table>
<table width="950" border="0" align="center" bordercolor="#CCCCCC" bgcolor="#FFFFFF" style="border:solid; border-width:1">
  <tr> 
    <form name="form1" method="post" action="duzenle_islem.php">
      <td valign="top"> 
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td colspan="2" class="anabaslik">Ziyaretçi Defteri Mesaj  Düzenle </td>
          </tr>
          <tr> 
            <td width="21%"><input name="gizli" type="hidden" id="gizli" value="<? echo $numara; ?>"> </td>
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
              </font>
              </td>
          </tr>
          <tr> 
            <td><font  class="baslik">Gönderen *</font></td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'ad'])) { $ad=$_SESSION[$tablo_ismi.'ad']; } ?>			  
			<input name="ad" type="text" id="ad"  class="textbox1" size="55"  onblur="pchange(this, 0);" onFocus="pchange(this, 1);"   value="<? echo stripslashes($ad) ?>">
            <span class="hata1">
            <? 
			if (isset($_SESSION[$tablo_ismi.'hata'])) 
					{
						$hata=$_SESSION[$tablo_ismi.'hata'];
						if (isset($hata[1]) && $hata[1]==1 ) { echo 'Göndereni Giriniz';}
					}
			?>
            </span></td>
          </tr>
          <tr>
            <td><font  class="baslik">Gönderen Telefon *</font></td>
            <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'telefon'])) { $telefon=$_SESSION[$tablo_ismi.'telefon']; } ?>
                <input name="telefon" type="text" id="telefon"  value="<? echo $telefon; ?>"  class="textbox1" size="55"  onblur="pchange(this, 0);" onFocus="pchange(this, 1);" >
                <span class="hata1">
                <? 
			  if (isset($_SESSION[$tablo_ismi.'hata'])) 
					{
						$hata=$_SESSION[$tablo_ismi.'hata'];
						if (isset($hata[6]) && $hata[6]==1 ) { echo 'Gönderenin Telefonunu Giriniz';}
					}
			 ?>
              </span></td>
          </tr>
          <tr>
            <td><font  class="baslik">Gönderen E-posta *</font></td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'eposta'])) { $eposta=$_SESSION[$tablo_ismi.'eposta']; } ?>
              <input name="eposta" type="text" id="eposta"  value="<? echo $eposta; ?>"  class="textbox1" size="55"  onblur="pchange(this, 0);" onFocus="pchange(this, 1);" >
              <span class="hata1">
              <? 
			  if (isset($_SESSION[$tablo_ismi.'hata'])) 
					{
						$hata=$_SESSION[$tablo_ismi.'hata'];
						if (isset($hata[2]) && $hata[2]==1 ) { echo 'Gönderen Epostasını Giriniz';}
					}
			 ?>
             </span></td>
          </tr>
          <tr>
            <td><font class="baslik">Mesaj *</font></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'mesaj'])) {$mesaj=$_SESSION[$tablo_ismi.'mesaj']; }?>
              <textarea name="mesaj" id="mesaj" cols="55" rows="10" class="textbox1"><? print stripslashes($mesaj); ?></textarea>
              <span class="hata1">
			  <? 
			  if (isset($_SESSION[$tablo_ismi.'hata'])) 
				 {
					$hata=$_SESSION[$tablo_ismi.'hata'];
					if (isset($hata[3]) && $hata[3]==1 ) { echo 'Mesajı Giriniz';}
				 }
			  ?>
            </span>            </td>
          </tr><tr>
            <td><span class="baslik">Dil *</span></td>
            <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'dil'])) { $dil=$_SESSION[$tablo_ismi.'dil']; } ?>
                <select name="dil" class="textbox1">
                  <option value="1" <? if ($dil==1) { ?> selected="selected" <? } ?>>Türkçe </option>
                  <option value="2" <? if ($dil==2) { ?> selected="selected" <? } ?>>İngilizce </option>
                  <option value="3" <? if ($dil==3) { ?> selected="selected" <? } ?>>Almanca </option>
                  <option value="4" <? if ($dil==4) { ?> selected="selected" <? } ?>>Rusça </option>
              </select></td>
          </tr>
       <? if (1==2) { ?>  <tr>
            <td><span class="baslik">Puan</span></td>
            <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'puan'])) { $puan=$_SESSION[$tablo_ismi.'puan']; } ?>
                <select name="puan" class="textbox1">
                  <option value="0" <? if ($puan==0) { ?> selected="selected" <? } ?>>Değerlendirme Yapın</option>
                  <option value="1" <? if ($puan==1) { ?> selected="selected" <? } ?>>Kötü</option>
                  <option value="2" <? if ($puan==2) { ?> selected="selected" <? } ?>>Vasat</option>
                  <option value="3" <? if ($puan==3) { ?> selected="selected" <? } ?>>İyi</option>
                  <option value="4" <? if ($puan==4) { ?> selected="selected" <? } ?>>Çok İyi</option>
                  <option value="5" <? if ($puan==5) { ?> selected="selected" <? } ?>>Mükemmel</option>
              </select></td>
          </tr>
          <? } ?>
          <tr> 
            <td height="32"></td>
            <td>
              <input name="kaydet" type="button" id="kaydet" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" id="Submit2" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()">            </td>
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
		if  (document.form1.ad.value=="" || document.form1.eposta.value=="" || document.form1.mesaj.value=="" )
			{																
				alert("Tüm Alanları Doğru Bir Şekilde Doldurunuz");
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