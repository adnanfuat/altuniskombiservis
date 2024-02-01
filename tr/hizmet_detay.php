<? include ("inc_permalink.php"); $s='hizmetler';  include_once("../inc_s/baglanti.php");
if  (isset($_GET['ht']))
	{ 
		$hizmet_ht=$baglanti->quote($_GET['ht']);
	} 
if  (isset($_GET['renk']))
	{ 
		$hizmet_renk=$baglanti->quote($_GET['renk']);
	} 
//echo $hizmet_renk."renkk";
/*if  (is_numeric($_GET["id"]) && $_GET["id"]<>'' && is_numeric($_GET["id"])) 
	{ 
		$id=intval($_GET["id"]); 
	} */
$ana_tablo_ismi='hizmet_kategori';	  
$ozel_tablo_ismi='hizmet_detay';


if ($_GET["ht"]<>'')
   {
	 $hizmet_ht=$_GET["ht"];
	 //$hizmet_ht=$baglanti->quote($_GET["ht"]);
	 $id_ogren=@$baglanti->query("Select * from $ana_tablo_ismi where htaccess_etiket='$hizmet_ht'")->fetchAll(PDO::FETCH_ASSOC);
	 $id=$id_ogren[0]['numara'];
   }
else
  {
	if  (is_numeric($_GET["id"]) && $_GET["id"]<>'' && is_numeric($_GET["id"])) 
		{ 
			$id=intval($baglanti->quote($_GET["id"])); 
		}
	}


$kayitseti_1=@$baglanti->query("Select * from $ana_tablo_ismi where numara='$id'")->fetchAll(PDO::FETCH_ASSOC);
$kayitseti_1_sayisi=count($kayitseti_1);


if  ($kayitseti_1_sayisi==0) 
	{ 
		header("Location:".$index_permalink); 
	}
include_once("../inc_s/sayfa_no_belirle.php");
include_once("../inc_s/resim_yeniden_boyutlandir.php"); 
include_once("../inc_s/resim_yeniden_boyutlandir_motor.php");
$word_wrap_value=278; 
$width_of_image=160;
$height_of_image=146;
$kayitseti_1_ad=stripslashes($kayitseti_1[0]["ad"]);		
$kayitseti_1_add=stripslashes($kayitseti_1[0]["ad"]);		
if (strlen($kayitseti_1_ad)>107) {$kayitseti_1_ad=substr($kayitseti_1_ad,0,107)."..";}
$kayitseti_1_detay=stripslashes($kayitseti_1[0]["aciklama"]);	 // echo $kayitseti_1_detay;
$kayitseti_1_ozet=stripslashes($kayitseti_1[0]["ozet"]);	
$kayitseti_1_numara=$kayitseti_1[0]["numara"]; //echo $kayitseti_1_numara;	
$kayitseti_1_resim=$kayitseti_1[0]["resim_adres"];	
$kayitseti_1_htaccess_etiket=$kayitseti_1[0]["htaccess_etiket"];  //echo $kayitseti_1_htaccess_etiket;
$hizmet_ana_kayit_thumb="../rsmlr/hizmetk/";
$tarih=$kayitseti_1[0]["eklenme_tarihi"];
$tarih=substr($tarih,8,2)."/".substr($tarih,5,2)."/".substr($tarih,0,4); 
$tarih2=$kayitseti_1[0]["eklenme_tarihi"];
//$tarih=substr($tarih,8,2)."-".substr($tarih,5,2)."-".substr($tarih,0,4);
$day=date("l", @mktime(0, 0, 0, substr($tarih2,5,2), substr($tarih2,8,2), substr($tarih2,0,4)));
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
@resim_yeniden_boyutlandir($hizmet_ana_kayit_thumb,$kayitseti_1_resim,$height_of_image,$width_of_image);
if ($kayitseti_1_resim=="") { $kayitseti_1_resim="resimyok.jpg";}
$buyuk_resim=$kayitseti_1_resim;
$resim_dizini="../rsmlr/hizmetk/";
if (strlen($kayitseti_1_add)>35) { $pos=strpos($kayitseti_1_add,' ',34); if ($pos>0) { $kayitseti_1_add_kisa=substr($kayitseti_1_add,0,$pos)."..."; } else { $kayitseti_1_add_kisa=$kayit_seti_baslik; } } else { $kayitseti_1_add_kisa=$kayitseti_1_add; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr">
<head>
<meta charset="UTF-8">
<title><? echo $kayitseti_1_add; ?></title>
<meta name="description" content="<? echo $kayitseti_1_add; ?>"/>
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
<div class=" index_max_w_2">
		
     
                	
                    		
                            
                           <div class="genis_flex_container">
                           					
                                            
                                            <div class="equal_colsx2" align="center">
                                            <div align="center">
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                           					 <? 
																if ($kayitseti_1_resim<>'' && file_exists($resim_dizini.$kayitseti_1_resim) && $resim_dizini.$kayitseti_1_resim<>$resim_dizini)
																   {
															
															?>
                                                                        
                                                                            <img src="<? echo $seo_uzaklik; ?><? echo $resim_dizini.$kayitseti_1_resim; ?>" style="max-width:417px;" width="100%" alt="><? echo $kayitseti_1_add; ?>" class="img_zoom"/>
                                                                        
                                                            <? 
																	}
																else
																	{
															?>
                                                            
                                                                        <div style="max-width:417px; background:<? if ($sayac%2==0) { ?>#3498db<? } else { ?>#373737<? } ?>; display:flex; align-items:center; text-align:center; justify-content: center; min-height:280px;"  >
                                                                            <h1 style="color:#FFFFFF; font-weight:500;"><? echo $kayitseti_1_add; ?></h1>
                                                                        </div>
                                                            
                                                            <? 
																	}
															?>
                                            
                                            
                                            
                                            
                                            </div>
                                            <div>&nbsp;</div>
                                            <div><hr style=" width:50%; margin:0; max-width:200px; border:0; border-top:1px solid #3498db; "/></div>
                                            <div>&nbsp;</div>
                                            <div>&nbsp;</div>
                                            </div>
                                            <div class="equal_colsx2" >
                                            	<h2><? echo $kayitseti_1_add; ?></h2>
                                                <p><? echo $kayitseti_1_detay; ?></p>
                                            	
                                            </div>
                                            
                                           
                                           
                                            
                                
                                            
                           </div>
                           
                           
                           <?
						$kayit_seti_hizmet_detay=@$baglanti->query("Select * from hizmet_resim where kategori='$kayitseti_1_numara' order by numara desc")->fetchAll(PDO::FETCH_ASSOC);
						//echo "Select * from hizmet_resim where hizmet_no='$kayitseti_1_numara' order by numara desc";
						$kayit_seti_sayisi_hizmet_detay=count($kayit_seti_hizmet_detay); //echo $kayit_seti_sayisi_hizmet_detay."ssssssss"; echo $kayitseti_1_numara;
						$hizmet_detay_resim_dizini="../rsmlr/khizmet/";
						$hizmet_detay_o_resim_dizini="../rsmlr/hizmet/";
							?>
                            
                            <div class="genis_flex_container" style="justify-content:space-around;">
                     					<? 
											if($kayit_seti_sayisi_hizmet_detay>0)
											{
										?>
												 	<?  
                                                    //echo 1111;
                                                    for ($sayac=0; $sayac<$kayit_seti_sayisi_hizmet_detay; $sayac++) 
                                                        { 
                                                            $hizmet_detay_resim_adres=$kayit_seti_hizmet_detay[$sayac]["resim_adres"];
															$hizmet_detay_aciklama=$kayit_seti_hizmet_detay[$sayac]["aciklama"];
                                                	?>
                                                            
                                                             
                                                             
                                                             
                                                            
                                                            <? 
																if ($hizmet_detay_resim_adres<>'' && file_exists($hizmet_detay_resim_dizini.$hizmet_detay_resim_adres) && $hizmet_detay_resim_dizini.$hizmet_detay_resim_adres<>$hizmet_detay_resim_adres)
																   {
															
															?>
                                                           	<div class="equal_colsx5">
                                                             <a href="<? echo $seo_uzaklik; ?><? echo $hizmet_detay_o_resim_dizini.$hizmet_detay_resim_adres; ?>" class="highslide" rel='gal1' onclick="return hs.expand(this)" >
                                                                   <img src="<? echo $seo_uzaklik; ?><? echo $hizmet_detay_resim_dizini.$hizmet_detay_resim_adres; ?>" width="100%" class="img_zoom" alt="<? echo $kayitseti_1_add; ?>" />
                                                             </a> 
                                                            <div>&nbsp;</div>
                                                            
                                                            <div><? echo $hizmet_detay_aciklama; ?></div>
                                                            <div>&nbsp;</div>
                                                            </div>
                                                            <? } ?>
                                                             
                                                             
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



<? //include ("inc_kurumsal.php"); ?>
<? // içerik (f) ?>    
</div>
<? include ("inc_footer.php"); ?>
</body>
</html>