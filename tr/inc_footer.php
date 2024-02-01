<? // footer (s) ?>

<div style="background:url(<? echo $seo_uzaklik; ?>_img/a_index1-copy-2_79.jpg) center top; background-size:cover; padding-top:20px; padding-bottom:10px; ">

	<div class="genis_flex_container" style=" max-width:1166px; margin:0 auto;">
    		
            
            
            
            <div class="equal_colsx3">
            	<div >&nbsp;</div><div >&nbsp;</div>
            	<div  class="index_footer_link" style="font-size:20px; color:#ffffff"><strong>BİZE ULAŞIN</strong></div><div>&nbsp;</div>
                <div style="color:#ffffff"><i class="fas fa-map-marker icon_font_footer"></i> Hacıoğlu Mh. 5076. Sk. No: 3 Erenler/Sakarya</div>
                <div style="color:#ffffff"> <i class="fas fa-phone icon_font_footer"></i>  0 264 2411696</div>
				<div style="color:#ffffff"> <i class="fas fa-phone icon_font_footer"></i>  0 530 1445454</div>
				<div style="color:#ffffff"> <i class="fas fa-phone icon_font_footer"></i>  0 530 4102228</div>
				<div style="color:#ffffff"> <i class="fas fa-phone icon_font_footer"></i>  0 535 7270784</div>
                <div style="color:#ffffff"> <i class="fas fa-envelope icon_font_footer"></i> bilgi@sakaryakombiservis.com.tr</div>
                <div>&nbsp;</div>
             
             

                
                <div>
                <? /*
                	<i class="fab fa-instagram icon_font_footer" onclick="window.location='#'"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fab fa-youtube icon_font_footer" onclick="window.location='#'"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fab fa-facebook-f icon_font_footer" onclick="window.location='#'"></i>&nbsp;&nbsp;&nbsp;&nbsp;
					 
                    
                    <i class="fab fa-twitter icon_font_footer" onclick="window.location='#'"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fab fa-pinterest-p icon_font_footer" onclick="window.location='#'"></i>
					*/ ?>
                
                </div>
                

            
            </div>
            
            <div class="equal_colsx3">
            	<div>&nbsp;</div><div>&nbsp;</div>
                <div  class="index_footer_link" style="font-size:20px; color:#ffffff"><strong>HIZLI ERİŞİM</strong></div>
                <div>&nbsp;</div>

				<div class="flex_genel_1">
                	<div class="equal_colsx2">
					<div><a href="<? echo $seo_uzaklik; ?>" class="index_footer_link">• Ana Sayfa</a></div> 
                        <div><a href="<? echo $seo_uzaklik; ?><? echo $hakkimizda_permalink; ?>" class="index_footer_link">• Hakkımızda</a></div>
                        <div><a href="<? echo $seo_uzaklik; ?><? echo $hizmet_kategori_permalink; ?>" class="index_footer_link">• Hizmetler</a></div>    
					
                    </div>
                    <div class="equal_colsx2">
                    	
                    
                        <div><a href="<? echo $seo_uzaklik; ?><? echo $haberler_permalink; ?>" class="index_footer_link">• Blog</a></div>
      					<div><a href="<? echo $seo_uzaklik; ?><? echo $etiketler_permalink; ?>" class="index_footer_link">• Etiketler</a></div>
                       
                    </div>
                </div>
            
            
            </div>
            
           <div class="equal_colsx3">
            	<div>&nbsp;</div><div>&nbsp;</div>
<!--                <div  class="index_footer_link" style="font-size:20px; color:#ffffff;"><strong>TOPRAKTAN ISITMA & SOĞUTMA</strong></div>
                <div>&nbsp;</div>
                
                <div><a href="<?echo $seo_uzaklik; ?>#" class="index_footer_link">•  Yenilenebilir Enerji</a></div>
                
                <div><a href="<?echo $seo_uzaklik; ?>#" class="index_footer_link">       • Toprak Kaynaklı Isı Pompası</a></div>
                <div><a href="<?echo $seo_uzaklik; ?>#" class="index_footer_link">        • Toprak, Su Kaynaklı Isıtma - Soğutma Sistemi Nasıl Çalışır?</a></div>
                <div><a href="<?echo $seo_uzaklik; ?>#" class="index_footer_link">        • Solar Sistemler</a></div>
                 <div><a href="<?echo $seo_uzaklik; ?>#" class="index_footer_link">       • Solar Panel, Güneş Hücresi, Enerji Yaprağı</a></div>
                  <div><a href="<?echo $seo_uzaklik; ?>#" class="index_footer_link">      • Isı pompası Çalışma Prensibi</a></div> -->

               
										<?
										/*
										$inc_footer_urun_kategori=@$baglanti->query("Select * from urun_kategori where aktif=1 and dil=1 order by puan asc")->fetchAll(PDO::FETCH_ASSOC);
										$inc_footer_kategori_sayi=count($inc_footer_urun_kategori);
										
											   if($inc_footer_kategori_sayi>0)
												{
													for ($inc_footer_sayac=0; $inc_footer_sayac<$inc_footer_kategori_sayi; $inc_footer_sayac++) 
														{
															 $inc_footer_kategori_adi=$inc_footer_urun_kategori[$inc_footer_sayac]['ad']; 
															 $inc_footer_kategori_no=$inc_footer_urun_kategori[$inc_footer_sayac]['numara']; 
															 $inc_footer_altkategorilimi=$inc_footer_urun_kategori[$inc_footer_sayac]['altkategorilimi']; 
															 $inc_footer_kategori_htaccess_etiket=$inc_footer_urun_kategori[$inc_footer_sayac]["htaccess_etiket"];
															 if ($inc_footer_altkategorilimi=="var") 
																 { 
																	   if ($permalink_durumu==1) 
																		  { 
																			  $inc_footer_link=$ualtkategori_permalink_on."/".$inc_footer_kategori_htaccess_etiket; 
																		  }
																		else 
																		  { 
																			  $inc_footer_link="urunler_ak.php?ht=$inc_footer_kategori_htaccess_etiket"; 
																		   } 
																 } 
																  else 
																 { 
																	  if  ($permalink_durumu==1) 
																		  { 
																				 $inc_footer_ustkategori_ad_ogren=@$baglanti->query("Select htaccess_etiket from urun_kategori where numara='$inc_footer_kategori_no'")->fetchAll(PDO::FETCH_ASSOC);
																				 $inc_footer_kategori_htaccess_etiket=$inc_footer_ustkategori_ad_ogren[0]["htaccess_etiket"];
																				 $inc_footer_link=$urunler_permalink_on2."/".$inc_footer_kategori_htaccess_etiket;
																		  }
																	  else 
																		 { 
																				 $inc_footer_link="urunler.php?ukht=$inc_footer_kategori_htaccess_etiket"; 
																		 } 
																 } 
											  ?>
                                              				
                                                             <div><a href="<? echo $seo_uzaklik.$inc_footer_link; ?>" class="index_footer_link">• <? echo $inc_footer_kategori_adi; ?></a></div>
                                              
                                              <? 
											  			}
												}
											 */ ?>
                            
                            				<div  align="center"><img src="<? echo $seo_uzaklik; ?>_img/logo.png" style="max-width:250px;" /></div>
											<div>&nbsp;</div>

                                            <div style="color:#ffffff" align="center">&reg; <? echo date('Y'); ?> Altuniş Teknik <br />Tüm hakları saklıdır. </div>
											<div>&nbsp;</div>
											<div class="flex_genel_1"  style="max-width:100px; margin:0 auto;">
												<div style="width:33%;">
													<a href="https://www.proweb.com.tr" target="_blank" rel="nofollow" title="Proweb Mühendislik">
														<img src="<? echo $seo_uzaklik; ?>_img/pw.png" border="0" alt="Proweb Mühendislik" width="100%"/>
													</a>
												</div>	
												<div style="width:33%; color:#ffffff; text-align: center">
												| 
												</div>			
												<div style="width:33%;">
													<a href="https://www.sakaryarehberim.com" target="_blank" rel="nofollow" title="SakaryaRehberim.com">
														<img src="<? echo $seo_uzaklik; ?>_img/sr.png" border="0" alt="SakaryaRehberim.vom"  width="100%"  style="max-width:20px;"/>
													</a>
												</div>
											</div>
            
            
            </div>
            
            
            
            
            
    
    </div>

</div>
<? // footer (f) ?>
<? include ("inc_scrolltop.php"); ?>
<?  include ("inc_sizi_arayalim.php"); ?>