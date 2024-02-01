<? session_start();
	  	$link_inherit="ekle.php";
		include("config.php");
		if (isset($_SESSION['yonet']))
		   {
				include($uzaklik."inc_s/baglanti.php");
				//$syonetim=$_SESSION["siteyonetici"];
				//include("boyut_ogren.php");
		
				$hizmet=$_SESSION[$tablo_ismi."hizmet"];
				$max_file_size=substr($max_file_size,0,-3);	
				$hizmet_ogren=@$baglanti->query("Select ad from restoran_kategori where numara='$hizmet'")->fetchAll(PDO::FETCH_ASSOC);
				$hizmet_ad=$hizmet_ogren[0]["ad"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></script>
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
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
</head>
<body  onLoad="javascript:document.form1.aciklama.focus()">
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="3%" class="td_anabaslik"><div align="left"><img src="../pictures/ilrehberi.gif" width="48" height="48"></div></td>
    <td width="97%" class="td_anabaslik">
    <font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt; 
	<a href="../restoran_kategori/kontrol.php" class="veri_ana_baslik">Restoranlar (<? echo $hizmet_ad; ?>)</a> &gt; 
	<a href="kontrol.php"  class="veri_ana_baslik">Restoran Resimler</a> &gt; 
	</font>
    </td>
  </tr>
</table>
<table width="950" border="0" align="center" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <form name="form1" method="post" action="ekle_islem.php" enctype="multipart/form-data">
      <td  valign="top"> 
        <div align="center">
          <table width="100%" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td colspan="2" class="anabaslik">Restoran Resim Ekle</td>
          </tr>
            <tr> 
              <td>&nbsp;</td>
              <td>
              <font class="hata1"> 
				<? 		
					if (isset($_GET['err']))
					   {
							switch($_GET['err'])
							  {
								 case 'eksik_veri': print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!");   break;
								 case 'resimboyut': print("Büyük Dosya Boyutu ya da Desteklenmeyen Resim Formatı");   break;
								 case 'yanlis_tarih': print("Tarih Formatında Hata Tesbit Edildi.");   break;
								 case 'uzanti': print("Hatalı Resim Formatı");   break;
								 case 'boyut': print("İzin Verilenden Büyük Dosya Boyutu");  break;
							 }
					   }
					if (isset($_GET["don"])) { $mesaj="Lütfen daha küçük dosya seçiniz"; print($mesaj) ; }											 
                ?>
                </font></td>
            </tr>
            
            <? if(1==2) { ?>
            <tr> 
              <td width="185"><span class="baslik">Resim Ad </span></td>
              <td>
			  <?  if (isset($_SESSION[$tablo_ismi.'n_ad'])) {$ad=$_SESSION[$tablo_ismi.'n_ad']; }  ?>
			 <input name="ad" type="text" id="ad"  value="<? if (isset($ad)) { print($ad); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();"></td>
            </tr>
            <tr> 
            <td width="127" class="baslik">Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket'])) { $htaccess_etiket=$_SESSION[$tablo_ismi.'htaccess_etiket']; } ?>
            <input name="htaccess_etiket" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($htaccess_etiket)) {echo $htaccess_etiket; }?>" size="55">              </td>
          </tr>
            <tr> 
              <td width="185"><span class="baslik">Açıklama </span></td>
              <td>
			  <?  if (isset($_SESSION[$tablo_ismi.'n_aciklama'])) {$aciklama=$_SESSION[$tablo_ismi.'n_aciklama']; }  ?>
            <textarea name="aciklama" cols="80" rows="25" class="mceAdvanced"><? if (isset($aciklama)) { print $aciklama; } ?></textarea>            </tr>
            <? } ?>
            <tr> 
              <td width="185" valign="middle"><span class="baslik">Resim * </span></td>
              <td>
                <input name="resim" type="file" id="resim"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="44">
                <span class="veri_tarih">Örn: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları</span></td>
            </tr>
            <tr>
              <td><span class="baslik">Sıralama </span></td>
              <td>
			  <? if (isset($_SESSION[$tablo_ismi.'n_siralama'])) {$siralama=$_SESSION[$tablo_ismi.'n_siralama']; }  ?>
              <input name="siralama" type="text" id="siralama"  value="<? if (isset($siralama)) { print($siralama); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" ></td>
            </tr>
            <tr> 
              <td height="32">&nbsp;</td>
              <td>
				  <input name="kaydet" type="button" class="dugmeler_ekle" value="Kaydet"  onClick="kontrol()">
				  <input name="Submit2" type="button" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()">              </td>
            </tr>
            <tr> 
              <td colspan="2"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr> 
                    <td width="80%">&nbsp;</td>
                    <td width="20%" valign="middle"><div align="left"><span class="veri_tarih">Max. Dosya Boyutu:<strong><? print $max_file_size ?> kb </strong></span></div></td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
          </table>
      </div></td>
    </form>
  </tr>
</table>
</body>
</html>
<script language="javascript">function kontrol() { if (form1.resim.value==""){	alert("Lütfen Resim Seçiniz");} else {	document.form1.submit();} } 
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
	  include("error.php"); 
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>