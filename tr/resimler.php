<? 
include_once("../inc_s/baglanti.php");
include ("inc_permalink.php");
include("../inc_s/resim_yeniden_boyutlandir.php");
include("../inc_s/resim_yeniden_boyutlandir_motor.php");
include("../inc_s/sayfa_no_belirle.php");
$width_of_image=302;
$height_of_image=227;			 
$bir_sayfadaki_toplam_kayit_sayisi=8000; /*Sayfalamayı iptal ettiğimiz için sayıyı büyük verdik */ //$bir_sayfadaki_toplam_kayit_sayisi=48;
if  (isset($_GET['akht']) && $_GET['akht']<>'') 
	{ 
		//echo 1111;
		$altkategori_htaccess=$_GET['akht'];
		$ust_ve_altkategori_numarasi_ogren=@$baglanti->query("Select * from galeri_altkategori where htaccess_etiket='$altkategori_htaccess'")->fetchAll(PDO::FETCH_ASSOC);
		$ustkategori_no=$ust_ve_altkategori_numarasi_ogren[0]["ustkategori_no"];
		$uk=$ustkategori_no; 
		$altkategori_no=$ust_ve_altkategori_numarasi_ogren[0]["numara"];
		$ak=$altkategori_no; //echo "ak: ".$ak;
	}	
else if (isset($_GET['ukht'])) 
	{	
		//echo 2222;
		$ustkategori_htaccess=$_GET['ukht'];  //echo $ustkategori_htaccess;
		$ustkategori_numarasi_ogren=@$baglanti->query("Select * from galeri_kategori where htaccess_etiket='$ustkategori_htaccess'")->fetchAll(PDO::FETCH_ASSOC);
		$ustkategori_no=$ustkategori_numarasi_ogren[0]["numara"]; //echo $ustkategori_no;
		$uk=$ustkategori_no;
	}
$altkategorilimi=@$baglanti->query("Select altkategorilimi from galeri_kategori where numara='$uk'")->fetchAll(PDO::FETCH_ASSOC);
$altkategorilimi=$altkategorilimi[0]["altkategorilimi"]; //echo "x ".$altkategorilimi." y ";
// Sayfalama Icin Verileri Hazirla
$limit_ilk_deger=($sayfa_no-1)*$bir_sayfadaki_toplam_kayit_sayisi;
if (isset($altkategori_htaccess))
   { 
	  $sql_cumlesi="select numara from galeri_detay where aktif=1 and altkategori_no=".$altkategori_no;
   }
else if (isset($ustkategori_htaccess))
   { 	
	  $sql_cumlesi="select numara from galeri_detay where aktif=1 and ustkategori_no=".$ustkategori_no;
   }
$calistir_sql=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);																																																			
$toplam_kayit_sayisi_calistir_sql=count($calistir_sql);
include("../inc_s/sayfalama.php");
sayfala($toplam_kayit_sayisi_calistir_sql,$bir_sayfadaki_toplam_kayit_sayisi);
// Sayfalama Icin Verileri Hazirla (f)	
$recordset=@$baglanti->query("select * from galeri_altkategori where numara='$altkategori_no'")->fetchAll(PDO::FETCH_ASSOC);
$altkategori_ad=$recordset[0]["ad"]; //echo "aaaaaaaa".$altkategori_ad;
//$altkategori_aciklama=$recordset[0]["aciklama"];
$uk_recordset=@$baglanti->query("select * from galeri_kategori where numara='$uk'")->fetchAll(PDO::FETCH_ASSOC);
$uk_kategori_ad=$uk_recordset[0]["ad"]; // echo $uk_kategori_ad;
$uk_kategori_aciklama=$uk_recordset[0]["aciklama"];
//$link_inherit="projeler.php?id=$altkategori_no&uk=$ustkategori_no"; 
//(s) Linki permalink'e göre ayarlanıyor.
if  ($permalink_durumu==1)
	{
		$permalink_on=permalink_duzenle($resimler_permalink_on);
		$link_inherit=$permalink_on;
	}
else
	{
		$link_inherit="resimler.php";
	}
//(f) Linki permalink'e göre ayarlanıyor.
//(s) projeler Ak linki permalink'e göre ayarlanıyor.
if  ($permalink_durumu==1)
	{
		$galtkategori_link=$galtkategori_permalink_on2."/".$altkategori_htaccess; //echo $paltkategori_link;
	}
else
	{
		$galtkategori_link="galeri_ak.php?akht=$altkategori_htaccess";
	}
//(f) projeler Ak linki permalink'e göre ayarlanıyor. 
$resim_dizini="../rsmlr/galerithumb/";
$bresim_dizini="../rsmlr/galeridetay/"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr">
<head>
<meta charset="UTF-8">
<title><? if (isset($ustkategori_no) && $altkategorilimi=="yok"){ ?><? echo $uk_kategori_ad; ?><? } else { ?><? echo $altkategori_ad; ?><? } ?></title>
<meta name="description" content="<? if (isset($ustkategori_no) && $altkategorilimi=="yok"){ ?><? echo $uk_kategori_ad; ?><? } else { ?><? echo $altkategori_ad; ?><? } ?>"/>
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


<div style="  min-height:800px; ">
<div>&nbsp;</div><div>&nbsp;</div>
    
    <div class=" index_max_w_1">
        
        <h1><? if (isset($ustkategori_no) && $altkategorilimi=="yok"){ ?><? echo $uk_kategori_ad; ?><? } else { ?><? echo $altkategori_ad; ?><? } ?></h1>
        <div><a href="<? echo $seo_uzaklik; ?>" class="antet_yol">Ana Sayfa</a> | <a href="<? echo $seo_uzaklik; ?><? echo $galeri_uk_permalink; ?>" class="antet_yol">Tüm Kategoriler</a></div>
        
    
    </div>
    <div>&nbsp;</div><div>&nbsp;</div>
    <div class="flex_genel_1 index_max_w_1" style="justify-content:space-around;">
   
   

            
          <?
        $resim_dizini="../rsmlr/galerithumb/";
        $bresim_dizini="../rsmlr/galeridetay/"; 
        if  (isset($altkategori_no))				
            {
                $galeriler=@$baglanti->query("Select * from galeri_detay where aktif=1 and altkategori_no=$altkategori_no order by puan asc  limit $limit_ilk_deger,$bir_sayfadaki_toplam_kayit_sayisi")->fetchAll(PDO::FETCH_ASSOC);				
            }
        else if (isset($ustkategori_no))
            {
                $galeriler=@$baglanti->query("Select * from galeri_detay where aktif=1 and ustkategori_no=$ustkategori_no order by puan asc  limit $limit_ilk_deger,$bir_sayfadaki_toplam_kayit_sayisi")->fetchAll(PDO::FETCH_ASSOC);
            }
        $galeriler_sayisi=count($galeriler); //echo $galeriler_sayisi;
        if  ($galeriler_sayisi>0)
            {  
        ?>
        <?
                    for ($sayac=0; $sayac<$galeriler_sayisi; $sayac++) 
                        {
							/**/		
											$altkategori_adi=stripslashes($galeriler[$sayac]['ad']);
											
											
											if  (strlen($altkategori_adi)>100) 
												{ 
													$pos=strpos($altkategori_adi,' ',150); 
													if 	($pos>0) 
														{ 
															$altkategori_adi_kisa=substr($altkategori_adi,0,$pos)."..."; 
														} 
													else 
														{ 
															$altkategori_adi_kisa=$altkategori_adi; 
														} 
												} 
											else 
												{ 
													$altkategori_adi_kisa=$altkategori_adi; 
												}	


											$galeri_adi=$galeriler[$sayac]['ad'];
											$numara=$galeriler[$sayac]['numara'];
											$htaccess_etiket=$galeriler[$sayac]['htaccess_etiket'];
											$fiyat=$galeriler[$sayac]['fiyat'];
											$resim_adres=$galeriler[$sayac]['resim_adres'];	
											$aciklama=$galeriler[$sayac]['aciklama'];
											if  (strlen($aciklama)>200){ $aciklama=substr($aciklama,0,280)."..."; } else { $aciklama=$aciklama; } 
											
											
											$ustkategori_numara=$galeriler[$sayac]['ustkategori_no']; //echo $ustkategori_numara;
											$ustkategori_etiket_ogren=@$baglanti->query("Select * from galeri_kategori where numara='$ustkategori_numara'")->fetchAll(PDO::FETCH_ASSOC);
											//echo "Select * from galeri_kategori where aktif=1 and numara='$ustkategori_numara'";
											$ustkategori_ht_say=count($ustkategori_etiket_ogren);
											$ustkategori_ht=$ustkategori_etiket_ogren[0]['htaccess_etiket']; // echo $ustkategori_ht;
												
											
											$dlink=$galeriler[$sayac]['dlink'];
											$dlink2=$galeriler[$sayac]['dlink2'];
											//if ($sayac1%2==0) {$class="gbg1";} else {$class="gbg2";}
											if ($altkategori_adi<>'')
											   { 
													if ($resim_adres=='' || !file_exists($resim_dizini.$resim_adres)) {$resim_adres='resimyok.jpg'; }
													@resim_yeniden_boyutlandir($resim_dizini,$resim_adres,$height_of_image,$width_of_image);
													//(s) Linki permalink'e göre ayarlanıyor.
													if  ($permalink_durumu==1)
														{
															$galeri_link=$resim_permalink_on."/".$ustkategori_ht."/".$htaccess_etiket;
														}
													else
														{
															$galeri_link="resim.php?uht=$ustkategori_ht&ht=$htaccess_etiket";
														}
														//echo $galeri_link;
													//(f) Linki permalink'e göre ayarlanıyor.							
        ?> 
                                


                                            
                                                      <div class="equal_colsx3" align="center">
                                                        <div style="border:1px solid #000000; padding:30px; background: #FFFFFF">
                                        
                                                            <div class="highslide-gallery">
                                                                <a href="<? echo $seo_uzaklik; ?><? echo $resim_dizini.$resim_adres; ?>" class="highslide" rel='gal1' onclick="return hs.expand(this)" title="<? echo $altkategori_adi_kisa; ?>">
                                                                    <img src="<? echo $seo_uzaklik; ?><? echo $resim_dizini.$resim_adres; ?>" 	alt="<? echo $altkategori_adi_kisa; ?>" width="100%" style="max-width:371px; height:auto"/>
                                                                </a>
                                                            </div>
                                                            <div>&nbsp;</div>
                                                            <h1 class="index_galeri_h3"><? echo $altkategori_adi_kisa; ?></h1>
                                                        </div>
                                                    </div>
                    
                    
                    
                    <?
            				}
        ?>        
        <?
						}
            }
        else
            {	
        ?>
         Kayıt Bulunamadı! 
                <?
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