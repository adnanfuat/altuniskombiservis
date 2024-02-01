<? include("../inc_s/baglanti.php"); ?>
<? include ("inc_permalink.php");
$tablo_ismi="etiketler";
include("../inc_s/sayfa_no_belirle.php");
include("../inc_s/resim_yeniden_boyutlandir.php");
include("../inc_s/resim_yeniden_boyutlandir_motor.php");
$bir_sayfadaki_toplam_kayit_sayisi=3000;
if  ($permalink_durumu==1)
	{
		$permalink_on=permalink_duzenle($etiketler_permalink_on);
		
		$link_inherit=$permalink_on;
	} 
else
	{
		$link_inherit="etiketler.php";
	}
$limit_ilk_deger=($sayfa_no-1)*$bir_sayfadaki_toplam_kayit_sayisi;
$sql_cumlesi="Select * from $tablo_ismi where aktif=1";
$calistir_sql=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);																																																			
$toplam_kayit_sayisi_calistir_sql=count($calistir_sql);
include("../inc_s/sayfalama.php");
sayfala($toplam_kayit_sayisi_calistir_sql,$bir_sayfadaki_toplam_kayit_sayisi);
$kayit_seti=@$baglanti->query("Select * from $tablo_ismi where aktif=1 and dil=1 order by numara desc limit $limit_ilk_deger,$bir_sayfadaki_toplam_kayit_sayisi")->fetchAll(PDO::FETCH_ASSOC);
//$baglanti->errorInfo();
$kayit_seti_sayisi=count($kayit_seti); //echo $kayit_seti_sayisi;
$resim_dizini="../rsmlr/etiketthumb/";
//$width_of_image=186;
//$height_of_image=140; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr">
<head>
<meta charset="UTF-8">
<title>Etiketler | Altuniş Teknik  </title>
<meta name="description" content="Altuniş Teknik 'e google üzerinden ulaşabileceğiniz alternatif kelimeler"/>
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

</div> -->
<div style=" min-height:800px">
<div>&nbsp;</div><div>&nbsp;</div>
    
    <div class="index_max_w_2">
        
        <h1>  Etiketler </h1>
        
    
    </div>
    <div>&nbsp;</div><div>&nbsp;</div>

    <div align="center" class="index_max_w_2">
   
   			<? if ($kayit_seti_sayisi>0) { ?>
														<?
                                                            for ($sayac=0; $sayac<$kayit_seti_sayisi; $sayac++) 
                                                                {   
                                                                    //echo $kayit_seti_sayisi;
                                                                    $kayit_seti_no=$kayit_seti[$sayac]["numara"];
                                                                    $kayit_seti_baslik=$kayit_seti[$sayac]["ad"];
                                                                    $kayit_seti_htaccess_etiket=$kayit_seti[$sayac]["htaccess_etiket"];
                                                                    $kayit_seti_resim_adres=$kayit_seti[$sayac]["resim_adres"];
                                                                    $kayit_seti_ozet=$kayit_seti[$sayac]["icerik"];//echo $kayit_seti_ozet."özetttt";
                                                                   // if  (strlen($kayit_seti_ozet)>200){ $kayit_seti_ozet=substr($kayit_seti_ozet,0,250)."..."; } else { $kayit_seti_ozet=$kayit_seti_ozet; }
																	
																	
																	if  (strlen($kayit_seti_ozet)>400) 
																		{ 
																			$pos=strpos($kayit_seti_ozet,' ',450); 
																			if 	($pos>0) 
																				{ 
																					$kayit_seti_ozet=substr($kayit_seti_ozet,0,$pos)."..."; 
																				} 
																			else 
																				{ 
																					$kayit_seti_ozet=$kayit_seti_ozet; 
																				} 
																		} 
																	else 
																		{ 
																			$kayit_seti_ozet=$kayit_seti_ozet; 
																		}
																	 
                                                                    $kayit_seti_tarih=$kayit_seti[$sayac]["eklenme_tarihi"];
                                                                    $kayit_seti_tarih=substr($kayit_seti_tarih,8,2).".".substr($kayit_seti_tarih,5,2).".".substr($kayit_seti_tarih,0,4);
                                                                    //$tarih2=$kayit_seti[$sayac]["eklenme_tarihi"];
                                                                    if ($kayit_seti_resim_adres=="") { $kayit_seti_resim_adres="resimyok.jpg";}
                                                                    $word_wrap_value=95;
                                                                    $kayit_seti_baslikk=$kayit_seti_baslik; //echo 1111;
                                                                    //(s) Haberin linki permalink'e göre ayarlanıyor.
                                                                    // if ($sayac%2==0) { $class="haberler_buton1 hvr-shutter-out-horizontal2"; } else {  $class="haberler_buton2 hvr-shutter-out-horizontal2";}	
                                                                    if (strlen($kayit_seti_htaccess_etiket)>0) 
                                                                       {
                                                                                if  ($permalink_durumu==1)
                                                                                    {
                                                                                        $etiket_link=$etiket_permalink_on."/".$kayit_seti_htaccess_etiket;
                                                                                    }
                                                                                else
                                                                                    {
                                                                                        $etiket_link="etiket_detay.php?ht=$kayit_seti_htaccess_etiket";
                                                                                    }
                                                                       }
                                                                     else
                                                                        {
                                                                                if  ($permalink_durumu==1)
                                                                                    {
                                                                                        $perma_icerik=permalink_daralt($kayit_seti_baslikk,70);
                                                                                        
                                                                                        $permalink_on=permalink_duzenle($etiket_permalink_on."-".$perma_icerik);
                                                                                        
                                                                                        $etiket_link=$permalink_on."-".$kayit_seti_no.".html";
                                                                                    }
                                                                                else
                                                                                    {
                                                                                        $etiket_link="etiket_detay.php?id=$kayit_seti_no";
                                                                                    }
                                                                        }
                                                                    //(f) Haberin linki permalink'e göre ayarlanıyor.
                                                                    
                                                                    if  (strlen($kayit_seti_baslik)>$word_wrap_value)
                                                                        {
                                                                            $kayit_seti_baslik=substr($kayit_seti_baslik,0,$word_wrap_value)."...";
                                                                        }
                                                                    @resim_yeniden_boyutlandir($resim_dizini,$kayit_seti_resim_adres,$height_of_image,$width_of_image);
                                                        ?>         

                <div class="genis_flex_container cols_available_wrap" onclick="window.location='<? echo $seo_uzaklik; ?><? echo $etiket_link; ?>'" style="cursor:pointer; margin-bottom:25px;">

                      
                      
                        <? 
							if ($kayit_seti_resim_adres<>'' && file_exists($resim_dizini.$kayit_seti_resim_adres) && $resim_dizini.$kayit_seti_resim_adres<>$resim_dizini)
							   {
						
						?>
									
									
									
									
										<div style="width:300px;min-width:300px;max-width:300px;">
									
												<div style="border:1px solid #3498db;padding:15px; max-width:220px;">
				
													<div style="border:1px solid #c7d2e3;">
													<a href="<? echo $seo_uzaklik; ?><? echo $etiket_link;?>">
                                                            <img src="<? echo $seo_uzaklik; ?><? echo $resim_dizini.$kayit_seti_resim_adres; ?>" width="100%" alt="<? echo $kayit_seti_baslik?>" />
                                                        </a>
													</div>
				
				
												</div>
									
										</div> 
						<? 
								}
							else
								{
						?>
						
                                 <div style="width:300px;min-width:300px;max-width:300px;">
									
												<div style="border:1px solid #3498db;padding:15px; max-width:220px;">
				
													<div style="border:1px solid #c7d2e3;">
														<a href="<? echo $seo_uzaklik; ?><? echo $etiket_link;?>">
                                                            <img src="<? echo $seo_uzaklik; ?>_img/df.jpg" width="100%" alt="<? echo $kayit_seti_baslik?>" />
                                                        </a>
													</div>
				
				
												</div>
									
										</div>                                        
                                                          
                      <? 
					  			}
					  ?>

                        <div  class="cols_available" style="border:1px solid #3498db; padding:15px;">

                                <div align="left">
                                
								<h2><? echo  stripslashes($kayit_seti_baslik); ?></h2>
                                <p><? echo  strip_tags(stripslashes($kayit_seti_ozet)); ?></p>
                                   
                                </div>

                        </div>


                </div>

                <? 
                                                                            }
                                                                        } 
                                                                    ?> 
                                            
   
     </div>
     
     <div>&nbsp;</div><div>&nbsp;</div>
</div>
<? //include ("inc_kurumsal.php"); ?>
<? // içerik (f) ?>    
</div>
<? include ("inc_footer.php"); ?>
</body>
</html>