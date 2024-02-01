<?
$boyut_ogren=@$baglanti->query("Select bilgi_kategori_genislik,bilgi_kategori_yukseklik from parametreler")->fetchAll(PDO::FETCH_ASSOC);
$boyut_ogren_sayi=count($boyut_ogren);
if  ($boyut_ogren_sayi>0)
	{
		$kck_m_w=$boyut_ogren[0]["bilgi_kategori_genislik"];
		$kck_m_h=$boyut_ogren[0]["bilgi_kategori_yukseklik"];
	}
else
	{
		$boyut_ogren=@$baglanti->query("Select bilgi_kategori_vgenislik,bilgi_kategori_vyukseklik from vparametreler")->fetchAll(PDO::FETCH_ASSOC);
		$boyut_ogren_sayi=count($boyut_ogren);
		$kck_m_w=$boyut_ogren[0]["bilgi_kategori_vgenislik"];
		$kck_m_h=$boyut_ogren[0]["bilgi_kategori_vyukseklik"];
	}
?>