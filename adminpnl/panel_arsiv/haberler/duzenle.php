<? session_start();
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
		$numara=$_GET["numara"];
		$sql_cumlesi="select * from $tablo_ismi where numara='$numara'";																	
		$recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
		if  (count($recordset)<>0)
			{	  
				$ad=stripslashes($recordset[0]["ad"]);
				//$puan=$recordset[0]["puan"];
				$eklenme_tarihi=$recordset[0]["eklenme_tarihi"];
				$ozet=stripslashes($recordset[0]["ozet"]);
				$resim=$recordset[0]["resim_adres"];
				$icerik=stripslashes($recordset[0]["icerik"]);
				$htaccess_etiket=$recordset[0]['htaccess_etiket'];
				$dil=$recordset[0]["dil"];	
				switch ($dil)
					{		
						case 1: $dil_aciklama="Türkçe"; break;
						case 2: $dil_aciklama="İngilizce"; break;
						case 3: $dil_aciklama="Almanca"; break;
						case 4: $dil_aciklama="Rusça"; break;
					}   //echo $dil_aciklama;
				if ($resim=='') {$resim=$default_resim; }
			    if ($resim<>$default_resim)
		 		   {
					   resim_yeniden_boyutlandir($thumb_resim_dizini,$resim,$kck_m_h,$kck_m_w);							
				   }
			}
		else
			{
				header('Location:kontrol.php');
			}																			
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title; ?></title>
<script language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></script>
<script language="javascript">
function textCounter(field, countfield, maxlimit) 
	{
		if  (field.value.length> maxlimit)
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="document.form1.ad.focus();">
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="48" class="td_anabaslik"><div align="left"><img src="../pictures/haber.gif" width="48" height="48"></div></td>
    <td width="890" class="td_anabaslik">
	<span class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt;
	<a href="kontrol.php" class="veri_ana_baslik">Haberler</a> &gt;</span></td>
  </tr>
</table>
<table width="950" border="0" align="center" bgcolor="#FFFFFF">
  <tr> 
    <form name="form1" method="post" action="duzenle_islem.php" enctype="multipart/form-data">
      <td valign="top"> 
        <table width="942" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td colspan="3" class="anabaslik">Haber Düzenle</td>
          </tr>
          <tr> 
            <td width="185"><input name="gizli" type="hidden" id="gizli" value="<? echo $numara; ?>"></td>
            <td colspan="2">
            <font  class="hata1"> 
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
              </font></td>
          </tr>
                   
         
          <tr> 
            <td><strong class="baslik">Haber Başlığı * </strong></td>
            <td colspan="2" bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'ad'])) { $ad=$_SESSION[$tablo_ismi.'ad']; } ?>			  
			<input name="ad" type="text" id="ad"  value="<?  echo stripslashes($ad); ?>"  class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();">           </td>
          </tr>
          <tr> 
            <td class="baslik">Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9" colspan="2">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket'])) { $htaccess_etiket=$_SESSION[$tablo_ismi.'htaccess_etiket']; } ?>			  
           <input name="htaccess_etiket" type="text" id="htaccess_etiket"  value="<? echo $htaccess_etiket ?>"  class="textbox1" size="55" onBlur="pchange(this, 0);" onFocus="pchange(this, 1);"></td>
          </tr>
          <tr>
            <td><span class="baslik"><strong>Dil *</strong></span></td>
            <td colspan="2" bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'dil'])) { $dil=$_SESSION[$tablo_ismi.'dil']; } ?>
                <select name="dil" class="textbox1">
                  <option value="1" <? if ($dil==1) { ?> selected="selected" <? } ?>>Türkçe </option>
                  <option value="2" <? if ($dil==2) { ?> selected="selected" <? } ?>>İngilizce </option>
                  <option value="3" <? if ($dil==3) { ?> selected="selected" <? } ?>>Almanca </option>
                  <option value="4" <? if ($dil==4) { ?> selected="selected" <? } ?>>Rusça </option>
              </select></td>
          </tr>
         <? if (1==1) { ?> <tr>
            <td valign="middle"><strong class="baslik">Özet *</strong></td>
            <td colspan="2" bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'ozet'])) { $ozet=$_SESSION[$tablo_ismi.'ozet']; } ?>
                <textarea name="ozet" cols="80" rows="5" class="textbox1" wrap="physical" onKeyDown="textCounter(form1.ozet,form1.ozet_uzunluk,430);" onKeyUp="textCounter(form1.ozet,form1.ozet_uzunluk,430);" ><? echo stripslashes($ozet); ?></textarea>
				<br><br>
                <input type="text"  readonly="true" name="ozet_uzunluk" class="textbox1" size="3" maxlength="3" value="430">
                <span class="veri_baslik">karakter kaldı</span></font></td>
          </tr><? } ?>
          <tr>
            <td><span class="baslik">İçerik * </span></td>
            <td colspan="2" bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'icerik'])) {$icerik=$_SESSION[$tablo_ismi.'icerik'];   } ?>
            <textarea name="icerik" cols="90" rows="25" class="mceAdvanced"><? echo stripslashes($icerik); ?></textarea>			</td>
          </tr>
          <tr> 
            <td><strong class="baslik">Resim</strong></td>
            <td width="522" bgcolor="#F9F9F9">
            <input name="resim" type="file" id="resim"  class="textbox1" onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
            <span class="veri_tarih">Tavsiye Edilen: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları</span>            </td>
            
          </tr>
          
          <tr> 
            <td height="32">&nbsp;</td>
            <td colspan="2">
              <input name="Submit" type="button" id="Submit" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" id="Submit2" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()"></td>
          </tr>
          
          <tr>
          <td height="32">&nbsp;</td>
          <td width="187" bgcolor="#F9F9F9"><div align="center"><a href="<? print($thumb_resim_dizini.$resim); ?>" target="_blank">
		    <img src="<? print($thumb_resim_dizini.$resim); ?>" width="<? print($yeni_genislik);?>" height="<? print($yeni_yukseklik);?>" border="0" style="max-width: 687px;height: auto;"></a></div></td></tr>
          
          <tr> 
            <td colspan="3"><table width="922" border="0" align="center" cellpadding="2" cellspacing="4">
                <tr> 
                  <td width="717" >&nbsp;</td>
                  <td width="185" valign="middle"><div align="center"><font class="veri_tarih">Max. Dosya Boyutu:<strong> <? print $max_file_size ?> kb</strong></font></div></td>
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
</body>
</html>
<script>
function kontrol()
	{
		if (document.form1.ad.value=="")
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
		yol_deger=document.form1.ad.value.replace(/\s/g, "-"); //yol_deger=document.form1.ad.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
		document.form1.htaccess_etiket.value=yol_deger; //document.form1.htaccess_etiket.value=yol_deger.toLowerCase();
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