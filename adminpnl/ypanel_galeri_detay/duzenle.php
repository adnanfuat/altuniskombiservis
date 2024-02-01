<? session_start();
$link_inherit='duzenle.php';
include("config.php");
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
	 	//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");
		//echo $_GET["err"];
		$ustkategori_no=$_SESSION['ust_kategori_no'];
		$altkategori_no=$_SESSION['alt_kategori'];
		$max_file_size=substr($max_file_size,0,-3);
		$ustkategori_adi_ogren=@$baglanti->query("Select ad from $ustkategori_tablo_adi where numara=$ustkategori_no")->fetchAll(PDO::FETCH_ASSOC);
		$ustkategori_adi=$ustkategori_adi_ogren[0]["ad"];
		$altkategori_adi_ogren=@$baglanti->query("Select ad from $altkategori_tablo_adi where numara=$altkategori_no")->fetchAll(PDO::FETCH_ASSOC);
		$altkategori_adi=$altkategori_adi_ogren[0]["ad"];
		include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
		include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");
	    if (isset($_GET['item']))
		   {
  				unset($_SESSION[$tablo_ismi.'numara']); 
				$numara=$_GET['item'];
				$_SESSION[$tablo_ismi.'numara']=$numara;						
		   }
		elseif (isset($_SESSION[$tablo_ismi.'numara']))
		   {
				$numara=$_SESSION[$tablo_ismi.'numara'];			
		   }
		$kayit_sec=@$baglanti->query("Select * from $tablo_ismi where numara='$numara'")->fetchAll(PDO::FETCH_ASSOC);
		if  (count($kayit_sec)<>0) 
			{ 
				$ad=stripslashes($kayit_sec[0]['ad']);		
				$puan=$kayit_sec[0]['puan'];		
				$aciklama=$kayit_sec[0]['aciklama'];
				//$teknikozellikler=$kayit_sec[0]['teknikozellikler']; //echo $teknikozellikler;
				//$link=$kayit_sec[0]['link'];	 //echo $link;					
				$resim=$kayit_sec[0]['resim_adres'];
				//$resim2=$kayit_sec[0]['resim_adres2'];
				//$resim3=$kayit_sec[0]['resim_adres3'];
				//$resim4=$kayit_sec[0]['resim_adres4'];
				$htaccess_etiket=$kayit_sec[0]['htaccess_etiket'];		
			    if ($resim=='') {$resim='resimyok.gif'; }
				resim_yeniden_boyutlandir($resim_dizini,$resim,$kck_m_h,$kck_m_w);
				$model=$kayit_sec[0]["fiyat"];
				//$urun_kodu=$kayit_sec[0]['urun_kodu'];
				//$uzunluk=$kayit_sec[0]["uzunluk"];
				$yukseklik=$kayit_sec[0]["yukseklik"];
				$genislik=$kayit_sec[0]["genislik"];
				$agirlik=$kayit_sec[0]["agirlik"];
				$guc=$kayit_sec[0]["guc"];
				$toplama_kapasitesi=$kayit_sec[0]["toplama_kapasitesi"];
				$gereken_hp=$kayit_sec[0]["gereken_hp"];
				$toplama_hortumu=$kayit_sec[0]["toplama_hortumu"];
				$toz_hortumu=$kayit_sec[0]["toz_hortumu"];
				$saft_mili=$kayit_sec[0]["saft_mili"];
				$vakum_uzakligi=$kayit_sec[0]["vakum_uzakligi"];
			}	
		else 
			{
				header('Location:kontrol.php');
			}
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
<script language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></script>
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
<body class="animsition" onLoad="document.form1.ad.focus();">
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
                                                <a href="<? echo $panel_uzaklik; ?>anaframe2.php">Kontrol Paneli</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item"><a href="../ypanel_galeri_kategori/kontrol.php" class="veri_ana_baslik">Galeri Kategorileri (<? print $ustkategori_adi; ?>)</a> &gt; 
	<a href="../ypanel_galeri_altkategori/kontrol.php"  >Galeri Alt Kategorileri (<? print($altkategori_adi);?>)</a> &gt; 
	<a href="kontrol.php" >Resimler</a> &gt;</font></li>
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
                        
                        
                            

                                    <table  class="table" border="0" bgcolor="#FFFFFF">
  <tr> 
    <form name="form1" method="post" action="duzenle_islem.php" enctype="multipart/form-data">
      <td  valign="top"> 
        
          <table border="0" align="center" cellpadding="4" cellspacing="6" style="max-width:923px">
            <tr>
              <td colspan="2" class="anabaslik">Resim Düzenle</td>
            </tr>
            <tr> 
              <td  class="baslik">&nbsp;</td>
              <td >
              <font class="hata1"> 
			        <? 
                if (isset($_GET["don"])&& $_GET["don"]=="resimboyut"){ $mesaj="Resim: Uygunsuz Format ya da Büyük Dosya Boyutu";  print($mesaj);}											 
                if (isset($_GET["don"])&& $_GET["don"]=="eksik_veri"){ $mesaj="Lütfen gerekli alanları doldurunuz"; print($mesaj);}	
                if (isset($_GET["err"])&& $_GET["err"]=="etiket"){ $mesaj="Bu İsimde Bir Etiket Daha Önce Eklendi, Lütfen Başka Bir İsim Seçin"; print($mesaj);}											 
                
             ?>
              </font>
			  <input name="gizli" type="hidden" value="<? print($numara); ?>">              </td>
            </tr>
            <tr> 
              <td class="baslik">Resim  Adı * </td>
              <td bgcolor="#F9F9F9">
			  <? if (isset($_SESSION[$tablo_ismi.'ad'])) {$ad=$_SESSION[$tablo_ismi.'ad'];   } ?>			  
              <input name="ad" type="text" class="form-control" id="ad"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? print($ad); ?>" size="55" onKeyUp="yoltanimla();">
              <font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">  
				<? if (isset($_SESSION[$tablo_ismi.'hata'])) 
                      {
                        $hata=$_SESSION[$tablo_ismi.'hata'];	
                        if (isset($hata[1]) && $hata[1]==1 ) { echo 'Ürün Adını Giriniz';}
                     }	
                ?>
              </font></td>
            </tr>
            <tr> 
            <td class="baslik">Htaccess *</td>
            <td bgcolor="#F9F9F9" colspan="2">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket'])) { $htaccess_etiket=$_SESSION[$tablo_ismi.'htaccess_etiket']; } ?>			  
           <input name="htaccess_etiket" type="text" id="htaccess_etiket"  value="<? echo $htaccess_etiket ?>"  class="form-control" size="55" onBlur="pchange(this, 0);" onFocus="pchange(this, 1);"></td>
          </tr>
          
          
          
            <tr> 
              <td><span class="baslik">Puan</span></td>
              <td bgcolor="#F9F9F9">
			  <? if (isset($_SESSION[$tablo_ismi.'puan'])) {$puan=$_SESSION[$tablo_ismi.'puan']; } ?>             
			  <input name="puan" type="text" id="puan" value="<? print($puan); ?>" class="form-control" onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10">
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">  
                <? if (isset($_SESSION[$tablo_ismi.'hata'])) 
                    {
                        $hata=$_SESSION[$tablo_ismi.'hata']; if (isset($hata[4]) && $hata[4]==1 ) { echo ' Puanını Giriniz';}
                    }
                ?>
                </font>             </td>
            </tr>
            
            <? /* <tr> 
                <td >İç Sıralama Puanı</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'guc'])) { $guc=$_SESSION[$tablo_ismi.'guc']; } ?>
                  <input name="guc" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($guc)) { echo $guc; }?>" size="55">                </td>
            </tr>
            
          */ ?>  <tr>
              <td valign="middle" class="baslik">Açıklama </td>
              <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'aciklama'])) {$aciklama=$_SESSION[$tablo_ismi.'aciklama']; } ?>
	              <textarea name="aciklama" id="editor" class="<? /* mceAdvanced */ ?>form-control"><? echo $aciklama; ?></textarea>
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
				<? if (isset($_SESSION[$tablo_ismi.'hata'])) 
                    {
                        $hata=$_SESSION[$tablo_ismi.'hata']; if (isset($hata[6]) && $hata[6]==1 ) { echo ' Açıklamasını Giriniz';}
                    }
                ?>
              </font>              </td>
            </tr> 
            
           
            
            
            
           <? if (1==2) { ?>  
             
            <tr> 
                <td >Barkod Numarası</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'fiyat'])) { $model=$_SESSION[$tablo_ismi.'fiyat']; } ?>
                  <input name="fiyat" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($model)) {echo $model; }?>" size="55">                </td>
              </tr>
              


            <tr> 
                <td > Koli İçi Adet</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'yukseklik'])) { $yukseklik=$_SESSION[$tablo_ismi.'yukseklik']; } ?>
                  <input name="yukseklik" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($yukseklik)) {echo $yukseklik; }?>" size="55">                </td>
            </tr>
           
            <tr> 
                <td > Koli Ölçüleri</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'genislik'])) { $genislik=$_SESSION[$tablo_ismi.'genislik']; } ?>
                  <input name="genislik" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($genislik)) {echo $genislik; }?>" size="55">                </td>
           </tr>
           
            <tr> 
                <td > Koli Ağırlığı</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'agirlik'])) { $agirlik=$_SESSION[$tablo_ismi.'agirlik']; } ?>
                  <input name="agirlik" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($agirlik)) { echo $agirlik; }?>" size="55">                </td>
            </tr>
            <tr> 
                <td >Toplama Kapasitesi</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'toplama_kapasitesi'])) { $toplama_kapasitesi=$_SESSION[$tablo_ismi.'toplama_kapasitesi']; } ?>
                  <input name="toplama_kapasitesi" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($toplama_kapasitesi)) { echo $toplama_kapasitesi; }?>" >                </td>
            </tr>
            
            <tr> 
                <td >Gereken HP</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'gereken_hp'])) { $gereken_hp=$_SESSION[$tablo_ismi.'gereken_hp']; } ?>
                  <input name="gereken_hp" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($gereken_hp)) { echo $gereken_hp; }?>" >                </td>
            </tr>
            
            <tr> 
                <td >Toplama Hortumu</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'toplama_hortumu'])) { $toplama_hortumu=$_SESSION[$tablo_ismi.'toplama_hortumu']; } ?>
                  <input name="toplama_hortumu" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($toplama_hortumu)) { echo $toplama_hortumu; }?>" >                </td>
            </tr>
            
            <tr> 
                <td >Toz Hortumu</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'toz_hortumu'])) { $toz_hortumu=$_SESSION[$tablo_ismi.'toz_hortumu']; } ?>
                  <input name="toz_hortumu" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($toz_hortumu)) { echo $toz_hortumu; }?>" >                </td>
            </tr>
            
            <tr> 
                <td >Şaft Mili</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'saft_mili'])) { $saft_mili=$_SESSION[$tablo_ismi.'saft_mili']; } ?>
                  <input name="saft_mili" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($saft_mili)) { echo $saft_mili; }?>" >                </td>
            </tr>
            
            <tr> 
                <td >Vakum Uzaklığı</td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'vakum_uzakligi'])) { $vakum_uzakligi=$_SESSION[$tablo_ismi.'vakum_uzakligi']; } ?>
                  <input name="vakum_uzakligi" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($vakum_uzakligi)) { echo $vakum_uzakligi; } ?>" >                </td>
              </tr>
              
            
            
          <tr> 
              <td><span class="baslik">Depolama ve Ambalaj Bilgileri</span></td>
              <td bgcolor="#F9F9F9">
			  <? if (isset($_SESSION[$tablo_ismi.'link'])) {$link=$_SESSION[$tablo_ismi.'link']; } ?>             
			  <? /* <input name="link" type="text" id="link" value="<? print($link); ?>" class="form-control" onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="55"> */ ?>
              <textarea name="link" cols="80" rows="25" class="mceAdvanced"><? echo $link; ?></textarea>             </td>
            </tr>
           <? } ?>  
            
            
      <? /*      <tr>
              <td class="baslik">Fiyat</td>
              <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'fiyat'])) {$fiyat=$_SESSION[$tablo_ismi.'fiyat']; } ?>
                <input name="fiyat" type="text" id="fiyat" value="<? print($fiyat); ?>"  class="form-control" onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="15"> 
                <span class="veri_baslik">TL</span>                </td>
            </tr> 
            
            
            <tr>
              <td valign="middle" class="baslik">Teknik Değerler</td>
              <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'teknikozellikler'])) {$teknikozellikler=$_SESSION[$tablo_ismi.'teknikozellikler']; } ?>
	              <textarea name="teknikozellikler" cols="80" rows="25" class="mceAdvanced"><? echo $teknikozellikler; ?></textarea>

              </td>
            </tr>
            
          
            <tr>
              <td class="baslik">Küçük Ön Resim </td>
              <td bgcolor="#F9F9F9"><a href="<? print($thumb_resim_dizini.$resim2); ?>" target="_blank"><img src="<? print($thumb_resim_dizini.$resim2); ?>" alt="" width="100" border="0" ></a>               </td>
            </tr>
            <tr>
              <td class="baslik"></td>
              <td bgcolor="#F9F9F9"><input name="resim2" type="file"   class="form-control" id="resim2"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <font class="veri_tarih" style="font-size:10px">Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve  katları</font> </td>
            </tr>
            */ ?>
              <tr>
              <td class="baslik">Resim </td>
              <td bgcolor="#F9F9F9">
              <a href="<? print($thumb_resim_dizini.$resim); ?>" target="_blank"><img src="<? print($thumb_resim_dizini.$resim); ?>" border="0" width="200" ></a>              </td>
            </tr>
            <tr>
              <td class="baslik"></td>
              <td bgcolor="#F9F9F9"><input name="resim" type="file"   class="form-control" id="resim"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                <font class="veri_tarih" style="font-size:10px">Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve  katları</font>              </td>
            </tr>
            

            <tr> 
              <td height="32" class="baslik">&nbsp;</td>
              <td>
              <input name="kaydet" type="button" id="kaydet2"  class="btn btn-success btn-sm" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" id="Submit22" class="btn btn-info btn-sm" value="Geri Dön" onClick="javascript:history.back()">            </td>
            </tr>
            <tr>
              <td height="32" class="baslik">&nbsp;</td>
              <td><font class="veri_tarih" style="font-size:10px">Max. Dosya Boyutu: <? print $max_file_size ?> kb </font></td>
            </tr>
         <? /*                
            <tr>
              <td class="baslik">Resim 2</td>
              <td bgcolor="#F9F9F9"><a href="<? print($thumb_resim_dizini.$resim3); ?>" target="_blank"><img src="<? print($thumb_resim_dizini.$resim3); ?>" alt="" width="200" border="0" ></a> </td>
            </tr>
            <tr>
              <td class="baslik"></td>
              <td bgcolor="#F9F9F9"><input name="resim3" type="file"   class="form-control" id="resim3"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <font class="veri_tarih" style="font-size:10px">Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve  katları</font> </td>
            </tr>
            <tr>
              <td class="baslik">Resim 3</td>
              <td bgcolor="#F9F9F9"><a href="<? print($thumb_resim_dizini.$resim4); ?>" target="_blank"><img src="<? print($thumb_resim_dizini.$resim4); ?>" alt="" width="200" border="0" ></a> </td>
            </tr>
            <tr>
              <td class="baslik"></td>
              <td bgcolor="#F9F9F9"><input name="resim4" type="file"   class="form-control" id="resim4"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                <font class="veri_tarih" style="font-size:10px">Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve  katları</font> </td>
            </tr><tr> 
              <td colspan="2">
              <table width="924" border="0" align="center" cellpadding="2" cellspacing="4">
                  <tr> 
                    <td width="719">&nbsp;</td>
                    <td  valign="middle">
					<div align="left"><font class="veri_tarih">Max. Dosya Boyutu: <strong> <? print $max_file_size ?> kb </font></div></td>
                  </tr>
              </table></td>
            </tr>  */ ?>
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
    
</body>
</html>
<!-- end document-->

<script> function kontrol()	{ document.form1.submit(); } 
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
		unset($_SESSION[$tablo_ismi.'ad']);
		unset($_SESSION[$tablo_ismi.'puan']);
		unset($_SESSION[$tablo_ismi.'aciklama']);
		unset($_SESSION[$tablo_ismi.'teknikozellikler']);
		unset($_SESSION[$tablo_ismi.'link']);
		unset($_SESSION[$tablo_ismi.'hata']);
		unset($_SESSION[$tablo_ismi.'fiyat']);
		unset($_SESSION[$tablo_ismi.'uzunluk']);
		unset($_SESSION[$tablo_ismi.'yukseklik']);
		unset($_SESSION[$tablo_ismi.'genislik']);
		unset($_SESSION[$tablo_ismi.'agirlik']);
		unset($_SESSION[$tablo_ismi.'guc']);
		unset($_SESSION[$tablo_ismi.'toplama_kapasitesi']);
		unset($_SESSION[$tablo_ismi.'gereken_hp']);
		unset($_SESSION[$tablo_ismi.'toplama_hortumu']);
		unset($_SESSION[$tablo_ismi.'toz_hortumu']);
		unset($_SESSION[$tablo_ismi.'saft_mili']);
		unset($_SESSION[$tablo_ismi.'vakum_uzakligi']);
   } 
else
   {
	  unset($_SESSION['yonet']);
	  include("error.php"); 
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>