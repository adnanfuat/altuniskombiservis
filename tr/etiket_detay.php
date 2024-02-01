<? session_start();
include_once("inc_permalink.php"); 
include_once("../inc_s/baglanti.php");
$ana_tablo_ismi='etiketler';	  
$ozel_tablo_ismi='etiket_detay';
if ($_GET["ht"]<>'')
   {
   	 $ht=$_GET["ht"];
	 $id_ogren=@$baglanti->query("Select numara from $ana_tablo_ismi where htaccess_etiket='$ht'")->fetchAll(PDO::FETCH_ASSOC);
	 $id=$id_ogren[0]['numara'];
   }
else
  {
	if  (is_numeric($_GET["id"]) && $_GET["id"]<>'' && is_numeric($_GET["id"])) 
		{ 
			$id=intval($baglanti->quote($_GET["id"])); 
		}
	} 

$kayitseti_1=@$baglanti->query("Select * from $ana_tablo_ismi where numara=$id")->fetchAll(PDO::FETCH_ASSOC);
$kayitseti_1_sayisi=count($kayitseti_1);
if  ($kayitseti_1_sayisi==0) 
	{ 
		header("Location:$index_permalink"); 
	}
include_once("../inc_s/sayfa_no_belirle.php");
include_once("../inc_s/resim_yeniden_boyutlandir.php"); 
include_once("../inc_s/resim_yeniden_boyutlandir_motor.php");
$word_wrap_value=60; 
$width_of_image=132;
$height_of_image=132; 
$kayitseti_1_ad=stripslashes($kayitseti_1[0]["ad"]);		
$kayitseti_1_add=stripslashes($kayitseti_1[0]["ad"]);		
if (strlen($kayitseti_1_ad)>107) {$kayitseti_1_ad=substr($kayitseti_1_ad,0,107)."..";}
$kayitseti_1_detay=stripslashes($kayitseti_1[0]["icerik"]);	 //echo $kayitseti_1_detay;
$kayitseti_1_ozet=stripslashes($kayitseti_1[0]["ozet"]);	
$kayitseti_1_numara=$kayitseti_1[0]["numara"]; //echo $kayitseti_1_numara;	
$kayitseti_1_resim=$kayitseti_1[0]["resim_adres"];	
$etiket_ana_kayit_thumb="../rsmlr/etiketthumb/";
$tarih=$kayitseti_1[0]["eklenme_tarihi"];
$tarih=substr($tarih,8,2).".".substr($tarih,5,2).".".substr($tarih,0,4);
$tarih2=$kayitseti_1[0]["eklenme_tarihi"];
//$tarih=substr($tarih,8,2)."-".substr($tarih,5,2)."-".substr($tarih,0,4);
$day=date("l", mktime(0, 0, 0, substr($tarih2,5,2), substr($tarih2,8,2), substr($tarih2,0,4)));
switch ($day)
	{
		case "Sunday": $gun="Pazar"; break;
		case "Monday": $gun="Pazartesi"; break;
		case "Tuesday": $gun="Salı"; break;
		case "Wednesday": $gun="Çarşamba"; break;
		case "Thursday": $gun="Perşembe"; break;
		case "Friday": $gun="Cuma"; break;
		case "Saturday": $gun="Cumartesi"; break;
	}
@resim_yeniden_boyutlandir($etiket_ana_kayit_thumb,$kayitseti_1_resim,$height_of_image,$width_of_image);
if ($kayitseti_1_resim=="") { $kayitseti_1_resim="resimyok.jpg";}
$buyuk_resim=$kayitseti_1_resim;
$resim_dizini="../rsmlr/etiketthumb/";
$resim_dizini2="../rsmlr/etiketler/";

//echo $resim_dizini.$kayitseti_1_resim;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr">
<head>
<meta charset="UTF-8">
<title><? echo $kayitseti_1_ad; ?></title>
<meta name="description" content="<? echo $kayitseti_1_ad; ?>"/>
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
<div style=" min-height:800px; ">
<div>&nbsp;</div><div>&nbsp;</div>
    

    
    <div class="genis_flex_container cols_available_wrap index_max_w_2">
        
          				<? 
							if ($kayitseti_1_resim<>'' && file_exists($resim_dizini.$kayitseti_1_resim) && $resim_dizini.$kayitseti_1_resim<>$resim_dizini)
							   {
						
						?>
									
									
									
									
										<div style="width:300px;min-width:300px;max-width:300px;">
									
												<div style="border:1px solid #3498db;padding:15px; max-width:220px;">
				
													<div style="border:1px solid #c7d2e3;">
													
                                                            <img src="<? echo $seo_uzaklik; ?><? echo $resim_dizini.$kayitseti_1_resim; ?>" width="100%" alt="<? echo $kayit_seti_baslik?>" />
                                                       
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
        
       				 <div  class="cols_available" > 
                     
                     <h1>  <? echo $kayitseti_1_ad; ?></h1>  
                     <? echo $kayitseti_1_detay; ?>
                     
                     </div>
                     

    </div>




						<?
							$kayit_seti_etiket_detay=@$baglanti->query("Select * from etiket_detay where haber_no='$kayitseti_1_numara' order by numara desc")->fetchAll(PDO::FETCH_ASSOC);
							$kayit_seti_sayisi_etiket_detay=count($kayit_seti_etiket_detay);
							$etiket_detay_resim_dizini="../rsmlr/etiket_detay/";
						?>
                           <div class="genis_flex_container  index_max_w_2"> 
                            
                     					<? 
											if($kayit_seti_sayisi_etiket_detay>0)
											{
										?>
												 	<?  
                                                    //echo 1111;
                                                    for ($sayac=0; $sayac<$kayit_seti_sayisi_etiket_detay; $sayac++) 
                                                        { 
                                                            $etiket_detay_resim_adres=$kayit_seti_etiket_detay[$sayac]["resim_adres"];
															$etiket_detay_icerik=$kayit_seti_etiket_detay[$sayac]["icerik"];
                                                	?>
                                                           
                                                           <div <? 
																if ($etiket_detay_resim_adres<>'' && file_exists($etiket_detay_resim_dizini.$etiket_detay_resim_adres) && $etiket_detay_resim_dizini.$etiket_detay_resim_adres<>$etiket_detay_resim_adres)
																   {
															
															?> class="equal_colsx2" <? } ?>> 
															 <div><? echo $etiket_detay_icerik; ?></div>
                                                             <div>&nbsp;</div>
                                                            </div>
                                                            
                                                            <? 
																if ($etiket_detay_resim_adres<>'' && file_exists($etiket_detay_resim_dizini.$etiket_detay_resim_adres) && $etiket_detay_resim_dizini.$etiket_detay_resim_adres<>$etiket_detay_resim_adres)
																   {
															
															?>
                                                           	<div class="equal_colsx2">
                                                             <!--<a href="<?echo $seo_uzaklik; ?><?echo $etiket_detay_resim_dizini.$etiket_detay_resim_adres; ?>" class="highslide" rel='gal1' onclick="return hs.expand(this)" > -->
                                                                   <img src="<? echo $seo_uzaklik; ?><? echo $etiket_detay_resim_dizini.$etiket_detay_resim_adres; ?>" width="100%" class="img_zoom" alt="<? echo $kayitseti_1_add; ?>" />
                                                             <!--</a> -->
                                                            <div>&nbsp;</div>
                                                            </div>
                                                            <? 
																	}
															?>
                                                           	
															
                                                           
                               			 <?
                                                        }
                                                    ?>
														
										<?
											} 
											else
												{
										?>
                                            	<!--<div class="font13">Bu makinenin görselleri eklenmemiştir!</div> -->
                                        <?
												}
										?>
                    
                     		</div>
     					
                        </div>
     <div>&nbsp;</div><div>&nbsp;</div>
</div>
<? //include ("inc_kurumsal.php"); ?>
<? // içerik (f) ?>    
</div>
<? include ("inc_footer.php"); ?>
</body>
</html>