<? 	
$galeri_guncelle="Update $detay_tablo_ismi set ustkategori_no=$yeni_ust_kategori_no where altkategori_no=$altkategori_no";
@$baglanti->query($galeri_guncelle)->fetchAll(PDO::FETCH_ASSOC);	
?>