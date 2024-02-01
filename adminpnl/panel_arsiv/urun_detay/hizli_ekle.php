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
    <td width="97%" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt;	<a href="../proje_kategori/kontrol.php" class="veri_ana_baslik">Ürün Kategorileri (<? print($ustkategori_adi); ?>)</a> &gt; <a href="../proje_altkategori/kontrol.php" class="veri_ana_baslik">Ürün Alt Kategorileri (<? print($altkategori_adi);?>)</a> &gt; <a href="kontrol.php" class="veri_ana_baslik">Ürünler</a> &gt;</font>
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
              <td colspan="2" class="anabaslik">Hızlı Ürün Ekle</td>
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
								 case 'eksik_veri':print("Tüm Alanları Doğru Bir Şekilde Doldprojeuz!"); break;
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
              <td width="185"><span class="baslik"> Ürün1 Ad *</span> </td>
              <td bgcolor="#F9F9F9">
				<?  if (isset($_SESSION[$tablo_ismi.'n_ad1'])) {$ad1=$_SESSION[$tablo_ismi.'n_ad1']; }  ?>                
                <input name="ad1" type="text" id="ad1"  value="<? if (isset($ad1)) { print($ad1); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" >                </td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün1 Puan</span></td>
              <td bgcolor="#F9F9F9">
			  <? if (isset($_SESSION[$tablo_ismi.'n_puan1'])) {$puan1=$_SESSION[$tablo_ismi.'n_puan1']; } ?>
              <input name="puan1" type="text" id="puan1" value="<? if (isset($puan1)) { print($puan1); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >              </td>
            </tr>
            <tr>
                <td valign="top"><span class="baslik">Ürün1 Fiyat</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_fiyat1'])) {$fiyat1=$_SESSION[$tablo_ismi.'n_fiyat1']; } ?>
                <input name="fiyat1" type="text" id="fiyat1" value="<? if (isset($fiyat1)) { print($fiyat1); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15"> 
                <span class="veri_baslik">TL</span>                </td>
            </tr>
            
            <tr>
                <td valign="top"><span class="baslik">Ürün1 Link</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_link'])) {$link=$_SESSION[$tablo_ismi.'n_link']; } ?>
                <input name="link" type="text" id="link" value="<? if (isset($link)) { print($link); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="55"></td>
            </tr>
            <tr> 
              <td width="185"><span class="baslik">Ürün1 Resim </span></td>
              <td bgcolor="#F9F9F9">
              <input name="resim1" type="file"  class="textbox1" id="resim1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
			  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span>              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td width="185"><span class="baslik"> Ürün2 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad2'])) {$ad2=$_SESSION[$tablo_ismi.'n_ad2']; }  ?>
                  <input name="ad2" type="text" id="ad2"  value="<? if (isset($ad2)) { print($ad2); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" >               </td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün2 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan2'])) {$puan2=$_SESSION[$tablo_ismi.'n_puan2']; } ?>
              <input name="puan2" type="text" id="puan2" value="<? if (isset($puan2)) { print($puan2); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >             </td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Ürün2 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat2'])) {$fiyat2=$_SESSION[$tablo_ismi.'n_fiyat2']; } ?>
                  <input name="fiyat2" type="text" id="fiyat2" value="<? if (isset($fiyat2)) { print($fiyat2); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
            
            <tr>
                <td valign="top"><span class="baslik">Ürün2 Link</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_link2'])) {$link2=$_SESSION[$tablo_ismi.'n_link2']; } ?>
                <input name="link2" type="text" id="link2" value="<? if (isset($link2)) { print($link2); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="55"></td>
            </tr>
            <tr>
              <td width="185"><span class="baslik">Ürün2 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim2" type="file"  class="textbox1" id="resim2"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td width="185"><span class="baslik"> Ürün3 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad3'])) {$ad3=$_SESSION[$tablo_ismi.'n_ad3']; }  ?>
                  <input name="ad3" type="text" id="ad3"  value="<? if (isset($ad3)) { print($ad3); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" >             </td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün3 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan3'])) {$puan3=$_SESSION[$tablo_ismi.'n_puan3']; } ?>
                  <input name="puan3" type="text" id="puan3" value="<? if (isset($puan3)) { print($puan3); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10">              </td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Ürün3 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat3'])) {$fiyat3=$_SESSION[$tablo_ismi.'n_fiyat3']; } ?>
              <input name="fiyat3" type="text" id="fiyat3" value="<? if (isset($fiyat3)) { print($fiyat3); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
              <span class="veri_baslik">TL</span></td>
            </tr>
            
            <tr>
                <td valign="top"><span class="baslik">Ürün3 Link</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_link3'])) {$link3=$_SESSION[$tablo_ismi.'n_link3']; } ?>
                <input name="link3" type="text" id="link3" value="<? if (isset($link3)) { print($link3); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="55"></td>
            </tr>
            
            <tr>
              <td width="185"><span class="baslik">Ürün3 Resim</span></td>
              <td bgcolor="#F9F9F9"><input name="resim3" type="file"  class="textbox1" id="resim3"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            
            
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td width="185"><span class="baslik"> Ürün4 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad4'])) {$ad4=$_SESSION[$tablo_ismi.'n_ad4']; }  ?>
                  <input name="ad4" type="text" id="ad4"  value="<? if (isset($ad4)) { print($ad4); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);">              </td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün4 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan4'])) {$puan4=$_SESSION[$tablo_ismi.'n_puan4']; } ?>
                  <input name="puan4" type="text" id="puan4" value="<? if (isset($puan4)) { print($puan4); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >              </td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Ürün4 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat4'])) {$fiyat4=$_SESSION[$tablo_ismi.'n_fiyat4']; } ?>
                  <input name="fiyat4" type="text" id="fiyat4" value="<? if (isset($fiyat4)) { print($fiyat4); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
                        <tr>
                <td valign="top"><span class="baslik">Ürün4 Link</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_link4'])) {$link4=$_SESSION[$tablo_ismi.'n_link4']; } ?>
                <input name="link4" type="text" id="link4" value="<? if (isset($link4)) { print($link4); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="55"></td>
            </tr>
            
            <tr>
              <td width="185"><span class="baslik">Ürün4 Resim</span></td>
              <td bgcolor="#F9F9F9"><input name="resim4" type="file"  class="textbox1" id="resim4"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td width="185"><span class="baslik"> Ürün5 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad5'])) {$ad5=$_SESSION[$tablo_ismi.'n_ad5']; }  ?>
                  <input name="ad5" type="text" id="ad5"  value="<? if (isset($ad5)) { print($ad5); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" >              </td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün5 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan5'])) {$puan5=$_SESSION[$tablo_ismi.'n_puan5']; } ?>
                  <input name="puan5" type="text" id="puan5" value="<? if (isset($puan5)) { print($puan5); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >              </td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Ürün5 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat5'])) {$fiyat5=$_SESSION[$tablo_ismi.'n_fiyat5']; } ?>
              <input name="fiyat5" type="text" id="fiyat5" value="<? if (isset($fiyat5)) { print($fiyat5); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
              <span class="veri_baslik">TL</span>              </td>
            </tr>
            
                        <tr>
                <td valign="top"><span class="baslik">Ürün5 Link</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_link5'])) {$link5=$_SESSION[$tablo_ismi.'n_link5']; } ?>
                <input name="link5" type="text" id="link5" value="<? if (isset($link5)) { print($link5); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="55"></td>
            </tr>
            <tr>
              <td width="185"><span class="baslik">Ürün5 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim5" type="file"  class="textbox1" id="resim5"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td width="185"><span class="baslik"> Ürün6 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad6'])) {$ad6=$_SESSION[$tablo_ismi.'n_ad6']; }  ?>
                  <input name="ad6" type="text" id="ad6"  value="<? if (isset($ad6)) { print($ad6); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" >              </td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün6 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan6'])) {$puan6=$_SESSION[$tablo_ismi.'n_puan6']; } ?>
                  <input name="puan6" type="text" id="puan6" value="<? if (isset($puan6)) { print($puan6); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >              </td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Ürün6 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat6'])) {$fiyat6=$_SESSION[$tablo_ismi.'n_fiyat6']; } ?>
                  <input name="fiyat6" type="text" id="fiyat6" value="<? if (isset($fiyat6)) { print($fiyat6); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
            
                        <tr>
                <td valign="top"><span class="baslik">Ürün6 Link</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_link6'])) {$link6=$_SESSION[$tablo_ismi.'n_link6']; } ?>
                <input name="link6" type="text" id="link6" value="<? if (isset($link6)) { print($link6); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="55"></td>
            </tr>
            <tr>
              <td width="185"><span class="baslik">Ürün6 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim6" type="file"  class="textbox1" id="resim6"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td><span class="baslik"> Ürün7 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad7'])) {$ad7=$_SESSION[$tablo_ismi.'n_ad7']; }  ?>
                  <input name="ad7" type="text" id="ad7"  value="<? if (isset($ad7)) { print($ad7); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);"></td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün7 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan7'])) {$puan7=$_SESSION[$tablo_ismi.'n_puan7']; } ?>
                  <input name="puan7" type="text" id="puan7" value="<? if (isset($puan7)) { print($puan7); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Ürün7 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat7'])) {$fiyat7=$_SESSION[$tablo_ismi.'n_fiyat7']; } ?>
                  <input name="fiyat7" type="text" id="fiyat7" value="<? if (isset($fiyat7)) { print($fiyat7); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span></td>
            </tr>
                        <tr>
                <td valign="top"><span class="baslik">Ürün7 Link</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_link7'])) {$link7=$_SESSION[$tablo_ismi.'n_link7']; } ?>
                <input name="link7" type="text" id="link7" value="<? if (isset($link7)) { print($link7); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="55"></td>
            </tr>
            
            <tr>
              <td><span class="baslik">Ürün7 Resim</span></td>
              <td bgcolor="#F9F9F9"><input name="resim7" type="file"  class="textbox1" id="resim7"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td><span class="baslik"> Ürün8 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad8'])) {$ad8=$_SESSION[$tablo_ismi.'n_ad8']; }  ?>
                  <input name="ad8" type="text" id="ad8"  value="<? if (isset($ad8)) { print($ad8); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);">              </td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün8 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan8'])) {$puan8=$_SESSION[$tablo_ismi.'n_puan8']; } ?>
                  <input name="puan8" type="text" id="puan8" value="<? if (isset($puan8)) { print($puan8); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >              </td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Ürün8 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat8'])) {$fiyat8=$_SESSION[$tablo_ismi.'n_fiyat8']; } ?>
                  <input name="fiyat8" type="text" id="fiyat8" value="<? if (isset($fiyat8)) { print($fiyat8); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
            
	            <tr>
                <td valign="top"><span class="baslik">Ürün8 Link</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_link8'])) {$link8=$_SESSION[$tablo_ismi.'n_link8']; } ?>
                <input name="link8" type="text" id="link8" value="<? if (isset($link8)) { print($link8); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="55"></td>
            </tr>            
            <tr>
              <td><span class="baslik">Ürün8 Resim</span></td>
              <td bgcolor="#F9F9F9"><input name="resim8" type="file"  class="textbox1" id="resim8"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün9 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad9'])) {$ad9=$_SESSION[$tablo_ismi.'n_ad9']; }  ?>
                  <input name="ad9" type="text" id="ad9"  value="<? if (isset($ad9)) { print($ad9); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);">              </td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün9 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan9'])) {$puan9=$_SESSION[$tablo_ismi.'n_puan9']; } ?>
                  <input name="puan9" type="text" id="puan9" value="<? if (isset($puan9)) { print($puan9); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10">              </td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Ürün9 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat9'])) {$fiyat9=$_SESSION[$tablo_ismi.'n_fiyat9']; } ?>
                  <input name="fiyat9" type="text" id="fiyat9" value="<? if (isset($fiyat9)) { print($fiyat9); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
                        <tr>
                <td valign="top"><span class="baslik">Ürün9 Link</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_link9'])) {$link9=$_SESSION[$tablo_ismi.'n_link9']; } ?>
                <input name="link9" type="text" id="link9" value="<? if (isset($link9)) { print($link9); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="55"></td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün9 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim9" type="file"  class="textbox1" id="resim9"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td><span class="baslik"> Ürün10 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad10'])) {$ad10=$_SESSION[$tablo_ismi.'n_ad10']; }  ?>
                  <input name="ad10" type="text" id="ad10"  value="<? if (isset($ad10)) { print($ad10); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" >              </td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün10 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan10'])) {$puan10=$_SESSION[$tablo_ismi.'n_puan10']; } ?>
                  <input name="puan10" type="text" id="puan10" value="<? if (isset($puan10)) { print($puan10); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >              </td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Ürün10 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat10'])) {$fiyat10=$_SESSION[$tablo_ismi.'n_fiyat10']; } ?>
                  <input name="fiyat10" type="text" id="fiyat10" value="<? if (isset($fiyat10)) { print($fiyat10); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
                        <tr>
                <td valign="top"><span class="baslik">Ürün10 Link</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_link10'])) {$link10=$_SESSION[$tablo_ismi.'n_link10']; } ?>
                <input name="link10" type="text" id="link10" value="<? if (isset($link10)) { print($link10); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="55"></td>
            </tr>
            
            <tr>
              <td><span class="baslik">Ürün10 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim10" type="file"  class="textbox1" id="resim10"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td><span class="baslik"> Ürün11 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad11'])) {$ad11=$_SESSION[$tablo_ismi.'n_ad11']; }  ?>
                  <input name="ad11" type="text" id="ad11"  value="<? if (isset($ad11)) { print($ad11); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);"></td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün11 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan11'])) {$puan11=$_SESSION[$tablo_ismi.'n_puan11']; } ?>
                  <input name="puan11" type="text" id="puan11" value="<? if (isset($puan11)) { print($puan11); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Ürün11 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat11'])) {$fiyat11=$_SESSION[$tablo_ismi.'n_fiyat11']; } ?>
                  <input name="fiyat11" type="text" id="fiyat11" value="<? if (isset($fiyat11)) { print($fiyat11); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
                        <tr>
                <td valign="top"><span class="baslik">Ürün11 Link</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_link11'])) {$link11=$_SESSION[$tablo_ismi.'n_link11']; } ?>
                <input name="link11" type="text" id="link11" value="<? if (isset($link11)) { print($link11); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="55"></td>
            </tr>
            
            <tr>
              <td><span class="baslik">Ürün11 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim11" type="file"  class="textbox1" id="resim11"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik"> Ürün12 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad12'])) {$ad12=$_SESSION[$tablo_ismi.'n_ad12']; }  ?>
                  <input name="ad12" type="text" id="ad12"  value="<? if (isset($ad12)) { print($ad12); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);"></td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün12 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan12'])) {$puan12=$_SESSION[$tablo_ismi.'n_puan12']; } ?>
                  <input name="puan12" type="text" id="puan12" value="<? if (isset($puan12)) { print($puan12); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Ürün12 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat12'])) {$fiyat12=$_SESSION[$tablo_ismi.'n_fiyat12']; } ?>
                  <input name="fiyat12" type="text" id="fiyat12" value="<? if (isset($fiyat12)) { print($fiyat12); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
            
                        <tr>
                <td valign="top"><span class="baslik">Ürün12 Link</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_link12'])) {$link12=$_SESSION[$tablo_ismi.'n_link12']; } ?>
                <input name="link12" type="text" id="link12" value="<? if (isset($link12)) { print($link12); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="55"></td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün12 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim12" type="file"  class="textbox1" id="resim12"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik"> Ürün13 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad13'])) {$ad13=$_SESSION[$tablo_ismi.'n_ad13']; }  ?>
                  <input name="ad13" type="text" id="ad13"  value="<? if (isset($ad13)) { print($ad13); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);"></td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün13 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan13'])) {$puan13=$_SESSION[$tablo_ismi.'n_puan13']; } ?>
                  <input name="puan13" type="text" id="puan13" value="<? if (isset($puan13)) { print($puan13); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Ürün13 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat13'])) {$fiyat13=$_SESSION[$tablo_ismi.'n_fiyat13']; } ?>
                  <input name="fiyat13" type="text" id="fiyat13" value="<? if (isset($fiyat13)) { print($fiyat13); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
            
                        <tr>
                <td valign="top"><span class="baslik">Ürün13 Link</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_link13'])) {$link13=$_SESSION[$tablo_ismi.'n_link13']; } ?>
                <input name="link13" type="text" id="link13" value="<? if (isset($link13)) { print($link13); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="55"></td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün13 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim13" type="file"  class="textbox1" id="resim13"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
              <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik">Ürün14 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad14'])) {$ad14=$_SESSION[$tablo_ismi.'n_ad14']; }  ?>
                  <input name="ad14" type="text" id="ad14"  value="<? if (isset($ad14)) { print($ad14); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);"></td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün14 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan14'])) {$puan14=$_SESSION[$tablo_ismi.'n_puan14']; } ?>
                  <input name="puan14" type="text" id="puan14" value="<? if (isset($puan14)) { print($puan14); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Ürün14 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat14'])) {$fiyat14=$_SESSION[$tablo_ismi.'n_fiyat14']; } ?>
                  <input name="fiyat14" type="text" id="fiyat14" value="<? if (isset($fiyat14)) { print($fiyat14); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
                        <tr>
                <td valign="top"><span class="baslik">Ürün14 Link</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_link14'])) {$link14=$_SESSION[$tablo_ismi.'n_link14']; } ?>
                <input name="link14" type="text" id="link14" value="<? if (isset($link14)) { print($link14); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="55"></td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün14 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim14" type="file"  class="textbox1" id="resim14"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik"> Ürün15 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad15'])) {$ad15=$_SESSION[$tablo_ismi.'n_ad15']; }  ?>
                  <input name="ad15" type="text" id="ad15"  value="<? if (isset($ad15)) { print($ad15); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);"></td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün15 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan15'])) {$puan15=$_SESSION[$tablo_ismi.'n_puan15']; } ?>
                  <input name="puan15" type="text" id="puan15" value="<? if (isset($puan15)) { print($puan15); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Ürün15 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat15'])) {$fiyat15=$_SESSION[$tablo_ismi.'n_fiyat15']; } ?>
                  <input name="fiyat15" type="text" id="fiyat15" value="<? if (isset($fiyat15)) { print($fiyat15); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
                        <tr>
                <td valign="top"><span class="baslik">Ürün15 Link</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_link15'])) {$link15=$_SESSION[$tablo_ismi.'n_link15']; } ?>
                <input name="link15" type="text" id="link15" value="<? if (isset($link15)) { print($link15); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="55"></td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün15 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim15" type="file"  class="textbox1" id="resim15"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik"> Ürün16 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad16'])) {$ad16=$_SESSION[$tablo_ismi.'n_ad16']; }  ?>
                  <input name="ad16" type="text" id="ad16"  value="<? if (isset($ad16)) { print($ad16); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);"></td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün16 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan16'])) {$puan16=$_SESSION[$tablo_ismi.'n_puan16']; } ?>
                  <input name="puan16" type="text" id="puan16" value="<? if (isset($puan16)) { print($puan16); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
            
                        <tr>
                <td valign="top"><span class="baslik">Ürün16 Link</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_link16'])) {$link16=$_SESSION[$tablo_ismi.'n_link16']; } ?>
                <input name="link16" type="text" id="link16" value="<? if (isset($link16)) { print($link16); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="55"></td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Ürün16 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat16'])) {$fiyat16=$_SESSION[$tablo_ismi.'n_fiyat16']; } ?>
                  <input name="fiyat16" type="text" id="fiyat16" value="<? if (isset($fiyat16)) { print($fiyat16); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün16 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim16" type="file"  class="textbox1" id="resim16"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik">Ürün17 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad17'])) {$ad17=$_SESSION[$tablo_ismi.'n_ad17']; }  ?>
                  <input name="ad17" type="text" id="ad17"  value="<? if (isset($ad17)) { print($ad17); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);"></td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün17 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan17'])) {$puan17=$_SESSION[$tablo_ismi.'n_puan17']; } ?>
                  <input name="puan17" type="text" id="puan17" value="<? if (isset($puan17)) { print($puan17); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Ürün17 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat17'])) {$fiyat17=$_SESSION[$tablo_ismi.'n_fiyat17']; } ?>
                  <input name="fiyat17" type="text" id="fiyat17" value="<? if (isset($fiyat17)) { print($fiyat17); }?>" class="textbox1" onFocus="pchange(this, 1);" onBlur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span></td>
            </tr>
            
                        <tr>
                <td valign="top"><span class="baslik">Ürün17 Link</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_link17'])) {$link17=$_SESSION[$tablo_ismi.'n_link17']; } ?>
                <input name="link17" type="text" id="link17" value="<? if (isset($link17)) { print($link17); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="55"></td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün17 Resim</span></td>
              <td bgcolor="#F9F9F9"><input name="resim17" type="file"  class="textbox1" id="resim17"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih">Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik"> Ürün18 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad18'])) {$ad18=$_SESSION[$tablo_ismi.'n_ad18']; }  ?>
                  <input name="ad18" type="text" id="ad18"  value="<? if (isset($ad18)) { print($ad18); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);"></td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün18 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan18'])) {$puan18=$_SESSION[$tablo_ismi.'n_puan18']; } ?>
                  <input name="puan18" type="text" id="puan18" value="<? if (isset($puan18)) { print($puan18); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Ürün18 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat18'])) {$fiyat18=$_SESSION[$tablo_ismi.'n_fiyat18']; } ?>
                  <input name="fiyat18" type="text" id="fiyat18" value="<? if (isset($fiyat18)) { print($fiyat18); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
                        <tr>
                <td valign="top"><span class="baslik">Ürün18 Link</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_link18'])) {$link18=$_SESSION[$tablo_ismi.'n_link18']; } ?>
                <input name="link18" type="text" id="link18" value="<? if (isset($link18)) { print($link18); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="55"></td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün18 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim18" type="file"  class="textbox1" id="resim18"  onFocus="pchange(this, 1);" onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik"> Ürün19 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad19'])) {$ad19=$_SESSION[$tablo_ismi.'n_ad19']; }  ?>
                  <input name="ad19" type="text" id="ad19"  value="<? if (isset($ad19)) { print($ad19); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);"></td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün19 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan19'])) {$puan19=$_SESSION[$tablo_ismi.'n_puan19']; } ?>
                  <input name="puan19" type="text" id="puan19" value="<? if (isset($puan19)) { print($puan19); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Ürün19 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat19'])) {$fiyat19=$_SESSION[$tablo_ismi.'n_fiyat19']; } ?>
                  <input name="fiyat19" type="text" id="fiyat19" value="<? if (isset($fiyat19)) { print($fiyat19); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span></td>
            </tr>
                        <tr>
                <td valign="top"><span class="baslik">Ürün19 Link</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_link19'])) {$link19=$_SESSION[$tablo_ismi.'n_link19']; } ?>
                <input name="link19" type="text" id="link19" value="<? if (isset($link19)) { print($link19); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="55"></td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün19 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim19" type="file"  class="textbox1" id="resim19"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik"> Ürün20 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad20'])) {$ad20=$_SESSION[$tablo_ismi.'n_ad20']; }  ?>
                  <input name="ad20" type="text" id="ad20"  value="<? if (isset($ad20)) { print($ad20); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);">
              </td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün20 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan20'])) {$puan20=$_SESSION[$tablo_ismi.'n_puan20']; } ?>
                  <input name="puan20" type="text" id="puan20" value="<? if (isset($puan20)) { print($puan20); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10">
              </td>
            </tr>
            <tr>
              <td valign="top"><span class="baslik">Ürün20 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat20'])) {$fiyat20=$_SESSION[$tablo_ismi.'n_fiyat20']; } ?>
                  <input name="fiyat20" type="text" id="fiyat20" value="<? if (isset($fiyat20)) { print($fiyat20); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>
                        <tr>
                <td valign="top"><span class="baslik">Ürün20 Link</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_link20'])) {$link20=$_SESSION[$tablo_ismi.'n_link20']; } ?>
                <input name="link20" type="text" id="link20" value="<? if (isset($link20)) { print($link20); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="55"></td>
            </tr>
            <tr>
              <td><span class="baslik">Ürün20 Resim </span></td>
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
              </table>
              </td>
            </tr>
          </table>
      </div>
      </td>
    </form>
  </tr>
</table>
</body>
</html>
<script> function kontrol() { document.form1.submit(); }</script>
<?
     } 
  else 
	 {
		  unset($_SESSION['yonet']);
		  include("error.php"); 
	 }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>