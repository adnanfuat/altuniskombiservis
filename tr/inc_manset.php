<? // manşet (s) ?>
	<div>
        <!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
        <link rel="stylesheet" type="text/css" href="wow/engine1/style.css" />
        <script type="text/javascript" src="wow/engine1/jquery.js"></script>
        <!-- End WOWSlider.com HEAD section -->
    
        <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
        <div id="wowslider-container1">
            <div class="ws_images">
                <ul>
                    
                    
					  <? 
                        $inc_manset_resim_dizini="../rsmlr/reklam/";
                        $inc_manset=@$baglanti->query("Select * from reklamlar where dil='1' and aktif='1' order by puan asc")->fetchAll(PDO::FETCH_ASSOC);
                        $inc_manset_toplam_kayit_sayisi=count($inc_manset);
                        if ($inc_manset_toplam_kayit_sayisi>0)
                           {
                           
                                for ($inc_manset_sayac=0; $inc_manset_sayac<$inc_manset_toplam_kayit_sayisi; $inc_manset_sayac++)
                                    {
                                        $inc_manset_sayac_ad=$inc_manset[$inc_manset_sayac]["ad"];
                                        $inc_manset_sayac_altbilgi=$inc_manset[$inc_manset_sayac]["altbilgi"];
                                        $inc_manset_sayac_link=$inc_manset[$inc_manset_sayac]["link"];
                                        $inc_manset_sayac_resim_adres=$inc_manset[$inc_manset_sayac]["resim_adres"];
                                        //$inc_manset_sayac_resim_adres2=$inc_manset[$inc_manset_sayac]["resim_adres2"];
                                        //$inc_manset_sayac_resim_adres3=$inc_manset[$inc_manset_sayac]["resim_adres3"];
                      ?>
                                      <li>
                                      <? if (strlen($inc_manset_sayac_link)>0) { ?><a href="<? echo $inc_manset_sayac_link; ?>"><? } ?>
                                      	<img src="<? echo   $inc_manset_resim_dizini.$inc_manset_sayac_resim_adres; ?>" fetchpriority="<? if ($inc_manset_sayac==0){ ?>high<? } else { ?>low<? } ?>" alt="<? echo $inc_manset_sayac_altbilgi; ?>" title="<? echo $inc_manset_sayac_ad; ?>" id="wows1_<? echo $inc_manset_sayac; ?>"/>
                                      <? if (strlen($inc_manset_sayac_link)>0) { ?></a><? } ?>
                                      </li>
                      <?
                            
                                    }
                            }
                      ?>                   
                    
                    
                    
                    
                </ul>
            </div>
            <div class="ws_bullets"><div>
		<? 
                for ($inc_manset_sayac=0; $inc_manset_sayac<$inc_manset_toplam_kayit_sayisi; $inc_manset_sayac++)
					{
						$inc_manset_sayac_ad=$inc_manset[$inc_manset_sayac]["ad"];
						$inc_manset_sayac_altbilgi=$inc_manset[$inc_manset_sayac]["altbilgi"];
                ?>
                		<a href="#" title="<? echo $inc_manset_sayac_ad; ?>"><span><? echo $inc_manset_sayac+1; ?></span></a>
                <? 
                	}
                ?>
	</div></div>
        </div>	
        <script type="text/javascript" src="wow/engine1/wowslider.js"></script>
        <script type="text/javascript" src="wow/engine1/script.js"></script>
        <!-- End WOWSlider.com BODY section -->
    </div>
<? // manşet (f) ?>