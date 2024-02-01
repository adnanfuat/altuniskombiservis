<? 
include_once("inc_permalink.php");
include("../inc_s/baglanti.php");
include("../inc_s/resim_yeniden_boyutlandir.php");
include("../inc_s/resim_yeniden_boyutlandir_motor.php");			
//////////// Ürünler Uk Sayfasından Gelindiyse //////////////
if  (isset($_GET['ht']))
	{ 
		//echo 1;
		$kategori_ht=$_GET['ht'];
		$recordset=@$baglanti->query("select * from galeri_kategori where htaccess_etiket='$kategori_ht'")->fetchAll(PDO::FETCH_ASSOC);
		if (count($recordset)==0) { header("Location:".$seo_uzaklik.$galeri_uk_permalink); }
		$kategori_ad=$recordset[0]["ad"];
		$kategori_no=$recordset[0]["numara"];
		$altkategorilimi=$recordset[0]["altkategorilimi"];
		$kategori_bg=$recordset[0]["arkaplan"];
	} 
////////////  Ürünler Uk Sayfasından Gelindiyse //////////////
//////////// Ürünler Sayfasından Gelindiyse //////////////
if (isset($_GET['uht']))
   {
		//echo "2";
		$altkategori_ht=$_GET['uht']; //echo $altkategori_ht;
		$galeri_altkategori=@$baglanti->query("select * from galeri_altkategori where htaccess_etiket='$altkategori_ht'")->fetchAll(PDO::FETCH_ASSOC);
		$galeri_altkategori_sayi=count($galeri_altkategori);
		$kategori_no=$galeri_altkategori[0]["ustkategori_no"];
		$kategori_adi_ogren=@$baglanti->query("select * from galeri_kategori where numara='$kategori_no'")->fetchAll(PDO::FETCH_ASSOC);
		$kategori_ad=$kategori_adi_ogren[0]["ad"];
	}
//////////// Ürünler Sayfasında Gelindiyse //////////////
$galeri_altkategori=@$baglanti->query("Select * from galeri_altkategori where aktif=1 and ustkategori_no='$kategori_no' order by siralama asc")->fetchAll(PDO::FETCH_ASSOC);
$altkategori_sayi=count($galeri_altkategori); //echo $altkategori_sayi;
$resim_dizini="../rsmlr/galerialtkategori/";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr">
<head>
<meta charset="UTF-8">
<title><? echo $kategori_ad; ?></title>
<meta name="description" content="<? echo $kategori_ad; ?>"/>
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
<!--<div class="galeri_antet_bg flex_genel_1" style="justify-content:space-around;">

	<div>
    	<div align="center" class="antet_yazi_1">Yurtiçi ve yurtdışı üretimde</div>
    	<div align="center" class="antet_yazi_2">Doğru Adres</div>
    </div>

</div> -->
<div style="  min-height:800px; ">
<div>&nbsp;</div><div>&nbsp;</div>
    
    <div class="index_max_w_1" >
         
        <h1><? echo $kategori_ad; ?></h1>
        <div><a href="<? echo $seo_uzaklik; ?>" class="antet_yol">Ana Sayfa</a> | <a href="<? echo $seo_uzaklik; ?><? echo $galeri_uk_permalink; ?>" class="antet_yol">Tüm Kategoriler</a></div>
        
    
    </div>
    <div>&nbsp;</div><div>&nbsp;</div>
    <div class="flex_genel_1 index_max_w_1" style="justify-content:space-around;">
   

            
<?
                                                    if  ($altkategori_sayi>0) 
                                                        { 
                                                            for ($sayac=0; $sayac<$altkategori_sayi; $sayac++) 
                                                                { 	
                                                                    $grup_adi=$galeri_altkategori[$sayac]['ad']; 
                                                                    $grup_adii=$grup_adi;
                                                                    if (strlen($grup_adi)>53) {$grup_adi=substr($grup_adi,0,50)."..";}
                                                                    $numara=$galeri_altkategori[$sayac]['numara'];
                                                                    $ak_htaccess_etiket=$galeri_altkategori[$sayac]['htaccess_etiket'];
                                                                    $resim_adres=$galeri_altkategori[$sayac]['resim_adres'];			
                                                                    $kategori_urun_sayisi=@$baglanti->query("Select numara from urun_detay where altkategori_no=$numara and aktif=1")->fetchAll(PDO::FETCH_ASSOC);
                                                                    $resim_sayi=count($kategori_urun_sayisi);
                                                                    if ($grup_adi<>'')
                                                                        {
                                                                            if ($resim_adres=='' || !file_exists($resim_dizini.$resim_adres)) {$resim_adres='resimyok.jpg'; }
                                                                                @resim_yeniden_boyutlandir($resim_dizini,$resim_adres,$height_of_image,$width_of_image);
                                                                                //(s) Linki permalink'e göre ayarlanıyor.
                                                                                if  ($permalink_durumu==1)
                                                                                      {
                                                                                          $resimler_link=$resimler_permalink_on."/".$ak_htaccess_etiket;
                                                                                      }
                                                                                     else
                                                                                      {
                                                                                           $resimler_link="resimler.php?akht=$ak_htaccess_etiket";
                                                                                       }
                                                                                //(f) Linki permalink'e göre ayarlanıyor.
                                                ?>       
                                                                                                   
                                                                                              <div class="equal_colsx3" align="center">
                                                                                                    <div style="border:1px solid #000000; padding:30px; background: #FFFFFF">
                                                                                                        <a href="<? echo $seo_uzaklik; ?><? echo $resimler_link; ?>" title="<? echo $grup_adi; ?>">
                                                                                                            <img src="<?  echo $seo_uzaklik; ?><? echo $resim_dizini.$resim_adres; ?>" width="100%" style="max-width:361px; height:auto" 	alt="<? echo $grup_adi; ?>" />
                                                                                                        </a>
                                                                                                        <div>&nbsp;</div>
                                                                                                        <h1 class="index_galeri_h3"><? echo $grup_adi; ?></h1>
                                                                                                    </div>
                                                                                                </div>
                                                       
                                                       
                                                        
                                                        <? } } } ?>  
   
   
     </div>
     
     <div>&nbsp;</div><div>&nbsp;</div>
</div>
<? //include ("inc_kurumsal.php"); ?>
<? // içerik (f) ?>    
</div>
<? include ("inc_footer.php"); ?>
</body>
</html>