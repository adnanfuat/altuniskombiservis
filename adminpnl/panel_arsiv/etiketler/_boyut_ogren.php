<?
$boyut_ogren=@$baglanti->query("Select haber_kgenislik,haber_kyukseklik,haber_bgenislik,haber_byukseklik from parametreler where yonetim='$syonetim'")->fetchAll(PDO::FETCH_ASSOC);
$boyut_ogren_sayi=count($boyut_ogren);
if  ($boyut_ogren_sayi>0)
	{
		$kck_m_w=$boyut_ogren[0]["haber_kgenislik"];
		$kck_m_h=$boyut_ogren[0]["haber_kyukseklik"];
		$byk_m_w=$boyut_ogren[0]["haber_bgenislik"];
		$byk_m_h=$boyut_ogren[0]["haber_byukseklik"];
	}
else
	{
		$boyut_ogren=@$baglanti->query("Select haber_kvgenislik,haber_kvyukseklik,haber_bvgenislik,haber_bvyukseklik from vparametreler where yonetim='$syonetim'")->fetchAll(PDO::FETCH_ASSOC);
		$boyut_ogren_sayi=count($boyut_ogren);
		$kck_m_w=$boyut_ogren[0]["haber_kvgenislik"];
		$kck_m_h=$boyut_ogren[0]["haber_kvyukseklik"];
		$byk_m_w=$boyut_ogren[0]["haber_bvgenislik"];
		$byk_m_h=$boyut_ogren[0]["haber_bvyukseklik"];
	}
?>