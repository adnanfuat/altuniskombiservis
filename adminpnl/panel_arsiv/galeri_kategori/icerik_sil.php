<? 
// (s) Silinecek kategoriyle iliskili resimler varsa onlar siliniyor 
$altkategori_resim_sil=@$baglanti->query("Select resim_adres,numara  from $altkategori_tablo_ismi  where ustkategori_no=$numara")->fetchAll(PDO::FETCH_ASSOC);
$altkategori_resim_sayisi=count($altkategori_resim_sil);
$altkategori_dizini=$altkategori_resim_dizini;
for ($sayac2=0; $sayac2<$altkategori_resim_sayisi; $sayac2++)
	{	
		$altkategori_numara=$altkategori_resim_sil[$sayac2]["numara"];
		$altkategori_resim=$altkategori_resim_sil[$sayac2]["resim_adres"];	
		if  ($altkategori_resim<>'')
			{
				// (s)  Resmi Sil 				
				$dosya_gecici_isim=$altkategori_dizini.$altkategori_resim;
				if  (file_exists($dosya_gecici_isim)) 
					{
			  	       @chmod($dosya_gecici_isim,0755);  @unlink($dosya_gecici_isim);
					}
			    // (f)  Resmi Sil
			}
	}		
// (f) Silinecek sektore ait altsektorlere iliskili resimler varsa onlar siliniyor 
// Sektore ait alt sektorler siliniyor......
$altkategori_icerik_sil="Delete  from $altkategori_tablo_ismi  where ustkategori_no=$numara";
@$baglanti->query($altkategori_icerik_sil)->fetchAll(PDO::FETCH_ASSOC);
//*****************************************************************************************
// (s) Silinecek sektore ait ilanlarla iliskili resimler varsa onlar siliniyor 
$item_resim_sil=@$baglanti->query("Select resim_adres,numara  from $detay_tablo_ismi  where ustkategori_no=$numara")->fetchAll(PDO::FETCH_ASSOC);
$item_resim_sayisi=count($item_resim_sil);
$item_dizini=$detay_resim_dizini_ortaboy;
$item_thumb_dizini=$thumb_resim_dizini;
$item_buyukresim_dizini=$detay_buyuk_resim_dizini;
for ($sayac2=0; $sayac2<$item_resim_sayisi; $sayac2++)
	{	
		$item_numara=$item_resim_sil[$sayac2]["numara"];
		$item_resim=$item_resim_sil[$sayac2]["resim_adres"];	
		if  ($item_resim<>'') 
			{
				$dosya_gecici_isim=$item_dizini.$item_resim;
				if  (file_exists($dosya_gecici_isim)) 
					{
			  	       @chmod($dosya_gecici_isim,0755);  @unlink($dosya_gecici_isim);
					}
				////////////////////////////////////////////////////////////// Thumb siliniyor
				$dosya_isim=$item_thumb_dizini.$item_resim;
				if  (file_exists($dosya_isim)) 
					{
			  	       @chmod($dosya_isim,0755);  @unlink($dosya_isim);
					}
				///////////////////////////////////////////////////////////// Thumb siliniyor						
				///////////////////////////////////////////////////////// Buyuk Resim siliniyor
				$dosya_isim=$item_buyukresim_dizini.$item_resim;
				if  (file_exists($dosya_isim)) 
					{
			  	       @chmod($dosya_isim,0755);  @unlink($dosya_isim);
					}
				/////////////////////////////////////////////// Buyuk Resim siliniyor
				// (f)  Resmi Sil
			}
	}		  
	// (f) Silinecek altsektore ait firmalarla iliskili resimler varsa onlar siliniyor 
	//*****************************************************************************************
	//Ilan içerik tablosunda ilgili içerikler siliniyor.........
	$item_sil="Delete  from $detay_tablo_ismi  where ustkategori_no=$numara";
	@$baglanti->query($item_sil)->fetchAll(PDO::FETCH_ASSOC);
?>