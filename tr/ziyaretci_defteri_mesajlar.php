
<?
include_once("../inc_s/baglanti.php"); 
include_once("inc_permalink.php"); 
$zdefter=@$baglanti->query("Select * from ziyaretci_defteri where aktif=1 and dil='1' order by numara desc")->fetchAll(PDO::FETCH_ASSOC);
$zdefter_sayi=count($zdefter); //echo $zdefter_sayi;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr">
<head>
<meta charset="UTF-8">
<title>Hakkımızdaki Yorumlar | Altuniş Teknik  </title>
<meta name="description" content="Altuniş Teknik  hakkında müşteri yorumları."/>
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
        		<h1>  Hakkımızdaki Yorumlar</h1>
               <br />
<br />



<?
if ($zdefter_sayi>0)
	{
?>
<? for ($sayac=0; $sayac<$zdefter_sayi; $sayac++)
                            {
                                $ad=$zdefter[$sayac]['ad'];
								$mesaj=$zdefter[$sayac]['mesaj'];
                                
                     ?>             
              
                            <div>
                             
                                        <div style="color:#000000">
                                            <strong><? echo  stripslashes($ad); ?></strong><br />
                                            <? echo stripslashes($mesaj); ?>
                                        </div>
                                        <div>&nbsp;</div>
                             
                             
                            </div>


					<? 
							}
					?>

<? 
	}
?>


        </div>
        

</div>
<div>&nbsp;</div><div>&nbsp;</div>
<div class="genis_flex_container cols_available_wrap index_max_w_2">
    <div class="index_hakkimizda_div_buton" onclick="window.location='<? echo $ziyaretci_defteri_form_permalink; ?>'">
    YORUM BIRAK 
    </div>
</div>
<div>&nbsp;</div><div>&nbsp;</div>

<? //include ("inc_kurumsal.php"); ?>
<? // içerik (f) ?>    
</div>
<? include ("inc_footer.php"); ?>
</body>
</html>