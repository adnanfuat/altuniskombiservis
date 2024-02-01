<? $sql="Update $tablo_ismi set ad='$ad',eposta='$eposta',mesaj='$mesaj',telefon='$telefon', puan='$puan', dil='$dil' where numara='$numara'"; 
$kayit_ekle=@$baglanti->query($sql)->fetchAll(PDO::FETCH_ASSOC); 
?>