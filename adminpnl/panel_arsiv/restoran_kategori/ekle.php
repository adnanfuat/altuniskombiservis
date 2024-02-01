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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css"> .style1 {font-size: 10px} .style2 {font-size: 9px} </style>
</head>
<body onLoad="document.form1.ad.focus();">
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="3%" class="td_anabaslik"><div align="left"><img src="../pictures/ilrehberi.gif" width="48" height="48"></div></td>
    <td width="97%" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt; 
    <a href="kontrol.php"  class="veri_ana_baslik">Restoranlar</a> &gt;</font></td>
  </tr>
</table>
<table width="950" border="0" align="center"  bgcolor="#FFFFFF">
  <tr> 
    <form name="form1" method="post" action="ekle_islem.php" enctype="multipart/form-data">
      <td  valign="top"> 
        <table width="944" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td colspan="2" class="anabaslik">Restoran Ekle</td>
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
              </font>              </td>
          </tr>
			<tr> 
            <td width="185"><strong class="baslik">Ad  *</strong></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_ad'])) { $ad=$_SESSION[$tablo_ismi.'n_ad']; } ?>
			  <input name="ad" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($ad)) { echo  stripslashes($ad); }?>" size="55" onKeyUp="yoltanimla();">            </td>
          </tr>
          <tr> 
            <td width="127" class="baslik">Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'n_htaccess_etiket'])) { $htaccess_etiket=$_SESSION[$tablo_ismi.'n_htaccess_etiket']; } ?>
            <input name="htaccess_etiket" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($htaccess_etiket)) {echo $htaccess_etiket; }?>" size="55">              </td>
          </tr>
          <tr>
            <td><font class="baslik"><strong>Dil *</strong></font></td>
            <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_dil'])) { $dil=$_SESSION[$tablo_ismi.'n_dil']; } ?>
                <select name="dil" class="textbox1">
                  <option value="1" <? if ($dil==1) { ?> selected="selected" <? } ?>>Türkçe </option>
                 <? if (1==2) { ?> <option value="2" <? if ($dil==2) { ?> selected="selected" <? } ?>>İngilizce </option><? } ?>
                </select>            </td>
          </tr>
         
          <tr> 
            <td width="185"><strong class="baslik">Manşet  Linki</strong></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_gorsel'])) { $gorsel=$_SESSION[$tablo_ismi.'n_gorsel']; } ?>
			  <input name="gorsel" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($gorsel)) {echo $gorsel; }?>" size="55">
              <br>
              <span class="veri_tarih">* Bu alan restoran sayfasının manşeti için kullanacağınız fotoğrafın linkine aittir. Bu fotoğrafı dosya yükleme modülünden yükleyip, buraya linkini girin.</span>               </td>
          </tr>
         
          
        <? if (1==2) { ?>  <tr>
            <td><font class="baslik"><strong>Hizmet Kategori *</strong></font></td>
            <td bgcolor="#F9F9F9">
			
			
			<? if (isset($_SESSION[$tablo_ismi.'n_hizmetkategori'])) { $hizmetkategori=$_SESSION[$tablo_ismi.'n_hizmetkategori']; } ?>
            <?  $tanimlamalar=@$baglanti->query("Select * from tanimlar where aktif=1 and dil=1 order by numara asc")->fetchAll(PDO::FETCH_ASSOC);
				$tanimlamalar_sayi=count($tanimlamalar);
			?>
                <select name="hizmetkategori" class="textbox1">
                   	<?	if ($tanimlamalar_sayi>0) 
						{
							for ($sayac=0; $sayac<$tanimlamalar_sayi; $sayac++)
								{
									$hizmetkategori_ad=$tanimlamalar[$sayac]["ad"];
									$hizmetkategori_numara=$tanimlamalar[$sayac]["numara"];
					?>
                    					<option value="<? echo $hizmetkategori_numara; ?>" <? if ($hizmetkategori==$hizmetkategori_numara) { ?> selected="selected" <? } ?>><? echo $hizmetkategori_ad; ?></option>
                   <? 			} 
				   		}
				   ?>
                </select>            </td>
          </tr> <? } ?>
          
          
          <tr> 
            <td width="185"><strong class="baslik">Başlık 1 *</strong></td>
            <td bgcolor="#F9F9F9">
              
			  <? if (isset($_SESSION[$tablo_ismi.'n_baslik1'])) { $baslik1=$_SESSION[$tablo_ismi.'n_baslik1']; } ?>
			  <input name="baslik1" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($baslik1)) { echo  stripslashes($baslik1); }?>" size="55">             </td>
          </tr>
          
          <tr>
            <td><span class="baslik">İçerik 1</span></td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'n_aciklama'])) { $aciklama=$_SESSION[$tablo_ismi.'n_aciklama']; } ?>
            <textarea name="aciklama" cols="80" rows="25" class="mceAdvanced"><? if (isset($aciklama)) { print stripslashes($aciklama); } ?></textarea></td>
          </tr>
          
          
          <tr> 
            <td width="185"><strong class="baslik">Başlık 2 *</strong></td>
            <td bgcolor="#F9F9F9">
              
			  <? if (isset($_SESSION[$tablo_ismi.'n_baslik2'])) { $baslik2=$_SESSION[$tablo_ismi.'n_baslik2']; } ?>
			  <input name="baslik2" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($baslik2)) { echo  stripslashes($baslik2); }?>" size="55">             </td>
          </tr>
          
          <tr>
            <td><span class="baslik">İçerik 2 *</span></td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'n_ozet'])) { $ozet=$_SESSION[$tablo_ismi.'n_ozet']; } ?>
              <textarea name="ozet" cols="80" rows="25"  class="mceAdvanced" id="ozet"><? echo stripslashes($ozet); ?></textarea>
			  <br>
              <span class="veri_tarih">Bu alan sayfadaki renkli arkaplanda görünecek yazı bilgisi için kullanılmalıdır. </span></td>
          </tr>
          
         
          
           <tr> 
            <td width="185"><strong class="baslik">Tema Renk Kodu</strong></td>
            <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_renk'])) { $renk=$_SESSION[$tablo_ismi.'n_renk']; } ?>
              <input name="renk" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($renk)) {echo $renk; }?>" size="55"></td>
          </tr>
          
          
          <tr> 
            <td><font class="baslik">Renkli Bölüm Resim</font></td>
            <td bgcolor="#F9F9F9">
            <input name="resim" type="file" class="textbox1" onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
            <span class="veri_tarih">Tavsiye Edilen Boyut: <? echo $kck_m_w; ?>px*<? echo $kck_m_h; ?>px</span></td>
          </tr>
          
          
          
          
          
          <tr> 
            <td width="185"><strong class="baslik">Menü  Linki</strong></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_link'])) { $link=$_SESSION[$tablo_ismi.'n_link']; } ?>
			  <input name="link" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($link)) {echo $link; }?>" size="55">
              <br>
              <span class="veri_tarih">* Bu alan restoran sayfasının menüsü için kullanacağınız  linke aittir. Bunun için dosya yükleme modülünden menüyü yükleyip, buraya linkini girin.</span>               </td>
          </tr>
          
          
          <tr> 
            <td width="185"><strong class="baslik">Instagram Başlık</strong></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_insta_baslik'])) { $insta_baslik=$_SESSION[$tablo_ismi.'n_insta_baslik']; } ?>
			  <input name="insta_baslik" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($insta_baslik)) {echo $insta_baslik; }?>" size="55">               </td>
          </tr>
          
          <tr> 
            <td width="185"><strong class="baslik">Instagram Token Kodu</strong></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_insta_token'])) { $insta_token=$_SESSION[$tablo_ismi.'n_insta_token']; } ?>
			  <input name="insta_token" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($insta_token)) { echo $insta_token; }?>" size="55">            </td>
          </tr>
          
          
          <tr>
            <td><font class="baslik">Sıralama</font></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_puan'])) { $puan=$_SESSION[$tablo_ismi.'n_puan']; } ?>
              <input name="puan" type="text" class="textbox1" id="puan"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($puan)) {echo $puan; }?>" size="10">            </td>
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