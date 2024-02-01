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
                                            <li class="list-inline-item"><a href="../ypanel_urun_kategori/kontrol.php"  >Ürün Kategori(<? print $ustkategori_adi; ?>)</a> &gt; 
	
	<a href="../ypanel_urun_altkategori/kontrol.php"  >Ürün Alt Kategorileri (<? print($altkategori_adi);?>)</a> &gt; 
	<a href="kontrol.php" class="veri_ana_baslik">Ürünler</a> &gt;</li>
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
                        
                        
                            

                                    <table   border="0" bgcolor="#FFFFFF" cellspacing="0" class="table">
  <tr> 
    <form name="form1" method="post" action="ekle_islem.php" enctype="multipart/form-data">
      <td  valign="top"> 
        
          <table  border="0" align="center" cellpadding="4" cellspacing="6" style="max-width:923px">
            <tr>
              <td colspan="2" class="anabaslik">Ürün Ekle</td>
            </tr>
            <tr> 
              <td>&nbsp;</td>
              <td >
              <font class="hata1"> 
			  <? 		
					if  (isset($_GET['err']))
					    {
							switch($_GET['err'])
							  {
								 case 'eksik_veri':print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!"); break;
								 case 'resimboyut':print("Büyük Dosya Boyutu ya da Desteklenmeyen Resim Formatı"); break;
								 case 'yanlis_tarih':print("Tarih Formatında Hata Tesbit Edildi."); break;
								 case 'uzanti':print("Hatalı Resim Formatı");	break;
								 case 'boyut':print("İzin Verilenden Büyük Dosya Boyutu"); break;
								 case 'etiket': print("Bu İsimde Bir Etiket Daha Önce Eklendi, Lütfen Başka Bir İsim Seçin"); break;
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
              <td  ><span class="baslik"> Ad *</span> </td>
              <td bgcolor="#F9F9F9">
				<?  if (isset($_SESSION[$tablo_ismi.'n_ad'])) {$ad=$_SESSION[$tablo_ismi.'n_ad']; }  ?>                
                <input name="ad" type="text" id="ad"  value="<? if (isset($ad)) { print(stripslashes($ad)); }?>" class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();">
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">              
                <? if (isset($_SESSION[$tablo_ismi.'n_hata'])) 
                        {
                            $hata=$_SESSION[$tablo_ismi.'n_hata'];	if (isset($hata[1]) && $hata[1]==1 ) { echo 'Ürün Adını Giriniz';}
                        }
                ?>
                </font>                </td>
            </tr>
            
            
            <tr> 
            <td  class="baslik">Htaccess  *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket'])) { $htaccess_etiket=$_SESSION[$tablo_ismi.'htaccess_etiket']; } ?>
            <input name="htaccess_etiket" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($htaccess_etiket)) {echo $htaccess_etiket; }?>" size="55">              </td>
          </tr>
          
          
          
                    
         	<tr> 
                <td  >Altbilgi</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_uzunluk'])) { $uzunluk=$_SESSION[$tablo_ismi.'n_uzunluk']; } ?>
                  <input name="uzunluk" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($uzunluk)) {echo $uzunluk; }?>" size="55">                </td>
           </tr>
          
            <tr>
              <td><span class="baslik">Puan</span></td>
              <td bgcolor="#F9F9F9">
			  <? if (isset($_SESSION[$tablo_ismi.'n_puan'])) {$puan=$_SESSION[$tablo_ismi.'n_puan']; } ?>
              <input name="puan" type="text" id="puan" value="<? if (isset($puan)) { print($puan); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >
              <font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
			  <? if (isset($_SESSION[$tablo_ismi.'n_hata'])) 
                    {
                          $hata=$_SESSION[$tablo_ismi.'n_hata'];	if (isset($hata[4]) && $hata[4]==1 ) { echo 'Ürün Puanını Giriniz';}
                    }
              ?>
              </font></td>
            </tr>
            
           
           <tr>
              <td class="baslik">Açıklama</td>
              <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_aciklama'])) {$aciklama=$_SESSION[$tablo_ismi.'n_aciklama']; } ?>
                <textarea name="aciklama"  id="editor"   rows="50" class=<? /* mceAdvanced */ ?>"form-control" ><? if (isset($aciklama)) { print stripslashes($aciklama); } ?></textarea>
              

              
              <font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
                <? if (isset($_SESSION[$tablo_ismi.'n_hata'])) 
					  {
							$hata=$_SESSION[$tablo_ismi.'n_hata'];
							if (isset($hata[6]) && $hata[6]==1 ) { echo 'Ürün Açıklamasını Giriniz';}
					  }
				?>
              </font>              </td>
            </tr>
           
           <tr> 
            <td >Dosya Link</td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_urun_kodu'])) { $urun_kodu=$_SESSION[$tablo_ismi.'n_urun_kodu']; } ?>
			  <input name="urun_kodu" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($urun_kodu)) {echo $urun_kodu; }?>"   size="55">            </td>
          </tr>
           
          <? if (1==2) { ?>    
            
             <tr> 
                <td >İç Sıralama Puanı</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_guc'])) { $guc=$_SESSION[$tablo_ismi.'n_guc']; } ?>
                  <input name="guc" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($guc)) { echo $guc; }?>" size="55">                </td>
            </tr>
            
            
             
            
           
           
           
           
            <tr> 
            <td  >Barkod Numarası</td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_fiyat'])) { $fiyat=$_SESSION[$tablo_ismi.'n_fiyat']; } ?>
              <input name="fiyat" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($fiyat)) {echo $fiyat; }?>"  size="55" ></td>
          </tr>


            <tr> 
                <td  > Koli İçi Adet</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_yukseklik'])) { $yukseklik=$_SESSION[$tablo_ismi.'n_yukseklik']; } ?>
                  <input name="yukseklik" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($yukseklik)) {echo $yukseklik; }?>" size="55">                </td>
            </tr>
           
            <tr> 
                <td  > Paket Ölçüleri</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_genislik'])) { $genislik=$_SESSION[$tablo_ismi.'n_genislik']; } ?>
                  <input name="genislik" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($genislik)) {echo $genislik; }?>" size="55">                </td>
           </tr>
           
            <tr> 
                <td > Koli Ağırlığı</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_agirlik'])) { $agirlik=$_SESSION[$tablo_ismi.'n_agirlik']; } ?>
                  <input name="agirlik" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($agirlik)) { echo $agirlik; }?>" size="55">                </td>
            </tr>
            
           
            
            <tr> 
                <td >Toplama Kapasitesi</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_toplama_kapasitesi'])) { $toplama_kapasitesi=$_SESSION[$tablo_ismi.'n_toplama_kapasitesi']; } ?>
                  <input name="toplama_kapasitesi" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($toplama_kapasitesi)) { echo $toplama_kapasitesi; }?>" >                </td>
            </tr>
            
            <tr> 
                <td >Gereken HP</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_gereken_hp'])) { $gereken_hp=$_SESSION[$tablo_ismi.'n_gereken_hp']; } ?>
                  <input name="gereken_hp" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($gereken_hp)) { echo $gereken_hp; }?>" >                </td>
            </tr>
            
            <tr> 
                <td >Toplama Hortumu</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_toplama_hortumu'])) { $toplama_hortumu=$_SESSION[$tablo_ismi.'n_toplama_hortumu']; } ?>
                  <input name="toplama_hortumu" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($toplama_hortumu)) { echo $toplama_hortumu; }?>" >                </td>
            </tr>
            
            <tr> 
                <td >Toz Hortumu</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_toz_hortumu'])) { $toz_hortumu=$_SESSION[$tablo_ismi.'n_toz_hortumu']; } ?>
                  <input name="toz_hortumu" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($toz_hortumu)) { echo $toz_hortumu; }?>" >                </td>
            </tr>
            
            <tr> 
                <td >Şaft Mili</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_saft_mili'])) { $saft_mili=$_SESSION[$tablo_ismi.'n_saft_mili']; } ?>
                  <input name="saft_mili" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($saft_mili)) { echo $saft_mili; }?>" >                </td>
            </tr>
            
               <tr> 
                <td >Vakum Uzaklığı</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_vakum_uzakligi'])) { $vakum_uzakligi=$_SESSION[$tablo_ismi.'n_vakum_uzakligi']; } ?>
                  <input name="vakum_uzakligi" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($vakum_uzakligi)) { echo $vakum_uzakligi; } ?>" >                </td>
              </tr>
            
            
                      
            
            
            
          
            
            
         <tr>
              <td><span class="baslik">Depolama ve Ambalaj Bilgileri</span></td>
              <td bgcolor="#F9F9F9">
			  <? if (isset($_SESSION[$tablo_ismi.'n_link'])) {$link=$_SESSION[$tablo_ismi.'n_link']; } ?>
             <? /* <input name="link" type="text" id="link" value="<? if (isset($link)) { print($link); }?>"  class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="55" > */ ?>
			<textarea name="link" cols="80" rows="25" class="mceAdvanced"><? if (isset($link)) { print $link; } ?></textarea>            </td>
            </tr> 
           <? } ?>
           
           
       <? /*     <tr>
                <td valign="top"><span class="baslik">Fiyat</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_fiyat'])) {$fiyat=$_SESSION[$tablo_ismi.'n_fiyat']; } ?>
                <input name="fiyat" type="text" id="fiyat" value="<? if (isset($fiyat)) { print($fiyat); }?>"   class="form-control"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15"> 
                <span class="veri_baslik">TL</span>
                </td>
            </tr>             
            
            <tr>
              <td class="baslik">Teknik Değerler</td>
              <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_teknikozellikler'])) {$teknikozellikler=$_SESSION[$tablo_ismi.'n_teknikozellikler']; } ?>
              <textarea name="teknikozellikler" cols="80" rows="25" class="mceAdvanced"><? if (isset($teknikozellikler)) { print $teknikozellikler; } ?></textarea>
              </td>
            </tr>

                        <tr>
              <td><span class="baslik">Küçük Ön Resim </span></td>
              <td bgcolor="#F9F9F9"><input name="resim2" type="file"  class="form-control" id="resim2"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="55">
                <span class="veri_tarih"  style="font-size:10px">Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>*/ ?>
            
            
            <tr> 
              <td ><span class="baslik">Resim </span></td>
              <td bgcolor="#F9F9F9">
              <input name="resim" type="file"  class="form-control" id="resim"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="55">
			  <span class="veri_tarih" style="font-size:10px"> Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span>              </td>
            </tr>

            <? /*
            
            <tr>
              <td><span class="baslik">Resim  2</span></td>
              <td bgcolor="#F9F9F9"><input name="resim3" type="file"  class="form-control" id="resim3"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="55">
                <span class="veri_tarih"  style="font-size:10px">  Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            
            <tr>
              <td><span class="baslik">Resim  3</span></td>
              <td bgcolor="#F9F9F9" ><input name="resim4" type="file"  class="form-control" id="resim4"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="55">
                <span class="veri_tarih"  style="font-size:10px"> Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            */ ?>
            
            <tr> 
              <td></td>
              <td><input name="kaydet" type="button" class="btn btn-success btn-sm" value="Kaydet"  onClick="kontrol()">
                <input name="Submit2" type="button" class="btn btn-info btn-sm" value="Geri Dön" onClick="javascript:history.back()"></td>
            </tr>
            <tr>
              <td></td>
              <td><font class="veri_tarih" style="font-size:10px">Max. Dosya Boyutu:  <? print $max_file_size ?> kb </font></td>
            </tr>
          <? /*   <tr> 
              <td colspan="2">
              <table width="924" border="0" align="center" cellpadding="2" cellspacing="4">
                  <tr> 
                    <td width="719" valign="middle"></td>
                    <td  valign="middle"><font class="veri_tarih">Max. Dosya Boyutu: <strong> <? print $max_file_size ?> kb </font></td>
                  </tr>
              </table>              </td>
            </tr> */ ?>
          </table>
      
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


<script src="<?   print $uzaklik; ?>ckeditor5/ckeditor.js"></script>
<!--<link type="text/css" href="<?  // print $uzaklik; ?>ckeditor5/sample/css/sample.css" rel="stylesheet" media="screen" /> -->
<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>

<script>
function kontrol() { document.form1.submit(); }
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
		  include("error.php"); 
	 }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>
