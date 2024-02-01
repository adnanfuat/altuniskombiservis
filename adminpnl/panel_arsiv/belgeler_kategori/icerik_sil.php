<? 
// (s) Silinecek sektore ait ilanlarla iliskili resimler varsa onlar siliniyor 
$item_resim_sil=@$baglanti->query("Select resim_adres,numara  from referanslar  where kategori=$numara")->fetchAll(PDO::FETCH_ASSOC);
$item_resim_sayisi=count($item_resim_sil);
$item_dizini=$uzaklik."rsmlr/referans/";
$item_thumb_dizini=$uzaklik."rsmlr/treferans/";
for ($sayac2=0; $sayac2<$item_resim_sayisi; $sayac2++)
	{	
		$item_numara=$item_resim_sil[$sayac2]["numara"];
		$item_resim=$item_resim_sil[$sayac2]["resim_adres"];	
		if ($item_resim<>'') 
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
				// (f)  Resmi Sil
			}
	}		  
// (f) Silinecek altsektore ait firmalarla iliskili resimler varsa onlar siliniyor 
//*****************************************************************************************
//Ilan içerik tablosunda ilgili içerikler siliniyor.........
$item_sil="Delete  from referanslar  where kategori=$numara";
@$baglanti->query($item_sil)->fetchAll(PDO::FETCH_ASSOC);
?>