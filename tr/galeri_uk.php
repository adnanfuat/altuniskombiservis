<?
include_once("../inc_s/baglanti.php");
include_once("inc_permalink.php");
include("../inc_s/resim_yeniden_boyutlandir.php");
include("../inc_s/resim_yeniden_boyutlandir_motor.php");
$galeri_kategori=@$baglanti->query("Select * from galeri_kategori where aktif=1 and dil=1 order by puan asc")->fetchAll(PDO::FETCH_ASSOC);
$kategori_sayi=count($galeri_kategori);
$resim_dizini="../rsmlr/galerikategori/";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr">
<head>
<meta charset="UTF-8">
<title>Foto Galeri | Altuniş Teknik  </title>
<meta name="description" content="Altuniş Teknik 'e ait fotoğraflar"/>
<link rel="shortcut icon" href="<? echo $seo_uzaklik; ?>_img/fav.png"/>
<link rel="canonical" href="//<? echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" />
<meta name="publisher" content="Altuniş Teknik  "/>
<meta name="author" content="Altuniş Teknik  "/>
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
<!--<div class="urunler_antet_bg flex_genel_1 index_max_w_2" style="justify-content:space-around;">

	<div>
    	<div align="center" class="antet_yazi_1">"Mutfakların vazgeçilmezleri"</div>
    	<div align="center" class="antet_yazi_2">Sağlıklı Yaşam Ürünleri</div>
    </div> 

</div> -->

<div style=" min-height:800px; ">
<div>&nbsp;</div><div>&nbsp;</div>
    
    <div class="index_max_w_2">
        
        <h1> Foto Galeri</h1>
        <h3><a href="<? echo $seo_uzaklik; ?>" class="antet_yol">Ana Sayfa</a> | </h3>
        
    
    </div>
    

    <div>&nbsp;</div><div>&nbsp;</div>
    <div class="flex_genel_1 index_max_w_1" style="justify-content:space-around;">
   
   
          
            
            
<? 
                                                    if($kategori_sayi>0)
                                                    {
                                                    for ($sayac=0; $sayac<$kategori_sayi; $sayac++) 
                                                        {
                                                        
                                                            $kategori_adi=$galeri_kategori[$sayac]['ad']; 
                                                            $kategori_no=$galeri_kategori[$sayac]['numara']; 
                                                            $resim_adres=$galeri_kategori[$sayac]['resim_adres']; 
                                                            $altkategorilimi=$galeri_kategori[$sayac]['altkategorilimi']; 
                                                            $kategori_htaccess_etiket=$galeri_kategori[$sayac]["htaccess_etiket"]; 
                                                            $kategori_resim_sayisi=@$baglanti->query("Select numara from galeri_altkategori where ustkategori_no=$kategori_no and aktif=1")->fetchAll(PDO::FETCH_ASSOC); 
                                                            $resim_sayi=count($kategori_resim_sayisi);
                                                             if ($kategori_adi<>'')
                                                                  {
                                                                     if ($resim_adres=='' || !file_exists($resim_dizini.$resim_adres)) {$resim_adres='resimyok.jpg'; } 
                                                                     @resim_yeniden_boyutlandir($resim_dizini,$resim_adres,$height_of_image,$width_of_image); 
                                                                     if ($altkategorilimi=="var") 
                                                                     { 
                                                                           if ($permalink_durumu==1) 
                                                                              { 
                                                                                  $link=$galtkategori_permalink_on."/".$kategori_htaccess_etiket; 
                                                                              }
                                                                            else 
                                                                              { 
                                                                                  $link="galeri_ak.php?ht=$kategori_htaccess_etiket"; 
                                                                               } 
                                                                     } 
                                                                      else 
                                                                     { 
                                                                          if  ($permalink_durumu==1) 
                                                                              { 
                                                                                     $ustkategori_ad_ogren=@$baglanti->query("Select htaccess_etiket from galeri_kategori where numara='$kategori_no'")->fetchAll(PDO::FETCH_ASSOC);
                                                                                     $kategori_htaccess_etiket=$ustkategori_ad_ogren[0]["htaccess_etiket"];
                                                                                     $link=$resimler_permalink_on2."/".$kategori_htaccess_etiket;
                                                                              }
                                                                          else 
                                                                             { 
                                                                                     $link="resimler.php?ukht=$kategori_htaccess_etiket"; 
                                                                             } 
                                                                     }
                                                ?>  


                                                                            <div class="equal_colsx3" align="center">
                                                                                <div style="border:1px solid #000000; padding:10px; background: #FFFFFF">
                                                                                    <a href="<? echo $link; ?>" title="<? echo $kategori_adi; ?>">
                                                                                        <img src="<? echo $seo_uzaklik; ?><? echo $resim_dizini.$resim_adres; ?>" width="100%" 	alt="<? echo $kategori_adi; ?>" />
                                                                                    </a>
                                                                                    <div>&nbsp;</div>
                                                                                    <h1 class="index_galeri_h3"><? echo $kategori_adi; ?></h1>
                                                                                </div>
                                                                            </div>
                                                        
                                                        
                                                        
                                                    <? 				} 
                                                        
                                                           }
														    
                                                    } 
														else 
													{ 
													?> 
                                                    Kayıt bulunamadı! 
													<? } ?>
  
                            
   
   
     </div>
     
     <div>&nbsp;</div><div>&nbsp;</div>
</div>
<? //include ("inc_kurumsal.php"); ?>
<? // içerik (f) ?>    
</div>
<? include ("inc_footer.php"); ?>
</body>
</html>