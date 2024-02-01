<? @include ("inc_permalink.php"); ?>
<? @include ("../inc_s/baglanti.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr">
<head>
<meta charset="UTF-8">
<title>Altuniş Teknik | Sakarya Klima Servis Sakarya Kombi Servis Sakarya Beyaz Eşya Servis  </title>
<meta name="description" content="Sakarya'da Kombi Klima Beyaz Eşya Servisi"/>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" fetchpriority="low">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css' fetchpriority="low">
<link rel="stylesheet" href="owl/dist/style.css" fetchpriority="low">
<!-- scrollanim -->
<link rel="stylesheet" href="<? echo $seo_uzaklik; ?>scrollanim/css/style.css">
<script src="<? echo $seo_uzaklik; ?>scrollanim/js/index.js"></script>
<!-- scrollanim -->
</head>
<body>
<? include ("inc_header.php"); ?>
<? include ("inc_manset.php"); ?>
<div>&nbsp;</div>
<div>&nbsp;</div>

<div class="index_margin" > 
<? // index içerik (s) ?>
	
       
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <!--hakkimizda -->
    <div class="flex_genel_1  index_max_w_1" >


        <div class="equal_colsx2 gizle_992">
            <div class="block animatable fadeInUp">
            	<img src="_img/a_index1-copy-2_07.jpg" fetchpriority="low" width="100%"  alt="Altuniş Teknik  " />
            </div>
        </div>


        <div class="equal_colsx2" >
        
        	<div class="block animatable fadeInUp">
        		<div style="margin-left:30px"><h1 class="index_hakkimizda_div_2_yazi" style="color:#252525; font-weight:400; font-size:35px; letter-spacing:3px;">
                Sakarya'nın Teknik Servisi: Altuniş Teknik Servis</h1></div>
                <div>&nbsp;</div>
                <div style="height:1px; background:#000000; max-width:200px;"></div>
                <div>&nbsp;</div>
                <div  style="margin-left:30px">
                	<p class="index_hakkimizda_div_2_yazi_2 ">
                	
                   

                    Sakarya'nın güvenilir teknik servisi Altuniş Teknik, kombi, klima ve beyaz eşya alanında uzmanlaşmıştır. Sektördeki deneyimimiz ve uzman ekibimizle, müşterilerimize kaliteli hizmet sunmayı kendimize ilke edindik. Altuniş Teknik olarak, evinizin ve işyerinizin konforunu sağlamak için her türlü teknik desteği sunuyoruz.
                
                </p>
                </div>
                <div align="right">
                    <div class="index_hakkimizda_div_buton" onclick="window.location='<? echo $hakkimizda_permalink; ?>'">
                    DEVAMI
                    </div>
                </div>
                
            </div>
        
        </div>  
  
    </div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>

    <div style="background:url(_img/hizmetlerimiz.jpg) center top no-repeat; background-size:cover;">
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <? include ("inc_index_hizmetler_2.php");?>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    </div>

    <!-- teklif al -->
    <div class="block animatable fadeInUp">
        
        <div class="index_siparis_div flex_genel_1" style=" justify-content: flex-end; " >
            <div class="flex_genel_1 index_max_w_1" style=" justify-content: flex-end; " >
                <div align="right" style="max-width:600px">
                            <div class="index_siparis_div_yazi" >
                            Altuniş Teknik - Sizin İçin Teknik Çözümler Sunuyor!
                            
                            <br/>
                            Hizmetlerimiz hakkında bilgi almak için bize ulaşın...

                            </div>
                            <div class="flex_genel_1">
                                
                                <div class="equal_colsx2">
                                	 <? 
                            $inc_footer_ekatalog=@$baglanti->query("Select * from dokumantasyon where aktif=1 and dil=1 order by numara desc limit 0,1")->fetchAll(PDO::FETCH_ASSOC);
                            $inc_footer_ekatalog_sayi=count($inc_footer_ekatalog);	
                            $inc_footer_dosya_dizini="../rsmlr/dokumantasyon/";
                            $inc_footer_dosya=$inc_footer_ekatalog[0]["dosya"];	
                            //$dosya_dizini.$inc_menu_dosya
                            //echo "aa".$inc_footer_ekatalog_sayi;
                            if ($inc_footer_ekatalog_sayi>0) {
                          ?> 
                            
                             <div class="index_siparis_div_buton" onclick="window.open('<? echo $seo_uzaklik; ?><? echo $inc_footer_dosya_dizini.$inc_footer_dosya; ?>');">e-KATALOG</div>
                         <? } ?>
                                </div><div class="equal_colsx2">
                                    <div class="index_siparis_div_buton" onclick="document.getElementById('id01').style.display='block'">
                                    BİZE ULAŞ!
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>
   </div>
   
    
    <!--foto galeri -->
    <?
   	$resim_dizini="../rsmlr/galerithumb/";
			$bresim_dizini="../rsmlr/galeridetay/"; 
			$resimler=@$baglanti->query("Select * from galeri_detay where aktif=1 order by puan asc  limit 0,12")->fetchAll(PDO::FETCH_ASSOC);
			$resimler_sayisi=count($resimler); //echo $resimler_sayisi; 
			if  ($resimler_sayisi>0 && 1==1)
				{ 
   ?>
     
    <div  >
    
    <div class="carousel-wrap">
    <div class="owl-carousel" id="owl2">

        <?
		
			
			if  ($resimler_sayisi>0)
				{  
					
			?>
			<?
						for ($sayac=0; $sayac<$resimler_sayisi; $sayac++) 
							{
								/**/		
								$altkategori_adi=stripslashes($resimler[$sayac]['ad']);
								if  (strlen($altkategori_adi)>53)
									{
										$altkategori_adi_kisa=substr($altkategori_adi,0,50)."...";
									}
								else
									{
										$altkategori_adi_kisa=$altkategori_adi;
									}
								$galeri_adi=$resimler[$sayac]['ad'];
								$numara=$resimler[$sayac]['numara'];
								$htaccess_etiket=$resimler[$sayac]['htaccess_etiket'];
								$resim_adres=$resimler[$sayac]['resim_adres'];	
								$aciklama=$resimler[$sayac]['aciklama'];
								if  (strlen($aciklama)>200){ $aciklama=substr($aciklama,0,280)."..."; } else { $aciklama=$aciklama; } 
								$altbilgi=$resimler[$sayac]['uzunluk'];
								
								$ustkategori_numara=$resimler[$sayac]['ustkategori_no']; //echo $ustkategori_numara;
								$ustkategori_etiket_ogren=@$baglanti->query("Select * from galeri_kategori where aktif=1 and numara='$ustkategori_numara'")->fetchAll(PDO::FETCH_ASSOC);
								//echo "Select * from galeri_kategori where aktif=1 and numara='$ustkategori_numara'";
								$ustkategori_ht_say=count($ustkategori_etiket_ogren);
								$ustkategori_ht=$ustkategori_etiket_ogren[0]['htaccess_etiket'];  //echo $ustkategori_ht;
								//if ($sayac1%2==0) {$class="gbg1";} else {$class="gbg2";}
								if ($altkategori_adi<>'')
								   { 
										if ($resim_adres=='' || !file_exists($resim_dizini.$resim_adres)) {$resim_adres='resimyok.jpg'; }
										//(s) Linki permalink'e göre ayarlanıyor.
										if  ($permalink_durumu==1)
											{
												$galeri_link=$resim_permalink_on."/".$ustkategori_ht."/".$htaccess_etiket;
											}
										else
											{
												$galeri_link="resim.php?uht=$ustkategori_ht&ht=$htaccess_etiket";
											}
										//(f) Linki permalink'e göre ayarlanıyor.
										/*if  ($resimler_sayisi==1) 
											{  
											
												//header('Location:'.$seo_uzaklik.$galeri_link); 
												?>
                                                	<script>
														window.location='<? echo $seo_uzaklik.$galeri_link; ?>';
													</script>
                                                <? 
											
											} 	*/ // 1 adet ürün varsa direkt ürüne git.						
			?> 
									
								   <? /*
                                   <div class="highslide-gallery">
                                       <a href="<? echo $seo_uzaklik; ?><? echo $bresim_dizini.$resim_adres; ?>" class="highslide" rel='gal1' onclick="return hs.expand(this)" >
                                       <img src="<? echo $seo_uzaklik; ?><? echo $resim_dizini.$resim_adres; ?>" width="100%" style="max-width:343px;" />
                                       </a>
                                   </div>
                                   */ ?>


                
            <div class="item">
                    <? /* 
                    <div onclick="window.location='<? echo $seo_uzaklik; ?><? echo $galeri_link; ?>'" style="cursor:pointer;">
                      <img src="<? echo $seo_uzaklik; ?><? echo $resim_dizini.$resim_adres; ?>" alt="<<? echo $altkategori_adi_kisa; ?>" title="<? echo $altkategori_adi_kisa; ?>" class="k_galeri_image">
                      <div>&nbsp;</div>
                      <div class="k_galeri_text" align="center"><? echo $altkategori_adi_kisa; ?></div>
                    </div>
                    <div>&nbsp;</div>
					*/ ?>
                       <div class="highslide-gallery" style="max-height:300px; overflow:hidden; border-radius:2px">
                           <a href="<? echo $seo_uzaklik; ?><? echo $bresim_dizini.$resim_adres; ?>" class="highslide" rel='gal1' onclick="return hs.expand(this)" >
                           <img src="<? echo $seo_uzaklik; ?><? echo $resim_dizini.$resim_adres; ?>" width="100%" />
                           </a>
                       </div>
                       <div>&nbsp;</div>
                      
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
<!--       <div style="width:100%; text-align:center;" class="link51"><strong>Kayıt Bulunamadı!</strong></div>
 -->		<?
            	}
        ?>

</div>
</div>




      </div>
    
    </div>
    <? } ?>



    <!-- ürünler -->

    <?
		$urun_kategori=@$baglanti->query("Select * from urun_kategori where aktif=1 and dil=1 order by puan asc")->fetchAll(PDO::FETCH_ASSOC);
		$kategori_sayi=count($urun_kategori);
		$resim_dizini="../rsmlr/urunkategori/";
        if($kategori_sayi>0)
				{
		?>

    <div class="block animatable bounceIn">
     <div align="center"  style="color:#252525; font-weight:400; font-size:35px; letter-spacing:3px;">ÜRÜNLERİMİZ</div>
     <div>&nbsp;</div>

    <div align="center" class=" index_max_w_1">

        
        <div class="genis_flex_container  " style="justify-content:space-around;">
   
   

            


			<? 
            if($kategori_sayi>0)
				{
					for ($sayac=0; $sayac<$kategori_sayi; $sayac++) 
						{
							$kategori_adi=$urun_kategori[$sayac]['ad']; 
							$kategori_aciklama=$urun_kategori[$sayac]['aciklama'];
							$kategori_no=$urun_kategori[$sayac]['numara']; 
							$resim_adres=$urun_kategori[$sayac]['resim_adres']; 
							$altkategorilimi=$urun_kategori[$sayac]['altkategorilimi']; 
							$kategori_htaccess_etiket=$urun_kategori[$sayac]["htaccess_etiket"]; 
							$kategori_resim_sayisi=@$baglanti->query("Select numara from urun_altkategori where ustkategori_no=$kategori_no and aktif=1")->fetchAll(PDO::FETCH_ASSOC); 
							$resim_sayi=count($kategori_resim_sayisi);
							 if ($kategori_adi<>'')
								  {
									 if ($resim_adres=='' || !file_exists($resim_dizini.$resim_adres)) {$resim_adres='resimyok.jpg'; } 
									 //resim_yeniden_boyutlandir($resim_dizini,$resim_adres,$height_of_image,$width_of_image); 
									 if ($altkategorilimi=="var") 
										 { 
											   if ($permalink_durumu==1) 
												  { 
													  $link=$ualtkategori_permalink_on."/".$kategori_htaccess_etiket; 
												  }
												else 
												  { 
													  $link="urunler_ak.php?ht=$kategori_htaccess_etiket"; 
												   } 
										 } 
										  else 
										 { 
											  if  ($permalink_durumu==1) 
												  { 
														 $ustkategori_ad_ogren=@$baglanti->query("Select htaccess_etiket from urun_kategori where numara='$kategori_no'")->fetchAll(PDO::FETCH_ASSOC);
														 $kategori_htaccess_etiket=$ustkategori_ad_ogren[0]["htaccess_etiket"];
														 $link=$urunler_permalink_on2."/".$kategori_htaccess_etiket;
												  }
											  else 
												 { 
														 $link="urunler.php?ukht=$kategori_htaccess_etiket"; 
												 } 
										 }
            ?>  

                                                          <div class="equal_colsx2" >
                                                            
                                                                
                                                                <div class="k_urun_container" onclick="window.location='<? echo $seo_uzaklik; ?><? echo $link; ?>'" >
                                                                  <img src="<? echo $seo_uzaklik; ?><? echo $resim_dizini.$resim_adres; ?>" alt="<? echo $kategori_adi; ?>" title="<? echo $kategori_adi; ?>" class="k_urun_image" >
                                                                  <div class="k_urun_middle0">&nbsp;</div>
                                                                  <div class="k_urun_middle"> <div class="k_urun_text"><? echo $kategori_adi; ?></div> </div>
                                                                </div>
                                                                <div>&nbsp;</div>
                                                           
                                                        </div>
            <? 
								   }
							}
					}
			
			?>


  
                            
   
   
     </div>
        
        
        
    </div>
    <div>&nbsp;</div>
    <div class="index_hakkimizda_div_buton" onclick="window.location='<? echo $urunler_uk_permalink; ?>'" style="margin:0 auto">
                    TÜMÜNÜ İNCELE
    </div>
   </div>
     <div>&nbsp;</div>
     <div>&nbsp;</div>


<? } ?>


 




    <!-- referanslar -->
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
        
     
        
                    <div align="center" class="index_baskliklari_1" style="color:#252525; font-weight:400; font-size:35px; letter-spacing:3px;"> REFERANSLARIMIZ </div>
                    <div align="center"><p>Çok değerli referanslarımızdan bazıları...<p></div>
                
                    <div>&nbsp;</div> 
                    <div>&nbsp;</div> 
        
                    <div class="flex_genel_1 index_max_w_1 ">
        
                            <div class="carousel-wrap">
                                <div class="owl-carousel" id="owl1">
        
                                
                                    
                                                    <? for ($sayac=0; $sayac<$referanslar_sayi; $sayac++)
                                                            {
                                                                $referans_ad=$referanslar[$sayac]['ad'];
                                                                $referans_numara=$referanslar[$sayac]['numara'];
                                                                $referans_link=$referanslar[$sayac]['link'];
                                                                $referans_detay=$referanslar[$sayac]['detay'];
                                                                $referans_resim=$referanslar[$sayac]['resim_adres'];
                                                                
                                                    ?>
                                
                                                                        <div class="item">
                                                                        
                                                                        
                                                                            <div  align="center" style="margin:0 auto; cursor:pointer ">
                                                                                <? if (strlen($referans_link)>0) { ?>
                                                                                <a href="<? echo $seo_uzaklik; ?><? echo $referans_link; ?>" title="<? echo stripslashes($referans_ad); ?>"> 
                                                                                <? } ?>
                                                                                    <img src="<? echo $seo_uzaklik; ?><? echo $resim_dizini.$referans_resim; ?>" width="100%"  	alt="<? echo stripslashes($referans_ad); ?>"  style="border:1px solid #3498db;"/>
                                                                              
                                                                                
                                                                                <? if (strlen($referans_link)>0) { ?>
                                                                                </a>
                                                                                <? } ?>
                                                                                <h3> <? echo $referans_ad; ?></h3>
                                                                                
                                                                                
                                                                                
                                                                            </div>
                                                                                                                            
                                                                        
                                                                        </div>
                                                    <? 
                                                                }
                                                        
                                                    
                                                    ?>   
        
        
        
                                </div>
                            </div>
        
                    </div>
        

        
                    <div>&nbsp;</div><div>&nbsp;</div>
                    
        <? 
                }
        ?>

    <!--index haberler -->
    <? 
		$kayit_seti=@$baglanti->query("Select * from haberler where aktif=1 and dil=1 order by numara desc limit 0,4")->fetchAll(PDO::FETCH_ASSOC);
		//$baglanti->errorInfo();
		$kayit_seti_sayisi=count($kayit_seti); //echo $kayit_seti_sayisi;
		$resim_dizini="../rsmlr/haberthumb/";
		$width_of_image=242;
		$height_of_image=182; 

	
	?>
    <? /* 
     <div align="center" class="index_baskliklari_1" style="color:#252525; font-weight:400; font-size:35px; letter-spacing:3px;"> BLOG YAZILARI </div>
                    <!--<div align="center"><p>Firmamızdan yararlanan ve çalışma ortağımız olan değerli işletmeler<p></div> -->
                
                    <div>&nbsp;</div> 
                    <div>&nbsp;</div>  */ ?>
     <div style="max-width:1248px; margin: 0 auto">
  	  
 	  
      
    				<? if ($kayit_seti_sayisi>0) { ?>
                <?
                    for ($sayac=0; $sayac<$kayit_seti_sayisi; $sayac++) 
                        {   
							//echo $kayit_seti_sayisi;
							$kayit_seti_no=$kayit_seti[$sayac]["numara"];
							$kayit_seti_baslik=$kayit_seti[$sayac]["ad"];
							$kayit_seti_htaccess_etiket=$kayit_seti[$sayac]["htaccess_etiket"];
							$kayit_seti_resim_adres=$kayit_seti[$sayac]["resim_adres"];
							$kayit_seti_ozet=$kayit_seti[$sayac]["ozet"];//echo $kayit_seti_ozet."özetttt";
							if  (strlen($kayit_seti_ozet)>200) 
								{ 
										$pos=strpos($kayit_seti_ozet,' ',400); 
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
												$haber_link=$haber_permalink_on."/".$kayit_seti_htaccess_etiket;
											}
										else
											{
												$haber_link="haber_detay.php?ht=$kayit_seti_htaccess_etiket";
											}
							   }
							 else
								{
										if  ($permalink_durumu==1)
											{
												$perma_icerik=permalink_daralt($kayit_seti_baslikk,70);
												
												$permalink_on=permalink_duzenle($haber_permalink_on."-".$perma_icerik);
												
												$haber_link=$permalink_on."-".$kayit_seti_no.".html";
											}
										else
											{
												$haber_link="haber_detay.php?id=$kayit_seti_no";
											}
								}
							//(f) Haberin linki permalink'e göre ayarlanıyor.
							
							if  (strlen($kayit_seti_baslik)>$word_wrap_value)
								{
									$kayit_seti_baslik=substr($kayit_seti_baslik,0,$word_wrap_value)."...";
								}
							
                ?> 
                            
                            
                          
                                            
                            
                            
                          
                                 <div class="block animatable fadeInUp">
                                    <div class=" index_max_w_1"  >
                                        <div>&nbsp;</div>
                                        <div class="flex_genel_1" style=" width:95%;  margin:0 auto;" >
                                            <div class="equal_colsx2">
                                                
                                                <a href="<? echo $seo_uzaklik; ?><? echo $haber_link; ?>" title="Altuniş Teknik ">
                                                 <img src="<? echo $seo_uzaklik; ?><? print $resim_dizini.$kayit_seti_resim_adres;  ?>" width="100%" style="max-width:500px"  fetchpriority="low"	alt="Altuniş Teknik " />
                                                </a>
                                            </div>
                                            
                                            <div class="equal_colsx2">
                                                    <div>
                                                        <h1 style="font-size:24px; font-weight:300"><? echo stripslashes($kayit_seti_baslik); ?></h1>
                                                    </div>
                                                    
                                                    <div style="color:#000000">
                                                    <p> <? echo stripslashes($kayit_seti_ozet); ?></p>
                                
                                                    </div>
                                                    <div>&nbsp;</div>
                                                    <div align="right">
                                                    
                                                
                                                    <div class="index_hakkimizda_div_buton" onclick="window.location='<? echo $seo_uzaklik; ?><? echo $haber_link; ?>'">
                                                    DEVAMI
                                                    </div>
                                                    
                                                    </div>
                                            </div>
                                        </div>
                                        <div>&nbsp;</div>
                                	</div> 
                                 </div>  
                                 <div>&nbsp;</div>
                          
                                                    
                            
                <? 
                        }
                    } 
					else 
					{
                ?>
					
				<? 
					}
				?>  
      
      
      
      
      
      
      
      
       
     </div>
        


     <? /* 
    <!--Neden Bizi Tercih Etmelisiniz? -->
    <div style="background:url(_img/index_neden_bg.jpg) center top no-repeat; background-size:cover; ">
   

    <div>&nbsp;</div><div>&nbsp;</div>
    <div class="genis_flex_container index_max_w_1">
    <div class="equal_colsx3" align="center">
        <img src="_img/neden1.png" alt="Altuniş Teknik  "  width="100%" style="max-width:150px"/><br /><br />
        <h2 style="color:#ffffff; font-size:25px; text-align:center; font-weigt:300;"> Ücretsiz Servis</h2><br />
        <h3 style="color:#FFFFFF;"></h3>
    </div>

            <div class="equal_colsx3" align="center">
        <img src="_img/neden3.png" alt="Altuniş Teknik  "  width="100%" style="max-width:150px"/><br /><br />
        <h2 style="color:#ffffff; font-size:25px; text-align:center; font-weigt:300;"> Profesyonel Temizlik</h2><br />
        <h3 style="color:#FFFFFF;"></h3>
    </div>
            <div class="equal_colsx3" align="center">
        <img src="_img/neden4.png" alt="Altuniş Teknik  "  width="100%" style="max-width:150px"/><br /><br />
        <h2 style="color:#ffffff; font-size:25px; text-align:center; font-weigt:300;"> Hızlı Çözüm</h2><br />
        <h3 style="color:#FFFFFF;"></h3>
    </div>
    <div>&nbsp;</div><div>&nbsp;</div>

            

    </div>
    <div>&nbsp;</div><div>&nbsp;</div>

    </div> 
*/ ?>

    <div style="background:url(_img/hizmetlerimiz.jpg) center top repeat"> 
 <div>&nbsp;</div><div>&nbsp;</div>   
     <!-- hakkımızda ne dediler -->
     <div class="flex_genel_1 index_max_w_1">
    	
        	<div class="equal_colsx2">
            	<div class="block animatable bounceInLeft">
            		<div class="flex_genel_1" style="background:url(_img/a_index1-copy-2_53.jpg) center top; min-height:242px; background-size:cover;">
                    		<div class="index_ikili_buton" onclick="window.location='<? echo $seo_uzaklik; ?><? echo $iletisim_permalink; ?>'">
                            	BİZE ULAŞIN
                            </div>
                    </div>
                  </div>
            
            </div>
            <div class="equal_colsx2">
            	<div class="block animatable bounceInRight">
            		<div class="flex_genel_1" style="background:url(_img/a_index1-copy-2_55.jpg) center top; min-height:242px; background-size:cover;">
                    		<div class="index_ikili_buton" onclick="window.location='<? echo $seo_uzaklik; ?><? echo $hizmet_kategori_permalink; ?>'">
                            	HİZMETLER
                            </div>
                    </div>
            	</div>
            </div>
            
    </div>
	<div>&nbsp;</div><div>&nbsp;</div>   
    
  </div>  
  <? include ("inc_index_etiketler.php"); ?> 
        
<? // index içerik (f) ?>    
</div>
<? include ("inc_footer.php"); ?>
<?  include ("inc_sosyal_medya_iconlar.php"); ?>
</body>
</html>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js' fetchpriority="low"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js' fetchpriority="low"></script>
<script src='https://use.fontawesome.com/826a7e3dce.js' fetchpriority="low"></script>
<script  src="owl/dist/script.js" fetchpriority="low"></script>