<? session_start();
$link_inherit="ekle.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
		$max_file_size=round($max_file_size/1024);
		include($uzaklik."inc_s/baglanti.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
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
<style type="text/css"> .style1 {font-size: 10px} </style>
</head>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="3%" class="td_anabaslik"><div align="center"><img src="../pictures/kultursanat.gif" width="48" height="48"></div></td>
    <td width="97%" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt;
	<a href="kontrol.php"  class="veri_ana_baslik">Videolar</a> &gt;</font></td>
  </tr>
</table>
<table width="950" border="0" align="center" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#FFFFFF" style="border:solid; border-width:1">
  <tr> 
    <form name="form1" method="post" action="ekle_islem.php" enctype="multipart/form-data">
      <td  valign="top" bordercolor="#C0C0C0" bgcolor="#FFFFFF" > 
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td colspan="2" class="anabaslik">Video Ekle</td>
          </tr>
          <tr> 
            <td width="165">&nbsp;</td>
            <td width="757">
            <font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
			<? 		
            if  (isset($_GET['err']))
                {
					switch($_GET['err'])
					  {
						 case 'eksik_veri':	print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!"); break;
						 case 'yanlis_tarih':print("Tarih Formatında Hata Tesbit Edildi.");break;
						 case 'uzanti':print("Hatalı  Format"); break;
						 case 'boyut':print("İzin Verilenden Büyük Dosya Boyutu"); break;
					  }
                }
            ?>
              </font></td>
          </tr>
          <tr>
            <td><font class="baslik"><strong>Dil *</strong></font></td>
            <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_dil'])) { $dil=$_SESSION[$tablo_ismi.'n_dil']; } ?>
                <select name="dil" class="textbox1">
                  <option value="1" <? if ($dil==1) { ?> selected="selected" <? } ?>>Türkçe </option>
                 <? /* <option value="2" <? if ($dil==2) { ?> selected="selected" <? } ?>>İngilizce </option> */ ?>
                </select>
            </td>
          </tr>
       <? if (1==2) { ?>   <tr>
            <td><font class="baslik"><strong>Durum</strong></font></td>
          <td bgcolor="#F9F9F9">
		  		<? if (isset($_SESSION[$tablo_ismi.'n_durum'])) { $durum=$_SESSION[$tablo_ismi.'n_durum']; } ?>
                 <select name="durum" class="textbox1">
                  <option value="1" <? if ($durum==1) { ?> selected="selected" <? } ?>>Ana Sayfada Görünmesin</option>
                  <option value="2" <? if ($durum==2) { ?> selected="selected" <? } ?>>Ana Sayfada Görünsün</option>
                </select>
                
                
                
            </td>
          </tr> <? } ?>
          <tr>
            <td class="baslik">Ad *</td>
            <td bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_ad'])) { $ad=$_SESSION[$tablo_ismi.'n_ad']; } ?>
            <input name="ad" type="text" class="textbox1" id="ad" value="<? echo $ad; ?>" size="55" onKeyUp="yoltanimla();"></td>
          </tr>
          <tr> 
            <td width="127" class="baslik">Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket'])) { $htaccess_etiket=$_SESSION[$tablo_ismi.'htaccess_etiket']; } ?>
            <input name="htaccess_etiket" type="text" class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket)) {echo $htaccess_etiket; }?>" size="55" >
              </td>
          </tr>
          <tr>
            <td><strong class="baslik">Resim Seç</strong></td>
            <td bgcolor="#F9F9F9">
            <input name="resim" type="file" class="textbox1" onFocus="pchange(this,1);"  onblur="pchange(this, 0);" size="46"></td>
          </tr>
          <tr> 
            <td><strong class="baslik">Video Seç **</strong></td>
            <td bgcolor="#F9F9F9">
              <input name="video" type="file" class="textbox1" onFocus="pchange(this,1);"  onblur="pchange(this, 0);" size="46">
              <span class="veri_tarih">Tavsiye Edilen Boyut: <? echo $kck_m_w; ?>px*<? echo $kck_m_h; ?>px</span></td>
          </tr>
       <? if (1==1) {  ?>     <tr>
            <td class="baslik">veya</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><strong class="baslik">Video Kaynağı **</strong></td>
            <td bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_kaynak'])) { $kaynak=$_SESSION[$tablo_ismi.'n_kaynak']; } ?>
            <textarea name="kaynak" cols="80" rows="10" class="textbox1" id="kaynak"><? echo $kaynak; ?></textarea>
</td>
          </tr>
		<? /*   <tr>
            <td>&nbsp;</td>
            <td bgcolor="#F9F9F9" class="veri_tarih">Dış kaynaklardan video kullanmak için video sitesinden alacağınız video EMBED kodunu yukarıya giriniz. <br>
              <strong>!!! Eğer dış kaynak videoyu ana sayfaya çağıracaksanız genişlik ve yüksekliğini 100% * 530 olarak değiştirmelisiniz.</strong></td>
          </tr> */ ?>
		  <? } ?>
          
          <? if (1==0) {  ?>
          <tr>
              <td class="baslik">Açıklama </td>
              <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_aciklama'])) {$aciklama=$_SESSION[$tablo_ismi.'n_aciklama']; } ?>
              <textarea name="aciklama" cols="80" rows="25" class="mceAdvanced"><? if (isset($aciklama)) { print $aciklama; } ?></textarea>
              <font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
                <? if (isset($_SESSION[$tablo_ismi.'n_hata'])) 
					  {
							$hata=$_SESSION[$tablo_ismi.'n_hata'];
							if (isset($hata[6]) && $hata[6]==1 ) { echo 'Ürün Açıklamasını Giriniz';}
					  }
				?>
              </font>
              </td>
            </tr>
          <? } ?>
          <tr>
            <td height="26" colspan="2">&nbsp;</td>
          </tr>
          <tr> 
            <td height="32">&nbsp;</td>
            <td>
              <input name="Submit" type="button" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()">
            </td>
          </tr>
          <tr> 
            <td colspan="2">
            <table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
            <tr valign="bottom" bordercolor="#FFFFFF"> 
            <td width="81%">&nbsp;</td>
            <td width="19%">
			<div align="left"><span class="veri_tarih">Max. Dosya Boyutu:<strong><? print $max_file_size/1024; ?> Mb</strong></span></div>
            </td>
            </tr>
            </table>
            </td>
          </tr>
      </table>
      </td>
    </form>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<script>
function kontrol()
	{
		if  (document.form1.ad.value=="") 
			{ 
				alert("Lütfen Açıklamayı Giriniz");  
			}
		else if (document.form1.video.value=="" && document.form1.kaynak.value=="") 
			{ 
				alert("Lütfen Videoyu Seçiniz veya Video Kaynağını Giriniz");  
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