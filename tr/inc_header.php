





<div class="header" id="header" >
    <div class="flex_genel_1 cols_available_wrap index_max_w_1">
        
        <div style="max-width:300px;min-width:300px;width:300px; margin: 0 auto;">
        	<a href="<? echo $seo_uzaklik; ?>" title="Altuniş Teknik ">
            	<img src="<? echo $seo_uzaklik; ?>_img/logo.png" border="0" id="logo" width="100%" style="max-width:250px; height:auto; " alt="Altuniş Teknik "/>
            </a>
        </div>

        
        <div class="cols_available">
            
            <div  style= " max-width:768px; margin:0 auto;"  > 
              <div class="flex_genel_1  index_max_w_1" style=" padding:10px 0; justify-content:space-between">
              <div class="equal_colsx2 gizle_992"><span class="inc_banner_yazi_2"><i class="fas fa-map"  style="color: #3498db"></i> Hacıoğlu Mh. 5076. Sk. No: 3 Erenler/Sakarya </span> </div>
                <div class="equal_colsx2 numara_hizala" >
                  
                  <div>
                    <span class="inc_banner_yazi_2" onclick="window.open('tel:02642411696')";><i class="fas fa-mobile" style="color: #3498db"></i> 0 264 2411696 | </span>
                    <span class="inc_banner_yazi_2" onclick="window.open('tel:05301445454')";>0 530 1445454  |</span>
                  </div> 
                 
                  <div>
                    <span class="inc_banner_yazi_2" onclick="window.open('tel:05304102228')";>0 530 4102228 |</span>
                    <span class="inc_banner_yazi_2" onclick="window.open('tel:05357270784')";>0 535 7270784</span>
                  </div> 
                  
                
                </div>
              </div> 
            </div>

            <div  >
                	
                    
                    <div class="menu_div_content index_max_w_1" style=" padding:0px 0;">    
                                <!--ANA SAYFA KOLEKSİYONLAR REFERANSLAR PROFİL E-KATALOG İLETİŞİM -->
                               
                                   
                                           
                                <div class="topnav" id="myTopnav">
                            
                            <a href="<?echo $seo_uzaklik; ?>">  ANA SAYFA</a>                                                
                           
                            
                
                            <a href="<? echo $seo_uzaklik; ?><? echo $hakkimizda_permalink; ?>"> HAKKIMIZDA </a>  
                
                
                            <? 
                              $inc_menu_kayit_seti=@$baglanti->query("Select * from hizmet_kategori  where aktif=1 and dil=1 order by puan asc")->fetchAll(PDO::FETCH_ASSOC);
                              $inc_menu_kayit_seti_sayisi=count($inc_menu_kayit_seti); //echo $inc_menu_kayit_seti_sayisi;
                              if ($inc_menu_kayit_seti_sayisi>0)
                                { 
                            ?>
                                  <div class="dropdown <? /*gz_1024 */ ?>">
                                      <button class="dropbtn"  style="cursor:pointer; line-height: initial;"> HİZMETLERİMİZ <i class="fa fa-chevron-down" ></i> </button>
                                        <div class="dropdown-content">
                                        
                                        <? 
                                                for ($inc_menu_sayac=0; $inc_menu_sayac<$inc_menu_kayit_seti_sayisi; $inc_menu_sayac++) 
                                                    {
                                                        
                                                        
                
                                                        $inc_menu_kayit_seti_no=$inc_menu_kayit_seti[$inc_menu_sayac]["numara"];
                                                        $inc_menu_kayit_seti_baslik=$inc_menu_kayit_seti[$inc_menu_sayac]["ad"];
                                                        $inc_menu_kayit_seti_htaccess_etiket=$inc_menu_kayit_seti[$inc_menu_sayac]["htaccess_etiket"];
                
                
                                                        if  ($permalink_durumu==1)
                                                            {
                                                                $inc_menu_hizmet_link=permalink_duzenle($hizmet_permalink_on)."/".$inc_menu_kayit_seti_htaccess_etiket;
                                                            }
                                                            else
                                                            {
                                                                $inc_menu_hizmet_link="hizmet_detay.php?ht=$inc_menu_kayit_seti_htaccess_etiket";
                                                            }
                                            ?>
                                                        <a href="<? echo $seo_uzaklik; ?><? echo $inc_menu_hizmet_link; ?>"><? echo $inc_menu_kayit_seti_baslik; ?></a>
                                            <? 
                                                    }
                                            ?>
                                            <a href="<? echo $seo_uzaklik; ?><? echo $hizmet_kategori_permalink; ?>">+ Tüm Hizmetler</a>
                                        
                                        </div>
                                  </div>
                
                            <?  
                                }  
                            ?>     
                            
                            <? 
                            $inc_menu_urun_kayit_seti=@$baglanti->query("Select * from urun_kategori  where aktif=1 and dil=1 order by puan asc")->fetchAll(PDO::FETCH_ASSOC);
                            $inc_menu_urun_kayit_seti_sayisi=count($inc_menu_urun_kayit_seti); //echo $inc_menu_urun_kayit_seti_sayisi;
                            if ($inc_menu_urun_kayit_seti_sayisi>0)
                              { 
                            ?>
                                <div class="dropdown <? /*gz_1024 */ ?>">
                                      <button class="dropbtn"  style="cursor:pointer; line-height: initial;"> ÜRÜNLER <i class="fa fa-chevron-down"  ></i> </button>
                                      <div class="dropdown-content">
                                      
                                      <? 
                                              for ($inc_menu_urun_sayac=0; $inc_menu_urun_sayac<$inc_menu_urun_kayit_seti_sayisi; $inc_menu_urun_sayac++) 
                                                  {
                                                      
                                                      
                
                                                      $inc_menu_urun_kayit_seti_no=$inc_menu_urun_kayit_seti[$inc_menu_urun_sayac]["numara"];
                                                      $inc_menu_urun_kayit_seti_baslik=$inc_menu_urun_kayit_seti[$inc_menu_urun_sayac]["ad"];
                                                      $inc_menu_urun_kayit_seti_htaccess_etiket=$inc_menu_urun_kayit_seti[$inc_menu_urun_sayac]["htaccess_etiket"]; //echo $inc_menu_urun_kayit_seti_htaccess_etiket;
                                                      $inc_menu_urun_kayit_seti_altkategorilimi=$inc_menu_urun_kayit_seti[$inc_menu_urun_sayac]['altkategorilimi'];  //echo  $inc_menu_urun_kayit_seti_altkategorilimi;
                
                                                      if ($inc_menu_urun_kayit_seti_altkategorilimi=="var") 
                                                        { 
                                                            if ($permalink_durumu==1) 
                                                                { 
                                                                    $inc_menu_urun_kayit_seti_link=$ualtkategori_permalink_on."/".$inc_menu_urun_kayit_seti_htaccess_etiket; 
                                                                }
                                                            else 
                                                                { 
                                                                    $inc_menu_urun_kayit_seti_link="urunler_ak.php?ht=$inc_menu_urun_kayit_seti_htaccess_etiket"; 
                                                                } 
                                                        } 
                                                        else 
                                                        { 
                                                            if  ($permalink_durumu==1) 
                                                                { 
                                                                        $inc_menu_urun_ustkategori_ad_ogren=@$baglanti->query("Select htaccess_etiket from urun_kategori where numara='$inc_menu_urun_kayit_seti_no'")->fetchAll(PDO::FETCH_ASSOC);
                                                                        $inc_menu_urun_kayit_seti_htaccess_etiket=$inc_menu_urun_ustkategori_ad_ogren[0]["htaccess_etiket"];
                                                                        $inc_menu_urun_kayit_seti_link=$urunler_permalink_on2."/".$inc_menu_urun_kayit_seti_htaccess_etiket;
                                                                }
                                                            else 
                                                                { 
                                                                    $inc_menu_urun_kayit_seti_link="urunler.php?ukht=$inc_menu_urun_kayit_seti_htaccess_etiket"; 
                                                                } 
                                                        }
                                          ?>
                                                      <a href="<? echo $seo_uzaklik; ?><? echo $inc_menu_urun_kayit_seti_link; ?>"><? echo $inc_menu_urun_kayit_seti_baslik; ?></a>
                                          <? 
                                                  }
                                          ?>
                
                                          <a href="<? echo $seo_uzaklik; ?><? echo $urunler_uk_permalink; ?>">+ Tüm Ürünler</a>
                
                                      
                                      </div>
                                </div>
                
                            <?  
                              }  
                            ?>    
                           
                            <a href="<? echo $seo_uzaklik; ?><? echo $haberler_permalink; ?>"> HABER / BLOG  </a>  
                            
                            <? /*    
                
                            <a href="<? echo $seo_uzaklik; ?><? echo $galeri_uk_permalink; ?>"> FOTO GALERİ</a>
                            <a href="<? echo $seo_uzaklik; ?><? echo $videolar_permalink; ?>"> VİDEOLAR</a>
                            <a href="<? echo $seo_uzaklik; ?><? echo $referanslar_permalink; ?>">Referanslar</a>
                
                        
                             */ ?>
                              
                            <div class="dropdown <? /*gz_1024 */ ?>">
                              <button class="dropbtn"  style="cursor:pointer; line-height: initial;"> İLETİŞİM <i class="fa fa-chevron-down"   ></i> </button>
                              <div class="dropdown-content">
                                <a href="<? echo $seo_uzaklik; ?><? echo $iletisim_permalink; ?>">İletişim Bilgileri</a>
                                <a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='block'">Bize Ulaşın</a>                               
                              </div>
                            </div>
                            <? /* 
                            <a href="<? echo $seo_uzaklik; ?>">EN</a>     
                            <a href="<? echo $seo_uzaklik; ?>">DE</a>    
                            */ ?> 
                            <a href="javascript:void(0);" style="font-size:30px; padding:0 20px;" class="icon" onclick="myFunction()">&#9776;</a>                      
                                        
                          </div>
                                           
                                        
                                        
                                    
                                    
                                 
                  
                			</div>
                            <!--<a onclick="openNav()">
                            <div style="background:#4db851; padding:15px 10px; cursor:pointer; border-radius: 5px" class="gizle_992">
                                    <i class="fas fa-list" style="color: #000000; font-size:25px;"></i>
                            </div>
                            </a>
 -->                
   </div>
            
        </div>
        
        
    </div>
</div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
	x.className += " responsive";
  } else {
	x.className = "topnav";
  }
}
</script>
<? // header (f) ?>
<script>
$(window).scroll(function() {
  
	  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
		$('#header').attr('style','background:rgba(255,255,255,0.99); padding-top:5px; padding-bottom:5px;  -webkit-box-shadow: 3px 2px 33px -8px rgba(0,0,0,0.56); -moz-box-shadow: 3px 2px 33px -8px rgba(0,0,0,0.56); box-shadow: 3px 2px 33px -8px rgba(0,0,0,0.56);');
		$('#logo').attr('style','max-width: 200px; transition: all 0.3s ease-in;');
	  } else {
		$('#header').attr('style',' background:rgba(255,255,255,1);');
		$('#logo').attr('style','max-width: 250px; transition: all 0.3s ease-in;');
	  }

});
</script>

<? if (1==1) { ?>
<? // whatsApp Widget s (https://gallabox.com/whatsapp-chat-button)?>

<script>
(function (w, d, s, u) {
w.gbwawc = {
url: u, 
options: {
        //waId: "+90 5444082317",
        waId: "+90 5301445454",
        siteName: "Altuniş Teknik ",
        siteTag: "Meşgul",
        siteLogo: "https://waw.gallabox.com/chatbotavatars/5.png",
        widgetPosition: "RIGHT",
        triggerMessage: "DESTEK",
        welcomeMessage: "Merhaba;",
        brandColor: "#25D366",
        messageText: "Size nasıl yardımcı olabiliriz?",
        replyOptions: ['','',''],
    },
};
var h = d.getElementsByTagName(s)[0],
j = d.createElement(s);
j.async = true;
j.src = u + "/whatsapp-widget.min.js?_=" + Math.random();
h.parentNode.insertBefore(j, h);
})(window, document, "script", "https://waw.gallabox.com");
</script>

<? // whatsApp Widget s ?>
<? } ?>

<? // include ("inc_tel_icon.php");?>