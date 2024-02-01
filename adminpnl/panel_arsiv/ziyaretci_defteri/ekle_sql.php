<? 
$n_tarih=date("Y-m-d");
$sql="Insert into $tablo_ismi (ad,aktif,eklenme_tarihi,mesaj,telefon,eposta,puan,dil) Values ('$n_ad','1','$n_tarih','$n_mesaj','$n_telefon','$n_eposta','$n_puan','$n_dil')";
$kayit_ekle=@$baglanti->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>