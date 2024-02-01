<? session_start();
$link_inherit="ekle.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
		//$syonetim=$_SESSION["siteyonetici"];
	 	
		//include("boyut_ogren.php");
		
		$ustkategori_no=$_SESSION['ust_kategori_no'];
   		$altkategori=$_SESSION['alt_kategori'];
		$max_file_size=substr($max_file_size,0,-3);
		$ustkategori_adi_ogren=@$baglanti->query("Select ad from $ustkategori_tablo_adi where numara=$ustkategori_no")->fetchAll(PDO::FETCH_ASSOC);
		$ustkategori_adi=$ustkategori_adi_ogren[0]["ad"];
		$altkategori_adi_ogren=@$baglanti->query("Select ad from $altkategori_tablo_adi where numara=$altkategori")->fetchAll(PDO::FETCH_ASSOC);
		$altkategori_adi=$altkategori_adi_ogren[0]["ad"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css">.style6 {font-size: 12px}.style7 {font-size: 10px}.style10 {color: #000000}</style>
</head>
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
<body  onLoad="javascript:document.form1.ad1.focus()">
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="3%" class="td_anabaslik"><div align="left"><img src="../pictures/banner.gif" width="48" height="48"></div></td>
    <td width="97%" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt;	<a href="../galeri_kategori/kontrol.php" class="veri_ana_baslik">Galeri Kategorileri (<? print($ustkategori_adi); ?>)</a> &gt; <a href="../galeri_altkategori/kontrol.php" class="veri_ana_baslik">Galeri Alt Kategorileri (<? print($altkategori_adi);?>)</a> &gt; <a href="kontrol.php" class="veri_ana_baslik">Resimler</a> &gt;</font>
	</td>
  </tr>
</table>
<table width="950" border="0" align="center" bgcolor="#FFFFFF" cellspacing="0">
  <tr> 
    <form name="form1" method="post" action="hizli_ekle_islem.php" enctype="multipart/form-data">
      <td  valign="top"> 
        <div align="center">
          <table width="944" border="0" align="center" cellpadding="4" cellspacing="6">
            <tr>
              <td colspan="2" class="anabaslik">Hızlı Resim Ekle</td>
            </tr>
            <tr> 
              <td>&nbsp;</td>
              <td width="725">
              <font class="hata1"> 
			  <? 		
					if  (isset($_GET['err']))
					    {
							switch($_GET['err'])
							  {
								 case 'eksik_veri':print("Tüm Alanları Doğru Bir Şekilde Doldgaleriuz!"); break;

								 case 'resimboyut':print("Büyük Dosya Boyutu ya da Desteklenmeyen Resim Formatı"); break;
								 case 'yanlis_tarih':print("Tarih Formatında Hata Tesbit Edildi."); break;
								 case 'uzanti':print("Hatalı Resim Formatı");	break;
								 case 'boyut':print("İzin Verilenden Büyük Dosya Boyutu"); break;
							 }
					    }
					if  (isset($_GET["don"])) 
						{ 
							$mesaj="Lütfen daha küçük dosya seçiniz"; print($mesaj);   
						}
             ?>
			 </font>             </td>
            </tr>
            <tr> 
              <td width="185"><span class="baslik"> Resim1 Ad *</span> </td>
              <td bgcolor="#F9F9F9">
				<?  if (isset($_SESSION[$tablo_ismi.'n_ad1'])) {$ad1=$_SESSION[$tablo_ismi.'n_ad1']; }  ?>                
                <input name="ad1" type="text" id="ad1"  value="<? if (isset($ad1)) { print($ad1); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);"  onKeyUp="yoltanimla();">                </td>
            </tr>
            <tr> 
            <td width="185" class="baslik">Resim1 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket1'])) { $htaccess_etiket1=$_SESSION[$tablo_ismi.'htaccess_etiket1']; } ?>
            <input name="htaccess_etiket1" type="text" class="textbox1" id="htaccess_etiket1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket1)) {echo $htaccess_etiket1; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim1 Puan</span></td>
              <td bgcolor="#F9F9F9">
			  <? if (isset($_SESSION[$tablo_ismi.'n_puan1'])) {$puan1=$_SESSION[$tablo_ismi.'n_puan1']; } ?>
              <input name="puan1" type="text" id="puan1" value="<? if (isset($puan1)) { print($puan1); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >              </td>
            </tr>
            <tr>
                <td valign="top"><span class="baslik">Resim1 Fiyat</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_fiyat1'])) {$fiyat1=$_SESSION[$tablo_ismi.'n_fiyat1']; } ?>
                <input name="fiyat1" type="text" id="fiyat1" value="<? if (isset($fiyat1)) { print($fiyat1); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15"> 
                <span class="veri_baslik">TL</span>                </td>
            </tr>
            <tr> 
              <td width="185"><span class="baslik">Resim1 Resim </span></td>
              <td bgcolor="#F9F9F9">
              <input name="resim1" type="file"  class="textbox1" id="resim1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
			  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span>              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td width="185"><span class="baslik"> Resim2 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad2'])) {$ad2=$_SESSION[$tablo_ismi.'n_ad2']; }  ?>
                  <input name="ad2" type="text" id="ad2"  value="<? if (isset($ad2)) { print($ad2); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);"  onKeyUp="yoltanimla();">               </td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim2 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket2'])) { $htaccess_etiket2=$_SESSION[$tablo_ismi.'htaccess_etiket2']; } ?>
            <input name="htaccess_etiket2" type="text" class="textbox1" id="htaccess_etiket2"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket2)) {echo $htaccess_etiket2; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim2 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan2'])) {$puan2=$_SESSION[$tablo_ismi.'n_puan2']; } ?>
              <input name="puan2" type="text" id="puan2" value="<? if (isset($puan2)) { print($puan2); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >             </td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Resim2 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat2'])) {$fiyat2=$_SESSION[$tablo_ismi.'n_fiyat2']; } ?>
                  <input name="fiyat2" type="text" id="fiyat2" value="<? if (isset($fiyat2)) { print($fiyat2); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
            <tr>
              <td width="185"><span class="baslik">Resim2 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim2" type="file"  class="textbox1" id="resim2"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td width="185"><span class="baslik"> Resim3 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad3'])) {$ad3=$_SESSION[$tablo_ismi.'n_ad3']; }  ?>
                  <input name="ad3" type="text" id="ad3"  value="<? if (isset($ad3)) { print($ad3); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();">             </td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim3 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket3'])) { $htaccess_etiket3=$_SESSION[$tablo_ismi.'htaccess_etiket3']; } ?>
            <input name="htaccess_etiket3" type="text" class="textbox1" id="htaccess_etiket3"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket3)) {echo $htaccess_etiket3; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim3 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan3'])) {$puan3=$_SESSION[$tablo_ismi.'n_puan3']; } ?>
                  <input name="puan3" type="text" id="puan3" value="<? if (isset($puan3)) { print($puan3); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10">              </td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Resim3 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat3'])) {$fiyat3=$_SESSION[$tablo_ismi.'n_fiyat3']; } ?>
              <input name="fiyat3" type="text" id="fiyat3" value="<? if (isset($fiyat3)) { print($fiyat3); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
              <span class="veri_baslik">TL</span></td>
            </tr>
            <tr>
              <td width="185"><span class="baslik">Resim3 Resim</span></td>
              <td bgcolor="#F9F9F9"><input name="resim3" type="file"  class="textbox1" id="resim3"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td width="185"><span class="baslik"> Resim4 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad4'])) {$ad4=$_SESSION[$tablo_ismi.'n_ad4']; }  ?>
                  <input name="ad4" type="text" id="ad4"  value="<? if (isset($ad4)) { print($ad4); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();">              </td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim4 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket4'])) { $htaccess_etiket4=$_SESSION[$tablo_ismi.'htaccess_etiket4']; } ?>
            <input name="htaccess_etiket4" type="text" class="textbox1" id="htaccess_etiket4"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket4)) {echo $htaccess_etiket4; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim4 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan4'])) {$puan4=$_SESSION[$tablo_ismi.'n_puan4']; } ?>
                  <input name="puan4" type="text" id="puan4" value="<? if (isset($puan4)) { print($puan4); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >              </td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Resim4 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat4'])) {$fiyat4=$_SESSION[$tablo_ismi.'n_fiyat4']; } ?>
                  <input name="fiyat4" type="text" id="fiyat4" value="<? if (isset($fiyat4)) { print($fiyat4); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
            <tr>
              <td width="185"><span class="baslik">Resim4 Resim</span></td>
              <td bgcolor="#F9F9F9"><input name="resim4" type="file"  class="textbox1" id="resim4"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td width="185"><span class="baslik"> Resim5 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad5'])) {$ad5=$_SESSION[$tablo_ismi.'n_ad5']; }  ?>
                  <input name="ad5" type="text" id="ad5"  value="<? if (isset($ad5)) { print($ad5); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();">              </td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim5 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket5'])) { $htaccess_etiket5=$_SESSION[$tablo_ismi.'htaccess_etiket5']; } ?>
            <input name="htaccess_etiket5" type="text" class="textbox1" id="htaccess_etiket5"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket5)) {echo $htaccess_etiket5; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim5 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan5'])) {$puan5=$_SESSION[$tablo_ismi.'n_puan5']; } ?>
                  <input name="puan5" type="text" id="puan5" value="<? if (isset($puan5)) { print($puan5); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >              </td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Resim5 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat5'])) {$fiyat5=$_SESSION[$tablo_ismi.'n_fiyat5']; } ?>
              <input name="fiyat5" type="text" id="fiyat5" value="<? if (isset($fiyat5)) { print($fiyat5); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
              <span class="veri_baslik">TL</span>              </td>
            </tr>
            <tr>
              <td width="185"><span class="baslik">Resim5 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim5" type="file"  class="textbox1" id="resim5"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td width="185"><span class="baslik"> Resim6 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad6'])) {$ad6=$_SESSION[$tablo_ismi.'n_ad6']; }  ?>
                  <input name="ad6" type="text" id="ad6"  value="<? if (isset($ad6)) { print($ad6); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();">              </td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim6 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket6'])) { $htaccess_etiket6=$_SESSION[$tablo_ismi.'htaccess_etiket6']; } ?>
            <input name="htaccess_etiket6" type="text" class="textbox1" id="htaccess_etiket6"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket6)) {echo $htaccess_etiket6; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim6 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan6'])) {$puan6=$_SESSION[$tablo_ismi.'n_puan6']; } ?>
                  <input name="puan6" type="text" id="puan6" value="<? if (isset($puan6)) { print($puan6); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >              </td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Resim6 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat6'])) {$fiyat6=$_SESSION[$tablo_ismi.'n_fiyat6']; } ?>
                  <input name="fiyat6" type="text" id="fiyat6" value="<? if (isset($fiyat6)) { print($fiyat6); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
            <tr>
              <td width="185"><span class="baslik">Resim6 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim6" type="file"  class="textbox1" id="resim6"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td><span class="baslik"> Resim7 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad7'])) {$ad7=$_SESSION[$tablo_ismi.'n_ad7']; }  ?>
                  <input name="ad7" type="text" id="ad7"  value="<? if (isset($ad7)) { print($ad7); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();"></td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim7 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket7'])) { $htaccess_etiket7=$_SESSION[$tablo_ismi.'htaccess_etiket7']; } ?>
            <input name="htaccess_etiket7" type="text" class="textbox1" id="htaccess_etiket7"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket7)) {echo $htaccess_etiket7; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim7 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan7'])) {$puan7=$_SESSION[$tablo_ismi.'n_puan7']; } ?>
                  <input name="puan7" type="text" id="puan7" value="<? if (isset($puan7)) { print($puan7); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Resim7 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat7'])) {$fiyat7=$_SESSION[$tablo_ismi.'n_fiyat7']; } ?>
                  <input name="fiyat7" type="text" id="fiyat7" value="<? if (isset($fiyat7)) { print($fiyat7); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span></td>
            </tr>
            <tr>
              <td><span class="baslik">Resim7 Resim</span></td>
              <td bgcolor="#F9F9F9"><input name="resim7" type="file"  class="textbox1" id="resim7"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td><span class="baslik"> Resim8 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad8'])) {$ad8=$_SESSION[$tablo_ismi.'n_ad8']; }  ?>
                  <input name="ad8" type="text" id="ad8"  value="<? if (isset($ad8)) { print($ad8); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();">              </td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim8 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket8'])) { $htaccess_etiket8=$_SESSION[$tablo_ismi.'htaccess_etiket8']; } ?>
            <input name="htaccess_etiket8" type="text" class="textbox1" id="htaccess_etiket8"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket8)) {echo $htaccess_etiket8; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim8 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan8'])) {$puan8=$_SESSION[$tablo_ismi.'n_puan8']; } ?>
                  <input name="puan8" type="text" id="puan8" value="<? if (isset($puan8)) { print($puan8); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >              </td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Resim8 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat8'])) {$fiyat8=$_SESSION[$tablo_ismi.'n_fiyat8']; } ?>
                  <input name="fiyat8" type="text" id="fiyat8" value="<? if (isset($fiyat8)) { print($fiyat8); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim8 Resim</span></td>
              <td bgcolor="#F9F9F9"><input name="resim8" type="file"  class="textbox1" id="resim8"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td><span class="baslik">Resim9 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad9'])) {$ad9=$_SESSION[$tablo_ismi.'n_ad9']; }  ?>
                  <input name="ad9" type="text" id="ad9"  value="<? if (isset($ad9)) { print($ad9); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();">              </td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim9 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket9'])) { $htaccess_etiket9=$_SESSION[$tablo_ismi.'htaccess_etiket9']; } ?>
            <input name="htaccess_etiket9" type="text" class="textbox1" id="htaccess_etiket9"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket9)) {echo $htaccess_etiket9; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim9 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan9'])) {$puan9=$_SESSION[$tablo_ismi.'n_puan9']; } ?>
                  <input name="puan9" type="text" id="puan9" value="<? if (isset($puan9)) { print($puan9); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10">              </td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Resim9 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat9'])) {$fiyat9=$_SESSION[$tablo_ismi.'n_fiyat9']; } ?>
                  <input name="fiyat9" type="text" id="fiyat9" value="<? if (isset($fiyat9)) { print($fiyat9); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim9 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim9" type="file"  class="textbox1" id="resim9"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td><span class="baslik"> Resim10 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad10'])) {$ad10=$_SESSION[$tablo_ismi.'n_ad10']; }  ?>
                  <input name="ad10" type="text" id="ad10"  value="<? if (isset($ad10)) { print($ad10); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();">              </td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim10Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket10'])) { $htaccess_etiket10=$_SESSION[$tablo_ismi.'htaccess_etiket10']; } ?>
            <input name="htaccess_etiket10" type="text" class="textbox1" id="htaccess_etiket10"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket10)) {echo $htaccess_etiket10; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim10 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan10'])) {$puan10=$_SESSION[$tablo_ismi.'n_puan10']; } ?>
                  <input name="puan10" type="text" id="puan10" value="<? if (isset($puan10)) { print($puan10); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >              </td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Resim10 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat10'])) {$fiyat10=$_SESSION[$tablo_ismi.'n_fiyat10']; } ?>
                  <input name="fiyat10" type="text" id="fiyat10" value="<? if (isset($fiyat10)) { print($fiyat10); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim10 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim10" type="file"  class="textbox1" id="resim10"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td><span class="baslik"> Resim11 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad11'])) {$ad11=$_SESSION[$tablo_ismi.'n_ad11']; }  ?>
                  <input name="ad11" type="text" id="ad11"  value="<? if (isset($ad11)) { print($ad11); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();"></td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim11 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket11'])) { $htaccess_etiket11=$_SESSION[$tablo_ismi.'htaccess_etiket11']; } ?>
            <input name="htaccess_etiket11" type="text" class="textbox1" id="htaccess_etiket11"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket11)) {echo $htaccess_etiket11; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim11 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan11'])) {$puan11=$_SESSION[$tablo_ismi.'n_puan11']; } ?>
                  <input name="puan11" type="text" id="puan11" value="<? if (isset($puan11)) { print($puan11); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Resim11 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat11'])) {$fiyat11=$_SESSION[$tablo_ismi.'n_fiyat11']; } ?>
                  <input name="fiyat11" type="text" id="fiyat11" value="<? if (isset($fiyat11)) { print($fiyat11); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim11 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim11" type="file"  class="textbox1" id="resim11"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik"> Resim12 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad12'])) {$ad12=$_SESSION[$tablo_ismi.'n_ad12']; }  ?>
                  <input name="ad12" type="text" id="ad12"  value="<? if (isset($ad12)) { print($ad12); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();"></td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim12 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket12'])) { $htaccess_etiket12=$_SESSION[$tablo_ismi.'htaccess_etiket12']; } ?>
            <input name="htaccess_etiket12" type="text" class="textbox1" id="htaccess_etiket12"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket12)) {echo $htaccess_etiket12; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim12 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan12'])) {$puan12=$_SESSION[$tablo_ismi.'n_puan12']; } ?>
                  <input name="puan12" type="text" id="puan12" value="<? if (isset($puan12)) { print($puan12); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Resim12 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat12'])) {$fiyat12=$_SESSION[$tablo_ismi.'n_fiyat12']; } ?>
                  <input name="fiyat12" type="text" id="fiyat12" value="<? if (isset($fiyat12)) { print($fiyat12); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim12 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim12" type="file"  class="textbox1" id="resim12"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik"> Resim13 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad13'])) {$ad13=$_SESSION[$tablo_ismi.'n_ad13']; }  ?>
                  <input name="ad13" type="text" id="ad13"  value="<? if (isset($ad13)) { print($ad13); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();"></td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim13 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket13'])) { $htaccess_etiket13=$_SESSION[$tablo_ismi.'htaccess_etiket13']; } ?>
            <input name="htaccess_etiket13" type="text" class="textbox1" id="htaccess_etiket13"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket13)) {echo $htaccess_etiket13; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim13 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan13'])) {$puan13=$_SESSION[$tablo_ismi.'n_puan13']; } ?>
                  <input name="puan13" type="text" id="puan13" value="<? if (isset($puan13)) { print($puan13); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Resim13 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat13'])) {$fiyat13=$_SESSION[$tablo_ismi.'n_fiyat13']; } ?>
                  <input name="fiyat13" type="text" id="fiyat13" value="<? if (isset($fiyat13)) { print($fiyat13); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim13 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim13" type="file"  class="textbox1" id="resim13"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
              <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik">Resim14 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad14'])) {$ad14=$_SESSION[$tablo_ismi.'n_ad14']; }  ?>
                  <input name="ad14" type="text" id="ad14"  value="<? if (isset($ad14)) { print($ad14); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();"></td>
            </tr>
            <tr>
              <td class="baslik">Resim14 Htaccess Etiket *</td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket14'])) { $htaccess_etiket14=$_SESSION[$tablo_ismi.'htaccess_etiket14']; } ?>
                  <input name="htaccess_etiket14" type="text" class="textbox1" id="htaccess_etiket14"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket14)) {echo $htaccess_etiket14; }?>" size="55">              </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim14 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan14'])) {$puan14=$_SESSION[$tablo_ismi.'n_puan14']; } ?>
                  <input name="puan14" type="text" id="puan14" value="<? if (isset($puan14)) { print($puan14); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Resim14 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat14'])) {$fiyat14=$_SESSION[$tablo_ismi.'n_fiyat14']; } ?>
                  <input name="fiyat14" type="text" id="fiyat14" value="<? if (isset($fiyat14)) { print($fiyat14); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim14 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim14" type="file"  class="textbox1" id="resim14"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik"> Resim15 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad15'])) {$ad15=$_SESSION[$tablo_ismi.'n_ad15']; }  ?>
                  <input name="ad15" type="text" id="ad15"  value="<? if (isset($ad15)) { print($ad15); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();"></td>
            </tr>
            <tr>
              <td class="baslik">Resim15 Htaccess Etiket *</td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket15'])) { $htaccess_etiket15=$_SESSION[$tablo_ismi.'htaccess_etiket15']; } ?>
                  <input name="htaccess_etiket15" type="text" class="textbox1" id="htaccess_etiket15"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket15)) {echo $htaccess_etiket15; }?>" size="55">              </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim15 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan15'])) {$puan15=$_SESSION[$tablo_ismi.'n_puan15']; } ?>
                  <input name="puan15" type="text" id="puan15" value="<? if (isset($puan15)) { print($puan15); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Resim15 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat15'])) {$fiyat15=$_SESSION[$tablo_ismi.'n_fiyat15']; } ?>
                  <input name="fiyat15" type="text" id="fiyat15" value="<? if (isset($fiyat15)) { print($fiyat15); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim15 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim15" type="file"  class="textbox1" id="resim15"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik"> Resim16 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad16'])) {$ad16=$_SESSION[$tablo_ismi.'n_ad16']; }  ?>
                  <input name="ad16" type="text" id="ad16"  value="<? if (isset($ad16)) { print($ad16); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();"></td>
            </tr>
            <tr>
              <td class="baslik">Resim16 Htaccess Etiket *</td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket16'])) { $htaccess_etiket16=$_SESSION[$tablo_ismi.'htaccess_etiket16']; } ?>
                  <input name="htaccess_etiket16" type="text" class="textbox1" id="htaccess_etiket16"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket16)) {echo $htaccess_etiket16; }?>" size="55">              </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim16 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan16'])) {$puan16=$_SESSION[$tablo_ismi.'n_puan16']; } ?>
                  <input name="puan16" type="text" id="puan16" value="<? if (isset($puan16)) { print($puan16); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Resim16 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat16'])) {$fiyat16=$_SESSION[$tablo_ismi.'n_fiyat16']; } ?>
                  <input name="fiyat16" type="text" id="fiyat16" value="<? if (isset($fiyat16)) { print($fiyat16); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim16 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim16" type="file"  class="textbox1" id="resim16"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik">Resim17 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad17'])) {$ad17=$_SESSION[$tablo_ismi.'n_ad17']; }  ?>
                  <input name="ad17" type="text" id="ad17"  value="<? if (isset($ad17)) { print($ad17); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();"></td>
            </tr>
            <tr>
              <td class="baslik">Resim17 Htaccess Etiket *</td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket17'])) { $htaccess_etiket17=$_SESSION[$tablo_ismi.'htaccess_etiket17']; } ?>
                  <input name="htaccess_etiket17" type="text" class="textbox1" id="htaccess_etiket17"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket17)) {echo $htaccess_etiket17; }?>" size="55">              </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim17 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan17'])) {$puan17=$_SESSION[$tablo_ismi.'n_puan17']; } ?>
                  <input name="puan17" type="text" id="puan17" value="<? if (isset($puan17)) { print($puan17); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Resim17 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat17'])) {$fiyat17=$_SESSION[$tablo_ismi.'n_fiyat17']; } ?>
                  <input name="fiyat17" type="text" id="fiyat17" value="<? if (isset($fiyat17)) { print($fiyat17); }?>" class="textbox1" onFocus="pchange(this, 1);" onBlur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span></td>
            </tr>
            <tr>
              <td><span class="baslik">Resim17 Resim</span></td>
              <td bgcolor="#F9F9F9"><input name="resim17" type="file"  class="textbox1" id="resim17"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih">Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik"> Resim18 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad18'])) {$ad18=$_SESSION[$tablo_ismi.'n_ad18']; }  ?>
                  <input name="ad18" type="text" id="ad18"  value="<? if (isset($ad18)) { print($ad18); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();"></td>
            </tr>
            <tr>
              <td class="baslik">Resim18 Htaccess Etiket *</td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket18'])) { $htaccess_etiket18=$_SESSION[$tablo_ismi.'htaccess_etiket18']; } ?>
                  <input name="htaccess_etiket18" type="text" class="textbox1" id="htaccess_etiket18"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket18)) {echo $htaccess_etiket18; }?>" size="55">              </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim18 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan18'])) {$puan18=$_SESSION[$tablo_ismi.'n_puan18']; } ?>
                  <input name="puan18" type="text" id="puan18" value="<? if (isset($puan18)) { print($puan18); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Resim18 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat18'])) {$fiyat18=$_SESSION[$tablo_ismi.'n_fiyat18']; } ?>
                  <input name="fiyat18" type="text" id="fiyat18" value="<? if (isset($fiyat18)) { print($fiyat18); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim18 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim18" type="file"  class="textbox1" id="resim18"  onFocus="pchange(this, 1);" onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik"> Resim19 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad19'])) {$ad19=$_SESSION[$tablo_ismi.'n_ad19']; }  ?>
                  <input name="ad19" type="text" id="ad19"  value="<? if (isset($ad19)) { print($ad19); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();"></td>
            </tr>
<tr>
              <td class="baslik">Resim19 Htaccess Etiket *</td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket19'])) { $htaccess_etiket19=$_SESSION[$tablo_ismi.'htaccess_etiket19']; } ?>
                  <input name="htaccess_etiket19" type="text" class="textbox1" id="htaccess_etiket19"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket19)) {echo $htaccess_etiket19; }?>" size="55">              </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim19 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan19'])) {$puan19=$_SESSION[$tablo_ismi.'n_puan19']; } ?>
                  <input name="puan19" type="text" id="puan19" value="<? if (isset($puan19)) { print($puan19); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Resim19 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat19'])) {$fiyat19=$_SESSION[$tablo_ismi.'n_fiyat19']; } ?>
                  <input name="fiyat19" type="text" id="fiyat19" value="<? if (isset($fiyat19)) { print($fiyat19); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span></td>
            </tr>
            <tr>
              <td><span class="baslik">Resim19 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim19" type="file"  class="textbox1" id="resim19"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik"> Resim20 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad20'])) {$ad20=$_SESSION[$tablo_ismi.'n_ad20']; }  ?>
                  <input name="ad20" type="text" id="ad20"  value="<? if (isset($ad20)) { print($ad20); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();">              </td>
            </tr>
<tr>
              <td class="baslik">Resim20 Htaccess Etiket *</td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket20'])) { $htaccess_etiket20=$_SESSION[$tablo_ismi.'htaccess_etiket20']; } ?>
                  <input name="htaccess_etiket20" type="text" class="textbox1" id="htaccess_etiket20"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket20)) {echo $htaccess_etiket20; }?>" size="55">
              </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim20 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan20'])) {$puan20=$_SESSION[$tablo_ismi.'n_puan20']; } ?>
                  <input name="puan20" type="text" id="puan20" value="<? if (isset($puan20)) { print($puan20); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10">              </td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Resim20 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat20'])) {$fiyat20=$_SESSION[$tablo_ismi.'n_fiyat20']; } ?>
                  <input name="fiyat20" type="text" id="fiyat20" value="<? if (isset($fiyat20)) { print($fiyat20); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim20 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim20" type="file"  class="textbox1" id="resim20"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih">Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr> 
              <td></td>
              <td><input name="kaydet" type="button" class="dugmeler_ekle" value="Kaydet"  onClick="kontrol()"><input name="Submit2" type="button" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()"></td>
            </tr>
            <tr> 
              <td colspan="2">
              <table width="924" border="0" align="center" cellpadding="2" cellspacing="4">
                  <tr> 
                    <td width="719" valign="middle"></td>
                    <td width="185" valign="middle"><font class="veri_tarih">Max. Dosya Boyutu: <strong> <? print $max_file_size ?> kb </strong></font></td>
                  </tr>
              </table>              </td>
            </tr>
          </table>
      </div>
      </td>
    </form>
  </tr>
</table>
</body>
</html>
<script> function kontrol() { document.form1.submit(); }
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
		
		yol_deger=document.form1.ad1.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
		document.form1.htaccess_etiket1.value=yol_deger; 


		yol_deger=document.form1.ad2.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
		document.form1.htaccess_etiket2.value=yol_deger;
		
		yol_deger=document.form1.ad3.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
		document.form1.htaccess_etiket3.value=yol_deger;
		
		
		yol_deger=document.form1.ad4.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
		document.form1.htaccess_etiket4.value=yol_deger;
		
		
		yol_deger=document.form1.ad5.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
		document.form1.htaccess_etiket5.value=yol_deger;
		
		
		yol_deger=document.form1.ad6.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
		document.form1.htaccess_etiket6.value=yol_deger;
		
		
		yol_deger=document.form1.ad7.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
		document.form1.htaccess_etiket7.value=yol_deger;
		
		
		yol_deger=document.form1.ad8.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
		document.form1.htaccess_etiket8.value=yol_deger;
		
		
		yol_deger=document.form1.ad9.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
		document.form1.htaccess_etiket9.value=yol_deger;
		
		
		yol_deger=document.form1.ad10.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
		document.form1.htaccess_etiket10.value=yol_deger;
		
		yol_deger=document.form1.ad11.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
		document.form1.htaccess_etiket11.value=yol_deger;
		
		
		yol_deger=document.form1.ad12.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
		document.form1.htaccess_etiket12.value=yol_deger;
		
		
		yol_deger=document.form1.ad13.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
		document.form1.htaccess_etiket13.value=yol_deger;
		
		yol_deger=document.form1.ad14.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
		document.form1.htaccess_etiket14.value=yol_deger;
		
		yol_deger=document.form1.ad15.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
		document.form1.htaccess_etiket15.value=yol_deger;
		
		
		yol_deger=document.form1.ad16.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
		document.form1.htaccess_etiket16.value=yol_deger;
		
		
		yol_deger=document.form1.ad17.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
		document.form1.htaccess_etiket17.value=yol_deger;
		
		
		yol_deger=document.form1.ad18.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
		document.form1.htaccess_etiket18.value=yol_deger;
		
		
		yol_deger=document.form1.ad19.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
		document.form1.htaccess_etiket19.value=yol_deger;
		
		
		yol_deger=document.form1.ad20.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
		document.form1.htaccess_etiket20.value=yol_deger;

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