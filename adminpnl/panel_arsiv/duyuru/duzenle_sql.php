<? 
$sql="Update $tablo_ismi set ad='$ad',icerik='$icerik',dil='$dil' where numara='$numara'";
$kayit_ekle=@$baglanti->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>