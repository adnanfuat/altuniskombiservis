    <?
	$kayit_seti=@$baglanti->query("Select * from etiketler where aktif=1 and dil=1 order by numara desc limit 0,21")->fetchAll(PDO::FETCH_ASSOC);
	//$baglanti->errorInfo();
	$kayit_seti_sayisi=count($kayit_seti); //echo $kayit_seti_sayisi;

	?>
    <div>&nbsp;</div><div>&nbsp;</div>
    <div class="genis_flex_container index_max_w_1">
        
        <? if ($kayit_seti_sayisi>0) { ?>
		<?
            for ($sayac=0; $sayac<$kayit_seti_sayisi; $sayac++) 
                { 
					$kayit_seti_no=$kayit_seti[$sayac]["numara"];
					$kayit_seti_baslik=$kayit_seti[$sayac]["ad"];
					$kayit_seti_htaccess_etiket=$kayit_seti[$sayac]["htaccess_etiket"];
					$kayit_seti_icerik=$kayit_seti[$sayac]["icerik"];
					if  (strlen($kayit_seti_icerik)>300) 
						{ 
								$pos=@strpos($kayit_seti_icerik,' ',300); 
								if 	($pos>0) 
									{ 
										$kayit_seti_icerik=@substr($kayit_seti_icerik,0,$pos)."..."; 
									} 
								else 
									{ 
										$kayit_seti_icerik=$kayit_seti_icerik; 
									} 
							} 
						else 
							{ 
								$kayit_seti_icerik=$kayit_seti_icerik; 
							}
					 if (strlen($kayit_seti_htaccess_etiket)>0) 
					   {
								if  ($permalink_durumu==1)
									{
										$etiket_link=$etiket_permalink_on."/".$kayit_seti_htaccess_etiket;
									}
								else
									{
										$etiket_link="etiket_detay.php?ht=$kayit_seti_htaccess_etiket";
									}
					   }
					 else
						{
								if  ($permalink_durumu==1)
									{
										$perma_icerik=permalink_daralt($kayit_seti_baslikk,70);
										
										$permalink_on=permalink_duzenle($etiket_permalink_on."-".$perma_icerik);
										
										$etiket_link=$permalink_on."-".$kayit_seti_no.".html";
									}
								else
									{
										$etiket_link="etiket_detay.php?id=$kayit_seti_no";
									}
						}
		
		?>
        	<div class="equal_colsx3" >
            	<div style="  margin:0 auto; cursor:pointer; border:1px solid #3498db; border-radius:3px;  padding: 15px; min-height:200px; background:#ffffff" onclick="window.location='<? echo $seo_uzaklik; ?><? echo $etiket_link; ?>'">
                    <h3 class="index_baslik_5" style="color:#3498db;"><strong><? echo stripslashes($kayit_seti_baslik);?></strong></h3>
                    <div>&nbsp;</div>
                    <p class="index_p_yazi_muli"><? echo stripslashes(strip_tags($kayit_seti_icerik));?>... <br />
<br />
<strong>DEVAMI &raquo;</strong></p>
                    <div>&nbsp;</div>
                </div>
                <div>&nbsp;</div>
            </div>
            
         <?
		 		}
			}
		 ?> 
    </div>
    <div>&nbsp;</div><div>&nbsp;</div>