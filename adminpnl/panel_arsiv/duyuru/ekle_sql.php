<? 
$n_tarih=date("Y-m-d");
$sql="Insert into $tablo_ismi (ad,aktif,tarih,icerik,dil) Values ('$n_ad','1','$n_tarih','$n_icerik','$n_dil')";
$kayit_ekle=@$baglanti->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>