<? 
$inc_hizmetler_2_kayit_seti=@$baglanti->query("Select * from hizmet_kategori where aktif=1 and dil=1 order by puan asc limit 0,50")->fetchAll(PDO::FETCH_ASSOC);
$inc_hizmetler_2_kayit_seti_sayisi=count($inc_hizmetler_2_kayit_seti); //echo $inc_hizmetler_2_kayit_seti_sayisi;
$inc_hizmetler_2_resim_dizini="../rsmlr/hizmetk/";
?>

<style>
.inc_hzmt_box_border { 
/*border-style: solid;
border-width: 0px 1px 1px 0px;
border-color: #500B88;*/
box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.07);
transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
margin: 0px 0px 0px 0px;
padding: 21px 20px 20px 20px;
background: #ffffff;
min-height:500px;
border-radius: 30px;
margin: 0 5px;
}
.inc_hzmt_box_border:hover {
box-shadow: 0px 10px 60px 0px rgba(0, 0, 0, 0.8);
} 
.ihizmet_rsm
{
    max-width 100px; 
    margin: 0 auto; 
    border-radius: 15px;
    transition: .5s ease; 
}
.ihizmet_rsm:hover
{
        border-radius: 60px
}
</style> 


<div class="genis_flex_container index_max_w_1 animatable fadeInUp" style="justify-content:center;">
        		

                

                                            <? if ($inc_hizmetler_2_kayit_seti_sayisi>0) { ?>
                                            <? //echo $inc_hizmetler_2_kayit_seti_sayisi;
                                            for ($inc_hizmetler_2_sayac=0; $inc_hizmetler_2_sayac<$inc_hizmetler_2_kayit_seti_sayisi; $inc_hizmetler_2_sayac++) 
                                                { 
                                                    $inc_hizmetler_2_kayit_seti_no=$inc_hizmetler_2_kayit_seti[$inc_hizmetler_2_sayac]["numara"];
                                                    $inc_hizmetler_2_kayit_seti_baslik=$inc_hizmetler_2_kayit_seti[$inc_hizmetler_2_sayac]["ad"];
                                                    $inc_hizmetler_2_kayit_seti_resim_adres=$inc_hizmetler_2_kayit_seti[$inc_hizmetler_2_sayac]["resim_adres"];
                                                    $inc_hizmetler_2_kayit_seti_ozet=$inc_hizmetler_2_kayit_seti[$inc_hizmetler_2_sayac]["ozet"];
													$inc_hizmetler_2_kayit_seti_aciklama=$inc_hizmetler_2_kayit_seti[$inc_hizmetler_2_sayac]["aciklama"];
                                                    $inc_hizmetler_2_kayit_seti_tarih=$inc_hizmetler_2_kayit_seti[$inc_hizmetler_2_sayac]["eklenme_tarihi"];
                                                    $inc_hizmetler_2_kayit_seti_tarih=substr($inc_hizmetler_2_kayit_seti_tarih,8,2).".".substr($inc_hizmetler_2_kayit_seti_tarih,5,2).".".substr($inc_hizmetler_2_kayit_seti_tarih,0,4); 
                                                    $inc_hizmetler_2_kayit_seti_htaccess_etiket=$inc_hizmetler_2_kayit_seti[$inc_hizmetler_2_sayac]["htaccess_etiket"];
                                                    if ($inc_hizmetler_2_kayit_seti_resim_adres=="") { $inc_hizmetler_2_kayit_seti_resim_adres="resimyok.jpg";}
                                                    $inc_hizmetler_2_kayit_seti_baslikk=$inc_hizmetler_2_kayit_seti_baslik;
                                                    //(s) hizmetin linki permalink'e göre ayarlanıyor.
                                                    if  ($permalink_durumu==1)
                                                        {
                                                            $inc_hizmetler_2_hizmet_link=permalink_duzenle($hizmet_permalink_on)."/".$inc_hizmetler_2_kayit_seti_htaccess_etiket;
                                                        }
                                                        else
                                                        {
                                                            $inc_hizmetler_2_hizmet_link="hizmet_detay.php?ht=$inc_hizmetler_2_kayit_seti_htaccess_etiket";
                                                        }
                                                    //(f) hizmetin linki permalink'e göre ayarlanıyor.
                                                    if (strlen($inc_hizmetler_2_kayit_seti_baslik)>300) { $pos=strpos($inc_hizmetler_2_kayit_seti_baslik,' ',300); if ($pos>0) { $inc_hizmetler_2_kayit_seti_baslik_kisa=substr($inc_hizmetler_2_kayit_seti_baslik,0,$pos)."[...]"; } else { $inc_hizmetler_2_kayit_seti_baslik_kisa=$inc_hizmetler_2_kayit_seti_baslik; } } else { $inc_hizmetler_2_kayit_seti_baslik_kisa=$inc_hizmetler_2_kayit_seti_baslik; }
                                                    if (strlen($inc_hizmetler_2_kayit_seti_ozet)>300) { $pos=strpos($inc_hizmetler_2_kayit_seti_ozet,' ',300); if ($pos>0) { $inc_hizmetler_2_kayit_seti_ozet_kisa=substr($inc_hizmetler_2_kayit_seti_ozet,0,$pos)."[...]"; } else { $inc_hizmetler_2_kayit_seti_ozet_kisa=$inc_hizmetler_2_kayit_seti_ozet; } } else { $inc_hizmetler_2_kayit_seti_ozet_kisa=$inc_hizmetler_2_kayit_seti_ozet; }
                                                   
                                                    
                                                    if  (strlen($inc_hizmetler_2_kayit_seti_aciklama)>200) 
                                                        { 
                                                            $pos=strpos($inc_hizmetler_2_kayit_seti_aciklama,' ',200); 
                                                            if 	($pos>0) 
                                                                { 
                                                                    $inc_hizmetler_2_kayit_seti_aciklama=substr($inc_hizmetler_2_kayit_seti_aciklama,0,$pos)."..."; 
                                                                } 
                                                            else 
                                                                { 
                                                                    $inc_hizmetler_2_kayit_seti_aciklama=$inc_hizmetler_2_kayit_seti_aciklama; 
                                                                } 
                                                        } 
                                                    else 
                                                        { 
                                                            $inc_hizmetler_2_kayit_seti_aciklama=$inc_hizmetler_2_kayit_seti_aciklama; 
                                                        }
                                            ?> 
                                            
                                            


                                                        <div class="equal_colsx4 block animatable fadeInUp" style="margin-bottom:10px" >
                                                            <div class="inc_hzmt_box_border">                                                            
                                                                <div>
                                                                    <img src="<? echo $seo_uzaklik; ?><? echo $inc_hizmetler_2_resim_dizini.$inc_hizmetler_2_kayit_seti_resim_adres; ?>"   
                                                                    alt="<? echo $inc_hizmetler_2_kayit_seti_baslik?>" title="<? echo $inc_hizmetler_2_kayit_seti_baslik?>" width="100%"   
                                                                    class="ihizmet_rsm" >                                                                      
                                                                </div>   <div>&nbsp;</div>                                                                 
                                                                <div><h1 style="font-size:20px; font-weight:500; color:#252525"><? echo $inc_hizmetler_2_kayit_seti_baslik?></h1></div>
                                                                <div style="min-height:100px;"><p style="color:#252525"><? echo  strip_tags($inc_hizmetler_2_kayit_seti_aciklama); ?></p></div>                                                                    
                                                                <div class="index_hakkimizda_div_buton">
                                                                    <a href="<? echo $seo_uzaklik; ?><? echo $inc_hizmetler_2_hizmet_link; ?>" style="text-decoration:none;" title="<? echo $inc_hizmetler_2_kayit_seti_baslik?>" > 
                                                                        
                                                                            İNCELE <i aria-hidden="true" class="fas fa-arrow-right"></i>
                                                                       
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                               
                                                        
                                            <?
                                                }
                                            ?>
                                            <? }  ?>
                                                           
                                                           
                                                           
                                           














        </div>
