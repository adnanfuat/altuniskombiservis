<? @include ("inc_permalink.php"); ?>
<? @include ("../inc_s/baglanti.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr">
<head>
<meta charset="UTF-8">
<title>Referanslar | Altuniş Teknik  </title>
<meta name="description" content="Altuniş Teknik  Referansları"/>
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
        		<h1> Referanslar</h1>
                <p> Firmamızdan yararlanan ve çalışma ortağımız olan değerli işletmeler </p>
     <?
include_once("../inc_s/baglanti.php"); 
include_once("inc_permalink.php"); 
$referanslar=@$baglanti->query("Select * from referanslar where aktif=1 and dil='1' order by siralama asc, numara desc")->fetchAll(PDO::FETCH_ASSOC);
$referanslar_sayi=count($referanslar); //echo $referanslar_sayi;
$resim_dizini="../rsmlr/treferans/";
?>
<? 
	if ($referanslar_sayi>0)
		{ 
?>



            <div class="genis_flex_container index_max_w_1 " style="justify-content: space-around">

                  

                        
                            
                                            <? for ($sayac=0; $sayac<$referanslar_sayi; $sayac++)
                                                    {
                                                        $referans_ad=$referanslar[$sayac]['ad'];
                                                        $referans_numara=$referanslar[$sayac]['numara'];
                                                        $referans_link=$referanslar[$sayac]['link'];
                                                        $referans_detay=$referanslar[$sayac]['detay'];
                                                        $referans_resim=$referanslar[$sayac]['resim_adres'];
                                                        
                                            ?>
                        
                                                                <div class="equal_colsx4">
                                                                
                                                                
                                                                    <div  align="center" style="margin:0 auto; cursor:pointer" onClick="window.location='<? echo $seo_uzaklik; ?><? echo $inc_haber_haber_link; ?>'">
                                                                        <? if (strlen($referans_link)>0) { ?>
                                                                        <a href="<? echo $seo_uzaklik; ?><? echo $referans_link; ?>" title="<? echo stripslashes($referans_ad); ?>"> 
                                                                        <? } ?>
                                                                            <img src="<? echo $seo_uzaklik; ?><? echo $resim_dizini.$referans_resim; ?>" width="100%"  	alt="<? echo stripslashes($referans_ad); ?>" style="border:1px solid #3498db;" />
                                                                      
                                                                        
                                                                        <? if (strlen($referans_link)>0) { ?>
                                                                        </a>
                                                                        <? } ?>
                                                                        <br />
<br />

                                                                        <h2> <? echo $referans_ad; ?></h2>
                														<p> <? echo $referans_detay; ?> </p>
                                                                        
                                                                        
                                                                    </div>
                                                                                                                    
                                                                
                                                                </div>
                                            <? 
                                                        }
                                                
                                            
                                            ?>   




            </div>

            
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