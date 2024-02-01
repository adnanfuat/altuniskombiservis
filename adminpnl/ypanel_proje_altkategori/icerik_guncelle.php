<? $guncelle="Update urun_detay set ustkategori_no=$yeni_ust_kategori_no where altkategori_no=$altkategori_no";
@$baglanti->query($guncelle)->fetchAll(PDO::FETCH_ASSOC);	
?>