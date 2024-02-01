<? 
$renkler_resim_dizini=$uzaklik."rsmlr/burun/";
$renkler_thumb_resim_dizini=$uzaklik."rsmlr/kurun/";
$renkler_resim_sil=@$baglanti->query("Select resim_adres,numara  from urun_resim  where urun_no=$item_numara")->fetchAll(PDO::FETCH_ASSOC);
$renkler_resim_sayisi=count($renkler_resim_sil);
for ($sayac3=0; $sayac3<$renkler_resim_sayisi; $sayac3++)
	{	
		$renkler_item_numara=$renkler_resim_sil[$sayac3]["numara"];
		$renkler_item_resim=$renkler_resim_sil[$sayac3]["resim_adres"];	
		if  ($renkler_item_resim<>'') 
			{  																    	
				$dosya_gecici_isim=$renkler_resim_dizini.$renkler_item_resim;
				if  (file_exists($dosya_gecici_isim)) 
					{ 
						@chmod($dosya_gecici_isim,0755);	@unlink($dosya_gecici_isim); 
					}
				$dosya_gecici_isim=$renkler_thumb_resim_dizini.$renkler_item_resim;
				if  (file_exists($dosya_gecici_isim)) 
					{ 
						@chmod($dosya_gecici_isim,0755);	@unlink($dosya_gecici_isim); 
					}
			}
	}		  
$renkler_item_sil="Delete  from urun_resim  where urun_no=$item_numara";
@$baglanti->query($renkler_item_sil)->fetchAll(PDO::FETCH_ASSOC);

$item_resim=$resim;
$item_dizini=$uzaklik."rsmlr/urunthumb/";
if  ($item_resim<>'') 
	{
		$dosya_gecici_isim=$item_dizini.$item_resim;
		if  (file_exists($dosya_gecici_isim)) 
			{
	  	       @chmod($dosya_gecici_isim,0755); @unlink($dosya_gecici_isim);
			}
	}
?>