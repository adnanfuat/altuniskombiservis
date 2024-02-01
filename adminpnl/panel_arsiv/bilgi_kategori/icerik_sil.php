<? 
$altkategori_resim_sil=@$baglanti->query("Select numara  from $altkategori_tablo_ismi  where kategori=$numara")->fetchAll(PDO::FETCH_ASSOC);
$altkategori_resim_sayisi=count($altkategori_resim_sil);
for ($sayac2=0; $sayac2<$altkategori_resim_sayisi; $sayac2++)
	{	
		$altkategori_numara=$altkategori_resim_sil[$sayac2]["numara"];
		$item_resim_sil=@$baglanti->query("Select resim_adres,numara  from $detay_tablo_ismi  where ikinciel_no=$altkategori_numara")->fetchAll(PDO::FETCH_ASSOC);
		$item_resim_sayisi=count($item_resim_sil);
		$item_dizini=$detay_resim_dizini_ortaboy;
		$item_thumb_dizini=$thumb_resim_dizini;
		$item_buyukresim_dizini=$detay_buyuk_resim_dizini;
		for ($sayac3=0; $sayac3<$item_resim_sayisi; $sayac3++)
			{	
				$item_numara=$item_resim_sil[$sayac3]["numara"];
				$item_resim=$item_resim_sil[$sayac3]["resim_adres"];	
				if  ($item_resim<>'') 
					{
						$dosya_gecici_isim=$item_dizini.$item_resim;
						if (file_exists($dosya_gecici_isim)) { @chmod($dosya_gecici_isim,0755);  @unlink($dosya_gecici_isim);}
						$dosya_isim=$item_thumb_dizini.$item_resim;
						if (file_exists($dosya_isim)) { @chmod($dosya_isim,0755);  @unlink($dosya_isim); }
						$dosya_isim=$item_buyukresim_dizini.$item_resim;
						if (file_exists($dosya_isim)) { @chmod($dosya_isim,0755);  @unlink($dosya_isim); }
					}
			}		  
		$item_sil="Delete  from $detay_tablo_ismi  where ikinciel_no=$altkategori_numara";
		@$baglanti->query($item_sil)->fetchAll(PDO::FETCH_ASSOC);
	}		
$altkategori_icerik_sil="Delete  from $altkategori_tablo_ismi  where kategori=$numara";
@$baglanti->query($altkategori_icerik_sil)->fetchAll(PDO::FETCH_ASSOC);
?>