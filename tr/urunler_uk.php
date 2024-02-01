<?
include_once("../inc_s/baglanti.php");
include_once("inc_permalink.php");
@include("../inc_s/resim_yeniden_boyutlandir.php");
@include("../inc_s/resim_yeniden_boyutlandir_motor.php");
$urun_kategori=@$baglanti->query("Select * from urun_kategori where aktif=1 and dil=1 order by puan asc")->fetchAll(PDO::FETCH_ASSOC);
$kategori_sayi=count($urun_kategori);
$resim_dizini="../rsmlr/urunkategori/";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr">
<head>
<meta charset="UTF-8">
<title>Ürün Kategorileri | Altuniş Teknik  </title>
<meta name="description" content="Altuniş Teknik  Ürün Kategorileri"/>
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
<!--<div class="hakkimizda_antet_bg flex_genel_1 index_max_w_2" style="justify-content:space-around;">

	<div>
    	<div align="center" class="antet_yazi_1">"Doğadan gelen çözümler"</div>
    	<div align="center" class="antet_yazi_2">Yılların Tecrübesiyle Hizmetinizdeyiz</div>
    </div>

</div> -->
<div>&nbsp;</div><div>&nbsp;</div>
<div class="index_max_w_2">
		
        
        		<div class="genis_flex_container  index_max_w_2" style="justify-content:space-around;">
   
   

            


			<? 
            if($kategori_sayi>0)
				{
					for ($sayac=0; $sayac<$kategori_sayi; $sayac++) 
						{
							$kategori_adi=$urun_kategori[$sayac]['ad']; 
							$kategori_aciklama=$urun_kategori[$sayac]['aciklama'];
							$kategori_no=$urun_kategori[$sayac]['numara']; 
							$resim_adres=$urun_kategori[$sayac]['resim_adres']; 
							$altkategorilimi=$urun_kategori[$sayac]['altkategorilimi']; 
							$kategori_htaccess_etiket=$urun_kategori[$sayac]["htaccess_etiket"]; 
							$kategori_resim_sayisi=@$baglanti->query("Select numara from urun_altkategori where ustkategori_no=$kategori_no and aktif=1")->fetchAll(PDO::FETCH_ASSOC); 
							$resim_sayi=count($kategori_resim_sayisi);
							 if ($kategori_adi<>'')
								  {
									 if ($resim_adres=='' || !file_exists($resim_dizini.$resim_adres)) {$resim_adres='resimyok.jpg'; } 
									 //resim_yeniden_boyutlandir($resim_dizini,$resim_adres,$height_of_image,$width_of_image); 
									 if ($altkategorilimi=="var") 
										 { 
											   if ($permalink_durumu==1) 
												  { 
													  $link=$ualtkategori_permalink_on."/".$kategori_htaccess_etiket; 
												  }
												else 
												  { 
													  $link="urunler_ak.php?ht=$kategori_htaccess_etiket"; 
												   } 
										 } 
										  else 
										 { 
											  if  ($permalink_durumu==1) 
												  { 
														 $ustkategori_ad_ogren=@$baglanti->query("Select htaccess_etiket from urun_kategori where numara='$kategori_no'")->fetchAll(PDO::FETCH_ASSOC);
														 $kategori_htaccess_etiket=$ustkategori_ad_ogren[0]["htaccess_etiket"];
														 $link=$urunler_permalink_on2."/".$kategori_htaccess_etiket;
												  }
											  else 
												 { 
														 $link="urunler.php?ukht=$kategori_htaccess_etiket"; 
												 } 
										 }
            ?>  

                                                          <div class="equal_colsx2" >
                                                            
														  <div style="border:1px solid #000000; padding:10px; background: #FFFFFF">
                                                                <div class="k_urun_container" onclick="window.location='<? echo $seo_uzaklik; ?><? echo $link; ?>'" style="border:1px solid #3498db">
                                                                  <img src="<? echo $seo_uzaklik; ?><? echo $resim_dizini.$resim_adres; ?>" alt="<? echo $kategori_adi; ?>" title="<? echo $kategori_adi; ?>" class="k_urun_image">
                                                                  <div class="k_urun_middle0">&nbsp;</div>
                                                                  <div class="k_urun_middle"> <div class="k_urun_text"><? echo $kategori_adi; ?></div> </div>
                                                                </div>
                                                                <div>&nbsp;</div>
																</div>
                                                        </div>
            <? 
								   }
							}
					}
			
			?>


  
                            
   
   
     </div>
        
        
        

</div>
<div>&nbsp;</div><div>&nbsp;</div>



<? //include ("inc_kurumsal.php"); ?>
<? // içerik (f) ?>    
</div>
<? include ("inc_footer.php"); ?>
</body>
</html>