<? include_once ("inc_permalink.php"); $s='Hizmetler'; 
include_once("../inc_s/baglanti.php");
$tablo_ismi="hizmet_kategori";
include_once("../inc_s/sayfa_no_belirle.php");
$bir_sayfadaki_toplam_kayit_sayisi=20000;
if  ($permalink_durumu==1)
	{
		$permalink_on=permalink_duzenle($hizmetler_permalink_on);
		$link_inherit=$permalink_on; //echo $link_inherit;
	}
else
	{
		$link_inherit="hizmetler.php";
	}
$limit_ilk_deger=($sayfa_no-1)*$bir_sayfadaki_toplam_kayit_sayisi;
$sql_cumlesi="Select * from $tablo_ismi where aktif=1 and dil=1";
$calistir_sql=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);																																																			
$toplam_kayit_sayisi_calistir_sql=count($calistir_sql);
include("../inc_s/sayfalama.php");
sayfala($toplam_kayit_sayisi_calistir_sql,$bir_sayfadaki_toplam_kayit_sayisi);
$kayit_seti=@$baglanti->query("Select * from $tablo_ismi where aktif=1 and dil=1 order by puan asc limit $limit_ilk_deger,$bir_sayfadaki_toplam_kayit_sayisi")->fetchAll(PDO::FETCH_ASSOC);
//$baglanti->errorInfo();
$kayit_seti_sayisi=count($kayit_seti); //echo $kayit_seti_sayisi;
$resim_dizini="../rsmlr/hizmetk/";
$width_of_image=160;
$height_of_image=146;  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr">
<head>
<meta charset="UTF-8">
<title>Hizmetler | Altuniş Teknik  </title>
<meta name="description" content="Altuniş Teknik  hizmetleri"/>
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
<!--<div class="hakkimizda_antet_bg flex_genel_1 index_max_w_2" style="justify-content:space-around;">

	<div>
    	<div align="center" class="antet_yazi_1">"Doğadan gelen çözümler"</div>
    	<div align="center" class="antet_yazi_2">Yılların Tecrübesiyle Hizmetinizdeyiz</div>
    </div> 

</div>-->
<div>&nbsp;</div><div>&nbsp;</div>
<div class="genis_flex_container cols_available_wrap index_max_w_2">
		
        
        		<div class="genis_flex_container">
                           					
                                            


											<? if ($kayit_seti_sayisi>0) { ?>
                                                      <? //echo $kayit_seti_sayisi;
                                            for ($sayac=0; $sayac<$kayit_seti_sayisi; $sayac++) 
                                                { 
                                                    $kayit_seti_no=$kayit_seti[$sayac]["numara"];
                                                    $kayit_seti_baslik=$kayit_seti[$sayac]["ad"];
                                                    $kayit_seti_resim_adres=$kayit_seti[$sayac]["resim_adres"];
                                                    $kayit_seti_ozet=$kayit_seti[$sayac]["ozet"];
													$kayit_seti_aciklama=$kayit_seti[$sayac]["aciklama"];
                                                    $kayit_seti_tarih=$kayit_seti[$sayac]["eklenme_tarihi"];
                                                    $kayit_seti_tarih=substr($kayit_seti_tarih,8,2).".".substr($kayit_seti_tarih,5,2).".".substr($kayit_seti_tarih,0,4); 
                                                    $kayit_seti_htaccess_etiket=$kayit_seti[$sayac]["htaccess_etiket"];
                                                    if ($kayit_seti_resim_adres=="") { $kayit_seti_resim_adres="resimyok.jpg";}
                                                    $kayit_seti_baslikk=$kayit_seti_baslik;
                                                    //(s) hizmetin linki permalink'e göre ayarlanıyor.
                                                    if  ($permalink_durumu==1)
                                                        {
                                                            $hizmet_link=permalink_duzenle($hizmet_permalink_on)."/".$kayit_seti_htaccess_etiket;
                                                            $hizmet_link_red=permalink_duzenle($hizmet_permalink_on)."/".$kayit_seti_htaccess_etiket."&renk=red";
                                                            $hizmet_link_blue=permalink_duzenle($hizmet_permalink_on)."/".$kayit_seti_htaccess_etiket."&renk=blue";
                                                        }
                                                        else
                                                        {
                                                            $hizmet_link="hizmet_detay.php?ht=$kayit_seti_htaccess_etiket";
                                                            $hizmet_link_red="hizmet_detay.php?ht=$kayit_seti_htaccess_etiket&renk_red";
                                                            $hizmet_link_blue="hizmet_detay.php?ht=$kayit_seti_htaccess_etiket&renk_blue";
                                                        }
                                                    //(f) hizmetin linki permalink'e göre ayarlanıyor.
                                                    if (strlen($kayit_seti_baslik)>80) { $pos=strpos($kayit_seti_baslik,' ',79); if ($pos>0) { $kayit_seti_baslik_kisa=substr($kayit_seti_baslik,0,$pos)."[...]"; } else { $kayit_seti_baslik_kisa=$kayit_seti_baslik; } } else { $kayit_seti_baslik_kisa=$kayit_seti_baslik; }
                                                    if (strlen($kayit_seti_ozet)>300) { $pos=strpos($kayit_seti_ozet,' ',600); if ($pos>0) { $kayit_seti_ozet_kisa=substr($kayit_seti_ozet,0,$pos)."[...]"; } else { $kayit_seti_ozet_kisa=$kayit_seti_ozet; } } else { $kayit_seti_ozet_kisa=$kayit_seti_ozet; }
                                                   
												   if (strlen($kayit_seti_aciklama)>300) { $pos=strpos($kayit_seti_aciklama,' ',600); if ($pos>0) { $kayit_seti_aciklama_kisa=substr($kayit_seti_aciklama,0,$pos)."[...]"; } else { $kayit_seti_aciklama_kisa=$kayit_seti_aciklama; } } else { $kayit_seti_aciklama_kisa=$kayit_seti_aciklama; }
                                            ?> 
                                            
                                            
                                                      
                                                        
                                                        <div class="equal_colsx2" align="center">
                                                        <div align="center">
                                                            <? 
																if ($kayit_seti_resim_adres<>'' && file_exists($resim_dizini.$kayit_seti_resim_adres) && $resim_dizini.$kayit_seti_resim_adres<>$resim_dizini)
																   {
															
															?>
                                                                        <a href="<? echo $seo_uzaklik; ?><? echo $hizmet_link; ?>">
                                                                            <img src="<? echo $seo_uzaklik; ?><? echo $resim_dizini.$kayit_seti_resim_adres; ?>" style="max-width:417px;" width="100%" alt="<? echo $kayit_seti_baslik?>" class="img_zoom"/>
                                                                        </a>
                                                            <? 
																	}
																else
																	{
															?>
                                                            
                                                                        <div style="max-width:417px; background:<? if ($sayac%2==0) { ?>#3498db<? } else { ?>#373737<? } ?>; display:flex; align-items:center; text-align:center; justify-content: center; min-height:280px;"  onclick="window.location='<? echo $seo_uzaklik; ?><? echo $hizmet_link; ?>'">
                                                                            <h1 style="color:#FFFFFF; font-weight:500;"><? echo $kayit_seti_baslik?></h1>
                                                                        </div>
                                                            
                                                            <? 
																	}
															?>
                                                            
                                                        </div>
                                                        <div>&nbsp;</div>
                                                        <div><hr  style=" width:50%; margin:0; max-width:200px; border:0; border-top:1px solid #3498db; "/></div>
                                                        <div>&nbsp;</div>
                                                        <div>&nbsp;</div>
                                                        </div>
                                                        <div class="equal_colsx2" style="text-align:center">
                                                            <h2><? echo $kayit_seti_baslik?><? //echo $kayit_seti_ozet; ?></h2>
                                                            <p><? echo strip_tags($kayit_seti_aciklama_kisa); ?></p>
                                                            <div>&nbsp;</div>
                                                            <div class="index_incele_buton" onclick="window.location='<? echo $seo_uzaklik; ?><? echo $hizmet_link; ?>'">DEVAMI</div>
                                                        </div>
                                                        
                                                       
                                               
                                                        
                                                <?
                                                }
                                                ?>
                                                
                                            <? } else { ?>
                                                           
                                                           Kayıt Bulunamadı.
                                                           
                                            <? } ?> 






                                            
                                
                                            
                           </div>
        
        
        

</div>
<div>&nbsp;</div><div>&nbsp;</div>



<? //include ("inc_kurumsal.php"); ?>
<? // içerik (f) ?>    
</div>
<? include ("inc_footer.php"); ?>
</body>
</html>