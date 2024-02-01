<? 
// (s) Silinecek kategoriyle iliskili resimler varsa onlar siliniyor 
$altkategori_resim_sil=@$baglanti->query("Select resim_adres,numara  from proje_altkategori  where ustkategori_no=$numara")->fetchAll(PDO::FETCH_ASSOC);
$altkategori_resim_sayisi=count($altkategori_resim_sil);
$altkategori_dizini=$uzaklik."rsmlr/projealtkategori/";
for ($sayac2=0; $sayac2<$altkategori_resim_sayisi; $sayac2++)
	{	
			$altkategori_numara=$altkategori_resim_sil[$sayac2]["numara"];
			// (s) Silinecek kategoriyle iliskili resimler varsa onlar siliniyor 
			/*$altkategori_renk_sil=@$baglanti->query("Select resim_adres,numara  from proje_renk  where altkategori_no=$altkategori_numara")->fetchAll(PDO::FETCH_ASSOC);
			$altkategori_renk_sayisi=count($altkategori_renk_sil);
			$altkategori_renk_dizini1=$uzaklik."rsmlr/brenk/";
			$altkategori_renk_dizini2=$uzaklik."rsmlr/orenk/";
			$altkategori_renk_dizini3=$uzaklik."rsmlr/krenk/";
			for ($sayac3=0; $sayac3<$altkategori_renk_sayisi; $sayac3++)
				{	
					$altkategori_renk_numara=$altkategori_renk_sil[$sayac3]["numara"];
					$altkategori_renk_resim=$altkategori_renk_sil[$sayac3]["resim_adres"];	
					if  ($altkategori_renk_resim<>'')
						{
							$dosya_gecici_isim=$altkategori_renk_dizini1.$altkategori_renk_resim;
							if (file_exists($dosya_gecici_isim)) { @chmod($dosya_gecici_isim,0755); @unlink($dosya_gecici_isim);}
							$dosya_gecici_isim=$altkategori_renk_dizini3.$altkategori_renk_resim;
							if (file_exists($dosya_gecici_isim)) { @chmod($dosya_gecici_isim,0755); @unlink($dosya_gecici_isim);}
							$dosya_gecici_isim=$altkategori_renk_dizini3.$altkategori_renk_resim;
							if (file_exists($dosya_gecici_isim)) { @chmod($dosya_gecici_isim,0755); @unlink($dosya_gecici_isim);}
						}
				}		
			// (f) Silinecek sektore ait altsektorlere iliskili resimler varsa onlar siliniyor 
			$altkategori_resim_icerik_sil="Delete  from proje_renk  where altkategori_no=$altkategori_numara";
			@$baglanti->query($altkategori_icerik_sil)->fetchAll(PDO::FETCH_ASSOC); */
			//*****************************************************************************************
			$altkategori_resim=$altkategori_resim_sil[$sayac2]["resim_adres"];	
			if  ($altkategori_resim<>'')
				{
					$dosya_gecici_isim=$altkategori_dizini.$altkategori_resim;
					if  (file_exists($dosya_gecici_isim)) 
						{
						   @chmod($dosya_gecici_isim,0755); @unlink($dosya_gecici_isim);
						}
				}
	}		
// (f) Silinecek sektore ait altsektorlere iliskili resimler varsa onlar siliniyor 
$altkategori_icerik_sil="Delete  from proje_altkategori  where ustkategori_no=$numara";
@$baglanti->query($altkategori_icerik_sil)->fetchAll(PDO::FETCH_ASSOC);
//*****************************************************************************************
// (s) Silinecek sektore ait ilanlarla iliskili resimler varsa onlar siliniyor 
$item_resim_sil=@$baglanti->query("Select resim_adres,numara  from proje_detay  where ustkategori_no=$numara")->fetchAll(PDO::FETCH_ASSOC);
$item_resim_sayisi=count($item_resim_sil); 
$item_dizini=$uzaklik."rsmlr/projedetay/";
$item_thumb_dizini=$uzaklik."rsmlr/projethumb/"; 
$item_buyukresim_dizini=$uzaklik."rsmlr/projedetay_buyuk/";
$renkler_resim_dizini=$uzaklik."rsmlr/bproje/";
$renkler_thumb_resim_dizini=$uzaklik."rsmlr/kproje/";
for ($sayac2=0; $sayac2<$item_resim_sayisi; $sayac2++)
	{	
		$item_numara=$item_resim_sil[$sayac2]["numara"];
		$renkler_resim_sil=@$baglanti->query("Select resim_adres,numara  from proje_resim  where proje_no=$item_numara")->fetchAll(PDO::FETCH_ASSOC);
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
		$renkler_item_sil="Delete  from proje_resim  where proje_no=$item_numara";
		@$baglanti->query($renkler_item_sil)->fetchAll(PDO::FETCH_ASSOC);
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$proje_renk_sil=@$baglanti->query("Delete * from proje_resim where proje_no=$item_numara");
		$item_resim=$item_resim_sil[$sayac2]["resim_adres"];	
		if  ($item_resim<>'') 
			{
				$dosya_gecici_isim=$item_dizini.$item_resim;
				if  (file_exists($dosya_gecici_isim)) 
					{  
						@chmod($dosya_gecici_isim,0755); @unlink($dosya_gecici_isim); 
					}
				$dosya_isim=$item_thumb_dizini.$item_resim;
				if  (file_exists($dosya_isim)) 
					{ 
						@chmod($dosya_isim,0755); @unlink($dosya_isim);
					}
				$dosya_isim=$item_buyukresim_dizini.$item_resim;
				if  (file_exists($dosya_isim)) 
					{  
						@chmod($dosya_isim,0755); @unlink($dosya_isim);
					}
			}
	}		  
// (f) Silinecek altsektore ait firmalarla iliskili resimler varsa onlar siliniyor 
//Ilan içerik tablosunda ilgili içerikler siliniyor.........
$item_sil="Delete  from proje_detay  where ustkategori_no=$numara";
@$baglanti->query($item_sil)->fetchAll(PDO::FETCH_ASSOC);
?>