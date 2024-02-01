<? session_start();
include_once("inc_permalink.php"); 
include_once("../inc_s/baglanti.php");
$ana_tablo_ismi='haberler';	  
$ozel_tablo_ismi='haber_detay';
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
$haber_ana_kayit_thumb="../rsmlr/haberthumb/";
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
@resim_yeniden_boyutlandir($haber_ana_kayit_thumb,$kayitseti_1_resim,$height_of_image,$width_of_image);
if ($kayitseti_1_resim=="") { $kayitseti_1_resim="resimyok.jpg";}
$buyuk_resim=$kayitseti_1_resim;
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
<div style="min-height:800px; ">
<div>&nbsp;</div><div>&nbsp;</div>
    
    <div class="index_max_w_2">
        
        <h1>  Detay </h1>
        
    
    </div>
    <div>&nbsp;</div><div>&nbsp;</div>
    <div  class="index_max_w_2">
   	 <div class="genis_flex_container cols_available_wrap">
                           					
                                            
                                            <div class="equal_colsx2" align="center">
                                                <div align="left">
    
                                                        <? if ($kayitseti_1_resim<>'' && file_exists($haber_ana_kayit_thumb.$kayitseti_1_resim) && $haber_ana_kayit_thumb.$kayitseti_1_resim<>$haber_ana_kayit_thumb) 
                                                  {
                                                        $haber_ana_kayit_buyukresim="../rsmlr/haberler/";  
                                            ?>
                                            <? if (file_exists($haber_ana_kayit_buyukresim.$buyuk_resim) && ($haber_ana_kayit_buyukresim<>$haber_ana_kayit_buyukresim.$kayitseti_1_resim))  { ?>
                                            <div class="highslide-gallery"><a href="<? echo $seo_uzaklik; ?><? echo $haber_ana_kayit_buyukresim.$buyuk_resim ?>" class="highslide" onclick="return hs.expand(this)"><? } ?>
                                            <img src="<? echo $seo_uzaklik; ?><? echo $haber_ana_kayit_thumb.$kayitseti_1_resim ?>" style="max-width:300px;" width="100%" alt="" class="img_zoom"/>
                                            <? if (file_exists($haber_ana_kayit_buyukresim.$buyuk_resim) && ($haber_ana_kayit_buyukresim<>$haber_ana_kayit_buyukresim.$kayitseti_1_resim))  { ?></a></div><? } ?>
                                            <?     }    ?>
                                                                                
                                                                                
                                            
                                           
                                          
                                                
                                                
                                                </div>
                                                <div>&nbsp;</div>
                                                <div>&nbsp;</div>
                                            </div>
                                            <div class="cols_available" >
                                            	<h2><? echo $kayitseti_1_ad; ?></h2>
                                                <p><? echo $kayitseti_1_detay; ?></p>
                                            	
                                            </div>
                                            
                                           
                                           
                                
                                            
                           </div>
                    
                    
                    
           <div class="genis_flex_container">         		
                            
                             <?
$word_wrap_value_thumb=122;
$height_of_image=375;
$width_of_image=500;					
$haber_detay_buyuk_resim_dizini="../rsmlr/haber_detay/";
$haber_detay_kucuk_resim_dizini="../rsmlr/haber_detay_thumb/";								
$kayitseti_2_ozelbilgiler=@$baglanti->query("Select * from $ozel_tablo_ismi where haber_no=$id order by numara asc")->fetchAll(PDO::FETCH_ASSOC);
$kayitseti_2_ozelbilgiler_sayisi=count($kayitseti_2_ozelbilgiler);
if  ($kayitseti_2_ozelbilgiler_sayisi>0)
	{
		$ozel_buyuk_resim=$kayitseti_2_ozelbilgiler_ozel_resim;
		for ($sayac=0; $sayac<$kayitseti_2_ozelbilgiler_sayisi; $sayac++) 
			{ 
				$kayitseti_2_ozelbilgiler_ozel_no=$kayitseti_2_ozelbilgiler[$sayac]["numara"];
				$kayitseti_2_ozelbilgiler_ozel_icerik=stripslashes($kayitseti_2_ozelbilgiler[$sayac]["icerik"]);	
				$kayitseti_2_ozelbilgiler_ozel_resim=$kayitseti_2_ozelbilgiler[$sayac]["resim_adres"];		
				$radiobutton=$kayitseti_2_ozelbilgiler[$sayac]["radiobutton"];	
?> 
                					<div class="equal_colsx3" align="center">
									<? if (1==2) {  ?>
									<? if ($radiobutton=='Bottom') { ?>
                                  <div  align="center">
                                    <? } ?>
                                    <? if (file_exists($haber_detay_kucuk_resim_dizini.$kayitseti_2_ozelbilgiler_ozel_resim) && $kayitseti_2_ozelbilgiler_ozel_resim<>"" ){ ?>
                                    <? if ($haber_detay_buyuk_resim_dizini.$kayitseti_2_ozelbilgiler_ozel_resim<>$haber_detay_buyuk_resim_dizini && file_exists($haber_detay_buyuk_resim_dizini.$kayitseti_2_ozelbilgiler_ozel_resim))  { ?>
                                    <div class="highslide-gallery"><a href="<? //echo $seo_uzaklik.$haber_detay_buyuk_resim_dizini.$kayitseti_2_ozelbilgiler_ozel_resim ?>" class="highslide" onclick="return hs.expand(this)">
                                      <? } ?>
                                      <img src="<? echo $seo_uzaklik.$haber_detay_kucuk_resim_dizini.$kayitseti_2_ozelbilgiler_ozel_resim; ?>"
				    <? /* style="max-width:400px; margin-bottom:10px; <? if ($radiobutton=='Left') { ?> margin-right:10px; <? } ?><? if ($radiobutton=='Right') { ?> margin-left:10px; <? } ?> " */ ?>  border="0" <? /* align="<? echo $radiobutton; ?>"  **/ ?> width="100%" />
                                      <? if ($haber_detay_buyuk_resim_dizini.$kayitseti_2_ozelbilgiler_ozel_resim<>$haber_detay_buyuk_resim_dizini && file_exists($haber_detay_buyuk_resim_dizini.$kayitseti_2_ozelbilgiler_ozel_resim))  { ?>
                                    </a></div>
                                    <? } ?>
                                    <? if ($radiobutton=='Bottom') { ?>
                                  </div>
                                	<? } ?>
                                    <? } ?>
                                  <?  print($kayitseti_2_ozelbilgiler_ozel_icerik); ?>  
                                  <? } ?>            
                            
                            
                            		<div class="highslide-gallery">
                                    <a href="<? echo $seo_uzaklik.$haber_detay_kucuk_resim_dizini.$kayitseti_2_ozelbilgiler_ozel_resim; ?>" class="highslide" onclick="return hs.expand(this)">
                                      
                                      <img src="<? echo $seo_uzaklik.$haber_detay_kucuk_resim_dizini.$kayitseti_2_ozelbilgiler_ozel_resim; ?>"  border="0"  width="100%" />
                                      
                                    </a>
                                    </div>
                            
                            			
                            		</div>
                            
  <? 		    }
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