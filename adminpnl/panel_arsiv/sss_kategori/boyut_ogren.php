<?
$boyut_ogren=@$baglanti->query("Select hizmet_kategori_genislik,hizmet_kategori_yukseklik from parametreler where yonetim='$syonetim'")->fetchAll(PDO::FETCH_ASSOC);
$boyut_ogren_sayi=count($boyut_ogren);
if  ($boyut_ogren_sayi>0)
	{
		$kck_m_w=$boyut_ogren[0]["hizmet_kategori_genislik"];
		$kck_m_h=$boyut_ogren[0]["hizmet_kategori_yukseklik"];
	}
else
	{
		$boyut_ogren=@$baglanti->query("Select hizmet_kategori_vgenislik,hizmet_kategori_vyukseklik from vparametreler where yonetim='$syonetim'")->fetchAll(PDO::FETCH_ASSOC);
		$boyut_ogren_sayi=count($boyut_ogren);
		$kck_m_w=$boyut_ogren[0]["hizmet_kategori_vgenislik"];
		$kck_m_h=$boyut_ogren[0]["hizmet_kategori_vyukseklik"];
	}
?>