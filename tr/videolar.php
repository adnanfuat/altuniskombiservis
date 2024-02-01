<? @include ("inc_permalink.php"); ?>
<? @include ("../inc_s/baglanti.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr">
<head>
<meta charset="UTF-8">
<title>Videolar | Altuniş Teknik  </title>
<meta name="description" content="Altuniş Teknik  ürünleri üretim süreçlerine ait videolar."/>
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
<div>&nbsp;</div><div>&nbsp;</div>
<div class="genis_flex_container cols_available_wrap index_max_w_2">
		
        <div class="cols_available">
        		<h1>  Videolar </h1>
                   
   	
        </div>
        

</div>
<br />
<br />

<div class="genis_flex_container index_max_w_2">     
                           
                           
                           
                           
                           <?  
                                $ilgili_videolar=@$baglanti->query("Select * from video where aktif='1' and dil='1' order by puan asc")->fetchAll(PDO::FETCH_ASSOC);
                                //echo "Select * from video where aktif='1' and dil='1' and kaynak='' order by numara desc;
                                $ilgili_videolar_sayisi=count($ilgili_videolar);  //echo $ilgili_videolar_sayisi;
                                $ilgili_videolar_resim_dizini="../rsmlr/vresim/";
                                $ilgili_videolar_video_dizini="../rsmlr/video/";
                                if ($ilgili_videolar_sayisi>0)
                                   {
                                        for ($sayac=0; $sayac<$ilgili_videolar_sayisi; $sayac++)
                                            {
												$video_numara=$ilgili_videolar[$sayac]['numara']; //echo  $video_numara;
												$video_ad=$ilgili_videolar[$sayac]['ad'];
												$video_htaccess_etiket=$ilgili_videolar[$sayac]['htaccess_etiket'];
												$video_resim=$ilgili_videolar[$sayac]['resim_adres'];
												$video=$ilgili_videolar[$sayac]['video_adres'];
												$video_kaynak=$ilgili_videolar[$sayac]['kaynak']; //echo $video_kaynak;
												
												
												
												  if (strlen($video_htaccess_etiket)>0) 
												   {
															if  ($permalink_durumu==1)
																{
																	$video_link=$video_permalink_on."/".$video_htaccess_etiket;
																}
															else
																{
																	$video_link="video_detay.php?ht=$video_htaccess_etiket";
																}
												   }
												 else
													{
															if  ($permalink_durumu==1)
																{
																	$perma_icerik=permalink_daralt($video_ad,70);
																	
																	$permalink_on=permalink_duzenle($video_permalink_on."-".$perma_icerik);
																	
																	$video_link=$permalink_on."-".$video_numara.".html";
																}
															else
																{
																	$video_link="video_detay.php?id=$video_numara";
																}
													}
												
                            ?>                     
                    
                    
                                            
                                            <div class="equal_colsx2" align="center">
                                            
                                                    <div align="center" class="videolar_div">
                                                        <? if (strlen($video_kaynak)>0 && (strlen($video)==0 || $video=='')) { ?>
                                                        <? echo $video_kaynak; ?>
                                                        <? } else if (strlen($video)>0 && (strlen($video_kaynak)==0 || $video_kaynak==''))  { ?>
                                                        
                                                        <video width="100%" style="max-height:480px; max-width:618px; height:auto"
                                                        poster="<? if (strlen($video_resim)>0 && video_resim<>'') { ?><? echo $seo_uzaklik; ?><? echo $ilgili_videolar_resim_dizini.$video_resim; ?><? }  else { ?>
                                                        <? echo $seo_uzaklik; ?>_img/video_default.jpg<? } ?>"  controls>
                                                        <source src="<? echo $seo_uzaklik; ?><? echo $ilgili_videolar_video_dizini.$video; ?>" type="video/mp4">
                                                        </video>
                                                        
                                                        <? } ?>
                                                        
                                                        
                                                    </div>
                                                    <div>&nbsp;</div>
                                                    <div><!--<a href="<?// echo $seo_uzaklik.$video_link; ?>" class="index_devam "> --><? echo $video_ad;  ?><!--</a> --></div>
                                                    <div>&nbsp;</div>
                                                    <div>&nbsp;</div>
                                            
                                            </div>
                                            
                    
                    						
                           					
                    
                    
                    
                    
                    
                          <? 
                                             }
                                        }
									else
										{
                            ?>
                           
                           						Kayıt Bulunamadı.
                           
                           <? 
						   				}
						   ?>
                           
                           
                           
                   </div>
<div>&nbsp;</div><div>&nbsp;</div>



<? //include ("inc_kurumsal.php"); ?>
<? // içerik (f) ?>    
</div>
<? include ("inc_footer.php"); ?>
</body>
</html>