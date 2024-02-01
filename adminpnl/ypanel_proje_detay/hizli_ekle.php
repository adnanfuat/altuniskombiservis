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





<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <!-- Title Page-->
    <title><? echo $title; ?></title>
	<? include ("../inc_kpanel_css.php");?>
	<? /* <style type="text/css">
    body {	background-color: #EFEFEF;	margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;}
    .style3 {	color: #132C6A;	font-weight: bold;}.style10 {color: #333333; font-weight: bold; font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; }
    </style>
    <link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
    <style type="text/css">.style5 {color: #D24400;	font-weight: bold;}</style>
    <script language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></script>
     */ ?>  
<script language=JavaScript1.2 src="<?   print $uzaklik; ?>_js/feedback.js"></script>
<!--<script language="javascript" type="text/javascript" src="<? //print $uzaklik; ?>/tiny_mce/tiny_mce.js"></script>
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
</script> -->




</head>
<body class="animsition" onLoad="javascript:document.form1.ad.focus()">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <? include ("../inc_kpanel_menusidebar.php");?>
        <!-- END MENU SIDEBAR-->
        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP--> <!-- BREADCRUMB-->
            <? include ("../inc_kpanel_header.php");?>
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <!--<span class="au-breadcrumb-span">You are here:</span> -->
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="<? echo $panel_uzaklik; ?>anaframe2.php">Kontrol Paneli</a>                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>                                            </li>
                                            <li class="list-inline-item"><a href="../ypanel_proje_kategori/kontrol.php"  >Proje Kategori(<? print $ustkategori_adi; ?>)</a> &gt;P<a href="../ypanel_proje_altkategori/kontrol.php"  >proje Alt Kategorileri (<? print($altkategori_adi);?>)</a> &gt; 
	<a href="kontrol.php" class="veri_ana_baslik">Projeler</a> &gt;</li>
                                      </ul>
                                    </div>
                                    <!--<button class="au-btn au-btn-icon au-btn--green">
                                        <i class="zmdi zmdi-plus"></i>add item</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END HEADER DESKTOP--><!-- END BREADCRUMB-->
            <!-- STATISTIC-->

            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row" style="background:#FFFFFF"> 
                        
                        
                            

                                    <table width="950" border="0" align="center" bgcolor="#FFFFFF" cellspacing="0">
  <tr> 
    <form name="form1" method="post" action="hizli_ekle_islem.php" enctype="multipart/form-data">
      <td  valign="top"> 
        <div align="center">
          <table   border="0" align="center" cellpadding="4" cellspacing="6" class="table">
            <tr>
              <td colspan="2" class="anabaslik">Hızlı Proje Ekle</td>
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
              <td width="185"><span class="baslik"> Resim1 Ad *</span> </td>
              <td bgcolor="#F9F9F9">
				<?  if (isset($_SESSION[$tablo_ismi.'n_ad1'])) {$ad1=$_SESSION[$tablo_ismi.'n_ad1']; }  ?>                
                <input name="ad1" type="text" id="ad1"  value="<? if (isset($ad1)) { print($ad1); }?>" class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);"  onKeyUp="yoltanimla();">                </td>
            </tr>
            <tr> 
            <td width="185" class="baslik">Resim1 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket1'])) { $htaccess_etiket1=$_SESSION[$tablo_ismi.'htaccess_etiket1']; } ?>
            <input name="htaccess_etiket1" type="text" class="form-control" id="htaccess_etiket1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket1)) {echo $htaccess_etiket1; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim1 Puan</span></td>
              <td bgcolor="#F9F9F9">
			  <? if (isset($_SESSION[$tablo_ismi.'n_puan1'])) {$puan1=$_SESSION[$tablo_ismi.'n_puan1']; } ?>
              <input name="puan1" type="text" id="puan1" value="<? if (isset($puan1)) { print($puan1); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >              </td>
            </tr>
         <? /*    <tr>
                <td valign="top"><span class="baslik">Resim1 Fiyat</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_fiyat1'])) {$fiyat1=$_SESSION[$tablo_ismi.'n_fiyat1']; } ?>
                <input name="fiyat1" type="text" id="fiyat1" value="<? if (isset($fiyat1)) { print($fiyat1); }?>"   class="form-control"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15"> 
                <span class="veri_baslik">TL</span>                </td>
            </tr>  */ ?>
            <tr> 
              <td width="185"><span class="baslik">Resim1 Resim </span></td>
              <td bgcolor="#F9F9F9">
              <input name="resim1" type="file"  class="form-control" id="resim1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
			  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span>              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td width="185"><span class="baslik"> Resim2 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad2'])) {$ad2=$_SESSION[$tablo_ismi.'n_ad2']; }  ?>
                  <input name="ad2" type="text" id="ad2"  value="<? if (isset($ad2)) { print($ad2); }?>" class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);"  onKeyUp="yoltanimla();">               </td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim2 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket2'])) { $htaccess_etiket2=$_SESSION[$tablo_ismi.'htaccess_etiket2']; } ?>
            <input name="htaccess_etiket2" type="text" class="form-control" id="htaccess_etiket2"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket2)) {echo $htaccess_etiket2; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim2 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan2'])) {$puan2=$_SESSION[$tablo_ismi.'n_puan2']; } ?>
              <input name="puan2" type="text" id="puan2" value="<? if (isset($puan2)) { print($puan2); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >             </td>
            </tr>
         <? /*    <tr>
              <td valign="top"><span class="baslik">Resim2 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat2'])) {$fiyat2=$_SESSION[$tablo_ismi.'n_fiyat2']; } ?>
                  <input name="fiyat2" type="text" id="fiyat2" value="<? if (isset($fiyat2)) { print($fiyat2); }?>"   class="form-control"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>   */ ?>
            <tr>
              <td width="185"><span class="baslik">Resim2 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim2" type="file"  class="form-control" id="resim2"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td width="185"><span class="baslik"> Resim3 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad3'])) {$ad3=$_SESSION[$tablo_ismi.'n_ad3']; }  ?>
                  <input name="ad3" type="text" id="ad3"  value="<? if (isset($ad3)) { print($ad3); }?>" class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();">             </td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim3 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket3'])) { $htaccess_etiket3=$_SESSION[$tablo_ismi.'htaccess_etiket3']; } ?>
            <input name="htaccess_etiket3" type="text" class="form-control" id="htaccess_etiket3"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket3)) {echo $htaccess_etiket3; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim3 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan3'])) {$puan3=$_SESSION[$tablo_ismi.'n_puan3']; } ?>
                  <input name="puan3" type="text" id="puan3" value="<? if (isset($puan3)) { print($puan3); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10">              </td>
            </tr> 
         <? /*    <tr>
              <td valign="top"><span class="baslik">Resim3 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat3'])) {$fiyat3=$_SESSION[$tablo_ismi.'n_fiyat3']; } ?>
              <input name="fiyat3" type="text" id="fiyat3" value="<? if (isset($fiyat3)) { print($fiyat3); }?>"   class="form-control"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
              <span class="veri_baslik">TL</span></td>
            </tr>   */ ?>
            <tr>
              <td width="185"><span class="baslik">Resim3 Resim</span></td>
              <td bgcolor="#F9F9F9"><input name="resim3" type="file"  class="form-control" id="resim3"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td width="185"><span class="baslik"> Resim4 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad4'])) {$ad4=$_SESSION[$tablo_ismi.'n_ad4']; }  ?>
                  <input name="ad4" type="text" id="ad4"  value="<? if (isset($ad4)) { print($ad4); }?>" class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();">              </td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim4 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket4'])) { $htaccess_etiket4=$_SESSION[$tablo_ismi.'htaccess_etiket4']; } ?>
            <input name="htaccess_etiket4" type="text" class="form-control" id="htaccess_etiket4"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket4)) {echo $htaccess_etiket4; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim4 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan4'])) {$puan4=$_SESSION[$tablo_ismi.'n_puan4']; } ?>
                  <input name="puan4" type="text" id="puan4" value="<? if (isset($puan4)) { print($puan4); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >              </td>
            </tr>
          <? /*   <tr>
              <td valign="top"><span class="baslik">Resim4 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat4'])) {$fiyat4=$_SESSION[$tablo_ismi.'n_fiyat4']; } ?>
                  <input name="fiyat4" type="text" id="fiyat4" value="<? if (isset($fiyat4)) { print($fiyat4); }?>"   class="form-control"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>  */ ?>
            <tr>
              <td width="185"><span class="baslik">Resim4 Resim</span></td>
              <td bgcolor="#F9F9F9"><input name="resim4" type="file"  class="form-control" id="resim4"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td width="185"><span class="baslik"> Resim5 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad5'])) {$ad5=$_SESSION[$tablo_ismi.'n_ad5']; }  ?>
                  <input name="ad5" type="text" id="ad5"  value="<? if (isset($ad5)) { print($ad5); }?>" class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();">              </td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim5 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket5'])) { $htaccess_etiket5=$_SESSION[$tablo_ismi.'htaccess_etiket5']; } ?>
            <input name="htaccess_etiket5" type="text" class="form-control" id="htaccess_etiket5"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket5)) {echo $htaccess_etiket5; }?>" size="55">              </td>

          </tr>
            <tr>
              <td><span class="baslik">Resim5 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan5'])) {$puan5=$_SESSION[$tablo_ismi.'n_puan5']; } ?>
                  <input name="puan5" type="text" id="puan5" value="<? if (isset($puan5)) { print($puan5); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >              </td>
            </tr>
         <? /*    <tr>
              <td valign="top"><span class="baslik">Resim5 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat5'])) {$fiyat5=$_SESSION[$tablo_ismi.'n_fiyat5']; } ?>
              <input name="fiyat5" type="text" id="fiyat5" value="<? if (isset($fiyat5)) { print($fiyat5); }?>"   class="form-control"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
              <span class="veri_baslik">TL</span>              </td>
            </tr>  */ ?>
            <tr>
              <td width="185"><span class="baslik">Resim5 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim5" type="file"  class="form-control" id="resim5"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td width="185"><span class="baslik"> Resim6 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad6'])) {$ad6=$_SESSION[$tablo_ismi.'n_ad6']; }  ?>
                  <input name="ad6" type="text" id="ad6"  value="<? if (isset($ad6)) { print($ad6); }?>" class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();">              </td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim6 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket6'])) { $htaccess_etiket6=$_SESSION[$tablo_ismi.'htaccess_etiket6']; } ?>
            <input name="htaccess_etiket6" type="text" class="form-control" id="htaccess_etiket6"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket6)) {echo $htaccess_etiket6; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim6 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan6'])) {$puan6=$_SESSION[$tablo_ismi.'n_puan6']; } ?>
                  <input name="puan6" type="text" id="puan6" value="<? if (isset($puan6)) { print($puan6); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >              </td>
            </tr>
          <? /*   <tr>
              <td valign="top"><span class="baslik">Resim6 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat6'])) {$fiyat6=$_SESSION[$tablo_ismi.'n_fiyat6']; } ?>
                  <input name="fiyat6" type="text" id="fiyat6" value="<? if (isset($fiyat6)) { print($fiyat6); }?>"   class="form-control"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>  */ ?>
            <tr>
              <td width="185"><span class="baslik">Resim6 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim6" type="file"  class="form-control" id="resim6"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td><span class="baslik"> Resim7 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad7'])) {$ad7=$_SESSION[$tablo_ismi.'n_ad7']; }  ?>
                  <input name="ad7" type="text" id="ad7"  value="<? if (isset($ad7)) { print($ad7); }?>" class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();"></td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim7 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket7'])) { $htaccess_etiket7=$_SESSION[$tablo_ismi.'htaccess_etiket7']; } ?>
            <input name="htaccess_etiket7" type="text" class="form-control" id="htaccess_etiket7"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket7)) {echo $htaccess_etiket7; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim7 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan7'])) {$puan7=$_SESSION[$tablo_ismi.'n_puan7']; } ?>
                  <input name="puan7" type="text" id="puan7" value="<? if (isset($puan7)) { print($puan7); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
         <? /*    <tr>
              <td valign="top"><span class="baslik">Resim7 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat7'])) {$fiyat7=$_SESSION[$tablo_ismi.'n_fiyat7']; } ?>
                  <input name="fiyat7" type="text" id="fiyat7" value="<? if (isset($fiyat7)) { print($fiyat7); }?>"   class="form-control"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span></td>
            </tr> */ ?>
            <tr>
              <td><span class="baslik">Resim7 Resim</span></td>
              <td bgcolor="#F9F9F9"><input name="resim7" type="file"  class="form-control" id="resim7"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td><span class="baslik"> Resim8 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad8'])) {$ad8=$_SESSION[$tablo_ismi.'n_ad8']; }  ?>
                  <input name="ad8" type="text" id="ad8"  value="<? if (isset($ad8)) { print($ad8); }?>" class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();">              </td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim8 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket8'])) { $htaccess_etiket8=$_SESSION[$tablo_ismi.'htaccess_etiket8']; } ?>
            <input name="htaccess_etiket8" type="text" class="form-control" id="htaccess_etiket8"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket8)) {echo $htaccess_etiket8; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim8 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan8'])) {$puan8=$_SESSION[$tablo_ismi.'n_puan8']; } ?>
                  <input name="puan8" type="text" id="puan8" value="<? if (isset($puan8)) { print($puan8); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >              </td>
            </tr>
        <? /*     <tr>
              <td valign="top"><span class="baslik">Resim8 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat8'])) {$fiyat8=$_SESSION[$tablo_ismi.'n_fiyat8']; } ?>
                  <input name="fiyat8" type="text" id="fiyat8" value="<? if (isset($fiyat8)) { print($fiyat8); }?>"   class="form-control"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>  */ ?>
            <tr>
              <td><span class="baslik">Resim8 Resim</span></td>
              <td bgcolor="#F9F9F9"><input name="resim8" type="file"  class="form-control" id="resim8"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td><span class="baslik">Resim9 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad9'])) {$ad9=$_SESSION[$tablo_ismi.'n_ad9']; }  ?>
                  <input name="ad9" type="text" id="ad9"  value="<? if (isset($ad9)) { print($ad9); }?>" class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();">              </td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim9 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket9'])) { $htaccess_etiket9=$_SESSION[$tablo_ismi.'htaccess_etiket9']; } ?>
            <input name="htaccess_etiket9" type="text" class="form-control" id="htaccess_etiket9"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket9)) {echo $htaccess_etiket9; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim9 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan9'])) {$puan9=$_SESSION[$tablo_ismi.'n_puan9']; } ?>
                  <input name="puan9" type="text" id="puan9" value="<? if (isset($puan9)) { print($puan9); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10">              </td>
            </tr>
         <? /*    <tr>
              <td valign="top"><span class="baslik">Resim9 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat9'])) {$fiyat9=$_SESSION[$tablo_ismi.'n_fiyat9']; } ?>
                  <input name="fiyat9" type="text" id="fiyat9" value="<? if (isset($fiyat9)) { print($fiyat9); }?>"   class="form-control"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr> */ ?>
            <tr>
              <td><span class="baslik">Resim9 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim9" type="file"  class="form-control" id="resim9"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td><span class="baslik"> Resim10 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad10'])) {$ad10=$_SESSION[$tablo_ismi.'n_ad10']; }  ?>
                  <input name="ad10" type="text" id="ad10"  value="<? if (isset($ad10)) { print($ad10); }?>" class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();">              </td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim10Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket10'])) { $htaccess_etiket10=$_SESSION[$tablo_ismi.'htaccess_etiket10']; } ?>
            <input name="htaccess_etiket10" type="text" class="form-control" id="htaccess_etiket10"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket10)) {echo $htaccess_etiket10; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim10 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan10'])) {$puan10=$_SESSION[$tablo_ismi.'n_puan10']; } ?>
                  <input name="puan10" type="text" id="puan10" value="<? if (isset($puan10)) { print($puan10); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >              </td>
            </tr>
       <? /*      <tr>
              <td valign="top"><span class="baslik">Resim10 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat10'])) {$fiyat10=$_SESSION[$tablo_ismi.'n_fiyat10']; } ?>
                  <input name="fiyat10" type="text" id="fiyat10" value="<? if (isset($fiyat10)) { print($fiyat10); }?>"   class="form-control"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>  */ ?>
            <tr>
              <td><span class="baslik">Resim10 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim10" type="file"  class="form-control" id="resim10"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            <tr>
              <td><span class="baslik"> Resim11 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad11'])) {$ad11=$_SESSION[$tablo_ismi.'n_ad11']; }  ?>
                  <input name="ad11" type="text" id="ad11"  value="<? if (isset($ad11)) { print($ad11); }?>" class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();"></td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim11 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket11'])) { $htaccess_etiket11=$_SESSION[$tablo_ismi.'htaccess_etiket11']; } ?>
            <input name="htaccess_etiket11" type="text" class="form-control" id="htaccess_etiket11"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket11)) {echo $htaccess_etiket11; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim11 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan11'])) {$puan11=$_SESSION[$tablo_ismi.'n_puan11']; } ?>
                  <input name="puan11" type="text" id="puan11" value="<? if (isset($puan11)) { print($puan11); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
        <? /*     <tr>
              <td valign="top"><span class="baslik">Resim11 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat11'])) {$fiyat11=$_SESSION[$tablo_ismi.'n_fiyat11']; } ?>
                  <input name="fiyat11" type="text" id="fiyat11" value="<? if (isset($fiyat11)) { print($fiyat11); }?>"   class="form-control"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr>  */ ?>
            <tr>
              <td><span class="baslik">Resim11 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim11" type="file"  class="form-control" id="resim11"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik"> Resim12 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad12'])) {$ad12=$_SESSION[$tablo_ismi.'n_ad12']; }  ?>
                  <input name="ad12" type="text" id="ad12"  value="<? if (isset($ad12)) { print($ad12); }?>" class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();"></td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim12 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket12'])) { $htaccess_etiket12=$_SESSION[$tablo_ismi.'htaccess_etiket12']; } ?>
            <input name="htaccess_etiket12" type="text" class="form-control" id="htaccess_etiket12"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket12)) {echo $htaccess_etiket12; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim12 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan12'])) {$puan12=$_SESSION[$tablo_ismi.'n_puan12']; } ?>
                  <input name="puan12" type="text" id="puan12" value="<? if (isset($puan12)) { print($puan12); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
         <? /*    <tr>
              <td valign="top"><span class="baslik">Resim12 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat12'])) {$fiyat12=$_SESSION[$tablo_ismi.'n_fiyat12']; } ?>
                  <input name="fiyat12" type="text" id="fiyat12" value="<? if (isset($fiyat12)) { print($fiyat12); }?>"   class="form-control"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr> */ ?>
            <tr>
              <td><span class="baslik">Resim12 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim12" type="file"  class="form-control" id="resim12"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik"> Resim13 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad13'])) {$ad13=$_SESSION[$tablo_ismi.'n_ad13']; }  ?>
                  <input name="ad13" type="text" id="ad13"  value="<? if (isset($ad13)) { print($ad13); }?>" class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();"></td>
            </tr>
<tr> 
            <td width="185" class="baslik">Resim13 Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket13'])) { $htaccess_etiket13=$_SESSION[$tablo_ismi.'htaccess_etiket13']; } ?>
            <input name="htaccess_etiket13" type="text" class="form-control" id="htaccess_etiket13"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket13)) {echo $htaccess_etiket13; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Resim13 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan13'])) {$puan13=$_SESSION[$tablo_ismi.'n_puan13']; } ?>
                  <input name="puan13" type="text" id="puan13" value="<? if (isset($puan13)) { print($puan13); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
           <? /*  <tr>
              <td valign="top"><span class="baslik">Resim13 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat13'])) {$fiyat13=$_SESSION[$tablo_ismi.'n_fiyat13']; } ?>
                  <input name="fiyat13" type="text" id="fiyat13" value="<? if (isset($fiyat13)) { print($fiyat13); }?>"   class="form-control"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr> */ ?>
            <tr>
              <td><span class="baslik">Resim13 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim13" type="file"  class="form-control" id="resim13"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
              <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik">Resim14 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad14'])) {$ad14=$_SESSION[$tablo_ismi.'n_ad14']; }  ?>
                  <input name="ad14" type="text" id="ad14"  value="<? if (isset($ad14)) { print($ad14); }?>" class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();"></td>
            </tr>
            <tr>
              <td class="baslik">Resim14 Htaccess Etiket *</td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket14'])) { $htaccess_etiket14=$_SESSION[$tablo_ismi.'htaccess_etiket14']; } ?>
                  <input name="htaccess_etiket14" type="text" class="form-control" id="htaccess_etiket14"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket14)) {echo $htaccess_etiket14; }?>" size="55">              </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim14 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan14'])) {$puan14=$_SESSION[$tablo_ismi.'n_puan14']; } ?>
                  <input name="puan14" type="text" id="puan14" value="<? if (isset($puan14)) { print($puan14); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
          <? /*   <tr>
              <td valign="top"><span class="baslik">Resim14 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat14'])) {$fiyat14=$_SESSION[$tablo_ismi.'n_fiyat14']; } ?>
                  <input name="fiyat14" type="text" id="fiyat14" value="<? if (isset($fiyat14)) { print($fiyat14); }?>"   class="form-control"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr> */ ?>
            <tr>
              <td><span class="baslik">Resim14 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim14" type="file"  class="form-control" id="resim14"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik"> Resim15 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad15'])) {$ad15=$_SESSION[$tablo_ismi.'n_ad15']; }  ?>
                  <input name="ad15" type="text" id="ad15"  value="<? if (isset($ad15)) { print($ad15); }?>" class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();"></td>
            </tr>
            <tr>
              <td class="baslik">Resim15 Htaccess Etiket *</td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket15'])) { $htaccess_etiket15=$_SESSION[$tablo_ismi.'htaccess_etiket15']; } ?>
                  <input name="htaccess_etiket15" type="text" class="form-control" id="htaccess_etiket15"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket15)) {echo $htaccess_etiket15; }?>" size="55">              </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim15 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan15'])) {$puan15=$_SESSION[$tablo_ismi.'n_puan15']; } ?>
                  <input name="puan15" type="text" id="puan15" value="<? if (isset($puan15)) { print($puan15); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
           <? /*  <tr>
              <td valign="top"><span class="baslik">Resim15 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat15'])) {$fiyat15=$_SESSION[$tablo_ismi.'n_fiyat15']; } ?>
                  <input name="fiyat15" type="text" id="fiyat15" value="<? if (isset($fiyat15)) { print($fiyat15); }?>"   class="form-control"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr> */ ?>
            <tr>
              <td><span class="baslik">Resim15 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim15" type="file"  class="form-control" id="resim15"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik"> Resim16 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad16'])) {$ad16=$_SESSION[$tablo_ismi.'n_ad16']; }  ?>
                  <input name="ad16" type="text" id="ad16"  value="<? if (isset($ad16)) { print($ad16); }?>" class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();"></td>
            </tr>
            <tr>
              <td class="baslik">Resim16 Htaccess Etiket *</td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket16'])) { $htaccess_etiket16=$_SESSION[$tablo_ismi.'htaccess_etiket16']; } ?>
                  <input name="htaccess_etiket16" type="text" class="form-control" id="htaccess_etiket16"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket16)) {echo $htaccess_etiket16; }?>" size="55">              </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim16 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan16'])) {$puan16=$_SESSION[$tablo_ismi.'n_puan16']; } ?>
                  <input name="puan16" type="text" id="puan16" value="<? if (isset($puan16)) { print($puan16); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
           <? /*  <tr>
              <td valign="top"><span class="baslik">Resim16 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat16'])) {$fiyat16=$_SESSION[$tablo_ismi.'n_fiyat16']; } ?>
                  <input name="fiyat16" type="text" id="fiyat16" value="<? if (isset($fiyat16)) { print($fiyat16); }?>"   class="form-control"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr> */ ?>
            <tr>
              <td><span class="baslik">Resim16 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim16" type="file"  class="form-control" id="resim16"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>

            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik">Resim17 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad17'])) {$ad17=$_SESSION[$tablo_ismi.'n_ad17']; }  ?>
                  <input name="ad17" type="text" id="ad17"  value="<? if (isset($ad17)) { print($ad17); }?>" class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();"></td>
            </tr>
            <tr>
              <td class="baslik">Resim17 Htaccess Etiket *</td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket17'])) { $htaccess_etiket17=$_SESSION[$tablo_ismi.'htaccess_etiket17']; } ?>
                  <input name="htaccess_etiket17" type="text" class="form-control" id="htaccess_etiket17"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket17)) {echo $htaccess_etiket17; }?>" size="55">              </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim17 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan17'])) {$puan17=$_SESSION[$tablo_ismi.'n_puan17']; } ?>
                  <input name="puan17" type="text" id="puan17" value="<? if (isset($puan17)) { print($puan17); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
         <? /*    <tr>
              <td valign="top"><span class="baslik">Resim17 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat17'])) {$fiyat17=$_SESSION[$tablo_ismi.'n_fiyat17']; } ?>
                  <input name="fiyat17" type="text" id="fiyat17" value="<? if (isset($fiyat17)) { print($fiyat17); }?>" class="form-control" onFocus="pchange(this, 1);" onBlur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span></td>
            </tr> */ ?>
            <tr>
              <td><span class="baslik">Resim17 Resim</span></td>
              <td bgcolor="#F9F9F9"><input name="resim17" type="file"  class="form-control" id="resim17"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih">Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik"> Resim18 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad18'])) {$ad18=$_SESSION[$tablo_ismi.'n_ad18']; }  ?>
                  <input name="ad18" type="text" id="ad18"  value="<? if (isset($ad18)) { print($ad18); }?>" class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();"></td>
            </tr>
            <tr>
              <td class="baslik">Resim18 Htaccess Etiket *</td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket18'])) { $htaccess_etiket18=$_SESSION[$tablo_ismi.'htaccess_etiket18']; } ?>
                  <input name="htaccess_etiket18" type="text" class="form-control" id="htaccess_etiket18"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket18)) {echo $htaccess_etiket18; }?>" size="55">              </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim18 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan18'])) {$puan18=$_SESSION[$tablo_ismi.'n_puan18']; } ?>
                  <input name="puan18" type="text" id="puan18" value="<? if (isset($puan18)) { print($puan18); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
          <? /*   <tr>
              <td valign="top"><span class="baslik">Resim18 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat18'])) {$fiyat18=$_SESSION[$tablo_ismi.'n_fiyat18']; } ?>
                  <input name="fiyat18" type="text" id="fiyat18" value="<? if (isset($fiyat18)) { print($fiyat18); }?>"   class="form-control"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr> */ ?>
            <tr>
              <td><span class="baslik">Resim18 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim18" type="file"  class="form-control" id="resim18"  onFocus="pchange(this, 1);" onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik"> Resim19 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad19'])) {$ad19=$_SESSION[$tablo_ismi.'n_ad19']; }  ?>
                  <input name="ad19" type="text" id="ad19"  value="<? if (isset($ad19)) { print($ad19); }?>" class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();"></td>
            </tr>
<tr>
              <td class="baslik">Resim19 Htaccess Etiket *</td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket19'])) { $htaccess_etiket19=$_SESSION[$tablo_ismi.'htaccess_etiket19']; } ?>
                  <input name="htaccess_etiket19" type="text" class="form-control" id="htaccess_etiket19"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket19)) {echo $htaccess_etiket19; }?>" size="55">              </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim19 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan19'])) {$puan19=$_SESSION[$tablo_ismi.'n_puan19']; } ?>
                  <input name="puan19" type="text" id="puan19" value="<? if (isset($puan19)) { print($puan19); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10"></td>
            </tr>
         <? /*   <tr>
              <td valign="top"><span class="baslik">Resim19 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat19'])) {$fiyat19=$_SESSION[$tablo_ismi.'n_fiyat19']; } ?>
                  <input name="fiyat19" type="text" id="fiyat19" value="<? if (isset($fiyat19)) { print($fiyat19); }?>"   class="form-control"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span></td>
            </tr> */ ?>
            <tr>
              <td><span class="baslik">Resim19 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim19" type="file"  class="form-control" id="resim19"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td bgcolor="#F9F9F9">&nbsp;</td>
            </tr>
            
            <tr>
              <td><span class="baslik"> Resim20 Ad *</span> </td>
              <td bgcolor="#F9F9F9"><?  if (isset($_SESSION[$tablo_ismi.'n_ad20'])) {$ad20=$_SESSION[$tablo_ismi.'n_ad20']; }  ?>
                  <input name="ad20" type="text" id="ad20"  value="<? if (isset($ad20)) { print($ad20); }?>" class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();">              </td>
            </tr>
<tr>
              <td class="baslik">Resim20 Htaccess Etiket *</td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket20'])) { $htaccess_etiket20=$_SESSION[$tablo_ismi.'htaccess_etiket20']; } ?>
                  <input name="htaccess_etiket20" type="text" class="form-control" id="htaccess_etiket20"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket20)) {echo $htaccess_etiket20; }?>" size="55">
              </td>
            </tr>
            <tr>
              <td><span class="baslik">Resim20 Puan</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan20'])) {$puan20=$_SESSION[$tablo_ismi.'n_puan20']; } ?>
                  <input name="puan20" type="text" id="puan20" value="<? if (isset($puan20)) { print($puan20); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10">              </td>
            </tr>
          <? /*   <tr>
              <td valign="top"><span class="baslik">Resim20 Fiyat</span></td>
              <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_fiyat20'])) {$fiyat20=$_SESSION[$tablo_ismi.'n_fiyat20']; } ?>
                  <input name="fiyat20" type="text" id="fiyat20" value="<? if (isset($fiyat20)) { print($fiyat20); }?>"   class="form-control"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15">
                  <span class="veri_baslik">TL</span> </td>
            </tr> */ ?>
            <tr>
              <td><span class="baslik">Resim20 Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim20" type="file"  class="form-control" id="resim20"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
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
              <td><input name="kaydet" type="button" class="btn btn-success btn-sm" value="Kaydet"  onClick="kontrol()">&nbsp;
              <input name="Submit2" type="button" class="btn btn-info btn-sm" value="Geri Dön" onClick="javascript:history.back()"></td>
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
                                    
                          
                             
                             
                      </div>
                    </div>
                </div>
            </section>



            
          
          
            
            
            <!-- END STATISTIC-->
			<? /* 
            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-8">
                                <!-- RECENT REPORT 2-->
                                <div class="recent-report2">
                                    <h3 class="title-3">recent reports</h3>
                                    <div class="chart-info">
                                        <div class="chart-info__left">
                                            <div class="chart-note">
                                                <span class="dot dot--blue"></span>
                                                <span>products</span>
                                            </div>
                                            <div class="chart-note">
                                                <span class="dot dot--green"></span>
                                                <span>Services</span>
                                            </div>
                                        </div>
                                        <div class="chart-info-right">
                                            <div class="rs-select2--dark rs-select2--md m-r-10">
                                                <select class="js-select2" name="property">
                                                    <option selected="selected">All Properties</option>
                                                    <option value="">Products</option>
                                                    <option value="">Services</option>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                            <div class="rs-select2--dark rs-select2--sm">
                                                <select class="js-select2 au-select-dark" name="time">
                                                    <option selected="selected">All Time</option>
                                                    <option value="">By Month</option>
                                                    <option value="">By Day</option>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recent-report__chart">
                                        <canvas id="recent-rep2-chart"></canvas>
                                    </div>
                                </div>
                                <!-- END RECENT REPORT 2             -->
                            </div>
                            <div class="col-xl-4">
                                <!-- TASK PROGRESS-->
                                <div class="task-progress">
                                    <h3 class="title-3">task progress</h3>
                                    <div class="au-skill-container">
                                        <div class="au-progress">
                                            <span class="au-progress__title">Web Design</span>
                                            <div class="au-progress__bar">
                                                <div class="au-progress__inner js-progressbar-simple" role="progressbar" data-transitiongoal="90">
                                                    <span class="au-progress__value js-value"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-progress">
                                            <span class="au-progress__title">HTML5/CSS3</span>
                                            <div class="au-progress__bar">
                                                <div class="au-progress__inner js-progressbar-simple" role="progressbar" data-transitiongoal="85">
                                                    <span class="au-progress__value js-value"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-progress">
                                            <span class="au-progress__title">WordPress</span>
                                            <div class="au-progress__bar">
                                                <div class="au-progress__inner js-progressbar-simple" role="progressbar" data-transitiongoal="95">
                                                    <span class="au-progress__value js-value"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-progress">
                                            <span class="au-progress__title">Support</span>
                                            <div class="au-progress__bar">
                                                <div class="au-progress__inner js-progressbar-simple" role="progressbar" data-transitiongoal="95">
                                                    <span class="au-progress__value js-value"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END TASK PROGRESS-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-6">
                                <!-- USER DATA-->
                                <div class="user-data m-b-40">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-account-calendar"></i>user data</h3>
                                    <div class="filters m-b-45">
                                        <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Products</option>
                                                <option value="">Services</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="js-select2 au-select-dark" name="time">
                                                <option selected="selected">All Time</option>
                                                <option value="">By Month</option>
                                                <option value="">By Day</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>name</td>
                                                    <td>role</td>
                                                    <td>type</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>lori lynch</h6>
                                                            <span>
                                                                <a href="yeni_panel_assets/#">johndoe@gmail.com</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="role admin">admin</span>
                                                    </td>
                                                    <td>
                                                        <div class="rs-select2--trans rs-select2--sm">
                                                            <select class="js-select2" name="property">
                                                                <option selected="selected">Full Control</option>
                                                                <option value="">Post</option>
                                                                <option value="">Watch</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="more">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox" checked="checked">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>lori lynch</h6>
                                                            <span>
                                                                <a href="yeni_panel_assets/#">johndoe@gmail.com</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="role user">user</span>
                                                    </td>
                                                    <td>
                                                        <div class="rs-select2--trans rs-select2--sm">
                                                            <select class="js-select2" name="property">
                                                                <option value="">Full Control</option>
                                                                <option value="" selected="selected">Post</option>
                                                                <option value="">Watch</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="more">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>lori lynch</h6>
                                                            <span>
                                                                <a href="yeni_panel_assets/#">johndoe@gmail.com</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="role user">user</span>
                                                    </td>
                                                    <td>
                                                        <div class="rs-select2--trans rs-select2--sm">
                                                            <select class="js-select2" name="property">
                                                                <option value="">Full Control</option>
                                                                <option value="" selected="selected">Post</option>
                                                                <option value="">Watch</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="more">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>lori lynch</h6>
                                                            <span>
                                                                <a href="yeni_panel_assets/#">johndoe@gmail.com</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="role member">member</span>
                                                    </td>
                                                    <td>
                                                        <div class="rs-select2--trans rs-select2--sm">
                                                            <select class="js-select2" name="property">
                                                                <option selected="selected">Full Control</option>
                                                                <option value="">Post</option>
                                                                <option value="">Watch</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="more">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="user-data__footer">
                                        <button class="au-btn au-btn-load">load more</button>
                                    </div>
                                </div>
                                <!-- END USER DATA-->
                            </div>
                            <div class="col-xl-6">
                                <!-- MAP DATA-->
                                <div class="map-data m-b-40">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-map"></i>map data</h3>
                                    <div class="filters">
                                        <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Worldwide</option>
                                                <option value="">Products</option>
                                                <option value="">Services</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="js-select2 au-select-dark" name="time">
                                                <option selected="selected">All Time</option>
                                                <option value="">By Month</option>
                                                <option value="">By Day</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                    <div class="map-wrap m-t-45 m-b-80">
                                        <div id="vmap" style="height: 284px;"></div>
                                    </div>
                                    <div class="table-wrap">
                                        <div class="table-responsive table-style1">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>United States</td>
                                                        <td>$119,366.96</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Australia</td>
                                                        <td>$70,261.65</td>
                                                    </tr>
                                                    <tr>
                                                        <td>United Kingdom</td>
                                                        <td>$46,399.22</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="table-responsive table-style1">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>Germany</td>
                                                        <td>$20,366.96</td>
                                                    </tr>
                                                    <tr>
                                                        <td>France</td>
                                                        <td>$10,366.96</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Russian</td>
                                                        <td>$5,366.96</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- END MAP DATA-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
			*/ ?>
            <? include ("../inc_kpanel_footer.php");?>
            <!-- END PAGE CONTAINER-->
        </div>
    </div>
    
	<? include ("../inc_kpanel_js.php");?>
    
    
<script type="text/javascript">

/*var postForm = function() {
var content = $('textarea[name="content"]').html($('#editor').code());
}*/
</script>
    
</body>
</html>
<!-- end document-->




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