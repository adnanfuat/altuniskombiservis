<? 
// (s) Silinecek altsektore ait firmalarla iliskili resimler varsa onlar siliniyor 
include("config.php");
$item_resim_sil=@$baglanti->query("Select resim_adres,numara  from urun_detay  where altkategori_no=$altkategori")->fetchAll(PDO::FETCH_ASSOC);
$item_resim_sayisi=count($item_resim_sil);
$item_dizini=$uzaklik."rsmlr/urundetay/";
$item_thumb_dizini=$uzaklik."rsmlr/urunthumb/";
$item_buyukresim_dizini=$uzaklik."rsmlr/urundetay_buyuk/";
$renkler_resim_dizini=$uzaklik."rsmlr/burun/";
$renkler_thumb_resim_dizini=$uzaklik."rsmlr/kurun/";
for ($sayac2=0; $sayac2<$item_resim_sayisi; $sayac2++)
    {	
		$item_numara=$item_resim_sil[$sayac2]["numara"];
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
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$proje_renk_sil=@$baglanti->query("Delete * from urun_resim where urun_no=$item_numara");
		$item_resim=$item_resim_sil[$sayac2]["resim_adres"];	
		if  ($item_resim<>'')
			{
				$dosya_gecici_isim=$item_dizini.$item_resim;
				if  (file_exists($dosya_gecici_isim)) 
					{  @chmod($dosya_gecici_isim,0755); @unlink($dosya_gecici_isim);}

				$dosya_isim=$item_thumb_dizini.$item_resim;
				if (file_exists($dosya_isim)) { @chmod($dosya_isim,0755); @unlink($dosya_isim);}

				$dosya_isim=$item_buyukresim_dizini.$item_resim;
				if (file_exists($dosya_isim)) { @chmod($dosya_isim,0755); @unlink($dosya_isim); }
			}
	}		  
$item_sil="Delete  from urun_detay  where altkategori_no=$altkategori";
@$baglanti->query($item_sil)->fetchAll(PDO::FETCH_ASSOC);
?>