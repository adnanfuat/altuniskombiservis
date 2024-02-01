<? 
// (s) Silinecek hizmet kategorisine ait hizmet tablosundaki kayitlar siliniyor  (s) ************************************
$altkategori_resim_sil=@$baglanti->query("Select resim_adres,numara  from $detay_tablo_ismi where kategori=$numara")->fetchAll(PDO::FETCH_ASSOC);
$altkategori_resim_sayisi=count($altkategori_resim_sil);
$altkategori_dizini=$altkategori_resim_dizini;
for ($sayac2=0; $sayac2<$altkategori_resim_sayisi; $sayac2++)
	{	
		$altkategori_numara=$altkategori_resim_sil[$sayac2]["numara"];
		$altkategori_resim=$altkategori_resim_sil[$sayac2]["resim_adres"];	
		// (s) Silinecek hizmet kategorisiyle ilgili resim varsa o siliniyor 
		if  ($altkategori_resim<>'')
			{
				// (s)  Resmi Sil 				
				$dosya_gecici_isim=$altkategori_dizini.$altkategori_resim;
				if  (file_exists($dosya_gecici_isim)) 
					{
			  	       @chmod($dosya_gecici_isim,0755);  @unlink($dosya_gecici_isim);
					}
				$dosya_gecici_isim=$altkategori_thumb_resim_dizini.$altkategori_resim;	
				if (file_exists($dosya_gecici_isim)) 
					{
			  	       @chmod($dosya_gecici_isim,0755);  @unlink($dosya_gecici_isim);
					}
			}
	}		
// (s) Silinecek hizmet kategorisiyle ilgili resim varsa o siliniyor 
$altkategori_icerik_sil="Delete  from $detay_tablo_ismi where kategori=$numara";
@$baglanti->query($altkategori_icerik_sil)->fetchAll(PDO::FETCH_ASSOC);
// (f) Silinecek hizmet kategorisine ait hizmet tablosundaki kayitlar siliniyor  (s) ************************************
?>