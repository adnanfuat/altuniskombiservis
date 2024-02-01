<?
include_once("inc_permalink.php");
include("../inc_s/baglanti.php"); 
include("../inc_s/resim_yeniden_boyutlandir.php");
include("../inc_s/resim_yeniden_boyutlandir_motor.php");
$width_of_image=719; 
$height_of_image=540;
if  (isset($_GET['uht']))
	{
		$ustkategori_ht=$_GET['uht']; //echo $ustkategori_ht;
		$ustkategori_no_ogren=@$baglanti->query("Select numara from urun_kategori where aktif=1 and htaccess_etiket='$ustkategori_ht'")->fetchAll(PDO::FETCH_ASSOC);
		$uskategori_say=count($ustkategori_no_ogren);
		$ustkategori_no=$ustkategori_no_ogren[0]['numara']; //echo $ustkategori_no;
	}
if  (isset($_GET['ht']))
	{	
		$resim_ht=$_GET['ht'];
		//echo "proje ht:".$resim_ht." ";
		$resim_id_ogren=@$baglanti->query("Select numara from urun_detay where aktif=1 and htaccess_etiket='$resim_ht' and ustkategori_no='$ustkategori_no'")->fetchAll(PDO::FETCH_ASSOC);
		//echo "Select numara from proje_detay where aktif=1 and htaccess_etiket='$resim_ht'";
		$resim_id_say=count($resim_id_ogren);
		$id=$resim_id_ogren[0]['numara']; //echo $id;
	}	
$recordset=@$baglanti->query("select * from urun_detay where numara=$id and aktif=1 and ustkategori_no='$ustkategori_no' and htaccess_etiket='$resim_ht'")->fetchAll(PDO::FETCH_ASSOC);
//echo "select * from proje_detay where numara=$id and aktif=1 and ustkategori_no='$ustkategori_no' and htaccess_etiket='$resim_ht'";
$resim_sayi=count($recordset);
if ($resim_sayi>0)
   {
		$resim_id=$recordset[0]["numara"];
		
		$ustkategori_no=$recordset[0]["ustkategori_no"]; 
		$uk=$ustkategori_no; //echo $uk;
		$altkategori_no=$recordset[0]["altkategori_no"];
		$ak=$altkategori_no;
		
		$altkategoriad=@$baglanti->query("select * from urun_altkategori where numara='$ak'")->fetchAll(PDO::FETCH_ASSOC);
		$ak_kategori_ad=$altkategoriad[0]["ad"];
		
		$uk_recordset=@$baglanti->query("select * from urun_kategori where numara='$uk'")->fetchAll(PDO::FETCH_ASSOC);
		$uk_kategori_ad=$uk_recordset[0]["ad"];
		$uk_htaccess=$uk_recordset[0]["htaccess_etiket"]; //echo $uk_htaccess;
		$uk_kategori_aciklama=$uk_recordset[0]["aciklama"];
		
		$altkategorilimi=@$baglanti->query("Select altkategorilimi from urun_kategori where numara='$ustkategori_no'")->fetchAll(PDO::FETCH_ASSOC);
		$altkategorilimi=$altkategorilimi[0]["altkategorilimi"];
		
		$ad=stripcslashes($recordset[0]["ad"]); 
		$urun_kodu=stripcslashes($recordset[0]["urun_kodu"]); 
		$aciklama=$recordset[0]["aciklama"]; //echo $aciklama;
		
		$resim_adres=$recordset[0]["resim_adres"];
		$resim_adres3=$recordset[0]["resim_adres3"];
		$resim_adres4=$recordset[0]["resim_adres4"];
		
		$link=$recordset[0]["link"];
		
		
		$tarih=$recordset[0]["eklenme_tarihi"];
		if ($tarih>20041215) {$tarih=substr($tarih,6,2)."/".substr($tarih,4,2)."/".substr($tarih,0,4);}
		
		$sayfa_bg=$recordset[0]["arkaplan"];
		
		$kategorisi=stripcslashes($recordset[0]["kategorisi"]);
		$model=stripcslashes($recordset[0]["model"]);
		$hacim=stripcslashes($recordset[0]["hacim"]);
		$ongazbasinci=stripcslashes($recordset[0]["ongazbasinci"]);
		$baglantisi=stripcslashes($recordset[0]["baglantisi"]);
		$cap=stripcslashes($recordset[0]["cap"]);
		$yuksekligi=stripcslashes($recordset[0]["yuksekligi"]);
		
		$video=stripcslashes($recordset[0]["video"]);
		$teknikozellikler=$recordset[0]["teknikozellikler"];
		
		$agirlik=$recordset[0]["agirlik"];
		$genislik_1=$recordset[0]["genislik"];
		$yukseklik_1=$recordset[0]["yukseklik"];
		$uzunluk=$recordset[0]["uzunluk"];
		$fiyat=$recordset[0]["fiyat"];
		
		
?>
<? 
	$resim_dizini="../rsmlr/urundetay/"; 
	$resim_dizini_buyuk="../rsmlr/urundetay_buyuk/"; 
	if ($resim_adres=='' || !file_exists($resim_dizini.$resim_adres)) {$resim_adres='resimyok.jpg'; }
	//if ($resim_adres3=='' || !file_exists($resim_dizini.$resim_adres3)) {$resim_adres3='resimyok.jpg'; }
	//if ($resim_adres4=='' || !file_exists($resim_dizini.$resim_adres4)) {$resim_adres4='resimyok.jpg'; }

	resim_yeniden_boyutlandir($resim_dizini,$resim_adres,$height_of_image,$width_of_image);
	if (file_exists($resim_dizini_buyuk.$resim_adres) && $resim_dizini_buyuk.$resim_adres<>$resim_dizini_buyuk ) 
		{
			$ana_buyuk_resim_boyut=@getimagesize($resim_dizini_buyuk.$resim_adres);
			$height_of_image=$ana_buyuk_resim_boyut[1];
			$width_of_image=$ana_buyuk_resim_boyut[0]; 
		}
?>
<? 
		$ak_ve_uk_ht_ogren=@$baglanti->query("Select altkategori_no, ustkategori_no from urun_detay where aktif=1 and numara='$resim_id'")->fetchAll(PDO::FETCH_ASSOC);
		$ak_no=$ak_ve_uk_ht_ogren[0]['altkategori_no']; //echo "AK: ".$ak_no;
		$uk_no=$ak_ve_uk_ht_ogren[0]['ustkategori_no']; //echo " - UK: ".$uk_no;
		
		$ak_htaccess_ogren=@$baglanti->query("Select htaccess_etiket,ad from urun_altkategori where aktif=1 and numara='$ak_no'")->fetchAll(PDO::FETCH_ASSOC); 
		$ak_ht=$ak_htaccess_ogren[0]['htaccess_etiket']; //echo "AK: ".$ak_ht;
		$ak_ad=$ak_htaccess_ogren[0]['ad']; //echo "AK: ".$ak_ht;
		
		$uk_htaccess_ogren=@$baglanti->query("Select htaccess_etiket, altkategorilimi, ad from urun_kategori where aktif=1 and numara='$uk_no'")->fetchAll(PDO::FETCH_ASSOC); 
		$uk_ht=$uk_htaccess_ogren[0]['htaccess_etiket']; //echo "UK: ".$uk_ht;
		$uk_altkategorilimi=$uk_htaccess_ogren[0]['altkategorilimi']; //echo $uk_altkategorilimi;
		$uk_ad=$uk_htaccess_ogren[0]['ad']; //echo $uk_altkategorilimi;
		
		/*UK Linki*/
		if ($uk_altkategorilimi=="var") 
			{ 
				if ($permalink_durumu==1) 
					{ 
						$uk_link=$ualtkategori_permalink_on."/".$uk_ht; 
					}
				else 
					{ 
						$uk_link="urunler_ak.php?ht=$uk_ht"; 
					} 
			} 
		else 
			{ 
				if  ($permalink_durumu==1) 
					{ 
						$u_link=$urunler_permalink_on2."/".$uk_ht;
					}
				else 
					{ 
						$u_link="urunler.php?ukht=$uk_ht"; 
					} 
			}
		/* UK Linki */ 
		
		
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr">
<head>
<meta charset="UTF-8">
<title><? echo $ad; ?></title>
<meta name="description" content="<? echo $ad; ?>"/>
<link rel="shortcut icon" href="<? echo $seo_uzaklik; ?>_img/fav.png"/>
<link rel="canonical" href="//<? echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" />
<meta name="publisher" content="Proweb Mühendislik"/>
<meta name="author" content="Proweb Mühendislik"/>
<meta name="copyright" content="Altuniş Teknik  "/>
<meta name="creation_Date" content="22/12/2023"/>
<meta name="robots" content="index, follow">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="alternate" hreflang="tr" href="//<? echo $_SERVER['SERVER_NAME']; ?>"/>
<? @include ("inc_sosyal.php"); ?>
<? @include ("inc_script_css.php"); ?>
</head>
<body>
<? include ("inc_header.php"); ?>
<div class="index_margin" > 
<? // içerik (s) ?>
<div>&nbsp;</div>
    <div align="center">
        
        <h1><? echo $ad; ?></h1>
        <div><a href="<? echo $seo_uzaklik; ?>" class="antet_yol">Ana Sayfa</a> | <a href="<? echo $seo_uzaklik; ?><? echo $urunler_uk_permalink; ?>" class="antet_yol">Tüm Ürün Kategorileri</a></div>
        
    
    </div>
    <div>&nbsp;</div><div>&nbsp;</div>
    <div class="genis_flex_container index_max_w_1 ">
   
   
          	<div class="equal_colsx2" align="center">
                <div style="border:1px solid #f3f5f7; padding:30px; background: #FFFFFF">
                    <!--<a href="<?echo $seo_uzaklik; ?>urun.php" title="Dinamik Mühendislik"><img src="<?echo $seo_uzaklik; ?>_img/ifg.jpg" width="100%" style="max-width:361px; height:auto" alt="Dinamik Mühendislik" /></a> -->
                    
					<?  if ($resim_adres3<>'' || $resim_adres4<>'') {  ?>
                        <link rel="stylesheet" type="text/css" href="<? echo $seo_uzaklik; ?>urun_slider/engine1/style.css" />
                        <script type="text/javascript" src="<? echo $seo_uzaklik; ?>urun_slider/engine1/jquery.js"></script>
                        <div id="wowslider-container1" style="background:#ececec">
                            <div class="ws_images">
                                <ul>
                                    
                                    <li><img src="<? echo $seo_uzaklik; ?><? echo $resim_dizini.$resim_adres; ?>"    alt="<? echo $uzunluk; ?>" title="<? echo $ad; ?>" id="wows1_0"/></li>
                                    <? if ($resim_adres3<>'') { ?><li><img src="<? echo $seo_uzaklik; ?><? echo $resim_dizini.$resim_adres3; ?>"   alt="<? echo $uzunluk; ?>" title="<? echo $ad; ?>" id="wows1_1"/></li><? } ?>
                                    <? if ($resim_adres4<>'') { ?><li><img src="<? echo $seo_uzaklik; ?><? echo $resim_dizini.$resim_adres4; ?>"   alt="<? echo $uzunluk; ?>" title="<? echo $ad; ?>" id="wows1_2"/></li><? } ?>
                                    
                                </ul>
                            </div>
                        </div>	
                        <script type="text/javascript" src="<? echo $seo_uzaklik; ?>urun_slider/engine1/wowslider.js"></script>
                        <script type="text/javascript" src="<? echo $seo_uzaklik; ?>urun_slider/engine1/script.js"></script>
                    <? } elseif ($resim_adres3=='' && $resim_adres4=='') { ?>
                        <div class="highslide-gallery">
                            <a href="<? echo $seo_uzaklik; ?><? echo $resim_dizini.$resim_adres; ?>" class="highslide" onclick="return hs.expand(this)">
                                <img src="<? echo $seo_uzaklik; ?><? echo $resim_dizini.$resim_adres; ?>"  alt="<? echo $uzunluk; ?>" title="<? echo $ad; ?>" width="100%" >
                            </a>
                        </div>
                    <? } ?>

                </div>
            </div>
			<div class="equal_colsx2" >
					 <div class="flex_genel_1 cols_available_wrap">
                     		<div style="width:50px;"></div>
                            <div class="cols_available" >
                          		  	
							
									<? echo $aciklama; ?>

									<div class="index_siparis_div_buton" style="margin:0; max-width:100%; width:100%; min-width:100%;" 
									onclick="window.open('https://wa.me/905325016979?text=Merhaba, <? echo $ad; ?> siparişi vermek istiyorum.');">
                                        WhatsAPP Şipariş Hattı
                                    </div>






									<? if (strlen($urun_kodu)>0) { ?> 
										<br/>
										
										<div class="index_hakkimizda_div_buton" onclick="window.open('<? echo $seo_uzaklik; ?><? echo $urun_kodu; ?>')">
										Kataloğu İncele
										</div>
									</a>
								   <? } ?>
                            </div>
                     </div>


                    
            </div>
                            
                        
   

   
     </div>

    <? 
    $urunresim_resim_ogren=@$baglanti->query("Select * from urun_resim where aktif=1 and urun_no='$resim_id' order by siralama asc")->fetchAll(PDO::FETCH_ASSOC);
    $urunresim_resim_sayi=count($urunresim_resim_ogren);
    $resim_dizini="../rsmlr/kurun/";
    if ($urunresim_resim_sayi>0)
        {
    
    ?>       
            <!--<div align="center" style="font-size:22px"><? // echo $ad; ?> DİĞER FOTOĞRAFLAR</div> -->
            
            <div>&nbsp;</div><div>&nbsp;</div>
			<div align="center" >
        
        <h1>Ürünlerden Örnekler</h1>
        
        
    
   		 </div>
			<div>&nbsp;</div>
            
            <div class="genis_flex_container index_max_w_1" style="justify-content:space-around;">
                        
            
                                    <? 
                                        for ($sayac=0; $sayac<$urunresim_resim_sayi; $sayac++) 
                                            {
                                                $resim_adres=$urunresim_resim_ogren[$sayac]['resim_adres'];
												$aciklama=$urunresim_resim_ogren[$sayac]['aciklama'];
                                   ?>
                                               <div class="equal_colsx4">
                                                <div class="highslide-gallery">
                                                    <div class="k_container" style="border:1px solid #3498db">
                                                    <a href="<? echo $seo_uzaklik; ?><? echo $resim_dizini.$resim_adres; ?>" class="highslide" rel='gal1' onclick="return hs.expand(this)" >
                                                         
                                                            
                                                                <img src="<? echo $seo_uzaklik; ?><? echo $resim_dizini.$resim_adres; ?>"   alt="<? echo $aciklama; ?>" class="k_image" />
                                                            
                                                         
                                                          <div class="k_middle">
                                                            
                                                            <div class="k_text"><i class="fas fa-search"></i></div>
                                                            
                                                          </div>
                                                    </a>      
                                                    </div>
                                                 </div>
												 <div>&nbsp;</div>
												 <div><? echo $aciklama; ?></div>
												 <div>&nbsp;</div>
                                                </div>
                                    <? 
                                            }
                                    ?>
               
        
             </div>
    <? 
        }
    ?>





     <? if (strlen($urun_kodu)>0) { ?>                   
     <div>&nbsp;</div>
     <div class="index_max_w_1">
     <iframe src="<? echo $seo_uzaklik; ?><? echo $urun_kodu; ?>" width="100%" height="1000"></iframe>
     </div>
     <? } ?>
     
<div>&nbsp;</div><div>&nbsp;</div>



<? //include ("inc_kurumsal.php"); ?>
<? // içerik (f) ?>    
</div>
<? include ("inc_footer.php"); ?>
</body>
</html>
<?
	}
else
	{
		header("Location:$index_permalink");
		//header("Location:$urunler_uk_permalink");
	}
?>